<header   class="pc-header">
    
    <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ph-duotone ph-list"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ph-duotone ph-list"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-magnifying-glass"></i>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-1">
                            <div class="mb-0 d-flex align-items-center">
                                <input type="search" class="form-control border-0 shadow-none"
                                    placeholder="Search here. . ." />
                                <button class="btn btn-light-secondary btn-search">Search</button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-sun-dim"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                            <i class="ph-duotone ph-moon"></i>
                            <span>Dark</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                            <i class="ph-duotone ph-sun-dim"></i>
                            <span>Light</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                            <i class="ph-duotone ph-cpu"></i>
                            <span>Default</span>
                        </a>
                    </div>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-diamonds-four"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-user"></i>
                            <span>My Account</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-gear"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-lifebuoy"></i>
                            <span>Support</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-lock-key"></i>
                            <span>Lock Screen</span>
                        </a>
                        <form action="/logout" method="POST">
                            @csrf
                        <button type="submit" class="dropdown-item">
                            <span class="d-flex align-items-center">
                                <i class="ph-duotone ph-power"></i>
                                <span>Logout</span>
                            </span>
                        </button>
                        </form>
                    </div>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ph-duotone ph-bell"></i>
                        <span class="badge bg-danger pc-h-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h4 class="m-0">Notifications</h4>
                            <ul class="list-inline ms-auto mb-0">
                                <li class="list-inline-item">
                                    <a href="#" class="avtar avtar-s btn-link-hover-primary">
                                        <i class="ti ti-arrows-diagonal f-18"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="avtar avtar-s btn-link-hover-danger">
                                        <i class="ti ti-x f-18"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-body text-wrap header-notification-scroll position-relative"
                            style="max-height: calc(100vh - 235px)">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="text-span">Today</p>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                                                class="user-avtar avtar avtar-s" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h5 class="mb-0 text-truncate">Keefe Bond <span
                                                            class="text-body"> added new tags to </span> 💪 Design
                                                        system</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm text-muted">2 min ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative text-muted mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the 1500s.</span></p>
                                            <span
                                                class="badge bg-light-primary border border-primary me-1 mt-1">web
                                                design</span>
                                            <span
                                                class="badge bg-light-warning border border-warning me-1 mt-1">Dashobard</span>
                                            <span
                                                class="badge bg-light-success border border-success me-1 mt-1">Design
                                                System</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-primary">
                                                <i class="ph-duotone ph-chats-teardrop f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h5 class="mb-0 text-truncate">Message</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm text-muted">1 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative text-muted mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the 1500s.</span></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <p class="text-span">Yesterday</p>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-danger">
                                                <i class="ph-duotone ph-user f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h5 class="mb-0 text-truncate">Challenge invitation</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm text-muted">12 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative text-muted mt-1 mb-2"><br /><span
                                                    class="text-truncate"><strong> Jonny aber </strong> invites to
                                                    join the challenge</span></p>
                                            <button
                                                class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                                            <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-info">
                                                <i class="ph-duotone ph-notebook f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h5 class="mb-0 text-truncate">Forms</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm text-muted">2 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative text-muted mt-1 mb-2">Lorem Ipsum is simply
                                                dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard
                                                dummy text ever since the 1500s.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                                                class="user-avtar avtar avtar-s" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h5 class="mb-0 text-truncate">Keefe Bond <span
                                                            class="text-body"> added new tags to </span> 💪 Design
                                                        system</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm text-muted">2 min ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative text-muted mt-1 mb-2"><br /><span
                                                    class="text-truncate">Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the 1500s.</span></p>
                                            <button
                                                class="btn btn-sm rounded-pill btn-outline-secondary me-2">Decline</button>
                                            <button class="btn btn-sm rounded-pill btn-primary">Accept</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avtar avtar-s bg-light-success">
                                                <i class="ph-duotone ph-shield-checkered f-18"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 me-3 position-relative">
                                                    <h5 class="mb-0 text-truncate">Security</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-sm text-muted">5 hour ago</span>
                                                </div>
                                            </div>
                                            <p class="position-relative text-muted mt-1 mb-2">Lorem Ipsum is simply
                                                dummy text of the printing and typesetting industry. Lorem Ipsum has
                                                been the industry's standard
                                                dummy text ever since the 1500s.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-footer">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="d-grid"><button class="btn btn-primary">Archive all</button></div>
                                </div>
                                <div class="col-6">
                                    <div class="d-grid"><button class="btn btn-outline-secondary">Mark all as
                                            read</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                        aria-expanded="false">
                        <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h4 class="m-0">Profile</h4>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative"
                                style="max-height: calc(100vh - 225px)">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                                                    class="wid-50 rounded-circle" />
                                            </div>
                                            <div class="flex-grow-1 mx-3">
                                                <h5 class="mb-0">{{ session('user_data')->name }}</h5>
                                                <a class="link-primary"
                                                    href="#">{{ session('user_data')->email }}</a>
                                            </div>
                                            <span class="badge bg-primary">PRO</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <button  data-pc-animate="fade-in-scale"
                                        type="button"
                                    
                                        data-bs-toggle="modal"
                                        data-bs-target="#changePassword" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-key"></i>
                                                <span>Change password</span>
                                            </span>
                                        </button>
                                        <a href="/account_setting" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-user-circle"></i>
                                                <span>Edit profile</span>
                                            </span>
                                        </a>
                                        {{-- <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-envelope-simple"></i>
                                                <span>Recently mail</span>
                                            </span>
                                            <div class="user-group">
                                                <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                                                    class="avtar" />
                                                <img src="../assets/images/user/avatar-2.jpg" alt="user-image"
                                                    class="avtar" />
                                                <img src="../assets/images/user/avatar-3.jpg" alt="user-image"
                                                    class="avtar" />
                                            </div>
                                        </a> --}}
                                        <form action="/logout" method="POST">
                                            @csrf
                                        <button type="submit" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-power"></i>
                                                <span>Logout</span>
                                            </span>
                                        </button>
                                    </form>
                                    </li>
                                    {{-- <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-heart"></i>
                                                <span>Favorite</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-arrow-circle-down"></i>
                                                <span>Download</span>
                                            </span>
                                            <span
                                                class="avtar avtar-xs rounded-circle bg-danger text-white">10</span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-globe-hemisphere-west"></i>
                                                <span>Languages</span>
                                            </span>
                                            <span class="flex-shrink-0">
                                                <select
                                                    class="form-select bg-transparent form-select-sm border-0 shadow-none">
                                                    <option value="1">English</option>
                                                    <option value="2">Spain</option>
                                                    <option value="3">Arbic</option>
                                                </select>
                                            </span>
                                        </div>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-flag"></i>
                                                <span>Country</span>
                                            </span>
                                        </a>
                                        <div class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-moon"></i>
                                                <span>Dark mode</span>
                                            </span>
                                            <div class="form-check form-switch form-check-reverse m-0">
                                                <input class="form-check-input f-18" id="dark-mode"
                                                    type="checkbox" onclick="dark_mode()" role="switch" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-star text-warning"></i>
                                                <span>Upgrade account</span>
                                                <span
                                                    class="badge bg-light-success border border-success ms-2">NEW</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-bell"></i>
                                                <span>Notifications</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-gear-six"></i>
                                                <span>Settings</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-plus-circle"></i>
                                                <span>Add account</span>
                                            </span>
                                        </a>
                                       
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>