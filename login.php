<?php
session_start();

$error = '';

if (isset($_POST['submitted'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = 'Please fill out all the required fields';
    } else {
        require_once("connectdb.php");
        try {
            $stat = $db->prepare('SELECT password, uid FROM users WHERE username = ?');
            $stat->execute(array($_POST['username']));

            if ($stat->rowCount() > 0) {
                $row = $stat->fetch(PDO::FETCH_ASSOC);

                if (password_verify($_POST['password'], $row['password'])) {
                    $_SESSION["username"] = $_POST['username'];
                    $_SESSION["uid"] = $row['uid'];

                    // Redirect to homepage.html
                    header("Location: homepage.html");
                    exit();
                } else {
                    $error = "Error logging in, password does not match";
                }
            } else {
                $error = "Error logging in, username not found";
            }
        } catch (PDOException $ex) {
            $error = "Failed to connect to the database: " . $ex->getMessage();
        }
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
            background: rgb(0,170,0);
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: rgb(0,140,0);
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
            font-family: verdana;
        }
    </style>
</head>
<body>
    <br>
    <h2>Log In</h2>
    <br>

    <?php if (!empty($error)): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

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
