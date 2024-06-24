<?php

require_once("dbcon.php");

if(!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];

    $result = mysqli_query($conn,"SELECT * FROM logreg WHERE id = '$id'");
    
    $row = mysqli_fetch_assoc($result);
}

?>

<?php

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "<script>alert('You need to login first')</script>";
    header('Location: landing.php');
    exit;
} else {

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furfolio | Welcome</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <nav id="nav-admin">
        <div class="nav-container">
            <div class="account">
                <a href="#home"><img src="img/logo.png" alt="logo"></a>  
                <button class="addpet-btn" onclick="insertEntry()">ADD PETS</button>
            </div>
            <div class="log-name">
            <p style="font-size: 20px;"><?php echo $row["name"] ?> </p>
            <a class="logout" href="logout.php">LOG OUT</a>
            </div>
        </div>
    </nav>
    <section id="furf-feed">
        <div class="feed-container">
            <h1>YOUR FURFOLIO FEED</h1>
            <div class="post-container">
                <table>
                    <?php
                        $query = "SELECT * FROM `furfolio_feed` ORDER BY id DESC";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            die("Query Failed: " . mysqli_error($conn));
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="font-size: 24px; text-transform: uppercase;"><?php echo $row['petname'] ?></td>
                            <td><img src="img/<?php echo $row['picture'] ?>" width=550 title="<?php echo $row['picture'] ?>"></td>
                            <td style="font-size: 18px; font-weight: bold;">BREED: <span style="color: #DC6B19;"><?php echo $row['breed'] ?></span> 
                            BIRTHDAY: <span style="color: #DC6B19;"><?php echo $row['birthday'] ?></span></td>
                            <td style="font-size: 18px; font-weight: bold;">DESCRIPTION: <span style="color: #DC6B19;"><?php echo $row['description'] ?></span></td>
                            <td style="font-size: 18px; font-weight: bold;">TALENTS: <span style="color: #DC6B19;"><?php echo $row['talent'] ?></span></td>
                        </tr>   
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>

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

    <script src="script/script.js"></script>
</body>
</html>