<?php namespace Core\Domain\Settings\Repositories;

/**
 * Class LogoSettingsRepository
 * @package Core\Domain\Settings\Repositories
 */
class LogoSettingsRepository
{

	/**
	 * @var SettingsRepository|null
	 */
	protected $r_settings = null;

	/**
	 * LogoSettingsRepository constructor.
	 */
	public function __construct(SettingsRepository $r_settings)
	{
		$this->r_settings = $r_settings;
	}
	
	public function generateLogo()
	{
		
	}
	
	public function generateFavIco()
	{
		
	}
}
