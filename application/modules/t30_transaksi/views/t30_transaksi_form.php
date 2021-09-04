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
        <h2 style="margin-top:0px">T30_transaksi <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">No Urut</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="No Urut" value="<?php echo $no_urut; ?>" /> <?php echo form_error('no_urut') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="date">Tgl Buat</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tgl_buat" id="tgl_buat" placeholder="Tgl Buat" value="<?php echo $tgl_buat; ?>" /> <?php echo form_error('tgl_buat') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="date">Tgl Jt</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tgl_jt" id="tgl_jt" placeholder="Tgl Jt" value="<?php echo $tgl_jt; ?>" /> <?php echo form_error('tgl_jt') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Nama</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /> <?php echo form_error('nama') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">No Reg</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="no_reg" id="no_reg" placeholder="No Reg" value="<?php echo $no_reg; ?>" /> <?php echo form_error('no_reg') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Kelas</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" /> <?php echo form_error('kelas') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Sub Kelas</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="sub_kelas" id="sub_kelas" placeholder="Sub Kelas" value="<?php echo $sub_kelas; ?>" /> <?php echo form_error('sub_kelas') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Jns Tgh</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="jns_tgh" id="jns_tgh" placeholder="Jns Tgh" value="<?php echo $jns_tgh; ?>" /> <?php echo form_error('jns_tgh') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Jumlah</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /> <?php echo form_error('jumlah') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Status</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> <?php echo form_error('status') ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t30_transaksi') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="idtr" value="<?php echo $idtr; ?>" /> 
			</form>
        </div>
    <!-- </body>
</html> -->