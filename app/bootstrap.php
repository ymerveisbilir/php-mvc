<?php
require_once "../vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;


$paths = [__DIR__ . '/entity'];

$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver'   => 'localhost',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'CMS',
];

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$connection = DriverManager::getConnection($dbParams, $config);

//Entity object
$entityManager = new EntityManager($connection, $config);