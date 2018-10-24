<?php
session_start();
    require "requireDatabase5.php";
 
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
        $stmt->bind_param('i', $_GET['eid']);
        $stmt->execute();
        $stmt->close();

?>