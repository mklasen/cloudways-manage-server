<?php
require 'main.php';

use function Deployer\get;
use function Deployer\desc;
use function Deployer\task;

desc( 'Restart PHP-FPM on Cloudways server' );
task(
	'deploy:restart-php-fpm',
	function() {
		$hostname  = gethostname();
		$server_id = preg_replace( '/\D/', '', $hostname );

		$get_services     = $service->getServices( $server_id );
		$running_services = reset( $get_services->services );
		foreach ( $running_services as $key => $running_service ) {
			if ( strpos( $key, '-fpm' ) !== false ) {
				$service->manageServices( $server_id, $key, 'restart' );
			}
		}
	}
);
