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
        <h2 style="margin-top:0px">T98_akun <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Kode Induk <?php echo form_error('induk') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="induk" id="induk" placeholder="Induk" value="<?php echo $induk; ?>" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Kode <?php echo form_error('kode') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="kode" value="<?php echo $kode; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Urutan <?php echo form_error('urutan') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="urutan" id="urutan" placeholder="Urutan" value="<?php echo $urutan; ?>" />
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t98_akun') ?>" class="btn btn-default">Batal</a>
                </div>

				<!-- <input type="hidden" name="kode" value="<?php echo $kode; ?>" />  -->
			</form>
        </div>
    <!-- </body>
</html> -->
