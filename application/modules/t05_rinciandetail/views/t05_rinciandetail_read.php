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
        <h2 style="margin-top:0px">T05_rinciandetail Read</h2>
        <table class="table">
	    <tr><td>Rincian</td><td><?php echo $rincian; ?></td></tr>
	    <tr><td>Tagihan</td><td><?php echo $tagihan; ?></td></tr>
	    <tr><td>Nominal</td><td><?php echo $nominal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t05_rinciandetail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>