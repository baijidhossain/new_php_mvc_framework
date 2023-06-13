<?php include_once(VIEW_PATH . '_common/header.php'); ?>
<?php $this->addScript("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js", 3) ?>

<!--Main layout start-->
<main>
    <div class="content-wrapper">
        <!-- Content Header (Page Header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row align-items-center my-4">
                    <div class="col-sm-7">
                        <h3 class="m-0"><?= $this->data['page_title'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <?php $this->getMessage(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4 _card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    Manage Users
                                </h5>
                                <div class="card-options">
                                    <a class="btn _btn purple_gradient rounded-pill" href="<?= APP_URL ?>/admin/users/add/" data-bs-toggle="modal" data-bs-target="#ajaxModal">
                                        <i class="fas fa-plus"></i> New User
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="mb-0 table  ">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Role</th>
                                                <th>Created</th>
                                                <th>Manage</th>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            <?php if (empty($this->data['users']['items'])) : ?>

                                                <tr>
                                                    <td colspan="15" class="notdata">No data found.</td>
                                                </tr>

                                            <?php else : ?>

                                                <?php foreach ($this->data['users']['items'] as $user) : ?>
                                                    <tr>
                                                        <td><span title="<?= $user['group_name'] ?>" data-bs-toggle="tooltip"><?= $user['name'] ?></span></td>

                                                        <td><?= $user['email'] ?></td>

                                                        <td><?= $user['phone'] ?></td>
                                                        <td>
                                                            <?= ($user['status'] == 0 ? '<i class="fas fa-times-circle text_danger"></i>' : '<i class="fas fa-check-circle text-success"></i>'); ?>
                                                        </td>
                                                        <td><?= $user['group_name'] ?></td>
                                                        <td><?= date_create($user['created'])->format('d M, Y'); ?></td>
                                                        <td>
                                                            <a data-bs-toggle="modal" data-bs-target="#ajaxModal" href="<?= APP_URL ?>/admin/users/edit/<?= $user['id'] ?>" class="text_skin me-1">
                                                                <i class="fa-regular fa-pen-to-square"></i> Modify
                                                            </a>

                                                            <a href='javascript:ChangeStatus(<?= "{$user['id']},{$user['status']}" ?>)' class="text_danger ms-2">
                                                                <?= ($user['status'] == 1 ? '<span class="text_danger"><i class="fas fa-times-circle"></i> Deactivate</span>'

                                                                    : '<span class="text-success"><i class="fas fa-check-circle"></i> Activate</span>'); ?>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>

                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <?= $this->data['users']['paginateNav'] ?>

                                <?= $this->data['users']['paginateInfo'] ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!--Main layout end-->
<script>
    async function ChangeStatus(id, status) {

        if (status === 1 || status === 0) {
            let method = status === 1 ? 'deactivate' : 'activate';
            conf = await confirmation(`Are you sure want to ${method} this user?`);
            if (conf) {
                location.replace(`<?= APP_URL ?>/admin/users/ChangeStatus/${id}/${status ^ 1}/`) // XOR method to automatically change 0 or 1
            }
        }

    }
</script>

<?php include_once(VIEW_PATH . '_common/footer.php'); ?>