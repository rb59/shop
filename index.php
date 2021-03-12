<?php #cd
session_start();
require_once 'config/config.php';
require_once 'classes/controller.php';
require_once 'classes/model.php';
require_once 'Routes/Routes.php';
require_once 'controllers/productcontroller.php';
require_once 'controllers/usercontroller.php';
require_once 'controllers/logincontroller.php';
require_once 'controllers/cartcontroller.php';
require_once 'controllers/ratingcontroller.php';

(new Config)->defineconf();
$app = new Routes();

?>