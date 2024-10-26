    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <?php $isNonStudent = Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_ADMIN) ? "Admin Portal" : "Teacher Portal"; ?>
            <div class="sidebar-brand-text mx-3"><?php echo Yii::app()->user->isGuest ? "Guest" : $isNonStudent ?></div>
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

        <?php if (Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_ADMIN)) : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccountAdmin" aria-expanded="false" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Accounts</span>
                </a>
                <div id="collapseAccountAdmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('account/admins'); ?>">View List of Admins</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('account/students'); ?>">View List of Students</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('account/teachers'); ?>">View List of Teachers</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('account/create'); ?>">Add New Account</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubjectAdmin" aria-expanded="false" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Subjects</span>
                </a>
                <div id="collapseSubjectAdmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('subject/index'); ?>">View List of Subjects</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('subject/assignedSubjects'); ?>">View Assigned Subjects</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('subject/create'); ?>">Add New Subject</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('subject/createAssignedSubject'); ?>">Assign Subject To Teacher</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSectionAdmin" aria-expanded="false" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Sections</span>
                </a>
                <div id="collapseSectionAdmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('section/index'); ?>">View List of Sections</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('section/create'); ?>">Add New Section</a>
                    </div>
                </div>
            </li>
        <?php else : ?>
            <!-- Nav Item - Pages Collapse Menu -->

            <?php /*
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
            */ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSections" aria-expanded="false" aria-controls="collapseSections">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Sections</span>
                </a>
                <div id="collapseSections" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('teacherSection/preview'); ?>">Section List</a>
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
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('class/index'); ?>">Class List</a>
                        <a class="collapse-item" href="<?php echo Yii::app()->createUrl('class/assignClass'); ?>">Create Class</a>
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
        <?php endif; ?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <span class="text-light text-xs">Collapse</span>
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>