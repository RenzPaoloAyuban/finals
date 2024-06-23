<?php include('dbcon.php'); ?>

<?php 

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM `logreg` where `id` = '$id'";

        if($id != 3) {

            $result = mysqli_query($conn, $query);
            if(!$result) {
                die("Query Failed: ".mysqli_error($conn));
            }

            else {
                header('location:admin.php?delete_msg=You have deleted the record');
            }
        } 

        else {
                header('location:admin.php?fdelete_msg=You cannot delete the admin');
        }
    }
    

?>

