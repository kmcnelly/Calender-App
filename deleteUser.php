<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Delete User</title>
</head>
<body>
    <!-- To ensure that the user wants to delete their user, password and username are required-->
    <form action ="deletingUser.php" method = "POST"> <br>
    Enter username here: <input type="text" name="user"> <br>
    Enter password here: <input type="password" name="pass"> <br>
    <input type="submit" value = "Confirm Delete"> </form>
    
    <br>
    <br>
    
    <form action = "calendar.html" method = "POST">
    <input type="submit" value = "< Back"> 
	</form>
    
</body>
</html>