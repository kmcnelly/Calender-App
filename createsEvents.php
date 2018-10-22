<?php
    session_start();

        require 'requireDatabase5.php';
        // $stmt = $mysqli->prepare("select username from users;");
        // if(!$stmt){
        //     printf("Query Prep Failed: %s\n", $mysqli->error);
        //     exit;
        // }
        
        // $stmt->execute();

        // $stmt->bind_result($u);

        // while ($stmt->fetch()) {
        //     echo $u;
        // }
        // $stmt->close();
  
    $token = $_SESSION['token'];
    $user = $_SESSION['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $tags = $_POST['tags'];
        
        $stmt = $mysqli->prepare("insert into events (date, time, title, description, tags, uid) values (?, ?, ? ,? ,? ,?);");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
        $stmt->bind_param('sssssi', $date, $time, $title, $desc, $tags, $user);
        
        $stmt->execute();
        
        $stmt->close();
        
        // $stmt = $mysqli->prepare("select * from events;");
        // if(!$stmt){
        //     printf("Query Prep Failed: %s\n", $mysqli->error);
        //     exit;
        // }
        // $stmt->execute();

        // $stmt->bind_result($u);

        // while ($stmt->fetch()) {
        //     echo $u;
        // }
        // $stmt->close();
        
        
        // header("location: calendar.php");
?>