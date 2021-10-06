<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>CONTACT</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header-top">
      <?php include "inc/headerinner.php"; ?>
   </div>
 </header>
     <!-- end header inner -->

<!-- contact -->
<div id="contact" class="contact">
  <div class="container-fluid padding_left2">
    <div class="white_color">
      <div class="row">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.025427002863!2d77.0710393150839!3d28.68888598239558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d043b5a4d10e3%3A0xf3b7554a9d653584!2sA%2F163%2C%20Friends%20Enclave%2C%20Sultanpuri%2C%20New%20Delhi%2C%20Delhi%20110041!5e0!3m2!1sen!2sin!4v1614936685453!5m2!1sen!2sin" width="700" height="650" style="border:0; padding-top:135px; padding-left: 10px;"  allowfullscreen="" loading="lazy"></iframe>
          

        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            
           

<br>
                        <?php if(isset($_POST['Submit']) && $_POST['Submit']!=NULL)
					{	
					$name=$_POST['name'];
					$email=$_POST['email'];
					$phone=$_POST['phone'];					 			 
					$message=$_POST['message'];					 
					
								 
					$to = "pradeep.iplexus@gmail.com,rpsseduhr@gmail.com";
					$from = $_POST['email'];
					$subject = "Enquiry form";
					$headers .= 'From: <enquiry@rpssedu.com/>' . "\r\n";
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
					//$headers .= "CC: info@ipdelhi.com\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$message = '<html><body>'; 
					$message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';			 
					$message .= "<tr><td colspan=2>Dear Sir/Mam,<br /><br />You have received online query </td></tr>";			 
					$message .= "<tr><td colspan=2 font='colr:#999999;'><b>Details are mentioned below</b></td></tr>"; 
					$message .= "<tr><td colspan=2 font='colr:#999999;'><b>Name</b></td><td>'".$name."'</td></tr>"; 
					$message .= "<tr><td colspan=2 font='colr:#999999;'><b>Email</b></td><td>'".$email."'</td></tr>"; 
					$message .= "<tr><td colspan=2 font='colr:#999999;'><b>Phone</b></td><td>'".$phone."'</td></tr>";					
					$message .= "<tr><td colspan=2 font='colr:#999999;'><b>Message</b></td><td>'".$message."'</td></tr>";
					 
					
					
					$message .= "</table>";							
					$message .= "</body></html>";
	
					// Always set content-type when sending HTML email			
					// More headers			
					$mail=mail($to, $subject, $message, $headers);
					
					if($mail)
					{
							$responsemsg="Thanks. We will contact you soon";
						}
					else
						{
							$responsemsg="Unable to send mail. Please try agian.";	
						}
				}
				?>
				<br>

 
 


          <form class="contact_bg" action="contact.php" method="post" autocomplete="off">
          <div id="emsdiv"><h5><span id="emspan" style="padding-left:5px; color:red;"><?php echo @$responsemsg; ?></span></h5></div>
            <div class="row">
              <div class="col-md-12">
                <div class="titlepage">
                  <h2>Contact <strong class="yellow">us</strong></h2>
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Name" type="text" name="name" id="name">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Email" type="text" name="email" id="email">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Phone" type="text" name="phone" id="phone">
                </div>
                <div class="col-md-12">
                  <textarea class="textarea" placeholder="Message" type="text" name="message" id="message"></textarea>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <!--<button class="send">Send</button>-->
                   <input class="send"  name="Submit" type="submit" value="Submit" id="Submit">  
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- end contact -->
    <!--  footer -->
    <?php include "inc/footer.php"; ?>
          <!-- end footer -->
          <!-- Javascript files-->
          <script src="js/jquery.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script>
          <script src="js/jquery-3.0.0.min.js"></script>
          <script src="js/plugin.js"></script>
          <!-- sidebar -->
          <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
          <script src="js/custom.js"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


          
<!-- google map js 

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>

  end google map js -->



</body>

</html>