<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="cst-sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i id="admin_sidebar_icon" class="fa fa-chevron-circle-right"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <h1><a href="<?= base_url() ?>admin" class="logo">E-Library</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="<?php if ($menu == "Dashboard"){echo "active";}?>">
                    <a href="<?= base_url() ?>admin"><span class="fa fa-home mr-3"></span> Dashboard</a>
                </li>
                <li class="<?php if ($menu == "User Role"){echo "active";}?>">
                    <a href="<?= base_url() ?>admin/user-role"><span class="fa fa-user mr-3"></span> User Role</a>
                </li>
                <li class="<?php if ($menu == "User"){echo "active";}?>">
                    <a href="<?= base_url() ?>admin/user"><span class="fa fa-user mr-3"></span> User</a>
                </li>
                <li class="<?php if ($menu == "Book Category"){echo "active";}?>">
                    <a href="<?= base_url() ?>admin/book-category"><span class="fa fa-list mr-3"></span> Book Category</a>
                </li>
                <li class="<?php if ($menu == "Book"){echo "active";}?>">
                    <a href="<?= base_url() ?>admin/book"><span class="fa fa-book mr-3"></span> Book</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                </li>
            </ul>

            <div class="footer">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>

        </div>
    </nav>