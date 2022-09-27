<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('DataModel');
        if($this->session->userdata('IsLoggedIn') != TRUE){
            $alerts = GenerateDataAlert('oops','Your session is expired');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('login');
        }
    }
	public function index(){
		if($this->session->userdata('IsLoggedIn') == TRUE){
			$data['menu'] = 'Master Data';
			$data['page'] = 'karyawan';
            $data['folder'] = $data['menu']."/".$data['page'];
            $data['js'] = 'js_karyawan';
			$this->input->get('qty') == null ? $per_page = 10 : $per_page = $this->input->get('qty');
            $data['per_page'] = $per_page;
            $data['key'] = $this->input->get('key');
			$data['karyawan'] = $this->GetAllKaryawanData($per_page,$data['key']);
			$this->load->view('layout/layout',$data);
        }else{
            redirect('login');
        }
	}
	private function GetAllKaryawanData($per_page,$keyword){
		$select = '*';
	    $table = 'u1458735_dbho.PEGAWAI AS a';
        $where['a.KODE_STAT_PEG !='] = 'KELUAR';
        $where['a.STATUS'] = 'AKTIF';
		$order = 'a.NAMA ASC';
        $group = null;
        $join = [
            ['table' => 'u1458735_dbho.UNIT AS b', 'condition' => 'a.KODE_UNIT=b.KODE_UNIT', 'type' => 'left']
        ];
        $url = 'karyawan';
        $like = is_string($keyword) ? ['LOWER(NAMA)' => strtolower($keyword)] : NULL;
        return $this->DataModel->GetDataPagination2($select, $table, $join, $url, $per_page, $where, $order, $group,$like);
	
	}
}
