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
  <title>About Us</title>
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

   <!--START ABOUT  -->
   <div class="container mt-5">
      <div class="row">
        <div class="col-sm-8 p-4">
          <h1 class="text-warning">Application Programming Interfaces(API)</h1>
          <h4>Instapayg Software Solutions specializes in providing innovative business solutions for various applications like design, development, marketing & support to meet the critical requirements of businesses for clients in Payment and Information Technology Industry. We build applications that enable multi-channel engagement for our customers, leveraging on site, off site and offshore resources with strategic global partnerships to deliver exceptional value.With our global presence we are well positioned to harness the best minds from different parts of the world to provide our clients with high-quality, cost-effective solutions for their business in the areas of IT and Payments solutions.

<br><br>We now offer “Instapayglobe” - (A complete payment solution), the real alternative to out-dated billing systems and payment gateways.Instapayg Payment solutions help to expand and accelerate your businesses to its fullest potential no matter which industry you are in. Offering skills tapping into a diverse range of industry – be it manufacturing, retail, healthcare, service or banking. We provide corporate solutions tailored to your specific needs.InstaPay API Gateway is “middleware” that makes available backend services to mobile, web and other external clients via a set of protocols and commonly through a set of REST ful application programming interfaces (APIs).API is an acronym that stands for “application programming interface,” and it allows apps to send information between each other.</h4>

<br><br>PayG’s Unique Feature:

    Consolidated payment provider
    Easy-to-use secure technology
    Innovative technology meets changing needs
    Easy-to-use tools and resources
    Multiple payment options for your customers
    Integrated solutions for your customers
    Exceptional 24/7 customer service

        </div>
        <div class="col-sm-4 p-4">
          <div class="directorr" style="width:150px; height: 150px;">
           <img src="images/director.jpg" class="img-fluid"> 
          </div>
        </div>
      </div>
    </div>
      <!-- about  --> 
<?php include "inc/learning.php"; ?>
<!-- end abouts -->
    </div>
  </div>



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


          <script>
// This example adds a marker to indicate the position of Bondi Beach in Sydney,
// Australia.
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {
      lat: 40.645037,
      lng: -73.880224
    },
  });

  var image = 'images/maps-and-flags.png';
  var beachMarker = new google.maps.Marker({
    position: {
      lat: 40.645037,
      lng: -73.880224
    },
    map: map,
    icon: image
  });
}
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->



</body>

</html>