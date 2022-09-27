<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_kas extends CI_Controller {
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
		$data['page'] = 'pengeluaran_kas';
		$data['folder'] = $data['menu']."/".$data['page'];
		$data['js'] = 'js_pengeluaran_kas';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		if($role == 1){
			$data['pengeluaran_kas'] = $this->GetAllPKData(10,null,null);
		}else{
			$data['pengeluaran_kas'] = $this->GetAllPKData(10,null,$this->session->userdata('NIP'));
		}
		$this->load->view('layout/layout',$data);
	}
    public function set_first_data_form(){
        $id = $this->input->post('id');
        $nip = $this->session->userdata('NIP');
        try{
            $this->CheckDataPK($id);
            $pa = $this->GetDataPAFirst($id,$nip);
            $data['id_pa'] = $pa[0]['id_pa'];
            $data['tgl_pk'] = date('d-m-Y');
            $data['author'] = $nip;
            $data['status_pk'] = 'Draft';
        	$num = $this->GetPKNumber();
        	$data['no_voucher'] = $no_pk = 'PK'.$num.'/'.GetRomawi(date('m')).'/'.date('Y');
			$this->InsertData($data,'pengeluaran_kas');
			redirect("form-pengeluaran-kas?num=$no_pk");
        }catch(Exception $e){
			$no_voucher = $this->GetNoVOucherbyIdPA($id);
            $alerts = GenerateDataAlert('oops',$e->getMessage());
	        $this->session->set_flashdata('alerts', $alerts);
			redirect("form-pengeluaran-kas?num=$no_voucher",'GET');
        }
	}
    public function form(){
		$data['menu'] = 'Transaksi Kas';
		$data['page'] = 'form_pengeluaran_kas';
		$data['folder'] = $data['menu']."/pengeluaran_kas";
		$data['js'] = 'js_pengeluaran_kas';
		$data['alerts'] = $this->session->flashdata('alerts');
		$num = $this->input->get('num');
		$data['pk'] = $this->GetDataPKbyNum($num);
        if($data['pk'][0]['status_pk'] == 'Draft'){
			$data['pa_list'] = $this->GetDetailPA($data['pk'][0]['id_pa']);
			$data['link_account'] = $this->GetLinkAccountPK();
			$data['kas'] = $this->GetAccountKAS();
			
			// print_r($data['pa_list']);
			$this->load->view('layout/layout',$data);
		}else{
			if($data['alerts'] == null){
				$alerts = GenerateDataAlert('failed','Pengeluaran Kas sudah tersubmit');
				$this->session->set_flashdata('alerts', $alerts);
			}else{
				$this->session->set_flashdata('alerts', $data['alerts']);
			}
			redirect("view-pengeluaran-kas?num=$num",'GET');
		}
        
    }
	public function submit_pengeluaran_kas(){
		$sum = $this->input->post('sum_data');
		$id = $this->input->post('id');
		$num = $this->input->post('no_pk');
		$data['dibayar_kepada'] = $this->input->post('dibayar_kepada');
		$data['jumlah'] = $uang= str_replace('.','',$this->input->post('uang_sejumlah'));
		$data['status_pk'] = 'Waiting Approval';
		for($i=0;$i<$sum;$i++){
			$data2['id_pk'][$i] = $data_ins[$i]['id_pk'] = $id; 
			$data2['id_pa_detil'][$i] = $data_ins[$i]['id_pa_detil'] = $this->input->post("id_pa-".($i+1));
			$data2['debit'][$i] = $data_ins[$i]['debit'] = str_replace('.','',$this->input->post("debit-".($i+1)));
			$data2['kredit'][$i] = $data_ins[$i]['kredit'] = str_replace('.','',$this->input->post("kredit-".($i+1)));
		}
		$sum = array_sum($data2['debit'])-array_sum($data2['kredit']);
		if($sum == $uang){
			try{
				$this->UpdateDataPk($data,$id);
				for($i=0;$i<count($data_ins);$i++){
					$this->InsertData($data_ins[$i],'pengeluaran_kas_detil');
				}
				$alerts = GenerateDataAlert('success','Submit pengeluaran kas success');
				$this->session->set_flashdata('alerts', $alerts);
				redirect("pengeluaran-kas",'GET');
			}catch(Exception $e){
				$alerts = GenerateDataAlert('failed',$e->getMessage());
				$this->session->set_flashdata('alerts', $alerts);
				redirect("form-pengeluaran-kas?num=$num",'GET');
			}
		}else{
            $alerts = GenerateDataAlert('failed','Data tidak balance!');
			$this->session->set_flashdata('alerts', $alerts);
			redirect("form-pengeluaran-kas?num=$num",'GET');
		}
	}
	public function view(){
		$data['menu'] = 'Transaksi Kas';
		$data['page'] = 'view_pengeluaran_kas';
		$data['folder'] = $data['menu']."/pengeluaran_kas";
		$data['js'] = 'js_pengeluaran_kas';
		$data['alerts'] = $this->session->flashdata('alerts');        
		$data['role'] = $role = $this->session->userdata('role');
		
		$data['pk'] = $this->GetDataPKbyNum($this->input->get('num'));
		if($data['pk'] != null){
			if($data['pk'][0]['author'] == $this->session->userdata('NIP') || $role == 1){
				$data['pa_list'] = $this->GetDetailPAView($data['pk'][0]['id_pa']);
				$data['link_account'] = $this->GetLinkAccountPK();
				$data['kas'] = $this->GetAccountKAS();
				$this->load->view('layout/layout',$data);
			}else{
				$alerts = GenerateDataAlert('failed','You dont have permission!');
				$this->session->set_flashdata('alerts', $alerts);
				redirect('pengeluaran-kas','GET');
			}
		}else{
            $alerts = GenerateDataAlert('failed','Data pengeluaran kas not found');
			$this->session->set_flashdata('alerts', $alerts);
			redirect('pengeluaran-kas','GET');
		}
	}
	public function submit_dibayar(){
		$id = $this->input->post('id');
		$data['dibayar_kepada'] = $this->input->post('dibayar');
		return $this->UpdateDataPk($data,$id);
	}
	
	public function proses(){
		$id_pk = $this->input->post('id_pk');
		$num = $this->input->post('num');
		$data['status_pk'] = 'Approved';
		if($this->input->post('valid')){
			try{
				$this->UpdateDataPK($data,$id_pk);
				$alerts = GenerateDataAlert('success','Pengeluaran kas approved');
				$this->session->set_flashdata('alerts', $alerts);
			}catch(Exception $e){
				$alerts = GenerateDataAlert('failed',$e->getMessage());
				$this->session->set_flashdata('alerts', $alerts);
			}
			redirect('pengeluaran-kas','GET');
		}else{
			$alerts = GenerateDataAlert('failed','Permintaan gagal diproses');
			$this->session->set_flashdata('alerts', $alerts);
			redirect("view-pengeluaran-kas?num=$num",'GET');
		}
		// print_r($data_detil);
	}
	private function UpdateDataPK($data,$id){
        $table = 'pengeluaran_kas';
		$col = array('id_pk');
		$par = array($id);
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception($update['message']);
			// throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function GetAllPKData($per_page,$keyword,$nip){
        $select = '*';
	    $table = 'pengeluaran_kas AS a';
		if($nip != null){
			$where['a.author'] = $nip;
		}else{
			$where['a. status_pk !='] = 'Draft';
		}
		$order = null;
        $group = null;
		$join = [
            ['table' => 'permintaan_anggaran AS b', 'condition' => 'a.id_pa=b.id_pa', 'type' => 'left']	
        ];
        $url = 'pengeluaran-kas';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
	}
    private function CheckDataPK($id){
		$select = '*';
	    $table = 'pengeluaran_kas AS a';
        $join = null;
		$where['a.id_pa'] = $id;
	    $data = $this->DataModel->GetData2($select,$table,$where,$join);  
        if($data != null){
            throw new Exception('Form pengeluaran kas sudah ada!');
        }
        return true;

    }
	private function GetDataPKbyNum($num){
		$select = '*';
	    $table = 'pengeluaran_kas AS a';
		$join = [
            ['table' => 'permintaan_anggaran AS b', 'condition' => 'a.id_pa=b.id_pa', 'type' => 'left'],
        ];
		$where['a.no_voucher'] = $num;
	    return $this->DataModel->GetData2($select,$table,$where,$join);  
	}
	private function GetNoVOucherbyIdPA($id){
		$select = 'no_voucher';
	    $table = 'pengeluaran_kas AS a';
		$where['a.id_pa'] = $id;
	    $get = $this->DataModel->GetData2($select,$table,$where,$join);  
		return $get[0]['no_voucher'];
	}
    private function GetDataPAFirst($id,$nip){
		$select = '*';
	    $table = 'permintaan_anggaran AS a';
        $join = null;
		$where['a.id_pa'] = $id;
		$where['a.author'] = $nip;
		$where['a.status'] = 'Approved';
	    $data = $this->DataModel->GetData2($select,$table,$where,$join);  
        if($data == null){
			throw new Exception('Oops! Action Restricted!');
		}
		return $data;
	}
	private function GetDetailPA($id){
		$select = '*';
	    $table = 'permintaan_anggaran_detil AS a';
		$where['a.id_pa'] = $id;
		$join = [
            ['table' => 'permintaan_anggaran_detil AS b', 'condition' => 'a.id_pa=b.id_pa', 'type' => 'left'],		
        ];
		
	    return $this->DataModel->GetData2($select,$table,$where,$join);  
	}
	private function GetDetailPAView($id){
		$select = '*';
	    $table = 'permintaan_anggaran_detil AS a';
		$join = [
            ['table' => 'pengeluaran_kas_detil AS b', 'condition' => 'a.id_pa_detil=b.id_pa_detil', 'type' => 'left'],	
        ];
		$where['a.id_pa'] = $id;
	    return $this->DataModel->GetData2($select,$table,$where,$join);  
	}
	private function GetPKNumber(){
		$select = '*';
	    $table = 'pk_number';
	    $col = array('month','year');
	    $par = array(date('m'),date('Y'));
	    $num = $this->DataModel->GetData($select,$table,$col,$par);
		if($num == null){
			$new = array(
				'month'=>date('m'),
				'year'=>date('Y'),
				'number'=>001
			);
			$this->InsertData($new,'pk_number');
			$data_num = '001';
		}else{
			$data_num = $num[0]['number'] + 1;
			$data_num = str_pad($data_num, 3, '0', STR_PAD_LEFT);
			$this->UpdateDataPKNumber($data_num,$num[0]['id_pk_number']);
		}
		return $data_num;
	}
	private function InsertData($data,$table){
		$insert = $this->DataModel->InsertData($table,$data);
		if($insert['code'] != 0){
			// throw new Exception($insert['message']);
			throw new Exception('Oops! S	omething went wrong');
		}
		return true;
	}
	private function UpdateDataPKNumber($data_num,$id){
        $table = 'pk_number';
		$col = array('id_pk_number');
		$par = array($id);
		$data['number'] = $data_num;
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception($update['message']);
			// throw new Exception('Unknown error occurred');
		}
		return true;
	}
	
	private function GetLinkAccountPK(){
		$select = '*';
	    $table = 'link_account AS a';
		$join = [
            ['table' => 'account_list AS b', 'condition' => 'a.id_account_list=b.id_account_list', 'type' => 'left'],	
        ];
	    $where['a.nama_link_account'] = 'Bank Account for Paying Bills';
		return $this->DataModel->GetData2($select,$table,$where,$join);  
	}
	private function GetAccountKAS(){
		$select = '*';
	    $table = 'account_list AS a';
	    $where['a.nama_account_list'] = 'K A S';
		return $this->DataModel->GetData2($select,$table,$where);  
	}
}
