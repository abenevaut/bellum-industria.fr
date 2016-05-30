<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
<<<<<<< HEAD
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

   /**
    * Define custom actions here
    */
=======
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class FunctionalTester extends \Codeception\Actor
{

	use _generated\FunctionalTesterActions;

	/**
	 * Define custom actions here
	 */

	/**
	 * @var Faker\Factory|null
	 */
	protected $faker = null;

	public function getfaker()
	{
		if (is_null($this->faker))
		{
			$this->init_faker();
		}

		return $this->faker;
	}

	protected function init_faker()
	{
		$this->faker = Faker\Factory::create();
	}
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406
}
