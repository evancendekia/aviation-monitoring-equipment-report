<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_barang extends CI_Controller {
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
        $data['page'] = 'tarif_barang';
		$data['folder'] = $data['menu']."/".$data['page'];
        $data['alerts'] = $this->session->flashdata('alerts');
        $data['jenis'] = $this->GetAllJenisBarangData();
        $this->input->get('qty') == null ? $per_page = 10 : $per_page = $this->input->get('qty');
        $data['per_page'] = $per_page;
        $data['key'] = $this->input->get('key');
        $data['tarif'] = $this->GetAllTarifBarangData($per_page,$data['key']);
        $this->load->view('layout/layout',$data);
        
	}
    public function create_tarif_barang(){
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['nama_barang'] = $this->input->post('nama_barang');
        $data['jenis_barang'] = $this->input->post('jenis_barang');
        $data['author'] = $this->input->post('author');
        $data['status'] = $this->input->post('status');
        $data['harga'] = $this->input->post('harga');
        $data['satuan'] = $this->input->post('satuan');
        $data['set_time'] = date('d-m-Y');
        try{
            $this->CheckKode($data['kode_barang']);
            $this->InsertData($data);
            $alerts = GenerateDataAlert('success','Add Tarif Barang Success');
        }catch(Exception $e){
            $alerts = GenerateDataAlert('failed',$e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('tarif-barang');
    }
    public function update_tarif_barang(){
        $id = $this->input->post('id_tarif_barang');
        $data['kode_barang'] = $this->input->post('kode_barang');
        $data['nama_barang'] = $this->input->post('nama_barang');
        $data['jenis_barang'] = $this->input->post('jenis_barang');
        $data['author'] = $this->input->post('author');
        $data['status'] = $this->input->post('status');
        $data['harga'] = $this->input->post('harga');
        $data['satuan'] = $this->input->post('satuan');
        try{
            $this->CheckKodeUpdate($data['kode_barang'],$id);
			$this->UpdateDataTarifBarang($data,$id);
            $alerts = GenerateDataAlert('success','Add Tarif Barang Success');
        }catch(Exception $e){
            $alerts = GenerateDataAlert('failed',$e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('tarif-barang');
    }
    public function delete_tarif_barang(){
        $id = $this->input->post('id_tarif_barang');
        try{
            $this->DeleteDataTarifBarang($id);
            $alerts = GenerateDataAlert('success','Delete Tarif Barang Success');
        }catch(Exception $e){
            $alerts = GenerateDataAlert('failed',$e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('tarif-barang');
	}
    
	private function UpdateDataTarifBarang($data,$id){
        $table = 'u1458735_po.tarif_barang';
		$col = array('id_tarif_barang');
		$par = array($id);
		$Update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function DeleteDataTarifBarang($id){
        $table = 'u1458735_po.tarif_barang';
		$col = array('id_tarif_barang');
		$par = array($id);
		if($id == null){
			throw new Exception("Data id user is missing");
		}
		if($this->DataModel->CheckUniversal($table,$col,$par) < 1){
			throw new Exception("Data not found");
		}
		$delete = $this->DataModel->DeleteData($table,$col,$par);
		if($delete['code'] != 0){
			// throw new Exception($update['message']);
			throw new Exception('Unknown error occurred');
		}
		return true;
	}
    private function GetAllJenisBarangData(){
        $select = '*';
        $table = 'u1458735_po.jenis_barang AS a';
        $where = null;
	    return $this->DataModel->GetData2($select,$table,$where); 
    }
	private function GetAllTarifBarangData($per_page,$keyword){
		$select = '*';
	    $table = 'u1458735_po.BARANG AS a';
        $where['a.status'] = 'OPEN';
        $order = 'a.KODE_BARANG ASC';
        $group = null;
        $join = [
            ['table' => 'u1458735_po.JENIS_BARANG AS b', 'condition' => 'a.JENIS_BARANG=b.JENIS_BARANG', 'type' => 'left']
        ];
        $url = 'tarif-barang';
        $like = is_string($keyword) ? ['LOWER(NAMA_BARANG)' => strtolower($keyword)] : NULL;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group,$like);
	}
    private function CheckKode($kode){
        $table = 'tarif_barang';
		$col = array('kode_barang');
		$par = array($kode);
		if($this->DataModel->CheckUniversal($table,$col,$par) > 0){
			throw new Exception("Kode barang already registered");
		}
		return true;
    }
    private function CheckKodeUpdate($kode,$id){
        $table = 'u1458735_po.tarif_barang';
		$col = array('kode_barang','id_tarif_barang');
		$par = array($kode,$id);
		if($this->DataModel->CheckUniversal($table,$col,$par) < 1){
            return $this->CheckKode($kode);
		}
		return true;
    }
	private function InsertData($data){
        $table = 'u1458735_po.tarif_barang';
		$insert = $this->DataModel->InsertData($table,$data);
		if($insert['code'] != 0){
			// throw new Exception($insert['message']);
			throw new Exception('Oops! Something went wrong');
		}
		return true;
	}
}
