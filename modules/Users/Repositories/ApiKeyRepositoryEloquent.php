<?php namespace Modules\Users\Repositories;

use Core\Domain\Users\Repositories\ApiKeyRepositoryEloquent as BaseRepository;
use Core\Domain\Users\Repositories\ApiKeyRepository;
use Core\Domain\Users\Entities\ApiKey;
use Illuminate\Container\Container as Application;
use Modules\Users\Repositories\RoleRepositoryEloquent as RoleRepositoryEloquent;

/**
 * Class ApiKeyRepositoryEloquent
 * @package Modules\Users\Repositories
 */
class ApiKeyRepositoryEloquent extends BaseRepository implements ApiKeyRepository
{

	/**
	 * ApiKeyRepositoryEloquent constructor.
	 *
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		parent::__construct($app);
	}

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return parent::model();
	}
}
