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
        <h2 style="margin-top:0px">T02_kelas Read</h2>
        <table class="table">
	    <tr><td>Sekolah</td><td><?php echo $sekolah; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td>Sub Kelas</td><td><?php echo $sub_kelas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t02_kelas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>