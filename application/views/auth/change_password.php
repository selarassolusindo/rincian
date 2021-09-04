<!-- <h1><?php echo lang('change_password_heading');?></h1> -->

<!-- <div id="infoMessage"><?php echo $message;?></div> -->

<!-- <?php echo form_open("auth/change_password");?> -->

      <!-- <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </p> -->

      <!-- <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p> -->

      <!-- <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </p> -->

      <!-- <?php echo form_input($user_id);?> -->
      <!-- <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p> -->

<!-- <?php echo form_close();?> -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo APP_NAME ?> | Ubah Password</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo site_url() ?>"><b>&nbsp;</b></a>
            </div>
            <!-- /.login-logo -->

            <div class="login-box-body">
                <p class="login-box-msg">Ubah Password</p>

                <div id="infoMessage"><?php echo $message;?></div>

                <?php echo form_open("auth/change_password");?>
                    <div class="form-group has-feedback">
                        <!-- <input type="password" class="form-control" placeholder="Password"> -->
                        <?php echo form_input($old_password, '', 'class="form-control" placeholder="Password Lama"');?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <!-- <input type="password" class="form-control" placeholder="Password"> -->
                        <?php echo form_input($new_password, '', 'class="form-control" placeholder="Password Baru"');?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <!-- <input type="password" class="form-control" placeholder="Password"> -->
                        <?php echo form_input($new_password_confirm, '', 'class="form-control" placeholder="Ulangi Password Baru"');?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8"> -->
                            <!-- <div class="checkbox icheck"> -->
                                <!-- <label><input type="checkbox"> Remember Me</label> -->
                            <!-- </div> -->
                        <!-- </div> -->
                        <!-- /.col -->
                        <div class="col-xs-12 text-right">
                            <a href="<?php echo site_url() ?>" class="btn btn-primary btn-flat">Batal</a>
                            <button type="submit" class="btn btn-primary btn-flat">Ubah</button>
                        </div>
                        <!-- /.col -->
                    </div>
                <?php echo form_close();?>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url() ?>assets/adminlte/plugins/iCheck/icheck.min.js"></script>

    </body>
</html>
