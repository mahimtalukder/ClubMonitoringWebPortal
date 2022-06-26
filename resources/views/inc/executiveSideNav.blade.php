    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('executiveDash') }}" class="sidebar-brand">
                MT<span>LTD</span>
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
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">View Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('EditProfile')}}" class="nav-link">
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
                MT<span>LTD</span>
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
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">View Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('EditProfile')}}" class="nav-link">
                        <i class="link-icon" data-feather="edit"></i>
                        <span class="link-title">Edit Profile</span>
                    </a>
                </li>

                <li class="nav-item nav-category">Services</li>
                <li class="nav-item active">
                    <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="true" aria-controls="email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail link-icon"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <span class="link-title">Application</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down link-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <div class="collapse show" id="email">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="https://www.nobleui.com/laravel/template/demo1/email/inbox" class="nav-link ">Sent</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.nobleui.com/laravel/template/demo1/email/compose" class="nav-link active">Compose</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>


        </div>
    </nav>
    <!-- partial -->
