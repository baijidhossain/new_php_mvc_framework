<header class="shadow-md rounded-lg ">
    <div class="header-content">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="header-content-left d-flex align-items-center border-0">
                    <div class="menu-icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <!-- menu icon -->
                    <div class="logo position-relative border-0">
                        <a href="<?= APP_URL . '/account/onAuthenticate/' ?>">
                            <img
                                    src="<?= APP_URL ?>/public/images/logo.png"
                                    class="img-fluid"
                                    alt="logo"
                                    width="40"
                                    height="40"
                            />

                            <span class="ms-2"><?= SITE_NAME ?></span>
                        </a>
                    </div>

                </div>
                <div class="header-content-right d-flex align-items-center">
                    <!-- search bar -->
                    <form class="searchbar me-3 my-0">
                        <input
                                class="form-control form-control-sm rounded-0"
                                type="search"
                                placeholder="Search"
                                aria-label="Search"
                        />
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    <ul class="nav header-nav justify-content-end">
                        <li class="nav-item">
                            <a
                                    href="#"
                                    class="d-flex align-items-center p-4 h-100 position-relative"
                                    data-bs-toggle="dropdown"
                            >
                                <i class="fa-regular fa-bell header-icon"></i>
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <div class="dropdown-header d-flex align-items-center">
                                    <h6 class="m-0">Notifications</h6>
                                    <span class="badge bg_secondary br-7 ms-auto" style="font-size: 10.5px;">New</span>
                                </div>
                                <div class="notify-menu ps">
                                    <a href="#" class="dropdown-item border-bottom d-flex align-items-center ps-4">
                                        <div class="notifyimg  text_primary bg-primary-transparent border border_primary"><i class="fs-18 fa fa-envelope"></i></div>
                                        <div>
                                            <span class="fs-13">Message Sent.</span>
                                            <div class="small text-muted">3 hours ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item border-bottom d-flex ps-4">
                                        <div class="notifyimg  text-secondary bg-secondary-transparent border border_secondary"><i class="fs-18 fa fa-shopping-cart"></i></div>
                                        <div>
                                            <span class="fs-13">Order Placed</span>
                                            <div class="small text-muted">5 hour ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item border-bottom d-flex ps-4">
                                        <div class="notifyimg  text-danger bg-danger-transparent border border_danger"><i class="fs-18 fa fa-gift"></i></div>
                                        <div>
                                            <span class="fs-13">Event Started</span>
                                            <div class="small text-muted">45 mintues ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item border-bottom d-flex ps-4 mb-2">
                                        <div class="notifyimg  text-success  bg-success-transparent border border_success"><i class="fs-18 fa-brands fa-windows"></i></div>
                                        <div>
                                            <span class="fs-13">Your Admin lanuched</span>
                                            <div class="small text-muted">1 daya ago</div>
                                        </div>
                                    </a>

                                    <div class=" text-center p-2">
                                        <a href="#" class="btn _btn btn_primary btn-md fs-13 w-100">View All</a>
                                    </div>
                                </div>
                        </li>

                        <li class="nav-item">
                            <!-- user panel -->
                            <div class="user-meta">
                                <a
                                        href="#"
                                        class="d-flex align-items-center px-3"
                                        data-bs-toggle="dropdown"
                                >
                                    <div class="user-sm-img">
                                        <img
                                                src="<?= $this->auth->userinfo['photo'] ?>"
                                                alt="user image"
                                                class="img-fluid rounded-circle"
                                        />
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end">
                                    <div class="text-center">
                                        <div class="fw-bold"><?= $this->auth->userinfo['name'] ?></div>
                                        <span class="text-center user-semi-title"><i class="fa fa-circle text-success fa-2xs"></i> Online</span>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <a class="dropdown-item" href="<?= APP_URL . '/Account/' ?>"><i class="fa-regular fa-circle-user header-icon me-2"></i> Profile</a>
                                    <a class="dropdown-item" href="<?= APP_URL . '/Account/Security/' ?>"><i class="fa-solid fa-shield header-icon me-2"></i> Security</a>
                                    <a class="dropdown-item" href="<?= APP_URL . '/Account/Logout/' ?>"><i class="fa-solid fa-arrow-right-from-bracket header-icon me-2"></i> Sign out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
