<?php
session_start();
    require "requireDatabase5.php";
    $stmt = $mysqli->prepare("select date, time, title, description, tags from events where eid = ? and uid = ? order by time");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('ii', $_POST['eid'], $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($d,$tm,$tt,$dc,$tg);

    //this checks to see if it's being handed a null, if it is, it uses the old value, otherwise it uses the new value.
    if($_POST['date'] != ''){
        $date = $_POST['date'];
        echo $date;
    }
    else{
        $date = $d;
    }
    if($_POST['title'] != ''){
        $title = $_POST['title'];
        echo $tt;
    }
    else{
        $title = $tt;
        echo $tt;
    }
    if($_POST['time'] != ''){
        $time = $_POST['time'];
    }
    else{
        $time = $tm;
    }
    if($_POST['description'] != ''){
        $description = $_POST['description'];
    }
    else{
        $description = $dc;
    }
    if($_POST['tags'] != ''){
        $tags = $_POST['tags'];
    }
    else{
        $tags = $tg;
    }
 
    // $stmt = $mysqli->prepare("update events set date=?, time=?, title=?, description=?, tags=? where eid=?");
    //     if(!$stmt){
    //         printf("Update Query Prep Failed: %s\n", $mysqli->error);
    //         exit;
    //     }
    //     $stmt->bind_param('sssssi', $date, $time, $title, $description, $tags, $_POST['eid']);
    //     $stmt->execute();
    //     $stmt->close();

?>