<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

use Cloudways\Server\Service\Service;
$service = new Service();
$service->SetEmail( $_ENV['EMAIL_ADDRESS'] );
$service->SetKey( $_ENV['API_KEY'] );
