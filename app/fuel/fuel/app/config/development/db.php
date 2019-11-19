<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * -----------------------------------------------------------------------------
 *  Database settings for development environment
 * -----------------------------------------------------------------------------
 *
 *  These settings get merged with the global settings.
 *
 */

return array(
	'default' => array(
        'type' => 'mysql',
		'connection' => array(
			'dsn'      => 'mysql:host=fuel-mysql;dbname=fuel',
            'hostname' => 'localhost',
            'port' => '3306',
            'database' => 'fuel',
			'username' => 'fuel',
			'password' => 'mysql-password',
            'persistent' => false,
            'compress' => false,
		),
	),
);
