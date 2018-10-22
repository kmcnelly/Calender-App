<?php

$mysqli = new mysqli('ec2-18-222-254-43.us-east-2.compute.amazonaws.com', 'calman', 'sandvich1', 'module5');

if($mysqli->connect_errno) {
    printf("Connection Failed: %s\n", $mysqli->connect_error);
    exit;
}
?>