<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T88_menus <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Menus <?php echo form_error('menus') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="menus" id="menus" placeholder="Menus" value="<?php echo $menus; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Kode <?php echo form_error('kode') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t88_menus') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="idmenus" value="<?php echo $idmenus; ?>" /> 
			</form>
        </div>
    <!-- </body>
</html> -->