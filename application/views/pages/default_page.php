<main id="main" class="main">
    <!-- Page Title-->
    <div class="pagetitle">
        <h1><?= $this->session->userdata("title") ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $this->session->userdata("title") ?></li>
            </ol>
        </nav>
    </div>
    <!-- Main Body-->
    <section class="section dashboard">
        
    </section>
</main>