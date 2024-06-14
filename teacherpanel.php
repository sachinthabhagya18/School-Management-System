<?php
require "connection.php";
session_start();

if (isset($_SESSION["t"])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EASB Teacher | Panel </title>
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
                  <a href="t_updateprofile.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>Update Profile</a>
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <?php
                              $count2 = Database::search("SELECT * FROM `ac_officer`");
                              $c2 = $count2->num_rows;
                              ?>
                              <p class="statistics-title">Total Academic Officers</p>
                              <h3 class="rate-percentage text-primary"><b>0<?php echo $c2; ?></b></h3>
                            </div>
                            <div>
                              <?php
                              $count3 = Database::search("SELECT * FROM `teacher`");
                              $c3 = $count3->num_rows;
                              ?>
                              <p class="statistics-title">Total Teachers</p>
                              <h3 class="rate-percentage"><b>0<?php echo $c3; ?></b></h3>

                            </div>
                            <div class="d-none d-md-block">
                              <?php
                              $count4 = Database::search("SELECT * FROM `student`");
                              $c4 = $count4->num_rows;
                              ?>
                              <p class="statistics-title">Total Students</p>
                              <h3 class="rate-percentage text-info"><b>0<?php echo $c4; ?></b></h3>
                            </div>
                            <div class="d-none d-md-block">
                              <?php
                              $count5 = Database::search("SELECT * FROM `subject`");
                              $c5 = $count5->num_rows;
                              ?>
                              <p class="statistics-title">Total Subject</p>
                              <h3 class="rate-percentage"><b>0<?php echo $c5; ?></b></h3>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded table-darkBGImg">
                                <div class="card-body">
                                  <div class="col-sm-8">
                                    <h3 class="text-white upgrade-info mb-0">
                                      School Management System <span class="fw-bold">EASB</span> for Schools
                                    </h3>
                                    <a href="add_lessonnote.php" class="btn btn-info upgrade-btn">Add Lesson Note</a>
                                    <a href="add_assignment.php" class="btn btn-info upgrade-btn">Add Assments</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card bg-primary card-rounded">
                                <div class="card-body pb-0">
                                  <h4 class="card-title card-title-dash text-white mb-4">Teacher Panel Activites</h4>
                                  <div class="row text-center">
                                    <div class="col-sm-6">
                                      <label class="status-summary-ight-white mb-2">*Manage Lesson</label>

                                      <label class="status-summary-ight-white mb-2">*Manage Assignment</label>
                                    </div>
                                    <div class="col-sm-6">
                                      <label class="status-summary-ight-white mb-2">*Manage Result</label>

                                      <label class="status-summary-ight-white mb-2">*Get Student Answears</label>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                        <div class="circle-progress-width">
                                          <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                        </div>
                                        <div>
                                          <p class="text-small mb-2">Active Teacher</p>
                                          <h4 class="mb-0 fw-bold">26.80%</h4>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="circle-progress-width">
                                          <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                        </div>
                                        <div>
                                          <p class="text-small mb-2">Active Student</p>
                                          <h4 class="mb-0 fw-bold"><?php echo $c4; ?></h4>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">

                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash">Teacher Panel</h4>
                                      <p class="card-subtitle card-subtitle-dash">We Have <?php echo $c3; ?> Teachers</p>
                                    </div>
                                  </div>
                                  <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                      <thead>
                                        <tr>

                                          <th>Teacher</th>
                                          <th>teacher's Subject</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <?php
                                          $invoicers = Database::search("SELECT * FROM subject INNER JOIN teacher  ON  subject.id = teacher.subject_id ; ");
                                          $in = $invoicers->num_rows;
                                          for ($i = 0; $i < $in; $i++) {
                                            $ir = $invoicers->fetch_assoc();
                                          ?>
                                            <td>
                                              <div class="d-flex ">
                                                <img src="<?php echo $ir["t_img"] ?>" alt="">
                                                <div>
                                                  <h6><?php echo $ir["t_fname"] . " " . $ir["t_lname"] ?></h6>
                                                  <p><?php echo $ir["t_code"] ?></p>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <h6><?php echo $ir["subjectname"] ?></h6>
                                              <p><?php echo $ir["subjectcode"] ?></p>
                                            </td>
                                        </tr>
                                      <?php
                                          }
                                      ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                          <h4 class="card-title card-title-dash">Students</h4>
                                        </div>
                                      </div>
                                      <div class="mt-3">
                                        <?php
                                        $invoicers2 = Database::search("SELECT * FROM `student` ");
                                        $in2 = $invoicers2->num_rows;
                                        for ($i = 0; $i < $in2; $i++) {
                                          $ir2 = $invoicers2->fetch_assoc();
                                        ?>
                                          <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                            <div class="d-flex">
                                              <img class="img-sm rounded-10" src="<?php echo $ir2["s_img"] ?>" alt="profile">
                                              <div class="wrapper ms-3">
                                                <p class="ms-1 mb-1 fw-bold"><?php echo $ir2["s_fname"] . " " . $ir2["s_lname"] ?></p>
                                                <small class="text-muted mb-0"><?php echo $ir2["s_email"] ?></small>
                                              </div>
                                            </div>
                                          </div>
                                        <?php
                                        }
                                        ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-10  mx-1 mt-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Assignments</h4>
              <div class="table-responsive text-center">
                <table class="table">
                  <thead>

                    <tr>
                      <th>Assignment Name</th>
                      <th>Assignment Id</th>
                      
                      <th>Assignment Relase Date</th>
                      <th>Assignment End Date</th>
                      <th>Batch</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $t_id=$_SESSION["t"]["t_id"];
                      $invoicers = Database::search("SELECT * FROM assignment INNER JOIN teacher ON assignment.teacher_t_id = teacher.t_id INNER JOIN batch ON assignment.batch_id=batch.id
                      WHERE teacher.t_id='".$t_id."'  ; ");
                      $in = $invoicers->num_rows;
                    for ($i = 0; $i < $in; $i++) {
                      $ir = $invoicers->fetch_assoc();
                    ?>
                      <tr>
                        <td><?php echo $ir["a_name"] ?></td>
                        <td><?php echo $ir["a_unic_id"] ?></td>
                        <td><?php echo $ir["a_release_date"] ?></td>
                        <td><?php echo $ir["a_end_date"] ?></td>
                        <td><?php echo $ir["batchname"] ?></td>

                      </tr>
                  
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022.Sachintha bhagya.</span>
            </div>
          </footer>
          <!-- partial -->
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
    <script src="teacherpanel.js"></script>
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