<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T98_akun_model extends CI_Model
{

    public $table = 't98_akun';
    public $id = 'kode';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function getNewKode($induk)
    {

        $lenInduk = strlen($induk);

        switch ($lenInduk) {
            case 1:
                $lenKode = 2;
                break;
            case 2:
                $lenKode = 4;
                break;
            case 4:
                $lenKode = 7;
                break;
            case 7:
                $lenKode = 10;
                break;
            case 10:
                $lenKode = 13;
                break;
            default:
                return false;
        }

        $sNextKode = "";
        $sLastKode = "";

        $this->db->order_by('kode', 'desc');
        $this->db->limit(1);
        $this->db->where('length(kode) = ', $lenKode);
        $this->db->where('left(kode, '.$lenInduk.') = ', $induk);

        $row = $this->db->get($this->table)->row();
        if ($row) {

            // kode saat ini (kode terakhir)
            $value = $row->kode; // harus di-substr dulu untuk mengambil :: berapa digit yang akan ditambah 1

            $nomor = '';

            switch ($lenInduk) {
                case 1:
                    // panjang kode = 2
                    $nomor = substr($value, 1, 1);
                    break;
                case 2:
                    // panjang kode = 4
                    $nomor = substr($value, 2, 2);
                    break;
                case 4:
                case 7:
                case 10:
                    // panjang kode = 4->7, 7->10, 10->13
                    $nomor = substr($value, $lenInduk, 3);
                    break;
            }

            // kode saat ini (kode terakhir) + 1 (ditambah 1)
            $sLastKode = intval($nomor);
            $sLastKode = intval($sLastKode) + 1;

            switch ($lenInduk) {
                case 1:
                    if ($sLastKode > 9) {
                        return false;
                    }
                    $sNextKode = $induk . $sLastKode;
                    break;
                case 2:
                    if ($sLastKode > 99) {
                        return false;
                    }
                    $sNextKode = $induk . sprintf('%02s', $sLastKode);
                    break;
                case 4:
                case 7:
                case 10:
                    if ($sLastKode > 999) {
                        return false;
                    }
                    $sNextKode = $induk . sprintf('%03s', $sLastKode);
                    break;
                default:
                    return false;
            }

            // if (strlen($sNextKode) > 5) {
            //     $sNextKode = $prefix . "999";
            // }
        } else {

            switch ($lenInduk) {
                case 1:
                    $sNextKode = $induk . '1';
                    break;
                case 2:
                    $sNextKode = $induk . '01';
                    break;
                case 4:
                case 7:
                case 10:
                    $sNextKode = $induk . sprintf('%03s', '1');
                    break;
                default:
                    return false;
            }
        }
        return $sNextKode;
    }

    // datatables
    function json() {
        // $this->datatables->select('case when length(kode) = 1 then concat(kode) when length(kode) = 2 then concat("&nbsp;", kode) when length(kode) = 4 then concat("&nbsp;&nbsp;", kode) end as kode,nama,induk,urutan');
        $this->datatables->select('kode,
        case
            when length(kode) =  1 then concat("<b>",nama,"</b>")
            when length(kode) =  2 then concat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>", nama, "</b>")
            when length(kode) =  4 then concat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", nama)
            when length(kode) =  7 then concat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", nama)
            when length(kode) = 10 then concat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", nama)
            else                        concat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", nama)
        end as nama,
        induk,urutan');
        $this->datatables->from('t98_akun');
		if (isset($_POST['kode']) && $_POST['kode'] != '') { $this->datatables->like('kode', $_POST['kode']); }
		if (isset($_POST['nama']) && $_POST['nama'] != '') { $this->datatables->like('nama', $_POST['nama']); }
		if (isset($_POST['induk']) && $_POST['induk'] != '') { $this->datatables->like('induk', $_POST['induk']); }
		if (isset($_POST['urutan']) && $_POST['urutan'] != '') { $this->datatables->like('urutan', $_POST['urutan']); }
        //add this line for join
        //$this->datatables->join('table2', 't98_akun.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t98_akun/create/$1'),'Tambah')." | ".anchor(site_url('t98_akun/update/$1'),'Ubah')." | ".anchor(site_url('t98_akun/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"'), 'kode');
        // $action = "";
        // $hakAkses = $this->session->userdata('hakAkses'.substr($this->uri->segment(1), 4));
        // if ($hakAkses['ubah']) {
        //     $action = anchor(site_url('t98_akun/update/$1'),'Ubah');
        //     if ($hakAkses['hapus']) {
        //         $action .= " | ";
        //     }
        // }
        // if ($hakAkses['hapus']) {
        //     $action .= anchor(site_url('t98_akun/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"');
        // }
        // $this->datatables->add_column('action', $action, 'kode');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        // $this->db->order_by($this->id, $this->order);
        $this->db->order_by('urutan', 'asc');
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
		$this->db->or_like('nama', $q);
		$this->db->or_like('induk', $q);
		$this->db->or_like('urutan', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kode', $q);
		$this->db->or_like('nama', $q);
		$this->db->or_like('induk', $q);
		$this->db->or_like('urutan', $q);
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

/* End of file T98_akun_model.php */
/* Location: ./application/models/T98_akun_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-20 20:43:29 */
/* http://harviacode.com */
