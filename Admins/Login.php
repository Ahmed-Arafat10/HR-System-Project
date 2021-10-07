<?php
include '/opt/lampp/htdocs/HR-System-Project/ConfigDB.php';

if(isset($_POST['submit_admin'])){
$admin_name=$_POST['admin_name'];
$admin_pass=$_POST['admin_pass'];
$check="SELECT * FROM `admin` WHERE name = '$admin_name' AND password = '$admin_pass' ";
$ch=mysqli_query($connect_to_DB,$check);
$is_exist = mysqli_num_rows($ch);
if($is_exist > 0) {
$_SESSION['admin']=$admin_name;
header('location:/opt/lampp/htdocs/HR-System-Project/employee/list_employee.php');
}
else print_message("Not Admin");
}

if(isset($_POST['submit_hr'])){
  $hr_name = $_POST['hr_name'];
  $hr_id = $_POST['hr_id'];
  $select="SELECT * FROM employee WHERE department = $hr_id AND name = '$hr_name' ";
  $s=mysqli_query($connect_to_DB,$select);
  $is_exist=mysqli_num_rows($s);
  if($is_exist > 0){
    $row=mysqli_fetch_assoc($s);
    if($row['department'] == 2){
      $_SESSION['HR']=$hr_name;
header('location:/opt/lampp/htdocs/HR-System-Project/employee/list_employee.php');
    }
  }
  else print_message("You are not HR member");

} 

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
  include '/opt/lampp/htdocs/HR-System-Project/Nav.php';
  ?>
  <div class="container col-md-6 text-center mt-5">
    <div style="margin:auto; width:50%">
      <ul class="nav nav-tabs  " id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Admin" role="tab" aria-controls="home" aria-selected="true">Admin</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#HR" role="tab" aria-controls="profile" aria-selected="false">HR</a>
        </li>
      </ul>
    </div>
    <div class="tab-content mt-5">
      <!-- Admin Form -->
      <div class="tab-pane fade show active" id="Admin" role="tabpanel" aria-labelledby="home-tab">
        <div class="container col-md-6 mt-5">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="admin_name" class="form-control" placeholder="Enter Admin Name Here">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="admin_pass"  class="form-control" placeholder="Enter Admin Password Here">
            </div>
            <button type="submit" name="submit_admin" class="btn btn-primary btn-lg btn-block">Submit</button>
          </form>
        </div>
      </div>
      <!-- HR Form -->
      <div class="tab-pane fade mt-5" id="HR" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container col-md-6 mt-5" >
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">ID</label>
              <input type="text" name="hr_id" value="" class="form-control" placeholder="Enter HR ID Here">
            </div>
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="hr_name" value="" class="form-control" placeholder="Enter HR Name Here">
            </div>
            <button type="submit" name="submit_hr" class="btn btn-primary btn-lg btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>



</body>

</html>
