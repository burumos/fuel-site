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

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'top/index',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

    '/' => ['top/index', 'name' => 'top'],

    'login' => ['login/index', 'name' => 'login'],
    'login/success' => ['login/success', 'name' => 'success_login'],
    'signin' => ['login/sign_in', 'name' => 'signin'],
    'signin/success' => ['login/success_sign_in', 'name' => 'success_signin'],
    'logout' => ['login/logout', 'name' => 'logout'],

    'nico' => ['nico/index', 'name' => 'nico'],
);
