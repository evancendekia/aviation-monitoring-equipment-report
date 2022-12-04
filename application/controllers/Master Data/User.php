<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('DataModel');
		if($this->session->userdata('IsLoggedIn') != TRUE){
            $alerts = GenerateDataAlert('oops','Your session is expired');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('login');
        }
    }
	public function index(){
		$data['menu'] = 'Master Data';
		$data['page'] = 'user';
		$data['folder'] = $data['menu']."/".$data['page'];
		$data['js'] = 'js_user';
		$this->input->get('qty') == null ? $per_page = 10 : $per_page = $this->input->get('qty');
		$data['per_page'] = $per_page;
		$data['user'] = $this->GetDataUserAll($per_page);
// 		$data['karyawan'] = $this->GetAllKaryawanData();
		$data['alerts'] = $this->session->flashdata('alerts');
		$this->load->view('layout/layout',$data);
	}
    public function create_user(){
		$data['username'] = $this->input->post('nama');
		$data['nip'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));
		$confirm_password = md5($this->input->post('password_confirm'));
		$data['role'] = $this->input->post('role');
		$data['type'] = 'User';
		$data['status'] = 'OPEN';
		$data['author'] = 'superadmin';
		$data['set_time'] = date('Y-m-d');
		try{
			$this->CheckPassword($data['password'], $confirm_password);
			$this->CheckNIP($data['nip']);
			$this->InsertDataUser($data);
			$alerts = GenerateDataAlert('success','Create user success');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('user');
    }
	public function delete_user(){
		$id = $this->input->post('id_user');
		try{
			$this->DeleteDataUser($id);
			$alerts = GenerateDataAlert('success','Delete user success');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('user');
	}
	public function reset_password(){
		$id = $this->input->post('id_user');
		$data['password'] = md5($this->input->post('password'));
		$confirm_password = md5($this->input->post('password_confirm'));
		try{
            $this->CheckPassword($data['password'], $confirm_password);
			$this->UpdateDataUser($data,$id);
			$alerts = GenerateDataAlert('success','Reset password success');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('user');
	}
	private function GetDataUserAll($per_page){
	    $select = ['a.id_user','a.NIP','a.username','a.type'];
	    $table = 'user AS a';
        $where['a.status'] = 'OPEN';
        $order = 'a.id_user ASC';
        $group = null;
        $join = null;
        $url = 'user';
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
	
	}
    private function CheckPassword($pass, $confpass){
        if($pass != $confpass){
            throw new Exception('Password not match');
        }
        return true;
    }
	private function CheckNIP($nip){
		$table = 'user';
		$col = array('nip','status');
		$par = array($nip,'OPEN');
		if($this->UserModel->CheckUniversal($table,$col,$par) > 0){
			throw new Exception("NIP already registered");
		}
		return true;
	}
	private function InsertDataUser($data){
		$table = 'user';
		$insert = $this->UserModel->InsertData($table,$data);
		if($insert['code'] != 0){
			// throw new Exception($insert['message']);
			throw new Exception('Oops! Something went wrong');
		}
		return true;
	}
	private function DeleteDataUser($id){
		$table = 'user';
		$col = array('id_user');
		$par = array($id);
		$data['status'] = 'CLOSE';
		$Update = $this->UserModel->UpdateData($table,$col,$par,$data);
		if($Update['code'] != 0){
			// throw new Exception($update['message']);
			throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function UpdateDataUser($data,$id){
		$table = 'user';
		$col = array('id_user');
		$par = array($id);
		$Update = $this->UserModel->UpdateData($table,$col,$par,$data);
		if($Update['code'] != 0){
			// throw new Exception($update['message']);
			throw new Exception('Unknown error occurred');
		}
		return true;
	}	
	private function GetAllKaryawanData(){
		$select = '*';
	    $table = 'u1458735_dbho.PEGAWAI AS a';
		$join = [
            ['table' => 'u1458735_dbho.UNIT AS b', 'condition' => 'a.KODE_UNIT=b.KODE_UNIT', 'type' => 'left']
        ];
		$where['a.STATUS'] = 'AKTIF';
		$where['a.KODE_STAT_PEG !='] = 'KELUAR';
	    return $this->DataModel->GetData2($select,$table,$where,$join);  
	}
}
