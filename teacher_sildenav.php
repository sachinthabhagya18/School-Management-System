<nav class="sidebar sidebar-offcanvas text-center" id="sidebar">
    <div >
        <img  class="logosize"src="images/logo.png" >
    </div>
    <h4 class="text-primary"><b>Teacher Panel</b></h4>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="teacherpanel.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Lesson Note</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Lesson Note</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_lessonnote.php">Add Lesson Note</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_lessonnote.php">Manage Lesson Note</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Assignments</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Assignments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="add_assignment.php">Add Assignments</a></li>
                    <li class="nav-item"><a class="nav-link" href="manage_assignment.php">Manage Assignments</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Answer Sheet</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Students" aria-expanded="false" aria-controls="Students">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Answer Sheet</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Students">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="view_answersheet.php">View Answer From Students</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Result</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Students1" aria-expanded="false" aria-controls="Students1">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Results</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Students1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="t_view_marks.php">View Marks From Students</a></li>
                    <li class="nav-item"> <a class="nav-link" href="t_add_marks.php">Add Assement Marks</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">ACTION</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Students12" aria-expanded="false" aria-controls="Students12">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">ACTION</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Students12">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="t_changepassword.php">Change Password</a></li>
                    <li class="nav-item"> <a class="nav-link" href="t_updateprofile.php">Update Profile</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>