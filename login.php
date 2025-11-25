<?php
if (isset($_POST['submitted'])) {
    if ( empty($_POST['username']) || empty($_POST['password'])) {
        echo 'Please fill out all the required fields';
        exit;
    }
    require_once("connectdb.php");
    try {
        $stat = $db->prepare('SELECT password, uid FROM users WHERE username = ?');
        $stat->execute(array($_POST['username']));
        if ($stat->rowCount() > 0) {
            $row = $stat->fetch();
            if (password_verify($_POST['password'], $row['password'])) {
                session_start();
                $_SESSION["username"] = $_POST['username'];
                $_SESSION["uid"] = $row['uid']; 
                header("<Location:homepage class="html"></Location:homepage> ");
                exit();
            } else {
                echo "<p style='color:red'>Error logging in, password does not match</p>";
            }
        } else {
            echo "<p style='color:red'>Error logging in, username not found</p>";
        }
    }
    catch(PDOException $ex) {
        echo "Failed to connect to the database.<br>";
        echo $ex->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login System</title>
        <style>
            body {
            background-color: lightblue;
            }

            h2{
            color: black;
            text-align: center;
            }

            p {
            font-family: verdana;
            font-size: 20px;
            text-align: center;
            }
            form {
                text-align: center;  
            }
            
            input[type="submit"] {
            width: 40%;
            background:rgb(0,170,0);
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
            
            }
            .error {
                color: red;
                text-align: center;
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <br>
        <h2>Log In</h2>
        <br>
        <form method="post" action="login.php">
            <p>Username: <input type="text" name="username" required /></p>
            <p>Password: <input type="password" name="password" required /></p>
            <br><br>
            <input type="submit" value="Log In" /><br><br>
            <input type="hidden" name="submitted" value="true" />
        </form>
        <br>
        <p>Not a user? <a href="register.php">Register Now!</a></p>
    </body>

</html>
