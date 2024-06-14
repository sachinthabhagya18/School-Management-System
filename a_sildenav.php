<nav class="sidebar sidebar-offcanvas text-center" id="sidebar">
<div >
        <img  class="logosize"src="images/logo.png" >
    </div>
<h4 class="text-primary"><b>Admin Panel</b></h4>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="adminpanel.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title"> Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Student Batches</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Student Batch</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="create_batch.php">Create Batch</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_batch.php">Manage batch</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Subjects</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Create Subject</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="create_subject.php">Create Subject</a></li>
                    <li class="nav-item"><a class="nav-link" href="manage_subject.php">Manage Subjects</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="combination_subject.php">Add Subject Combination </a></li> -->
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Members</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Students" aria-expanded="false" aria-controls="Students">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Students</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Students">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="admin_manage_student.php">Manage Students</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Teacher" aria-expanded="false" aria-controls="Teacher">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Teacher</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Teacher">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_teacher.php">Add Teacher</a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_teacher.php">Manage Teacher</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Academic" aria-expanded="false" aria-controls="Academic">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Academic officers
                </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Academic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_acofficer.php">Add Academic officers
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="manage_acofficer.php">Manage Academic officers
                        </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Result</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="a_result.php">Check Result</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>