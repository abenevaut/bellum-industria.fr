<?php // This is global bootstrap for autoloading

define('C3_CODECOVERAGE_ERROR_LOG_FILE', ('/tests/_output/c3_error.log')); //Optional (if not set the default c3 output dir will be used)
include 'c3.php';

define('MY_APP_STARTED', true);

// Could not be integrated in project because of event function conflict between HOA lib and Laravel
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-core.html core"));
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-modules.html modules"));
