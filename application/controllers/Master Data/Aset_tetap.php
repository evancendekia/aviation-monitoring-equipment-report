<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_tetap extends CI_Controller {
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
        $data['page'] = 'aset_tetap';
		$data['folder'] = $data['menu']."/".$data['page'];
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['js'] = 'js_aset_tetap';	
		$this->input->get('qty') == null ? $per_page = 10 : $per_page = $this->input->get('qty');
		$data['per_page'] = $per_page;
        $data['aset'] = $this->GetAllAsetTetapData($per_page);
        $data['unit_kerja'] = $this->GetAllUnitKerjaData();
        $data['coa'] = $this->GetAllCOAData();
        $this->load->view('layout/layout',$data);
	}
    public function create_aset_tetap(){
        $data = array(
            'coa' => $this->input->post('coa'),
            'KODE_UNIT' => $this->input->post('unit'),
            'keterangan' => $this->input->post('keterangan'),
            'no_voucher' => $this->input->post('no_voucher'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'umur_ekonomis' => $this->input->post('umur'),
            'tgl' => $this->input->post('tgl'),
            'status' => 'OPEN',
            'author' => $this->session->userdata('NIP'),
            'set_time' => date('d-m-Y')
        );
        try{
            $this->CheckData($data);
			$this->InsertData($data);
			$alerts = GenerateDataAlert('success','Create user success');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('aset-tetap');

    }
    public function delete_aset_tetap(){
        $id = $this->input->post('id_aset');
		try{
			$this->DeleteDataAsetTetap($id);
			$alerts = GenerateDataAlert('success','Delete user success');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('aset-tetap');
    }
    public function update_aset_tetap(){
        $id = $this->input->post('id_aset');
        $data = array(
            'coa' => $this->input->post('coa'),
            'KODE_UNIT' => $this->input->post('unit'),
            'keterangan' => $this->input->post('keterangan'),
            'no_voucher' => $this->input->post('no_voucher'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'umur_ekonomis' => $this->input->post('umur'),
            'tgl' => $this->input->post('tgl'),
            'status' => 'OPEN',
            'author' => $this->session->userdata('NIP'),
            'set_time' => date('d-m-Y')
        );
        try{
			$this->UpdateDataAsetTetap($id,$data);
            // print_r($data);
			$alerts = GenerateDataAlert('success','Delete user success');
		}catch(Exception $e){
            echo $e->getMessage();
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('aset-tetap');
    }
    private function UpdateDataAsetTetap($id,$data){
        if($id == null){
			throw new Exception("Data id aset tetap is missing");
		}
        if($data['coa'] == null){
			throw new Exception("COA Field is Required");
        }
        if($data['KODE_UNIT'] == null){
			throw new Exception("Unit Field is Required");
        }
        $table = 'aset_tetap';
		$col = array('id_aset_tetap');
		$par = array($id);
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			// throw new Exception($update['message']);
			throw new Exception('Unknown error occurred');
		}
    }
    private function DeleteDataAsetTetap($id){
    	$table = 'aset_tetap';
		$col = array('id_aset_tetap');
		$par = array($id);
		if($id == null){
			throw new Exception("Data id aset tetap is missing");
		}
		if($this->DataModel->CheckUniversal($table,$col,$par) < 1){
			throw new Exception("Data not found");
		}
        $data['status'] = 'CLOSE';
		$Update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			// throw new Exception($update['message']);
			throw new Exception('Unknown error occurred');
		}
		return true;
	}
    
    private function CheckData($data){
        if($data['coa'] == null){
			throw new Exception("COA Field is Required");
        }
        if($data['KODE_UNIT'] == null){
			throw new Exception("Unit Field is Required");
        }
        $table = 'aset_tetap';
        $col = array('no_aset_tetap','status');
        $par = array($data['no_aset_tetap'],'OPEN');
		if($this->DataModel->CheckUniversal($table,$col,$par) > 0){
			throw new Exception("No Aset Tetap is already registered");
		}
        return true; 
    }
	private function GetAllAsetTetapData($per_page){
		$select = '*';
	    $table = 'aset_tetap as a';
		$where['a.status'] = 'OPEN';
		$order = 'a.id_aset_tetap ASC';
        $group = null;
        $join = [
            ['table' => 'u1458735_dbho.UNIT AS b', 'condition' => 'a.KODE_UNIT=b.KODE_UNIT', 'type' => 'left']
        ];
        $url = 'aset-tetap';
        return $this->DataModel->GetDataPagination2($select, $table, $join, $url, $per_page, $where, $order, $group);
	
	}
	private function GetAllUnitKerjaData(){
		$select = '*';
	    $table = 'u1458735_dbho.unit AS a';
		$where['a.STATUS'] = 'OPEN';
	    return $this->DataModel->GetData2($select,$table,$where); 
	}
	private function InsertData($data){
		$table = 'aset_tetap';
		$insert = $this->DataModel->InsertData($table,$data);
		if($insert['code'] != 0){
			// throw new Exception($insert['message']);
			throw new Exception('Oops! Something went wrong');
		}
		return true;
	}
	private function GetAllCOAData(){
		$select = '*';
	    $table = 'account_list AS a';
		$where['a.status'] = 'OPEN';
		$where['a.kode_account_list >'] = 999999;
	    return $this->DataModel->GetData2($select,$table,$where); 
	}
}
