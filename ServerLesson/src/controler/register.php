<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? null;
    $password1 = $_POST['password1'] ?? null;
    $password2 = $_POST['password2'] ?? null;

    echo 'Validate data';
    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSuccess = ($password1 === $password2 ?? strlen() > 8);

    if ($passwordSuccess && $username){
        echo 'Yeah';
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
    <form action="" method="POST">
        <?php if (!($usernameSuccess ?? true)) {?>
        <div>
            <p>You have an error in your username</p>
        </div>
        <?php } ?>
        <label for="username">Your username:</label>
        <input type="text" name="username" value="<?php echo htmlentities($username) ?? null ; ?>">

        <br>

        <?php if (!($passwordSuccess ?? true)) {?>
        <div>
            <p>You have an error in your password</p>
        </div>
        <?php } ?>
        <label for="password1">Your password:</label>
        <input type="text" name="password1">
        <br>
        <label for="password2">Retype your password:</label>
        <input type="text" name="password2">
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>