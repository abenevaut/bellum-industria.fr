<?php namespace Core\Domain\Users\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Container\Container as Application;
use CVEPDB\Domain\Users\Repositories\UserRepositoryEloquent as RepositoryEloquent;
use Core\Criterias\OnlyTrashedCriteria;
use Core\Criterias\WithTrashedCriteria;
use Core\Domain\Users\Entities\User;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent as RoleRepositoryEloquent;
use Core\Domain\Users\Criterias\EmailLikeCriteria;
use Core\Domain\Users\Criterias\UserNameLikeCriteria;
use Core\Domain\Users\Criterias\RolesCriteria;
use Core\Domain\Users\Criterias\EnvironmentsCriteria;

/**
 * Class UserRepositoryEloquent
 * @package Core\Domain\Users\Repositories
 */
abstract class UserRepositoryEloquent extends RepositoryEloquent
{

	const FILTER_TRASHED_WITH = 'filterTrashedWith';
	const FILTER_TRASHED_ONLY = 'filterTrashedOnly';

	/**
	 * UserRepositoryEloquent constructor.
	 *
	 * @param Application            $app
	 * @param RoleRepositoryEloquent $r_roles
	 */
	public function __construct(Application $app, RoleRepositoryEloquent $r_roles)
	{
		parent::__construct($app, $r_roles);
	}

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return User::class;
	}

	/**
	 * Get the list of all user, active and soft deleted users.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function allWithTrashed()
	{
		return User::withTrashed()->get();
	}

	/**
	 * Get only user that was soft deleted.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function onlyTrashed()
	{
		return User::onlyTrashed()->get();
	}

	/**
	 * Count all user.
	 *
	 * @return int
	 */
	public function count($columns = ['*'])
	{
		$this->applyCriteria();
		$this->applyScope();

		if ($this->model instanceof Builder)
		{
			$results = $this->model->get($columns)->count();
		}
		else
		{
			$results = $this->model->count($columns);
		}

		$this->resetModel();
		$this->resetScope();

		return $results;
	}

	/**
	 * Filter users by name.
	 *
	 * @param string $name The user last name or user first name
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterUserName($name)
	{
		$this->pushCriteria(new UserNameLikeCriteria($name));
	}

	/**
	 * Filter users by emails.
	 *
	 * @param string $email The user email
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterEmail($email)
	{
		$this->pushCriteria(new EmailLikeCriteria($email));
	}

	/**
	 * Filter users by roles.
	 *
	 * @param array $roles the list of roles IDs
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterRoles($roles = [])
	{
		$roles = array_filter($roles);

		if (count($roles))
		{
			$this->pushCriteria(new RolesCriteria($roles));
		}
	}

	/**
	 * Allow to search for trashed users.
	 *
	 * @param string $trashed UserRepositoryEloquent::FILTER_TRASHED_WITH or
	 *     UserRepositoryEloquent::FILTER_TRASHED_ONLY, [default: null]
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterTrashed($trashed = null)
	{
		switch ($trashed)
		{
			case self::FILTER_TRASHED_WITH:
			{
				$this->pushCriteria(new WithTrashedCriteria());
				break;
			}
			case self::FILTER_TRASHED_ONLY:
			{
				$this->pushCriteria(new OnlyTrashedCriteria());
				break;
			}
		}
	}

	/**
	 * Filter users by environments.
	 *
	 * @param array $envs the list of environment IDs
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterEnvironments($envs = [])
	{
		$envs = array_filter($envs);

		if (count($envs))
		{
			$this->pushCriteria(new EnvironmentsCriteria($envs));
		}
	}

	/**
	 * Find user by ID and soft delete him.
	 *
	 * @param integer $id The user ID
	 *
	 * @throws \Exception
	 */
	public function findAndDelete($id)
	{
		$user = $this->find($id);

		$role = $this->r_roles->role_exists(RoleRepositoryEloquent::ADMIN);
		if ($user->roles->contains($role->id) && 1 === $this->r_roles->count_users_by_roles([RoleRepositoryEloquent::ADMIN]))
		{
			throw new \Exception(
				sprintf(
					trans('users::repository.findanddelete.error:this_is_the_last_user_admin'),
					$user->full_name
				),
				1
			);
		}

		/*
		 * delete all roles except user; in case the user was re-activated
		 */

		$user->roles()->detach();
		// Always attach client role
		$role = $this->r_roles->role_exists(RoleRepositoryEloquent::USER);
		$user->attachRole($role);

		/*
		 * delete api key
		 */

		$user->apikey()->delete();

		/*
		 * delete user
		 */

		$user->delete();
	}
}
