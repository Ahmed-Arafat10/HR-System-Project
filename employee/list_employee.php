<?php
include '/HR/ConfigDB.php';


error_reporting(0);
if(isset($_GET['delete'])){
$id = $_GET['delete'] ;
$delete="DELETE FROM employee WHERE id= $id";
$d_query=mysqli_query($connect_to_DB,$delete);
if($d_query) print_message("Done Deleting From DataBase");
else print_message("Faild Deleting From DataBase");
}


if($_SESSION['admin'] || $_SESSION['HR']){} 
else header('location:/HR/Admins/Login.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
<?php
include '/HR/Nav.php';
?>   

<div class="container col-md-6 text-center mt-5">
<table class="table table-dark text-center" >
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Salary</th>
    <th>Department</th>
</tr>
<?php 
    // $select="SELECT * FROM employee";
    // $select = "SELECT * , employee.department as Dname  FROM  employee JOIN departments ON 
    // employee.department = departments.id ";
    $select = "SELECT employee.id ,employee.name AS Ename ,employee.salary, departments.name AS Dname FROM employee , departments
    WHERE employee.department = departments.id ";
    $s_query=mysqli_query($connect_to_DB,$select);
    foreach($s_query as $data){ ?>
 <tr>
    <td> <?php echo $data['id']; ?> </td>
    <td> <?php echo $data['Ename']; ?> </td>
    <td> <?php echo $data['salary']; ?> </td>
    <td> <?php echo $data['Dname']; ?> </td>
    <?php if (isset($_SESSION['admin'])) : ?>
    <td><a href="/HR/employee/add_employee.php?edit=<?php echo $data['id']?> " class="btn btn-info">Edit</a></td>
    <td><a href="/HR/employee/list_employee.php?delete=<?php echo $data['id']?> " class="btn btn-danger" onclick=" return confirm('ARE YOU SURE ??')">Delete</a></td>
    <?php endif; ?>
 </tr>

    <?php } ?>


</table>

</div>

</body>
</html>
