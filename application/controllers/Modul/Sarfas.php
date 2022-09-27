<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarfas extends CI_Controller {
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
		$data['menu'] = 'Modul';
		$data['page'] = $data['folder'] = 'sarfas';
		$data['folder'] = $data['menu']."/".$data['page'];
// 		$data['js'] = 'js_request_anggaran';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		$data['sarfas'] = $this->GetAllSarfasData(10,null,null);
		$this->load->view('layout/layout',$data);
	}
	private function InsertData($data,$table){
		$insert = $this->DataModel->InsertData($table,$data);
		if($insert['code'] != 0){
			throw new Exception('Oops! Something went wrong');
		}
		return true;
	}
	private function GetAllSarfasData($per_page,$keyword,$nip){
        $select = '*';
	    $table = 'sarfas AS a';
        $where = null;
		$order = 'a.id_sarfas ASC';
        $group = null;
        $join = [
            ['table' => 'jenis AS b', 'condition' => 'a.id_jenis=b.id_jenis', 'type' => 'left']
        ];
        $url = 'maintenance';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
	}
}
