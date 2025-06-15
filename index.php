<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ASHAVRITI| Index Page</title>
   
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <?php include_once('includes/header.php');?>
    
    <div class="hero-wrap" style="background-image: url('images/AMANBGG.png'); background-attachment:fixed;">
      
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
         
           
            <p><a href="users/login.php" class="btn btn-primary px-4 py-3">Apply Now</a> <a href="schemes.php" class="btn btn-secondary px-4 py-3">View Schemes</a></p>
          </div>
        </div>
      </div>
    </div>
   
		
    <?php include_once('includes/footer.php');?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .notification-card {
            border-radius: 10px;
            overflow: hidden;
        }

        .notification-header {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
        }

        .notification-body {
            height: 200px;
            overflow: hidden;
            border: 1px solid #007bff;
            border-top: none;
        }

        .notification-body marquee {
            height: 100%;
        }

        .notification-list li {
            margin-bottom: 10px;
            font-size: 14px;
            color: #333;
        }

        .notification-list li i {
            color: #dc3545;
        }

        .notification-list a {
            color: #007bff;
            text-decoration: underline;
        }

        .notification-list a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Notice Board - For Students -->
            <div class="col-md-4 mb-4">
                <div class="card notification-card">
                    <div class="notification-header">
                        <i class="fa fa-bullhorn"></i> Notice Board - For Students
                    </div>
                    <div class="notification-body">
                        <marquee onMouseOver="this.stop()" onMouseOut="this.start()" behavior="scroll" scrollamount="3" direction="up">
                            <ul class="notification-list list-unstyled">
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <span>Those applicants not selected in previous years can apply afresh for AY 2023-24 as per scheme guidelines.</span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <span>National Scholarship Portal is open for application submission for AY 2023-24. Students should:</span>
                                    <ul>
                                        <li>Keep Aadhaar ready.</li>
                                        <li>Link mobile number with Aadhaar.</li>
                                        <li>Seed bank account with Aadhaar.</li>
                                    </ul>
                                    Links:
                                    <ul>
                                        <li><a href="https://myaadhaar.uidai.gov.in/verify-email-mobile" target="_blank">Verify linked mobile no. with Aadhaar</a></li>
                                        <li><a href="https://base.npci.org.in/catalog/getmapperstatus" target="_blank">Check Aadhaar seeding with bank account</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </marquee>
                    </div>
                </div>
            </div>

            <!-- Notice Board - For Institutes -->
            <div class="col-md-4 mb-4">
                <div class="card notification-card">
                    <div class="notification-header">
                        <i class="fa fa-newspaper"></i> Notice Board - For Institutes
                    </div>
                    <div class="notification-body">
                        <marquee onMouseOver="this.stop()" onMouseOut="this.start()" behavior="scroll" scrollamount="3" direction="up">
                            <ul class="notification-list list-unstyled">
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <span>HoI and INO must update their Aadhaar in NSP profiles before BioAuth. Any changes will nullify BioAuth and require re-authentication.</span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <a href="/public/FAQ/StatesAllocatedtoMinistries.pdf" target="_blank">HoIs/INOs - Bio-metric authentication drive information.</a>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <span>HOI/INO Login for AY 2023-24 will open soon.</span>
                                </li>
                            </ul>
                        </marquee>
                    </div>
                </div>
            </div>

            <!-- Notice Board - For Nodal Officers -->
            <div class="col-md-4 mb-4">
                <div class="card notification-card">
                    <div class="notification-header">
                        <i class="fa fa-clipboard"></i> Notice Board - For Nodal Officers
                    </div>
                    <div class="notification-body">
                        <marquee onMouseOver="this.stop()" onMouseOut="this.start()" behavior="scroll" scrollamount="3" direction="up">
                            <ul class="notification-list list-unstyled">
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <span>INO and HoI must update Aadhaar before BioAuth. Any changes will nullify BioAuth.</span>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <a href="/public/FAQ/topclass_school_list_2211_compressed.pdf" target="_blank">List of Top Class Schools for PM YASASVI Top Class School Scheme.</a>
                                </li>
                                <li>
                                    <i class="fa fa-info-circle"></i>
                                    <span>SNO/DNO Login for AY 2023-24 will open soon.</span>
                                </li>
                            </ul>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

  

  
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>