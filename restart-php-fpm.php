<?php
require 'main.php';

$servers = $service->getServers();

foreach ( $servers as $server ) {
	if ( is_array( $server ) && ! empty( $server ) ) {
		$object = reset( $server );

		$hostname = gethostname();
		$server_id = preg_replace('/\D/', '', $hostname);

		if ( $object->id === $server_id ) {
			$get_services = $service->getServices( $object->id );
			$running_services     = reset( $get_services->services );
			foreach ( $running_services as $key => $running_service ) {
				if ( strpos( $key, '-fpm' ) !== false ) {
					$service->manageServices( $object->id, $key, 'restart' );
				}
			}
		}
	}
}
