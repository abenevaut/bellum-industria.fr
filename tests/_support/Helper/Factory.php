<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use League\FactoryMuffin\FactoryMuffin as FactoryMuffin;
use League\FactoryMuffin\Faker\Facade as Faker;

class Factory extends \Codeception\Module
{
<<<<<<< HEAD
    /**
     * @var \League\FactoryMuffin\Factory
     */
    protected $factory;

    const M_USER = '\CVEPDB\Repositories\Users\User';
    const M_ROLE = '\CVEPDB\Repositories\Roles\Role';
    const M_PERMISSION = '\CVEPDB\Repositories\Permissions\Permission';
    const M_LOGCONTACT = 'App\Admin\Repositories\Users\LogContact';

    public function _initialize()
    {
        $this->factory = new FactoryMuffin;

        $this->factory->define(self::M_USER, array(
            'email' => 'unique:email', // random unique email
        ));
    }

    public function haveUsers($num)
    {
        $this->factory->seed($num, self::M_USER);
    }

    public function haveLogContact($num)
    {
        $this->factory->seed($num, self::M_LOGCONTACT);
    }

    public function produce($model, $attributes = array())
    {
        return $this->factory->create($model, $attributes);
    }

    public function _after(\Codeception\TestCase $test)
    {
        // actually this is not needed
        // if you use cleanup: true option
        // in Laravel module
        $this->factory->deleteSaved();
    }
=======

	/**
	 * @var \League\FactoryMuffin\Factory
	 */
	protected $factory;

	const M_USER = '\CVEPDB\Repositories\Users\User';
	const M_ROLE = '\CVEPDB\Repositories\Roles\Role';
	const M_PERMISSION = '\CVEPDB\Repositories\Permissions\Permission';
	const M_LOGCONTACT = 'App\Admin\Repositories\Users\LogContact';

	public function _initialize()
	{
		$this->factory = new FactoryMuffin;

		$this->factory->define(self::M_USER, array(
			'email' => 'unique:email', // random unique email
		));
	}

	public function haveUsers($num)
	{
		$this->factory->seed($num, self::M_USER);
	}

	public function haveLogContact($num)
	{
		$this->factory->seed($num, self::M_LOGCONTACT);
	}

	public function produce($model, $attributes = array())
	{
		return $this->factory->create($model, $attributes);
	}

	public function _after(\Codeception\TestCase $test)
	{
		// actually this is not needed
		// if you use cleanup: true option
		// in Laravel module
		$this->factory->deleteSaved();
	}
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406
}
