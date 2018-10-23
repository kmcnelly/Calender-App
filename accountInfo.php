<?php
session_start()
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Account Management</title>
</head>
<body>
<p id='currentuser'></p>
<input type = "submit" id = "events" value = "See a list of my events">
<input type = "submit" id = "pwd" value = "Change password">
<input type = "submit" id = "delete" value = "Delete My Account">
<p id='feedback'></p>
<script>
function writeUser(){
  let username = <?php echo json_encode($_SESSION['username']); ?>;
  let newthing = "Hi " + username + ", what would you like to do today?"; 
  document.getElementById('currentuser').innerHTML = newthing;
}
function getEvents(){
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("feedback").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","generatesUserEvents.php",false);
        xmlhttp.send();
}
function deleteUser(){
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("feedback").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","deleteUser.php",false);
        xmlhttp.send();
}
document.addEventListener("DOMContentLoaded", writeUser, false);
document.getElementById("events").addEventListener("click", getEvents, false);
document.getElementById("delete").addEventListener("click", deleteUser, false);
</script>
</body>
</html>