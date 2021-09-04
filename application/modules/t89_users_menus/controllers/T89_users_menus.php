<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T89_users_menus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T89_users_menus_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function index()
    {
        // $this->load->view('t89_users_menus/t89_users_menus_list');
        $data['_view'] = 't89_users_menus/t89_users_menus_list';
        $data['_caption'] = 'Users_menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T89_users_menus_model->json();
    }

    public function read($id)
    {
        $row = $this->T89_users_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idusersmenus' => $row->idusersmenus,
				'idusers' => $row->idusers,
				'idmenus' => $row->idmenus,
				'rights' => $row->rights,
	    	);
            $this->load->view('t89_users_menus/t89_users_menus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t89_users_menus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t89_users_menus/create_action'),
		    'idusersmenus' => set_value('idusersmenus'),
		    'idusers' => set_value('idusers'),
		    'idmenus' => set_value('idmenus'),
		    'rights' => set_value('rights'),
		);
        // $this->load->view('t89_users_menus/t89_users_menus_form', $data);
        $data['_view'] = 't89_users_menus/t89_users_menus_form';
        $data['_caption'] = 'Users_menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idusers' => $this->input->post('idusers',TRUE),
				'idmenus' => $this->input->post('idmenus',TRUE),
				'rights' => $this->input->post('rights',TRUE),
	    	);
            $this->T89_users_menus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t89_users_menus'));
        }
    }

    public function update($id)
    {
        $row = $this->T89_users_menus_model->get_by_id($id);
        $dataUsers = $this->T89_users_menus_model->getAllByIdUsers($id);

        if ($dataUsers) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t89_users_menus/update_action'),
				// 'idusersmenus' => set_value('idusersmenus', $row->idusersmenus),
				// 'idusers' => set_value('idusers', $row->idusers),
				// 'idmenus' => set_value('idmenus', $row->idmenus),
				// 'rights' => set_value('rights', $row->rights),
                'dataUsers' => $dataUsers,
	    	);
            // $this->load->view('t89_users_menus/t89_users_menus_form', $data);
            $data['_view'] = 't89_users_menus/t89_users_menus_form';
            $data['_caption'] = 'User - Hak Akses';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t89_users_menus'));
        }
    }

    public function update_ori($id)
    {
        $row = $this->T89_users_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t89_users_menus/update_action'),
				'idusersmenus' => set_value('idusersmenus', $row->idusersmenus),
				'idusers' => set_value('idusers', $row->idusers),
				'idmenus' => set_value('idmenus', $row->idmenus),
				'rights' => set_value('rights', $row->rights),
	    	);
            // $this->load->view('t89_users_menus/t89_users_menus_form', $data);
            $data['_view'] = 't89_users_menus/t89_users_menus_form';
            $data['_caption'] = 'Users_menus';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t89_users_menus'));
        }
    }

    public function update_action()
    {
        $data = $this->input->post();
        foreach($data['idusersmenus'] as $key => $value) {
            $idusersmenus = $value;
            $rights =
                $this->input->post('_1_'.$value, true)
                + $this->input->post('_2_'.$value, true)
                + $this->input->post('_4_'.$value, true);
            $detail = array(
                'rights' => $rights,
            );
            $this->T89_users_menus_model->update($value, $detail);
        }
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('auth'));
    }

    public function update_action_ori()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idusersmenus', TRUE));
        } else {
            $data = array(
				'idusers' => $this->input->post('idusers',TRUE),
				'idmenus' => $this->input->post('idmenus',TRUE),
				'rights' => $this->input->post('rights',TRUE),
	    	);
            $this->T89_users_menus_model->update($this->input->post('idusersmenus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t89_users_menus'));
        }
    }

    public function delete($id)
    {
        $row = $this->T89_users_menus_model->get_by_id($id);
        if ($row) {
            $this->T89_users_menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t89_users_menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t89_users_menus'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
		$this->form_validation->set_rules('idmenus', 'idmenus', 'trim|required');
		$this->form_validation->set_rules('rights', 'rights', 'trim|required');
		$this->form_validation->set_rules('idusersmenus', 'idusersmenus', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T89_users_menus.php */
/* Location: ./application/controllers/T89_users_menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-13 08:51:43 */
/* http://harviacode.com */
