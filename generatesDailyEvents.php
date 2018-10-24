<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php

require 'requireDatabase5.php';

$stmt = $mysqli->prepare("select time, title, description, tags, eid from events where date = ? and uid = ?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('si', $_GET['date'], $_SESSION['id']);
    $stmt->execute();

    $result = $stmt->get_result();

// echo $_SESSION['id'];
// echo $_GET['date'];
echo "<p>Events for ";
echo $_GET['date'];
echo "</p>
<table id='eventsday'>
<tr>
<th>Time</th>
<th>Title</th>
<th>Description</th>
<th>Tags</th>
<th>Delete?</th>
<th>Modify?</th>
</tr>";
$i = 0;
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    //echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['tags'] . "</td>";
    echo "<td> <input type='submit' value='delete' id = 'del".$i."'></td>";
    echo "<script>
    function delete(){
        if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('feedback').innerHTML = this.responseText;
                }
            };
            xmlhttp.open('GET','deleteEvents.php?eid=".$row['eid'].",false);
            xmlhttp.send();
    }
    document.getElementById('del".$i."').addEventListener('click',delete,false);
    </script>";
    echo "<td> <input type='submit' value='modify'></td>";
    echo "</tr>";
}
echo "</table>";
$stmt->close();
?>
</body>
</html> 