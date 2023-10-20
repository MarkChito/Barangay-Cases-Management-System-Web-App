<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
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
                                <p class="card-text"><b> Pa&ntilde;a, Mark Anthony A. </b> - Leader</p>
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

<!-- ======= View Profile Picture Modal ======= -->
<div class="modal fade" id="view_profile_picture" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: transparent !important;">
            <img src="" id="proof_img_container" alt="" style="text-align: center; width: 100%">
        </div>
    </div>
</div>

<!-- ======= Update Account Modal ======= -->
<div class="modal fade" id="update_account_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="server/update_account" method="post" id="update_account_form">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="update_account_name" class="form-label mb-0">Full Name</label>
                            <input type="text" class="form-control" id="update_account_name" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="update_account_rfid_number" class="form-label mb-0">RFID Number</label>
                            <input type="text" id="update_account_rfid_number" name="update_account_rfid_number" class="form-control <?= $this->session->userdata("error_update_account_rfid_number_is_invalid") ? $this->session->userdata("error_update_account_rfid_number_is_invalid") : null ?>" required>
                            <?php if ($this->session->userdata("error_update_account_rfid_number")) : ?>
                                <small class="text-danger" id="error_update_account_rfid_number"><?= $this->session->userdata("error_update_account_rfid_number") ?></small>

                                <?php $this->session->unset_userdata("error_update_account_rfid_number") ?>
                                <?php $this->session->unset_userdata("error_update_account_rfid_number_is_invalid") ?>
                            <?php endif ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="update_account_username" class="form-label mb-0">Username</label>
                            <input type="text" id="update_account_username" name="update_account_username" class="form-control <?= $this->session->userdata("error_update_account_username_is_invalid") ? $this->session->userdata("error_update_account_username_is_invalid") : null ?>" required>
                            <?php if ($this->session->userdata("error_update_account_username")) : ?>
                                <small class="text-danger" id="error_update_account_username"><?= $this->session->userdata("error_update_account_username") ?></small>

                                <?php $this->session->unset_userdata("error_update_account_username") ?>
                                <?php $this->session->unset_userdata("error_update_account_username_is_invalid") ?>
                            <?php endif ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="update_account_password" class="form-label mb-0">Password</label>
                            <input type="password" id="update_account_password" name="update_account_password" class="form-control" placeholder="Password hidden for security">
                            <small id="error_update_account_password" class="d-none"></small>
                        </div>
                        <div class="form-group">
                            <label for="update_account_confirm_password" class="form-label mb-0">Confirm Password</label>
                            <input type="password" id="update_account_confirm_password" class="form-control" placeholder="Password hidden for security">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="update_account_primary_key" id="update_account_primary_key" value="primary_key">
                    <input type="hidden" name="update_account_old_rfid_number" id="update_account_old_rfid_number" value="old_rfid_number">
                    <input type="hidden" name="update_account_old_username" id="update_account_old_username" value="old_username">
                    <input type="hidden" name="update_account_old_password" id="update_account_old_password" value="old_password">

                    <button type="submit" class="btn btn-primary" id="btn_update_account">Submit Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ======= Add Employee Modal ======= -->
