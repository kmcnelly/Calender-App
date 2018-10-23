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

$stmt = $mysqli->prepare("select date, time, title, description, tags from events where uid = ?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();

    $result = $stmt->get_result();


echo "<table>
<tr>
<th>Date</th>
<th>Time</th>
<th>Title</th>
<th>Description</th>
<th>Tags</th>
<th>Delete?</th>
<th>Modify?</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['tags'] . "</td>";
    echo "<td> <input type='submit' value='delete'></td>";
    echo "<td> <input type='submit' value='modify'></td>";
    echo "</tr>";
}
echo "</table>";
$stmt->close();
?>
</body>
</html> 