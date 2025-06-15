<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ASHAVRITI || Manage Scheme</title>
  <!-- loader -->
  <link href="../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../assets/css/app-style.css" rel="stylesheet"/>
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner"><div class="loader"></div></div></div></div>
<!-- end loader -->

<!-- Start wrapper-->
<div id="wrapper">

  <!--Start sidebar-wrapper-->
  <?php include_once('includes/sidebar.php');?>
  <!--End sidebar-wrapper-->

  <!--Start topbar header-->
  <?php include_once('includes/header.php');?>
  <!--End topbar header-->

  <div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <?php
        $sql = "SELECT tbluser.ID as uid, tbluser.FullName, tbluser.MobileNumber, tblscheme.SchemeName, 
                tblapply.ApplicationNumber, tblapply.ApplyDate, tblapply.Status 
                FROM tblapply 
                JOIN tbluser ON tblapply.UserID = tbluser.ID 
                JOIN tblscheme ON tblapply.SchemeId = tblscheme.ID 
                WHERE tblapply.Status='Approved'";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
          foreach ($results as $row) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Application: <?php echo htmlentities($row->ApplicationNumber); ?></h5>
                  <p class="card-text">
                    <strong>Scheme Name:</strong> <?php echo htmlentities($row->SchemeName); ?><br>
                    <strong>Full Name:</strong> <?php echo htmlentities($row->FullName); ?><br>
                    <strong>Mobile Number:</strong> <?php echo htmlentities($row->MobileNumber); ?><br>
                    <strong>Apply Date:</strong> <?php echo htmlentities($row->ApplyDate); ?><br>
                    <strong>Status:</strong>
                    <?php if ($row->Status == "") { ?>
                      <span class="badge badge-warning">Not Updated Yet</span>
                    <?php } else { ?>
                      <span class="badge badge-primary"><?php echo htmlentities($row->Status); ?></span>
                    <?php } ?>
                  </p>
                  <a href="view-bank-details.php?appnumber=<?php echo htmlentities($row->ApplicationNumber); ?>" class="btn btn-primary btn-sm">View Details</a>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="col-lg-12">
            <p>No approved applications found.</p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- End content-wrapper -->

  <!--Start Back To Top Button-->
  <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
  <!--End Back To Top Button-->

  <!--Start footer-->
  <?php include_once('includes/footer.php');?>
  <!--End footer-->

</div>
<!--End wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<!-- simplebar js -->
<script src="../assets/plugins/simplebar/js/simplebar.js"></script>
<!-- sidebar-menu js -->
<script src="../assets/js/sidebar-menu.js"></script>
<!-- Custom scripts -->
<script src="../assets/js/app-script.js"></script>

</body>
</html>
<?php } ?>