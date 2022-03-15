<?php 
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_PATH') ? null : define('SITE_PATH', 'D:' . DS .  'XAMPP' . DS . 'htdocs' . DS . 'gallery');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_PATH . DS . 'admin' . DS . 'includes');
defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_PATH . DS . 'admin' . DS . 'images' . DS);

require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("session.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");

?>