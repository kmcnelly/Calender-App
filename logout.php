<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Logout</title>
</head>
<body>
    <?php
    session_start();
    session_destroy(); #removes all session variables
    echo "You have successfully logged out or deleted your account"
    ?>
    <br>
    <form action="login.php">
        <input type="submit" class = button value="< Return">
    </form>
</body>
</html>