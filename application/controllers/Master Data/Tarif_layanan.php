<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_layanan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('DataModel');
        if ($this->session->userdata('IsLoggedIn') != TRUE) {
            $alerts = GenerateDataAlert('oops', 'Your session is expired');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('login');
        }
    }

    public function index() {
        $data['menu'] = 'Master Data';
        $data['page'] = 'tarif_layanan';
        $data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_tarif_layanan';
        $data['alerts'] = $this->session->flashdata('alerts');
//        $data['filter'] = $this->GetFilter();
        $data['tarif_layanan'] = $this->GetAllTarifLayanan();
//        echo json_encode($data);
        $this->load->view('layout/layout', $data);
    }

    private function GetAllTarifLayanan() {
        $keyword = $this->input->get('keyword');
//        if (!is_string($keyword)) {
//            return redirect('customer-list');
//        }
        $like = is_string($keyword) ? ['LOWER(NAMA_JASA)' => strtolower($keyword)] : NULL;
        $where['a.STATUS'] = 'AKTIF';
        $order = 'KODE_JASA ASC';
        $group = 'a.KODE_JASA';
        $select = ['b.NAMA_UNIT','a.KODE_JASA','a.NAMA_JASA','a.MATA_UANG','a.TARIF','a.SATUAN',
            'a.GRUP_JASA','a.CARGODORING','c.NAMA_UNIT as GRUP_UNIT','a.UKURAN','a.KET_UK','K_JASA'];
        $table = 'u1458735_ops.jenis_jasa as a';
        //['table' => '', 'condition' => '', 'type' =>'']
        $join = [
            ['table' => 'u1458735_dbho.UNIT as b', 'condition' => 'a.KODE_UNIT=b.KODE_UNIT', 'type' =>'left'],
            ['table' => 'u1458735_dbho.UNIT as c', 'condition' => 'a.GRUP_UNIT=b.KODE_UNIT', 'type' =>'left']
        ];
        $url = 'tarif-layanan';
        $per_page = 20;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
    }


}