<div class="modal fade" id="add_employee_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="server/add_employee" method="post" id="add_employee_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="text-center">
                                    <img id="add_employee_image_display" class="rounded-circle border" style="width: 200px; height: 200px;" src="<?= base_url() ?>dist/img/user_upload/default_user_image.png">
                                    <div class="custom-file mt-2">
                                        <input type="file" class="form-control" id="add_employee_image" name="add_employee_image" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_first_name" class="form-label mb-0">First Name</label>
                                    <input type="text" class="form-control" id="add_employee_first_name" name="add_employee_first_name" required>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_middle_name" class="form-label mb-0">Middle Name</label>
                                    <input type="text" class="form-control" id="add_employee_middle_name" name="add_employee_middle_name">
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_last_name" class="form-label mb-0">Last Name</label>
                                    <input type="text" class="form-control" id="add_employee_last_name" name="add_employee_last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_rfid_number" class="form-label mb-0">RFID Number</label>
                                    <input type="number" class="form-control <?= $this->session->userdata("error_add_employee_rfid_number_is_invalid") ? $this->session->userdata("error_add_employee_rfid_number_is_invalid") : null ?>" id="add_employee_rfid_number" name="add_employee_rfid_number" required>
                                    <?php if ($this->session->userdata("error_add_employee_rfid_number")) : ?>
                                        <small class="text-danger" id="error_add_employee_rfid_number"><?= $this->session->userdata("error_add_employee_rfid_number") ?></small>

                                        <?php $this->session->unset_userdata("error_add_employee_rfid_number") ?>
                                        <?php $this->session->unset_userdata("error_add_employee_rfid_number_is_invalid") ?>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_mobile_number" class="form-label mb-0">Mobile Number</label>
                                    <input type="number" class="form-control" id="add_employee_mobile_number" name="add_employee_mobile_number" required>
                                    <small class="d-none" id="error_add_employee_mobile_number"></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_email" class="form-label mb-0">Email</label>
                                    <input type="email" class="form-control <?= $this->session->userdata("error_add_employee_email_is_invalid") ? $this->session->userdata("error_add_employee_email_is_invalid") : null ?>" id="add_employee_email" name="add_employee_email" required>
                                    <?php if ($this->session->userdata("error_add_employee_email")) : ?>
                                        <small class="text-danger" id="error_add_employee_email"><?= $this->session->userdata("error_add_employee_email") ?></small>

                                        <?php $this->session->unset_userdata("error_add_employee_email") ?>
                                        <?php $this->session->unset_userdata("error_add_employee_email_is_invalid") ?>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_position" class="form-label mb-0">Position</label>
                                    <select name="add_employee_position" id="add_employee_position" class="form-control" required>
                                        <option value="" selected disabled></option>
                                        <option value="Employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_address" class="form-label mb-0">Address</label>
                                    <textarea name="add_employee_address" id="add_employee_address" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_username" class="form-label mb-0">Username</label>
                                    <input type="text" class="form-control <?= $this->session->userdata("error_add_employee_username_is_invalid") ? $this->session->userdata("error_add_employee_username_is_invalid") : null ?>" id="add_employee_username" name="add_employee_username" required>
                                    <?php if ($this->session->userdata("error_add_employee_username")) : ?>
                                        <small class="text-danger" id="error_add_employee_username"><?= $this->session->userdata("error_add_employee_username") ?></small>

                                        <?php $this->session->unset_userdata("error_add_employee_username") ?>
                                        <?php $this->session->unset_userdata("error_add_employee_username_is_invalid") ?>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_password" class="form-label mb-0">Password</label>
                                    <input type="password" class="form-control" id="add_employee_password" name="add_employee_password" required>
                                    <small class="d-none" id="error_add_employee_password"></small>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div class="form-group mb-3">
                                    <label for="add_employee_confirm_password" class="form-label mb-0">Confirm Password</label>
                                    <input type="password" class="form-control" id="add_employee_confirm_password" name="add_employee_confirm_password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary px-5" id="btn_add_employee">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ======= Add Announcement Modal ======= -->
<div class="modal fade" id="add_announcement_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="server/add_announcement" method="post" id="add_announcement_form">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="add_announcement_title" class="form-label mb-0">Announcement Title</label>
                            <input type="text" class="form-control" id="add_announcement_title" name="add_announcement_title" required>
                        </div>
                        <div class="form-group">
                            <label for="add_announcement_body" class="form-label mb-0">Announcement Body</label>
                            <textarea rows="10" name="add_announcement_body" id="add_announcement_body" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn_add_announcement">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ======= Update Announcement Modal ======= -->
<div class="modal fade" id="update_announcement_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="server/update_announcement" method="post" id="update_announcement_form">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="update_announcement_title" class="form-label mb-0">Announcement Title</label>
                            <input type="text" class="form-control" id="update_announcement_title" name="update_announcement_title" required>
                        </div>
                        <div class="form-group">
                            <label for="update_announcement_body" class="form-label mb-0">Announcement Body</label>
                            <textarea rows="10" name="update_announcement_body" id="update_announcement_body" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="update_announcement_primary_key" name="update_announcement_primary_key">

                    <button type="submit" class="btn btn-primary" id="btn_update_announcement">Submit Changes</button>
                </div>
            </form>
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

<!-- ======= Add Barangay News Modal ======= -->
<div class="modal fade" id="add_barangay_news_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Barangay News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="server/add_barangay_news" method="post" id="add_barangay_news_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <div class="text-center">
                                <img id="add_barangay_news_image_display" class="border" style="width: 100%; height: 300px;" src="<?= base_url() ?>dist/img/user_upload/default_image.png">
                                <div class="custom-file mt-2">
                                    <input type="file" class="form-control" id="add_barangay_news_image" name="add_barangay_news_image" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="add_barangay_news_title" class="form-label mb-0">Barangay News Title</label>
                            <input type="text" class="form-control" id="add_barangay_news_title" name="add_barangay_news_title" required>
                        </div>
                        <div class="form-group">
                            <label for="add_barangay_news_body" class="form-label mb-0">Barangay News Body</label>
                            <textarea rows="10" name="add_barangay_news_body" id="add_barangay_news_body" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn_add_barangay_news">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ======= Update Barangay News Modal ======= -->
