<?php #cd
session_start();
require_once 'Config/Config.php';
require_once 'Classes/Controller.php';
require_once 'Classes/Model.php';
require_once 'Routes/Routes.php';
require_once 'Controllers/ProductController.php';
require_once 'Controllers/UserController.php';
require_once 'Controllers/LoginController.php';
require_once 'Controllers/CartController.php';
require_once 'Controllers/RatingController.php';

(new Config)->defineconf();
$app = new Routes();

?>