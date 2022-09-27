<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('DataModel');
    }
	public function index(){        
        $data['alerts'] = $this->session->flashdata('alerts');
        $this->load->view('login',$data);
	}
    public function logout(){
        $this->session->sess_destroy();
		redirect('login');
	}
	public function do_login(){
		$nip = $this->input->post('nip');
	    $password = md5($this->input->post('password'));
		try{
			$check = $this->CheckLogin($nip,$password);
			$the_session = array(
                'id_user' => $check[0]['id_user'],
				"NIP" => $check[0]['NIP'],
				"type" => $check[0]['type'],
				"role" => $check[0]['role'],
				"IsLoggedIn" => TRUE
			);
			if($check[0]['username'] == null){
				$karyawan = $this->GetUsername($check[0]['NIP']);
				$the_session['username'] = $karyawan[0]['NAMA'];
			}else{
				$the_session['username'] = $check[0]['username'];
			}
			$this->session->set_userdata($the_session);
			redirect('dashboard');
		}catch(Exception $e){
            $alerts = array(
				'class' => 'alert alert-danger dark alert-dismissible fade show',
				'icon' => 'fa fa-warning',
				'message' => '<strong>Oops!</strong> '.$e->getMessage()
			);
    		$this->session->set_flashdata('alerts', $alerts);
            redirect('login');
		}
	}
	private function GetUsername($nip){
		$select = 'NAMA';
	    $table = 'u1458735_dbho.PEGAWAI';
	    $col = array('NIP');
	    $par = array($nip);
	    return $this->DataModel->GetData($select,$table,$col,$par); 
	}
	private function CheckLogin($nip,$password){
	    $table = 'user';
		$col = array('nip','password','status');
		$par = array($nip,$password,'OPEN');
	    if($this->UserModel->CheckUniversal($table,$col,$par) <1){
			throw new Exception('Username or password is invalid');
		}
	    $select = 'id_user,NIP,username,type,role';
        $user = $this->UserModel->GetData($select,$table,$col,$par);
        if( $user == null){
            throw new Exception('Data not found');
        }  
		return $user;
	}
}