
<?php
include "connection.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM todo_list WHERE id = '$id'";
    mysqli_query($con,$sql);

?>