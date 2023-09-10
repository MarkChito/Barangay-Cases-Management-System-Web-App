<?php
$user_data = $this->model->MOD_GET_USER_DATA($this->session->userdata("primary_key"));

if ($user_data) {
    $user = $user_data[0];

    $user_session_data = array(
        "rfid_number" => $user->rfid_number,
        "first_name" => $user->first_name,
        "middle_name" => $user->middle_name,
        "last_name" => $user->last_name,
        "mobile_number" => $user->mobile_number,
        "email" => $user->email,
        "address" => $user->address,
        "position" => $user->position,
        "username" => $user->username,
        "password" => $user->password,
        "image" => $user->image,
        "user_type" => $user->user_type
    );

    $this->session->set_userdata($user_session_data);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Barangay Cases Management System - A platform for managing legal cases and records within the barangay community.">
    <meta name="keywords" content="barangay cases, legal management, records system, community justice">
    <meta name="author" content="Colegio de Montalban">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Protocol Tags -->
    <meta property="og:title" content="<?= project_name() ?>">
    <meta property="og:description" content="A platform for managing legal cases and records within the barangay community.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= base_url() ?>dist/img/favicon.ico">

    <title><?= project_name() ?> | <?= $this->session->userdata("title") ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>dist/img/favicon.ico" type="image/x-icon">
    <!-- Plugins -->
    <link href="<?= base_url() ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="<?= base_url() ?>dist/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                <img class="d-none d-lg-block" src="<?= base_url() ?>dist/img/logo_alt.png" alt="logo">
                <span class="d-none d-lg-block text-truncate more_info" title="<?= project_name() ?>">Barangay CMS</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <div class="search-bar">
            <div class="search-form d-flex align-items-center">
                <input type="text" name="query" id="search_input" placeholder="Search" title="Enter search keyword">
                <button type="button" title="Search"><i class="bi bi-search"></i></button>
            </div>
            <div id="livesearch"></div>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="javascript:void(0)">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="javascript:void(0)" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have no new notifications
                        </li>
                        <!-- <div id="notification-area">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Lorem Ipsum</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>30 min. ago</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer">
                                <a href="javascript:void(0)">Show all notifications</a>
                            </li>
                        </div> -->
                    </ul>
                </li>
                <!-- Profile -->
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="javascript:void(0)" data-bs-toggle="dropdown">
                        <img src="<?= $this->session->userdata("image") ? base_url() . "dist/img/user_upload/" . $this->session->userdata("image") : base_url() . "dist/img/user_upload/default_user_image.png" ?>" alt="Profile" class="rounded-circle" style="width: 35px !important; height: 35px !important">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= formatName($this->session->userdata("first_name")) . $this->session->userdata("last_name") ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $this->session->userdata("middle_name") != "" ? $this->session->userdata("first_name") . " " . $this->session->userdata("middle_name")[0] . ". " . $this->session->userdata("last_name") : $this->session->userdata("first_name") . " " . $this->session->userdata("last_name") ?></h6>
                            <span><?= ucwords($this->session->userdata("position") != "" ? $this->session->userdata("position") : $this->session->userdata("user_type")) ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profile?employee_id=<?= $this->session->userdata("primary_key") ?>">
                                <i class="bi bi-person-circle"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center employee_data" primary_key="<?= $this->session->userdata("primary_key") ?>" rfid_number="<?= $this->session->userdata("rfid_number") ?>" first_name="<?= $this->session->userdata("first_name") ?>" middle_name="<?= $this->session->userdata("middle_name") ?>" last_name="<?= $this->session->userdata("last_name") ?>" username="<?= $this->session->userdata("username") ?>" password="<?= $this->session->userdata("password") ?>" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#update_account_modal">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#about_the_developers_modal">
                                <i class="bi bi-code-slash"></i>
                                <span>Developers</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center btn_logout" href="javascript:void(0)">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">Main</li>
            <li class="nav-item">
                <a href="<?= base_url() ?>dashboard" class="nav-link <?= $this->session->userdata("current_tab") != "dashboard" ? "collapsed" : null ?>">
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                    &nbsp;&nbsp;&nbsp;<span class="spinner-border spinner-border-sm d-none tab_spinner" role="status"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>barangay_cases" class="nav-link <?= $this->session->userdata("current_tab") != "barangay_cases" ? "collapsed" : null ?>">
                    <i class="bi bi-briefcase"></i>
                    <span>Barangay Cases</span>
                    &nbsp;&nbsp;&nbsp;<span class="spinner-border spinner-border-sm d-none tab_spinner" role="status"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>pending_cases" class="nav-link <?= $this->session->userdata("current_tab") != "pending_cases" ? "collapsed" : null ?>">
                    <i class="bi bi-clock"></i>
                    <span>Pending Cases</span>
                    &nbsp;&nbsp;&nbsp;<span class="spinner-border spinner-border-sm d-none tab_spinner" role="status"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>employees" class="nav-link <?= $this->session->userdata("current_tab") != "employees" ? "collapsed" : null ?> <?= $this->session->userdata("user_type") != "admin" ? "d-none" : null ?>">
                    <i class="bi bi-person-plus"></i>
                    <span>Employees</span>
                    &nbsp;&nbsp;&nbsp;<span class="spinner-border spinner-border-sm d-none tab_spinner" role="status"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>announcements" class="nav-link <?= $this->session->userdata("current_tab") != "announcements" ? "collapsed" : null ?> <?= $this->session->userdata("user_type") != "admin" ? "d-none" : null ?>">
                    <i class="bi bi-megaphone"></i>
                    <span>Announcements</span>
                    &nbsp;&nbsp;&nbsp;<span class="spinner-border spinner-border-sm d-none tab_spinner" role="status"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>barangay_news" class="nav-link <?= $this->session->userdata("current_tab") != "barangay_news" ? "collapsed" : null ?>">
                    <i class="bi bi-newspaper"></i>
                    <span>Barangay News</span>
                    &nbsp;&nbsp;&nbsp;<span class="spinner-border spinner-border-sm d-none tab_spinner" role="status"></span>
                </a>
            </li>
            <li class="nav-heading">Account</li>
            <li class="nav-item">
                <a class="nav-link collapsed btn_logout" href="javascript:void(0)">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>