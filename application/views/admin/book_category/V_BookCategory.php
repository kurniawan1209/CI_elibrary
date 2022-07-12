<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Book Category</h2>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4 float-right">
                <a href="<?= base_url() ?>admin/user-role/create" class="btn btn-md btn-primary" data-toggle="modal" data-target=".modal-book-category-add">
                    <i class="fa fa-plus"></i> &nbsp; Create Book Category
                </a>
            </h2>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-stripped table-bordered" id="user_table_all_user" width="100%">
            <thead class="bg-info">
                <tr style="color: white;">
                    <th width="5%" class="text-center">No.</th>
                    <th width="20%" class="text-center">Category</th>
                    <th width="15%" class="text-center">Logo</th>
                    <th width="30%" class="text-center">Description</th>
                    <th width="30%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($book_types as $key => $book_type) {
                    $no++;
                ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td class="text-center"><?= $book_type["book_type_name"] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url() ?>/assets/img/book_type_logo/<?= $book_type["book_type_logo"] ?>">click here</a>
                        </td>
                        <td class="text-center"><?= $book_type['book_type_description'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target=".modal-book-category-edit-<?= $book_type['book_type_id'] ?>">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <a class="btn btn-danger btn-sm" href="<?= base_url() ?>admin/book-category/delete/<?= $book_type["book_type_id"] ?>">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Start Modal Insert -->
<div class="modal fade modal-book-category-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>admin/book-category/create" method="POST" id="form-user-role-insert" enctype="multipart/form-data">
                    <table class="table table-stripped table-bordered" width="100%">
                        <thead class="bg-info">
                            <tr style="color: white;">
                                <th width="5%" class="text-center">No.</th>
                                <th width="20%" class="text-center">Category</th>
                                <th width="15%" class="text-center">Logo</th>
                                <th width="50%" class="text-center">Description</th>
                                <th width="10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><input type="text" name="book_type_name" class="form-control"></td>
                                <!-- <td><input type="text" name="book_type_logo" class="form-control"></td> -->
                                <td>
                                    <input type="file" name="files">
                                </td>
                                <td><input type="text" name="book_type_description" id="" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary float-right" id="btn-book-category-insert">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Insert -->


<?php
foreach ($book_types as $key => $md_book_type) {
?>
    <!-- Start Modal Edit -->
    <div class="modal fade modal-book-category-edit-<?= $md_book_type['book_type_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>admin/book-category/update/<?= $md_book_type['book_type_id'] ?>" method="POST" id="form-user-role-insert" enctype="multipart/form-data">
                        <table class="table table-stripped table-bordered" width="100%">
                            <thead class="bg-info">
                                <tr style="color: white;">
                                    <th width="5%" class="text-center">No.</th>
                                    <th width="20%" class="text-center">Category</th>
                                    <th width="15%" class="text-center">Logo</th>
                                    <th width="50%" class="text-center">Description</th>
                                    <th width="10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input type="text" name="book_type_name" class="form-control" value="<?= $md_book_type['book_type_name']?>"></td>
                                    <td>
                                        <input type="file" name="files">
                                    </td>
                                    <td><input type="text" name="book_type_description" class="form-control" value="<?= $md_book_type['book_type_description'] ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float-right" id="btn-book-category-insert">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal Insert -->