<?php
require "connection.php";
session_start();

if (isset($_SESSION["t"])) {
  $subject_id = $_SESSION["t"]["subject_id"];
  $invoicers = Database::search("SELECT * FROM `subject` ");
  $in = $invoicers->num_rows;
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EASB Teacher | Add Marks </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="index.html">
              <img src="images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
              <img src="images/logo-mini.svg" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <?php
              $profileimg = Database::search("SELECT * FROM `teacher` WHERE `t_email`='" . $_SESSION["t"]["t_email"] . "' ");
              $pn = $profileimg->num_rows;
              $s = $profileimg->fetch_assoc();
              ?>
              <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?php echo $s["t_fname"] . " " . $s["t_lname"] ?></span></h1>
              <h3 class="welcome-sub-text">School Management System summary this week </h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item d-none d-lg-block">
              <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" class="form-control">
              </div>
            </li>
            <li class="nav-item">
              <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
              </form>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">

                <?php
                $profileimg = Database::search("SELECT * FROM `teacher` WHERE `t_email`='" . $_SESSION["t"]["t_email"] . "' ");
                $pn = $profileimg->num_rows;
                if ($pn == 1) {
                  $p = $profileimg->fetch_assoc();
                ?>
                  <img class="img-xs rounded-circle" src="<?php echo $p["t_img"] ?>" alt="Profile image" />
                <?php
                } else {
                ?>
                  <img class="img-xs rounded-circle" src="images/profile.png" alt="Profile image" />
                <?php
                }
                ?>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">

                    <?php
                    $profileimg = Database::search("SELECT * FROM `teacher` WHERE `t_email`='" . $_SESSION["t"]["t_email"] . "' ");
                    $pn = $profileimg->num_rows;
                    if ($pn == 1) {
                      $p = $profileimg->fetch_assoc();
                    ?>
                      <img class="img-xs rounded-circle" src="<?php echo $p["t_img"] ?>" alt="Profile image">
                    <?php
                    } else {
                    ?>
                      <img class="img-xs rounded-circle" src="images/profile.png" alt="Profile image">
                    <?php
                    }
                    ?>
                    <p class="mb-1 mt-3 font-weight-semibold"><?php echo $p["t_fname"] . " " . $p["t_lname"] ?></p>
                    <p class="fw-light text-muted mb-0"><?php echo $p["t_email"] ?></p>
                  </div>
                  <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>Update Profile</a>
                  <a class="dropdown-item" onclick="signout();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                </div>
            </li>


          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="ti-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border me-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <?php

        require "teacher_sildenav.php"

        ?>
        <!-- partial -->



  
          <div class="col-8  mt-3 grid-margin ">
            <div class="card mx-lg-5 mx-sm-5">
              <div class="card-body ">
                <h4 class="card-title">Add Students Marks</h4>
                <p class="card-description">
                  Please add student marks
                </p>
                <div class="form-group">
                  <label for="exampleSelectGender">Student</label>
                  <select class="form-control" id="s_nic">
                    <option value="0">Select Student With NIC</option>
                    <?php

                    $rs1 = Database::search("SELECT DISTINCT s_id,s_nic FROM teacher INNER JOIN assignment ON assignment.teacher_t_id=teacher.t_id
                    INNER JOIN `subject` ON teacher.subject_id= `subject`.id
                    INNER JOIN subject_has_student ON subject_has_student.subject_id = `subject`.id
                    INNER JOIN student ON student.s_id = subject_has_student.student_s_id WHERE subject_has_student.subject_id = '" . $subject_id . "'");
                    $n1 = $rs1->num_rows;

                    for ($i = 1; $i <= $n1; $i++) {
                      $cat = $rs1->fetch_assoc();
                    ?>
                      <option value="<?php echo $cat["s_id"] ?>"><?php echo $cat["s_nic"] ?></option>
                    <?php
                    }

                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Assment</label>
                  <select class="form-control" id="a_id">
                    <option value="0">Select Assment</option>
                    <?php

                    $rs1 = Database::search("SELECT * FROM teacher INNER JOIN assignment ON assignment.teacher_t_id=teacher.t_id
                    INNER JOIN `subject` ON teacher.subject_id= `subject`.id
                    INNER JOIN subject_has_student ON subject_has_student.subject_id = `subject`.id
                    INNER JOIN student ON student.s_id = subject_has_student.student_s_id WHERE subject_has_student.subject_id  = '" . $subject_id . "'");
                    $n1 = $rs1->num_rows;

                    for ($i = 1; $i <= $n1; $i++) {
                      $cat = $rs1->fetch_assoc();
                    ?>
                      <option value="<?php echo $cat["a_id"] ?>"><?php echo $cat["a_unic_id"] ?></option>
                    <?php
                    }

                    ?>
                  </select>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="exampleInputEmail3">Assment Marks</label>
                    <input type="text" class="form-control" id="marks" placeholder="Enter Marks">
                  </div>
                </div>
                <button  class="btn btn-primary me-2" onclick="addmarks();">Add Assment Marks</button>

              </div>
            </div>
          








          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->

      <!-- plugins:js -->
      <script src="vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="vendors/chart.js/Chart.min.js"></script>
      <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
      <script src="vendors/progressbar.js/progressbar.min.js"></script>

      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <script src="js/settings.js"></script>
      <script src="js/todolist.js"></script>
      <script src="script.js"></script>
      <script src="teacherpanel.js"></script>

      <script src="bootstrap.bundle.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="js/dashboard.js"></script>
      <script src="js/Chart.roundedBarCharts.js"></script>
      <!-- End custom js for this page-->
  </body>

  </html>
<?php
} else {
?>
  <script>
    window.location = "teacherlogin.php";
  </script>
<?php
}
?>