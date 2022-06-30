<div class="col-lg-3 border-end-lg">
    <div class="aside-content">
        <div class="d-flex align-items-center justify-content-between">
            <div class="order-first">
                <h4>Application Service</h4>
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
            <ul class="nav flex-column">
                <li class="nav-item @if($labelName == "Applications") {{"active"}} @endif" >
                    <a class="nav-link d-flex align-items-center" href="{{route('directorAllApplication')}}">
                        <i data-feather="inbox" class="icon-lg me-2"></i>
                        All Applications
                    </a>
                </li>

            </ul>
        </div>

        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="chats" role="tabpanel" aria-labelledby="chats-tab">
                <div class="border-bottom">
                    <p class="text-muted mb-2">Clubs</p>

                </div>
                <div class="email-list">
                @foreach($clubs as $club)
                    <div class="email-list-item row">
                        <a href="/director/application/club/{{$club->id}}" class="email-list-detail">
                            <div class="col-2">
                                <i data-feather="folder" class="text-muted icon-lg me-2"></i>
                            </div>
                            <div class="content col-10">
                                <strong class="from">{{$club->name}}</strong>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>



