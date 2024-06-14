<nav class="sidebar sidebar-offcanvas text-center" id="sidebar">
<div >
        <img  class="logosize"src="images/logo.png" >
    </div>
    <h4 class="text-primary"><b>Accdamic Officer Panel</b></h4>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="ac_home.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard AC_ Officer</span>
            </a>
        </li>
        <li class="nav-item nav-category">BASIC</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Basic Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add_student.php">Registration Students</a></li>
                <li class="nav-item"> <a class="nav-link" href="manage_student.php">Manage Students</a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="#">Attendance</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">View Personal Details</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Class Shedules</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Our Information</a></li> -->
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Assignments </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Assignments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="ac_view_assment_result.php">Action Assignment</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">ACTION</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Students1" aria-expanded="false" aria-controls="Students1">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">ACTION</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Students1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="ac_changepassword.php">Change Password</a></li>
                    <li class="nav-item"> <a class="nav-link" href="ac_updateprofile.php">Update Profile</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>