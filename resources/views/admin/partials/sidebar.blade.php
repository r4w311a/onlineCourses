<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin-dashboard') }}">
                <i class="ti-layout-grid2 menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#courses" aria-expanded="false" aria-controls="ui-basic">
                <i class="ti-folder menu-icon"></i>
                <span class="menu-title">Courses</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="courses">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-courses') }}">View Courses</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-course') }}">Add New Course</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('admin/chapters') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#chapters" aria-expanded="false" aria-controls="ui-basic2">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Chapters</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="chapters">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-chapters') }}">View Chapters</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-chapter') }}">Add New Chapter</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('admin/lessons') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#lessons" aria-expanded="false" aria-controls="ui-basic2">
                <i class="ti-video-clapper menu-icon"></i>
                <span class="menu-title">Lessons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="lessons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-lessons') }}">View Lessons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('upload-lesson') }}">Upload New Lesson</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('admin/users') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic2">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view-users') }}">View Users</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add-user') }}">Add New User</a>
                    </li>
                </ul>
            </div>
        </li>
        
    </ul>
</nav>
