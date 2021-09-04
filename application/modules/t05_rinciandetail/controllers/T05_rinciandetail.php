<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T05_rinciandetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T05_rinciandetail_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');        
		$this->load->model('t89_users_menus/T89_users_menus_model');
    }

    public function index()
    {
        // $this->load->view('t05_rinciandetail/t05_rinciandetail_list');
        $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't05_rinciandetail/t05_rinciandetail_list';
        $data['_caption'] = 'Rinciandetail';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T05_rinciandetail_model->json();
    }

    public function read($id)
    {
        $row = $this->T05_rinciandetail_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idrinciandetail' => $row->idrinciandetail,
				'rincian' => $row->rincian,
				'tagihan' => $row->tagihan,
				'nominal' => $row->nominal,
	    	);
            $this->load->view('t05_rinciandetail/t05_rinciandetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_rinciandetail'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t05_rinciandetail/create_action'),
		    'idrinciandetail' => set_value('idrinciandetail'),
		    'rincian' => set_value('rincian'),
		    'tagihan' => set_value('tagihan'),
		    'nominal' => set_value('nominal'),
		);
        // $this->load->view('t05_rinciandetail/t05_rinciandetail_form', $data);
        $data['_view'] = 't05_rinciandetail/t05_rinciandetail_form';
        $data['_caption'] = 'Rinciandetail';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'rincian' => $this->input->post('rincian',TRUE),
				'tagihan' => $this->input->post('tagihan',TRUE),
				'nominal' => $this->input->post('nominal',TRUE),
	    	);
            $this->T05_rinciandetail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t05_rinciandetail'));
        }
    }

    public function update($id)
    {
        $row = $this->T05_rinciandetail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t05_rinciandetail/update_action'),
				'idrinciandetail' => set_value('idrinciandetail', $row->idrinciandetail),
				'rincian' => set_value('rincian', $row->rincian),
				'tagihan' => set_value('tagihan', $row->tagihan),
				'nominal' => set_value('nominal', $row->nominal),
	    	);
            // $this->load->view('t05_rinciandetail/t05_rinciandetail_form', $data);
            $data['_view'] = 't05_rinciandetail/t05_rinciandetail_form';
            $data['_caption'] = 'Rinciandetail';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_rinciandetail'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idrinciandetail', TRUE));
        } else {
            $data = array(
				'rincian' => $this->input->post('rincian',TRUE),
				'tagihan' => $this->input->post('tagihan',TRUE),
				'nominal' => $this->input->post('nominal',TRUE),
	    	);
            $this->T05_rinciandetail_model->update($this->input->post('idrinciandetail', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t05_rinciandetail'));
        }
    }

    public function delete($id)
    {
        $row = $this->T05_rinciandetail_model->get_by_id($id);
        if ($row) {
            $this->T05_rinciandetail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t05_rinciandetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_rinciandetail'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('rincian', 'rincian', 'trim|required');
		$this->form_validation->set_rules('tagihan', 'tagihan', 'trim|required');
		$this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
		$this->form_validation->set_rules('idrinciandetail', 'idrinciandetail', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T05_rinciandetail.php */
/* Location: ./application/controllers/T05_rinciandetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-09 00:33:28 */
/* http://harviacode.com */