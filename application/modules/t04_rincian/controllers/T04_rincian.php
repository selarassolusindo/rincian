<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T04_rincian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T04_rincian_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('t89_users_menus/T89_users_menus_model');
        $this->load->model('t01_tahunajaran/T01_tahunajaran_model');
        $this->load->model('t00_sekolah/T00_sekolah_model');
        $this->load->model('t02_kelas/T02_kelas_model');
        $this->load->model('t04_rincian/T04_rincian_model');
        $this->load->model('t03_tagihan/T03_tagihan_model');
    }

    public function index()
    {
        // $this->load->view('t04_rincian/t04_rincian_list');
        $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't04_rincian/t04_rincian_list';
        $data['_caption'] = 'Rincian';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T04_rincian_model->json();
    }

    public function read($id)
    {
        $row = $this->T04_rincian_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idrincian' => $row->idrincian,
				'tahun_ajaran' => $row->tahun_ajaran,
				'sekolah' => $row->sekolah,
				'kelas' => $row->kelas,
	    	);
            $this->load->view('t04_rincian/t04_rincian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_rincian'));
        }
    }

    public function create()
    {
        $listTahunajaran = $this->T01_tahunajaran_model->get_all();
        $listSekolah = $this->T00_sekolah_model->get_all();
        $listKelas = $this->T02_kelas_model->get_all();
        $listRincian = $this->T04_rincian_model->get_all();
        $listTagihan = $this->T03_tagihan_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t04_rincian/create_action'),
		    'idrincian' => set_value('idrincian'),
		    'tahun_ajaran' => set_value('tahun_ajaran'),
		    'sekolah' => set_value('sekolah'),
		    'kelas' => set_value('kelas'),
            'listTahunajaran' => $listTahunajaran,
            'listSekolah' => $listSekolah,
            'listKelas' => $listKelas,
            'listRincian' => $listRincian,
            'listTagihan' => $listTagihan,
		);
        // $this->load->view('t04_rincian/t04_rincian_form', $data);
        $data['_view'] = 't04_rincian/t04_rincian_form';
        $data['_caption'] = 'Rincian';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'tahun_ajaran' => $this->input->post('tahun_ajaran',TRUE),
				'sekolah' => $this->input->post('sekolah',TRUE),
				'kelas' => $this->input->post('kelas',TRUE),
	    	);
            $this->T04_rincian_model->insert($data);

            /**
             * ambil idrincian terbaru
             */
            $idrincian = $this->db->insert_id();

            /**
             * simpan detail rincian
             */
            $data = $this->input->post();
            foreach ($data['tagihan'] as $key => $item) {
                $detail = [
                    'rincian' => $idrincian,
                    'tagihan' => $item,
                    'nominal' => $data['nominal'][$key],
                ];
                $this->db->insert('t05_rinciandetail', $detail);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t04_rincian'));
        }
    }

    public function update($id)
    {
        $row = $this->T04_rincian_model->get_by_id($id);
        if ($row) {
            $listTahunajaran = $this->T01_tahunajaran_model->get_all();
            $listSekolah = $this->T00_sekolah_model->get_all();
            $listKelas = $this->T02_kelas_model->get_all();
            $listRincian = $this->T04_rincian_model->get_all();
            $listTagihan = $this->T03_tagihan_model->get_all();
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t04_rincian/update_action'),
				'idrincian' => set_value('idrincian', $row->idrincian),
				'tahun_ajaran' => set_value('tahun_ajaran', $row->tahun_ajaran),
				'sekolah' => set_value('sekolah', $row->sekolah),
				'kelas' => set_value('kelas', $row->kelas),
                'listTahunajaran' => $listTahunajaran,
                'listSekolah' => $listSekolah,
                'listKelas' => $listKelas,
                'listRincian' => $listRincian,
                'listTagihan' => $listTagihan,
	    	);

            /**
             * ambil data dari tabel detail
             */
            $data['detail'] =
                $this->db
                    ->select('*')
                    ->from('t05_rinciandetail')
                    ->where('rincian', $id)
                    ->get()->result()
                    ;

            // $this->load->view('t04_rincian/t04_rincian_form', $data);
            $data['_view'] = 't04_rincian/t04_rincian_form';
            $data['_caption'] = 'Rincian';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_rincian'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idrincian', TRUE));
        } else {
            $data = array(
				'tahun_ajaran' => $this->input->post('tahun_ajaran',TRUE),
				'sekolah' => $this->input->post('sekolah',TRUE),
				'kelas' => $this->input->post('kelas',TRUE),
	    	);
            $this->T04_rincian_model->update($this->input->post('idrincian', TRUE), $data);

            /**
             * simpan id data yang akan diupdate dari tabel master
             */
            $idrincian = $this->input->post('idrincian', TRUE);

            /**
             * hapus dulu data lama di tabel detail
             */
            $this->db->where('rincian', $idrincian);
			$this->db->delete('t05_rinciandetail');

            /**
             * simpan data di tabel detail
             */
            $totalJumlah = 0;
            $data = $this->input->post();
            foreach ($data['tagihan'] as $key => $item) {
  				$detail = [
  					'rincian' => $idrincian,
  					'tagihan' => $item,
                    'nominal' => $data['nominal'][$key],
                    ];
  				$this->db->insert('t05_rinciandetail', $detail);
  			}

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t04_rincian'));
        }
    }

    public function delete($id)
    {
        $row = $this->T04_rincian_model->get_by_id($id);
        if ($row) {
            $this->T04_rincian_model->delete($id);

            /**
             * hapus data di tabel detail
             */
            $this->db->where('rincian', $id);
     		$this->db->delete('t05_rinciandetail');

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t04_rincian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_rincian'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'trim|required');
		$this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('idrincian', 'idrincian', 'trim');
        $this->form_validation->set_rules('tagihan[]', 'Tagihan', 'trim|required');
        $this->form_validation->set_rules('nominal[]', 'Nominal', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T04_rincian.php */
/* Location: ./application/controllers/T04_rincian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-09 00:33:19 */
/* http://harviacode.com */
