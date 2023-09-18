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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_announcement_modal">
                    <span class="bi bi-plus-square"></span>
                    <span class="p-1 d-lg-inline d-none">New Announcement</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Main Body-->
    <section class="section">
        <div class="card pt-5">
            <div class="card-body">
                <?php $announcements_data = $this->model->MOD_GET_ANNOUNCEMENTS(); ?>
                <?php if ($announcements_data) : ?>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($announcements_data as $announcements) : ?>
                                <?php
                                $date_and_time = new DateTime($announcements->date_and_time);

                                $date = $date_and_time->format("F j, Y");
                                $time = $date_and_time->format("h:i A");
                                ?>
                                <tr>
                                    <td><?= $date ?></td>
                                    <td><?= $time ?></td>
                                    <td><?= $announcements->title ?></td>
                                    <td><?= $announcements->body ?></td>
                                    <td class="text-center">
                                        <span title="Edit" class="bi bi-pencil text-success announcement_data more_info" style="cursor: pointer;" primary_key="<?= $announcements->primary_key ?>" announcement_title="<?= $announcements->title ?>" announcement_body="<?= $announcements->body ?>" data-bs-toggle="modal" data-bs-target="#update_announcement_modal"></span>
                                        <span title="Delete" class="bi bi-trash text-danger delete_announcement more_info" style="cursor: pointer;" primary_key="<?= $announcements->primary_key ?>"></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h1 class="text-muted text-center p-5">No Announcements Yet</h1>
                <?php endif ?>
            </div>
        </div>
    </section>
</main>