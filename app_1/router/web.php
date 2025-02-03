<?php
// session_start();
// include "./database/database.php";
// include "./includes/javascript.php";
// include "./includes/css.php";
// include "./includes/libs.php";


// class Router
// {
//     private static $routes = [];

//     public static function route($dir, $file)
//     {
//         self::$routes[$dir] = "$file";
//     }

//     public static function init()
//     {
//         $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//         if ($url == '/') {
//             header('Location: /home');
//             exit();
//         }
//         if (array_key_exists($url, self::$routes)) {
//             include self::$routes[$url];
//         } else {
//             include './404.php';
//         }
//     }
// }

// if (isset($_SESSION['login'])) {
// }

// Router::route("/login", "./views/login.php");
// Router::route("/login-auth", "./controllers/auth/login.php");
// Router::route("/logout-auth", "./controllers/auth/logout.php");

// if (isset($_SESSION['login'])) {
//     Router::route("/home", "./views/home.php");
//     Router::route("/test", "./views/test.php");
//     Router::route("/add-data", "./controllers/DataController.php");
//     Router::route("/add-data", "./controllers/add_data.php");
//     Router::route("/get-data", "./controllers/get_data.php");
//     Router::route("/edit-data", "./controllers/edit_data.php");
//     Router::route("/remove-data", "./controllers/remove_data.php");
// }
// Router::init();
