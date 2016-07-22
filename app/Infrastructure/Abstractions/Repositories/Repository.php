<?php namespace CVEPDB\Abstracts\Repositories;

use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface as PrettusRepositoryCriteriaInterface;
use Prettus\Repository\Contracts\CriteriaInterface as PrettusCriteriaInterface;
use Illuminate\Container\Container as Application;

/**
 * Class BaseRepository
 * @package Prettus\Repository\Eloquent
 */
abstract class Repository extends PrettusBaseRepository implements PrettusCriteriaInterface, PrettusRepositoryCriteriaInterface
{

	/**
	 * Repository constructor.
	 *
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		parent::__construct($app);
	}
}
