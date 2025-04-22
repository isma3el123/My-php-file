<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="submit.css">
    <title>Post Submit</title>
    
</head>
<body>
    <div class="container">
        <?php
        $username = $email = $age = $password = "";

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $age = htmlspecialchars($_POST['age']);
            $password = htmlspecialchars($_POST['password']);
        }
        ?>
        
        <h2>Submitted Information</h2>
        <div class="info">
            <p><span>Username:</span> <?= $username ?></p>
            <p><span>Email:</span> <?= $email ?></p>
            <p><span>Age:</span> <?= $age ?></p>
            <p><span>Password:</span> <?= $password ?></p>
        </div>
    </div>
</body>
</html>
