<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T30_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T30_transaksi_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('t89_users_menus/T89_users_menus_model');
        $this->load->model('t01_tahunajaran/T01_tahunajaran_model');
    }

    public function import()
    {
        $listTahunajaran = $this->T01_tahunajaran_model->get_all();
        $data = array(
            'button' => 'Proses',
            'action' => site_url('t30_transaksi/import_action'),
            'listTahunajaran' => $listTahunajaran,
		);
        $data['_view'] = 't30_transaksi/t30_transaksi_import';
        $data['_caption'] = 'Data Transaksi';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    /**
     * handling proses import
     */
    public function import_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->import();
        } else {

            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

            $config['upload_path'] = realpath('excel');
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>Proses import data gagal !</b> ' . $this->upload->display_errors() . '</div>');
                redirect('t30_transaksi/import');
            } else {

                $data_upload = $this->upload->data();

                $excelreader = new PHPExcel_Reader_Excel2007();
                // $format = new PHPExcel_Style_NumberFormat();
                $loadexcel = $excelreader->load('excel/' . $data_upload['file_name']);
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                // echo pre(dateMysql($sheet[4]['C'])); exit;
                // echo pre($sheet); exit;

                // mengambil data sekolah
                $sekolah = $sheet[1]['A'];

                $data = array();
                $dataBayar = array();
                $startRow = 6;
                $numRow = 1;

                foreach ($sheet as $row) {
                    // echo pre($row);
                    if ($numRow >= $startRow) {

                        /**
                         * check jika kolom A bertanda * berarti sudah akhir baris
                         */
                        if ($row['A'] == 'Total Keseluruhan(IDR)') {
                            break;
                        }

                        /**
                         * simpan ke tabel transaksi
                         */
                        $dataTransaksi = [
                            'no_urut'      => $row['A'],
                            'tgl_buat'     => dateExcelToMysql($row['B']),
                            'tgl_jt'       => dateExcelToMysql($row['C']),
                            'nama'         => $row['D'],
                            'no_reg'       => $row['E'],
                            'kelas'        => $row['F'],
                    		'sub_kelas'    => $row['G'],
                    		'jns_tgh'      => $row['H'],
                            'jumlah'       => str_replace(',', '', $row['I']),
                    		'status'       => $row['J'],
                            'sekolah'      => $sekolah,
                            'tahun_ajaran' => $this->input->post('tahun_ajaran',TRUE),
                        ];
                        $this->T30_transaksi_model->insertWithCheck($dataTransaksi);

                    }
                    $numRow++;
                }
                // echo pre($data);
                // $this->T30_tamu_model->insert_import($data);
                unlink(realpath('excel/' . $data_upload['file_name']));

                $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>Proses import berhasil !</b> Data berhasil diimport !</div>');
                redirect('t30_transaksi');
            }
        }
    }

    public function index()
    {
        // $this->load->view('t30_transaksi/t30_transaksi_list');
        $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't30_transaksi/t30_transaksi_list';
        $data['_caption'] = 'Data Transaksi';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T30_transaksi_model->json();
    }

    public function read($id)
    {
        $row = $this->T30_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idtr' => $row->idtr,
				'no_urut' => $row->no_urut,
				'tgl_buat' => $row->tgl_buat,
				'tgl_jt' => $row->tgl_jt,
				'nama' => $row->nama,
				'no_reg' => $row->no_reg,
				'kelas' => $row->kelas,
				'sub_kelas' => $row->sub_kelas,
				'jns_tgh' => $row->jns_tgh,
				'jumlah' => $row->jumlah,
				'status' => $row->status,
	    	);
            $this->load->view('t30_transaksi/t30_transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_transaksi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t30_transaksi/create_action'),
		    'idtr' => set_value('idtr'),
		    'no_urut' => set_value('no_urut'),
		    'tgl_buat' => set_value('tgl_buat'),
		    'tgl_jt' => set_value('tgl_jt'),
		    'nama' => set_value('nama'),
		    'no_reg' => set_value('no_reg'),
		    'kelas' => set_value('kelas'),
		    'sub_kelas' => set_value('sub_kelas'),
		    'jns_tgh' => set_value('jns_tgh'),
		    'jumlah' => set_value('jumlah'),
		    'status' => set_value('status'),
		);
        // $this->load->view('t30_transaksi/t30_transaksi_form', $data);
        $data['_view'] = 't30_transaksi/t30_transaksi_form';
        $data['_caption'] = 'Transaksi';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'no_urut' => $this->input->post('no_urut',TRUE),
				'tgl_buat' => $this->input->post('tgl_buat',TRUE),
				'tgl_jt' => $this->input->post('tgl_jt',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'no_reg' => $this->input->post('no_reg',TRUE),
				'kelas' => $this->input->post('kelas',TRUE),
				'sub_kelas' => $this->input->post('sub_kelas',TRUE),
				'jns_tgh' => $this->input->post('jns_tgh',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'status' => $this->input->post('status',TRUE),
	    	);
            $this->T30_transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t30_transaksi'));
        }
    }

    public function update($id)
    {
        $row = $this->T30_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t30_transaksi/update_action'),
				'idtr' => set_value('idtr', $row->idtr),
				'no_urut' => set_value('no_urut', $row->no_urut),
				'tgl_buat' => set_value('tgl_buat', $row->tgl_buat),
				'tgl_jt' => set_value('tgl_jt', $row->tgl_jt),
				'nama' => set_value('nama', $row->nama),
				'no_reg' => set_value('no_reg', $row->no_reg),
				'kelas' => set_value('kelas', $row->kelas),
				'sub_kelas' => set_value('sub_kelas', $row->sub_kelas),
				'jns_tgh' => set_value('jns_tgh', $row->jns_tgh),
				'jumlah' => set_value('jumlah', $row->jumlah),
				'status' => set_value('status', $row->status),
	    	);
            // $this->load->view('t30_transaksi/t30_transaksi_form', $data);
            $data['_view'] = 't30_transaksi/t30_transaksi_form';
            $data['_caption'] = 'Transaksi';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_transaksi'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtr', TRUE));
        } else {
            $data = array(
				'no_urut' => $this->input->post('no_urut',TRUE),
				'tgl_buat' => $this->input->post('tgl_buat',TRUE),
				'tgl_jt' => $this->input->post('tgl_jt',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'no_reg' => $this->input->post('no_reg',TRUE),
				'kelas' => $this->input->post('kelas',TRUE),
				'sub_kelas' => $this->input->post('sub_kelas',TRUE),
				'jns_tgh' => $this->input->post('jns_tgh',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'status' => $this->input->post('status',TRUE),
	    	);
            $this->T30_transaksi_model->update($this->input->post('idtr', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t30_transaksi'));
        }
    }

    public function delete($id)
    {
        $row = $this->T30_transaksi_model->get_by_id($id);
        if ($row) {
            $this->T30_transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t30_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_transaksi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'trim|required');
		// $this->form_validation->set_rules('no_urut', 'no urut', 'trim|required');
		// $this->form_validation->set_rules('tgl_buat', 'tgl buat', 'trim|required');
		// $this->form_validation->set_rules('tgl_jt', 'tgl jt', 'trim|required');
		// $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		// $this->form_validation->set_rules('no_reg', 'no reg', 'trim|required');
		// $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
		// $this->form_validation->set_rules('sub_kelas', 'sub kelas', 'trim|required');
		// $this->form_validation->set_rules('jns_tgh', 'jns tgh', 'trim|required');
		// $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required|numeric');
		// $this->form_validation->set_rules('status', 'status', 'trim|required');
		// $this->form_validation->set_rules('idtr', 'idtr', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T30_transaksi.php */
/* Location: ./application/controllers/T30_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-16 14:49:08 */
/* http://harviacode.com */
