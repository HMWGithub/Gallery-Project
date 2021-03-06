<?php 
  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  define('SITE_PATH', $_SERVER['DOCUMENT_ROOT'] . DS . 'Gallery'. DS .'gallery'); // Live
  defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_PATH . DS . 'admin' . DS . 'includes');
  defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_PATH . DS . 'admin' . DS . 'images');

  ob_start();

  require_once(INCLUDES_PATH.DS."functions.php");
  require_once(INCLUDES_PATH.DS."new_config.php");
  require_once(INCLUDES_PATH.DS."database.php");
  require_once(INCLUDES_PATH.DS."db_object.php");
  require_once(INCLUDES_PATH.DS."user.php");
  require_once(INCLUDES_PATH.DS."photo.php");
  require_once(INCLUDES_PATH.DS."comment.php");
  require_once(INCLUDES_PATH.DS."session.php");
  require_once(INCLUDES_PATH.DS."paginate.php");
?>