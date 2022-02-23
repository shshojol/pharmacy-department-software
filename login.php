<?php 
    include('include/db_conn.php');
    $error = "";
    $email = '';
    $password = '';
    $eemail = '';
    $epassword = '';
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $er = 0;
        if(empty($email))
        {
            $er++;
            $eemail = "<span style='color:red'>Required</span>";
        }
        if(empty($password))
        {
            $er++;
            $epassword = "<span style='color:red'>Required</span>";
        }
        if($er == 0)
        {
            $sql = "select * from admin where email = '{$email}' AND password = '{$password}'";

            $result = mysqli_query($conn, $sql);
           
            if(mysqli_num_rows($result) > 0 )
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    header('location:index.php');
                }
            }
            else
            {
                $error = "<span style='color:red'>Email and Password not match</span>";
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from preclinic.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:18:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="" method='post' class="form-signin">
						<div class="account-logo">
                            <a href="index.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" autofocus="" name='email' class="form-control" value='<?php echo $email; ?>'><?php echo $eemail; ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name='password' class="form-control" value='<?php echo $password; ?>'><?php echo $epassword; ?>
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name='submit' class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="register.html">Register Now</a><br>
                            <?php echo $error; ?>
                        </div>
                        
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from preclinic.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:18:03 GMT -->
</html>