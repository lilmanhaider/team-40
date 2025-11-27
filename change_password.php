<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once "connectdb.php";

$error = '';
$success = '';

if (isset($_POST['submitted'])) {
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $error = "Please fill out all fields.";
    } elseif ($newPassword !== $confirmPassword) {
        $error = "New passwords do not match.";
    } elseif (strlen($newPassword) < 6) {
        $error = "New password must be at least 6 characters.";
    } else {
        try {
            $uid = $_SESSION['uid'];

            $stat = $db->prepare("SELECT password FROM users WHERE uid = ?");
            $stat->execute([$uid]);

            if ($stat->rowCount() === 1) {
                $row = $stat->fetch(PDO::FETCH_ASSOC);

                if (!password_verify($currentPassword, $row['password'])) {
                    $error = "Current password is incorrect.";
                } else {
                    $newHash = password_hash($newPassword, PASSWORD_DEFAULT);

                    $update = $db->prepare("UPDATE users SET password = ? WHERE uid = ?");
                    if ($update->execute([$newHash, $uid])) {
                        $success = "Password successfully updated.";
                    } else {
                        $error = "Failed to update password. Please try again.";
                    }
                }
            } else {
                $error = "User not found.";
            }
        } catch (PDOException $ex) {
            $error = "Database error: " . $ex->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <style>
        body {
            background-color: lightblue;
            font-family: verdana;
        }
        h2 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        p {
            font-size: 18px;
        }
        input[type="password"], input[type="submit"] {
            padding: 0.5rem;
            border-radius: 6px;
            border: 1px solid #666;
            font-size: 1rem;
        }
        input[type="submit"] {
            width: 40%;
            background: rgb(0,170,0);
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 1rem;
        }
        input[type="submit"]:hover {
            background: rgb(0,140,0);
        }
        .error, .success {
            text-align: center;
            margin-bottom: 1rem;
        }
        .error {
            color: red;
        }
        .success {
            color: darkgreen;
        }
        .link {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <h2>Change Password</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <form method="post" action="change_password.php">
        <p>Current Password: <input type="password" name="current_password" required></p>
        <p>New Password: <input type="password" name="new_password" required></p>
        <p>Confirm New Password: <input type="password" name="confirm_password" required></p>
        <input type="submit" value="Update Password">
        <input type="hidden" name="submitted" value="true">
    </form>

    <div class="link">
        <p><a href="profile.php">Back to Profile</a></p>
    </div>
</body>
</html>
