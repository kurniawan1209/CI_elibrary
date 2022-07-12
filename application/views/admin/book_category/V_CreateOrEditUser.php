<div id="content" class="p-4 p-md-5 pt-5" style="background-color: #f0ebe3;">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-4">Create New User</h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url() ?>admin/user/create" method="POST" enctype="multipart/form-data">
                <!-- Start First Row  -->
                <div class="form-group row">
                    <label for="inp_username" class="col-md-2 col-form-label">Username</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="inp_username">
                    </div>
                    <label for="inp_full_name" class="col-md-2 col-form-label">Full Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Full Name" name="full_name" id="inp_full_name">
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
                            <option value="1">Trial 1</option>
                            <option value="2">Trial 2</option>
                        </select>
                    </div>
                    <label for="inp_full_name" class="col-md-2 col-form-label">Gender</label>
                    <div class="col-md-4 mt-2">
                        <input type="radio" name="gender" id="inp_gender_M"> Male
                        <input type="radio" name="gender" id="inp_gender_F" class="ml-4"> Female
                    </div>
                </div>
                <!-- End Third Row -->

                <!-- Start Fourth Row -->
                <div class="form-group row">
                    <label for="inp_birth_date" class="col-md-2 col-form-label">Birth Date</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" placeholder="Birth Date" name="birth_date" id="inp_birth_date">
                    </div>
                    <label for="inp_email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="inp_email">
                    </div>
                </div>
                <!-- End Fourth Row -->

                <!-- Start Fifth Row -->
                <div class="form-group row">
                    <label for="inp_phone" class="col-md-2 col-form-label">Phone</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Phone" name="phone" id="inp_phone">
                    </div>
                    <label for="inp_address" class="col-md-2 col-form-label">Address</label>
                    <div class="col-md-4">
                        <textarea name="address" id="inp_address" class="form-control"></textarea>
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