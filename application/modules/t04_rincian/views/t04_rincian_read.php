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
        <h2 style="margin-top:0px">T04_rincian Read</h2>
        <table class="table">
	    <tr><td>Tahun Ajaran</td><td><?php echo $tahun_ajaran; ?></td></tr>
	    <tr><td>Sekolah</td><td><?php echo $sekolah; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t04_rincian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>