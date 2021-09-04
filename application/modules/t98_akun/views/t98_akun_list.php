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
                <!-- <h2 style="margin-top:0px">T98_akun List</h2> -->
                <?php //if ($hakAkses['tambah']) { ?>
                <?php //echo anchor(site_url('t98_akun/create'), 'Tambah', 'class="btn btn-primary"'); ?>
                <?php //} ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <!-- <?php echo anchor(site_url('t98_akun/create'), 'Tambah', 'class="btn btn-primary"'); ?> -->
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
                            <th>Kode</th>
							<th>Nama</th>
							<th>Kode Induk</th>
							<th>Urutan</th>
							<th>Action</th>
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
                    pageLength: 250,
                    paging: true,
                    lengthChange: false,
                    ordering: true,
                    info: true,
                    // autoWidth: true,
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
                    ajax: {"url": "t98_akun/json", "type": "POST",
                        "data": function(data) {
                            data.kode = $('#kode').val();
                            data.nama = $('#nama').val();
                            data.induk = $('#induk').val();
                            data.urutan = $('#urutan').val();
                        }
                    },
                    columns: [
                        {
                            "data": "kode",
                            "width": "15%"
                            // "orderable": true
                        },
						{
                            "data": "nama",
                            "width": "40%"
                        },
						{
                            "data": "induk",
                            "width": "15%"
                        },
						{
                            "data": "urutan",
                            "width": "15%"
                        },
                        {
                            "data" : "action",
                            "className" : "text-center",
                            "width": "15%"
                        }
                    ],
                    order: [[3, 'asc']],
                    // rowCallback: function(row, data, iDisplayIndex) {
                    //     var info = this.fnPagingInfo();
                    //     var page = info.iPage;
                    //     var length = info.iLength;
                    //     var index = page * length + (iDisplayIndex + 1);
                    //     $('td:eq(0)', row).html(index);
                    // }
                });

                $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
                const aName = ['kode', 'nama', 'induk', '', ''];
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

            });
        </script>
    <!-- </body>
</html> -->
