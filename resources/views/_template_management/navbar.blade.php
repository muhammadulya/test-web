<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell noti-icon fw-700"></i>
                    <span class="badge badge-warning noti-icon-badge">1</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                    <div class="dropdown-item noti-title">
                        <h5 class="text-dark"><span class="badge badge-warning float-right">1</span>Message</h5>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item notify-item">
                        <div class="notify-icon"><img src="{{ asset('/assets/images/mercury.png') }}" alt="user-img" class="img-fluid rounded-circle" /> </div>
                        <p class="notify-details"><b>MNC Group</b><small class="">Wellcome home! ini adalah template yang saya buat untuk pemakaian pribadi.</small></p>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item notify-item text-center text-sm">
                        View All
                    </a>
                </div>
            </li>
            
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('/assets/images/mercury.png') }}" alt="Superadmin" class="rounded-circle">
                    <span class="text-white">MNC Group</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                    <a class="dropdown-item" href="#"><span class="badge badge-warning float-right">1</span><i class="mdi mdi-settings "></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-dark" href="#"><i class="mdi mdi-run"></i> Logout</a>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>