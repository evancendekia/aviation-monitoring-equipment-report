<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_pengeluaran extends CI_Controller {
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
		$data['page'] = 'jurnal_pengeluaran';
		$data['folder'] = $data['menu']."/".$data['page'];
		// $data['js'] = 'js_pengeluaran_kas';
		$data['alerts'] = $this->session->flashdata('alerts');
        $data['pengeluaran_kas'] = $this->GetAllPKData(10,null,null);
        for($i=0;$i<count($data['pengeluaran_kas']);$i++){
            $data['pengeluaran_kas'][$i]['detil'] = $this->GetDetailPAView($data['pengeluaran_kas'][$i]['id_pa']);
        }
		$data['link_account'] = $this->GetLinkAccountPK();
		$data['kas'] = $this->GetAccountKAS();
        // foreach($data['pengeluaran_kas'] as $a){
        //     print_r($a);
        //     echo "<br>";
        // }
        // print_r($data['pengeluaran_kas']);
		$this->load->view('layout/layout',$data);
	}
    
	private function GetAllPKData($per_page,$keyword,$nip){
        $select = '*';
	    $table = 'pengeluaran_kas AS a';
		if($nip != null){
			$where['a.author'] = $nip;
		}else{
			$where['a. status_pk !='] = 'Draft';
		}
		$order = 'a.id_pk ASC';
        $group = null;
		$join = [
            ['table' => 'permintaan_anggaran AS b', 'condition' => 'a.id_pa=b.id_pa', 'type' => 'left'],
            // ['table' => 'pengeluaran_kas_detil AS c', 'condition' => 'a.id_pk=c.id_pk', 'type' => 'left'],
            // ['table' => 'permintaan_anggaran_detil AS d', 'condition' => 'c.id_pa_detil=d.id_pa_detil', 'type' => 'left']	
        ];
        $url = 'pengeluaran-kas';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
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
