<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
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
		$data['page'] = $data['folder'] = 'inventory';
		$data['folder'] = $data['menu']."/".$data['page'];
// 		$data['js'] = 'js_request_anggaran';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		$data['inventory'] = $this->GetAllInventoryData(10,null,null);
		$data['sarfas'] = $this->GetAllSarfasData(10,null,null);
		$data['jenis_barang'] = $this->GetAllJenisBarangData(10,null,null);
		
// 		print_r($data['jenis_barang']);
		$this->load->view('layout/layout',$data);
	}
	public function add_inventory(){
	    $data['no_inv'] = $this->input->post('no_inv');
	    $data['tgl_diterima'] = $this->input->post('tgl_diterima');
	    $data['nama_barang'] = $this->input->post('nama_barang');
	    $data['jenis'] = $this->input->post('jenis');
	    $data['spesifikasi_barang'] = $this->input->post('spesifikasi_barang');
	    $data['lokasi'] = $this->input->post('lokasi');
	    $data['jumlah'] = $this->input->post('jumlah');
	    $data['tgl_keluar'] = $this->input->post('tgl_keluar');
	    $data['dipakai_oleh'] = $this->input->post('dipakai_oleh');
	    $data['dipakai_untuk'] = $this->input->post('dipakai_untuk');
	    $data['keterangan'] = $this->input->post('keterangan');
	    $data['status'] = $this->input->post('status');
	    $data['lampiran'] = $this->input->post('lampiran');
	    try{
			$upload = $this->DataModel->uploadFile('dokumen', 'file/inventory', 10, 'jpg|jpeg|png', 'file_lampiran_' . str_replace('/', '-',  $data['no_inv']));
            if ($upload == NULL) {
                $alerts = GenerateDataAlert('failed', 'Upload File Gagal!');
                $this->session->set_flashdata('alerts', $alerts);
                return redirect('inventory', 'GET');
            }
            $data['lampiran'] = $upload;
            $data['author'] = $this->session->userdata('username');
			$this->InsertData($data,'inventory');
            $alerts = GenerateDataAlert('success','Berhasil menambahkan inventory');
        }catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
        // print_r($alerts);
        $this->session->set_flashdata('alerts', $alerts);
		redirect("inventory");
	    
	   // print_r($data);
	}
	public function edit_inventory(){
	    $id = $this->input->post('id_inventory');
	    $data['tgl_diterima'] = $this->input->post('tgl_diterima');
	    $data['nama_barang'] = $this->input->post('nama_barang');
	    $data['jenis'] = $this->input->post('jenis');
	    $data['spesifikasi_barang'] = $this->input->post('spesifikasi_barang');
	    $data['lokasi'] = $this->input->post('lokasi');
	    $data['jumlah'] = $this->input->post('jumlah');
	    $data['tgl_keluar'] = $this->input->post('tgl_keluar');
	    $data['dipakai_oleh'] = $this->input->post('dipakai_oleh');
	    $data['dipakai_untuk'] = $this->input->post('dipakai_untuk');
	    $data['keterangan'] = $this->input->post('keterangan');
	    $data['status'] = $this->input->post('status');
	    try{
			$this->UpdateDataInventory($data,$id);
            $alerts = GenerateDataAlert('success','Berhasil mengubah data inventory');
        }catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
        // print_r($alerts);
        $this->session->set_flashdata('alerts', $alerts);
		redirect("inventory");
	   // print_r($no_inv);
	   // print_r($data);
	    
	}
	public function add_laporan(){
	    $data['sarfas'] = $this->input->post('sarfas');
	    $data['priority'] = $this->input->post('priority');
	    $data['laporan_kerusakan'] = $this->input->post('laporan_kerusakan');
		$data['tgl'] = date('Y-m-d');
		try{
			$num = $this->GetLaporanNumber();
			$no_maintenance = 'M'.$num.'/'.GetRomawi(date('m')).'/'.date('Y');
			$upload = $this->DataModel->uploadFile('dokumen', 'file/maintenance', 10, 'jpg|jpeg|png', 'file_lampiran_' . str_replace('/', '-', $no_maintenance));
            if ($upload == NULL) {
                $alerts = GenerateDataAlert('failed', 'Upload File Gagal!');
                $this->session->set_flashdata('alerts', $alerts);
                return redirect('maintenance', 'GET');
            }
            $data['lampiran_1'] = $upload;
            $data['no_laporan'] = $no_maintenance;
			$data['status_laporan'] = 'Kerusakan dilaporkan';
			$data['author'] = $this->session->userdata('username');
			$this->InsertData($data,'laporan');
            $alerts = GenerateDataAlert('success','Berhasil menambahkan laporan');
        }catch(Exception $e){
			// echo $e->getMessage();
            $alerts = GenerateDataAlert('failed',$e->getMessage());
			
        }
        // print_r($alerts);
        $this->session->set_flashdata('alerts', $alerts);
		redirect("maintenance");
	   // print_r($data);
	}
	public function proses_laporan(){
        $id = $this->input->post('id');
		$data['tgl_proses'] = date('Y-m-d');
        $data['type'] = $this->input->post('type');
        $data['processor'] = $this->session->userdata('username');
        $data['status_laporan'] = 'Dalam proses';
        try{
			$this->UpdateDataLaporan($data,$id);
			$alerts = GenerateDataAlert('success','Laporan kerusakan berhasil di proses');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('maintenance','GET');
	}
	
	public function finish_laporan(){
        $id = $this->input->post('id');
		$data['tgl_selesai'] = date('Y-m-d');
        $data['pelaksanaan'] = $this->input->post('pelaksanaan');
        $data['saran'] = $this->input->post('saran');
        $data['status_laporan'] = 'Selesai diperbaiki';
        try{
            
			$upload = $this->DataModel->uploadFile('dokumen', 'file/maintenance', 10, 'jpg|jpeg|png', 'file_lampiran_2_' . str_replace('/', '-', $id));
			if ($upload == NULL) {
                $alerts = GenerateDataAlert('failed', 'Upload File Gagal!');
                $this->session->set_flashdata('alerts', $alerts);
                return redirect('maintenance', 'GET');
            }
            $data['lampiran_2'] = $upload;
			$this->UpdateDataLaporan($data,$id);
			$alerts = GenerateDataAlert('success','Laporan kerusakan berhasil di selesaikan');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('maintenance','GET');
        print_r($data);
	}
	
	private function GetLaporanNumber(){
		$select = '*';
	    $table = 'laporan_number';
	    $col = array('month','year');
	    $par = array(date('m'),date('Y'));
	    $num = $this->DataModel->GetData($select,$table,$col,$par);
		if($num == null){
			$new = array(
				'month'=>date('m'),
				'year'=>date('Y'),
				'number'=>001
			);
			$this->InsertData($new,$table);
			$data_num = '001';
		}else{
			$data_num = $num[0]['number'] + 1;
			$data_num = str_pad($data_num, 3, '0', STR_PAD_LEFT);
			$this->UpdateDataLaporanNumber($data_num,$num[0]['id_laporan_number']);
		}
		return $data_num;
	}
	private function UpdateDataLaporanNumber($data_num,$id){
        $table = 'laporan_number';
		$col = array('id_laporan_number');
		$par = array($id);
		$data['number'] = $data_num;
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception($update['message']);
			// throw new Exception('Unknown error occurred');
		}
		return true;
	}
	private function UpdateDataLaporan($data,$id){
        $table = 'laporan';
		$col = array('id_laporan');
		$par = array($id);
		$update = $this->DataModel->UpdateData($table,$col,$par,$data);
		if($update['code'] != 0){
			throw new Exception($update['message']);
			// throw new Exception('Unknown error occurred');
		}
		return true;
	}
	
	private function UpdateDataInventory($data,$id){
        $table = 'inventory';
		$col = array('id_inventory');
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
		    
			throw new Exception($insert['message']);
// 			throw new Exception('Oops! Something went wrong');
		}
		return true;
	}
	private function GetAllSarfasData($per_page,$keyword,$nip){
		$select = '*';
	    $table = 'sarfas AS a';
		$table2 = 'jenis';
		$join_param = 'id_jenis';
	    $col = null;
	    $par = null;
		$order = null;
	    return $this->DataModel->GetDataJoin($select,$table,$table2,$join_param,$col,$par,$order);  
	}
	private function GetAllJenisBarangData($per_page,$keyword,$nip){
		$select = '*';
	    $table = 'jenis_barang AS a';
	    $col = null;
	    $par = null;
		$order = null;
	    return $this->DataModel->GetData2($select,$table,$col,$par,$order);  
	}
	private function GetAllLaporanData($per_page,$keyword,$nip){
	    
		$from = $this->input->get('from');
        $to = $this->input->get('to');
        $priority = $this->input->get('priority');
        $status = $this->input->get('status');
        $urutkan = $this->input->get('urutkan') != NULL ? $this->input->get('urutkan') : 1;
        
		$status_text = ['all','Kerusakan dilaporkan', 'Dalam proses', 'Selesai diperbaiki'];
		$priority_text = ['all','Tinggi', 'Sedang', 'Rendah'];
	    
        $where = null;
	    !$status ?: $where['a.status_laporan'] = $status_text[$status];
	    !$priority ?: $where['a.priority'] = $priority_text[$priority];
        !$from ?: $where['a.tgl >= '] = date_format(date_create_from_format('d/m/Y', $from), 'Y-m-d');
        !$to ?: $where['a.tgl <= '] = date_format(date_create_from_format('d/m/Y', $to), 'Y-m-d');
	    
		$order_text = ['a.id_laporan DESC', 'a.id_laporan ASC'];
	    
        $select = '*';
	    $table = 'laporan AS a';
        
        $order = $order_text[$urutkan - 1];
        $group = null;
		$join = [
            ['table' => 'sarfas AS b', 'condition' => 'a.sarfas=b.id_sarfas', 'type' => 'left'],	
            ['table' => 'jenis AS c', 'condition' => 'b.id_jenis=c.id_jenis', 'type' => 'left']
        ];
        $url = 'maintenance';
        $like = '';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        // return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
        $laporan['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        $laporan['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        return $laporan;
	}
	private function GetAllInventoryData($per_page,$keyword,$nip){
	    
		$from = $this->input->get('from');
        $to = $this->input->get('to');
        $priority = $this->input->get('priority');
        $status = $this->input->get('status');
        $urutkan = $this->input->get('urutkan') != NULL ? $this->input->get('urutkan') : 1;
        
		$status_text = ['all','Kerusakan dilaporkan', 'Dalam proses', 'Selesai diperbaiki'];
		$priority_text = ['all','Tinggi', 'Sedang', 'Rendah'];
	    
        $where = null;
	    !$status ?: $where['a.status_laporan'] = $status_text[$status];
	    !$priority ?: $where['a.priority'] = $priority_text[$priority];
        !$from ?: $where['a.tgl >= '] = date_format(date_create_from_format('d/m/Y', $from), 'Y-m-d');
        !$to ?: $where['a.tgl <= '] = date_format(date_create_from_format('d/m/Y', $to), 'Y-m-d');
	    
		$order_text = ['a.id_inventory DESC', 'a.id_inventory ASC'];
	    
        $select = '*';
	    $table = 'inventory AS a';
        
        $order = $order_text[$urutkan - 1];
        $group = null;
        // $join = null;
		$join = [
            ['table' => 'jenis_barang AS b', 'condition' => 'a.jenis=b.id_jenis_barang', 'type' => 'left'],	
            // ['table' => 'jenis AS c', 'condition' => 'b.id_jenis=c.id_jenis', 'type' => 'left']
        ];
        $url = 'inventory';
        $like = '';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        // return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
        $laporan['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        $laporan['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        return $laporan;
	}
}
