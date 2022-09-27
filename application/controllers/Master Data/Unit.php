<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('DataModel');
        if($this->session->userdata('IsLoggedIn') != TRUE){
            $alerts = GenerateDataAlert('oops','Your session is expired');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('login');
        }
    }
	public function unit_kerja(){
		if($this->session->userdata('IsLoggedIn') == TRUE){
			$data['menu'] = 'Master Data';
			$data['page'] = 'unit_kerja';
            $data['folder'] = $data['menu']."/".$data['page'];
			$this->input->get('qty') == null ? $per_page = 10 : $per_page = $this->input->get('qty');
			$data['per_page'] = $per_page;
            $data['bisnis'] = $this->input->get('bisnis');
			$data['unit_kerja'] = $this->GetAllUnitKerjaData($per_page,$data['bisnis']);
			$data['unit_bisnis'] = $this->GetAllUnitBisnisData();
			$this->load->view('layout/layout',$data);
            // print_r($data['unit_bisnis']);
        }else{
            redirect('login');
        }
	}
	private function GetAllUnitKerjaData($per_page,$bisnis){
		$select = ['a.KODE_UNIT','a.NAMA_UNIT','a.KETERANGAN','a.ACCT_UNIT','a.TRANS_JURNAL','a.KDDIV','a.NMDIV'];
	    $table = 'u1458735_dbho.UNIT as a';
		$where['a.STATUS'] = 'OPEN';
        $bisnis == null ?: $where['a.KETERANGAN'] = $bisnis;
		$order = 'a.KODE_UNIT ASC';
        $group = null;
        $join = [];
        $url = 'unit-kerja';
        return $this->DataModel->GetDataPagination2($select, $table,$join,$url, $per_page, $where, $order, $group);
	}
    private function GetAllUnitBisnisData(){
        $select = ['a.KETERANGAN'];
        $table = 'u1458735_dbho.UNIT as a';
        $join = null;
        $where['a.STATUS'] = 'OPEN';
        $order = null;
        $group = 'a.KETERANGAN';
	    return $this->DataModel->GetData2($select,$table,$where,$join,$order,$group); 

    }
}
