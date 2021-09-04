<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T89_users_menus_model extends CI_Model
{

    public $table = 't89_users_menus';
    public $id = 'idusersmenus';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->model('t88_menus/T88_menus_model');
    }

    // datatables
    function json() {
        $this->datatables->select('idusersmenus,idusers,idmenus,rights');
        $this->datatables->from('t89_users_menus');
		if (isset($_POST['idusersmenus']) && $_POST['idusersmenus'] != '') { $this->datatables->like('idusersmenus', $_POST['idusersmenus']); }
		if (isset($_POST['idusers']) && $_POST['idusers'] != '') { $this->datatables->like('idusers', $_POST['idusers']); }
		if (isset($_POST['idmenus']) && $_POST['idmenus'] != '') { $this->datatables->like('idmenus', $_POST['idmenus']); }
		if (isset($_POST['rights']) && $_POST['rights'] != '') { $this->datatables->like('rights', $_POST['rights']); }
        //add this line for join
        //$this->datatables->join('table2', 't89_users_menus.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t89_users_menus/update/$1'),'Ubah')." | ".anchor(site_url('t89_users_menus/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"'), 'idusersmenus');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('idusersmenus', $q);
		$this->db->or_like('idusers', $q);
		$this->db->or_like('idmenus', $q);
		$this->db->or_like('rights', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idusersmenus', $q);
		$this->db->or_like('idusers', $q);
		$this->db->or_like('idmenus', $q);
		$this->db->or_like('rights', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // get all where idusers = $id
    function getAllByIdUsers($id)
    {
        $this->db->order_by('idmenus', 'asc');
        $this->db->where('idusers', $id);
        $this->db->select($this->table.'.*');
        $this->db->select('users.first_name, users.username');
        $this->db->select('menus.Menus');
        $this->db->from($this->table);
        $this->db->join('t90_users users', 'users.id = ' . $this->table . '.idusers');
        $this->db->join('t88_menus menus', 'menus.idmenus = ' . $this->table . '.idmenus');
        return $this->db->get()->result();
    }

    /**
     * get hak akses berdasarkan idusers = user_id dan idmenus
     */
    function getHakAkses($modulName) {
        $idMenus = $this->T88_menus_model->getByModulName($modulName)->idmenus;
        // echo pre($idMenus); exit;
        $this->db->where('idusers', $this->session->userdata('user_id'));
        $this->db->where('idmenus', $idMenus);
        $row = $this->db->get($this->table)->row();
        $hakAkses = array('tambah' => false, 'ubah' => false, 'hapus' => false);
        if ($row) {
            switch ($row->rights) {
                case 1:
                    $hakAkses = array('tambah' => true, 'ubah' => false, 'hapus' => false);
                    break;
                case 2:
                    $hakAkses = array('tambah' => false, 'ubah' => true, 'hapus' => false);
                    break;
                case 3:
                    $hakAkses = array('tambah' => true, 'ubah' => true, 'hapus' => false);
                    break;
                case 4:
                    $hakAkses = array('tambah' => false, 'ubah' => false, 'hapus' => true);
                    break;
                case 5:
                    $hakAkses = array('tambah' => true, 'ubah' => false, 'hapus' => true);
                    break;
                case 6:
                    $hakAkses = array('tambah' => false, 'ubah' => true, 'hapus' => true);
                    break;
                case 7:
                    $hakAkses = array('tambah' => true, 'ubah' => true, 'hapus' => true);
                    break;
            }
        }
        return $hakAkses;
    }

}

/* End of file T89_users_menus_model.php */
/* Location: ./application/models/T89_users_menus_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-13 08:51:43 */
/* http://harviacode.com */
