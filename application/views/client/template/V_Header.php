<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="<?= base_url() ?>assets/bostorek/images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Bostorek</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bostorek/css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="<?= base_url() ?>assets/bostorek/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?= base_url() ?>assets/bostorek/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= base_url() ?>assets/bostorek/css/responsive.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/custom/css/bs4pop.css" rel="stylesheet" />

  <style>
    .btn-custom {
      background-color: #44b89d;
      border-color: #44b89d;
      border-radius: 40px;
    }

    .btn-custom:hover {
      background-color: white;
      color: #44b89d !important;
    }

    .truncate {
      width: 110px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .dropdown-book-types {
      max-height: 280px;
      overflow-y: auto;
    }

  </style>

</head>

<body>

  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Bostorek
          </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link pl-lg-0" href="<?= base_url() ?>user">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <div class="btn-group">
                <a class="nav-link pl-lg-0 dropdown-toggle" data-toggle="dropdown" href="categories.html">Our Categories</a>
                <div class="dropdown-menu dropdown-book-types">
                  <?php
                  foreach ($book_types as $key => $type) {
                  ?>
                    <a class="dropdown-item" href="<?= base_url() ?>user/book-categories/<?= $type["book_type_slug"] ?>"><?= $type["book_type_name"] ?></a>
                  <?php } ?>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-lg-0" href="<?= base_url() ?>user/my-collections">My Collections <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <button class="nav-link btn btn-success btn-sm btn-custom">
                <?php
                if ($user_login) {
                ?>
                  <i class="fa fa-user"></i>
                  <?= $user_login[0]['username'] ?>
                <?php } else { ?>
                  <i class="fa fa-sign-in"></i>
                  Sign In
                <?php } ?>
              </button>
            </li>
            <?php if($user_login){?>
            <li class="nav-item">
              <a class="nav-link btn btn-success btn-sm btn-custom ml-3" href="<?= base_url()?>logout">
              <i class="fa fa-sign-out"></i>
                  Sign Out
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->