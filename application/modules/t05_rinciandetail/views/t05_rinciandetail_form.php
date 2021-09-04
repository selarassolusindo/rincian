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
        <h2 style="margin-top:0px">T05_rinciandetail <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Rincian <?php echo form_error('rincian') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="rincian" id="rincian" placeholder="Rincian" value="<?php echo $rincian; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Tagihan <?php echo form_error('tagihan') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tagihan" id="tagihan" placeholder="Tagihan" value="<?php echo $tagihan; ?>" />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="double">Nominal <?php echo form_error('nominal') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" />
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t05_rinciandetail') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="idrinciandetail" value="<?php echo $idrinciandetail; ?>" /> 
			</form>
        </div>
    <!-- </body>
</html> -->