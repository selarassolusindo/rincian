<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T88_menus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T88_menus_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
        $this->load->model('t90_users/T90_users_model');
        $this->load->model('t89_users_menus/T89_users_menus_model');
    }

    public function index()
    {
        // $this->load->view('t88_menus/t88_menus_list');
        $data['_view'] = 't88_menus/t88_menus_list';
        $data['_caption'] = 'Menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T88_menus_model->json();
    }

    public function read($id)
    {
        $row = $this->T88_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idmenus' => $row->idmenus,
				'menus' => $row->menus,
				'kode' => $row->kode,
	    	);
            $this->load->view('t88_menus/t88_menus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t88_menus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t88_menus/create_action'),
		    'idmenus' => set_value('idmenus'),
		    'menus' => set_value('menus'),
		    'kode' => set_value('kode'),
		);
        // $this->load->view('t88_menus/t88_menus_form', $data);
        $data['_view'] = 't88_menus/t88_menus_form';
        $data['_caption'] = 'Menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            // simpan ke master menu
            $data = array(
				'menus' => $this->input->post('menus',TRUE),
				'kode' => $this->input->post('kode',TRUE),
	    	);
            $this->T88_menus_model->insert($data);

            /**
             * ambil idmenus terbaru setelah insert data di tabel menus
             */
            $idmenus = $this->db->insert_id();

            /**
             * collect data users
             */
            $dataUsers = $this->T90_users_model->get_all();

            // simpan data ke tabel t89_users_menus (modul hak akses)
            foreach($dataUsers as $dUsers) {
                $data = array(
                    'idusers' => $dUsers->id,
                    'idmenus' => $idmenus,
                    'rights' => 7,
                );
                $this->T89_users_menus_model->insert($data);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t88_menus'));
        }
    }

    public function update($id)
    {
        $row = $this->T88_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t88_menus/update_action'),
				'idmenus' => set_value('idmenus', $row->idmenus),
				'menus' => set_value('menus', $row->menus),
				'kode' => set_value('kode', $row->kode),
	    	);
            // $this->load->view('t88_menus/t88_menus_form', $data);
            $data['_view'] = 't88_menus/t88_menus_form';
            $data['_caption'] = 'Menus';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t88_menus'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idmenus', TRUE));
        } else {
            $data = array(
				'menus' => $this->input->post('menus',TRUE),
				'kode' => $this->input->post('kode',TRUE),
	    	);
            $this->T88_menus_model->update($this->input->post('idmenus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t88_menus'));
        }
    }

    public function delete($id)
    {
        $row = $this->T88_menus_model->get_by_id($id);
        if ($row) {
            $this->T88_menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t88_menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t88_menus'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('menus', 'menus', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim|required');
		$this->form_validation->set_rules('idmenus', 'idmenus', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T88_menus.php */
/* Location: ./application/controllers/T88_menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-13 11:16:36 */
/* http://harviacode.com */
