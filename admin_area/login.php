<?php
session_start();
include("includes/header.php");
include("includes/db.php");
?>

<body>
<div class="container"><!-- container begin-->
    <form action="" class="form-login" method="POST"><!-- form begin-->
        <h2 class="form-login-heading"> Admin Login</h2>
        <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
        <input type="password" class="form-control" placeholder="Your Password" name="admin_pass">
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">
            Login
        </button>
    </form><!-- form finish-->
</div><!-- container finish-->
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
$admin_email = mysqli_real_escape_string($conn,$_POST['admin_email']);
$admin_pass = mysqli_real_escape_string($conn,$_POST['admin_pass']);
$get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
$run_admin = mysqli_query($conn,$get_admin);
$count = mysqli_num_rows($run_admin);
if($count==1){
    $_SESSION['admin_email']=$admin_email;
    echo "<script>alert('logged in, Welcome back')</script>";
    echo "<script>window.open('index.php?dashboard','_sef')</script>";
}else{
    echo "<script>alert('Email or password is wrong')</script>";
    }
}
?>