<main id="main" class="main">
    <!-- Page Title-->
    <div class="pagetitle">
        <div class="row">
            <h1><?= $this->session->userdata("title") ?></h1>
            <nav>
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>barangay_cases">Barangay Cases</a></li>
                    <li class="breadcrumb-item active d-lg-inline d-none"><?= $this->session->userdata("title") ?></li>
                    <li class="breadcrumb-item active d-lg-none">New</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Main Body-->
    <section class="section">
        <form action="server/new_barangay_case" method="post" id="new_barangay_case_form">
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
                                    <input type="text" id="new_barangay_case_name" name="new_barangay_case_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="new_barangay_case_mobile_number" class="form-label mb-0">Mobile Number</label>
                                    <input type="number" id="new_barangay_case_mobile_number" name="new_barangay_case_mobile_number" class="form-control">
                                    <small class="d-none" id="error_new_barangay_case_mobile_number"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <label for="new_barangay_case_address" class="form-label mb-0">Address</label>
                                    <textarea name="new_barangay_case_address" id="new_barangay_case_address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group">
                                    <label for="new_barangay_case_nature_of_complaint" class="form-label mb-0">Nature of Complaint</label>
                                    <select name="new_barangay_case_nature_of_complaint" id="new_barangay_case_nature_of_complaint" class="form-control">
                                        <option value="" disabled selected></option>
                                        <option value="Accident">Accident</option>
                                        <option value="Curfew Violation">Curfew Violation</option>
                                        <option value="Harassment or Threats (Blotter)">Harassment or Threats (Blotter)</option>
                                        <option value="Noise Disturbance">Noise Disturbance</option>
                                        <option value="Illegal Dumping and Garbage">Illegal Dumping and Garbage</option>
                                        <option value="Public Health and Sanitation">Public Health and Sanitation</option>
                                        <option value="Vandalism and Graffiti">Vandalism and Graffiti</option>
                                        <option value="Public Safety Concerns">Public Safety Concerns</option>
                                        <option value="Traffic Violations">Traffic Violations</option>
                                        <option value="Property Disputes">Property Disputes</option>
                                        <option value="Public Nuisance">Public Nuisance</option>
                                        <option value="Business Permits and Licenses">Business Permits and Licenses</option>
                                        <option value="Environmental Concerns">Environmental Concerns</option>
                                        <option value="Animal Control">Animal Control</option>
                                        <option value="Disputes and Conflict Resolution">Disputes and Conflict Resolution</option>
                                        <option value="Social Welfare and Assistance">Social Welfare and Assistance</option>
                                        <option value="Other">Other (Write the details in the description box)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new_barangay_case_description" class="form-label mb-0">Description</label>
                                    <textarea name="new_barangay_case_description" id="new_barangay_case_description" class="form-control"></textarea>
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
                                            <button type="button" id="startBtn" class="btn btn-primary w-100"><i class="bi bi-camera"></i>&nbsp; <span class="d-lg-inline d-none">Start Webcam</span></button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" id="stopBtn" class="btn btn-danger w-100" disabled><i class="bi bi-stop-circle"></i>&nbsp; <span class="d-lg-inline d-none">Stop Webcam</span></button>
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

                <button type="button" class="btn btn-primary d-none px-4" id="prevBtn"><i class="bi bi-arrow-left-circle"></i>&nbsp; Previous</button>
                <button type="button" class="btn btn-primary px-4" id="nextBtn">Next &nbsp;<i class="bi bi-arrow-right-circle"></i></button>
                <button type="submit" class="btn btn-success d-none px-4" id="submitBtn"><i class="bi bi-check-circle"></i>&nbsp; Submit</button>
            </div>
        </form>
    </section>
</main>