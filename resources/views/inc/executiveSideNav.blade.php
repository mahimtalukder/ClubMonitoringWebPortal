    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('executiveDash') }}" class="sidebar-brand">
                CM<span>WP</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{ route('executiveDash') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Personal</li>
                <li class="nav-item">
                    <a href="{{ route('executiveProfile') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">View Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('executiveEditProfile') }}" class="nav-link">
                        <i class="link-icon" data-feather="edit"></i>
                        <span class="link-title">Edit Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('executiveDash') }}" class="sidebar-brand">
                CM<span>WP</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{ route('executiveDash') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Personal</li>
                <li class="nav-item">
                    <a href="{{ route('executiveProfile') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">View Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('executiveEditProfile') }}" class="nav-link">
                        <i class="link-icon" data-feather="edit"></i>
                        <span class="link-title">Edit Profile</span>
                    </a>
                </li>

                <li class="nav-item nav-category">Services</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                        aria-expanded="false" aria-controls="general-pages">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Application</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="general-pages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('executiveAllApplication') }}" class="nav-link">All Application</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('executiveApplicationCompose') }}" class="nav-link">New
                                    Application</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item nav-category">Users</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#member-pages" role="button"
                        aria-expanded="false" aria-controls="member-pages">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Members</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="member-pages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('executiveViewAllMamber') }}" class="nav-link">All Members</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('executiveCreateNewMamber') }}" class="nav-link">New Members</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item nav-category">Notices</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#notic-pages" role="button"
                        aria-expanded="false" aria-controls="notic-pages">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Notic</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="notic-pages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('SendNoticeMamber') }}" class="nav-link">Send Notice</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ViewAllNotice') }}" class="nav-link">View Notice</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>


        </div>
    </nav>
    <!-- partial -->
