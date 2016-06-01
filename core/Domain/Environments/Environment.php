<?php namespace Core\Domain\Environments;

use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;

/**
 * Class Environment
 * @package Core\Domain\Environments
 */
class Environment
{

	/**
	 * The Laravel application instance.
	 *
	 * @var \Illuminate\Foundation\Application
	 */
	protected $app;

	/**
	 * Normalized Laravel Version
	 *
	 * @var string
	 */
	protected $version;

	/**
	 * True when this is a Lumen application
	 *
	 * @var bool
	 */
	protected $is_lumen = false;

	/**
	 * Environment Repository.
	 *
	 * @var EnvironmentRepositoryEloquent|null
	 */
	protected $r_environment = null;

	/**
	 * The current environment.
	 *
	 * @var mixed|null
	 */
	protected $environment = null;

	/**
	 * Environment constructor.
	 */
	public function __construct($app = null)
	{
		if (!$app)
		{
			$app = app(); // Fallback when $app is not given
		}
		$this->app = $app;
		$this->version = $app->version();
		$this->is_lumen = str_contains($this->version, 'Lumen');

		$this->r_environment = $this->app->make(
			EnvironmentRepositoryEloquent::class
		);

		$this->environment = $this->r_environment
			->findWhere(
				[
					'domain' => $_SERVER['HTTP_HOST']
				]
			)
			->first();
	}

	/**
	 * Return the current environment reference.
	 *
	 * @return string
	 */
	public function current()
	{
		return $this->currentEnvironment();
	}

	/**
	 * Return the current environment reference.
	 *
	 * @return string
	 */
	public function currentEnvironment()
	{
		return $this->environment->reference;
	}

	/**
	 * Return the current environment id.
	 *
	 * @return int
	 */
	public function currentId()
	{
		return $this->environment->id;
	}

	/**
	 * Return the current environment domain.
	 *
	 * @return string
	 */
	public function currentDomain()
	{
		return $this->environment->domain;
	}
}
