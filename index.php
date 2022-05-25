<?php
require_once("configs/config.php");
if ($_GET['action']) {

    $params = explode("/", $_GET['action']);
    $controller = $params[0];

    if (isset($params[1])) {
        $action = $params[1];
    }

    require_once('controller/' . $controller . '.php');

    if (function_exists($action)) {

        if (isset($params[2]) && isset($params[3])) {

            $action($params[2], $params[3]);
        } else if (isset($params[2])) {

            $action($params[2]);
        } else {
            $action();
        }
    } else {
        echo "404";
    }
} else if (!isset($_SESSION['id'])) {
    require_once('views/viewSignIn.php');
}
