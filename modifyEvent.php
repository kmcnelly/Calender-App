<?php
session_start();
    require "requireDatabase5.php";
    $stmt = $mysqli->prepare("select date, time, title, description, tags from events where eid = ? and uid = ?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('ii', $_POST['eid'], $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    // $stmt->bind_result($d,$tm,$tt,$dc,$tg);
    // echo $row['date'];
    // echo $row['time'];
    // echo $row['title'];
    // echo $row['description'];
    // echo $row['tags'];
    //this checks to see if it's being handed a null, if it is, it uses the old value, otherwise it uses the new value.
    if($_POST['date'] != ''){
        $date = $_POST['date'];
        //echo $date;
    }
    else{
        $date = $row['date'];
    }
    if($_POST['title'] != ''){
        $title = $_POST['title'];

    }
    else{
        $title = $row['title'];
  
    }
    if($_POST['time'] != ''){
        $time = $_POST['time'];
    }
    else{
        $time = $row['time'];
    }
    if($_POST['description'] != ''){
        $description = $_POST['description'];
    }
    else{
        $description = $row['description'];
    }
    if($_POST['tags'] != ''){
        $tags = $_POST['tags'];
    }
    else{
        $tags = $row['tags'];
    }
 
    $stmt = $mysqli->prepare("update events set date = ?,
                                                time = ?,
                                                title = ?,
                                                description = ?,
                                                tags = ?
                                                where eid=?");
        if(!$stmt){
            printf("Query Prep Failed8: %s\n", $mysqli->error);
            exit;
        }
        $stmt->bind_param('sssssi', $date, $time, $title, $description, $tags, $_POST['eid']);
        $stmt->execute();
        $stmt->close();

?>