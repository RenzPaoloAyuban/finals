<?php include('dbcon.php'); ?>

<?php 

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM `furfolio_feed` where `id` = '$id'";

        $result = mysqli_query($conn, $query);
        
        if(!$result) {
            die("Query Failed: ". mysqli_error($conn));
        }

        else {
            header('location:admin.php?delete_msg=You have deleted the record');
        }
    } 

?>