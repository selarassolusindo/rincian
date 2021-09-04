<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T97_saldoawal_model extends CI_Model
{

    public $table = 't97_saldoawal';
    public $id = 'kode';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('sa.kode,nama,tahun,akun.urutan,saldo_awal_tahun,bulan_01,bulan_02,bulan_03,bulan_04,bulan_05,bulan_06,bulan_07,bulan_08,bulan_09,bulan_10,bulan_11,bulan_12');
        $this->datatables->from('t97_saldoawal sa');
		if (isset($_POST['kode']) && $_POST['kode'] != '') { $this->datatables->like('kode', $_POST['kode']); }
		if (isset($_POST['tahun']) && $_POST['tahun'] != '') { $this->datatables->like('tahun', $_POST['tahun']); }
		if (isset($_POST['saldo_awal_tahun']) && $_POST['saldo_awal_tahun'] != '') { $this->datatables->like('saldo_awal_tahun', $_POST['saldo_awal_tahun']); }
		if (isset($_POST['bulan_01']) && $_POST['bulan_01'] != '') { $this->datatables->like('bulan_01', $_POST['bulan_01']); }
		if (isset($_POST['bulan_02']) && $_POST['bulan_02'] != '') { $this->datatables->like('bulan_02', $_POST['bulan_02']); }
		if (isset($_POST['bulan_03']) && $_POST['bulan_03'] != '') { $this->datatables->like('bulan_03', $_POST['bulan_03']); }
		if (isset($_POST['bulan_04']) && $_POST['bulan_04'] != '') { $this->datatables->like('bulan_04', $_POST['bulan_04']); }
		if (isset($_POST['bulan_05']) && $_POST['bulan_05'] != '') { $this->datatables->like('bulan_05', $_POST['bulan_05']); }
		if (isset($_POST['bulan_06']) && $_POST['bulan_06'] != '') { $this->datatables->like('bulan_06', $_POST['bulan_06']); }
		if (isset($_POST['bulan_07']) && $_POST['bulan_07'] != '') { $this->datatables->like('bulan_07', $_POST['bulan_07']); }
		if (isset($_POST['bulan_08']) && $_POST['bulan_08'] != '') { $this->datatables->like('bulan_08', $_POST['bulan_08']); }
		if (isset($_POST['bulan_09']) && $_POST['bulan_09'] != '') { $this->datatables->like('bulan_09', $_POST['bulan_09']); }
		if (isset($_POST['bulan_10']) && $_POST['bulan_10'] != '') { $this->datatables->like('bulan_10', $_POST['bulan_10']); }
		if (isset($_POST['bulan_11']) && $_POST['bulan_11'] != '') { $this->datatables->like('bulan_11', $_POST['bulan_11']); }
		if (isset($_POST['bulan_12']) && $_POST['bulan_12'] != '') { $this->datatables->like('bulan_12', $_POST['bulan_12']); }
        //add this line for join
        //$this->datatables->join('table2', 't97_saldoawal.field = table2.field');
        $this->datatables->join('t98_akun akun', 'sa.kode = akun.kode');
        // $this->datatables->add_column('action', anchor(site_url('t97_saldoawal/update/$1'),'Ubah')." | ".anchor(site_url('t97_saldoawal/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"'), 'kode');
        $this->datatables->add_column('action', anchor(site_url('t97_saldoawal/update/$1'),'Ubah'), 'kode');
        // $action = "";
        // $hakAkses = $this->session->userdata('hakAkses'.substr($this->uri->segment(1), 4));
        // if ($hakAkses['ubah']) {
        //     $action = anchor(site_url('t97_saldoawal/update/$1'),'Ubah');
        //     if ($hakAkses['hapus']) {
        //         $action .= " | ";
        //     }
        // }
        // if ($hakAkses['hapus']) {
        //     $action .= anchor(site_url('t97_saldoawal/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"');
        // }
        // $this->datatables->add_column('action', $action, 'kode');
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
        $this->db->like('kode', $q);
		$this->db->or_like('tahun', $q);
		$this->db->or_like('saldo_awal_tahun', $q);
		$this->db->or_like('bulan_01', $q);
		$this->db->or_like('bulan_02', $q);
		$this->db->or_like('bulan_03', $q);
		$this->db->or_like('bulan_04', $q);
		$this->db->or_like('bulan_05', $q);
		$this->db->or_like('bulan_06', $q);
		$this->db->or_like('bulan_07', $q);
		$this->db->or_like('bulan_08', $q);
		$this->db->or_like('bulan_09', $q);
		$this->db->or_like('bulan_10', $q);
		$this->db->or_like('bulan_11', $q);
		$this->db->or_like('bulan_12', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kode', $q);
		$this->db->or_like('tahun', $q);
		$this->db->or_like('saldo_awal_tahun', $q);
		$this->db->or_like('bulan_01', $q);
		$this->db->or_like('bulan_02', $q);
		$this->db->or_like('bulan_03', $q);
		$this->db->or_like('bulan_04', $q);
		$this->db->or_like('bulan_05', $q);
		$this->db->or_like('bulan_06', $q);
		$this->db->or_like('bulan_07', $q);
		$this->db->or_like('bulan_08', $q);
		$this->db->or_like('bulan_09', $q);
		$this->db->or_like('bulan_10', $q);
		$this->db->or_like('bulan_11', $q);
		$this->db->or_like('bulan_12', $q);
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

}

/* End of file T97_saldoawal_model.php */
/* Location: ./application/models/T97_saldoawal_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-22 12:17:48 */
/* http://harviacode.com */
