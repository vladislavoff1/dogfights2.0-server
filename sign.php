<?php

require('config.php');

function __autoload($class_name) {
    include $class_name . '.php';
}

$fb_id = filter_input(INPUT_GET, 'fb_id', FILTER_VALIDATE_INT);

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
if ($mysqli->connect_errno) {
    echo "Can't connect to MySQL: " . $mysqli->connect_error;
}

$mysqli->query(
    "INSERT INTO user (fb_id)
     VALUE('$fb_id') 
     ON DUPLICATE KEY UPDATE
     last_act = CURRENT_TIMESTAMP     
    "
);
$res = $mysqli->query("SELECT * FROM user WHERE fb_id = '$fb_id'");
$row = $res->fetch_assoc();

$user = new User($row);

echo $user->toJSON();