
<?php
    $user_id = "";
    $username = "";
    $full_name = "";
    $gender = "";
    $role_id = "";
    $birth_date = "";
    $email = "";
    $phone = "";
    $address = "";
    $header = "Create New User";
    $url = "admin/user/create";
    $gender_m = "";
    $gender_f = "";

    if($detail_user_processed){
        $user = $detail_user_processed[0];

        $user_id = $user["user_id"];
        $username = $user["username"];
        $full_name = $user["full_name"];
        $gender = $user["gender"];
        $role_id = $user["role_id"];
        $birth_date = $user["birth_date"];
        $email = $user["email"];
        $phone = $user["phone"];
        $address = $user["address"];
        $header = "Edit User " . $username;
        $url = "admin/user/update/" . $user_id;
        if($gender == "M"){
            $gender_m = "checked";
            $gender_f = "";
        } else {
            $gender_m = "";
            $gender_f = "checked";
        }
    }
?>

<div id="content" class="p-4 p-md-5 pt-5" style="background-color: #f0ebe3;">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4"><?= $header ?></h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url($url) ?>" method="POST" enctype="multipart/form-data">
                <!-- Start First Row  -->
                <div class="form-group row">
                    <label for="inp_username" class="col-md-2 col-form-label">Username</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="inp_username" value="<?= $username ?>">
                    </div>
                    <label for="inp_full_name" class="col-md-2 col-form-label">Full Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Full Name" name="full_name" id="inp_full_name" value="<?= $full_name ?>">
                    </div>
                </div>
                <!-- End First Row -->

                <!-- Start Second Row -->
                <div class="form-group row">
                    <label for="inp_password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="inp_password">
                    </div>
                    <label for="inp_retype_pasword" class="col-md-2 col-form-label">Re-Type Password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="Re-Type Password" id="inp_retype_pasword">
                    </div>
                </div>
                <!-- End Second Row -->

                <!-- Start Third Row -->
                <div class="form-group row">
                    <label for="inp_role" class="col-md-2 col-form-label">Role</label>
                    <div class="col-md-4">
                        <select name="role" id="inp_role" aria-placeholder="Role" class="form-control">
                            <option disabled selected hidden>Choose...</option>
                            <?php 
                                foreach ($roles as $key => $role) {
                                    $selected = ($role_id == $role["role_id"] ? "selected" : "" );
                                    echo "<option value='".$role["role_id"]."' ".$selected.">".$role["role_name"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <label for="inp_full_name" class="col-md-2 col-form-label">Gender</label>
                    <div class="col-md-4 mt-2">
                        <input type="radio" name="gender" value="M" id="inp_gender_M" <?= $gender_m ?>> Male
                        <input type="radio" name="gender" value="F" id="inp_gender_F" class="ml-4" <?= $gender_f ?>> Female
                    </div>
                </div>
                <!-- End Third Row -->

                <!-- Start Fourth Row -->
                <div class="form-group row">
                    <label for="inp_birth_date" class="col-md-2 col-form-label">Birth Date</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" placeholder="Birth Date" name="birth_date" id="inp_birth_date" value="<?= $birth_date ?>">
                    </div>
                    <label for="inp_email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="inp_email" value="<?= $email ?>">
                    </div>
                </div>
                <!-- End Fourth Row -->

                <!-- Start Fifth Row -->
                <div class="form-group row">
                    <label for="inp_phone" class="col-md-2 col-form-label">Phone</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Phone" name="phone" id="inp_phone" value="<?= $phone ?>">
                    </div>
                    <label for="inp_address" class="col-md-2 col-form-label">Address</label>
                    <div class="col-md-4">
                        <textarea name="address" id="inp_address" class="form-control">
                            <?= $address ?>
                        </textarea>
                    </div>
                </div>
                <!-- End Fifth Row -->

                <!-- Start Sixth Row -->
                <div class="form-group row">
                    <label for="inp_files" class="col-md-2 col-form-label">Photo Profile</label>
                    <div class="col-md-4">
                        <input type="file" name="files" id="inp_files">
                    </div>
                </div>
                <!-- End Sixth Row -->

                <div class="col-md-12">
                    <button class="btn btn-md btn-primary float-right" type="submit">
                        <i class="fa fa-save"></i>&nbsp Save
                    </button>
                    <a href="<?= base_url() ?>admin/user" class="btn btn-md btn-danger float-left" type="button">
                        <i class="fa fa-remove"></i>&nbsp Back
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>