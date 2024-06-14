
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EASB Admin | Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 text-center">
              <div class="brand-logo">
                <img src="images/logo.png" alt="logo">
              </div>
              <h4>Hello! let's get Admin Login</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <form class="pt-3">
              <p class="text-danger" id="msg2"></p>
                <?php
                require "connection.php";
                $e = "";
                $p = "";

                if (isset($_COOKIE["e"])) {
                  $e = $_COOKIE["e"];
                }

                if (isset($_COOKIE["p"])) {
                  $p = $_COOKIE["p"];
                }

                ?>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="username" placeholder="Username" value="<?php echo $e; ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" value="<?php echo $p; ?>" type="password">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="signInadmin();">SIGN IN</a>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center d-block">
                  <div class="form-check ">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" id="remember">
                 
                    </label>
                  </div>
                </div> -->
                <a href="index.php">Go to Mail Page</a>
              </form>
            </div>
          </div>
        </div>
      </div>



      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="script.js"></script>
  <script src="bootstrap.js"></script>
  <!-- endinject -->
</body>

</html>
