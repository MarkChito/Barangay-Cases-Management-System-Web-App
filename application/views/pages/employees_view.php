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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_employee_modal">
                    <span class="bi bi-plus-square"></span>
                    <span class="p-1 d-lg-inline d-none">New Employee</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Main Body-->
    <section class="section dashboard">
        <div class="card pt-5">
            <div class="card-body">
                <?php $all_user_data = $this->model->MOD_GET_ALL_USER_DATA($this->session->userdata("primary_key")) ?>
                <?php if ($all_user_data) : ?>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_user_data as $user_data) : ?>
                                <tr>
                                    <td title="Click to view and edit profile" class="more_info"><a href="<?= base_url() ?>profile?employee_id=<?= $user_data->primary_key ?>"><?= $user_data->middle_name != "" ? $user_data->first_name . " " . $user_data->middle_name[0] . ". " . $user_data->last_name : $user_data->first_name . " " . $user_data->last_name ?></a></td>
                                    <td><?= $user_data->position ?></td>
                                    <td><?= $user_data->mobile_number ?></td>
                                    <td><?= $user_data->email ?></td>
                                    <td><?= $user_data->address ?></td>
                                    <td class="text-center">
                                        <span title="Edit" class="bi bi-pencil text-success employee_data more_info" style="cursor: pointer;" primary_key="<?= $user_data->primary_key ?>" rfid_number="<?= $user_data->rfid_number ?>" first_name="<?= $user_data->first_name ?>" middle_name="<?= $user_data->middle_name ?>" last_name="<?= $user_data->last_name ?>" username="<?= $user_data->username ?>" password="<?= $user_data->password ?>" data-bs-toggle="modal" data-bs-target="#update_account_modal"></span>
                                        <span title="Delete" class="bi bi-trash text-danger delete_employee more_info" style="cursor: pointer;" primary_key="<?= $user_data->primary_key ?>"></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <h1 class="text-muted text-center p-5">No Registered Employees</h1>
                <?php endif ?>
            </div>
        </div>
    </section>
</main>