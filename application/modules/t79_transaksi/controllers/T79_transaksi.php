<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class T79_transaksi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('t30_transaksi/T30_transaksi_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('t89_users_menus/T89_users_menus_model');
        $this->load->model('t00_sekolah/T00_sekolah_model');
        $this->load->model('t01_tahunajaran/T01_tahunajaran_model');
        $this->load->model('t02_kelas/T02_kelas_model');
        $this->load->model('t03_tagihan/T03_tagihan_model');
        $this->load->model('t04_rincian/T04_rincian_model');
    }

    public function index()
    {
        $listSekolah = $this->T00_sekolah_model->get_all();
        $listTahunajaran = $this->T01_tahunajaran_model->get_all();
        $listKelas = $this->T02_kelas_model->get_all();
        $listTagihan = $this->T03_tagihan_model->get_all();
        $listRincian = $this->T04_rincian_model->get_all();
        $data = array(
            'button' => 'Proses',
            'action' => site_url('t79_transaksi/index_action'),
            // 'idrincian' => set_value('idrincian'),
            'sekolah' => set_value('sekolah'),
		    'tahun_ajaran' => set_value('tahun_ajaran'),
		    'kelas' => set_value('kelas'),
            'listSekolah' => $listSekolah,
            'listTahunajaran' => $listTahunajaran,
            'listKelas' => $listKelas,
            'listRincian' => $listRincian,
            'listTagihan' => $listTagihan,
		);
        // $this->load->view('t04_rincian/t04_rincian_form', $data);
        $data['_view'] = 't79_transaksi/t79_transaksi_form';
        $data['_caption'] = 'Laporan Data Transaksi';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function index_old()
    {
        // $this->load->view('t30_transaksi/t30_transaksi_list');
        // $data['hakAkses'] = $this->T89_users_menus_model->getHakAkses(substr($this->uri->segment(1), 4));
        // $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't79_transaksi/t79_transaksi_list';
        $data['_caption'] = 'Laporan Data Transaksi';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }


}
