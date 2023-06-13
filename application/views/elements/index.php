<?php require_once(VIEW_PATH . '_common/header.php') ?>

<!--Main layout start-->
<main>
    <div class="content-wrapper">
        <!-- Content Header (Page Header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row align-items-center my-4">
                    <div class="col-sm-7">
                        <h3 class="m-0"><?= $this->data['page_title'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <?php $this->getMessage(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4 _card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    DEFAULT ALERTS
                                </h5>
                                <div class="card-options">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="alert alert_success alert-dismissible" role="alert">Success alert—At vero
                                    eos et accusamus praesentium!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-hidden="true"></button>
                                </div>
                                <div class="alert alert_info alert-dismissible" role="alert">Info alert—At vero eos et
                                    accusamus praesentium!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-hidden="true"></button>
                                </div>
                                <div class="alert alert_warning alert-dismissible" role="alert">Warning alert—At vero
                                    eos et accusamus praesentium!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-hidden="true"></button>
                                </div>
                                <div class="alert alert_danger alert-dismissible" role="alert">Danger alert—At vero eos
                                    et accusamus praesentium!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-hidden="true"></button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4 _card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    SIMPLE BADGES
                                </h5>
                                <div class="card-options">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h1>Heading 01 <span class="badge bg-secondary">New</span></h1>
                                <h2>Heading 02 <span class="badge bg-secondary">New</span></h2>
                                <h3>Heading 03 <span class="badge bg-secondary">New</span></h3>
                                <h4>Heading 04 <span class="badge bg-secondary">New</span></h4>
                                <h5>Heading 05 <span class="badge bg-secondary">New</span></h5>
                                <h6>Heading 06 <span class="badge bg-secondary">New</span></h6>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 _card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    COLORED BADGES
                                </h5>
                                <div class="card-options">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h1 class="text_info">Heading 01 <span class="badge bg_primary">New</span></h1>
                                <h2 class="text_danger">Heading 02 <span class="badge bg_danger">New</span></h2>
                                <h3 class="text_yellow">Heading 03 <span class="badge bg_warning">New</span></h3>
                                <h4 class="text_success">Heading 04 <span class="badge bg_success">New</span></h4>
                                <h5 class="text_info">Heading 05 <span class="badge bg_info">New</span></h5>
                                <h6 class="text_secondary">Heading 06 <span class="badge bg_secondary">New</span></h6>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4 _card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    BUTTONS WITH SQUARE BADGES
                                </h5>
                                <div class="card-options">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="p-3">
                                    <button type="button" class="btn btn_primary mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark">2</span>
                                    </button>
                                    <button type="button" class="btn btn_secondary text-white mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark">1</span>
                                    </button>
                                    <button type="button" class="btn btn_success  mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark">5</span>
                                    </button>
                                    <button type="button" class="btn btn_info  mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark">3</span>
                                    </button>
                                    <button type="button" class="btn btn-warning mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark">6</span>
                                    </button>
                                    <button type="button" class="btn btn_danger text-white mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark">4</span>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-4 _card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    BUTTONS WITH rounded BADGES
                                </h5>
                                <div class="card-options">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="p-3">
                                    <button type="button" class="btn btn_info  mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark rounded-pill">3</span>
                                    </button>
                                    <button type="button" class="btn btn_primary mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge  bg-white text-dark rounded-pill">22</span>
                                    </button>
                                    <button type="button" class="btn btn_secondary text-white mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark rounded-pill">145</span>
                                    </button>
                                    <button type="button" class="btn btn_success  mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg-white text-dark rounded-pill">3225</span>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-4 _card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    BORDER BUTTONS WITH ROUNDED BADGES
                                </h5>
                                <div class="card-options">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="p-3">
                                    <button type="button" class="btn btn-outline_info  mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg_info text-white rounded-pill">3</span>
                                    </button>
                                    <button type="button" class="btn btn-outline_primary mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge  bg_primary  text-white rounded-pill">22</span>
                                    </button>
                                    <button type="button" class="btn btn-outline_secondary mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg_secondary text-white rounded-pill">145</span>
                                    </button>
                                    <button type="button" class="btn btn-outline_success  mt-1 mb-1 me-3">
                                        <span>Notifications</span>
                                        <span class="badge bg_success text-white rounded-pill">3225</span>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-12  col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Contextual variations</h3>
                            </div>
                            <div class="card-body">
                                <span class="badge bg_secondary mt-2">Default</span>
                                <span class="badge bg_primary mt-2">Primary</span>
                                <span class="badge bg_success mt-2">Success</span>
                                <span class="badge bg_info mt-2">Info</span>
                                <span class="badge bg_warning mt-2">Warning</span>
                                <span class="badge bg_danger mt-2">Danger</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12  col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Pill Badges</h3>
                            </div>
                            <div class="card-body">
                                <span class="badge rounded-pill bg_secondary mt-2">Default</span>
                                <span class="badge rounded-pill bg_primary mt-2">Primary</span>
                                <span class="badge rounded-pill bg_success mt-2">Success</span>
                                <span class="badge rounded-pill bg_info mt-2">Info</span>
                                <span class="badge rounded-pill bg_warning mt-2">Warning</span>
                                <span class="badge rounded-pill bg_danger mt-2">Danger</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Default Button</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <a href="javascript:void(0);" class="btn _btn btn_light">Light</a>
                                    <a href="javascript:void(0);" class="btn _btn btn_primary">Primary</a>
                                    <a href="javascript:void(0);" class="btn _btn btn_secondary">Secondary</a>
                                    <a href="javascript:void(0);" class="btn _btn btn_success">Success</a>
                                    <a href="javascript:void(0);" class="btn _btn btn_info">Info</a>
                                    <a href="javascript:void(0);" class="btn _btn btn_warning">Warning</a>
                                    <a href="javascript:void(0);" class="btn _btn btn_danger">Danger</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Square buttons</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <a href="javascript:void(0);" class="btn _btn rounded-0 btn_light">Light</a>
                                    <a href="javascript:void(0);" class="btn _btn rounded-0 btn_primary">Primary</a>
                                    <a href="javascript:void(0);" class="btn _btn rounded-0 btn_secondary">Secondary</a>
                                    <a href="javascript:void(0);" class="btn _btn rounded-0 btn_success">Success</a>
                                    <a href="javascript:void(0);" class="btn _btn rounded-0 btn_info">Info</a>
                                    <a href="javascript:void(0);" class="btn _btn rounded-0 btn_warning">Warning</a>
                                    <a href="javascript:void(0);" class="btn _btn rounded-0 btn_danger">Danger</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Outline buttons</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <a href="javascript:void(0);"
                                        class="btn _btn border border-dark text-dark">Light</a>
                                    <a href="javascript:void(0);" class="btn _btn btn-outline_primary">Primary</a>
                                    <a href="javascript:void(0);" class="btn _btn btn-outline_secondary">Secondary</a>
                                    <a href="javascript:void(0);" class="btn _btn btn-outline_success">Success</a>
                                    <a href="javascript:void(0);" class="btn _btn btn-outline_info">Info</a>
                                    <a href="javascript:void(0);" class="btn _btn btn-outline_warning">Warning</a>
                                    <a href="javascript:void(0);" class="btn _btn btn-outline_danger">Danger</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Button with icon</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <button type="button" class="btn _btn btn_primary"><i
                                            class="fa-solid fa-plus me-2"></i>More</button>
                                    <button type="button" class="btn _btn btn_teal"><i
                                            class="fa-solid fa-upload me-2"></i>Upload</button>
                                    <button type="button" class="btn _btn btn_warning"><i
                                            class="fa-regular fa-heart me-2"></i>I like</button>
                                    <button type="button" class="btn _btn btn_success"><i
                                            class="fa-solid fa-check me-2"></i>I agree</button>
                                    <button type="button" class="btn _btn btn_danger"><i
                                            class="fa-solid fa-link me-2"></i>Link</button>
                                    <button type="button" class="btn _btn btn_info"><i
                                            class="fa-regular fa-comment me-2"></i>Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Button sizes</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <button type="button" class="btn _btn btn_primary btn-sm mb-1">Small button</button>
                                    <button type="button" class="btn _btn btn_success btn-md mb-1">Medium
                                        button</button>
                                    <button type="button" class="btn _btn btn_danger btn-lg mb-1">Large button</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Icon buttons</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <button type="button" class="btn _btn btn-icon  btn_primary"><i
                                            class="fa-solid fa-chart-line"></i></button>
                                    <button type="button" class="btn _btn btn-icon  btn_github text-white"
                                        style="background-color: #181717;border-color: #181717;"><i
                                            class="fa-brands fa-github"></i></button>
                                    <button type="button" class="btn _btn btn-icon  btn_success"><i
                                            class="fa-regular fa-bell"></i></button>
                                    <button type="button" class="btn _btn btn-icon  btn_warning"><i
                                            class="fa-regular fa-star"></i></button>
                                    <button type="button" class="btn _btn btn-icon  btn_danger"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                    <button type="button" class="btn _btn btn-icon  btn_purple"><i
                                            class="fa-solid fa-signal"></i></button>
                                    <button type="button" class="btn _btn btn-icon  btn_secondary"><i
                                            class="fa-solid fa-code-merge"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">LOADING BUTTON</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-list">
                                    <button class="btn _btn btn_primary" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Loading...</span>
                                    </button>
                                    <button class="btn _btn btn_primary" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Button dropdown</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-wrap">
                                    <p>Wrap the dropdown’s toggle using different colors and icons implemented in
                                        different dropdowns styles (your button or link) and the dropdown menu within
                                        <code>.dropdown</code>, or another element that declares
                                        <code>position: relative;</code>. Dropdowns can be triggered from
                                        <code>&lt;a&gt;</code> or <code>&lt;button&gt;</code> elements to better fit
                                        your
                                        potential needs.
                                    </p>
                                    <div class="p-3">
                                        <div class="d-flex justify-content-around">
                                            <div class="btn-list">
                                                <div class="dropdown">
                                                    <button type="button" class="btn _btn btn_secondary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-regular fa-calendar"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn _btn btn_info dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-regular fa-calendar me-2"></i>Show Calendar
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn _btn btn_danger dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Show Calendar
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-list">
                                                <div class="dropdown">
                                                    <button type="button" class="btn _btn btn_secondary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Dropdown right
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Dropdown
                                                            link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Button Group</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group">
                                    <button type="button" class="btn _btn btn_primary active" aria-current="page">Active
                                        link</button>
                                    <button type="button" class="btn _btn btn_primary">Link</button>
                                    <button type="button" class="btn _btn btn_primary">Link</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card _card overflow-hidden">
                            <div class="card-status bg_info"></div>
                            <div class="card-header">
                                <h3 class="card-title">CARD BLUE</h3>
                            </div>
                            <div class="card-body">
                                Duis aute irure dolor in reprehrighterit in voluptate velit esse cillum dolore eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit anim id est laborum
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Special title treatment</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p><a class="btn _btn btn_primary" href="javascript:void(0);">Go
                                    somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card _card text-end">
                            <div class="card-header">
                                <h3 class="card-title">Special title treatment</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p><a class="btn _btn btn_primary" href="javascript:void(0);">Go
                                    somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card _card text-center">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Featured
                                </h3>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Special title treatment</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p><a class="btn _btn btn_primary" href="javascript:void(0);">Go
                                    somewhere</a>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-body">
                                <ul class="list-group m-2">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                    anything embarrassing hidden in the middle of text.</p>
                                <a class="btn _btn btn_primary" href="javascript:void(0);">Button</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Card with search form</h3>
                                <div class="card-options">
                                    <form>
                                        <div class="input-group mt-2">
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Search something..." name="s">
                                            <span class="input-group-btn">
                                                <button class="btn h-100 btn_primary _btn" type="submit">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because
                                those who do not know how to pursue pleasure rationally encounter consequences that are
                                extremely painful actual teachings of the great explorer
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Split button dropdowns</h3>
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-body p-0">
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn _btn btn_light">Action</button>
                                            <button type="button"
                                                class="btn _btn btn_light dropdown-toggle split-dropdown"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" style="">
                                                <li class="dropdown-item dropdown-plus-title">
                                                    Dropdown
                                                    <i class="fa fa-angle-up"></i>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something else
                                                        here</a></li>
                                                <li class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn _btn btn_primary">Action</button>
                                            <button type="button"
                                                class="btn _btn btn_primary dropdown-toggle split-dropdown"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" style="">
                                                <li class="dropdown-item">
                                                    Dropdown
                                                    <b class="fa fa-angle-up"></b>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something else
                                                        here</a></li>
                                                <li class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn _btn btn_success">Action</button>
                                            <button type="button"
                                                class="btn _btn btn_success dropdown-toggle split-dropdown"
                                                data-bs-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="dropdown-item">
                                                    Dropdown
                                                    <b class=" fa fa-angle-up"></b>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something else
                                                        here</a></li>
                                                <li class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn _btn btn_info">Action</button>
                                            <button type="button"
                                                class="btn _btn btn_info dropdown-toggle split-dropdown"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" style="">
                                                <li class="dropdown-item">
                                                    Dropdown
                                                    <b class="fa fa-angle-up"></b>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something else
                                                        here</a></li>
                                                <li class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn _btn btn_warning">Action</button>
                                            <button type="button"
                                                class="btn _btn btn_warning dropdown-toggle split-dropdown"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" style="">
                                                <li class="dropdown-item">
                                                    Dropdown
                                                    <b class="fa fa-angle-up"></b>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something else
                                                        here</a></li>
                                                <li class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-2 mb-2">
                                            <button type="button" class="btn _btn btn_danger">Action</button>
                                            <button type="button"
                                                class="btn _btn btn_danger dropdown-toggle split-dropdown"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" style="">
                                                <li class="dropdown-item">
                                                    Dropdown
                                                    <b class=" fa fa-angle-up"></b>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Something else
                                                        here</a></li>
                                                <li class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Modal Sizes</h3>
                            </div>
                            <div class="card-body text-center">
                                <p>Add <code>.modal-sm </code> or <code>.modal-lg </code> to modal-dialog to increase
                                    and decrease the modal box sizes.</p>
                                <button type="button" class="btn _btn btn_primary mt-3" data-bs-toggle="modal"
                                    data-bs-target="#smallmodal">Small Modal</button>
                                <button type="button" class="btn _btn btn_secondary mt-3" data-bs-toggle="modal"
                                    data-bs-target="#normalmodal">Default Modal</button>
                                <button type="button" class="btn _btn btn_info mt-3" data-bs-toggle="modal"
                                    data-bs-target="#largemodal">large Modal</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Basic pagination</h3>
                            </div>
                            <div class="card-body">
                                <div class="pagination-wrapper">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination custom-pagination mb-0">
                                            <li class="page-item active">
                                                <a class="page-link" href="javascript:void(0);">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0);">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                        class="fa fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- pagination-wrapper -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Basic pagination</h3>
                            </div>
                            <div class="card-body">
                                <ul class="pagination custom-pagination">
                                    <li class="page-item page-prev disabled">
                                        <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                    <li class="page-item page-next">
                                        <a class="page-link" href="javascript:void(0);">Next</a>
                                    </li>
                                </ul>
                                <!-- pagination-wrapper -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Model Pagination</h3>
                            </div>
                            <div class="card-body ">
                                <ul class="pagination custom-pagination mb-0">
                                    <li class="page-item">
                                        <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                class="fa fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="page-item">
                                        <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                class="fa fa-angle-left"></i></a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0);">2</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="javascript:void(0);">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link hidden-xs-down" href="javascript:void(0);">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                class="fa fa-angle-right"></i></a>
                                    </li>
                                    <li class="page-item">
                                        <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                class="fa fa-angle-double-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- pagination-wrapper -->

                        </div>
                        <!-- section-wrapper -->
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Model Pagination2</h3>
                            </div>
                            <div class="card-body">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination custom-pagination mb-0">
                                        <li class="page-item page-0">
                                            <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                    class="fa fa-angle-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                    class="fa fa-angle-double-left"></i></a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="javascript:void(0);">4</a>
                                        </li>
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">10</a>
                                        </li>
                                        <li class="page-item page-0">
                                            <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                    class="fa fa-angle-right"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                    class="fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- pagination-wrapper -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Model Pagination2</h3>
                            </div>
                            <div class="card-body">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination custom-pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                <i class="fa fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                <i class="fa fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Pagination left alignment</h3>
                            </div>
                            <div class="card-body">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination custom-pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);" tabindex="-1">
                                                <i class="fa fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active"><a class="page-link"
                                                href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">
                                                <i class="fa fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Pagination center alignment</h3>
                            </div>
                            <div class="card-body">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination custom-pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);" tabindex="-1">
                                                <i class="fa fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active"><a class="page-link"
                                                href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">
                                                <i class="fa fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Pagination Right Alignment</h3>
                            </div>
                            <div class="card-body ">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination custom-pagination float-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="javascript:void(0);" tabindex="-1">
                                                <i class="fa fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active"><a class="page-link"
                                                href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">
                                                <i class="fa fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Tabs Style</h3>
                            </div>
                            <div class="card-body p-6">
                                <nav class="bg_light">
                                    <div class="nav nav-tabs _tabs" role="tablist">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1_1"
                                            type="button" role="tab" aria-controls="tab_1_1" aria-selected="true">Tab
                                            1</button>
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_1_2"
                                            type="button" role="tab" aria-controls="tab_1_2" aria-selected="false">Tab
                                            2</button>
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_1_3"
                                            type="button" role="tab" aria-controls="tab_1_3" aria-selected="false">Tab
                                            3</button>
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_1_4"
                                            type="button" role="tab" aria-controls="tab_1_4" aria-selected="false">Tab
                                            4</button>
                                    </div>
                                </nav>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab_1_1" role="tabpanel"
                                        aria-labelledby="tab_1_1-tab">
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout. The point of using
                                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                            opposed to
                                            using 'Content here, content here', making it look like readable English.
                                            Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                            their default model text, and a search for 'lorem ipsum' will uncover many
                                            web
                                            sites still in their infancy.</p>
                                    </div>
                                    <div class="tab-pane fade" id="tab_1_2" role="tabpanel"
                                        aria-labelledby="tab_1_2-tab">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                            roots in a piece of classical Latin literature from 45 BC, making it over
                                            2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                                            College in
                                            Virginia, looked up one of the more obscure Latin words, consectetur, from a
                                            Lorem Ipsum passage, and going through the cites of the word in classical
                                            literature, discovered the undoubtable source. Lorem Ipsum comes from
                                            sections
                                            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" "Lorem ipsum dolor
                                            sit amet..", comes from a line in section 1.10.32.</p>
                                    </div>
                                    <div class="tab-pane fade" id="tab_1_3" role="tabpanel"
                                        aria-labelledby="tab_1_3-tab">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable. If you are going
                                            to use a passage
                                            of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden
                                            in the middle of text. All the Lorem Ipsum generators on the Internet tright
                                            to repeat predefined chunks as necessary, making this the first true
                                            generator
                                            on the Internet. It uses a dictionary of etc.</p>
                                    </div>
                                    <div class="tab-pane fade" id="tab_1_4" role="tabpanel"
                                        aria-labelledby="tab_1_4-tab">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type
                                            specimen book. It has survived not only five centuries, but also the leap
                                            into electronic typesetting, remaining essentially unchanged. It was
                                            popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum
                                            passages, and more recently with desktop Ipsum.
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Toast</h3>
                            </div>
                            <div class="card-body p-6">
                                <p>Click the button below to show a toast (positioned with our utilities in the lower
                                    right corner) that has been hidden by default.</p>
                                <button type="button" class="btn _btn btn_primary" id="liveToastBtn">Show live
                                    toast</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Basic Table</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="card-table table table-vcenter text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Joan Powell</td>
                                            <td>Associate Developer</td>
                                            <td>$450,870</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Gavin Gibson</td>
                                            <td>Account manager</td>
                                            <td>$230,540</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Julian Kerr</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>$55,300</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Cedric Kelly</td>
                                            <td>Accountant</td>
                                            <td>$234,100</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Samantha May</td>
                                            <td>Junior Technical Author</td>
                                            <td>$43,198</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- table-responsive -->
                        </div>
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Striped Rows</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped card-table table-vcenter text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Joan Powell</td>
                                                <td>Associate Developer</td>
                                                <td>$450,870</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Gavin Gibson</td>
                                                <td>Account manager</td>
                                                <td>$230,540</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Julian Kerr</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>$55,300</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Cedric Kelly</td>
                                                <td>Accountant</td>
                                                <td>$234,100</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Samantha May</td>
                                                <td>Junior Technical Author</td>
                                                <td>$43,198</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div><!-- bd -->

                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Bordered Table</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered card-table table-vcenter text-nowrap">
                                        <thead>
                                            <tr class="border-top">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Joan Powell</td>
                                                <td>Associate Developer</td>
                                                <td>$450,870</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Gavin Gibson</td>
                                                <td>Account manager</td>
                                                <td>$230,540</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Julian Kerr</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>$55,300</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Cedric Kelly</td>
                                                <td>Accountant</td>
                                                <td>$234,100</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th scope="row">5</th>
                                                <td>Samantha May</td>
                                                <td>Junior Technical Author</td>
                                                <td>$43,198</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Hoverable Rows Table</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover card-table table-vcenter text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>$162,700</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-body text-center list-icons">
                                <svg class="svg-icon2  fill-white text-primary icon-dropshadow-primary" x="0" y="240"
                                    viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                    focusable="false">
                                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                        stroke="currentColor"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4v0a2 2 0 100-4v0zm-8 2a2 2 0 11-4 0v0a2 2 0 114 0v0z">
                                    </path>
                                </svg>
                                <p class="card-text mt-0-75r mb-0">New Orders</p>
                                <p class="h2 mb-0 text-center fw-bold">262</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-body text-center list-icons">
                                <svg class="svg-icon2 text-success icon-dropshadow-success"
                                    xmlns="http://www.w3.org/2000/svg" height="100%" width="100%" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <p class="card-text mt-0-75r mb-0">Customer Visitis</p>
                                <p class="h2 mb-0 text-center fw-bold">2635</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card _card">
                            <div class="card-body text-center list-icons">
                                <svg class="svg-icon2 fill-secondary icon-dropshadow-secondary" x="0" y="240"
                                    viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                    focusable="false">
                                    <path opacity=".0"
                                        d="M20,8 L12,13 L4,8 L4,18 L20,18 L20,8 Z M20,6 L4,6 L12,10.99 L20,6 Z"></path>
                                    <path
                                        d="M4,20 L20,20 C21.1,20 22,19.1 22,18 L22,6 C22,4.9 21.1,4 20,4 L4,4 C2.9,4 2,4.9 2,6 L2,18 C2,19.1 2.9,20 4,20 Z M20,6 L12,10.99 L4,6 L20,6 Z M4,8 L12,13 L20,8 L20,18 L4,18 L4,8 Z">
                                    </path>
                                </svg>
                                <p class="card-text mt-0-75r mb-0">Mails</p>
                                <p class="h2 mb-0 text-center fw-bold">245</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card _card bg_primary">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">Invoices</h6>
                                        <h2 class="text-white m-0 fw-bold">625</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-white display-6"><i
                                                class="fa-regular fa-file-lines fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card _card bg_secondary">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">Sales</h6>
                                        <h2 class="text-white m-0 fw-bold">25k</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-white display-6"><i class="fa fa-signal fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card _card bg_warning">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">Profit</h6>
                                        <h2 class="text-white m-0 fw-bold">62K</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-white display-6"><i class="fa fa-usd fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card _card bg_info">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="text-white">News</h6>
                                        <h2 class="text-white m-0 fw-bold">542</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="text-white display-6"><i
                                                class="fa-regular fa-newspaper fa-2x"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Inputs & Textareas </h3>
                            </div>
                            <div class="card-body pb-2">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <input class="form-control mb-4" placeholder="Input box" type="text">
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <input class="form-control mb-4" placeholder="Input box (readonly)" readonly=""
                                            type="text">
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <input class="form-control mb-4" disabled="" placeholder="Input box (disabled)"
                                            type="text">
                                    </div>
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <textarea class="form-control mb-4" placeholder="Textarea" rows="3"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-lg mg-t-10">
                                        <textarea class="form-control mb-4" placeholder="Textarea (readonly)"
                                            readonly="" rows="3"></textarea>
                                    </div>
                                    <div class="col-lg mg-t-10">
                                        <textarea class="form-control mb-4" disabled="" placeholder="Texarea (disabled)"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Input Sizes</h3>
                            </div>
                            <div class="card-body">
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <input class="form-control form-control-sm  mb-4" placeholder="Input sm box"
                                            type="text">
                                        <input class="form-control  mb-4" placeholder="Input box" type="text">
                                        <input class="form-control form-control-lg" placeholder="Input lg box"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Valid Inputs</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form class="needs-validation was-validated">
                                    <div class="row row-sm">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control  mb-4 is-valid state-valid"
                                                    placeholder="Input box (success state)" required="" type="text"
                                                    value="This is input">
                                                <textarea class="form-control mb-4 is-valid state-valid"
                                                    placeholder="Textarea (success state)" required=""
                                                    rows="3">This is textarea</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control mb-4 is-invalid state-invalid"
                                                    placeholder="Input box (invalid state)" required="" type="text">
                                                <textarea class="form-control mb-4 is-invalid state-invalid"
                                                    placeholder="Textarea (invalid state)" required=""
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Form elements</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="select-countries" class="form-label">Country</label>
                                    <select name="country" id="select-countries"
                                        class="form-control form-select select2">
                                        <option value="br">Brazil</option>
                                        <option value="cz">Czech Republic</option>
                                        <option value="de">Germany</option>
                                        <option value="pl" selected>Poland</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Input group</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-append">
                                            <button class="btn _btn btn_primary" type="button">Go!</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Input group buttons</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <div class="btn-group input-group-append">
                                            <button type="button" class="btn _btn btn_primary">Action</button>
                                            <button data-bs-toggle="dropdown" type="button"
                                                class="btn _btn btn_primary dropdown-toggle"></button>
                                            <div class="dropdown-menu dropdown-menu-start">
                                                <a class="dropdown-item" href="javascript:void(0)">News</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Messages</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0)">Edit Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Separated inputs</label>
                                    <div class="row g-xs">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search for...">
                                            <span class="input-group-append">
                                                <button class="btn _btn btn_primary" type="button"><i
                                                        class="fa-solid fa-magnifying-glass"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-icon">
                                        <span class="input-icon-addon text_primary">
                                            <i class="fa-regular fa-user fs-14"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">ZIP Code</label>
                                    <div class="row">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search for...">
                                            <span class="input-group-append">
                                                <span class="form-help" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="ZIP Code must be US or CDN format. You can use an extrighted ZIP+4 code to determine address more accurately.
                                                USP ZIP codes lookup tools
                                                ">?
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-0">
                                    <label class="form-label">Date of birth</label>
                                    <div class="row g-xs input-group">
                                        <div class="col-5">
                                            <select name="user[month]" class="form-control form-select select2">
                                                <option value="">Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option selected="selected" value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select name="user[day]" class="form-control form-select select2">
                                                <option value="">Day</option>
                                                <?php foreach (range(1, 31) as $item) : ?>
                                                <option value="<?= $item; ?>" <?= $item === 20 ? 'selected' : '' ?>>
                                                    <?= $item; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select name="user[year]" class="form-control form-select select2">
                                                <option value="">Year</option>
                                                <?php foreach (range(1897, 2014) as $item) : ?>
                                                <option value="<?= $item; ?>" <?= $item === 1989 ? 'selected' : '' ?>>
                                                    <?= $item; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h4 class="card-title">General Elements</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <form class="form-horizontal">
                                            <div class="mb-3 row">
                                                <label class="col-md-3 form-label">Text</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="Typing.....">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-3 form-label" for="example-email">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" id="example-email" name="example-email"
                                                        class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-3 form-label">Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" value="password">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-3 form-label">Placeholder</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="text">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-3 form-label">Readonly</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" readonly=""
                                                        value="Readonly value">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-3 form-label">Disabled</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" disabled=""
                                                        value="Disabled value">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-3 form-label">Number</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="number" name="number">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="formFile" class="col-md-3 form-label">Default file
                                                    Input</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <form class="form-horizontal">
                                            <div class="form-group mb-3 row">
                                                <label class="col-md-3 form-label">Name</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-md-3 form-label">Text area</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" rows="6">Hiiiii.....</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-md-3 form-label">URL</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="url" name="url">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-md-3 form-label">Search</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="search" name="search">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-md-3 form-label">Tel</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="tel" name="tel">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row mb-0">
                                                <label class="col-md-3 form-label">Input Select</label>
                                                <div class="col-md-9">
                                                    <select class="form-control select2 select2-hidden-accessible"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option>Apple</option>
                                                        <option>Orange</option>
                                                        <option>Mango</option>
                                                        <option>Grapes</option>
                                                        <option>Banana</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Option 1
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Option 2
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios3" value="option3" disabled>
                                            <label class="form-check-label" for="exampleRadios3">
                                                Option Disabled
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios4" value="option4" disabled selected>
                                            <label class="form-check-label" for="exampleRadios4">
                                                Option Disabled Checked
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="exampleCheckbox"
                                                id="exampleCheckbox1" value="option1" checked>
                                            <label class="form-check-label" for="exampleCheckbox1">
                                                Option 1
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="exampleCheckbox"
                                                id="exampleCheckbox2" value="option2">
                                            <label class="form-check-label" for="exampleCheckbox2">
                                                Option 2
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="exampleCheckbox"
                                                id="exampleCheckbox3" value="option3" disabled>
                                            <label class="form-check-label" for="exampleCheckbox3">
                                                Option Disabled
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="exampleCheckbox"
                                                id="exampleCheckbox4" value="option4" disabled checked>
                                            <label class="form-check-label" for="exampleCheckbox4">
                                                Option Disabled Checked
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h4 class="card-title">Vertical Form</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="">
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="option2"
                                                id="example-checkbox2">
                                            <label class="form-check-label" for="example-checkbox2">
                                                Check me Out
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn _btn btn_primary mt-4 mb-0">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h4 class="card-title">Horizontal Form</h4>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="form-group mb-3 row">
                                        <label for="inputName" class="col-md-3 form-label">User Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <label for="inputEmail3" class="col-md-3 form-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" id="inputEmail3"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <label for="inputPassword3" class="col-md-3 form-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" id="inputPassword3"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 mb-0 row justify-content-end">
                                        <div class="col-md-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="option2"
                                                    id="example-checkbox3">
                                                <label class="form-check-label" for="example-checkbox2">
                                                    Check me Out
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 mb-0 mt-4 row justify-content-end">
                                        <div class="col-md-9">
                                            <button type="submit" class="btn _btn btn_primary">Sign in</button>
                                            <button type="submit" class="btn _btn btn_secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Billing Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Last Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Company Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Company name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email address <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Country <span class="text-danger">*</span></label>
                                            <select class="form-control form-select select2">
                                                <option value="0">--Select--</option>
                                                <option value="1">Germany</option>
                                                <option value="2">Canada</option>
                                                <option value="3">Usa</option>
                                                <option value="4">Aus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Home Address">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">City <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Postal Code <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="ZIP Code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <div class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Payment Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-pay">
                                    <ul class="nav nav-tabs mb-4 border-bottom-0">
                                        <li class="nav-link"><a href="#tab20" class="active" data-bs-toggle="tab"><i
                                                    class="fa fa-credit-card"></i> Credit Card</a></li>
                                        <li class="nav-link"><a href="#tab21" data-bs-toggle="tab" class=""><i
                                                    class="fa-brands fa-paypal"></i> Paypal</a></li>
                                        <li class="nav-link"><a href="#tab22" data-bs-toggle="tab" class=""><i
                                                    class="fa fa-university"></i> Bank Transfer</a></li>
                                    </ul>
                                    <div class="tab-content p-0 border-0">
                                        <div class="tab-pane active show" id="tab20">
                                            <div class="bg-danger-transparent text-danger px-4 py-2 br-3 mb-4"
                                                role="alert">Please Enter Valid Details</div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">CardHolder Name</label>
                                                <input type="text" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">Card number</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-append">
                                                        <button class="btn _btn btn_secondary box-shadow-0"
                                                            type="button">
                                                            <i class="fa-brands fa-cc-visa"></i> &nbsp;
                                                            <i class="fa-brands fa-cc-amex"></i> &nbsp;
                                                            <i class="fa-brands fa-cc-mastercard"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Expiration</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" placeholder="MM"
                                                                name="Month">
                                                            <input type="number" class="form-control" placeholder="YY"
                                                                name="Year">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">CVV
                                                            <span class="form-help" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Don't Share your CVV with others">?
                                                            </span>
                                                        </label>
                                                        <input type="number" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn _btn btn_primary">Confirm</a>
                                        </div>
                                        <div class="tab-pane" id="tab21">
                                            <p>Paypal is easiest way to pay online</p>
                                            <p><a href="javascript:void(0);" class="btn _btn btn_primary"><i
                                                        class="fa-brands fa-paypal"></i> Log in my Paypal</a></p>
                                            <p class="mb-0"><strong>Note:</strong> Nemo enim ipsam voluptatem quia
                                                voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                                dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                        </div>
                                        <div class="tab-pane" id="tab22">
                                            <p>Bank account details</p>
                                            <dl class="card-text">
                                                <dt>BANK:</dt>
                                                <dd> THE UNION BANK 0456</dd>
                                            </dl>
                                            <dl class="card-text">
                                                <dt>Account number:</dt>
                                                <dd> 67542897653214</dd>
                                            </dl>
                                            <dl class="card-text">
                                                <dt>IBAN:</dt>
                                                <dd>543218769</dd>
                                            </dl>
                                            <p class="mb-0"><strong>Note:</strong> Nemo enim ipsam voluptatem quia
                                                voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                                dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-12">
                        <form method="post" class="card _card bg-light">
                            <div class="card-header">
                                <h3 class="card-title">Timeline</h3>
                            </div>
                            <div class="card-body ">


                                <ul class="timeline">

                                    <li class="time-label">
                                        <span class="bg_light">
                                            22 May. 2022 </span>
                                    </li>

                                    <li>
                                        <i class="icon fa-regular fa-clock"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 01:08 pm</span>
                                            <h3 class="timeline-header"><a href="#">Superuser</a> changed status to
                                                <strong>Processing</strong></h3>

                                        </div>
                                    </li>
                                    <li class="time-label">
                                        <span class="bg_light">
                                            22 May. 2022 </span>
                                    </li>

                                    <li>
                                        <i class="icon fa-regular fa-clock"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 01:08 pm</span>
                                            <h3 class="timeline-header"><a href="#">Superuser</a> changed status to
                                                <strong>Pending</strong></h3>

                                        </div>
                                    </li>
                                    <li class="time-label">
                                        <span class="bg_light">
                                            22 May. 2022 </span>
                                    </li>

                                    <li>
                                        <i class="icon fa-regular fa-clock"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 03:01 pm</span>
                                            <h3 class="timeline-header"><a href="#">Superuser</a> changed status to
                                                <strong>Processing</strong></h3>

                                        </div>
                                    </li>
                                    <li class="time-label">
                                        <span class="bg_light">
                                            13 Nov. 2022 </span>
                                    </li>

                                    <li>
                                        <i class="icon fa-regular fa-clock"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 06:39 pm</span>
                                            <h3 class="timeline-header"><a href="#">Superuser</a> changed status to
                                                <strong>Pending</strong></h3>

                                        </div>
                                    </li>
                                    <li class="time-label">
                                        <span class="bg_light">
                                            13 Nov. 2022 </span>
                                    </li>

                                    <li>
                                        <i class="icon fa-regular fa-clock"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 06:39 pm</span>
                                            <h3 class="timeline-header"><a href="#">Superuser</a> changed status to
                                                <strong>Processing</strong></h3>

                                        </div>
                                    </li>
                                    <li class="time-label">
                                        <span class="bg_light">
                                            22 May. 2022 </span>
                                    </li>

                                    <li>
                                        <i class="icon fa-regular fa-clock"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:00 am</span>
                                            <h3 class="timeline-header"><a href="#">Elon Musk</a> changed status to
                                                <strong>Pending</strong></h3>

                                        </div>
                                    </li>

                                </ul>


                            </div>
                        </form>
                    </div>






                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="post" class="card _card">
                            <div class="card-header">
                                <h3 class="card-title">Select2 elements</h3>
                            </div>
                            <div class="card-body ">
                                <div class="form-group">
                                    <label class="form-label"> Select2 with search box</label>
                                    <select class="form-control select2-show-search"
                                        data-placeholder="Choose one (with searchbox)">
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="smallmodal" tabindex="-1" aria-labelledby="smallmodal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodal1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn _btn btn_secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn _btn btn_primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="normalmodal" tabindex="-1" aria-labelledby="normalmodal" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="normalmodal1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn _btn btn_secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn _btn btn_primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="largemodal" tabindex="-1" aria-labelledby="largemodal" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largemodal1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn _btn btn_secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn _btn btn_primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
        <div class="toast-header">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>


<!--Main layout end-->

<?php require_once(VIEW_PATH . '_common/footer.php') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script>
var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
    toastTrigger.addEventListener('click', function() {
        var toast = new bootstrap.Toast(toastLiveExample)

        toast.show()
    });
}
</script>