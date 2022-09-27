<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_list extends CI_Controller {
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
        $data['menu'] = 'Master Data';
        $data['page'] = 'supplier_list';
		$data['folder'] = $data['menu']."/".$data['page'];
        $this->input->get('qty') == null ? $per_page = 10 : $per_page = $this->input->get('qty');
        $data['per_page'] = $per_page;
        $data['alerts'] = $this->session->flashdata('alerts');
        $data['key'] = $this->input->get('key');
        $data['supplier'] = $this->GetAllSupplierData($per_page,$data['key']);
        $this->load->view('layout/layout',$data);
	}
	private function GetAllSupplierData($per_page,$keyword){
        $select = '*';
	    $table = 'u1458735_po.SUPPLIER AS a';
        $where['a.status'] = 'OPEN';
        $order = 'a.KODE_SUPPLIER ASC';
        $group = null;
        $join = null;
        $url = 'supplier-list';
        $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group,$like);
	}
}