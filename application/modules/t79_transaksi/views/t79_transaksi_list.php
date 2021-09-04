<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <h2 style="margin-top:0px">T30_transaksi List</h2> -->
                <?php //if ($hakAkses['tambah']) { ?>
                <?php //echo anchor(site_url('t30_transaksi/create'), 'Tambah', 'class="btn btn-primary"'); ?>
                <?php //echo anchor(site_url('t30_transaksi/import'), 'Import File Excel', 'class="btn btn-primary"'); ?>
                <?php //} ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <!-- <?php echo anchor(site_url('t30_transaksi/create'), 'Tambah', 'class="btn btn-primary"'); ?> -->
		    </div>
        </div>
        <div class="box">
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-hover display" style="width: 100%">
                    <style media="screen">
                        thead input {
                            width: 100%;
                        }
                    </style>
                    <thead>
                        <tr>
                            <th>No</th>
							<th>No Urut</th>
							<th>Tgl Buat</th>
							<th>Tgl Jt</th>
							<th>Nama</th>
							<th>No Reg</th>
							<th>Kelas</th>
							<th>Sub Kelas</th>
							<th>Jns Tgh</th>
							<th>Jumlah</th>
							<th>Status</th>
                            <th>Sekolah</th>
                            <th>Tahun Ajaran</th>
							<!-- <th>Action</th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").DataTable({
                    paging: true,
                    lengthChange: false,
                    ordering: true,
                    info: true,
                    autoWidth: true,
                    searching: false,
                    fixedHeader: true,
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                            .off('.DT')
                            .on('keyup.DT', function(e) {
                                if (e.keyCode == 13) {
                                    api.search(this.value).draw();
                                }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "t79_transaksi/json", "type": "POST",
                        "data": function(data) {
                            data.no_urut = $('#no_urut').val();
                            data.tgl_buat = $('#tgl_buat').val();
                            data.tgl_jt = $('#tgl_jt').val();
                            data.nama = $('#nama').val();
                            data.no_reg = $('#no_reg').val();
                            data.kelas = $('#kelas').val();
                            data.sub_kelas = $('#sub_kelas').val();
                            data.jns_tgh = $('#jns_tgh').val();
                            data.jumlah = $('#jumlah').val();
                            data.status = $('#status').val();
                            data.sekolah = $('#sekolah').val();
                            data.tahun_ajaran = $('#tahun_ajaran').val();
                        }
                    },
                    columns: [
                        {
                            "data": "idtr",
                            "orderable": false
                        },
						{"data": "no_urut"},
						{"data": "tgl_buat"},
						{"data": "tgl_jt"},
						{"data": "nama"},
						{"data": "no_reg"},
						{"data": "kelas"},
						{"data": "sub_kelas"},
						{"data": "jns_tgh"},
						{"data": "jumlah"},
						{"data": "status"},
                        {"data": "sekolah"},
                        {"data": "tahun_ajaran"},
                        // {
                        //     "data" : "action",
                        //     "orderable": false,
                        //     "className" : "text-center"
                        // }
                    ],
                    order: [[1, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });

                $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
                const aName = ['', 'no_urut', 'tgl_buat', 'tgl_jt', 'nama', 'no_reg', 'kelas', 'sub_kelas', 'jns_tgh', 'jumlah', 'status', 'sekolah', 'tahun_ajaran', ''];
                $('#mytable thead tr:eq(1) th').each( function (i) {
                    var title = $(this).text();
                    if (aName[i] == '') {
                        $(this).html( '&nbsp;' );
                    } else {
                        $(this).html( '<input type="text" placeholder="Search '+title+'" id="'+aName[i]+'" name="'+aName[i]+'" />' );
                        $( 'input', this ).on( 'keyup change', function () {
                            t.draw();
                        });
                    }
                });

                // pengisian textbox search
                $('#sekolah').val(`<?php echo $sekolah ?>`);
                $('#tahun_ajaran').val(`<?php echo $tahun_ajaran ?>`);
                $('#kelas').val(`<?php echo $kelas ?>`);
                $('#sub_kelas').val(`<?php echo $sub_kelas ?>`);
                t.draw();

            });
        </script>
    <!-- </body>
</html> -->
