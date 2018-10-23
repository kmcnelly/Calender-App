<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Login to News</title>
</head>
<body>
    
    <form action ="loggingIn.php" method = "POST"> <br>
    Enter username here: <input type="text" name="user"> <br>
    Enter password here: <input type="password" name="pass"> <br>
    <input type="submit" value = "Login"> </form>
    
    <br>
    
    <form action = "creatingUser.php" method = "POST">
    <input type="submit" value = "Create New User"> 
	</form>
    
    <br>
    
   <!--  <form action = "stories.php" method = "POST">
    <input type="submit" value = "View"> 
	</form> -->
    
</body>
</html>