<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use League\FactoryMuffin\FactoryMuffin as FactoryMuffin;
use League\FactoryMuffin\Faker\Facade as Faker;

class Factory extends \Codeception\Module
{
    /**
     * @var \League\FactoryMuffin\Factory
     */
    protected $factory;

    const m_user = '\CVEPDB\Repositories\Users\User';
    const m_role = '\CVEPDB\Repositories\Roles\Role';
    const m_permission = '\CVEPDB\Repositories\Permissions\Permission';

    public function _initialize()
    {
        $this->factory = new FactoryMuffin;

        $this->factory->define(self::m_user, array(
            'email' => 'unique:email', // random unique email
        ));
    }

    public function haveUsers($num)
    {
        $this->factory->seed($num, self::m_user);
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
}
