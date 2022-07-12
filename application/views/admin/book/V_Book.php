<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Book</h2>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4 float-right">
                <a href="<?= base_url() ?>admin/book/create" class="btn btn-md btn-primary">
                    <i class="fa fa-plus"></i> &nbsp; Insert Book
                </a>
            </h2>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-stripped table-bordered" id="user_table_all_user" width="100%">
            <thead class="bg-info">
                <tr style="color: white;">
                    <th width="5%" class="text-center">No.</th>
                    <th width="25%" class="text-center">Title</th>
                    <th width="20%" class="text-center">Creation Date</th>
                    <th width="25%" class="text-center">Author Name</th>
                    <th width="10%" class="text-center">Stock</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 0;
                    foreach ($books as $key => $book) {
                        $no++;
                ?>
                <tr>
                    <td class="text-center"><?= $no ?></td>
                    <td class="text-center"><?= $book["book_name"] ?></td>
                    <td class="text-center"><?= $book["book_created_date"] ?></td>
                    <td class="text-center"><?= $book["author_name"] ?></td>
                    <td class="text-center"><?= $book["stock"] ?></td>
                    <td class="text-center">
                        <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/book/update/<?= $book['book_id'] ?>">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?= base_url() ?>admin/book/delete/<?= $book['book_id'] ?>">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>