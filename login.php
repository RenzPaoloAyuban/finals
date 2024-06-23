<?php

require_once("dbcon.php");

if(!empty($_SESSION["id"])) {
    header("location: index.php");
}

if(isset($_POST["login-sbmt"])) {
    $useremail = $_POST["useremail"];
    $userpassword = $_POST["userpassword"];

    $result = mysqli_query($conn,"SELECT * FROM logreg WHERE username = '$useremail' OR email = '$useremail'");

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0) {
        if($userpassword == $row["password"]) {
            $_SESSION["login"] = true;
            if ($row["usertype"] == "admin") {
                $_SESSION["admin"] = $row["name"];
                header("location: admin.php");
            } elseif ($row["usertype"] == "user") {
                $_SESSION["id"] = $row["id"];
                header("location: index.php");
            }
        }
        else {
            echo "<script>alert('Wrong Password!')</script>";    
        }
    }
    else {
        echo "<script>alert('User Not Registered')</script>";
    }
}

?>