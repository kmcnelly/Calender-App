<?php
session_start();
    require "requireDatabase5.php";
    if($_GET['date'] != null){
        $date = $_GET['date'];
    }
    else{
        $date = "old_value";
    }
    if($_GET['title'] != null){
        $title = $_GET['title'];
    }
    else{
        $title = "old_value";
    }
    if($_GET['time'] != null){
        $time = $_GET['time'];
    }
    else{
        $time = "time";
    }
    if($_GET['description'] != null){
        $description = $_GET['description'];
    }
    else{
        $description = "description";
    }
    if($_GET['tags'] != null){
        $tags = $_GET['tags'];
    }
    elseif($_GET['tags'] == 'none'){
        $tags = '';
    }
    else{
        $tags = "old_value";
    }
 
        $stmt = $mysqli->prepare("update events set date = ?,
                                                    time = ?,
                                                    title = ?,
                                                    description = ?,
                                                    tags = ? 
                                                where eid=?");
        if(!$stmt){ #remove all of their comments
            printf("Query Prep Failed8: %s\n", $mysqli->error);
            exit;
        }
        $stmt->bind_param('sssssi', $_GET['date'], $_GET['time'], $_GET['title'], $_GET['description'], $_GET['eid']);
        $stmt->execute();
        $stmt->close();

?>