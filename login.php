<?php
session_start(); // Start the session to store user info after login

// Dummy user data for login (in real-world use, this would come from a database)
$valid_users = [
    'user1' => 'password123', // username => password
    'user2' => 'mypassword'
];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the entered username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists and the password matches
    if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
        $_SESSION['username'] = $username; // Store the username in the session
        header('Location: index.html'); // Redirect to a welcome page
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Team Inky</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: white;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .login-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #8c0000;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #a50000;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login to Team Inky</h2>
    <?php
    if (isset($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
