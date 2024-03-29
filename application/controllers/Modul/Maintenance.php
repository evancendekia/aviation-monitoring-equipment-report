<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {
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
		$data['page'] = $data['folder'] = 'maintenance';
		$data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_maintenance';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		$data['laporan'] = $this->GetAllLaporanData(10,null,null);
		$data['page_num'] = $this->input->get('page') ? $this->input->get('page') : 1;
		$data['laporan_all'] = $this->GetAllLaporanDataAll();
		$data['sarfas'] = $this->GetAllSarfasData();
		$this->load->view('layout/layout',$data);
        // print_r($data['laporan']);
        // print_r($data['laporan_all']);
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
	
	public function add_evident(){
		$id_laporan = $this->input->post('id_laporan');
		$origin = $this->input->post('origin');
		$id_checklist = $this->input->post('id_checklist');
		try{
			$laporan = $this->GetSpecificLaporan($id_laporan);
			if(isset($laporan) && $laporan[0] != null){
				$no_maintenance = $laporan[0]['no_laporan'];
				$upload = $this->DataModel->uploadFile('dokumen', 'file/maintenance', 10, 'jpg|jpeg|png', 'file_lampiran_' . str_replace('/', '-', $no_maintenance));
				if ($upload == NULL) {
					$alerts = GenerateDataAlert('failed', 'Upload File Gagal!');
					$this->session->set_flashdata('alerts', $alerts);
					return redirect('maintenance', 'GET');
				}
				$data['lampiran_1'] = $upload;
				$data['status_laporan'] = 'Kerusakan dilaporkan';
				$data['priority'] = $this->input->post('priority');
				$this->UpdateDataLaporan($data,$id_laporan);
				$alerts = GenerateDataAlert('success','Berhasil upload data evident');
				if($origin == 'checklist'){
					$this->UpdateEvidentNumber($id_checklist);
				}
			}
        }catch(Exception $e){
			// echo $e->getMessage();
            $alerts = GenerateDataAlert('failed',$e->getMessage());
        }
        // print_r($alerts);
        $this->session->set_flashdata('alerts', $alerts);
		if($origin == 'maintenance'){
			redirect("maintenance");
		}else{
			redirect("checklist/detail?id=$id_checklist");
		}
	   // print_r($data);
	}
	public function proses_laporan(){
        $id = $this->input->post('id');
		$data['tgl_proses'] = date('Y-m-d');
        $data['laporan_type'] = $this->input->post('type');
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
        $data['status_laporan'] = 'Menunggu approval OH';
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
	}
	public function approve_laporan(){
        $id = $this->input->post('id_laporan');
        $data['status_laporan'] = 'Selesai diperbaiki';
        // print_r($id);
        try{
			$this->UpdateDataLaporan($data,$id);
			$alerts = GenerateDataAlert('success','Laporan kerusakan berhasil di approve');
		}catch(Exception $e){
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		redirect('maintenance','GET');
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
	private function InsertData($data,$table){
		$insert = $this->DataModel->InsertData($table,$data);
		if($insert['code'] != 0){
			throw new Exception('Oops! Something went wrong');
		}
		return true;
	}
	// private function GetAllSarfasData($per_page,$keyword,$nip){
	// 	$select = '*';
	//     $table = 'sarfas AS a';
	// 	$table2 = 'jenis';
	// 	$join_param = 'id_jenis';
	//     $col = null;
	//     $par = null;
	// 	$order = null;
	//     return $this->DataModel->GetDataJoin($select,$table,$table2,$join_param,$col,$par,$order);  
	// }
	
	private function GetAllSarfasData(){
		$select = '*';
		$table = 'filter';
		$col = array();
		$par = array();
		$order = 'kode ASC';
		return $this->DataModel->GetData($select,$table,$col,$par,$order);
	}
	private function GetSpecificLaporan($id_laporan){
		$select = '*';
		$table = 'laporan';
		$col = array('id_laporan');
		$par = array($id_laporan);
		return $this->DataModel->GetData($select,$table,$col,$par);
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
            // ['table' => 'sarfas AS b', 'condition' => 'a.sarfas=b.id_sarfas', 'type' => 'left'],	
            ['table' => 'filter AS b', 'condition' => 'a.sarfas=b.id_filter', 'type' => 'left']
        ];
        $url = 'maintenance';
        $like = '';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        // return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
        $laporan['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        $laporan['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        return $laporan;
	}
	
	private function GetAllLaporanDataAll(){
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
            ['table' => 'filter AS b', 'condition' => 'a.sarfas=b.id_filter', 'type' => 'left']
        ];
        
        
        $like = null;
        
        $laporan['data'] = $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group, $join);
        return $laporan;
	}
	
	private function UpdateEvidentNumber($id_checklist){
		$select = 'evident';
		$table = 'checklist_value';
		$col = array('id_checklist_value');
		$par = array($id_checklist);
		$data_checklist = $this->DataModel->GetData($select,$table,$col,$par);

		if($data_checklist[0]['evident'] > 0){
			$data['evident'] = $data_checklist[0]['evident'] - 1;
			$update = $this->DataModel->UpdateData($table,$col,$par,$data);
			if($update['code'] != 0){
				throw new Exception($update['message']);
				// throw new Exception('Unknown error occurred');
			}
			return true;
		}
	}
}
