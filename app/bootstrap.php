<?php
// Load Config
require_once 'config/config.php';

// Load Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

// Autoload Core Libraries
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
$_SESSION['isLoggedin'] = 'hidden';
$_SESSION['guest'] = 'hidden';
$_SESSION['is_admin'] = 'hidden';
$_SESSION['is_user'] = '';




if(isset($_SESSION['user_id'])){
  $_SESSION['isLoggedin'] = '';
  if($_SESSION['user_role'] == 1){
    $_SESSION['is_admin'] = '';
    $_SESSION['is_user'] = 'hidden';
  }
}else{
  $_SESSION['guest'] = '';
}

