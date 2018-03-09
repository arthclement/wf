<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include_once __DIR__.'/init.php';

$displayAccountID = $_GET['id'] ?? null;
    try {
        $connection = Service\DBConnector::getConnection();
    } catch (PDOException $exception) {
        http_response_code(500);
        echo 'A problem occured, contact support';
        exit(1);
    }
    $sql = "SELECT * FROM user WHERE iduser= :iduser" ;
    $statement = $connection->prepare($sql);
    
    $statement->bindParam('iduser', $displayAccountID, PDO::PARAM_INT);

    $statement->execute();

    $allResults = $statement->fetchAll();

   if (empty($allResults)) {
?>
    <div>
        <p>To be displayed, this page need a valid numeric id as query</p>
    </div>
    <?php
    exit(0);
   }
    ?>
</body>
</html>