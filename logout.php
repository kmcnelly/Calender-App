<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Logout</title>
</head>
<body>
<?php
    if($_SESSION['id']){
    session_destroy(); #removes all session variables
    echo "You have successfully logged out";
    }
    else{
    session_destroy();
    echo "You have successfully deleted your account.";
    }
    ?>
    <br>
    <form action="calendar.php">
        <input type="submit" class = button value="Return to home">
    </form>
</body>
</html>