<div class="modal fade" id="update_barangay_news_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Barangay News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="server/update_barangay_news" method="post" id="update_barangay_news_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <div class="text-center">
                                <img id="update_barangay_news_image_display" class="border" style="width: 100%; height: 300px;" src="<?= base_url() ?>dist/img/user_upload/default_image.png">
                                <div class="custom-file mt-2">
                                    <input type="file" class="form-control" id="update_barangay_news_image" name="update_barangay_news_image" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="update_barangay_news_title" class="form-label mb-0">Barangay News Title</label>
                            <input type="text" class="form-control" id="update_barangay_news_title" name="update_barangay_news_title" required>
                        </div>
                        <div class="form-group">
                            <label for="update_barangay_news_body" class="form-label mb-0">Barangay News Body</label>
                            <textarea rows="10" name="update_barangay_news_body" id="update_barangay_news_body" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="update_barangay_news_primary_key" name="update_barangay_news_primary_key">
                    <input type="hidden" id="update_barangay_news_old_news_image" name="update_barangay_news_old_news_image">

                    <button type="submit" class="btn btn-primary" id="btn_update_barangay_news">Submit Changes</button>
                </div>
            </form>
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

<!-- ======= Barangay Cases Modal ======= -->
<div class="modal fade" id="barangay_case_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Barangay Case Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="barangay_case_loading" class="text-center">
                    <img src="<?= base_url() . "dist/img/loading.gif" ?>" alt="">
                    <h5 class="text-muted mt-3">Please Wait...</h5>
                </div>
                <div id="barangay_case_details" class="d-none">
                    <div class="text-center mb-3">
                        <img id="barangay_case_image" class="border" alt="Image" style="width: 100%; height: 350px;">
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <strong>Date and Time:</strong>
                        </div>
                        <div class="col-9">
                            <span id="barangay_case_date"></span> <span id="barangay_case_time"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <strong>Full Name:</strong>
                        </div>
                        <div class="col-9">
                            <span id="barangay_case_name"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <strong>Mobile Number:</strong>
                        </div>
                        <div class="col-9">
                            <span id="barangay_case_mobile_number"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <strong>Address:</strong>
                        </div>
                        <div class="col-9">
                            <span id="barangay_case_address"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <strong>Nature of Complaint:</strong>
                        </div>
                        <div class="col-9">
                            <span id="barangay_case_nature_of_complaint"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <strong>Description:</strong>
                        </div>
                        <div class="col-9">
                            <span id="barangay_case_description"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Plugins -->
<script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>plugins/echarts/echarts.min.js"></script>
<script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2@11.js"></script>
<script src="<?= base_url() ?>plugins/jquery/jquery-3.6.4.js"></script>
<script src="<?= base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- Main JS -->
<script src="<?= base_url() ?>dist/js/main.js"></script>

