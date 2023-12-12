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
    <!-- Main CSS -->
    <link href="<?= base_url() ?>dist/css/style.css" rel="stylesheet">

    <style>
        body {
            background-image: url("dist/img/bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-12 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="d-flex justify-content-center py-4">
                            <a href="<?= base_url() ?>" class="d-flex flex-column align-items-center">
                                <img src="dist/img/logo.png" alt="" style="width: 100px;">
                                <div class="logo text-center mt-3">
                                    <span class=""><?= project_name() ?></span>
                                </div>
                            </a>
                        </div> -->

                        <!-- Login Form -->
                        <div class="card mb-3" id="login_form">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login To Your Account</h5>
                                    <p class="text-center small">For Administrator and Employees use only</p>
                                </div>
                                <form action="server/login" method="post" class="row g-3">
                                    <div class="form-group">
                                        <label for="login_username" class="form-label mb-0">Username</label>
                                        <input type="text" name="login_username" id="login_username" class="form-control" value="<?= $this->session->userdata("remember_me") ? $this->session->userdata("remember_me_username") : null ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_password" class="form-label mb-0">Password</label>
                                        <input type="password" name="login_password" id="login_password" class="form-control" value="<?= $this->session->userdata("remember_me") ? $this->session->userdata("remember_me_password") : null ?>" required>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="login_remember_me" id="login_remember_me" <?= $this->session->userdata("remember_me") ? $this->session->userdata("remember_me") : null ?>>
                                        <label class="form-check-label" for="login_remember_me">Remember me</label>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit" id="btn_login">Login</button>
                                    <p class="small mb-0">Got you RFID Card? <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#rfid_login_modal">Login using RFID</a></p>
                                </form>
                            </div>
                        </div>

                        <!-- Login Using RFID Form -->
                        <div class="modal fade" id="rfid_login_modal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tap your RFID Card</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="server/rfid_login" method="post">
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="dist/img/scan_rfid_gif.gif" alt="RFID Logo" class="w-100">
                                                </div>
                                                <div class="card-footer">
                                                    <input type="text" class="form-control" name="rfid_login" id="rfid_login" placeholder="RFID Number" required>
                                                    <div class="invalid-feedback">Please TAP your RFID Card</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Plugins -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2@11.js"></script>
    <script src="<?= base_url() ?>plugins/jquery/jquery-3.6.4.js"></script>
    <!-- Custom Script -->
    <script>
        $(document).ready(function() {
            var alert = <?= $this->session->userdata("alert") ? json_encode($this->session->userdata("alert")) : json_encode(array()) ?>;

            disable_developer_functions(false);

            check_alert_message(alert);

            $("#login_form").submit(function(e) {
                $("#btn_login").text("Checking Credentials...");
                $("#btn_login").attr("disabled", true);
            })

            $('#rfid_login_modal').on('shown.bs.modal', function() {
                $('#rfid_login').val(null);
                $('#rfid_login').focus();
            })

            function check_alert_message(alert) {
                if (alert.length != 0) {
                    Swal.fire(
                        alert["title"],
                        alert["message"],
                        alert["type"]
                    );
                }
            }

            function disable_developer_functions(enabled) {
                if (enabled) {
                    $(document).on('contextmenu', function() {
                        return false;
                    });

                    $(document).on('keydown', function(event) {
                        if (event.ctrlKey && event.shiftKey) {
                            if (event.keyCode === 74) {
                                return false;
                            }

                            if (event.keyCode === 67) {
                                return false;
                            }

                            if (event.keyCode === 73) {
                                return false;
                            }
                        }

                        if (event.ctrlKey && event.keyCode === 85) {
                            return false;
                        }
                    });
                }
            }
        });
    </script>

    <?php $this->session->unset_userdata("alert") ?>
</body>

</html>