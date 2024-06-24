<?php

require_once("dbcon.php");

if(!empty($_SESSION["id"])) {
    header("Location: index.php?id=" . $_SESSION['id']);
}

if(isset($_POST["signup-sbmt"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM logreg WHERE username = '$username' OR email = '$email'");

    if(mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Usename or Email Has Already Taken!'); </script>";
    } 
    else {
        if($password == $confirmpassword) {
            $query = "INSERT INTO logreg VALUES('', '$name', '$username', '$email', '$password', 'user')";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration successful! Please login first.'); </script>";
        } 
        else {
            echo "<script> alert('Password does not match'); </script>";
        }
    }
}  

?>
