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
        <h2 style="margin-top:0px">T04_rincian <?php echo $button ?></h2> -->

        <div class="box box-info">
            <div class="box-header with-border">
                <!-- <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3> -->
                <h3 class="box-title">Pilih Data</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Sekolah</label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Sekolah" value="<?php echo $sekolah; ?>" /> -->
                            <select class="form-control" name="sekolah" id="sekolah">
                                <option value="">-</option>
                                <?php foreach($listSekolah as $row) { ?>
                                <option value="<?php echo $row->idsekolah ?>" <?php echo $row->idsekolah == $sekolah ? "selected" : "" ?>><?php echo $row->nama  ?></option>
                                <?php } ?>
                            </select> <?php echo form_error('sekolah') ?>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Tahun Ajaran</label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Tahun Ajaran" value="<?php echo $tahun_ajaran; ?>" /> -->
                            <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                <option value="">-</option>
                                <?php foreach($listTahunajaran as $row) { ?>
                                <option value="<?php echo $row->idtahunajaran ?>" <?php echo $row->idtahunajaran == $tahun_ajaran ? "selected" : "" ?>><?php echo $row->tahun_ajaran  ?></option>
                                <?php } ?>
                            </select> <?php echo form_error('tahun_ajaran') ?>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Kelas</label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" /> -->
                            <select class="form-control" name="kelas" id="kelas">
                                <option value="">-</option>
                                <?php foreach($listKelas as $row) { ?>
                                <option value="<?php echo $row->idkelas ?>" <?php echo $row->idkelas == $kelas ? "selected" : "" ?>><?php echo $row->kelas . ' - ' . $row->sub_kelas  ?></option>
                                <?php } ?>
                            </select> <?php echo form_error('kelas') ?>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t79_transaksi') ?>" class="btn btn-default">Batal</a>
                </div>

			</form>
        </div>

    <!-- </body>
</html> -->
