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
        <?php $total = 0 ?>
        <script type="text/javascript">
            var j = 0;
            // var update = '<?php echo $this->uri->segment(2) ?>';
        </script>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
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

                    <!-- detail rincian -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Rincian <?php echo form_error('detailrincian0') ?></h3>
                    </div>
                    <div class="form-group">
        				<div class="col-md-12 mb-0">
        					<table class="table">
                                <thead>
                                    <th width="25%">Tagihan</th>
        							<th width="15%">Nominal</th>
                                    <th>Proses</th>
        						</thead>
                                <tbody id="tmp">

                                <?php if ($this->uri->segment(2) == "update") { ?>
                                    <!-- update detail -->

                                    <?php foreach ($detail as $key => $dtl) { ?>
                                        <?php $total += $dtl->nominal ?>
                                        <script type="text/javascript">
                                            ++j;
                                        </script>
                                        <tr id="trRincian<?php echo $key ?>">
                                            <td>
                                                <select class="form-control" name="tagihan[]">
                                                    <option value="">-</option>
                                                    <?php foreach($listTagihan as $row) { ?>
                                                    <option value="<?php echo $row->idtagihan ?>" <?php echo $row->idtagihan == $dtl->tagihan ? "selected" : "" ?>><?php echo $row->nama ?></option>
                                                    <?php } ?>
                                                </select> <?php echo form_error('tagihan[]') ?>
                                            </td>
                                            <td>
                                                <input value="<?php echo $dtl->nominal ?>" type="text" class="form-control" name="nominal[]" id="nominal[<?php echo $key ?>]" onblur="calculate(<?php echo $key ?>)" onkeyup="calculate(<?php echo $key ?>)"> <?php echo form_error('nominal[]') ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                <?php } else { ?>
                                    <!-- entry detail -->

                                    <tr id="trRincian0">
                                        <td>
                                            <select class="form-control" name="tagihan[]">
                                                <option value="">-</option>
                                                <?php foreach($listTagihan as $row) { ?>
                                                <option value="<?php echo $row->idtagihan ?>"><?php echo $row->nama ?></option>
                                                <?php } ?>
                                            </select> <?php echo form_error('tagihan[]') ?>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nominal[]" id="nominal[0]" onblur="calculate(0)" onkeyup="calculate(0)"> <?php echo form_error('nominal[]') ?>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="right">
                                            Total
                                        </td>
                                        <!-- <td align="right" ><div id="grandTotal"></div></td> -->
                                        <td>
                                            <input value="<?php echo $total ?>" type="text" class="form-control" name="total" id="total" readonly>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="form-group">
        				<div class="col-md-12 mb-0">
        					<table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#trRincian0" onclick="tambah()" class="btn btn-primary mb-2">Tambah Detail Rincian</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t04_rincian') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="idrincian" value="<?php echo $idrincian; ?>" />
			</form>
        </div>

        <script>
            $(document).ready(function () {

                // perubahan nomor jo
                $('#idjo').on('change',function () {
                    // if (update != 'update') {
                    //     newNomorJo();
                    // }
                    // alert(this.value);
                    window.location = "<?php echo site_url() ?>t30_jo/createCostsheet/"+this.value;
                });
                // $('#tanggal_jatuh_tempo_kir').datepicker({
                //     format: 'dd-mm-yyyy'
                // });
            })

            function tambah()
            {
                ++j;
                $('#tmp').append(
                    `
                    <tr id="trRincian`+j+`">
                        <td>
                            <select class="form-control" name="tagihan[]">
                                <option value="">-</option>
                                <?php foreach($listTagihan as $row) { ?>
                                <option value="<?php echo $row->idtagihan ?>"><?php echo $row->nama ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="nominal[]" id="nominal[`+j+`]" onblur="calculate(`+j+`)" onkeyup="calculate(`+j+`)">
                        </td>
                        <td>
                            <a href="#trRincian0" onclick="hapus(`+j+`)" class="text-danger">Hapus</a>
                        </td>
                    </tr>
                    `
                );
            }

            function hapus(index)
            {
        		$('#trRincian'+index).remove();
                --j;
                calculate();
        	}

            /**
             * calculate qty * harga
             */
            function calculate(index = 0) {

                var total2 = 0;
                for (var k = 0; k <= j; k++) {
                    var nominal = document.getElementById("nominal["+k+"]");

                    if (nominal != null) {
                        // total2 += parseFloat(qty.value) * parseFloat(harga.value);
                        total2 += parseFloat(nominal.value);
                    }

                }

                var total = document.getElementById('total');
                total.value = total2;

            }
        </script>
    <!-- </body>
</html> -->
