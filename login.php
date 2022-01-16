<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title> Login Form </title>
  
  
  
   <style type="text/css">
   

@import url('https://fonts.googleapis.com/css?family=Raleway:300,400,700');

*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Raleway', sans-serif;
}

body{ background: purple; }

.cont{
  position: relative;
  width: 25%;
  height: 430px;
  padding: 10px 25px;
  margin: 10vh auto;
  background: #fff;
  border-radius: 8px;
}

.form{ width: 100%; height: 100%; }

h1, h2, .user, .pass,.select-style{ 
  text-align: center;
  display: block;
}

h1{ 
  color: #606060;
  font-weight: bold;
  font-size: 40px;
  margin: 30px auto;
}

.user, .pass, .login,.select-style {
  width: 100%;
  height: 45px;
  border: none;
  border-radius: 5px;
  font-size: 20px;
  font-weight: lighter;
  margin-bottom: 30px;
}

.user, .pass, .select-style{ background: #ecf0f1; }

.login{
  color: #fff;
  cursor: pointer;
  margin-top: 20px;
  background: #3598dc;
  transition: background 0.4s ease;
}

.login:hover{ background: #3570dc; }

@media only screen and (min-width : 280px) {
  .cont{ width: 90% }
}

@media only screen and (min-width : 480px) {
  .cont{ width: 60% }
}

@media only screen and (min-width : 768px) {
  .cont{ width: 40% }
}

@media only screen and (min-width : 992px) {
  .cont{ width: 30% }
}

h2{ color: #fff; margin-top: 25px; }


   </style>

  
</head>





<body>

  <h2> Online Computer Accesories Shop Management System</h2>

<div class="cont">
  
  <div class="form">
    <form id="sign_in" method="POST">
      <h1>Login</h1>
      <input type="text"     class="user"  name="username" placeholder="Username"/>
      <input type="password" class="pass"  name="password" placeholder="Password"/>


  <select  class="select-style" name="type" required>
    <option value="Admin">Admin</option>
    <option value="Employee">Employee</option>
  </select>

<input type="submit" name="login" value="Log in" class="login">

    </form>
  </div>
    
</div>


</body>

</html>





<?php
if (isset($_POST['login'])) {
    require_once("database.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];


    if ($type == 'Admin') {
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username ='$username' AND password='$password' AND type='$type'");
        $redirect = "<script>document.location.href='admin/index.php';</script>";

        $msg = '';
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $admin_id = $row['id'];
                $admin_fname = $row['name'];
            }
            session_start();
            $_SESSION['admin_fname'] = $admin_fname;
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_access'] = "Ok";

            echo $redirect;
        } else {
            $msg = "Invalid";
        }


    } elseif ($type == 'Employee') {
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username ='$username' AND password='$password' AND type='$type'");
        $redirect = "<script>document.location.href='employee/admin.php';</script>";

        $msg = '';
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $employee_id = $row['id'];
                $employee_fname = $row['name'];

            }
            session_start();
            $_SESSION['employee_fname'] = $employee_fname;
            $_SESSION['employee_id'] = $employee_id;
            $_SESSION['employee_access'] = "Ok";

            echo $redirect;
        } else {
            $msg = "Invalid";
        }
    } 
}



// include 'include/head.php';

?>