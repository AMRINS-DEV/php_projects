<?php
session_start();
include "./includes/javascript.php";
include "./includes/css.php";
include "./includes/libs.php";

include "./database/database.php";

include "./functions/Response.php";
include "./functions/Request.php";
include "./functions/Assets.php";

include "./router/router.php";


Router::post('/auth', 'LoginController', 'login');
Router::get('/login', 'LoginController', 'index');
Router::get('/logout', 'LogoutController', 'logout');


if (isset($_SESSION['user_id'])) 
{
    Router::get('/dashboard', 'DashboardController', 'index');

    Router::post('/get_data', 'DataController', 'getData');
}


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$parts = explode('?', $uri);
$first_part = $parts[0];

if ($uri == '/') {
    header("Location: /dashboard");
}

Router::handleRequest($first_part, $method);
