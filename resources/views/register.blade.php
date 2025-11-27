<?php
if (isset($_POST['submitted'])) {
    require_once('connectdb.php');

    
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    
    if ( empty($username) || empty($password) || empty($email)) {
        echo "Please fill all fields!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red'>Please enter a valid email address.</p>";
        exit;
    }

    try {
        
        $stmt = $db->prepare("SELECT uid FROM users WHERE username = ?");
        $stmt->execute(array($username));
        
        if ($stmt->rowCount() > 0) {
            exit("Username already exists.");
        }
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stat = $db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stat->execute(array( $username, $hashed_password, $email));

        $id = $db->lastInsertId();
        echo "Congratulations! You are now registered. Your ID is: $id";
    }
    catch (PDOException $ex) {
        echo "Sorry, a database error occurred! <br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration System</title>
        <p>Register now and share your recipes with the world!</p>
        <br>
        <style>
            body {
            background-color: lightblue;
            }

            h2 {
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
            background:rgb(255, 127, 80);
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
        <h2>Register</h2>
        <br>
        <form method="post" action="register.php">
            
            <p>Username: <input type="text" name="username" required /></p>
            <p>Password: <input type="password" name="password" minlength="5" required /></p>
            <p>Email: <input type="email" name="email" required /></p>
            <br>
            <input type="submit" value="Register" /><br><br>
            <input type="hidden" name="submitted" value="true"/>
        </form>
        <br>
        <p>Already a user? <a href="login.php">Log in</a></p>
    </body>
</html>