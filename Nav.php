<?php

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/HR-System-Project/index.php');
}
// error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>

*{

  margin: 0px;
  padding: 0px;
  top:0px
}
  
</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light " style="background-color:darkcyan;">
    <a class="navbar-brand" href="/opt/lampp/htdocs/HR-System-Project/index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/HR-System-Project/employee/list_employee.php">Employee<span class="sr-only">(current)</span></a>
        </li>
        <?php if (isset($_SESSION['admin'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/HR-System-Project/employee/add_employee.php">Add Employee</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="/HR-System-Project/department/list_department.php">Department</a>
          <?php if (isset($_SESSION['admin'])) :  ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/HR-System-Project/department/add_department.php">Add Department</a>
        </li>
      <?php endif; ?>
      <?php if (!isset($_SESSION['admin']) && !isset($_SESSION['HR'])) : ?>
        <li class="nav-item">
          <a class="btn btn-info" href="/HR-System-Project/Admins/Login.php">Login</a>
        </li>
      <?php endif; ?>
      <?php if (isset($_SESSION['admin']) || isset($_SESSION['HR'])) : ?>
        <li style="position:absolute;right:20px;top:10px;">
          <form action="" method="GET">
            <button class="btn btn-danger" name="logout">Logout</button>
          <?php endif; ?>
          </form>
        </li>
      </ul>

    </div>
  </nav>
</body>

</html>
