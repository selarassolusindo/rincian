<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T97_saldoawal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T97_saldoawal_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('t89_users_menus/T89_users_menus_model');
    }

    public function index()
    {
        // $this->load->view('t97_saldoawal/t97_saldoawal_list');
        // $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        // $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't97_saldoawal/t97_saldoawal_list';
        $data['_caption'] = 'Saldoawal';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T97_saldoawal_model->json();
    }

    public function read($id)
    {
        $row = $this->T97_saldoawal_model->get_by_id($id);
        if ($row) {
            $data = array(
				'kode' => $row->kode,
				'tahun' => $row->tahun,
				'saldo_awal_tahun' => $row->saldo_awal_tahun,
				'bulan_01' => $row->bulan_01,
				'bulan_02' => $row->bulan_02,
				'bulan_03' => $row->bulan_03,
				'bulan_04' => $row->bulan_04,
				'bulan_05' => $row->bulan_05,
				'bulan_06' => $row->bulan_06,
				'bulan_07' => $row->bulan_07,
				'bulan_08' => $row->bulan_08,
				'bulan_09' => $row->bulan_09,
				'bulan_10' => $row->bulan_10,
				'bulan_11' => $row->bulan_11,
				'bulan_12' => $row->bulan_12,
	    	);
            $this->load->view('t97_saldoawal/t97_saldoawal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t97_saldoawal'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t97_saldoawal/create_action'),
		    'kode' => set_value('kode'),
		    'tahun' => set_value('tahun'),
		    'saldo_awal_tahun' => set_value('saldo_awal_tahun'),
		    'bulan_01' => set_value('bulan_01'),
		    'bulan_02' => set_value('bulan_02'),
		    'bulan_03' => set_value('bulan_03'),
		    'bulan_04' => set_value('bulan_04'),
		    'bulan_05' => set_value('bulan_05'),
		    'bulan_06' => set_value('bulan_06'),
		    'bulan_07' => set_value('bulan_07'),
		    'bulan_08' => set_value('bulan_08'),
		    'bulan_09' => set_value('bulan_09'),
		    'bulan_10' => set_value('bulan_10'),
		    'bulan_11' => set_value('bulan_11'),
		    'bulan_12' => set_value('bulan_12'),
		);
        // $this->load->view('t97_saldoawal/t97_saldoawal_form', $data);
        $data['_view'] = 't97_saldoawal/t97_saldoawal_form';
        $data['_caption'] = 'Saldoawal';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'tahun' => $this->input->post('tahun',TRUE),
				'saldo_awal_tahun' => $this->input->post('saldo_awal_tahun',TRUE),
				'bulan_01' => $this->input->post('bulan_01',TRUE),
				'bulan_02' => $this->input->post('bulan_02',TRUE),
				'bulan_03' => $this->input->post('bulan_03',TRUE),
				'bulan_04' => $this->input->post('bulan_04',TRUE),
				'bulan_05' => $this->input->post('bulan_05',TRUE),
				'bulan_06' => $this->input->post('bulan_06',TRUE),
				'bulan_07' => $this->input->post('bulan_07',TRUE),
				'bulan_08' => $this->input->post('bulan_08',TRUE),
				'bulan_09' => $this->input->post('bulan_09',TRUE),
				'bulan_10' => $this->input->post('bulan_10',TRUE),
				'bulan_11' => $this->input->post('bulan_11',TRUE),
				'bulan_12' => $this->input->post('bulan_12',TRUE),
	    	);
            $this->T97_saldoawal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t97_saldoawal'));
        }
    }

    public function update($id)
    {
        $row = $this->T97_saldoawal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t97_saldoawal/update_action'),
				'kode' => set_value('kode', $row->kode),
				'tahun' => set_value('tahun', $row->tahun),
				'saldo_awal_tahun' => set_value('saldo_awal_tahun', $row->saldo_awal_tahun),
				'bulan_01' => set_value('bulan_01', $row->bulan_01),
				'bulan_02' => set_value('bulan_02', $row->bulan_02),
				'bulan_03' => set_value('bulan_03', $row->bulan_03),
				'bulan_04' => set_value('bulan_04', $row->bulan_04),
				'bulan_05' => set_value('bulan_05', $row->bulan_05),
				'bulan_06' => set_value('bulan_06', $row->bulan_06),
				'bulan_07' => set_value('bulan_07', $row->bulan_07),
				'bulan_08' => set_value('bulan_08', $row->bulan_08),
				'bulan_09' => set_value('bulan_09', $row->bulan_09),
				'bulan_10' => set_value('bulan_10', $row->bulan_10),
				'bulan_11' => set_value('bulan_11', $row->bulan_11),
				'bulan_12' => set_value('bulan_12', $row->bulan_12),
	    	);
            // $this->load->view('t97_saldoawal/t97_saldoawal_form', $data);
            $data['_view'] = 't97_saldoawal/t97_saldoawal_form';
            $data['_caption'] = 'Saldoawal';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t97_saldoawal'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode', TRUE));
        } else {
            $data = array(
				'tahun' => $this->input->post('tahun',TRUE),
				'saldo_awal_tahun' => $this->input->post('saldo_awal_tahun',TRUE),
				'bulan_01' => $this->input->post('bulan_01',TRUE),
				'bulan_02' => $this->input->post('bulan_02',TRUE),
				'bulan_03' => $this->input->post('bulan_03',TRUE),
				'bulan_04' => $this->input->post('bulan_04',TRUE),
				'bulan_05' => $this->input->post('bulan_05',TRUE),
				'bulan_06' => $this->input->post('bulan_06',TRUE),
				'bulan_07' => $this->input->post('bulan_07',TRUE),
				'bulan_08' => $this->input->post('bulan_08',TRUE),
				'bulan_09' => $this->input->post('bulan_09',TRUE),
				'bulan_10' => $this->input->post('bulan_10',TRUE),
				'bulan_11' => $this->input->post('bulan_11',TRUE),
				'bulan_12' => $this->input->post('bulan_12',TRUE),
	    	);
            $this->T97_saldoawal_model->update($this->input->post('kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t97_saldoawal'));
        }
    }

    public function delete($id)
    {
        $row = $this->T97_saldoawal_model->get_by_id($id);
        if ($row) {
            $this->T97_saldoawal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t97_saldoawal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t97_saldoawal'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('saldo_awal_tahun', 'saldo awal tahun', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_01', 'bulan 01', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_02', 'bulan 02', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_03', 'bulan 03', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_04', 'bulan 04', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_05', 'bulan 05', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_06', 'bulan 06', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_07', 'bulan 07', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_08', 'bulan 08', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_09', 'bulan 09', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_10', 'bulan 10', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_11', 'bulan 11', 'trim|required|numeric');
		$this->form_validation->set_rules('bulan_12', 'bulan 12', 'trim|required|numeric');
		$this->form_validation->set_rules('kode', 'kode', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T97_saldoawal.php */
/* Location: ./application/controllers/T97_saldoawal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-22 12:17:48 */
/* http://harviacode.com */
