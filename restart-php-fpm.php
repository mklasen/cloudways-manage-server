<?php
require 'main.php';

$servers = $service->getServers();

foreach ( $servers as $server ) {
	if ( is_array( $server ) && ! empty( $server ) ) {
		$object = reset( $server );
		if ( isset( $_SERVER['USER'] ) && $object->label === $_SERVER['USER'] ) {
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
