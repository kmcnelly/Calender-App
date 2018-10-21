<?php

$mysqli = new mysqli('localhost', 'news_user', 'module3', 'news');

if($mysqli->connect_errno) {
    printf("Connection Failed: %s\n", $mysqli->connect_error);
    exit;
}
?>