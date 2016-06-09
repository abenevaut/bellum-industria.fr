<?php namespace Core\Domain\Environments;

use Illuminate\Database\DatabaseManager;

/**
 * Class Environment
 * @package Core\Domain\Environments
 */
class Environment
{

	/**
	 * Registry config
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * Database manager instance
	 *
	 * @var \Illuminate\Database\DatabaseManager
	 */
	protected $database;

	/**
	 * The current environment.
	 *
	 * @var mixed|null
	 */
	protected $environment = null;

	/**
	 * Constructor
	 *
	 * @param DatabaseManager $database
	 */
	public function __construct(DatabaseManager $database, $config = array())
	{
		$this->database = $database;
		$this->config = $config;

		$this->loadEnvironment();
	}

	/**
	 * Load information about current environment.
	 */
	protected function loadEnvironment()
	{
		$current_domain = defined('CODECEPT_RUN_TRUE') && CODECEPT_RUN_TRUE
			? CODECEPT_SERVER_NAME
			: $_SERVER['SERVER_NAME'];

		$this->environment = $this->database
			->table('environments')
			->where('domain', $current_domain)
			->first(['id', 'name', 'reference', 'domain']);
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
