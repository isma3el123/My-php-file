<?php
$username = "";
$age = "";
$email = "";
$password = "";
$confpassword = "";
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confpassword = trim($_POST['confpassword']);

    if (empty($username)) {
        $error['username'] = "Username is required";
    }

    if (empty($email)) {
        $error['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email format";
    }

    if (empty($age)) {
        $error['age'] = "Age is required";
    } elseif (!is_numeric($age)) {
        $error['age'] = "Age must be a number";
    }

    if (empty($password)) {
        $error['password'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $error['password'] = "Password must be at least 6 characters long";
    }

    if (empty($confpassword)) {
        $error['confpassword'] = "Confirm password is required";
    } elseif ($password != $confpassword) {
        $error['confpassword'] = "Passwords don't match";
    }

    if (empty($error)) {
        echo "<h2 style='color: green; text-align: center;'>You have registered successfully 🎉</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validation</title>
    <link rel="stylesheet" href="validation.css">
</head>
<body>
    <div class="form-container">
        <h1>Register Form</h1>

        <form action="submmition.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= htmlspecialchars($username) ?>">
            <?php if(isset($error['username'])): ?>
                <p class="error"><?= $error['username'] ?></p>
            <?php endif; ?>

            <label for="age">Age</label>
            <input type="text" name="age" id="age" value="<?= htmlspecialchars($age) ?>">
            <?php if(isset($error['age'])): ?>
                <p class="error"><?= $error['age'] ?></p>
            <?php endif; ?>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
            <?php if(isset($error['email'])): ?>
                <p class="error"><?= $error['email'] ?></p>
            <?php endif; ?>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <?php if(isset($error['password'])): ?>
                <p class="error"><?= $error['password'] ?></p>
            <?php endif; ?>

            <label for="confpassword">Confirm Password</label>
            <input type="password" name="confpassword" id="confpassword">
            <?php if(isset($error['confpassword'])): ?>
                <p class="error"><?= $error['confpassword'] ?></p>
            <?php endif; ?>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
