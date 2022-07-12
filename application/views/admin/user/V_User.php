<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">User</h2>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4 float-right">
                <a href="<?= base_url() ?>admin/user/create" class="btn btn-md btn-primary">
                    <i class="fa fa-plus"></i> &nbsp; Create User
                </a>
            </h2>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-stripped table-bordered" id="user_table_all_user" width="100%">
            <thead class="bg-info">
                <tr style="color: white;">
                    <th width="5%" class="text-center">No.</th>
                    <th width="10%" class="text-center">Username</th>
                    <th width="20%" class="text-center">Full Name</th>
                    <th width="25%" class="text-center">Address</th>
                    <th width="10%" class="text-center">Phone</th>
                    <th width="15%" class="text-center">Roles</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($users as $key => $user) {
                    $no++;
                ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td class="text-center"><?= $user["username"] ?></td>
                        <td class="text-center"><?= $user["full_name"] ?></td>
                        <td class="text-center"><?= $user["address"] ?></td>
                        <td class="text-center"><?= $user["phone"] ?></td>
                        <td class="text-center"><?= $user["role_name"] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/user/detail/' . $user['user_id'])?>" class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                            <a href="<?= base_url('admin/user/update/' . $user['user_id']) ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('admin/user/delete/' . $user['user_id']) ?>">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>