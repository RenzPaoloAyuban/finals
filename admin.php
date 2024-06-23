<?php

require_once("dbcon.php");

if(!empty($_SESSION["usertype"])) {
    $usertype = $_SESSION["usertype"];
    $result = mysqli_query($conn,"SELECT * FROM logreg WHERE name = '$usertype'");
    $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furfolio | ADMIN</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body> 
    <nav>

        <a href="#home"><img src="img/logo.png" alt="logo"></a>
        <div class="nav-buttons">
            <a class="logout" href="landing.php">LOG OUT</a>
            <button></button>
        </div>
    </nav>
    <div class="admin-container">
        <div class="table-buttons">
            <button class="table-user-btn" onclick="registeredUsers()">REGISTERED USERS</button>
            <button class="table-feed-btn" onclick="furfolioFeed()">FURFOLIO FEED</button>
        </div>
        <div class="tables">
            <table class="user-table" id="user-table">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $query = "SELECT * FROM `logreg`";

                        $result = mysqli_query($conn, $query);

                        if (!$result) {
                            die("Query Failed: " . mysqli_error($conn));
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><a href="update_user.php?id=<?php echo $row['id'] ?>">Update</a><a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>                
                </tbody>
            </table>
            <table class="feed-table" id="feed-table">
                <thead>
                    <tr>
                        <th>PET NAME</th>
                        <th>BREED</th>
                        <th>BIRTHDAY</th>
                        <th>IMAGE</th>
                        <th>DESCRIPTION</th>
                        <th>TALENT</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    $query = "SELECT * FROM `furfolio_feed`";

                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        die("Query Failed: " . mysqli_error($conn));
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row['petname'] ?></td>
                        <td><?php echo $row['breed'] ?></td>
                        <td><?php echo $row['birthday'] ?></td>
                        <td><?php echo $row['picture'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['talent'] ?></td>
                        <td><a href="update_user.php?id=<?php echo $row['id'] ?>">Update</a><a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>    
                </tbody>
            </table>
        </div> 
    </div>


    <div class="popup-message" id="pop-message">
        <?php
            if (isset($_GET['delete_msg'])) {
                echo "<h2>".$_GET['delete_msg']."</h2>";
            }
    
            if (isset($_GET['fdelete_msg'])) {
                echo "<h2>".$_GET['fdelete_msg']."</h2>";
            }
        ?>
    </div>
    <script src="script/script.js"></script>
</body>
    

 
