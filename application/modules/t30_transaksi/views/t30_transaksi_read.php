<!doctype html>
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
        <h2 style="margin-top:0px">T30_transaksi Read</h2>
        <table class="table">
	    <tr><td>No Urut</td><td><?php echo $no_urut; ?></td></tr>
	    <tr><td>Tgl Buat</td><td><?php echo $tgl_buat; ?></td></tr>
	    <tr><td>Tgl Jt</td><td><?php echo $tgl_jt; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>No Reg</td><td><?php echo $no_reg; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td>Sub Kelas</td><td><?php echo $sub_kelas; ?></td></tr>
	    <tr><td>Jns Tgh</td><td><?php echo $jns_tgh; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t30_transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>