<?php
include_once __DIR__.'/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? null; 
    $phone = $_POST['phone'] ?? null;
    $password1 = $_POST['password1'] ?? null;
    $password2 = $_POST['password2'] ?? null;

    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSuccess = ($password1 === $password2 ?? strlen() > 8);
    $phoneSuccess = (strlen($phone) != 10);

    if ($usernameSuccess && $passwordSuccess && $phoneSuccess) {
        try {
            $connection = Service\DBConnector::getConnection();
        } catch (PDOException $exception) {
            http_response_code(500);
            echo 'A problem occured, contact support';
            exit(42);
        }

        $sql = "INSERT INTO user(username, password) VALUES (\"$username\", \"$password1\")";
        $affected = $connection->exec($sql);

        if (!$affected) {
            echo implode(',', $connection->errorInfo());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="register-exercice.php" method="post">
        <?php if (!($usernameSuccess ?? true)) {?>
        <div>
            <p>You have an error in your username</p>
        </div>
        <?php } ?>
        <label for="username">Your username</label>
        <input type="text" name="username">

        <br>
        
        <?php if (!($phoneSuccess ?? true)) {?>
        <div>
            <p>You have an error in your phone number</p>
        </div>
        <?php } ?>
        <label for="phone">Your phone number</label>
        <input type="tel">

        <br>
        
        <?php if (!($passwordSuccess ?? true)) {?>
        <div>
            <p>You have an error in your password</p>
        </div>
        <?php } ?>
        <label for="password1">Your password:</label>
        <input type="password" name="password1">

        <br>

        <label for="password2">Retype your password:</label>
        <input type="password" name="password2">

        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>