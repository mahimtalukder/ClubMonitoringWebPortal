<div class="col-lg-3 border-end-lg">
    <div class="aside-content">
        <div class="d-flex align-items-center justify-content-between">
            <button class="navbar-toggle btn btn-icon border d-block d-lg-none" data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                <span class="icon"><i data-feather="chevron-down"></i></span>
            </button>
            <div class="order-first">
                <h4>Application Service</h4>
                <p class="text-muted">@yield('club_name')</p>
            </div>
        </div>
        <div class="d-grid my-3">
            <a class="btn btn-primary" href="{{route('executiveApplicationCompose')}}">Create Application</a>
        </div>
        <div class="email-aside-nav collapse">
            <ul class="nav flex-column">
                <li class="nav-item @if($labelName == "Applications") {{"active"}} @endif" >
                    <a class="nav-link d-flex align-items-center" href="{{route('executiveAllApplication')}}">
                        <i data-feather="inbox" class="icon-lg me-2"></i>
                        All Applications
                    </a>
                </li>

            </ul>

            <p class="text-muted tx-12 fw-bolder text-uppercase mb-2 mt-4">Labels</p>
            <ul class="nav flex-column">
                <li class="nav-item @if($labelName == "Approved Applications") {{"active"}} @endif">
                    <a class="nav-link d-flex align-items-center" href="{{route('executiveApplicationApproved')}}">
                        <i data-feather="check" class="text-success icon-lg me-2"></i>
                        Approved Application
                    </a>
                </li>
                <li class="nav-item @if($labelName == "Pending Applications") {{"active"}} @endif">
                    <a class="nav-link d-flex align-items-center" href="{{route('executiveApplicationPending')}}">
                        <i data-feather="clock" class="icon-lg me-2"></i>
                        Under Review
                    </a>
                </li>
                <li class="nav-item @if($labelName == "Rejected Applications") {{"active"}} @endif">
                    <a class="nav-link d-flex align-items-center" href="{{route('executiveApplicationRejected')}}">
                        <i data-feather="x" class="text-danger icon-lg me-2"></i>
                        Rejected Application
                    </a>
                </li>
            </ul>
        </div>


    </div>
</div>
