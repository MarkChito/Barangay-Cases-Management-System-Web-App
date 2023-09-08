<main id="main" class="main">
    <!-- Page Title-->
    <div class="pagetitle">
        <h1><?= $this->session->userdata("title") ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><?= $this->session->userdata("title") ?></li>
            </ol>
        </nav>
    </div>
    <!-- Main Body-->
    <section class="section dashboard">
        <div class="row">
            <!-- Total Cases Chart Analysis -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Cases Chart Analysis <span class="text-muted"> | As of <?= date("F d, Y") ?></span></h5>
                        <div id="reportsChart" style="height: 350px; position: relative;">
                            <div id="cases_data_loading" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                <h3 class="text-muted d-lg-block d-none">Please Wait...</h3>
                                <h3 class="text-muted d-lg-none">Loading...</h3>
                                <div class="loading-spinner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Barangay News -->
            <div class="col-xxl-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Barangay News</h5>
                        <div class="news">
                            <?php $barangay_news = $this->model->MOD_GET_BARANGAY_NEWS(); ?>
                            <?php if ($barangay_news) : ?>
                                <?php foreach ($barangay_news as $news) : ?>
                                    <div class="post-item clearfix">
                                        <img src="dist/img/user_upload/<?= $news->image ?>" style="width: 80px; height: 45px" alt="">
                                        <h4>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" class="view_barangay_news" data-bs-target="#barangay_news_modal" news_title="<?= $news->title ?>" news_body="<?= $news->body ?>" news_image="<?= $news->image ?>">
                                                <?= $news->title ?>
                                            </a>
                                        </h4>
                                        <p class="text-truncate"><?= $news->body ?></p>
                                    </div>
                                <?php endforeach ?>
                            <?php else : ?>
                                <h2 class="text-muted text-center p-5">No Barangay News Yet</h2>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Announcements -->
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Announcements</h5>
                        <div class="activity">
                            <?php $announcements_data = $this->model->MOD_GET_ANNOUNCEMENTS(); ?>
                            <?php if ($announcements_data) : ?>
                                <?php foreach ($announcements_data as $announcements) : ?>
                                    <div class="activity-item d-flex">
                                        <div class="activite-label"><?= getTimeLapse($announcements->date_and_time) ?></div>
                                        <i class='bi bi-circle-fill activity-badge <?= getTimeLapse($announcements->date_and_time) == "Just now" ? "text-success" : "text-muted" ?> align-self-start'></i>
                                        <div class="activity-content text-truncate">
                                            <strong>
                                                <a href="javascript:void(0)" data-bs-toggle="modal" class="view_announcement" data-bs-target="#announcement_modal" timelapse="<?= getTimeLapse($announcements->date_and_time) == "Just now" ? getTimeLapse($announcements->date_and_time) : getTimeLapse($announcements->date_and_time) . " ago" ?>" announcement_title="<?= $announcements->title ?>" announcement_body="<?= $announcements->body ?>">
                                                    <?= $announcements->title ?>
                                                </a>
                                            </strong>

                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php else : ?>
                                <h2 class="text-muted text-center p-5">No Announcements Yet</h2>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>