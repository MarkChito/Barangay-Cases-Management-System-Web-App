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

    <title><?= project_name() ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>dist/img/favicon.ico" type="image/x-icon">
    <!-- Plugins -->
    <link href="<?= base_url() ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="<?= base_url() ?>dist/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Navigation Bar ======= -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="javascript:void(0)">
                <img src="dist/img/logo.png" alt="Logo" style="width: 50px; height: auto;">
                <span class="ms-2 d-lg-block d-none"><?= project_name() ?></span>
                <span class="ms-2 d-lg-none">Barangay CMS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="javascript:void(0)" id="downloadsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-cloud-download"></i> Downloads
                        </a>
                        <div class="dropdown-menu" aria-labelledby="downloadsDropdown">
                            <a class="dropdown-item" href="<?= base_url() ?>server/download_exe_file">
                                <i class="bi bi-window me-1"></i> Windows (exe)
                            </a>
                            <a class="dropdown-item" id="btn_download_apk" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#download_apk_modal" url="<?= base_url() ?>server/download_apk_file">
                                <i class="bi bi-phone me-1"></i> Mobile (apk)
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#about_the_developers_modal">
                            <i class="bi bi-code-slash"></i> Developers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#register_as_citizen_modal">
                            <i class="bi bi-person-plus-fill"></i> Register
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url() . "login" ?>">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ======= Total Cases Chart Analysis ======= -->
    <section class="container my-5">
        <h2>Total Cases Chart Analysis <span class="text-muted"> | As of <?= date("F d, Y") ?></span></h2>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div id="reportsChart" style="height: 350px; position: relative;">
                            <div id="cases_data_loading" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                <h3 class="text-muted">Please Wait...</h3>
                                <div class="loading-spinner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Barangay News and Announcements ======= -->
    <section class="container my-5">
        <div class="row">
            <!-- Barangay News -->
            <div class="col-lg-8">
                <h2>Barangay News</h2>
                <?php $barangay_news = $this->model->MOD_GET_BARANGAY_NEWS(); ?>
                <?php if ($barangay_news) : ?>
                    <?php foreach ($barangay_news as $news) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="dist/img/user_upload/<?= $news->image ?>" alt="News Image" class="me-2 news_img" style="width: 80px; height: 45px;">
                                    <h5 class="card-title mt-2"><?= $news->title ?></h5>
                                </div>
                                <p class="card-text truncate-text">
                                    <?= $news->body ?>
                                </p>
                                <a href="javascript:void(0)" data-bs-toggle="modal" class="view_barangay_news" data-bs-target="#barangay_news_modal" news_title="<?= $news->title ?>" news_body="<?= $news->body ?>" news_image="<?= $news->image ?>">Read more</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <p>No Barangay News Yet</p>
                <?php endif ?>
            </div>
            <!-- Announcements -->
            <div class="col-lg-4">
                <h2>Announcements</h2>
                <?php $announcements_data = $this->model->MOD_GET_ANNOUNCEMENTS(); ?>
                <?php if ($announcements_data) : ?>
                    <ul class="list-group">
                        <?php foreach ($announcements_data as $announcements) : ?>
                            <li class="list-group-item text-truncate">
                                <small class="text-muted d-inline"><?= getTimeLapse($announcements->date_and_time) == "Just now" ? getTimeLapse($announcements->date_and_time) : getTimeLapse($announcements->date_and_time) . " ago" ?></small>
                                -
                                <a href="javascript:void(0)" class="view_announcement d-inline" data-bs-toggle="modal" data-bs-target="#announcement_modal" timelapse="<?= getTimeLapse($announcements->date_and_time) == "Just now" ? getTimeLapse($announcements->date_and_time) : getTimeLapse($announcements->date_and_time) . " ago" ?>" announcement_title="<?= $announcements->title ?>" announcement_body="<?= $announcements->body ?>">
                                    <?= $announcements->title ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                <?php else : ?>
                    <p>No Announcement Available</p>
                <?php endif ?>
            </div>
        </div>
    </section>

    <!-- ======= Footer ======= -->
    <footer class="container text-center">
        <hr class="text-primary">
        <div class="copyright">
            <strong>Copyright &copy; <span class="getFullYear"></span> <a href="<?= base_url() ?>"><?= project_name() ?></a>.</strong> All rights reserved.
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- ======= About the Developers Modal ======= -->
    <div class="modal fade" id="about_the_developers_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= project_name() ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title text-muted text-bold"><i class="bi bi-code-slash"></i>&nbsp; System Developers</span>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-9">
                                    <p class="card-text"><b> <?= utf8_encode("Paña") ?>, Mark Anthony A. </b> - Leader</p>
                                    <p class="card-text"><b> Lagrimas. Joyce P. </b> - Member</p>
                                    <p class="card-text"><b> Bordeos, John Carl P. </b> - Member</p>
                                    <p class="card-text"><b> Dispolon, Ivan Howell </b> - Member</p>
                                    <p class="card-text"><b> Salen, Russel Carl R. </b> - Member</p>
                                </div>
                                <div class="col-3">
                                    <img class="img-fluid" src="<?= base_url() ?>dist/img/logo.png" alt="Logo">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-sm">
                            <strong>Copyright &copy; <span class="getFullYear"></span> <a href="<?= base_url() ?>"><?= project_name() ?></a>.</strong>
                            All rights reserved.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Barangay News Modal ======= -->
    <div class="modal fade" id="barangay_news_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="announcementModalLabel">Barangay News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="news_image" class="border" alt="News Image" style="width: 100%; height: 300px;">
                    </div>
                    <h5 class="font-weight-bold" id="news_title"></h5>
                    <br>
                    <pre style="text-align: justify;" id="news_body"></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Announcement Modal ======= -->
    <div class="modal fade" id="announcement_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="announcementModalLabel">Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body announcement-body">
                    <p class="announcement-timelapse" id="announcement_timelapse"></p>
                    <h5 class="font-weight-bold" id="announcement_title"></h5>
                    <br>
                    <pre style="text-align: justify;" id="announcement_body"></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Download APK Modal ======= -->
    <div class="modal fade" id="download_apk_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="announcementModalLabel">Download APK File</h5>
                    <button type="button" class="btn-close announcement-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-xl-6 text-center">
                            <a href="<?= base_url() ?>dist/installers/mobile/barangay_cases_management_system.apk" download="barangay_cases_management_system.apk">
                                <div style="background-color: #f3f3f3; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="<?= base_url() ?>dist/img/download.png" style="margin-bottom: 10px;">
                                    <b class="mt-0 text-black">Download .apk now</b>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-6 text-center d-xl-inline d-none">
                            <div id="qrcode"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-xl-inline d-none">
                            Click the button to download the app, right-click on it to copy a download link, or scan the code with a barcode scanner to install.
                        </div>
                        <div class="col-12 d-xl-none">
                            Click the button to download the app.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Register as Citizen Modal ======= -->
    <div class="modal fade" id="register_as_citizen_modal" tabindex="-1" aria-labelledby="residentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="residentModalLabel">Citizen Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="javascript:void(0)" id="register_as_citizen_form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="text-center">
                                    <img id="register_as_citizen_display" class="rounded-circle border" style="width: 200px; height: 200px;" src="<?= base_url() ?>dist/img/user_upload/default_user_image.png">
                                    <div class="custom-file mt-2">
                                        <input type="file" class="form-control" id="register_as_citizen_image" name="register_as_citizen_image" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_first_name">First Name</label>
                                    <input type="text" class="form-control" id="register_as_citizen_first_name" name="register_as_citizen_first_name" required>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_middle_name">Middle Name (Optional)</label>
                                    <input type="text" class="form-control" id="register_as_citizen_middle_name" name="register_as_citizen_middle_name">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="register_as_citizen_last_name" name="register_as_citizen_last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_sex">Sex</label>
                                    <select id="register_as_citizen_sex" name="register_as_citizen_sex" class="form-control" required>
                                        <option value="" selected disabled>-- Select Sex --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_birthday">Date of Birth</label>
                                    <input type="date" class="form-control" id="register_as_citizen_birthday" name="register_as_citizen_birthday" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_mobile_number">Mobile Number</label>
                                    <input type="number" class="form-control" id="register_as_citizen_mobile_number" name="register_as_citizen_mobile_number" required>
                                    <small id="error_register_as_citizen_mobile_number"></small>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_email">Email Address</label>
                                    <input type="email" class="form-control" id="register_as_citizen_email" name="register_as_citizen_email" required>
                                    <small class="d-none" id="error_register_as_citizen_email">Email is already in use</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_barangay">Barangay</label>
                                    <input type="text" class="form-control" id="register_as_citizen_barangay" name="register_as_citizen_barangay" required>
                                    <small class="d-none" id="error_register_as_citizen_barangay">This website is for Barangay Rosario residents only</small>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_city">City/Municipality</label>
                                    <input type="text" class="form-control" id="register_as_citizen_city" name="register_as_citizen_city" value="Rodriguez" readonly>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_province">Province</label>
                                    <input type="text" class="form-control" id="register_as_citizen_province" name="register_as_citizen_province" value="Rizal" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_username">Username</label>
                                    <input type="text" class="form-control" id="register_as_citizen_username" name="register_as_citizen_username" required>
                                    <small class="d-none" id="error_register_as_citizen_username">Username is already in use</small>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_password">Password</label>
                                    <input type="password" class="form-control" id="register_as_citizen_password" name="register_as_citizen_password" required>
                                    <small class="d-none" id="error_register_as_citizen_password"></small>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group mb-3">
                                    <label for="register_as_citizen_confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="register_as_citizen_confirm_password" name="register_as_citizen_confirm_password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_register_as_citizen">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Plugins -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>plugins/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>plugins/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>plugins/jquery/jquery-3.6.4.js"></script>
    <script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2@11.js"></script>
    <script src="<?= base_url() ?>plugins/qrcode/qrcode.min.js"></script>
    <!-- Main JS -->
    <script src="<?= base_url() ?>dist/js/main.js"></script>

    <!-- Custom JavaScript-->
    <script>
        $(document).ready(function() {
            var alert = <?= $this->session->userdata("alert") ? json_encode($this->session->userdata("alert")) : json_encode(array()) ?>;
            var base_url = "<?= base_url() ?>";
            var current_tab = "<?= $this->session->userdata("current_tab") ?>";

            const currentDate = new Date();
            const current_month = currentDate.getMonth();
            const current_year = currentDate.getFullYear();
            const last_year = currentDate.getFullYear() - 1;
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            cases_chart();

            check_alert_message(alert);

            $(".getFullYear").html(new Date().getFullYear());

            $(".view_announcement").click(function(e) {
                var timelapse = $(this).attr("timelapse");
                var announcement_title = $(this).attr("announcement_title");
                var announcement_body = $(this).attr("announcement_body");

                $("#announcement_timelapse").html(timelapse);
                $("#announcement_title").html(announcement_title);
                $("#announcement_body").html(announcement_body);
            })

            $(".view_barangay_news").click(function(e) {
                var news_title = $(this).attr("news_title");
                var news_body = $(this).attr("news_body");
                var news_image = $(this).attr("news_image");

                $("#news_title").html(news_title);
                $("#news_body").html(news_body);
                $("#news_image").attr("src", "dist/img/user_upload/" + news_image);
            })

            $("#register_as_citizen_image").on("change", function() {
                display_image_info(this);
            })

            $("#register_as_citizen_form").submit(function(e) {
                $("#btn_register_as_citizen").text("Processing Request...");
                $("#btn_register_as_citizen").attr("disabled", true);

                var first_name = $("#register_as_citizen_first_name").val();
                var middle_name = $("#register_as_citizen_middle_name").val();
                var last_name = $("#register_as_citizen_last_name").val();
                var sex = $("#register_as_citizen_sex").val();
                var birthday = $("#register_as_citizen_birthday").val();
                var mobile_number = $("#register_as_citizen_mobile_number").val();
                var email = $("#register_as_citizen_email").val();
                var username = $("#register_as_citizen_username").val();
                var password = $("#register_as_citizen_password").val();
                var confirm_password = $("#register_as_citizen_confirm_password").val();
                var image = $("#register_as_citizen_image")[0].files[0]

                var barangay = $("#register_as_citizen_barangay").val();
                var city = $("#register_as_citizen_city").val();
                var province = $("#register_as_citizen_province").val();

                var address = barangay + ", " + city + ", " + province

                var error = 0;

                if (barangay.toLowerCase() != "rosario") {
                    $("#register_as_citizen_barangay").addClass("is-invalid");
                    $("#error_register_as_citizen_barangay").removeClass("d-none");
                    $("#error_register_as_citizen_barangay").addClass("text-danger");

                    error++;
                }


                if (!verify_mobile_number(mobile_number)) {
                    error++;
                }

                if (!verify_password(password, confirm_password)) {
                    error++;
                }

                if (error == 0) {
                    var formData = new FormData();

                    formData.append("first_name", first_name);
                    formData.append("middle_name", middle_name);
                    formData.append("last_name", last_name);
                    formData.append("sex", sex);
                    formData.append("birthday", birthday);
                    formData.append("mobile_number", mobile_number);
                    formData.append("email", email);
                    formData.append("address", address);
                    formData.append("username", username);
                    formData.append("password", password);
                    formData.append("image", image);

                    $.ajax({
                        url: 'server/register_as_citizen',
                        data: formData,
                        type: 'POST',
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response[0] != "OK") {
                                $("#register_as_citizen_email").addClass("is-invalid");
                                $("#error_register_as_citizen_email").removeClass("d-none");
                                $("#error_register_as_citizen_email").addClass("text-danger");

                                error++;
                            }

                            if (response[1] != "OK") {
                                $("#register_as_citizen_username").addClass("is-invalid");
                                $("#error_register_as_citizen_username").removeClass("d-none");
                                $("#error_register_as_citizen_username").addClass("text-danger");

                                error++;
                            }

                            if (error == 0) {
                                location.href = base_url + current_tab;
                            } else {
                                $("#btn_register_as_citizen").removeAttr("disabled");
                                $("#btn_register_as_citizen").html("Submit");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    $("#btn_register_as_citizen").removeAttr("disabled");
                    $("#btn_register_as_citizen").text("Submit");
                }
            })

            $("#register_as_citizen_barangay").on("keydown", function() {
                $("#register_as_citizen_barangay").removeClass("is-invalid");
                $("#error_register_as_citizen_barangay").addClass("d-none");
            })

            $("#register_as_citizen_mobile_number").on("keydown", function() {
                $("#register_as_citizen_mobile_number").removeClass("is-invalid");
                $("#error_register_as_citizen_mobile_number").addClass("d-none");
            })

            $("#register_as_citizen_email").on("keydown", function() {
                $("#register_as_citizen_email").removeClass("is-invalid");
                $("#error_register_as_citizen_email").addClass("d-none");
            })

            $("#register_as_citizen_username").on("keydown", function() {
                $("#register_as_citizen_username").removeClass("is-invalid");
                $("#error_register_as_citizen_username").addClass("d-none");
            })

            $("#register_as_citizen_password").on("keydown", function() {
                $("#register_as_citizen_password").removeClass("is-invalid");
                $("#register_as_citizen_confirm_password").removeClass("is-invalid");
                $("#error_register_as_citizen_password").addClass("d-none");
            })

            $("#register_as_citizen_confirm_password").on("keydown", function() {
                $("#register_as_citizen_password").removeClass("is-invalid");
                $("#register_as_citizen_confirm_password").removeClass("is-invalid");
                $("#error_register_as_citizen_password").addClass("d-none");
            })

            $("#btn_download_apk").click(function() {
                var url = $(this).attr("url");

                generateQRCode(url);
            })

            function generateQRCode(url) {
                var data = url;
                var qrcodeDiv = document.getElementById("qrcode");

                $("#qrcode").empty();

                var qrcode = new QRCode(qrcodeDiv, {
                    text: data,
                    width: 221,
                    height: 221
                });
            }

            function verify_mobile_number(mobile_number) {
                error = 0;

                if (mobile_number) {
                    mobile_number = mobile_number.replace(/[^\d]/g, '');

                    var validPrefix = ['09'];
                    var prefix = mobile_number.substr(0, 2);

                    if (mobile_number.length !== 11) {
                        $("#register_as_citizen_mobile_number").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_mobile_number").html("Mobile Number must be 11 digits long");
                        $("#error_register_as_citizen_mobile_number").attr("class", "text-danger");

                        error++;
                    }

                    if (!validPrefix.includes(prefix)) {
                        $("#register_as_citizen_mobile_number").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_mobile_number").html("Mobile Number must start with '09'");
                        $("#error_register_as_citizen_mobile_number").attr("class", "text-danger");

                        error++;
                    }
                }

                if (error == 0) {
                    return true;
                } else {
                    return false;
                }
            }

            function verify_password(password, confirm_password) {
                var error = 0;

                if (password || confirm_password) {
                    if (!/[A-Z]/.test(password)) {
                        $("#register_as_citizen_password").attr("class", "form-control is-invalid");
                        $("#register_as_citizen_confirm_password").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_password").html("Password must have at least one uppercase letter (A-Z)");
                        $("#error_register_as_citizen_password").attr("class", "text-danger");

                        error++;
                    }

                    if (!/[a-z]/.test(password)) {
                        $("#register_as_citizen_password").attr("class", "form-control is-invalid");
                        $("#register_as_citizen_confirm_password").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_password").html("Password must have at least one lowercase letter (a-z)");
                        $("#error_register_as_citizen_password").attr("class", "text-danger");

                        error++;
                    }

                    if (!/[0-9]/.test(password)) {
                        $("#register_as_citizen_password").attr("class", "form-control is-invalid");
                        $("#register_as_citizen_confirm_password").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_password").html("Password must have at least one digit (0-9)");
                        $("#error_register_as_citizen_password").attr("class", "text-danger");

                        error++;
                    }

                    if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
                        $("#register_as_citizen_password").attr("class", "form-control is-invalid");
                        $("#register_as_citizen_confirm_password").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_password").html("Password must have at least one special character (e.g., !@#$%^&*()_+-=[]{};':\"\\|,.<>/?)");
                        $("#error_register_as_citizen_password").attr("class", "text-danger");

                        error++;
                    }

                    if (password.length < 8) {
                        $("#register_as_citizen_password").attr("class", "form-control is-invalid");
                        $("#register_as_citizen_confirm_password").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_password").html("Password must be at least 8 characters long");
                        $("#error_register_as_citizen_password").attr("class", "text-danger");

                        error++;
                    }

                    if (password != confirm_password) {
                        $("#register_as_citizen_password").attr("class", "form-control is-invalid");
                        $("#register_as_citizen_confirm_password").attr("class", "form-control is-invalid");

                        $("#error_register_as_citizen_password").html("Passwords do not match");
                        $("#error_register_as_citizen_password").attr("class", "text-danger");

                        error++;
                    }
                }

                if (error > 0) {
                    return false;
                } else {
                    return true;
                }
            }

            function display_image_info(uploader) {
                if (uploader.files && uploader.files[0]) {
                    $('#register_as_citizen_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
                }
            }

            function cases_chart() {
                my_categories = [];
                my_counts = [];

                for (x = 1; x <= 31; x++) {
                    my_categories.push(current_year.toString() + "-" + (current_month + 1).toString().padStart(2, '0') + "-" + x.toString().padStart(2, '0') + "T00:00:00.000Z");
                }

                if (["April", "June", "September", "November"].includes(months[current_month])) {
                    my_categories = my_categories.slice(0, 30);
                }

                if (["February"].includes(months[current_month])) {
                    my_categories = my_categories.slice(0, 28);
                }

                my_counts = Array(my_categories.length).fill(0);

                $.ajax({
                    url: "server/get_barangay_cases_data",
                    data: {},
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        $("#cases_data_loading").addClass("d-none");

                        response.forEach((record) => {
                            const dateValue = record.date;
                            const day = new Date(dateValue).getDate(); // Get the day of the date (1 to 31)
                            my_counts[day - 1]++; // Increment the count for the corresponding day
                        });

                        // Move the chart rendering inside the success callback
                        new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                                name: months[current_month] + ' 2023',
                                data: my_counts,
                            }, ],
                            chart: {
                                height: 350,
                                type: 'area',
                                toolbar: {
                                    show: false,
                                },
                            },
                            markers: {
                                size: 4,
                            },
                            colors: ['#4154f1'],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.4,
                                    stops: [0],
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2,
                            },
                            xaxis: {
                                type: 'datetime',
                                categories: my_categories,
                            },
                            tooltip: {
                                x: {
                                    format: 'yyyy-MM-dd',
                                },
                            },
                        }).render();
                    }
                });
            }

            function check_alert_message(alert) {
                if (alert.length != 0) {
                    Swal.fire(
                        alert["title"],
                        alert["message"],
                        alert["type"]
                    );
                }
            }
        })
    </script>

    <?php $this->session->unset_userdata("alert") ?>
</body>

</html>