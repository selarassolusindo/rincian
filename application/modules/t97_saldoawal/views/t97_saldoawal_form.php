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
        <h2 style="margin-top:0px">T97_saldoawal <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Tahun <?php echo form_error('tahun') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Saldo Awal Tahun <?php echo form_error('saldo_awal_tahun') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="saldo_awal_tahun" id="saldo_awal_tahun" placeholder="Saldo Awal Tahun" value="<?php echo $saldo_awal_tahun; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 01 <?php echo form_error('bulan_01') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_01" id="bulan_01" placeholder="Bulan 01" value="<?php echo $bulan_01; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 02 <?php echo form_error('bulan_02') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_02" id="bulan_02" placeholder="Bulan 02" value="<?php echo $bulan_02; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 03 <?php echo form_error('bulan_03') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_03" id="bulan_03" placeholder="Bulan 03" value="<?php echo $bulan_03; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 04 <?php echo form_error('bulan_04') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_04" id="bulan_04" placeholder="Bulan 04" value="<?php echo $bulan_04; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 05 <?php echo form_error('bulan_05') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_05" id="bulan_05" placeholder="Bulan 05" value="<?php echo $bulan_05; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 06 <?php echo form_error('bulan_06') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_06" id="bulan_06" placeholder="Bulan 06" value="<?php echo $bulan_06; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 07 <?php echo form_error('bulan_07') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_07" id="bulan_07" placeholder="Bulan 07" value="<?php echo $bulan_07; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 08 <?php echo form_error('bulan_08') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_08" id="bulan_08" placeholder="Bulan 08" value="<?php echo $bulan_08; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 09 <?php echo form_error('bulan_09') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_09" id="bulan_09" placeholder="Bulan 09" value="<?php echo $bulan_09; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 10 <?php echo form_error('bulan_10') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_10" id="bulan_10" placeholder="Bulan 10" value="<?php echo $bulan_10; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 11 <?php echo form_error('bulan_11') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_11" id="bulan_11" placeholder="Bulan 11" value="<?php echo $bulan_11; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Bulan 12 <?php echo form_error('bulan_12') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="bulan_12" id="bulan_12" placeholder="Bulan 12" value="<?php echo $bulan_12; ?>" />
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t97_saldoawal') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
			</form>
        </div>
    <!-- </body>
</html> -->