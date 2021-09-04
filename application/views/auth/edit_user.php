<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo 'Ubah' ?></h3>
    </div>
    <!-- <form action="<?php echo $action; ?>" method="post" class="form-horizontal"> -->
    <?php echo form_open(uri_string(), 'class="form-horizontal"');?>
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('first_name') ?></label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama" value="<?php echo $first_name; ?>" /> -->
                    <?php echo form_input($first_name, '', 'class="form-control"');?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat">Username <?php echo form_error('identity') ?></label>
                <div class="col-sm-3">
                    <!-- <textarea class="form-control" rows="3" name="identity" id="identity" placeholder="Username"><?php echo $identity; ?></textarea> -->
                    <?php echo form_input($identity, '', 'class="form-control"') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Password <?php echo form_error('password') ?></label>
                <div class="col-sm-3">
                    <!-- <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /> -->
                    <?php echo form_input($password, '', 'class="form-control"');?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Password Confirm <?php echo form_error('password_confirm') ?></label>
                <div class="col-sm-3">
                    <!-- <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Password Confirm" value="<?php echo $password_confirm; ?>" /> -->
                    <?php echo form_input($password_confirm, '', 'class="form-control"');?>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- <button type="submit" class="btn btn-primary"><?php echo $button ?></button> -->
            <?php echo form_submit('submit', 'Simpan', 'class="btn btn-primary"');?>
            <a href="<?php echo site_url('auth') ?>" class="btn btn-default">Batal</a>
        </div>

        <?php if ($this->ion_auth->is_admin()): ?>
            <?php foreach ($groups as $group):?>
                <input type="hidden" name="groups[]" value="<?php echo $group['id'];?>" >
            <?php endforeach?>
        <?php endif ?>

        <?php echo form_hidden('id', $user->id);?>
        <?php echo form_hidden($csrf); ?>
    <?php echo form_close();?>
</div>

<!-- <h1><?php echo lang('edit_user_heading');?></h1> -->
<!-- <p><?php echo lang('edit_user_subheading');?></p> -->

<!-- <div id="infoMessage"><?php echo $message;?></div> -->

<!-- <?php echo form_open(uri_string());?> -->

      <!-- <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p> -->

      <!-- <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p> -->

      <?php
      // if ($identity_column!=='email') {
      //     echo '<p>';
      //     echo lang('edit_user_identity_label', 'identity');
      //     echo '<br />';
      //     echo form_error('identity');
      //     echo form_input($identity);
      //     echo '</p>';
      // }
      ?>

      <!-- <p>
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p> -->

      <!-- <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p> -->

      <!-- <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p> -->

      <!-- <?php if ($this->ion_auth->is_admin()): ?> -->

          <!-- <h3><?php echo lang('edit_user_groups_heading');?></h3> -->
          <!-- <?php foreach ($groups as $group):?> -->
              <!-- <label class="checkbox"> -->
              <!-- <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>> -->
              <!-- <input type="hidden" name="groups[]" value="<?php echo $group['id'];?>" > -->
              <!-- <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8');?> -->
              <!-- </label> -->
          <!-- <?php endforeach?> -->

      <!-- <?php endif ?> -->

      <!-- <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?> -->

      <!-- <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p> -->

<!-- <?php echo form_close();?> -->
