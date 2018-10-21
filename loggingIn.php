<!DOCTYPE html>
<html lang = "en">
<head>
    <title>News</title>
</head>
<body>
    <?php
    require "requireDatabase3.php";
    
    $username = (String) $_POST['user'];
    $password = (String) $_POST['pass'];
    $valid = false; #if valid is false at the end of the file, then an incorrect or no username was entered
    
    $stmt = $mysqli->prepare("select username, password from users");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    
    $stmt->execute();

    $stmt->bind_result($user_table, $pass_table);
    
    while ($stmt->fetch()){ #does it match and username/pass combo?
        if (($username == $user_table) && (password_verify($password, $pass_table))){
            $valid = true;
        }
    }
    
    if ($valid){
        session_start();
        $_SESSION['username'] = $username; #stores the username until the user logs out
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        header("location: stories.php");
        exit;
    }
    else if (!$valid){
        header("location: wrongLogin.php"); 
        exit;
    }
    
    ?>