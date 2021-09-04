<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T02_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T02_kelas_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('t89_users_menus/T89_users_menus_model');
        $this->load->model('t00_sekolah/T00_sekolah_model');
    }

    public function index()
    {
        // $this->load->view('t02_kelas/t02_kelas_list');
        $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't02_kelas/t02_kelas_list';
        $data['_caption'] = 'Kelas';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T02_kelas_model->json();
    }

    public function read($id)
    {
        $row = $this->T02_kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idkelas' => $row->idkelas,
				'sekolah' => $row->sekolah,
				'kelas' => $row->kelas,
				'sub_kelas' => $row->sub_kelas,
	    	);
            $this->load->view('t02_kelas/t02_kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_kelas'));
        }
    }

    public function create()
    {
        $listSekolah = $this->T00_sekolah_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t02_kelas/create_action'),
		    'idkelas' => set_value('idkelas'),
		    'sekolah' => set_value('sekolah'),
		    'kelas' => set_value('kelas'),
		    'sub_kelas' => set_value('sub_kelas'),
            'listSekolah' => $listSekolah,
		);
        // $this->load->view('t02_kelas/t02_kelas_form', $data);
        $data['_view'] = 't02_kelas/t02_kelas_form';
        $data['_caption'] = 'Kelas';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'sekolah' => $this->input->post('sekolah',TRUE),
				'kelas' => $this->input->post('kelas',TRUE),
				'sub_kelas' => $this->input->post('sub_kelas',TRUE),
	    	);
            $this->T02_kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t02_kelas'));
        }
    }

    public function update($id)
    {
        $row = $this->T02_kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t02_kelas/update_action'),
				'idkelas' => set_value('idkelas', $row->idkelas),
				'sekolah' => set_value('sekolah', $row->sekolah),
				'kelas' => set_value('kelas', $row->kelas),
				'sub_kelas' => set_value('sub_kelas', $row->sub_kelas),
	    	);
            // $this->load->view('t02_kelas/t02_kelas_form', $data);
            $data['_view'] = 't02_kelas/t02_kelas_form';
            $data['_caption'] = 'Kelas';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_kelas'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkelas', TRUE));
        } else {
            $data = array(
				'sekolah' => $this->input->post('sekolah',TRUE),
				'kelas' => $this->input->post('kelas',TRUE),
				'sub_kelas' => $this->input->post('sub_kelas',TRUE),
	    	);
            $this->T02_kelas_model->update($this->input->post('idkelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t02_kelas'));
        }
    }

    public function delete($id)
    {
        $row = $this->T02_kelas_model->get_by_id($id);
        if ($row) {
            $this->T02_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t02_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_kelas'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('sekolah', 'sekolah', 'trim|required');
		$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
		$this->form_validation->set_rules('sub_kelas', 'sub kelas', 'trim|required');
		$this->form_validation->set_rules('idkelas', 'idkelas', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T02_kelas.php */
/* Location: ./application/controllers/T02_kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-08 23:23:44 */
/* http://harviacode.com */
