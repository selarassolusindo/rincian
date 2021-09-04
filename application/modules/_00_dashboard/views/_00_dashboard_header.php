<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><?php echo substr(APP_NAME, 0, 1) ?></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo APP_NAME ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <?php if ($this->ion_auth->logged_in()) { ?>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url() ?>assets/adminlte/dist/img/user1-128x128.jpg" class="user-image" alt="User Image">
                        <!-- <span class="hidden-xs">[username]</span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url() ?>assets/adminlte/dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">
                            <p><!-- Alexander Pierce - Web Developer --><?php echo $this->ion_auth->user()->row()->username ?><!-- <small>Member since Nov. 2012</small> --></p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url() ?>auth/change_password" class="btn btn-default btn-flat">Ubah Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo site_url() ?>auth/logout" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php }  // end if ($this->ion_auth->logged_in()) {  ?>

    </nav>

</header>
