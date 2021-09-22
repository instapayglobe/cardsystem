<?php
session_start();
error_reporting(E_ALL);
// Include config file
require "includes/logic/define-config.php";
require "includes/logic/functions.php";
require "includes/logic/config.php";
// Define variables and initialize with empty values
$_SESSION['message']  = $username = $password = $msg = "";
$username_err = $password_err = $type = "";
fetch_global('msg');
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["aloggedin"]) && $_SESSION["aloggedin"] === true) {
    header("location: index.php?pid=0");
    exit;
}
// Processing form data when form is submitted
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    // Validate credentials
    if (empty($_SESSION['message'])) {
        // Prepare a select statement

        $sql = "SELECT `u_name_l`, `l_admin_p` FROM `l_admin_c` WHERE  `u_name_l` = ?";

        $result = getSingleRecord($sql, 's', [$username]);
        // Store result
        if (is_array($result)) {
            if (count($result) > 0) {
                if ($password === $result['l_admin_p']) {
                    // Password is correct, so start a new session
                    // Store data in session variables
                    $_SESSION["aloggedin"] = true;
                    $_SESSION["usercode"] = $id;
                    $_SESSION["user"] = $name;
                    $_SESSION['mail'] = $$username;
                    $_SESSION['photo'] = $hphoto;
                    $_SESSION['cname'] = $cname;
                    header("location:?pid=0&msg=9");
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin cPanel | ADS4NET</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/extra-libs/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/extra-libs/toastr/toastr.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="background-image  : url('dist/img/hot.jpg'); background-size: cover">
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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(assets/images/big/3.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="assets/images/logo-icon.png" width="50%" alt="ADS4NET">
                        </div>
                        <h2 class="mt-3 text-center">Sign In</h2>
                        <p class="text-center">Enter your credentials to access cPanel.</p>
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
                                    Don't have an account? <a href="#" class="text-danger">Contact Us</a>
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
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- SweetAlert2 -->
    <script src="assets/extra-libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="assets/extra-libs/toastr/toastr.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
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
        });
    </script>
</body>

</html>
<?php
require 'PHPMailer/PHPMailerAutoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.eskilldevelopment.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@eskilldevelopment.com';                 // SMTP username
$mail->Password = '9_p3QTRb]p(6';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'info@eskilldevelopment.com';
$mail->FromName = 'Mailer';
$mail->addAddress('mukeshkumar656@gmail.com', 'Mukesh Kumar');     // Add a recipient
$mail->addAddress('support@eskilldevelopment.com');               // Name is optional
$mail->addReplyTo('info@eskilldevelopment.com', 'Information');
$mail->addCC('eskilldevelopment@gmail.com');
$mail->addBCC('vinay.atech@gmail.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}


img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */


/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

	    .primary{
	background: #009fc7;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #f7fafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}

/*BUTTON*/
.btn{
	padding: 3px 10px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #009fc7;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}
.btn.btn-black-outline{
	border-radius: 0px;
	background: transparent;
	border: 2px solid #000;
	color: #000;
	font-weight: 700;
}
.btn-custom{
	color: rgba(0,0,0,.3);
	text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
	font-family: "Work Sans", sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: "Work Sans", sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a {
	color: #009fc7;
}

/*LOGO*/

.logo h1{
	margin: 0 0 20px 0;
}
.logo h1 a{
	color: #000;
	font-size: 24px;
	font-weight: 300;
	font-family: "Work Sans", sans-serif;
}

/*HERO*/
.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	color: rgba(0,0,0,.3);
}
.hero .text h2{
	color: #000;
	font-size: 34px;
	margin-bottom: 15px;
	font-weight: 300;
	line-height: 1.2;
}
.hero .text h3{
	font-size: 24px;
	font-weight: 200;
}
.hero .text h2 span{
	font-weight: 600;
	color: #000;
}


/*PRODUCT*/
.product-entry{
	display: block;
	position: relative;
	float: left;
	padding-top: 20px;
}
.product-entry .text{
	width: calc(100% - 125px);
	padding-left: 20px;
}
.product-entry .text h3{
	margin-bottom: 0;
	padding-bottom: 0;
}
.product-entry .text p{
	margin-top: 0;
}
.product-entry .text span{
	color: #000;
	font-size: 14px;
	font-weight: 600;
	display: inline-block;
	margin-bottom: 10px;
}
.product-entry img, .product-entry .text{
	float: left;
}

ul.social{
	padding: 0;
}
ul.social li{
	display: inline-block;
	margin-right: 10px;
}

/*FOOTER*/

.footer{
	color: rgba(0,0,0,.5);
}
.footer .heading{
	color: #000;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {

}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
					  <td class="logo" style="text-align: left;">
						
			            <img src="https://admin.eskilldevelopment.com/dist/img/logo.png" alt="" style="width: 30px; height: 30px; margin-right:10px ; display: inline;" /> <h1 style="margin-top: -150px; display: inline;"> <a href="#" >eSkill Development.</a> </h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
	      <tr>
          <td valign="middle" class="hero bg_white" style=" opacity: .9; background-image: url(https://admin.eskilldevelopment.com/dist/img/hot1.jpg); background-size: cover; height: 400px;">
          	<div class="overlay"></div>
            <table>
            	<tr>
            		<td>
            			<div class="text" style="padding: 0 3em; text-align: center;">
            			</div>
					</td>
					<td style="padding: 0 2.5em; text-align: left;">
            			<div class="text">
            				<h2>We always control, Manage and Run all Affiliations and Tasks.</h2>
            				<h3> from the Head office only with the mission to spread over the Literacy Programs in India</h3>
            			</div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 2em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tr>
            		<td style="padding: 0 2.5em; text-align: left;">
            			<div class="text">
						<h2>Thanks For Being A Family Member Of eSkill Development</h2>
            				<h3>We Will Contacting You Soon.</h3>
            			</div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
	      <tr>
	      	<td class="bg_white" style="padding: 0 0 4em 0;">
		      	<table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
						  <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
						  	<td valign="middle" width="70%" style="text-align:left; padding: 0 2.5em;">
						  		<div class="product-entry">
						  			<img src="https://admin.eskilldevelopment.com/dist/img/logo.png" alt="" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px; display: block;">
						  			<div class="text">
						  				<h3>All ITI Courses</h3>
						  				<span>Electrician, Welder, Fire and Safety Etc.</span>
						  			</div>
						  		</div>
						  	</td>
						  	<td valign="middle" width="30%" style="text-align:center; padding-right: 2.5em;">
						  		<span class="price" style="color: #009fc7; font-size: 20px; display: block;">&#8377; 120</span>
						  		<span style="display: block;">Attractive Discount</span>
						  		<span><a href="https://www.eskilldevelopment.com/home/contact.php" class="btn btn-primary">Enroll now</a></span>
						  	</td>
						  </tr>
						  <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
						  	<td valign="middle" width="70%" style="text-align:left; padding: 0 2.5em;">
						  		<div class="product-entry">
						  			<img src="https://admin.eskilldevelopment.com/dist/img/logo.png" alt="" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px; display: block;">
						  			<div class="text">
						  				<h3>All Vocational Courses</h3>
						  				<span>NTT, PTT, Yoga etc.</span>
						  			</div>
						  		</div>
						  	</td>
						  	<td valign="middle" width="30%" style="text-align:center; padding-right: 2.5em;">
						  		<span class="price" style="color: #009fc7; font-size: 20px; display: block;">&#8377; 120</span>
						  		<span style="display: block;">Attractive Discount</span>
						  		<span><a href="https://www.eskilldevelopment.com/home/contact.php" class="btn btn-primary">Enroll now</a></span>
						  	</td>
						  </tr>
		      	</table>
		      </td>
	      </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
            	<tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<h3 class="heading">About</h3>
                      	<p>Skill Development is the Leading Educational Development Network in all States and Union Territories of India and internationally.</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                      	<h3 class="heading">Contact Info</h3>
                      	<ul>
					                <li><span class="text">#9/10, Patel Nagar, Hisar 125001, HRY.</span></li>
					                <li><span class="text">(+91) 708 280 9122</span></a></li>
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;">
                      	<h3 class="heading">Useful Links</h3>
                      	<ul>
					                <li><a href="https://www.eskilldevelopment.com/">Home</a></li>
					                <li><a href="https://login.eskilldevelopment.com/login.php">Login</a></li>
					                <li><a href="https://www.eskilldevelopment.com/home/contact.php">Contact</a></li>
					                <li><a href="https://www.eskilldevelopment.com/home/course.php">Courses</a></li>
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
        <tr>
          <td class="bg_white" style="text-align: center;">
          	<p>No longer want to receive these email? You can <a href="#" style="color: rgba(0,0,0,.8);">Unsubscribe here</a></p>
          </td>
        </tr>
      </table>

    </div>
  </center>
</body>
</html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }
?>