<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_error', 1);
// Include config file
require "../admin/includes/logic/define-config.php";
require "../admin/includes/logic/functions.php";
require "../admin/includes/logic/config.php";
// Define variables and initialize with empty values
$_SESSION['message']  = $username = $password = $msg = "";
$username_err = $password_err = $type = "";
fetch_global('msg');
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ".$link."/client/?pid=0");
    exit;
}
// Processing form data when form is submitted else 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $_SESSION['message']  = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $_SESSION['message']  = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    echo $_SESSION["message"];
    // Validate credentials
    if (empty($_SESSION['message'])) {
        // Prepare a select statement

        $sql = "SELECT `cid`, `apiId`,  `passcode`, `name`, `contact`, `permission`,`cphoto` FROM `client_details` WHERE email = ? OR contact = ?";

        $result = getSingleRecord($sql, 'ss', [$username,$username]);
        // Store result
        if (is_array($result)) {
            if (count($result) > 0) {
                if ($password === $result['passcode']) {
                    // Password is correct, so start a new session
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["usercode"] = $result['cid'];
                    $_SESSION["api"] = $result['apiId'];
                    $_SESSION["user"] = $result['name'];
                    $_SESSION["photo"] = $result['cphoto'];
                    $_SESSION["permission"] = $result['permission'];
                    $_SESSION['mail'] = $username;
                    header("location: ".$link."/client/?pid=0&msg=9");
                    exit;
                } else {
                    // Display an error message if password is not valid
                    $msg = 2;
                }
            }
        } else {
            // Display an error message if username doesn't exist
            $msg = 4;
        }
    }
}
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/assets/images/favicon.png">
    <title> cPanel | ADS4NET </title>
    <!-- Custom CSS -->
    <link href="../admin/dist/css/style.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../admin/assets/extra-libs/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../admin/assets/extra-libs/toastr/toastr.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="background-image  : url('../admin/dist/img/hot.jpg'); background-size: cover">
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(../admin/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../admin/assets/images/big/3.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="../admin/assets/images/big/icon.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Sign In</h2>
                        <p class="text-center">Enter your email address and password to access admin panel.</p>
                        <form role="form" action="" method="post" class="mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Username</label>
                                        <input name="username" class="form-control" id="uname" type="text" placeholder="enter your username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input name="password" class="form-control view no-block" id="pwd" type="password" placeholder="enter your password">
                                        <small id="name13" class="badge badge-default badge-success form-text text-white float-right"><i class="fas fa-lock mr-2"></i> Show Password </small>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-block btn-dark">Sign In</button>
                                </div>
                                <div class="col-lg-6 text-center mt-3">
                                    <button type="reset" class="btn btn-sm btn-block btn-danger">Clear</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5 text-small">
                                    Don't have an account? <a href="authentication-register.php" class="text-danger">Sign Up</a>
                                    Main Website !!! <a href="#" class="text-success">Go</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- SweetAlert2 -->
    <script src="../admin/assets/extra-libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../admin/assets/extra-libs/toastr/toastr.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
    <!-- SweetAlert2 -->
    <script src="../admin/assets/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../admin/assets/toastr/toastr.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#name13').click(function() {
                if ('password' == $('.view').attr('type')) {
                    $('.view').prop('type', 'text');
                    $(".fa-lock").attr('class', 'fas fa-lock-open mr-2');
                } else {
                    $('.view').prop('type', 'password');
                    $(".fa-lock-open").attr('class', 'fas fa-lock mr-2');
                }
            });

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            <?php
            echo ($msg == 1) ? "Toast.fire({ icon: 'success', title: ' &nbsp; You have Successfully logged in to Your Account.' });" : " ";
            echo ($msg == 2) ? "Toast.fire({ icon: 'error', title: '&nbsp;Invalid User Name or Password !!!' });" : " ";
            echo ($msg == 3) ? "Toast.fire({ icon: 'success', title: '&nbsp; You have Successfully logged Out !!!' });" : " ";
            echo ($msg == 4) ? "Toast.fire({ icon: 'error', title: '&nbsp; No Account Found With Your Credentials !!!' });" : " ";
            echo ($msg == 5) ? "Toast.fire({ icon: 'error', title: ' Invalid Details. Kindly Try Again' });" : " ";
            if ($msg == 6) {
                $print = "Toast.fire({ icon: 'error', title: ' The Following Issues Found <br> " . $error . " '});";
                echo $print;
            }
            echo ($msg == 7) ? "Toast.fire({ icon: 'success', title: ' You Have successfully Made a Request. Please Wait.' });" : " ";
            echo ($msg == 8) ? "Toast.fire({ icon: 'success', title: ' You Have successfully Change Your Password.' });" : " ";
            echo ($msg == 9) ? "Toast.fire({ icon: 'error', title: ' Your Session Has Been Expired, Kindly Login Again !!!' });" : " ";
            echo ($msg == 10) ? "Toast.fire({ icon: 'success', title: ' You Have successfully Registered With us!!!' });" : " ";

            $msg = 0;
            ?>
        });
    </script>
</body>
</html>