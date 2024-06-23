<?php

require_once("dbcon.php");

if(!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];

    $result = mysqli_query($conn,"SELECT * FROM logreg WHERE id = '$id'");
    
    $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furfoliso | Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $row["name"] ?> </h1>
    <a href="logout.php">Logout</a>
</body>
</html>