<?php
require "connection.php";
session_start();

if (isset($_SESSION["u"])) {

  $invoicers = Database::search("SELECT * FROM subject INNER JOIN teacher  ON  subject.id = teacher.subject_id ; ");
  $in = $invoicers->num_rows;
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EASB Admin | Manage Teachers</title>
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
              $profileimg = Database::search("SELECT * FROM `admin` WHERE `adminusername`='" . $_SESSION["u"]["adminusername"] . "' ");
              $pn = $profileimg->num_rows;
              $s = $profileimg->fetch_assoc();
              ?>
              <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?php echo $s["adminfname"] . " " . $s["adminlname"] ?></span></h1>
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
                $profileimg = Database::search("SELECT * FROM `admin` WHERE `adminusername`='" . $_SESSION["u"]["adminusername"] . "' ");
                $pn = $profileimg->num_rows;
                if ($pn == 1) {
                  $p = $profileimg->fetch_assoc();
                ?>
                  <img class="img-xs rounded-circle" src="<?php echo $p["adminimg"] ?>" alt="Profile image" />
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
                    $profileimg = Database::search("SELECT * FROM `admin` WHERE `adminusername`='" . $_SESSION["u"]["adminusername"] . "' ");
                    $pn = $profileimg->num_rows;
                    if ($pn == 1) {
                      $p = $profileimg->fetch_assoc();
                    ?>
                      <img class="img-xs rounded-circle" src="<?php echo $p["adminimg"] ?>" alt="Profile image">
                    <?php
                    } else {
                    ?>
                      <img class="img-xs rounded-circle" src="images/profile.png" alt="Profile image">
                    <?php
                    }
                    ?>
                    <p class="mb-1 mt-3 font-weight-semibold"><?php echo $p["adminfname"] . " " . $p["adminlname"] ?></p>
                    <p class="fw-light text-muted mb-0"><?php echo $p["adminemail"] ?></p>
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

        require "a_sildenav.php"

        ?>
        <!-- partial -->



        <div class="col-10 mx-1  mt-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage teacher</h4>
              <div class="table-responsive row text-center">
                <div class="col-6">
                  <div class="row">
                    <div class="col-3 d-inline-block d-grid">
                      <select class="btn btn-sm  btn-outline-primary" id="basic_search_subject">
                        <option value="0">Select Subject</option>
                        <?php
                        $rs = Database::search("SELECT * FROM `subject`");
                        $n = $rs->num_rows;

                        for ($i = 1; $i <= $n; $i++) {
                          $cat = $rs->fetch_assoc();
                        ?>
                          <option value="<?php echo $cat["id"] ?>"><?php echo $cat["subjectname"] ?></option>
                        <?php
                        }

                        ?>

                      </select>
                    </div>
                    <div class="col-2 d-inline-block d-grid">
                      <button class="btn btn-sm btn-dark mt-1" onclick="basicSearch();">Search</button>
       
                    </div>
                    <div class="col-1 d-inline-block d-grid">
                    <button class="btn btn-sm btn-dark mt-1" onclick="refresh();">Refresh</button>
                    </div>

                  </div>
                </div>
                <table class="table">
                  <thead>

                    <tr>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Subject Code</th>
                      <th>Mobile</th>
                      <th>subject</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody id="product_view_div">
                    <?php
                    for ($i = 0; $i < $in; $i++) {
                      $ir = $invoicers->fetch_assoc();
                    ?>
                      <tr>
                      <td><?php echo $ir["t_fname"] . " " . $ir["t_lname"] ?></td>
                        <td><?php echo $ir["t_email"] ?></td>
                        <td><?php echo $ir["t_code"] ?></td>
                        <td><?php echo $ir["t_mobile"] ?></td>

                        <td><?php echo $ir["subjectname"] ?></td>


                        <td><button class="badge badge-warning" onclick="sendid(<?php echo $ir['t_id'] ?>);">Edit</button> |
                          <button class="badge badge-info" onclick="sendemailidteacher(<?php echo $ir['t_id'] ?>);">Send Request</button> |
                          <button class="badge badge-danger" onclick="deletemodel(<?php echo $ir['t_id'] ?>);">Delete</button>



                        </td>

                      </tr>
                      <div class="modal fade" id="deleteModel<?php echo $ir['t_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-warning" id="exampleModalLabel">Warning...</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Are You Sure You Want To Delete This Product
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                              <button type="button" class="btn btn-danger" onclick="deleteteacher(<?php echo $ir['t_id'] ?>);">Yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
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
    <script src="teacher.js"></script>
    <script src="bootstrap.js"></script>

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