<!-- <h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->{$identity}); ?></p> -->

<!-- <?php echo form_open("auth/deactivate/".$user->id);?> -->

  <!-- <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p> -->

  <!-- <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(['id' => $user->id]); ?> -->

  <!-- <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p> -->

<!-- <?php echo form_close();?> -->

<div class="box box-info">
    <div class="box-header with-border">
        <!-- <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3> -->
        <h3 class="box-title"><?php echo 'Non-Aktif' ?></h3>
    </div>
    <!-- <form action="<?php echo $action; ?>" method="post" class="form-horizontal"> -->
    <?php echo form_open("auth/deactivate/".$user->id, 'class="form-horizontal"');?>
        <div class="box-body">
            <div class="form-group">
                <!-- <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('first_name') ?></label> -->
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama" value="<?php echo $first_name; ?>" /> -->
                    <!-- <?php echo form_input($first_name, '', 'class="form-control"');?> -->
                    <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                    <input type="radio" name="confirm" value="yes" checked="checked" />
                    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                    <input type="radio" name="confirm" value="no" />
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- <button type="submit" class="btn btn-primary"><?php echo $button ?></button> -->
            <?php echo form_submit('submit', 'Simpan', 'class="btn btn-primary"');?>
            <a href="<?php echo site_url('auth') ?>" class="btn btn-default">Batal</a>
        </div>

        <?php echo form_hidden($csrf); ?>
        <?php echo form_hidden(['id' => $user->id]); ?>

    <?php echo form_close();?>
</div>
