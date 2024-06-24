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
    <title>Furfolio | ADMIN</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body> 
    <nav id="nav-admin">
        <a href="#home"><img src="img/logo.png" alt="logo"></a>
        <div class="nav-buttons">
            <button class="addpet-btn" onclick="insertEntry()">ADD PETS</button>
            <a class="logout" href="landing.php">LOG OUT</a>
        </div>
    </nav>
    <div class="welcome" id="welcome">
            <h1>Welcome, <?php echo $row['name']; ?></h1>
    <div class="admin-container" id="admin-tables">
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
                        $query = "SELECT * FROM `furfolio_feed` ORDER BY id DESC";
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
                            <td><img src="img/<?php echo $row['picture'] ?>" width=200 title="<?php echo $row['picture'] ?>"></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['talent'] ?></td>
                            <td>
                                <a href="update_fur.php?id=<?php echo $row['id'] ?>">Update</a>
                                <a href="#" onclick="deleteRecord(<?php echo $row['id']; ?>)">Delete</a>
                                <div class="confirm-popup" id="confirm-popup-<?php echo $row['id']; ?>">
                                    <p>Are you sure you want to delete this record?</p>
                                    <div class="confirm-btns">
                                        <a class="confirm-anchors" href="delete_fur.php?id=<?php echo $row['id']; ?>">Yes</a>
                                        <a class="confirm-anchors" onclick="cancel(<?php echo $row['id']; ?>)">Cancel</a>
                                    </div>
                                </div>
                            </td>
                        </tr>   
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>

    <div class="popup-entry" id="popup">
        <h2>ADD NEW PET</h2>
        <form action="insert_entry.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="input-entry1">
                <div class="separator">
                    <label for="petname">PET'S NAME: </label>
                    <input type="text" name="petname">
                </div>
                <div class="separator">
                    <label for="breed">BREED: </label>
                    <input type="text" name="breed">
                </div>
            </div>
            <div class="input-entry">
                <label for="birthday">BIRTHDAY: </label>
                <input type="date" name="birthday">
            </div>
            <div class="input-entry">
                <label for="picture">PICTURE OF YOUR PET: </label>
                <input type="file" name="picture">
            </div>
            <div class="input-entry">
                <label for="description">PET'S DESCRIPTION: </label>
                <textarea class="pet-desc" name="description" rows="6" cols="50" placeholder="Enter your pet's description"></textarea>
            </div>
            <div class="input-entry">
                <label for="talent">TALENT: </label>
                <input type="text" name="talent">
            </div>
            <input class="submit-btn" type="submit" name="addEntry" value="ADD ENTRY">
        </form>
            <button class="close-btn" onclick="closePopupEntry()">CLOSE</button>
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
    

 
