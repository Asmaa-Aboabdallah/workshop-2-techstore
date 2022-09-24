<?php

// paths & urls
// settings  define as constant
// $path = __DIR__ . "/"; // absolute path

define("PATH", __DIR__ . "/"); // includs , require
define("URL", "http://localhost/techstore/"); // assets , href , header(), src

// Admin 
define("APATH", __DIR__ . "/admin/"); // includs , require
define("AURL", "http://localhost/techstore/admin/"); 

// db credentials
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "techstore");

// include classes
// require_once(PATH . "classes/Request.php");
// require_once(PATH . "classes/Session.php");
// require_once(PATH . "classes/Db.php");
// require_once(PATH . "classes/Models/Cat.php");
// require_once(PATH . "classes/Models/Order.php");
// require_once(PATH . "classes/Models/OrderDetail.php");
// require_once(PATH . "classes/Models/Product.php");
// require_once(PATH . "classes/validation/ValidationRule.php");
// require_once(PATH . "classes/validation/Required.php");
// require_once(PATH . "classes/validation/Str.php");
// require_once(PATH . "classes/validation/Numeric.php");
// require_once(PATH . "classes/validation/Email.php");
// require_once(PATH . "classes/validation/Max.php");
// require_once(PATH . "classes/validation/Validator.php");
//After creating Auto loader
require_once(PATH. "vendor/autoload.php");


use TeachStore\Classes\Request;
use TeachStore\Classes\Session;

// objects
$request = new Request;
$session = new Session;