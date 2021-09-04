<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T00_sekolah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T00_sekolah_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('t89_users_menus/T89_users_menus_model');
    }

    public function index()
    {
        // $this->load->view('t00_sekolah/t00_sekolah_list');
        $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't00_sekolah/t00_sekolah_list';
        $data['_caption'] = 'Sekolah';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T00_sekolah_model->json();
    }

    public function read($id)
    {
        $row = $this->T00_sekolah_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idsekolah' => $row->idsekolah,
				'kode' => $row->kode,
				'nama' => $row->nama,
				'alamat' => $row->alamat,
				'nomor_telepon' => $row->nomor_telepon,
				'logo' => $row->logo,
	    	);
            $this->load->view('t00_sekolah/t00_sekolah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_sekolah'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t00_sekolah/create_action'),
		    'idsekolah' => set_value('idsekolah'),
		    'kode' => set_value('kode'),
		    'nama' => set_value('nama'),
		    'alamat' => set_value('alamat'),
		    'nomor_telepon' => set_value('nomor_telepon'),
		    'logo' => set_value('logo'),
		);
        // $this->load->view('t00_sekolah/t00_sekolah_form', $data);
        $data['_view'] = 't00_sekolah/t00_sekolah_form';
        $data['_caption'] = 'Sekolah';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kode' => $this->input->post('kode',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
				'logo' => $this->input->post('logo',TRUE),
	    	);
            $this->T00_sekolah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t00_sekolah'));
        }
    }

    public function update($id)
    {
        $row = $this->T00_sekolah_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t00_sekolah/update_action'),
				'idsekolah' => set_value('idsekolah', $row->idsekolah),
				'kode' => set_value('kode', $row->kode),
				'nama' => set_value('nama', $row->nama),
				'alamat' => set_value('alamat', $row->alamat),
				'nomor_telepon' => set_value('nomor_telepon', $row->nomor_telepon),
				'logo' => set_value('logo', $row->logo),
	    	);
            // $this->load->view('t00_sekolah/t00_sekolah_form', $data);
            $data['_view'] = 't00_sekolah/t00_sekolah_form';
            $data['_caption'] = 'Sekolah';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_sekolah'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idsekolah', TRUE));
        } else {
            $data = array(
				'kode' => $this->input->post('kode',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'nomor_telepon' => $this->input->post('nomor_telepon',TRUE),
				'logo' => $this->input->post('logo',TRUE),
	    	);
            $this->T00_sekolah_model->update($this->input->post('idsekolah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t00_sekolah'));
        }
    }

    public function delete($id)
    {
        $row = $this->T00_sekolah_model->get_by_id($id);
        if ($row) {
            $this->T00_sekolah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t00_sekolah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_sekolah'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		// $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		// $this->form_validation->set_rules('nomor_telepon', 'nomor telepon', 'trim|required');
		// $this->form_validation->set_rules('logo', 'logo', 'trim|required');
		$this->form_validation->set_rules('idsekolah', 'idsekolah', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T00_sekolah.php */
/* Location: ./application/controllers/T00_sekolah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-08 11:20:59 */
/* http://harviacode.com */
