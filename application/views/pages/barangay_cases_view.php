<main id="main" class="main">
    <!-- Page Title-->
    <div class="pagetitle">
        <div class="row">
            <div class="col-8">
                <h1><?= $this->session->userdata("title") ?></h1>
                <nav>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $this->session->userdata("title") ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-4" style="text-align: right;">
                <a href="new_barangay_case" class="btn btn-primary">
                    <span class="bi bi-plus-square"></span>
                    <span class="p-1 d-lg-inline d-none">New Barangay Case</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Main Body-->
    <section class="section">
        <div class="card pt-5">
            <div class="card-body">
                <?php $barangay_cases_data = $this->model->MOD_GET_ALL_BARANGAY_CASES_DATA(); ?>
                <?php if ($barangay_cases_data) : ?>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Nature of Complaint</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barangay_cases_data as $barangay_cases) : ?>
                                <?php
                                $date = new DateTime($barangay_cases->date);
                                $date = $date->format("F j, Y");
                                $time = new DateTime($barangay_cases->time);
                                $time = $time->format("h:i A");
                                ?>
                                <tr>
                                    <td><?= $date ?></td>
                                    <td><?= $time ?></td>
                                    <td><?= $barangay_cases->name ?></td>
                                    <td><?= $barangay_cases->address ?></td>
                                    <td><?= $barangay_cases->nature_of_complaint ?></td>
                                    <td class="text-center">
                                        <span title="View" class="bi bi-eye text-primary barangay_case_view_data more_info" style="cursor: pointer;" primary_key="<?= $barangay_cases->primary_key ?>" data-bs-toggle="modal" data-bs-target="#barangay_case_modal"></span>
                                        <span title="Edit" class="bi bi-pencil text-success barangay_case_data more_info" style="cursor: pointer;" primary_key="<?= $barangay_cases->primary_key ?>"></span>
                                        <span title="Delete" class="bi bi-trash text-danger delete_barangay_case more_info" style="cursor: pointer;" primary_key="<?= $barangay_cases->primary_key ?>"></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h1 class="text-muted text-center p-5">No Barangay Cases Yet</h1>
                <?php endif ?>
            </div>
        </div>
    </section>
</main>