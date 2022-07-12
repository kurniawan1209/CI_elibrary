<?php
    $user = $users[0];

    if ($user["photo_profile"]){
        $photo_profile = base_url("assets/img/user_profile/".$user["photo_profile"]);
    } else {
        $photo_profile = base_url("assets/img/user_profile/default.jpg");
    }

?>

<div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Detail User <?= $user["username"] ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <img src="<?= $photo_profile ?>" class=" img-thumbnail" alt="avatar">
                <hr><br><br>
                <a class="btn btn-lg btn-info" href="<?= base_url() ?>admin/user">
                    <i class="fa fa-caret-square-o-left"></i> Back
                </a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Username :</label>
                        <input type="text" value="<?= $user['username'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Password :</label>
                        <input type="password" value="123451254312" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Full Name :</label>
                        <input type="text" value="<?= $user['full_name'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Address : </label>
                        <input type="text" value="<?= $user['address'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Gender : </label>
                        <input type="text" value="<?= ($user['gender'] == 'M') ? 'Male' : 'Female' ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Birth Date : </label>
                        <input type="text" value="<?= $user['birth_date'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Email : </label>
                        <input type="text" value="<?= $user['email'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label" style="font-weight: bold;">Role : </label>
                        <input type="text" value="<?= $user['role_name'] ?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>