<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Create User</title>
</head>
<body>
    <?php
        require 'requireDatabase5.php';

        $username = (String) $_POST['user'];
        $password = (String) $_POST['password'];

        $pwhash = password_hash($password, PASSWORD_DEFAULT);

        
        $stmt = $mysqli->prepare("insert into users (username, password) values (?, ?);");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
        $stmt->bind_param('ss', $username, $pwhash);
        
        $stmt->execute();
        
        $stmt->close();
        
        header('calendar.html')
    ?>
</body>
</html>