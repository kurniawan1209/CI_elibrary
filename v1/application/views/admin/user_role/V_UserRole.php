<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">User Role</h2>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4 float-right">
                <button class="btn btn-md btn-primary" data-toggle="modal" data-target=".user-role-modal-add">
                    <i class="fa fa-plus"></i> &nbsp; Create Role
                </button>
            </h2>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-stripped table-bordered" id="user_table_all_user" width="100%">
            <thead class="bg-info">
                <tr style="color: white;">
                    <th width="10%" class="text-center">No.</th>
                    <th width="30%" class="text-center">Role Name</th>
                    <th width="30%" class="text-center">Creation Date</th>
                    <th width="30%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($roles as $key => $role) {
                    $no++;
                ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td class="text-center"><?= $role["role_name"] ?></td>
                        <td class="text-center"><?= $role["creation_date"] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".user-role-modal-edit-<?= $role['role_id'] ?>">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('admin/user-role/delete/' . $role['role_id']) ?>">
                                <i class="fa fa-times"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Start Modal Insert -->
<div class="modal fade user-role-modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>admin/user-role/create" method="POST" id="form-user-role-insert">
                    <div class="row col-md-12">
                        <label for="inp_role_name" class="col-md-4">Role Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="role_name" id="inp_role_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary float-right" id="btn-user-role-insert">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Insert -->

<!-- Start Modal Edit -->
<?php
foreach ($roles as $key => $md_role) {
?>
    <div class="modal fade user-role-modal-edit-<?= $md_role['role_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/user-role/update/' . $md_role['role_id']) ?>" method="POST" id="form-user-role-insert">
                        <div class="row col-md-12">
                            <label for="inp_role_name" class="col-md-4">Role Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="role_name" id="inp_role_name" value="<?= $md_role['role_name'] ?>">
                            </div>
                        </div>
                        <div class="row col-md-12 mt-5">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float-right" id="btn-user-role-insert">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

<!-- End Modal Edit-->