<div class="col-lg-3 border-end-lg">
    <div class="aside-content">
        <div class="d-flex align-items-center justify-content-between">
            <div class="order-first">
                <h4>Club Service</h4>
            </div>
        </div>
        <div class="aside-header mt-3">
            <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                <div class="d-flex align-items-center">
                    <figure class="me-2 mb-0">
                        <img src="@yield('picture')" class="img-sm rounded-circle" alt="profile">
                        <div class="status online"></div>
                    </figure>
                    <div>
                        <h6>@yield('name')</h6>
                        <p class="text-muted tx-13">Director</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="email-aside-nav collapse mt-2">
            <div class="d-grid my-3">
                <a class="btn btn-primary" href="{{ route('directorCreateClub') }}">Create Club</a>
            </div>
        </div>
    </div>
</div>



