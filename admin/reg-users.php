<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
} else {
  if ($_GET['del']) {
    $uid = $_GET['del'];
    $sql = "DELETE FROM tbluser WHERE ID = :uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uid', $uid, PDO::PARAM_INT);
    $query->execute();
    echo "<script>alert('User deleted successfully.');</script>";
    echo "<script>window.location.href='reg-users.php'</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ASHAVRITI || Manage Registered Users</title>
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

<!-- Start wrapper -->
<div id="wrapper">

  <!--Start sidebar-wrapper-->
  <?php include_once('includes/sidebar.php'); ?>
  <!--End sidebar-wrapper-->

  <!--Start topbar header-->
  <?php include_once('includes/header.php'); ?>
  <!--End topbar header-->

  <div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <?php
        $sql = "SELECT * FROM tbluser";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
          foreach ($results as $row) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">User ID: <?php echo htmlentities($row->ID); ?></h5>
                  <p class="card-text">
                    <strong>Name:</strong> <?php echo htmlentities($row->FullName); ?><br>
                    <strong>Username:</strong> <?php echo htmlentities($row->UserName); ?><br>
                    <strong>Mobile Number:</strong> <?php echo htmlentities($row->MobileNumber); ?><br>
                    <strong>Email:</strong> <?php echo htmlentities($row->Email); ?><br>
                    <strong>Registration Date:</strong> <?php echo htmlentities($row->RegDate); ?><br>
                  </p>
                  <a href="reg-users.php?del=<?php echo htmlentities($row->ID); ?>" 
                     onclick="return confirm('Do you really want to delete this user?');" 
                     class="btn btn-danger btn-sm">Delete</a>
                  <a href="users-apps.php?userid=<?php echo htmlentities($row->ID); ?>" 
                     class="btn btn-primary btn-sm" target="_blank">View Application</a>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="col-12">
            <div class="alert alert-warning text-center" role="alert">
              No registered users found.
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!--Start Back To Top Button-->
  <a href="javascript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
  <!--End Back To Top Button-->

  <!--Start footer-->
  <?php include_once('includes/footer.php'); ?>
  <!--End footer-->

</div><!--End wrapper-->

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