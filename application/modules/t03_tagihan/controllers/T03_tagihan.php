<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T03_tagihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T03_tagihan_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');        
		$this->load->model('t89_users_menus/T89_users_menus_model');
    }

    public function index()
    {
        // $this->load->view('t03_tagihan/t03_tagihan_list');
        $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't03_tagihan/t03_tagihan_list';
        $data['_caption'] = 'Tagihan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T03_tagihan_model->json();
    }

    public function read($id)
    {
        $row = $this->T03_tagihan_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idtagihan' => $row->idtagihan,
				'nama' => $row->nama,
	    	);
            $this->load->view('t03_tagihan/t03_tagihan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_tagihan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t03_tagihan/create_action'),
		    'idtagihan' => set_value('idtagihan'),
		    'nama' => set_value('nama'),
		);
        // $this->load->view('t03_tagihan/t03_tagihan_form', $data);
        $data['_view'] = 't03_tagihan/t03_tagihan_form';
        $data['_caption'] = 'Tagihan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nama' => $this->input->post('nama',TRUE),
	    	);
            $this->T03_tagihan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t03_tagihan'));
        }
    }

    public function update($id)
    {
        $row = $this->T03_tagihan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t03_tagihan/update_action'),
				'idtagihan' => set_value('idtagihan', $row->idtagihan),
				'nama' => set_value('nama', $row->nama),
	    	);
            // $this->load->view('t03_tagihan/t03_tagihan_form', $data);
            $data['_view'] = 't03_tagihan/t03_tagihan_form';
            $data['_caption'] = 'Tagihan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_tagihan'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtagihan', TRUE));
        } else {
            $data = array(
				'nama' => $this->input->post('nama',TRUE),
	    	);
            $this->T03_tagihan_model->update($this->input->post('idtagihan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t03_tagihan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T03_tagihan_model->get_by_id($id);
        if ($row) {
            $this->T03_tagihan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t03_tagihan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_tagihan'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('idtagihan', 'idtagihan', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T03_tagihan.php */
/* Location: ./application/controllers/T03_tagihan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-09 00:06:57 */
/* http://harviacode.com */