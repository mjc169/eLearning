<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo Yii::app()->createUrl('site/index'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="false" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Students</span>
        </a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('student/index'); ?>">Student List</a>
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('student/create'); ?>">Add Student</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses" aria-expanded="false" aria-controls="collapseClasses">
            <i class="fas fa-fw fa-folder"></i>
            <span>Classes</span>
        </a>
        <div id="collapseClasses" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('student/index'); ?>">Class List</a>
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('student/create'); ?>">Create Class</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuizzes" aria-expanded="false" aria-controls="collapseQuizzes">
            <i class="fas fa-fw fa-folder"></i>
            <span>Quizzes</span>
        </a>
        <div id="collapseQuizzes" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('quiz/index'); ?>">Quiz List</a>
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('quiz/index'); ?>">Assign Quiz</a>
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('quiz/create'); ?>">Create Quiz</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFiles" aria-expanded="false" aria-controls="collapseFiles">
            <i class="fas fa-fw fa-folder"></i>
            <span>Files</span>
        </a>
        <div id="collapseFiles" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('file/myFiles'); ?>">My Files</a>
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('file/sharedFiles'); ?>">Shared Files</a>
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('file/assignFiles'); ?>">Assign Files</a>
                <a class="collapse-item" href="<?php echo Yii::app()->createUrl('file/create'); ?>">Upload File</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>