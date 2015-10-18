ApiAuth
=======

	php composer.phar require jhonmike/apigility-auth:dev-master

Config Oauth2
------

Create config/autoload/user.global.php

	<?php
	return array(
		'db' => array(
	        'adapters' => array(
	            'Db\\Adapter' => array(
	                'driver' => 'Pdo_Mysql',
	                'dsn' => 'mysql:dbname=database_name;host=localhost',
	                'username' => 'root',
	    			'password' => '',
	    			'driver_options' => array(
			        	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
			   		),
	            ),
	        ),
	    )
	);

Create config/autoload/oauth2.global.php

	<?php
	return array(
	    'zf-oauth2' => array(
	        'db' => array(
	            'dsn' => 'mysql:dbname=database_name;host=localhost',
	            'username' => 'root',
	            'password' => '',
	        ),
	        'storage' => 'ZF\\OAuth2\\Adapter\\PdoAdapter',
	        'allow_implicit' => false,
	        'enforce_state'  => true,
	        'access_lifetime' => 3600,
	    ),
	);
