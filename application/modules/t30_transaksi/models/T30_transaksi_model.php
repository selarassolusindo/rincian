<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T30_transaksi_model extends CI_Model
{

    public $table = 't30_transaksi';
    public $id = 'idtr';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // insert data with double check
    function insertWithCheck($data)
    {
        $this->db->where('tgl_buat', $data['tgl_buat']);
        $this->db->where('tgl_jt', $data['tgl_jt']);
        $this->db->where('nama', $data['nama']);
        $this->db->where('no_reg', $data['no_reg']);
        $this->db->where('kelas', $data['kelas']);
        $this->db->where('sub_kelas', $data['sub_kelas']);
        $this->db->where('jns_tgh', $data['jns_tgh']);
        $this->db->where('jumlah', $data['jumlah']);
        $this->db->where('status', $data['status']);
        $this->db->where('sekolah', $data['sekolah']);
        $this->db->where('tahun_ajaran', $data['tahun_ajaran']);

        if (!$this->db->get($this->table)->result())
            $this->db->insert($this->table, $data);
    }

    // datatables
    function json() {
        $this->datatables->select('idtr,no_urut,tgl_buat,tgl_jt,nama,no_reg,kelas,sub_kelas,jns_tgh,jumlah,status,sekolah,tahun_ajaran');
        $this->datatables->from('t30_transaksi');
		if (isset($_POST['idtr']) && $_POST['idtr'] != '') { $this->datatables->like('idtr', $_POST['idtr']); }
		if (isset($_POST['no_urut']) && $_POST['no_urut'] != '') { $this->datatables->like('no_urut', $_POST['no_urut']); }
		if (isset($_POST['tgl_buat']) && $_POST['tgl_buat'] != '') { $this->datatables->like('tgl_buat', $_POST['tgl_buat']); }
		if (isset($_POST['tgl_jt']) && $_POST['tgl_jt'] != '') { $this->datatables->like('tgl_jt', $_POST['tgl_jt']); }
		if (isset($_POST['nama']) && $_POST['nama'] != '') { $this->datatables->like('nama', $_POST['nama']); }
		if (isset($_POST['no_reg']) && $_POST['no_reg'] != '') { $this->datatables->like('no_reg', $_POST['no_reg']); }
		if (isset($_POST['kelas']) && $_POST['kelas'] != '') { $this->datatables->like('kelas', $_POST['kelas']); }
		if (isset($_POST['sub_kelas']) && $_POST['sub_kelas'] != '') { $this->datatables->like('sub_kelas', $_POST['sub_kelas']); }
		if (isset($_POST['jns_tgh']) && $_POST['jns_tgh'] != '') { $this->datatables->like('jns_tgh', $_POST['jns_tgh']); }
		if (isset($_POST['jumlah']) && $_POST['jumlah'] != '') { $this->datatables->like('jumlah', $_POST['jumlah']); }
		if (isset($_POST['status']) && $_POST['status'] != '') { $this->datatables->like('status', $_POST['status']); }
        if (isset($_POST['sekolah']) && $_POST['sekolah'] != '') { $this->datatables->like('sekolah', $_POST['sekolah']); }
        if (isset($_POST['tahun_ajaran']) && $_POST['tahun_ajaran'] != '') { $this->datatables->like('tahun_ajaran', $_POST['tahun_ajaran']); }
        //add this line for join
        //$this->datatables->join('table2', 't30_transaksi.field = table2.field');
        //$this->datatables->add_column('action', anchor(site_url('t30_transaksi/update/$1'),'Ubah')." | ".anchor(site_url('t30_transaksi/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"'), 'idtr');
        $action = "";
        $hakAkses = $this->session->userdata('hakAkses'.substr($this->uri->segment(1), 4));
        if ($hakAkses['ubah']) {
            $action = anchor(site_url('t30_transaksi/update/$1'),'Ubah');
            if ($hakAkses['hapus']) {
                $action .= " | ";
            }
        }
        if ($hakAkses['hapus']) {
            $action .= anchor(site_url('t30_transaksi/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"');
        }
        $this->datatables->add_column('action', $action, 'idtr');
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
        $this->db->like('idtr', $q);
		$this->db->or_like('no_urut', $q);
		$this->db->or_like('tgl_buat', $q);
		$this->db->or_like('tgl_jt', $q);
		$this->db->or_like('nama', $q);
		$this->db->or_like('no_reg', $q);
		$this->db->or_like('kelas', $q);
		$this->db->or_like('sub_kelas', $q);
		$this->db->or_like('jns_tgh', $q);
		$this->db->or_like('jumlah', $q);
		$this->db->or_like('status', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idtr', $q);
		$this->db->or_like('no_urut', $q);
		$this->db->or_like('tgl_buat', $q);
		$this->db->or_like('tgl_jt', $q);
		$this->db->or_like('nama', $q);
		$this->db->or_like('no_reg', $q);
		$this->db->or_like('kelas', $q);
		$this->db->or_like('sub_kelas', $q);
		$this->db->or_like('jns_tgh', $q);
		$this->db->or_like('jumlah', $q);
		$this->db->or_like('status', $q);
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

/* End of file T30_transaksi_model.php */
/* Location: ./application/models/T30_transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-16 14:49:08 */
/* http://harviacode.com */
