    <?php include('dbcon.php') ?>

    <?php

    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "<script>alert('You need to login first')</script>";
    header('Location: landing.php');
    exit;
    }
    
    ?>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM `logreg` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }
    ?>

    <?php
    if (isset($_POST['updateInfo'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email']; 

        
        $query = "UPDATE `logreg` SET 
                    `name` = '$name', 
                    `username` = '$username', 
                    `email` = '$email'
                    WHERE `id` = '$id'";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Failed: " . mysqli_error($conn));
            } else {
                header('Location: admin.php?update_msg=You have successfully updated the data.');
                exit();
            }
        }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furfolio | Update</title>
    <link rel="stylesheet" href="style/update_user.css">
</head>
<body>
    <nav id="nav-admin">
        <a href="#home"><img src="img/logo.png" alt="logo"></a>
        <div class="nav-buttons">
            <a class="logout" href="landing.php">LOG OUT</a>
        </div>
    </nav>
    <section>
        <div class="update-container">
            <h1>UPDATE INFORMATION</h1>
            <form action="update_user.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">  
                <div class="input-entry">
                    <label for="name">NAME: </label>
                    <input type="text" name="name" value="<?php echo $row['name']?>">
                </div>
                <div class="input-entry">
                    <label for="username">USERNAME: </label>
                    <input type="text" name="username" value="<?php echo $row['username']?>">
                </div>
                <div class="input-entry">
                    <label for="email">EMAIL: </label>
                    <input type="email" name="email" value="<?php echo $row['email']?>">
                </div>
                <input class="submit-btn" type="submit" name="updateInfo" value="UPDATE">
            </form>
            <a class="close-btn" href="admin.php">CLOSE</a>
            </div>
        </div>
    </section>
</body>
</html>

