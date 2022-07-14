<section class="slider_section">

    <div class="container">

        <div class="row col-md-12  d-flex justify-content-center">
            <?php
            $head_index = 0;
            foreach ($books as $key => $book) {
                $head_index++;
                if ($head_index > 1) {
                    $mt = "mt-3";
                } else {
                    $mt = "";
                }
            ?>
                <div class="row">
                    <?php
                    $item_index = 0;
                    foreach ($book as $key => $val) {
                        $item_index++;
                        $margin = "";
                        if ($item_index < 5) {
                            $margin = "mr-5";
                        }
                    ?>
                        <div class="card <?= $margin ?> <?= $mt ?> shadow-lg p-2 mb-5 bg-white rounded" style="border-radius: 10px;">
                            <img class="card-img-top" src="<?= base_url() ?>assets/img/book/<?= $val["book_type_name"] ?>/<?= $val["cover"] ?>" alt="Card image" style="width: 150px; height: 200px; border-radius: 10px;">
                            <div class="card-body">
                                <p class="card-title truncate"><?= $val["book_name"] ?></p>
                                <?php
                                if ($data_source == "book_categories") {
                                ?>
                                    <button class="btn btn-sm btn-primary float-right btn-borrow-book" type="button" value="<?= $val["book_id"] ?>">
                                        Borrow
                                    </button>
                                <?php
                                } else if ($data_source == "my_collections") {
                                ?>
                                    <button class="btn btn-sm btn-danger float-right" type="button" disabled>
                                        <?= $val["end_date"] ?>
                                    </button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>