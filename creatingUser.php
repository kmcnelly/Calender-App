<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Create User</title>
</head>
<body>
<!--This page simply gets the desired username and password from the user and redirects the user through the new user creation process-->
    <form action = "createuser.php" method = "POST">   
    	<br>
    	<p>Enter new username here: <input type="text" name = "user"> </p>
    	<p>Enter new password here: <input type="password" name = "password"> </p>
    	<!-- <br> -->
    	<!-- <p>*Optional. Enter email address: <input type="email" name = "email"></p>
    	<br> -->
    	<input type="submit" value = "Create"> 
	</form>
</body>
</html>