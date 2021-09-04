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
        <h2 style="margin-top:0px">T00_sekolah <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Kode <?php echo form_error('kode') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                        <div class="col-sm-3">
                            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Nomor Telepon <?php echo form_error('nomor_telepon') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon" value="<?php echo $nomor_telepon; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Logo <?php echo form_error('logo') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="logo" id="logo" placeholder="Logo" value="<?php echo $logo; ?>" />
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t00_sekolah') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="idsekolah" value="<?php echo $idsekolah; ?>" /> 
			</form>
        </div>
    <!-- </body>
</html> -->