<!-- Custom JavaScript-->
<script>
    $(document).ready(function() {
        var alert = <?= $this->session->userdata("alert") ? json_encode($this->session->userdata("alert")) : json_encode(array()) ?>;
        var current_tab = "<?= $this->session->userdata("current_tab") ?>";
        var user_type = "<?= $this->session->userdata("user_type") ?>";
        var currentStep = 1;
        var totalSteps = 2;

        const base_url = "<?= base_url() ?>";
        const currentDate = new Date();
        const current_month = currentDate.getMonth();
        const current_year = currentDate.getFullYear();
        const last_year = currentDate.getFullYear() - 1;
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        let video = document.getElementById('video');
        let canvas = document.getElementById('canvas');
        let canvas2 = document.getElementById('canvas2');
        let startBtn = document.getElementById('startBtn');
        let stopBtn = document.getElementById('stopBtn');
        let captureBtn = document.getElementById('captureBtn');
        let stream;
        let imageCaptured = false;

        check_alert_message(alert);

        if (current_tab == "new_barangay_case" || current_tab == "edit_barangay_case") {
            showStep(currentStep);

            webcam();
        }

        if (current_tab == "dashboard") {
            cases_chart();
        }

        $(".datatable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "targets": 'no-sort',
            "bSort": false,
            "order": []
        })

        $(".getFullYear").html(new Date().getFullYear());

        $("#livesearch").addClass("d-none");

        $(".more_info").tooltip();

        $("#prevBtn").click(function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        $("#nextBtn").click(function() {
            var fullname = $("#new_barangay_case_name").val();
            var mobile_number = $("#new_barangay_case_mobile_number").val();
            var address = $("#new_barangay_case_address").val();
            var nature_of_complaint = $("#new_barangay_case_nature_of_complaint").val();
            var description = $("#new_barangay_case_description").val();

            var errors = 0;

            if (!fullname || !mobile_number || !address || !nature_of_complaint || !description) {
                Swal.fire(
                    "Oops!",
                    "One or more fields are empty. Please fill in all the required fields.",
                    "error"
                );

                errors++;
            }

            if (errors == 0) {
                if (new_barangay_case_verify_mobile_number(mobile_number)) {
                    if (currentStep < totalSteps) {
                        currentStep++;
                        showStep(currentStep);
                    }
                }
            }
        });

        $(".nav-link").click(function() {
            $(this).children(".tab_spinner").attr("class", "spinner-border spinner-border-sm float-right tab_spinner");
        })

        $(".employee_data").click(function(e) {
            var primary_key = $(this).attr("primary_key");
            var first_name = $(this).attr("first_name");
            var middle_name = $(this).attr("middle_name");
            var last_name = $(this).attr("last_name");
            var rfid_number = $(this).attr("rfid_number");
            var username = $(this).attr("username");
            var password = $(this).attr("password");

            var fullname = first_name + " " + middle_name[0] + ". " + last_name;

            if (!middle_name) {
                fullname = first_name + " " + last_name;
            }

            $("#update_account_name").val(fullname);
            $("#update_account_rfid_number").val(rfid_number);
            $("#update_account_username").val(username);
            $("#update_account_primary_key").val(primary_key);
            $("#update_account_old_rfid_number").val(rfid_number);
            $("#update_account_old_username").val(username);
            $("#update_account_old_password").val(password);
        })

        $(".announcement_data").click(function(e) {
            var primary_key = $(this).attr("primary_key");
            var announcement_title = $(this).attr("announcement_title");
            var announcement_body = $(this).attr("announcement_body");

            $("#update_announcement_title").val(announcement_title);
            $("#update_announcement_body").val(announcement_body);
            $("#update_announcement_primary_key").val(primary_key);
        })

        $(".barangay_news_data").click(function(e) {
            var primary_key = $(this).attr("primary_key");
            var news_title = $(this).attr("news_title");
            var news_body = $(this).attr("news_body");
            var news_image = $(this).attr("news_image");

            $("#update_barangay_news_title").val(news_title);
            $("#update_barangay_news_body").val(news_body);
            $("#update_barangay_news_old_news_image").val(news_image);
            $("#update_barangay_news_image_display").attr("src", "dist/img/user_upload/" + news_image);
            $("#update_barangay_news_primary_key").val(primary_key);
        })

        $(".barangay_case_data").click(function(e) {
            var primary_key = $(this).attr("primary_key");

            location.href = base_url + "edit_barangay_case?case_id=" + primary_key;
        })

        $(".barangay_case_view_data").click(function(e) {
            var primary_key = $(this).attr("primary_key");

            $("#barangay_case_details").addClass("d-none");
            $("#barangay_case_loading").removeClass("d-none");

            $.ajax({
                url: "server/get_barangay_case_data",
                data: {
                    primary_key: primary_key
                },
                type: "POST",
                dataType: "json",
                success: function(response) {
                    $("#barangay_case_loading").addClass("d-none");
                    $("#barangay_case_details").removeClass("d-none");

                    response.forEach((record) => {
                        if (record.image) {
                            $("#barangay_case_image").attr("src", "dist/img/user_upload/" + record.image);
                        } else {
                            $("#barangay_case_image").attr("src", "dist/img/user_upload/default_image.png");
                        }

                        var dateString = record.date;
                        var dateObj = new Date(dateString);

                        var month = months[dateObj.getMonth()];
                        var day = dateObj.getDate();
                        var year = dateObj.getFullYear();

                        var formattedDate = month + " " + day + ", " + year;

                        $("#barangay_case_date").html(formattedDate);
                        $("#barangay_case_time").html(record.time);
                        $("#barangay_case_name").html(record.name);
                        $("#barangay_case_mobile_number").html(record.mobile_number);
                        $("#barangay_case_address").html(record.address);
                        $("#barangay_case_nature_of_complaint").html(record.nature_of_complaint);
                        $("#barangay_case_description").html(record.description);
                    });
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + error);
                }
            });
        })

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

        $(".delete_employee").click(function(e) {
            var primary_key = $(this).attr("primary_key");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_employee?primary_key=" + primary_key;
                }
            })
        })

        $(".delete_announcement").click(function(e) {
            var primary_key = $(this).attr("primary_key");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_announcement?primary_key=" + primary_key;
                }
            })
        })

        $(".delete_barangay_news").click(function(e) {
            var primary_key = $(this).attr("primary_key");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_barangay_news?primary_key=" + primary_key;
                }
            })
        })

        $(".delete_barangay_case").click(function(e) {
            var primary_key = $(this).attr("primary_key");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "server/delete_barangay_case?primary_key=" + primary_key;
                }
            })
        })

        $(".btn_logout").click(function() {
            location.href = "server/logout";
        })

        $("#btn_update_profile_image").on("click", function(e) {
            e.preventDefault();

            $("#update_profile_image").click();
        })

        $("#add_employee_image").on("change", function() {
            display_image_info_2(this);
        })

        $("#update_profile_image").on("change", function() {
            display_image_info(this);
        })

        $("#add_barangay_news_image").on("change", function() {
            display_image_info_3(this);
        })

        $("#update_barangay_news_image").on("change", function() {
            display_image_info_4(this);
        })

        $(".view_image").click(function() {
            img_src = $(this).attr("src");

            $("#proof_img_container").attr("src", img_src);
        })

        $("#update_profile_form").submit(function(e) {
            var mobile_number = $("#update_profile_mobile_number").val();

            if (update_profile_verify_mobile_number(mobile_number)) {
                $("#btn_update_profile").text("Processing Request...");
                $("#btn_update_profile").attr("disabled", true);

                return true;
            }

            e.preventDefault();
        })

        $("#update_account_form").submit(function(e) {
            var password = $("#update_account_password").val();
            var confirm_password = $("#update_account_confirm_password").val();

            if (update_account_verify_password(password, confirm_password)) {
                $("#btn_update_account").text("Processing Request...");
                $("#btn_update_account").attr("disabled", true);

                return true;
            }

            e.preventDefault();
        })

        $("#add_employee_form").submit(function(e) {
            var mobile_number = $("#add_employee_mobile_number").val();
            var password = $("#add_employee_password").val();
            var confirm_password = $("#add_employee_confirm_password").val();

            var errors = 0;

            if (!add_employee_verify_mobile_number(mobile_number)) {
                errors++;
            }

            if (!add_employee_verify_password(password, confirm_password)) {
                errors++;
            }

            if (errors == 0) {
                $("#btn_add_employee").text("Processing Request...");
                $("#btn_add_employee").attr("disabled", true);

                return true;
            }

            e.preventDefault();
        })

        $("#add_announcement_form").submit(function(e) {
            $("#btn_add_announcement").text("Processing Request...");
            $("#btn_add_announcement").attr("disabled", true);
        })

        $("#add_barangay_news_form").submit(function(e) {
            $("#btn_add_barangay_news").text("Processing Request...");
            $("#btn_add_barangay_news").attr("disabled", true);
        })

        $("#update_barangay_news_form").submit(function(e) {
            $("#btn_update_barangay_news").text("Processing Request...");
            $("#btn_update_barangay_news").attr("disabled", true);
        })

        $("#new_barangay_case_form").submit(function(e) {
            var mobile_number = $("#new_barangay_case_mobile_number").val();

            if (new_barangay_case_verify_mobile_number(mobile_number)) {
                $("#submitBtn").text("Processing Request...");
                $("#submitBtn").attr("disabled", true);
                $("#rejectBtn").attr("class", "d-none");
                $("#prevBtn").attr("class", "d-none");

                return true;
            } else {
                Swal.fire(
                    "Oops...",
                    "Please review your inputs.",
                    "error"
                );
            }

            e.preventDefault();
        })

        $("#rejectBtn").click(function() {
            var primary_key = $(this).attr("primary_key");

            $("#rejectBtn").text("Processing Request...");
            $("#rejectBtn").attr("disabled", true);
            $("#submitBtn").attr("class", "d-none");
            $("#prevBtn").attr("class", "d-none");

            location.href = base_url + "server/reject_barangay_case?primary_key=" + primary_key;
        })

        $("#update_announcement_form").submit(function(e) {
            $("#btn_update_announcement").text("Processing Request...");
            $("#btn_update_announcement").attr("disabled", true);
        })

        $("#update_profile_mobile_number").on("keydown", function(e) {
            $("#update_profile_mobile_number").attr("class", "form-control");
            $("#error_update_profile_mobile_number").attr("class", "d-none");
        })

        $("#add_employee_mobile_number").on("keydown", function(e) {
            $("#add_employee_mobile_number").attr("class", "form-control");
            $("#error_add_employee_mobile_number").attr("class", "d-none");
        })

        $("#new_barangay_case_mobile_number").on("keydown", function(e) {
            $("#new_barangay_case_mobile_number").attr("class", "form-control");
            $("#error_new_barangay_case_mobile_number").attr("class", "d-none");

            if (e.which === 13) {
                e.preventDefault();
            }
        })

        $("#new_barangay_case_name").on("keydown", function(e) {
            if (e.which === 13) {
                e.preventDefault();
            }
        })

        $("#update_account_rfid_number").on("keydown", function(e) {
            $("#update_account_rfid_number").attr("class", "form-control");
            $("#error_update_account_rfid_number").attr("class", "d-none");

            if (e.which === 13) {
                e.preventDefault();
            }
        })

        $("#add_employee_rfid_number").on("keydown", function(e) {
            $("#add_employee_rfid_number").attr("class", "form-control");
            $("#error_add_employee_rfid_number").attr("class", "d-none");

            if (e.which === 13) {
                e.preventDefault();
            }
        })

        $("#update_account_username").on("keydown", function(e) {
            $("#update_account_username").attr("class", "form-control");
            $("#error_update_account_username").attr("class", "d-none");
        })

        $("#add_employee_username").on("keydown", function(e) {
            $("#add_employee_username").attr("class", "form-control");
            $("#error_add_employee_username").attr("class", "d-none");
        })

        $("#update_account_password").on("keydown", function() {
            $("#update_account_password").attr("class", "form-control");
            $("#update_account_confirm_password").attr("class", "form-control");
            $("#error_update_account_password").attr("class", "d-none");
        })

        $("#update_account_confirm_password").on("keydown", function() {
            $("#update_account_password").attr("class", "form-control");
            $("#update_account_confirm_password").attr("class", "form-control");
            $("#error_update_account_password").attr("class", "d-none");
        })

        $("#add_employee_password").on("keydown", function() {
            $("#add_employee_password").attr("class", "form-control");
            $("#add_employee_confirm_password").attr("class", "form-control");
            $("#error_add_employee_password").attr("class", "d-none");
        })

        $("#add_employee_confirm_password").on("keydown", function() {
            $("#add_employee_password").attr("class", "form-control");
            $("#add_employee_confirm_password").attr("class", "form-control");
            $("#error_add_employee_password").attr("class", "d-none");
        })

        $("#update_profile_email").on("keydown", function(e) {
            $("#update_profile_email").attr("class", "form-control");
            $("#error_update_profile_email").attr("class", "d-none");
        })

        $("#add_employee_email").on("keydown", function(e) {
            $("#add_employee_email").attr("class", "form-control");
            $("#error_add_employee_email").attr("class", "d-none");
        })

        $("#search_input").on("input", function() {
            var str = $(this).val();

            if (str.length == 0) {
                $("#livesearch").addClass("d-none");
                return;
            }
            $.ajax({
                url: "server/livesearch",
                data: {
                    input_str: str,
                    user_type: user_type
                },
                type: "GET",
                success: function(response) {
                    $("#livesearch").removeClass("d-none");
                    $("#livesearch").html(response);
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + error);
                }
            });
        });

        function webcam() {
            // Event listeners for buttons
            startBtn.addEventListener('click', startWebcam);
            stopBtn.addEventListener('click', stopWebcam);

            // Capture Image from Webcam
            captureBtn.addEventListener('click', function() {
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

                let dataURL = canvas.toDataURL('image/png');

                $("#new_barangay_case_image").val(dataURL);
                $("#capture_btn_label").html("Re-Capture Image");
            });

            camera_off();
            no_image();
        }

        function startWebcam() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(function(mediaStream) {
                        camera_on();
                        stream = mediaStream;
                        video.srcObject = stream;
                        startBtn.disabled = true;
                        stopBtn.disabled = false;
                        captureBtn.disabled = false;
                    })
                    .catch(function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Camera Access Denied',
                            text: 'Please allow camera access in your browser settings.',
                        });
                    });
            }
        }

        function stopWebcam() {
            camera_off();

            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(function(track) {
                    track.stop();
                });
                video.srcObject = null;
                startBtn.disabled = false;
                stopBtn.disabled = true;
                captureBtn.disabled = true;
            }
        }

        function camera_on() {
            $("#webcam_preview_on").removeClass("d-none");
            $("#webcam_preview_off").addClass("d-none");
        }

        function camera_off() {
            $("#webcam_preview_off").removeClass("d-none");
            $("#webcam_preview_on").addClass("d-none");

            canvas2.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
            canvas2.getContext('2d').fillStyle = '#ccc';
            canvas2.getContext('2d').fillRect(0, 0, canvas.width, canvas.height);
            canvas2.getContext('2d').font = '24px Arial';
            canvas2.getContext('2d').fillStyle = '#000';
            canvas2.getContext('2d').textAlign = 'center';
            canvas2.getContext('2d').textBaseline = 'middle';
            canvas2.getContext('2d').fillText('Camera is Off', canvas.width / 2, canvas.height / 2);
        }

        function no_image() {
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
            canvas.getContext('2d').fillStyle = '#ccc';
            canvas.getContext('2d').fillRect(0, 0, canvas.width, canvas.height);
            canvas.getContext('2d').font = '24px Arial';
            canvas.getContext('2d').fillStyle = '#000';
            canvas.getContext('2d').textAlign = 'center';
            canvas.getContext('2d').textBaseline = 'middle';
            canvas.getContext('2d').fillText('No Image', canvas.width / 2, canvas.height / 2);
        }

        function showStep(step) {
            $(".steps").hide();

            $("#step" + step).closest(".steps").show();

            if (step === 1) {
                $("#prevBtn").hide();
            } else {
                $("#prevBtn").show();
            }

            if (step === totalSteps) {
                $("#nextBtn").hide();
                $("#submitBtn").show();
                $("#rejectBtn").show();
            } else {
                $("#nextBtn").show();
                $("#submitBtn").hide();
                $("#rejectBtn").hide();
            }

            $(".steps").removeClass("d-none");
            $("#prevBtn").removeClass("d-none");
            $("#submitBtn").removeClass("d-none");
            $("#rejectBtn").removeClass("d-none");
        }

        function update_account_verify_password(password, confirm_password) {
            var error = 0;

            if (password || confirm_password) {
                if (!/[A-Z]/.test(password)) {
                    $("#update_account_password").attr("class", "form-control is-invalid");
                    $("#update_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_update_account_password").html("Password must have at least one uppercase letter (A-Z)");
                    $("#error_update_account_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[a-z]/.test(password)) {
                    $("#update_account_password").attr("class", "form-control is-invalid");
                    $("#update_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_update_account_password").html("Password must have at least one lowercase letter (a-z)");
                    $("#error_update_account_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[0-9]/.test(password)) {
                    $("#update_account_password").attr("class", "form-control is-invalid");
                    $("#update_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_update_account_password").html("Password must have at least one digit (0-9)");
                    $("#error_update_account_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
                    $("#update_account_password").attr("class", "form-control is-invalid");
                    $("#update_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_update_account_password").html("Password must have at least one special character (e.g., !@#$%^&*()_+-=[]{};':\"\\|,.<>/?)");
                    $("#error_update_account_password").attr("class", "text-danger");

                    error++;
                }

                if (password.length < 8) {
                    $("#update_account_password").attr("class", "form-control is-invalid");
                    $("#update_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_update_account_password").html("Password must be at least 8 characters long");
                    $("#error_update_account_password").attr("class", "text-danger");

                    error++;
                }

                if (password != confirm_password) {
                    $("#update_account_password").attr("class", "form-control is-invalid");
                    $("#update_account_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_update_account_password").html("Passwords do not match");
                    $("#error_update_account_password").attr("class", "text-danger");

                    error++;
                }
            }

            if (error > 0) {
                return false;
            } else {
                return true;
            }
        }

        function update_profile_verify_mobile_number(mobile_number) {
            error = 0;

            if (mobile_number) {
                mobile_number = mobile_number.replace(/[^\d]/g, '');

                var validPrefix = ['09'];
                var prefix = mobile_number.substr(0, 2);

                if (mobile_number.length !== 11) {
                    $("#update_profile_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_update_profile_mobile_number").html("Mobile Number must be 11 digits long");
                    $("#error_update_profile_mobile_number").attr("class", "text-danger");

                    error++;
                }

                if (!validPrefix.includes(prefix)) {
                    $("#update_profile_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_update_profile_mobile_number").html("Mobile Number must start with '09'");
                    $("#error_update_profile_mobile_number").attr("class", "text-danger");

                    error++;
                }
            }

            if (error == 0) {
                return true;
            } else {
                return false;
            }
        }

        function add_employee_verify_password(password, confirm_password) {
            var error = 0;

            if (password || confirm_password) {
                if (!/[A-Z]/.test(password)) {
                    $("#add_employee_password").attr("class", "form-control is-invalid");
                    $("#add_employee_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_add_employee_password").html("Password must have at least one uppercase letter (A-Z)");
                    $("#error_add_employee_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[a-z]/.test(password)) {
                    $("#add_employee_password").attr("class", "form-control is-invalid");
                    $("#add_employee_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_add_employee_password").html("Password must have at least one lowercase letter (a-z)");
                    $("#error_add_employee_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[0-9]/.test(password)) {
                    $("#add_employee_password").attr("class", "form-control is-invalid");
                    $("#add_employee_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_add_employee_password").html("Password must have at least one digit (0-9)");
                    $("#error_add_employee_password").attr("class", "text-danger");

                    error++;
                }

                if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) {
                    $("#add_employee_password").attr("class", "form-control is-invalid");
                    $("#add_employee_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_add_employee_password").html("Password must have at least one special character (e.g., !@#$%^&*()_+-=[]{};':\"\\|,.<>/?)");
                    $("#error_add_employee_password").attr("class", "text-danger");

                    error++;
                }

                if (password.length < 8) {
                    $("#add_employee_password").attr("class", "form-control is-invalid");
                    $("#add_employee_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_add_employee_password").html("Password must be at least 8 characters long");
                    $("#error_add_employee_password").attr("class", "text-danger");

                    error++;
                }

                if (password != confirm_password) {
                    $("#add_employee_password").attr("class", "form-control is-invalid");
                    $("#add_employee_confirm_password").attr("class", "form-control is-invalid");

                    $("#error_add_employee_password").html("Passwords do not match");
                    $("#error_add_employee_password").attr("class", "text-danger");

                    error++;
                }
            }

            if (error > 0) {
                return false;
            } else {
                return true;
            }
        }

        function add_employee_verify_mobile_number(mobile_number) {
            error = 0;

            if (mobile_number) {
                mobile_number = mobile_number.replace(/[^\d]/g, '');

                var validPrefix = ['09'];
                var prefix = mobile_number.substr(0, 2);

                if (mobile_number.length !== 11) {
                    $("#add_employee_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_add_employee_mobile_number").html("Mobile Number must be 11 digits long");
                    $("#error_add_employee_mobile_number").attr("class", "text-danger");

                    error++;
                }

                if (!validPrefix.includes(prefix)) {
                    $("#add_employee_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_add_employee_mobile_number").html("Mobile Number must start with '09'");
                    $("#error_add_employee_mobile_number").attr("class", "text-danger");

                    error++;
                }
            }

            if (error == 0) {
                return true;
            } else {
                return false;
            }
        }

        function new_barangay_case_verify_mobile_number(mobile_number) {
            error = 0;

            if (mobile_number) {
                mobile_number = mobile_number.replace(/[^\d]/g, '');

                var validPrefix = ['09'];
                var prefix = mobile_number.substr(0, 2);

                if (mobile_number.length !== 11) {
                    $("#new_barangay_case_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_new_barangay_case_mobile_number").html("Mobile Number must be 11 digits long");
                    $("#error_new_barangay_case_mobile_number").attr("class", "text-danger");

                    error++;
                }

                if (!validPrefix.includes(prefix)) {
                    $("#new_barangay_case_mobile_number").attr("class", "form-control is-invalid");

                    $("#error_new_barangay_case_mobile_number").html("Mobile Number must start with '09'");
                    $("#error_new_barangay_case_mobile_number").attr("class", "text-danger");

                    error++;
                }
            }

            if (error == 0) {
                return true;
            } else {
                return false;
            }
        }

        function display_image_info(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#edit_update_profile_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_2(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#add_employee_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_3(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#add_barangay_news_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function display_image_info_4(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#update_barangay_news_image_display').attr('src', window.URL.createObjectURL(uploader.files[0]));
            }
        }

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
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