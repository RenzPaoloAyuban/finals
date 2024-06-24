<?php
include 'dbcon.php';

if (isset($_POST['addEntry'])) {
    $petname = $_POST['petname'];
    $breed = $_POST['breed'];
    $birthday = $_POST['birthday'];
    $description = $_POST['description'];
    $talent= $_POST['talent'];
    if($_FILES["picture"]["error"] === 4) {
        echo "<script>alert('Image Does Not Exist')</script>";
    }

    else {
        $fileName = $_FILES["picture"]["name"]; 
        $fileSize = $_FILES["picture"]["size"];
        $tmpName = $_FILES["picture"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid image extension')</script>";
        }
        else if ($fileSize > 1000000) {
            echo "<script>alert('Image Size is too large')</script>";
        }
        else {
            $newImageName = uniqid() . '.' . $imageExtension;

            move_uploaded_file($tmpName, 'img/' . $newImageName);

            $query = "INSERT INTO furfolio_feed VALUES('', '$petname', '$breed', '$birthday', '$newImageName', '$description', '$talent')";
            mysqli_query($conn, $query);

            if ($_SESSION['id'] === 1) {
                echo "<script>
                        alert('Successfully Added');
                        document.location.href = 'admin.php?id=" . $_SESSION['id'] . "';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Successfully Added');
                        document.location.href = 'index.php?id=" . $_SESSION['id'] . "';
                      </script>";
                exit();
            }
        }
    }
}

?>