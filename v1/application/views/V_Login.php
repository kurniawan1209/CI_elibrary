<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url() ?>assets/login-form-07/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/login-form-07/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/login-form-07/css/bootstrap.min.css">  

  <!-- Style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/login-form-07/css/style.css">

  <title>Login #7</title>
</head>

<body>

  <?php 
    if($this->session->userdata("error")){
      echo "<script>alert('login salah !')</script>";
    }
  ?>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url() ?>assets/login-form-07/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid" style="height: 90%; width: 90%">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Sign In</h3>
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username">

                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">

                </div>

                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Register</a></span>
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="<?= base_url() ?>assets/login-form-07/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url() ?>assets/login-form-07/js/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/login-form-07/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/login-form-07/js/main.js"></script>
</body>

</html>