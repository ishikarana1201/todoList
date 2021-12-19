<?php
include "connection.php";

    $textbox = $_POST['textbox'];
    $sql = "INSERT INTO todo_list (title) VALUES ('$textbox')";
    mysqli_query($con,$sql);
    $id = mysqli_insert_id($con);
    
?>