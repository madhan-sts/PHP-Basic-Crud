<?php
ob_start();
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
include "config.php";
if (isset($_POST['login-btn']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['emp_email'];
    $password = $_POST['emp_password'];
    $password = md5($password);
    $sql = "SELECT * FROM emp_data WHERE `username`='$username' AND `password`='$password'";
    $query = mysqli_query($conn, $sql);
    $res = mysqli_num_rows($query);
    // echo $res;
    if ($res == 1) {
        $_SESSION['username'] = $username;
        // echo $res;
        // echo $dbuser=$res['user_type'];
        header('location:home.php');
    } else {
        // header('location:login.php');
        echo' <script>alert("Invalid credentials")</script>';
    }
}
?>
<script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

</body>

</html>