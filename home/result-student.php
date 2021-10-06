
<?php 
include_once "inc/conn.php";
?>
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
  <title>Student Result Details</title>
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
<center><h1>Student Result Details</h1></center>
  <div class="container-fluid padding_left2">
  
    <div class="white_color"><br><br>


    <div id="m">
          <h2>Student Result Details</h2>
          <?php
    $sqlSelect = "SELECT `sid`,`status`,`course`,`course_id`, `name`, `father_name`, `mother_name`, `adhaar`, `email`, `contact`, `address`, `dob`, `qualification`, `village`, `distt`, `state`, `adate`, `edate`, `student_photo`,`entry_date` FROM `student_details` WHERE `sid` = '". $_POST['stu_name']."'";
    $result = mysqli_query($mysqli, $sqlSelect);
if (mysqli_num_rows($result) > 0)
{   $z=0;  while ($row = mysqli_fetch_array($result)) { $z++;        
    $sqlS = "SELECT `course_id`, `no_sub`, `total_mark`, `ob_mark`, `percent`, `grade`, `sub0`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `sub17`, `sub18`, `entry_date` FROM `marks_details` WHERE `sid` = '". $_POST['stu_name']."'";
    $result1 = mysqli_query($mysqli, $sqlS);
    if (mysqli_num_rows($result1) > 0)
    { 
        while ($row1 = mysqli_fetch_array($result1)) {
      echo '   <div class="author-img" style="float:right; ">
                     <img style="border:2px solid #004d7f; width:80px; height:107px; border-radius:10%" src="admindashboard/'.$row['student_photo'].'" alt="">
                  </div>
                  <div class="author-info">
                     <h4><span>Name: </span> '.strtoupper($row['name']).' </h4> 
                     <h4><span>Father Name: </span> '.strtoupper($row['father_name']).' </h4> 
                     <h4><span>Mother Name: </span> '.strtoupper($row['mother_name']).' </h4> 
                     <h4><span>Enroll No.: </span> '.strtoupper($row['sid']).' </h4> 
                     <h4><span>Date Of Birth: </span> '.strtoupper($row['dob']).' </h4> 
                     <h4><span>Course: </span> '.strtoupper($row['course']).' </h4> 
                                    
                     <table class="table table-hover table-fixed">
                     <caption>Result Summary</caption>
<!--Table head-->
<thead>
  <tr>
    <th>Sr. No.</th>
    <th>Subject Name</th>
    <th>Total Marks</th>
    <th>Obtained Marks </th>
    <th>Remark</th>
  </tr>
</thead>
<!--Table head-->
';
$sub = (int)$row1['no_sub'];
for($i=0;$i<$sub;$i++){
    print '<tbody>
        <tr>
          <th scope="row">'.($i+1).'</th>
          <td>'. get_subjectname(get_code($row1['course_id'],$i)).'</td>
          <td>150</td>
          <td>'.$row1["sub".$i.""].'</td>
          <td>P</td>
        </tr>
</tbody>';
}
echo '<!--Table body-->
</table> <hr> 
<div class="author-img pull-right">
                  <img style="float:right;" src="img/stamp.png" alt="">
               </div>
                  </div>
                  <h4><span>Total Marks: </span> '.strtoupper($row1['total_mark']).' </h4> 
                  <h4><span>Total Obtained Marks: </span> '.strtoupper($row1['ob_mark']).' </h4> 
                  <h4><span>Percentage: </span> '.strtoupper($row1['percent']).'%</h4> 
                  <h4><span>Grade: </span> '.strtoupper($row1['grade']).' </h4> 
                  <span>Note: This is computer Genrated Result.</span>
               </div> ';
        
     } } }
                        }
                        else {
                          echo "<h4>No Result Found please contact your Centre</h4>";
                        }
                          ?> 
          </div>
      <div class="row">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          
          

        </div>
       		 <br>
  
                 
          
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