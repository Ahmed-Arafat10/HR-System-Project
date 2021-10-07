<?php
include '/xampp/htdocs/HRSystem/ConfigDB.php';


//If User click on Submit Buttom after entering data of employee
if(isset($_POST['send'])){
$name=$_POST['name'];
$salary=$_POST['salary'];
$department=$_POST['department'];
$insert="INSERT INTO employee VALUES(NULL,'$name',$salary,$department)";
$query = mysqli_query($connect_to_DB,$insert);
if($query) print_message("Done Insertion To DataBase");
else echo print_message("Failed Insertion To DataBase");
}


$name="";
$salary="";
$update = false;
//If User click on Edit Buttom in List Employee Page
if(isset($_GET['edit'])){
    $update = true;
    $id = $_GET['edit'];
    $select="SELECT * FROM employee WHERE id = $id";
    $select=mysqli_query($connect_to_DB,$select);
    $row=mysqli_fetch_assoc($select);
    $name = $row['name'];
    $salary = $row['salary'];
//If User click on Submit Buttom after entering UPDATED data of employee
    if(isset($_POST['update'])){
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $department=$_POST['department'];
    $update="UPDATE employee SET name = '$name' , salary = $salary , department = $department WHERE id=$id";
    $query = mysqli_query($connect_to_DB, $update);
    if($query) print_message("Done Updating DataBase");
    else echo print_message("Failed Updating  DataBase");
    }

}
if($_SESSION['admin']){} 
else header('location:/HRSystem/Admins/Login.php');



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
include '/xampp/htdocs/HRSystem/Nav.php';
?>
    <div class="container col-md-6 mt-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control" placeholder="Enter Name Here">
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="text" name="salary" value="<?php echo $salary ?> " class="form-control" placeholder="Enter Salary Here">
            </div>
            <div class="form-group">
                <label for="">Department</label>
               <select name="department">
                   <?php 
                   $department = "SELECT * FROM departments";
                   $department_query = mysqli_query($connect_to_DB,$department);
                   foreach($department_query as $depart){ ?>
                   <option value="<?php echo $depart['id']; ?>">
                       <?php echo $depart['name']; ?>
                   </option>
                   <?php } ?>
               </select>
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