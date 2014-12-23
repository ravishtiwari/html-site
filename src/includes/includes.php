<?php
/**
 * Created by PhpStorm.
 * User: ravish
 * Date: 12/19/14
 * Time: 12:29 PM
 */
session_name('KED-DEMO');
session_start();
/**
 * Enable Error Reporting
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);
/**
 * Load Config
 */
require_once("config.php");

$path = dirname(__DIR__).DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."classes";

/**
 * Load Class Auto Loader
 */
require_once $path.'/KED/Bootstrap.php';
KED\Bootstrap::init($path);

$db = KED\Core\DB\Database::getInstance();

require_once('functions.php');

