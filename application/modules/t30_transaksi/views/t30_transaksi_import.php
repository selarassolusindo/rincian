<div class="box box-info">
    <?php echo $this->session->flashdata('notif'); ?>
    <div class="box-header with-border">
        <h3 class="box-title">Import File Excel</h3>
    </div>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="int">Tahun Ajaran</label>
            <div class="col-sm-3">
                <!-- <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Tahun Ajaran" value="<?php echo $tahun_ajaran; ?>" /> -->
                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                    <option value="">-</option>
                    <?php foreach($listTahunajaran as $row) { ?>
                    <option value="<?php echo $row->tahun_ajaran ?>" <?php echo $row->idtahunajaran == $tahun_ajaran ? "selected" : "" ?>><?php echo $row->tahun_ajaran  ?></option>
                    <?php } ?>
                </select> <?php echo form_error('tahun_ajaran') ?>
            </div>
        </div>

    	<div class="form-group">
            <!-- <label for="userfile">Testing</label> -->
            <label class="col-sm-2 control-label" for="int">File</label>
            <div class="col-sm-3">
                <input type="file" name="userfile" class="form-control-file">
            </div>
    	</div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('t30_transaksi') ?>" class="btn btn-default">Batal</a>
    </div>
    </form>
</div>
