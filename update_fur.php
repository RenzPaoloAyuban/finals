<?php include('dbcon.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `furfolio_feed` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php
if (isset($_POST['updatePets'])) {
    $petname = $_POST['petname'];
    $breed = $_POST['breed'];
    $birthday = $_POST['birthday'];
    $description = $_POST['description'];
    $talent = $_POST['talent'];

            $query = "UPDATE `furfolio_feed` SET 
                        `petname` = '$petname', 
                        `breed` = '$breed', 
                        `birthday` = '$birthday', 
                        `description` = '$description', 
                        `talent` = '$talent'
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
    <link rel="stylesheet" href="style/update_fur.css">
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
            <div class="update-title">
                <h1>UPDATE <br> INFORMATION</h1>
                <img src="img/<?php echo $row['picture'] ?>" width=300 height="300" title="<?php echo $row['picture'] ?>">
            </div>
            <div class="input-field">
                <form action="update_fur.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">  
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
                        <label for="description">PET'S DESCRIPTION: </label>
                        <textarea class="pet-desc" name="description" rows="6" cols="50" placeholder="Enter your pet's description"></textarea>
                    </div>
                    <div class="input-entry">
                        <label for="talent">TALENT: </label>
                        <input type="text" name="talent">
                    </div>
                        <input class="submit-btn" type="submit" name="updatePets" value="ADD ENTRY">
                </form>
                <a class="close-btn" href="admin.php">CLOSE</a>
            </div>
        </div>
    </section>
</body>
</html>
