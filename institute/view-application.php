<?php
require(__DIR__ . '/../vendor/autoload.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');

use Twilio\Rest\Client;

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        // Fetching form and query parameters
        $viewid = $_GET['viewid'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];

        try {
            // Step 1: Fetch UserID from tblapply using viewid
            $sqlApply = "SELECT UserID FROM tblapply WHERE ID = :viewid";
            $queryApply = $dbh->prepare($sqlApply);
            $queryApply->bindParam(':viewid', $viewid, PDO::PARAM_STR);
            $queryApply->execute();
            $apply = $queryApply->fetch(PDO::FETCH_ASSOC);

            if ($apply) {
                $userID = $apply['UserID'];

                // Step 2: Fetch MobileNumber from tbluser using UserID
                $sqlUser = "SELECT MobileNumber FROM tbluser WHERE ID = :userID";
                $queryUser = $dbh->prepare($sqlUser);
                $queryUser->bindParam(':userID', $userID, PDO::PARAM_STR);
                $queryUser->execute();
                $user = $queryUser->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    $recipientPhone = "+91" . $user['MobileNumber'];

                    // Twilio configuration
                    $sid = "AC9403eed240a87332af4cf9de21ea9b41"; // Replace with your SID
                    $token = "985d794052e2e22e5c33f0d634c38169"; // Replace with your token
                    $messagingServiceSid = "MG4f462da9405bec1277cc8907e83813a5"; // Replace with your service SID

                    // Step 3: Send SMS using Twilio
                    $twilio = new Client($sid, $token);
                    $message = $twilio->messages->create(
                        $recipientPhone,
                        [
                            "messagingServiceSid" => $messagingServiceSid,
                            "body" => "Ahoy 👋, your status has been updated successfully!",
                        ]
                    );

                    // Step 4: Update tblapply after sending the message
                    $sqlUpdate = "UPDATE tblapply SET Status = :status, Remark = :remark WHERE ID = :viewid";
                    $queryUpdate = $dbh->prepare($sqlUpdate);
                    $queryUpdate->bindParam(':status', $status, PDO::PARAM_STR);
                    $queryUpdate->bindParam(':remark', $remark, PDO::PARAM_STR);
                    $queryUpdate->bindParam(':viewid', $viewid, PDO::PARAM_STR);
                    $queryUpdate->execute();

                    echo '<script>alert("Remark has been updated and SMS sent successfully!")</script>';
                } else {
                    echo '<script>alert("Error: User not found!")</script>';
                }
            } else {
                echo '<script>alert("Error: Application not found!")</script>';
            }
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '")</script>';
        }

        echo "<script>window.location.href ='all-application.php'</script>";
    }

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>ASHAVRITI||View Scheme</title>
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="../assets/css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="../assets/css/app-style.css" rel="stylesheet" />

  </head>

  <body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
      <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner">
          <div class="loader"></div>
        </div>
      </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
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

            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View Scholarship Scheme</h5>
                  <div>
                    <?php
                    $vid = $_GET['viewid'];
                    $sql = "SELECT tbluser.ID as uid,tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tbluser.RegDate,tbluser.UserName,tblscheme.ID as sid,tblscheme.SchemeName,tblscheme.SchemeType,tblscheme.SchemeGrade,tblscheme.Yearofscholarship,tblscheme.Category,tblscheme.Criteria,tblscheme.DocomentRequired,tblscheme.LastDate,tblscheme.ScholarDesc,tblscheme.ScholarAmount,tblscheme.PublishedDate,tblapply.ID as appid,tblapply.ApplicationNumber,tblapply.ApplyDate,tblapply.Status,tblapply.DateofBirth,tblapply.Gender,tblapply.Category,tblapply.Religion,tblapply.Address,tblapply.AadharNumber,tblapply.ProfilePic,tblapply.DocReq,tblapply.Remark from tblapply join tbluser on tblapply.UserID=tbluser.ID join tblscheme on tblapply.SchemeId=tblscheme.ID where tblapply.ID = :vid";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':vid', $vid, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                      foreach ($results as $row) { ?>
                        <table border="1" class="table table-bordered">
                          <tr align="center">
                            <td style="color:red" colspan="2">
                              View Scholarship Scheme Details</td>
                          </tr>
                          <tr>
                            <th scope>Name of Scheme</th>
                            <td colspan="4"> <?php echo $row->SchemeName; ?></td>
                          </tr>
                          <tr>
                            <th scope>Type of Scheme</th>
                            <td><?php echo $row->SchemeType; ?></td>
                          </tr>
                          <tr>
                            <th>Scheme Grade</th>
                            <td><?php echo $row->SchemeGrade; ?></td>
                          </tr>
                          <tr>
                            <th>Year of Scholarship</th>
                            <td><?php echo $row->Yearofscholarship; ?></td>
                          </tr>
                          <tr>
                            <th>Category</th>
                            <td><?php echo $row->Category; ?></td>
                          </tr>

                          <tr>
                            <th>Criteria</th>
                            <td colspan="4"><?php echo $row->Criteria; ?></td>
                          </tr>
                          <tr>
                            <th>Last Date</th>
                            <td><?php echo $row->LastDate; ?></td>

                          </tr>
                          <tr>
                            <th>Docoment Required</th>
                            <td><?php echo $row->DocomentRequired; ?></td>

                          </tr>
                          <tr>
                            <th>Scholar Description</th>
                            <td colspan="4"><?php echo $row->ScholarDesc; ?></td>
                          <tr>
                            <th>Scholar Amount</th>

                            <td><?php echo $row->ScholarAmount; ?></td>


                          </tr>




                        </table>
                        <table border="1" class="table table-bordered">
                          <tr align="center">
                            <td style="font-size:15px;color:red">
                              View Application Details: <?php echo $row->ApplicationNumber; ?></td>
                          </tr>
                          <tr>
                            <th scope>Name of Applicant</th>
                            <td> <?php echo $row->FullName; ?></td>
                            <th scope>Mobile Number</th>
                            <td> <?php echo $row->MobileNumber; ?></td>
                          </tr>
                          <tr>
                            <th scope>Email</th>
                            <td><?php echo $row->Email; ?></td>
                            <th scope>Username</th>
                            <td><?php echo $row->UserName; ?></td>
                          </tr>
                          <tr>
                            <th scope>Date of Birth</th>
                            <td><?php echo $row->DateofBirth; ?></td>
                            <th scope>Gender</th>
                            <td><?php echo $row->Gender; ?></td>
                          </tr>
                          <tr>
                            <th>Category</th>
                            <td><?php echo $row->Category; ?></td>
                            <th>Religion</th>
                            <td><?php echo $row->Religion; ?></td>
                          </tr>

                          <tr>
                            <th>Address</th>
                            <td><?php echo $row->Address; ?></td>
                            <th>Aadhar Number</th>
                            <td><?php echo $row->AadharNumber; ?></td>
                          </tr>

                          <tr>
                            <th>Profile Pic</th>
                            <td><img src="../users/proimages/<?php echo $row->ProfilePic; ?>" width="100"></td>
                            <th>Document Details</th>
                            <td><a href="../users/document/<?php echo $row->DocReq; ?>" target="blank"
                                title="For View Doc Click here">View</a></td>
                          </tr>
                          <tr>
                            <th>Apply Date</th>
                            <td><?php echo $row->ApplyDate; ?></td>
                            <th>Applicant Reg Date</th>
                            <td><?php echo $row->RegDate; ?></td>

                          </tr>


                          <tr>
                            <th colspan="4" style="color: red;font-weight: bold;font-size: 15px"> Admin Remarks:</th>
                          </tr>
                          <tr>

                            <th>Application Status</th>

                            <td> <?php $status = $row->Status;

                            if ($row->Status == "Approved") {
                              echo "Approved";
                            }

                            if ($row->Status == "Rejected") {
                              echo "Rejected";
                            }


                            if ($row->Status == "") {
                              echo "Not Response Yet";
                            }


                            ; ?></td>
                            <th>Admin Remark</th>
                            <?php if ($row->Status == "") { ?>

                              <td><?php echo "Not Updated Yet"; ?></td>
                            <?php } else { ?>
                              <td><?php echo htmlentities($row->Remark); ?>
                              </td>
                            <?php } ?>
                          </tr>


                          <?php $cnt = $cnt + 1;
                      }
                    } ?>



                    </table>



                  </div>
                  <br>
                  <div class="table-responsive">
                    <?php

                    if ($status == "") {
                      ?>
                      <p align="center">
                        <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal"
                          data-target="#myModal">Take Action</button>
                      </p>
                    <?php } ?>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <table class="table table-bordered table-hover data-tables">
                              <form method="post" name="submit">



                                <tr>
                                  <th style="color:blue;">Remark :</th>
                                  <td>
                                    <textarea name="remark" placeholder="Remark" rows="8" cols="14"
                                      class="form-control wd-450" required="true"
                                      style="border:solid #000 1px; color:#000"></textarea>
                                  </td>
                                </tr>


                                <tr>
                                  <th style="color:blue;">Status :</th>
                                  <td>

                                    <select name="status" class="form-control wd-450" required="true"
                                      style="border:solid #000 1px; background-color:#fff; color:#000;">
                                      <option value="Approved" selected="true">Approved</option>
                                      <option value="Rejected">Rejected</option>
                                    </select>
                                  </td>
                                </tr>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>

                            </form>
                          </div>
                        </div>
                      </div>


                    </div>

                  </div>
                </div>
              </div>
            </div><!--End Row-->

            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->

          </div>
          <!-- End container-fluid-->

        </div><!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        <?php include_once('includes/footer.php'); ?>
        <!--End footer-->

        <!--start color switcher-->
        <?php include_once('includes/color-switcher.php'); ?>
        <!--end color switcher-->

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