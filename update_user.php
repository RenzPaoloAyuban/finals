<?php include('dbcon.php') ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->prepare("SELECT * FROM `logreg` WHERE `id` = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if (!$result) {
        die("Query Failed: " . $conn->error);
    } else {
        $row = $result->fetch_assoc();
    }
} else {
    die("Error: ID not set");
}
?>

<?php
if (isset($_POST['updateStudents'])) {
    $id = $_GET['id'];  
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email']; 

    if ($oldpassword == $row['$password']) {
        $query = $conn->prepare("UPDATE `logreg` SET `name` = ?, `username` = ?, `email` = ?, `password` = ? WHERE `id` = ?");
        $query->bind_param("ssssi", $name, $username, $email, $newpassword, $id);
        $result = $query->execute();

        if (!$result) {
            die("Query Failed: " . $conn->error);
        } else {
            header('Location: admin.php?update_msg=You have successfully updated the data.');
        }
        
    }

    else {
        header('Location: admin.php?update_msg=Incorrect Password.');
    } 
}
?>


<form action="update_user.php?id=<?php echo $id; ?>" method="post">  
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo ($row['name']); ?>">
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo ($row['username']); ?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo ($row['email']); ?>">
    </div>
    
    <a href="admin.php">Close</a>
    <input type="submit" name="updateStudents" value="Update">
</form>