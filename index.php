

<!-- Page reload when submit form in php -->


<?php
include "connection.php";
$error = '';
if(isset($_POST['submit'])){
    $textbox = $_POST['textbox'];
    if($textbox==''){
    $error="Please Enter Value";
    }else{
    
    $sql = "INSERT INTO todo_list (title) VALUES ('$textbox')";
    mysqli_query($con,$sql);
}
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM todo_list WHERE id = '$id'";
    mysqli_query($con,$sql);
    header("Location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<title>PHP Todo List</title>
    <style>
        body{
            width:80%;
            margin:auto;
        }
        #container{
            margin-top:100px;
        }
        #container h1{
            text-align:center;
        }
        #option #textbox{
            width:80%;
            float: left;
        }
        #option #button{
            width:20%;
            float: left;
        }
        table{
            margin-top:10%;
            
        }
        #row_data tr:nth-child(even){
            background-color: #f2f2f2;
        }
        
    </style>
</head>
<body>
    <div id="container">
        <h1>PHP todo List</h1>
        <br>
        <div id="option">
            <form method="post">
            <div id="textbox"><input type="text" id="textbox" name="textbox" class="form-control" style="width:90%;padding:15px;"></div>
            <div id="button"><input type="submit" id="submit" name="submit" class="btn btn-dark" style="width:90%;padding:15px;"></div>
            </form>
            <div class="text-danger">
            <?php
            echo $error;
            ?>
            </div>
        </div>
        <div id="display">
        <?php
                $s = "SELECT *FROM todo_list order by id desc";
                $res = mysqli_query($con,$s);
                $count = mysqli_num_rows($res);
                if($count>0){
                ?>
            <table class="table table-bordered" id="row_data">
                <?php
                while($row=mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?php echo $row['title'] ?></td>
                    <td><a href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
                } ?>
            </table>
<?php } else{
    echo "No data found";
} ?>
        </div>
    </div>
</body>
</html>