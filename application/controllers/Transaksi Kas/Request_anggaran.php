<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_anggaran extends CI_Controller {
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
		$data['menu'] = 'Transaksi Kas';
		$data['page'] = 'request_anggaran';
		$data['folder'] = $data['menu']."/".$data['page'];
		$data['js'] = 'js_request_anggaran';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		if( $role == 1){
			$data['permintaan_anggaran'] = $this->GetAllPAData(10,null,null);
		}else{
			$data['permintaan_anggaran'] = $this->GetAllPAData(10,null,$this->session->userdata('NIP'));
		}
		$data['unit'] = $this->GetAllUnitKerjaData();
		// print_r($role);
		$this->load->view('layout/layout',$data);
	}
	public function form(){
		$data['menu'] = 'Transaksi Kas';
		$data['page'] = 'form_request_anggaran';
		$data['folder'] = $data['menu']."/request_anggaran";
		$data['js'] = 'js_request_anggaran';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['pa'] = $this->GetDataPAbyNum($this->input->get('num'));
		$data['unit'] = $this->GetAllUnitKerjaData();
        $data['coa'] = $this->GetAllCOAData();
		if($data['pa'] != null){
			if($data['pa'][0]['author'] == $this->session->userdata('NIP')){
				$data['kode_induk'] = $data['pa'][0]['kode_induk'];
				$data['anggaran'] = $this->GetKodeAnggaran($data['pa'][0]['kode_induk']);
				$data['list_request'] = $this->GetDetailPA($data['pa'][0]['id_pa']);
				$this->load->view('layout/layout',$data);
			}else{
				$alerts = GenerateDataAlert('failed','You dont have permission!');
				$this->session->set_flashdata('alerts', $alerts);
				redirect('request-anggaran','GET');
			}
		}else{
            $alerts = GenerateDataAlert('failed','Data permintaan anggaran not found');
			$this->session->set_flashdata('alerts', $alerts);
			redirect('request-anggaran','GET');
		}
	}
	public function view(){
		$data['menu'] = 'Transaksi Kas';
		$data['page'] = 'view_request_anggaran';
		$data['folder'] = $data['menu']."/request_anggaran";
		$data['js'] = 'js_request_anggaran';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		$data['pa'] = $this->GetDataPAbyNum($this->input->get('num'));
		$data['unit'] = $this->GetAllUnitKerjaData();
        $data['coa'] = $this->GetAllCOAData();
		if($data['pa'] != null){
			if($data['pa'][0]['author'] == $this->session->userdata('NIP') || $role == 1){
				$data['kode_induk'] = $data['pa'][0]['kode_induk'];
				$data['anggaran'] = $this->GetKodeAnggaran($data['pa'][0]['kode_induk']);
				$data['list_request'] = $this->GetDetailPA($data['pa'][0]['id_pa']);
				$this->load->view('layout/layout',$data);
			}else{
				$alerts = GenerateDataAlert('failed','You dont have permission!');
				$this->session->set_flashdata('alerts', $alerts);
				redirect('request-anggaran','GET');
			}
		}else{
            $alerts = GenerateDataAlert('failed','Data permintaan anggaran not found');
			$this->session->set_flashdata('alerts', $alerts);
			redirect('request-anggaran','GET');
		}
	}
	public function set_first_data_form(){
		$type = $this->input->post('type');
		$nip = $this->session->userdata('NIP');
		$data['type'] = $type;
		$data['tgl'] = date('d-m-Y');
		$data['author'] = $nip;
		$data['status'] = 'Draft';
		try{
			$unit = $this->GetUnitKaryawan($nip);
			$data['unit_kerja'] = $unit[0]['KODE_UNIT'];
			$num = $this->GetPANumber();
			$data['no_pa'] = $no_pa = 'PA'.$num.'/'.GetRomawi(date('m')).'/'.date('Y');
			$this->InsertData($data,'permintaan_anggaran');
			redirect("form-request-anggaran?num=$no_pa");
        }catch(Exception $e){
			// echo $e->getMessage();
            $alerts = GenerateDataAlert('failed',$e->getMessage());
			
	        $this->session->set_flashdata('alerts', $alerts);
			redirect('request-anggaran','GET');
        }
	}
	public function add_induk_anggaran(){
		$id = $this->input->post('id');
		$data['kode_induk'] = $this->input->post('induk');
		$this->UpdateDataPA($data,$id);
		$data['anggaran'] = $this->GetKodeAnggaran($data['kode_induk']);
		$this->load->view('modals/request_anggaran/modal_kode_anggaran',$data);
	}
	public function submit_uraian(){
		$id = $this->input->post('id');
		$data['uraian'] = $this->input->post('uraian');
		return $this->UpdateDataPA($data,$id);
	}
	public function submit_list_request_anggaran(){
		$input = json_decode($this->input->post('data'));
		$data_insert = array(
			'id_pa' => $input->id_pa,
			'no_unit' => $input->unit,
			'kode_anggaran' => $input->kode_anggaran,
			'nama_akun' => $input->nama_akun,
			'unit_kerja' => $input->unit_kerja,
			'unit_bisnis' => $input->unit_bisnis,
			'jumlah' => str_replace('.','',$input->jumlah),
			'keterangan' => $input->keterangan,
		);
		$this->InsertData($data_insert,'permintaan_anggaran_detil');
		$data['list_request'] = $this->GetDetailPA($input->id_pa);
		$this->load->view('components/request_anggaran/list_data',$data);
	}
	public function submit_pa(){
		$id = $this->input->post('id_pa');
		$valid = $this->input->post('valid');
		if($id != null && $valid != null){
			$data['status']='Waiting Approval';
			try{
				$this->UpdateDataPA($data,$id);
				$alerts = GenerateDataAlert('success','Submit permintaan anggaran success');
			}catch(Exception $e){
				$alerts = GenerateDataAlert('failed',$e->getMessage());
			}
		}else{
			echo $id;
			echo $valid;
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('request-anggaran','GET');
	}
	public function proses(){
		$id_pa = $this->input->post('id_pa');
		$jumlah_detil = $this->input->post('jumlah_detil');
		$num = $this->input->post('num');
		$data['status'] = 'Approved';
		for($i=0;$i<$jumlah_detil;$i++){
			$id_pa_detil[$i] = 	$this->input->post('id_detil-'.$i);
			$data_detil[$i]['jumlah_acc'] = str_replace('.','',$this->input->post('jumlah-'.$i));
		}
		if($this->input->post('valid')){
			try{
				$this->UpdateDataPA($data,$id_pa);
				for($i=0;$i<$jumlah_detil;$i++){
					$this->UpdateDataDetilPA($data_detil[$i],$id_pa_detil[$i]);
				}
				$alerts = GenerateDataAlert('success','Permintaan anggaran approved');
				$this->session->set_flashdata('alerts', $alerts);
			}catch(Exception $e){
				$alerts = GenerateDataAlert('failed',$e->getMessage());
				$this->session->set_flashdata('alerts', $alerts);
			}
			redirect('request-anggaran','GET');
		}else{
			$alerts = GenerateDataAlert('failed','Permintaan gagal diproses');
			$this->session->set_flashdata('alerts', $alerts);
			redirect("view-request-anggaran?num=$num",'GET');
		}
	}
	public function reset(){
		$num = $this->input->post('num');
		try{
			$this->ResetPA($num);
			$alerts = GenerateDataAlert('success','Permintaan anggaran berhasil di-reset');
			$this->session->set_flashdata('alerts', $alerts);
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
			$this->session->set_flashdata('alerts', $alerts);
		}
		redirect("form-request-anggaran?num=$num",'GET');
	}
	public function delete_list(){
		$num = $this->input->post("num");
		$id_pa_detil = $this->input->post("id_pa_detil");
		try{
			$this->DeleteDetailPA($id_pa_detil,'id_pa_detil');
			$alerts = GenerateDataAlert('success','Detail permintaan anggaran berhasil dihapus');
			$this->session->set_flashdata('alerts', $alerts);
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
			$this->session->set_flashdata('alerts', $alerts);
		}
		redirect("form-request-anggaran?num=$num",'GET');
	}
	private function ResetPA($num){
		$pa = $this->GetDataPAbyNum($num);
		if($pa[0]['status'] == 'Draft'){
			if($pa[0]['uraian'] != null || $pa[0]['kode_induk'] != null){
				$id = $pa[0]['id_pa'];
				$data['uraian'] = null;
				$data['kode_induk'] = null;
				$this->UpdateDataPA($data,$id);
				$this->DeleteDetailPA($id,'id_pa');
			}
		} else {
			throw new Exception('Permintaan anggaran tidak dapat di-reset');
		}
		return true;
	}
	private function GetPANumber(){
		$select = '*';
	    $table = 'pa_number';
	    $col = array('month','year');
	    $par = array(date('m'),date('Y'));
	    $num = $this->DataModel->GetData($select,$table,$col,$par);
		if($num == null){
			$new = array(
				'month'=>date('m'),
				'year'=>date('Y'),
				'number'=>001
			);
			$this->InsertData($new,'pa_number');
			$data_num = '001';
		}else{
			$data_num = $num[0]['number'] + 1;
			$data_num = str_pad($data_num, 3, '0', STR_PAD_LEFT);
			$this->UpdateDataPANumber($data_num,$num[0]['id_pa_number']);
		}
		return $data_num;
	}
	private function UpdateDataPANumber($data_num,$id){
        $table = 'pa_number';
		$col = array('id_pa_number');
		$par = array($id);
		$data['number'] = $data_num;
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception($update['message']);
			// throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function DeleteDetailPA($id,$name){
		$table = 'permintaan_anggaran_detil';
		$col = array($name);
		$par = array($id);
		$delete = $this->DataModel->DeleteData($table,$col,$par);
		if($delete['code'] != 0){
			// throw new Exception($update['message']);
			throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function UpdateDataPA($data,$id){
        $table = 'permintaan_anggaran';
		$col = array('id_pa');
		$par = array($id);
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception($update['message']);
			// throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function UpdateDataDetilPA($data,$id){
        $table = 'permintaan_anggaran_detil';
		$col = array('id_pa_detil');
		$par = array($id);
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception($update['message']);
			// throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function InsertData($data,$table){
		$insert = $this->DataModel->InsertData($table,$data);
		if($insert['code'] != 0){
			throw new Exception('Oops! Something went wrong');
		}
		return true;
	}
	private function GetDetailPA($id){
		$select = '*';
	    $table = 'permintaan_anggaran_detil AS a';
		$where['a.id_pa'] = $id;
	    return $this->DataModel->GetData2($select,$table,$where);  
	}
	private function GetAllUnitKerjaData(){
		$select = '*';
	    $table = 'u1458735_dbho.unit';
	    $col = array('STATUS');
	    $par = array('OPEN');
	    return $this->DataModel->GetData($select,$table,$col,$par);  
	}
	private function GetAllPAData($per_page,$keyword,$nip){
        $select = '*';
	    $table = 'permintaan_anggaran AS a';
		if($nip != null){
			$where['a.author'] = $nip;
		}else{
			$where['a.status !='] = 'Draft';
		}
		$order = 'a.id_pa DESC';
        $group = null;
        $join = null;
        $url = 'request-anggaran';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
	}
	private function GetDataPAbyNum($num){
		$select = '*';
	    $table = 'permintaan_anggaran AS a';
		$join = [
            ['table' => 'u1458735_dbho.UNIT AS b', 'condition' => 'a.unit_kerja=b.KODE_UNIT', 'type' => 'left'],	
            ['table' => 'u1458735_dbho.PEGAWAI AS c', 'condition' => 'a.author=c.NIP', 'type' => 'left']
        ];
		$where['a.no_pa'] = $num;
	    return $this->DataModel->GetData2($select,$table,$where,$join);  
	}
	
	private function GetUnitKaryawan($nip){
		$select = 'a.KODE_UNIT';
	    $table = 'u1458735_dbho.PEGAWAI as a';
		$table2 = 'u1458735_dbho.UNIT';
		$join_param = 'KODE_UNIT';
	    $col = array('a.NIP','a.STATUS', 'a.KODE_STAT_PEG !=');
	    $par = array($nip,'AKTIF', 'KELUAR');
		$order = 'NAMA ASC';
	    return $this->DataModel->GetDataJoin($select,$table,$table2,$join_param,$col,$par,$order);  
	}
	
	private function GetAllCOAData(){
		$select = '*';
	    $table = 'account_list AS a';
		$where['a.status'] = 'OPEN';
		$where['kode_account_list <'] = 9999;
		$where['kode_header >'] = 9;
	    return $this->DataModel->GetData2($select,$table,$where);  
	}
	private function GetKodeAnggaran($head){
		$select = '*';
	    $table = 'account_list AS a';
		$where['a.status'] = 'OPEN';
		$where['kode_header'] = $head;
	    return $this->DataModel->GetData2($select,$table,$where);  
	}
}
