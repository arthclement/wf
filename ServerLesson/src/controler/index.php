<?php
$currentTimeSlot = (new DateTime())->format('H');

if ($currentTimeSlot < 12 ) {
    $toDisplay = 'Good morning';
} else if ($currentTimeSlot < 18) {
    $toDisplay = 'Good afternoon';
} else if ($currentTimeSlot < 22) {
    $toDisplay = 'Good evening';
} else {
    $toDisplay = 'Please, sleep';
}

$range = range(1, 10);

if (isset($_GET['firstname'])) {
    $firstname = $_GET['firstname'];
} else {
    $firstname = 'John';
}
$lastname = $_GET['lastname'] ?? 'Doe';

$firstname = htmlentities($firstname);
$lastname = htmlentities($lastname);

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
    <?php echo $toDisplay; ?>
    <?php 
        echo $firstname . ' ' . $lastname;
    ?>
    <br>

    <ul>
        <?php foreach ($range as $element) {?>
            <li><?php echo $element; ?></li>
        <?php } ?>
    </ul>
</body>
</html>