<main id="main" class="main">
    <!-- Page Title-->
    <div class="pagetitle">
        <div class="row">
            <h1><?= $this->session->userdata("title") ?></h1>
            <nav>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>barangay_cases">Barangay Cases</a></li>
                    <li class="breadcrumb-item active"><?= $this->session->userdata("title") ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Main Body-->
    <section class="section">
        <form action="server/edit_barangay_case" method="post" id="new_barangay_case_form">
            <div class="steps">
                <div class="card" id="step1">
                    <div class="card-header">
                        <span class="card-title">Basic Information</span>
                    </div>
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-lg-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="new_barangay_case_name" class="form-label mb-0">Full Name</label>
                                    <input type="text" id="new_barangay_case_name" name="new_barangay_case_name" class="form-control" value="<?= $name ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="new_barangay_case_mobile_number" class="form-label mb-0">Mobile Number</label>
                                    <input type="number" id="new_barangay_case_mobile_number" name="new_barangay_case_mobile_number" class="form-control" value="<?= $mobile_number ?>">
                                    <small class="d-none" id="error_new_barangay_case_mobile_number"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <label for="new_barangay_case_address" class="form-label mb-0">Address</label>
                                    <textarea name="new_barangay_case_address" id="new_barangay_case_address" class="form-control"><?= $address ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <label for="new_barangay_case_nature_of_complaint" class="form-label mb-0">Nature of Complaint</label>
                                    <select name="new_barangay_case_nature_of_complaint" id="new_barangay_case_nature_of_complaint" class="form-control">
                                        <option value="Accident" <?= $nature_of_complaint == "Accident" ? "selected" : null ?>>Accident</option>
                                        <option value="Curfew Violation" <?= $nature_of_complaint == "Curfew Violation" ? "selected" : null ?>>Curfew Violation</option>
                                        <option value="Harassment or Threats (Blotter) <?= $nature_of_complaint == "Harassment or Threats (Blotter)" ? "selected" : null ?>">Harassment or Threats (Blotter)</option>
                                        <option value="Noise Disturbance" <?= $nature_of_complaint == "Noise Disturbance" ? "selected" : null ?>>Noise Disturbance</option>
                                        <option value="Illegal Dumping and Garbage" <?= $nature_of_complaint == "Illegal Dumping and Garbage" ? "selected" : null ?>>Illegal Dumping and Garbage</option>
                                        <option value="Public Health and Sanitation" <?= $nature_of_complaint == "Public Health and Sanitation" ? "selected" : null ?>>Public Health and Sanitation</option>
                                        <option value="Vandalism and Graffiti" <?= $nature_of_complaint == "Vandalism and Graffiti" ? "selected" : null ?>>Vandalism and Graffiti</option>
                                        <option value="Public Safety Concerns" <?= $nature_of_complaint == "Public Safety Concerns" ? "selected" : null ?>>Public Safety Concerns</option>
                                        <option value="Traffic Violations" <?= $nature_of_complaint == "Traffic Violations" ? "selected" : null ?>>Traffic Violations</option>
                                        <option value="Property Disputes" <?= $nature_of_complaint == "Property Disputes" ? "selected" : null ?>>Property Disputes</option>
                                        <option value="Public Nuisance" <?= $nature_of_complaint == "Public Nuisance" ? "selected" : null ?>>Public Nuisance</option>
                                        <option value="Business Permits and Licenses" <?= $nature_of_complaint == "Business Permits and Licenses" ? "selected" : null ?>>Business Permits and Licenses</option>
                                        <option value="Environmental Concerns" <?= $nature_of_complaint == "Environmental Concerns" ? "selected" : null ?>>Environmental Concerns</option>
                                        <option value="Animal Control" <?= $nature_of_complaint == "Animal Control" ? "selected" : null ?>>Animal Control</option>
                                        <option value="Disputes and Conflict Resolution" <?= $nature_of_complaint == "Disputes and Conflict Resolution" ? "selected" : null ?>>Disputes and Conflict Resolution</option>
                                        <option value="Social Welfare and Assistance" <?= $nature_of_complaint == "Social Welfare and Assistance" ? "selected" : null ?>>Social Welfare and Assistance</option>
                                        <option value="Other" <?= $nature_of_complaint == "Other" ? "selected" : null ?>>Other (Write the details in the description box)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new_barangay_case_description" class="form-label mb-0">Description</label>
                                    <textarea name="new_barangay_case_description" id="new_barangay_case_description" class="form-control"><?= $description ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="steps d-none">
                <div class="card" id="step2">
                    <div class="card-header">
                        <span class="card-title">Upload Image <small class="text-muted">(Use WebCam)</small></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Webcam Preview</div>
                                <div class="card-body text-center">
                                    <div id="webcam_preview_on" class="d-none">
                                        <video id="video" style="width: 100%; height: 350px;" autoplay></video>
                                    </div>
                                    <div id="webcam_preview_off">
                                        <canvas id="canvas2" style="width: 70%; height: 350px;"></canvas>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" id="startBtn" class="btn btn-primary w-100"><i class="bi bi-camera"></i>&nbsp; Start Webcam</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" id="stopBtn" class="btn btn-danger w-100" disabled><i class="bi bi-stop-circle"></i>&nbsp; Stop Webcam</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Captured Image</div>
                                <div class="card-body text-center">
                                    <canvas id="canvas" style="width: 70%; height: 350px;"></canvas>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="captureBtn" class="btn btn-primary w-100" disabled><i class="bi bi-camera-fill"></i>&nbsp; <span id="capture_btn_label">Capture Image</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: right;">
                <input type="hidden" name="new_barangay_case_image" id="new_barangay_case_image">
                <input type="hidden" name="old_barangay_case_image" id="old_barangay_case_image" value="<?= $image ?>">
                <input type="hidden" name="primary_key" id="primary_key" value="<?= $primary_key ?>">

                <button type="button" class="btn btn-primary d-none px-4" id="prevBtn"><i class="bi bi-arrow-left-circle"></i>&nbsp; Previous</button>
                <button type="button" class="btn btn-primary px-4" id="nextBtn">Next &nbsp;<i class="bi bi-arrow-right-circle"></i></button>
                <?php if ($this->session->userdata("is_barangay_cases")) : ?>
                    <button type="submit" class="btn btn-success d-none px-4" id="submitBtn"><i class="bi bi-check-circle"></i>&nbsp; Submit</button>
                <?php else : ?>
                    <button type="button" class="btn btn-danger d-none px-4" id="rejectBtn" primary_key="<?= $primary_key ?>"><i class="bi bi-x-circle"></i>&nbsp; Reject</button>
                    <button type="submit" class="btn btn-success d-none px-4" id="submitBtn"><i class="bi bi-check-circle"></i>&nbsp; Approve</button>
                <?php endif ?>
            </div>
        </form>
    </section>
</main>