<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="../dashboard/index.html" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="../assets/images/logo-white.svg" alt="logo image" class="logo-lg" />
                <span class="badge bg-primary rounded-pill ms-2 theme-version">v3.1.0</span>
            </a>
        </div>

        <div class="card pc-user-card">
            <div class="card-body">
                <div class="nav-user-image">
                    <a data-bs-toggle="collapse" href="#navuserlink">
                        <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                            class="user-avtar rounded-circle" />
                    </a>
                </div>
                <div class="pc-user-collpsed collapse" id="navuserlink">
                    <h4 class="mb-0">Jonh Smith</h4>
                    <span>Administrator</span>
                    <ul>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-user"></i>
                                <span>My Account</span>
                            </a></li>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-gear"></i>
                                <span>Settings</span>
                            </a></li>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-lock-key"></i>
                                <span>Lock Screen</span>
                            </a></li>
                        <li><a class="pc-user-links">
                                <i class="ph-duotone ph-power"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">

                @can('customerService')
                    <li class="pc-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="/dashboard" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-gauge"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->is('transactions') ? 'active' : '' }}">
                        <a href="/transactions" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-money"></i>
                            </span>
                            <span class="pc-mtext">Transaksi</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->is('members') ? 'active' : '' }}">
                        <a href="/members" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-user"></i>
                            </span>
                            <span class="pc-mtext">Member</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->is('cashbooks') ? 'active' : '' }}">
                        <a href="/cashbooks" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-book"></i>
                            </span>
                            <span class="pc-mtext">Kas</span>
                        </a>
                    </li>
                @endcan


                @can('marketingOrAdmin')
                    <li class="pc-item {{ request()->is('expenditures') ? 'active' : '' }}">
                        <a href="/expenditures" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-book"></i>
                            </span>
                            <span class="pc-mtext">Pengeluaran</span>
                        </a>
                    </li>
                @endcan

                
                <li class="pc-item {{ request()->is('account-setting') ? 'active' : '' }}">
                  <a href="/account_setting" class="pc-link">
                      <span class="pc-micon">
                          <i class="ph-duotone ph-user-circle-gear"></i>
                      </span>
                      <span class="pc-mtext">Setting Akun</span>
                  </a>
              </li>

            </ul>
            {{-- <div class="card nav-action-card">
          <div class="card-body">
            <h5 class="text-white">Help Center</h5>
            <p class="text-white text-opacity-75">Please contact us for more questions.</p>
            <a target="_blank" href="https://phoenixcoded.authordesk.app/" class="btn btn-primary">Go to help Center</a>
          </div>
        </div> --}}
        </div>
    </div>
</nav>
