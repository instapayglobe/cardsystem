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
    header("location: " . $link . "/client/?pid=0");
    exit;
}
// Processing form data when form is submitted else 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["name"]))) {
        $_SESSION['message']  = "Please enter username.";
    } else {
        $name = trim($_POST["name"]);
    }
    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $_SESSION['message']  = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    echo $_SESSION["message"];
    $_SESSION['message'] = '';
    // Validate credentials
    if (empty($_SESSION['message'])) {
        // Prepare a select statement
        $id = 'AN' . rand(111, 999) . rand(111, 999) . rand(00, 99);
        $sql = "INSERT INTO `client_details`(`cid`, `apiId`, `permission`, `name`, `email`,`sex`, `passcode`, `contact`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $permission = 'p_1,p_2,p_3,p_4,p_5,p_6,p_7,p_8,p_9,p_10,p_11,p_12';
        $result = modifyRecord($sql, 'sssssssi', [$id, getToken(20), $permission, $name, $_POST['email'], $_POST['gender'], $password, $_POST['phone']]);
        // Store result
        if ($result) {
            $sqlSelect2 = "INSERT INTO wallet (`wallet_id`,`balance`,`wall_password`) VALUES ( '" . $id . "',0," . rand(1111, 99999) . ")";
            if (runQuery($sqlSelect2))
                header("location: " . $link . "/client/login.php?pid=0&msg=10");
            exit;
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
    <title>cPanel Sign Up | ADS4NET</title>
    <!-- Custom CSS -->
    <link href="../admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
            <div class="auth-box row text-center">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../admin/assets/images/big/3.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <img src="../admin/assets/images/big/icon.png" alt="Ads4net">
                        <h2 class="mt-3 text-center">Sign Up for Free</h2>
                        <form class="mt-4" name="signup" role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" placeholder="your name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="email address" required>
                                        <div id="emailStatus"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" id="phone" type="number" maxlength="10" placeholder="mobile number" required>
                                        <div id="phoneStatus"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label class="mr-2 float-left"> Gender </label>
                                    <div class=" form-group form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="male" id="customControlValidation2" name="gender" required>
                                            <label class="custom-control-label" for="customControlValidation2">Male</label>
                                        </div>
                                    </div>
                                    <div class=" form-group form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="female" id="customControlValidation3" name="gender" required>
                                            <label class="custom-control-label" for="customControlValidation3">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="password" password="password" type="password" placeholder="password" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-block btn-dark">Sign In</button>
                                </div>
                                <div class="col-lg-6 text-center mt-3">
                                    <button type="reset" class="btn btn-sm btn-block btn-danger">Clear</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Already have an account? <a href="login.php" class="text-danger">Sign In</a>
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
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
    <!-- SweetAlert2 -->
    <script src="../admin/assets/extra-libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../admin/assets/extra-libs/toastr/toastr.min.js"></script>
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

            $msg = 0;
            ?>
            $("#email").on("change", function(event) {
                var email = $("#email");
                $.ajax({
                    url: "includes/check_email.php",
                    data: {
                        email: email.val()
                    },
                    type: 'post',
                    success: function(output) {
                        if (output == 'true') {
                            $("#emailStatus").html(' <small id="name13" class="badge badge-default badge-danger form-text text-white float-right"><i class="fas fa-info mr-2"></i> Sorry This ID is already Registered </small>');
                            email.val('');
                            event.preventDefault();
                        } else
                            $("#emailStatus").html(' <small id="name13" class="badge badge-default badge-success form-text text-white float-right"><i class="fas fa-check mr-2"></i> Email Available </small>');
                    }
                });
            });

            $("#phone").on("change", function() {
                var phone = $(this);
                $.ajax({
                    url: "includes/check_email.php",
                    data: {
                        email: phone.val()
                    },
                    type: 'post',
                    success: function(output) {
                        if (output == 'true') {
                            $("#phoneStatus").html(' <small id="name13" class="badge badge-default badge-danger form-text text-white float-right"><i class="fas fa-info mr-2"></i> Sorry This ID is already Registered </small>');
                            phone.val('');
                        } else
                            $("#phoneStatus").html(' <small id="name13" class="badge badge-default badge-success form-text text-white float-right"><i class="fas fa-check mr-2"></i> Email Available </small>');
                    }
                });
            });

        });
    </script>
</body>

</html>