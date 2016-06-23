<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\TestCase;

class Acceptance extends \Codeception\Module
{
    /**
     * @var array
     */
    protected $settings = [];

    // HOOK: on every Guy class initialization
    public function _after(TestCase $test)
    {
        parent::_after($test);

        if (file_exists(base_path('.env'))) {
            unlink(base_path('.env'));
        }

        switch ($this->settings['l5']['env']['name']) {
            case 'default': {
                if (file_exists(base_path('.env.testing'))) {
                    unlink(base_path('.env.testing'));
                }
                break;
            }
            case 'installer':
            {
                break;
            }
            default: {
                if (file_exists(base_path('.env.' . $this->settings['l5']['env']['name']))) {
                    unlink(base_path('.env.' . $this->settings['l5']['env']['name']));
                }
            }
        }
    }

    // HOOK: before scenario
    public function _before(TestCase $test)
    {
        parent::_before($test);

        if (!file_exists(base_path('.env'))) {
            touch(base_path('.env'));
        }

        switch ($this->settings['l5']['env']['name']) {
            case 'default': {
                if (!file_exists(base_path('.env.testing'))) {
                    copy(
                        base_path($this->settings['l5']['env']['file']),
                        base_path('.env.testing')
                    );
                }

                file_put_contents(base_path('.env'), 'testing');
                break;
            }
            case 'installer':
            {
                break;
            }
            default: {
//                if (!file_exists(base_path('.env.' . $this->settings['l5']['env']['name']))) {
                    copy(
                        base_path($this->settings['l5']['env']['file']),
                        base_path('.env.' . $this->settings['l5']['env']['name'])
                    );
//                }

                file_put_contents(base_path('.env'), $this->settings['l5']['env']['name']);
            }
        }
    }

    // HOOK: before each suite
    public function _beforeSuite($settings = [])
    {
        parent::_beforeSuite($settings);
        $this->settings = $settings;
    }
}
