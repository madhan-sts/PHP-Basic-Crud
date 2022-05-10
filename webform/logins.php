<?php
//error_reporting(0);
session_start();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
</style>
<title> login </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Php Login System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>



      </ul>
    </div>
  </nav>
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <div class="login-form bg-light mt-4 p-4">
            <form action="" method="post" class="row g-3">
              <h4>Welcome</h4>
              <div class="col-12">
                <label>Username</label>
                <input type="text" name="emp_email" class="form-control" placeholder="Email">
              </div>
              <div class="col-12">
                <label>Password</label>
                <input type="password" name="emp_password" class="form-control" placeholder="Password">
              </div>
              <div class="col-12">
                <button type="submit" name='login-btn' class="btn btn-dark float-end" value='Login'>Login</button>
              </div>
            </form>
            <?php
            require_once "config.php";

            //if(mysqli_connect_errno()){
            //  echo "connection fail";
            //}else{
            //   echo "connection ok";
            //}
            if (isset($_POST['login-btn'])) {
              $employee_Email =  $_POST['emp_username'] ;
              $employee_password = $_POST['emp_password'] ;

              $select = "SELECT * FROM emp_data WHERE username='$employee_Email'";

              $run = mysqli_query($conn, $select);
              $usertype = mysqli_fetch_array($run);
             echo $db_email = $usertype['username'];
            echo  $db_password = $usertype['password'];
             echo $db_id = $usertype['emp_id'];
              if (mysqli_num_rows($run)) {
                echo "<script>window.open('home.php','_self')</script>";

                $_SESSION['username'] = $db_email; //here session is used and value of $user_email store in $_SESSION. 
                if ($usertype['user_type'] == "Admin") {

                  $_SESSION['username'] = $db_email;
                  header('Location: home.php');
                }
                if ($usertype['user_type'] == "User") {
                  $_SESSION['username'] = $db_email;
                  header('Location: home1.php');
                }
              }
              if ($usertype['username'] != $employee_Email && $usertype['password'] != $employee_password) {
                //echo "<script>alert('Email or password is incorrect!')</script>";
                $_SESSION['username'] = "Email or password is incorrect!";
                if (isset($_SESSION['username'])) {
            ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong></strong><?php echo $_SESSION['username']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php

                }
               // unset($_SESSION['username']);
              }
              if ($employee_Email == '' && $employee_password == '') {
                // echo "<script>alert('Email and password both required!')</script>";
                $_SESSION['username'] = "Email and password both required!";
                if (isset($_SESSION['username'])) {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong></strong><?php echo $_SESSION['username']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            <?php


                }
               // unset($_SESSION['username']);
              }
            }

            ?>

          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

  </body>

  </html>