<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Create User</title>
</head>
<body>
 <?php
	require 'requireDatabase3.php';

	$valid = true; #in this file, tracks if the username is already taken

	$username = (String) $_POST['user'];
	$password = (String) $_POST['password']; #this page creates a new user using supplied information
    $email = (String) $_POST['email'];
    
    if (empty($username) || empty($password)){ #the user must have filled out both a username and password
        header("location: wrongLoginNews.php");
        exit;
    }
 
 $password = password_hash($password, PASSWORD_DEFAULT);
 
 $stm = $mysqli->prepare("select username from users"); #this ensures a usrename is not repeated
    if(!$stm){
    	printf("Query Prep Failed: %s\n", $mysqli->error);
    	exit;
    }
    $stm->execute();
    $stm->bind_result($user_table);
    while ($stm->fetch()){
        if ($username == $user_table){
            $valid = false;
        }
    }

		$stmt = $mysqli->prepare("insert into users (username, password, email) values (?, ?, ?)");
		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		} #actually inserts the user into the database
		$stmt->bind_param('sss', $username, $password, $email);
		$stmt->execute();
		$stmt->close();  

	if (!$valid) {
        header("location: wrongLoginNews.php");
        exit;
    }
    else{
         if (mail($email, "Confirmation Email", "If you have recieved this message, then your email has connected to an account created on a simple news site. The site will notify you of any comment activity regarding your posts") ){
            header("Location: loginNews.php");
            exit;
        }
        else {
            echo "Email confirmation failed, but user created
                 <form action=\"loginNews.php\">
                 <input type=\"submit\" class = button value=\"< Return\">
                 </form>";
        }
    }
 ?>

</body>
</html>