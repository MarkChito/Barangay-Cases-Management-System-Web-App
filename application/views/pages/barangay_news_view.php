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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_barangay_news_modal">
                    <span class="bi bi-plus-square"></span>
                    <span class="p-1 d-lg-inline d-none">Add Barangay News</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Main Body-->
    <section class="section">
        <div class="card pt-5">
            <div class="card-body">
                <?php $barangay_news = $this->model->MOD_GET_BARANGAY_NEWS() ?>
                <?php if ($barangay_news) : ?>
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
                            <?php foreach ($barangay_news as $news) : ?>
                                <?php
                                $date = new DateTime($news->date);
                                $date = $date->format("F j, Y");

                                $time = new DateTime($news->time);
                                $time = $time->format("h:i A");
                                ?>
                                <tr>
                                    <td><?= $date ?></td>
                                    <td><?= $time ?></td>
                                    <td><?= $news->title ?></td>
                                    <td><?= $news->body ?></td>
                                    <td class="text-center">
                                        <span title="Edit" class="bi bi-pencil text-success barangay_news_data more_info" style="cursor: pointer;" primary_key="<?= $news->primary_key ?>" news_title="<?= $news->title ?>" news_body="<?= $news->body ?>" news_image="<?= $news->image ?>" data-bs-toggle="modal" data-bs-target="#update_barangay_news_modal"></span>
                                        <span title="Delete" class="bi bi-trash text-danger delete_barangay_news more_info" style="cursor: pointer;" primary_key="<?= $news->primary_key ?>"></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h1 class="text-muted text-center p-5">No Barangay News Yet</h1>
                <?php endif ?>
            </div>
        </div>
    </section>
</main>