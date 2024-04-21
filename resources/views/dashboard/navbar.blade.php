<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>

        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('images/logo.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <hr>
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('profile') }}" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="hide-menu">My Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" data-bs-toggle="collapse" href="#oblivion-collapse" role="button"
                        aria-expanded="false" aria-controls="oblivion-collapse">
                        <span>
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                        </span>
                        <span class="hide-menu">Oblivion <i class="fa-solid fa-chevron-down fa-xs"></i></span>
                    </a>
                </li>
                <ul id="oblivion-collapse" class="collapse">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('mybots.index')}}" aria-expanded="false">
                            <span>
                                <i class="ti ti-alert-circle"></i>
                            </span>
                            <span class="hide-menu">My bots</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('mysettings.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-cards"></i>
                            </span>
                            <span class="hide-menu">My settings</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-cards"></i>
                            </span>
                            <span class="hide-menu">My wallet</span>
                        </a>
                    </li>
                </ul>
            </ul>
            <div class="logout-div">

                <a href="{{ route('logout') }}" class="logout-link btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </div>

        </nav>
    </div>
    <!-- End Sidebar scroll-->
</aside>


<!-- End Sidebar navigation -->
