<?php namespace bellumindustria\Console\Commands;

use Illuminate\Console\Command;
use bellumindustria\App\Services\AppGitHash;

class BellumIndustriaVersionCommand extends Command
{

	/**
	 * Command name.
	 *
	 * @var string
	 */
	protected $name = 'bellumindustria:version';

	/**
	 * Command signature.
	 *
	 * @var string
	 */
	protected $signature = 'bellumindustria:version {--d|with-date : Display date and time in version}';

	/**
	 * Command description.
	 *
	 * @var string
	 */
	protected $description = 'Create or update version config file';

	/**
	 * Execute command.
	 */
	public function handle() {
		if (app()->environment('local'))
		{

			$with_date = $this->option('with-date');

			$version = AppGitHash::get($with_date);

			$this->info("Version {$version}");

			/**
			 *
			 */

			$file = base_path('config/versiongenerated.php');

			$bytes_written = \File::put($file, "<?php return ['version' => '" . $version . "'];");

			if ($bytes_written === false)
			{
				$this->error("Error writing to file");
			}
		}
		else
		{
			$this->error('You must to be in "local" environment to use this command!');
		}
	}
}
