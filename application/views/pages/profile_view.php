<main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
        <h1><?= $this->session->userdata("primary_key") == $primary_key ? "My " : null ?><?= $this->session->userdata("title") ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
                <?php if ($this->session->userdata("primary_key") != $primary_key) : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>employees">Employees</a></li>
                <?php endif ?>
                <li class="breadcrumb-item active"><?= $this->session->userdata("primary_key") == $primary_key ? "My " : null ?><?= $this->session->userdata("title") ?></li>
            </ol>
        </nav>
    </div>
    <!-- Main Body -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="<?= $image ? "dist/img/user_upload/" . $image : base_url() . "dist/img/user_upload/default_user_image.png" ?>" alt="Profile" class="rounded-circle border view_image" style="cursor: pointer; height:120px; width:150px;" data-bs-toggle="modal" data-bs-target="#view_profile_picture">
                        <h2><?= $middle_name != "" ? $first_name . " " . $middle_name[0] . ". " . $last_name : $first_name . " " . $last_name ?></h2>
                        <h3><?= ucwords($position != "" ? $position : $user_type) ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $middle_name != "" ? $first_name . " " . $middle_name[0] . ". " . $last_name : $first_name . " " . $last_name ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Position</div>
                                    <div class="col-lg-9 col-md-8"><?= ucwords($position != "" ? $position : $user_type) ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Mobile Number</div>
                                    <div class="col-lg-9 col-md-8"><?= $mobile_number != "" ? $mobile_number : "Not Yet Available" ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $email != "" ? $email : "Not Yet Available" ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $address != "" ? $address : "Not Yet Available" ?></div>
                                </div>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="server/update_profile" method="post" enctype="multipart/form-data" id="update_profile_form">
                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="text-center">
                                                <img class="border rounded-circle" style="width: 100px; height: 100px;" src="<?= $image ? "dist/img/user_upload/" . $image : base_url() . "dist/img/user_upload/default_user_image.png" ?>" id="edit_update_profile_image_display" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="javascript:void(0)" id="btn_update_profile_image" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i> Upload Image</a>
                                                    <input type="file" id="update_profile_image" name="update_profile_image" accept=".jpg, .jpeg, .png" style="display:none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_profile_first_name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="update_profile_first_name" type="text" class="form-control" id="update_profile_first_name" value="<?= $first_name != "" ? $first_name : null ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_profile_middle_name" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="update_profile_middle_name" type="text" class="form-control" id="update_profile_middle_name" value="<?= $middle_name != "" ? $middle_name : null ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_profile_last_name" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="update_profile_last_name" type="text" class="form-control" id="update_profile_last_name" value="<?= $last_name != "" ? $last_name : null ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_profile_position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="update_profile_position" id="update_profile_position" class="form-control" required>
                                                <option value="" selected disabled></option>
                                                <option value="Barangay Captain" <?= $position == "Employee" ? "selected" : null ?>>Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_profile_mobile_number" class="col-md-4 col-lg-3 col-form-label">Mobile Number</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="update_profile_mobile_number" type="number" class="form-control" id="update_profile_mobile_number" value="<?= $mobile_number != "" ? $mobile_number : null ?>">
                                            <small id="error_update_profile_mobile_number" class="d-none"></small>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_profile_email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" id="update_profile_email" name="update_profile_email" class="form-control <?= $this->session->userdata("error_update_profile_email_is_invalid") ? $this->session->userdata("error_update_profile_email_is_invalid") : null ?>" value="<?= $email ? $email : null ?>">
                                            <?php if ($this->session->userdata("error_update_profile_email")) : ?>
                                                <small class="text-danger" id="error_update_profile_email"><?= $this->session->userdata("error_update_profile_email") ?></small>

                                                <?php $this->session->unset_userdata("error_update_profile_email") ?>
                                                <?php $this->session->unset_userdata("error_update_profile_email_is_invalid") ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_profile_address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="update_profile_address" id="update_profile_address" class="form-control"><?= $address != "" ? $address : null ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-3"></div>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="hidden" name="update_profile_primary_key" value="<?= $primary_key ?>">
                                            <input type="hidden" name="update_profile_old_email" value="<?= $email ?>">
                                            <input type="hidden" name="update_profile_old_image" value="<?= $image ? $image : "default_user_image.png" ?>">

                                            <button type="submit" class="btn btn-primary w-100" id="btn_update_profile">Submit Changes</button>
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
</main>