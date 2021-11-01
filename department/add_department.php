<?php
include '../ConfigDB.php';

//If User click on Submit Buttom after entering data of employee
if(isset($_POST['send'])){
$name=$_POST['name'];
$insert="INSERT INTO departments VALUES(NULL,'$name')";
$query = mysqli_query($connect_to_DB,$insert);
if($query) print_message("Done Insertion Department To DataBase");
else echo print_message("Failed Insertion Department To DataBase");
}


$name="";
$salary="";
$update = false;
//If User click on Edit Buttom in List Employee Page
if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];
    $select="SELECT * FROM departments WHERE id = $id";
    $select=mysqli_query($connect_to_DB,$select);
    $row=mysqli_fetch_assoc($select);
    $name = $row['name'];
//If User click on Submit Buttom after entering UPDATED data of employee
    if(isset($_POST['update'])){
    $name = $_POST['name'];
    $update="UPDATE departments SET name = '$name' WHERE id = $id";
    $query = mysqli_query($connect_to_DB, $update);
    if($query) print_message("Done Updating DataBase");
    else echo print_message("Failed Updating  DataBase");
    }

}

if($_SESSION['admin']){} 
else header('location:/HR/Admins/Login.php');

?>
<!-- HTML CODE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
include '../Nav.php';
?>
    <div class="container col-md-6 mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Department Name</label>
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control" placeholder="Enter Name Here">
            </div>
           
           <?php if($update == false) : ?>
            <button type="submit" name="send" class="btn btn-primary btn-lg btn-block" >Submit</button>
            <?php else:?>
                <button type="submit" name="update" class="btn btn-primary btn-lg btn-block" >Update</button>
            <?php endif;?>

        </form>
    </div>



</body>

</html>
