<section class="slider_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <h1>
                        Read a Book <br>
                        Open the World
                    </h1>
                    <p>
                        This app provide many books with many categories. Find the best book like your wish. Enjoy :)
                    </p>
                    <a href="">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                    <img src="<?= base_url() ?>/assets/bostorek/images/slider-img.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<br><br><br><br>

<?php
if ($book_source == "user_list") {
    $header = "This book are recommended by your list";
} else {
    $header = "This book are recommended by top book activity in this week";
}
?>

<section class="layout_padding" style="background-color: #063547;">
    <div class="catagory_container">
        <div class="container">
            <div class="heading_container heading_center" style="color: white;">
                <h2>
                    Recomendations Book
                </h2>
                <p>
                    <?= $header ?>
                </p>
            </div>
            <div class="row col-md-12">
                <div id="div_book_recommendations" class="carousel slide col-md-12" data-ride="carousel">
                    <div class="carousel-inner col-md-12">
                        <?php
                        $head_index = 0;
                        foreach ($books as $key => $book) {
                            $head_index++;
                            $active = "";
                            if ($head_index == 1) {
                                $active = "active";
                            }
                        ?>
                            <div class="carousel-item <?= $active ?>">
                                <div class="row d-flex justify-content-center">
                                    <?php
                                    $item_index = 0;
                                    foreach ($book as $key => $val) {
                                        $item_index++;
                                        $margin = "";
                                        if ($item_index < 5) {
                                            $margin = "mr-5";
                                        }
                                    ?>
                                        <div class="card <?= $margin ?> mt-2" style="border-radius: 10px;">
                                            <img class="card-img-top" src="<?= base_url() ?>assets/img/book/<?= $val["cover"] ?>" alt="Card image" style="width: 150px; height: 200px; border-radius: 10px;">
                                            <div class="card-body">
                                                <h4 class="card-title truncate"><?= $val["book_name"] ?></h4>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#div_book_recommendations" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#div_book_recommendations" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="catagory_section layout_padding">
    <div class="catagory_container">
        <div class="container ">
            <div class="heading_container heading_center">
                <h2>
                    Books Categories
                </h2>
                <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                </p>
            </div>
            <div class="row">
                <?php
                foreach ($book_categories as $key => $category) {
                ?>
                    <div class="col-sm-6 col-md-4 ">
                        <div class="box ">
                            <div class="img-box">
                                <a href="<?= base_url() ?>user/book-categories/<?= $category["book_type_id"] ?>">
                                    <img src="<?= base_url() ?>assets/img/book_type_logo/<?= $category["book_type_logo"] ?>" alt="">
                                </a>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    <?= $category["book_type_name"] ?>
                                </h5>
                                <p class="truncate-book-category">
                                    <?= $category["book_type_description"] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>