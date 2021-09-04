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
        <h2 style="margin-top:0px">T02_kelas <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Sekolah</label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Sekolah" value="<?php echo $sekolah; ?>" /> -->
                            <select class="form-control" name="sekolah" id="sekolah">
                                <option value="-">-</option>
                                <?php foreach($listSekolah as $row) { ?>
                                <option value="<?php echo $row->idsekolah ?>" <?php echo $row->idsekolah == $sekolah ? "selected" : "" ?>><?php echo $row->nama  ?></option>
                                <?php } ?>
                            </select> <?php echo form_error('sekolah') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Kelas <?php echo form_error('kelas') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Sub Kelas <?php echo form_error('sub_kelas') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="sub_kelas" id="sub_kelas" placeholder="Sub Kelas" value="<?php echo $sub_kelas; ?>" />
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t02_kelas') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
			</form>
        </div>
    <!-- </body>
</html> -->
