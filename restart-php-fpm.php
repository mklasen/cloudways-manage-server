<?php
require 'main.php';

$hostname  = gethostname();
$server_id = preg_replace( '/\D/', '', $hostname );

$get_services     = $service->getServices( $server_id );
$running_services = reset( $get_services->services );
foreach ( $running_services as $key => $running_service ) {
	if ( strpos( $key, '-fpm' ) !== false ) {
		$service->manageServices( $server_id, $key, 'restart' );
	}
}
