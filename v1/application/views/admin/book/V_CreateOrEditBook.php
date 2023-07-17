<?php
    $book_id = "";
    $book_name = "";
    $book_created = "";
    $book_author = "";
    $book_stock = "";
    $book_type = "";
    $sysnopsis = "";
    $url = base_url() . "admin/book/create";

    if($book_detail){
        $book = $book_detail[0];
        
        $book_id = $book["book_id"];
        $book_name = $book["book_name"];
        $book_created = $book["book_created_date"];
        $book_author = $book["author_name"];
        $book_stock = $book["stock"];
        $book_type = $book["book_type_id"];
        $sysnopsis = $book["synopsis"];
        $url = base_url() . "admin/book/update/" . $book_id;
    }
?>

<div id="content" class="p-4 p-md-5 pt-5" style="background-color: #f0ebe3;">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Insert New Book</h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="<?= $url ?>" method="POST" enctype="multipart/form-data">
                <!-- Start First Row  -->
                <div class="form-group row">
                    <label for="inp_book_name" class="col-md-2 col-form-label">Book Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Book Name" name="book_name" id="inp_book_name" value="<?= $book_name ?>">
                    </div>
                    <label for="inp_created_date" class="col-md-2 col-form-label">Book Created</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" placeholder="Created Date" name="book_created_date" id="inp_created_date" value="<?= $book_created ?>">
                    </div>
                </div>
                <!-- End First Row -->

                <!-- Start Second Row -->
                <div class="form-group row">
                    <label for="inp_author" class="col-md-2 col-form-label">Author</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Author" name="author_name" id="inp_author" value="<?= $book_author ?>">
                    </div>
                    <label for="inp_stock" class="col-md-2 col-form-label">Stock</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" placeholder="Stock" id="inp_stock" name="stock" value="<?= $book_stock ?>">
                    </div>
                </div>
                <!-- End Second Row -->

                <!-- Start Third Row -->
                <div class="form-group row">
                    <label for="inp_cover" class="col-md-2 col-form-label">Cover</label>
                    <div class="col-md-4">
                        <input type="file" name="files" id="inp_cover">
                    </div>
                    <!-- <label for="inp_pdf_file" class="col-md-2 col-form-label">E-Book</label>
                    <div class="col-md-4 mt-2">
                        <input type="file" name="ebook" id="inp_pdf_file">
                    </div> -->
                    <label for="inp_book_type" class="col-md-2 col-form-label">Book Type</label>
                    <div class="col-md-4 mt-2">
                        <select name="book_type" id="inp_book_type" class="form-control">
                            <?php if($book_type == ""){ ?>
                            <option disabled selected hidden>Choose...</option>
                            <?php
                                }
                                foreach ($book_types as $key => $book_type) {
                                    ?>
                                        <option value="<?= $book_type['book_type_id']?>" <?php $book_type['book_type_id'] == $book_type ? 'seleted' : ''?>><?= $book_type['book_type_name']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- End Third Row -->

                <!-- Start Fourth Row -->
                <div class="form-group row">
                    <label for="inp_synopsis" class="col-md-2 col-form-label">Synopsis</label>
                    <div class="col-md-10">
                        <textarea name="synopsis" id="inp_synopsis" class="form-control" rows="3"><?= $sysnopsis ?></textarea>
                    </div>
                </div>
                <!-- End Fourth Row -->

                <!-- Start Button -->
                <div class="col-md-12 mt-5">
                    <button class="btn btn-md btn-primary float-right" type="submit">
                        <i class="fa fa-save"></i>&nbsp Save
                    </button>
                    <a href="<?= base_url() ?>admin/book" class="btn btn-md btn-danger float-left" type="button">
                        <i class="fa fa-remove"></i>&nbsp Back
                    </a>
                </div>
                <!-- End Button -->
            </form>

        </div>
    </div>
</div>