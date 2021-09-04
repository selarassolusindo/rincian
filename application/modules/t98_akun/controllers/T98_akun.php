<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T98_akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T98_akun_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('t89_users_menus/T89_users_menus_model');
        $this->load->model('t97_saldoawal/T97_saldoawal_model');
    }

    public function index()
    {
        // $this->load->view('t98_akun/t98_akun_list');
        // $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        // $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't98_akun/t98_akun_list';
        $data['_caption'] = 'Akun';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T98_akun_model->json();
    }

    public function read($id)
    {
        $row = $this->T98_akun_model->get_by_id($id);
        if ($row) {
            $data = array(
				'kode' => $row->kode,
				'nama' => $row->nama,
				'induk' => $row->induk,
				'urutan' => $row->urutan,
	    	);
            $this->load->view('t98_akun/t98_akun_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t98_akun'));
        }
    }

    public function create($induk)
    {
        // siapkan kode baru berdasarkan kode induk
        $kode = $this->T98_akun_model->getNewKode($induk);
        if ($kode) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t98_akun/create_action'),
    		    'kode' => set_value('kode', $kode),
    		    'nama' => set_value('nama'),
    		    'induk' => set_value('induk', $induk),
    		    'urutan' => set_value('urutan'),
    		);
            // $this->load->view('t98_akun/t98_akun_form', $data);
            $data['_view'] = 't98_akun/t98_akun_form';
            $data['_caption'] = 'Akun';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Data salah, tidak dapat menambah data');
            redirect(site_url('t98_akun'));
        }
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('induk',TRUE));
        } else {
            $data = array(
                'kode' => $this->input->post('kode',TRUE),
				'nama' => $this->input->post('nama',TRUE),
				'induk' => $this->input->post('induk',TRUE),
				// 'urutan' => $this->input->post('urutan',TRUE),
                'urutan' => substr($this->input->post('kode',TRUE) . '0000000000000', 0, 13),
	    	);
            $this->T98_akun_model->insert($data);

            // insert into tabel saldo awal
            $data = array(
                'kode' => $this->input->post('kode', true),
                'tahun' => date('Y'),
            );
            $this->T97_saldoawal_model->insert($data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t98_akun'));
        }
    }

    public function update($id)
    {
        $row = $this->T98_akun_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t98_akun/update_action'),
				'kode' => set_value('kode', $row->kode),
				'nama' => set_value('nama', $row->nama),
				'induk' => set_value('induk', $row->induk),
				'urutan' => set_value('urutan', $row->urutan),
	    	);
            // $this->load->view('t98_akun/t98_akun_form', $data);
            $data['_view'] = 't98_akun/t98_akun_form';
            $data['_caption'] = 'Akun';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t98_akun'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode', TRUE));
        } else {
            $data = array(
				'nama' => $this->input->post('nama',TRUE),
				'induk' => $this->input->post('induk',TRUE),
				'urutan' => $this->input->post('urutan',TRUE),
	    	);
            $this->T98_akun_model->update($this->input->post('kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t98_akun'));
        }
    }

    public function delete($id)
    {
        $row = $this->T98_akun_model->get_by_id($id);
        if ($row) {
            $this->T98_akun_model->delete($id);

            // hapus data saldo awal di tabel saldo awal
            $this->T97_saldoawal_model->delete($id);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t98_akun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t98_akun'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('induk', 'induk', 'trim|required');
		// $this->form_validation->set_rules('urutan', 'urutan', 'trim|required');
		$this->form_validation->set_rules('kode', 'kode', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T98_akun.php */
/* Location: ./application/controllers/T98_akun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-20 20:43:29 */
/* http://harviacode.com */
