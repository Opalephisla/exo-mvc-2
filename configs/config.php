<?php
$root = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']);
define('ROOT', $root);
define('_URL', 'http://localhost');
define('_DB_NAME', 'school');
define('_DB_USER', 'root');
define('_DB_PASS', '');
define('_DB_HOST', 'localhost');
define('_DB_PORT', '3306');
define('_DB_CHARSET', 'utf8');
define('_DB_COLLATE', '');
define('_DB_PREFIX', '');
define('_DB_DSN', 'mysql:host=' . _DB_HOST . ';dbname=' . _DB_NAME . ';charset=' . _DB_CHARSET . ';port=' . _DB_PORT);
define('_DB_OPTIONS', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
));
define('_URL_LOGIN', _URL . "/controllerSignInUp/modelLogin");
define('_URL_LOGOUT', _URL . '/controllerSignInUp/modelLogout');
define('_URL_REGISTER', _URL . '/views/viewAddEtudiant.php');
