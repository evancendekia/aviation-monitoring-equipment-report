<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('DataModel');
        if($this->session->userdata('IsLoggedIn') != TRUE){
            $alerts = GenerateDataAlert('oops','Your session is expired');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('login');
        }
    }
	public function index(){
		$data['menu'] = 'Modul';
		$data['page'] = 'checklist';
		$data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_checklist';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		$data['sarfas'] = $this->GetAllSarfasData();
		$data['checklist'] = $this->GetAllChecklistData(10,null,null);
		// $data['laporan'] = $this->GetAllLaporanData(10,null,null);
		// $data['laporan_all'] = $this->GetAllLaporanDataAll();
		$this->load->view('layout/layout',$data);
        // print_r($data['checklist']);
	}
	public function detail(){
		$data['menu'] = 'Modul';
		$data['page'] = 'detail_checklist';
		$data['folder'] = $data['menu']."/checklist";
        $data['js'] = 'js_checklist';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
        $id = $this->input->get('id');
		$data['checklist'] = $this->GetDetailChecklistData($id);
		$data['sarfas'] = $this->GetAllSarfasData();
		$this->load->view('layout/layout',$data);
        // print_r($data['checklist'][0]);
        // print_r(unserialize($data['checklist'][0]['II_1']));
	}
    
	public function add_form(){
		$data['menu'] = 'Modul';
		$data['page'] = 'add_checklist';
		$data['folder'] = $data['menu']."/checklist";
        $data['js'] = 'js_checklist';
		$data['alerts'] = $this->session->flashdata('alerts');
		$data['role'] = $role = $this->session->userdata('role');
		$data['checklist'] = $this->GetAllChecklistData(10,null,null);
		// $data['laporan'] = $this->GetAllLaporanData(10,null,null);
		// $data['laporan_all'] = $this->GetAllLaporanDataAll();
		$data['sarfas'] = $this->GetAllSarfasData();
		$this->load->view('layout/layout',$data);
        // print_r($data['checklist']);
	}
	public function add(){
	    try{
	    $day =date("l");
	    $date =date("Ymd");
	    $time = date("H:i");
	    $sarfas = $this->input->post('equipment');
	    $group = $this->input->post('group');
        $truck_conditions_code = array(
            'II_1','II_2','II_3','II_4','II_5',
            'II_6','II_7','II_8','II_9','II_10',
            'II_11','II_12','II_13','II_14','II_15',
            'II_16','II_17','II_18','II_19');
        $tank_condition_code = array(
            'III_1','III_2','III_3','III_4');
        $safety_equipment_code = array(
            'IV_1','IV_2','IV_3','IV_4','IV_5',
            'IV_6','IV_7');
        $refueling_equipment_before_code = array(
            '','','','V_B_4','V_B_5',
            'V_B_6','V_B_7','V_B_8');
        $sub_re_code = array(
            're_0' => array('V_B_1_1','V_B_1_2'),
            're_1' => array('V_B_2_1','V_B_2_2'),
            're_2' => array('V_B_3_1','V_B_3_2')
        );
        $refueling_equipment_during_code = array(
            'V_D_1','V_D_2','V_D_3','V_D_4');
        $others_code = array(
                    'VI_1','VI_2','VI_3','VI_4');
        for($i=0;$i<count($truck_conditions_code);$i++){
            $data[$truck_conditions_code[$i]]['check'] = $this->input->post('S_'.$truck_conditions_code[$i]) == 1 ? 'S' : ($this->input->post('C_'.$truck_conditions_code[$i]) == 1  ? 'C' : '');
            $data[$truck_conditions_code[$i]]['Remarks'] = $this->input->post('Remarks_'.$truck_conditions_code[$i]);
            $data[$truck_conditions_code[$i]] = serialize($data[$truck_conditions_code[$i]]);
        };
        for($i=0;$i<count($tank_condition_code);$i++){
            $data[$tank_condition_code[$i]]['check'] = $this->input->post('S_'.$tank_condition_code[$i]) == 1 ? 'S' : ($this->input->post('C_'.$tank_condition_code[$i]) == 1  ? 'C' : '');
            $data[$tank_condition_code[$i]]['Remarks'] = $this->input->post('Remarks_'.$tank_condition_code[$i]);
            $data[$tank_condition_code[$i]] = serialize($data[$tank_condition_code[$i]]);
        };
        for($i=0;$i<count($safety_equipment_code);$i++){
            $data[$safety_equipment_code[$i]]['check'] = $this->input->post('S_'.$safety_equipment_code[$i]) == 1 ? 'S' : ($this->input->post('C_'.$safety_equipment_code[$i]) == 1  ? 'C' : '');
            $data[$safety_equipment_code[$i]]['Remarks'] = $this->input->post('Remarks_'.$safety_equipment_code[$i]);
            $data[$safety_equipment_code[$i]] = serialize($data[$safety_equipment_code[$i]]);
        };
        for($i=0;$i<count($refueling_equipment_before_code);$i++){
            if($i <3){
                for($j=0; $j<count($sub_re_code["re_$i"]);$j++){
                    
                $data[$sub_re_code["re_$i"][$j]]['check'] = $this->input->post('S_'.$sub_re_code["re_$i"][$j]) == 1 ? 'S' : ($this->input->post('C_'.$sub_re_code["re_$i"][$j]) == 1  ? 'C' : '');
                $data[$sub_re_code["re_$i"][$j]]['Remarks'] = $this->input->post('Remarks_'.$sub_re_code["re_$i"][$j]);
                $data[$sub_re_code["re_$i"][$j]] = serialize($data[$sub_re_code["re_$i"][$j]]);
                }
                
            }else{
                $data[$refueling_equipment_before_code[$i]]['check'] = $this->input->post('S_'.$refueling_equipment_before_code[$i]) == 1 ? 'S' : ($this->input->post('C_'.$refueling_equipment_before_code[$i]) == 1  ? 'C' : '');
                $data[$refueling_equipment_before_code[$i]]['Remarks'] = $this->input->post('Remarks_'.$refueling_equipment_before_code[$i]);
                $data[$refueling_equipment_before_code[$i]] = serialize($data[$refueling_equipment_before_code[$i]]);
            }
        };
        for($i=0;$i<count($refueling_equipment_during_code);$i++){
            $data[$refueling_equipment_during_code[$i]]['check'] = $this->input->post('S_'.$refueling_equipment_during_code[$i]) == 1 ? 'S' : ($this->input->post('C_'.$refueling_equipment_during_code[$i]) == 1  ? 'C' : '');
            $data[$refueling_equipment_during_code[$i]]['Remarks'] = $this->input->post('Remarks_'.$refueling_equipment_during_code[$i]);
            $data[$refueling_equipment_during_code[$i]] = serialize($data[$refueling_equipment_during_code[$i]]);
        };
        for($i=0;$i<count($others_code);$i++){
            $data[$others_code[$i]]['check'] = $this->input->post('S_'.$others_code[$i]) == 1 ? 'S' : ($this->input->post('C_'.$others_code[$i]) == 1  ? 'C' : '');
            $data[$others_code[$i]]['Remarks'] = $this->input->post('Remarks_'.$others_code[$i]);
            $data[$others_code[$i]] = serialize($data[$others_code[$i]]);
        };

        // print_r($input);
        // foreach(array_keys($data) as $key){
        //     print_r($key);
        //     print_r("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        //     print_r($data[$key]);
        //     print_r("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        //     print_r(unserialize($data[$key]));
        //     print_r("<br>");
        // }
        
	    $data['day'] = $day;
	    $data['date'] = $date;
	    $data['time'] = $time;
	    $data['sarfas'] = $sarfas;
	    $data['group'] = $group;
        // print_r("<br>");
        // print_r($data);
        // print_r("<br>");
        $this->InsertData($data,'checklist_value');
		$alerts = GenerateDataAlert('success','Berhasil menambahkan lapora n');
        // print_r($insert);
	    }catch(Exception $e){
        // print_r("<br>");
        // print_r("<br>");
	    //     print_r($e);
			$alerts = GenerateDataAlert('failed',$e->getMessage());
		}
		$this->session->set_flashdata('alerts', $alerts);
		return redirect('checklist', 'GET');
		
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
// 			throw new Exception('Oops! Something went wrong');
			throw new Exception($insert);
		}
		return true;
	}
	private function GetAllSarfasData(){
		$select = '*';
		$table = 'filter';
		$col = array();
		$par = array();
		$order = 'kode ASC';
		return $this->DataModel->GetData($select,$table,$col,$par,$order);
	}

    private function GetAllChecklistData($per_page,$keyword,$nip){
	    
		
		$from = $this->input->get('from');
        $to = $this->input->get('to');
		$equipment = $this->input->get('equipment');
        $urutkan = $this->input->get('urutkan') != NULL ? $this->input->get('urutkan') : 1;

        $where = null;
		!$equipment ?: $where['kode'] = $equipment;
        !$from ?: $where['a.date >= '] = date_format(date_create_from_format('d/m/Y', $from), 'Ymd');
        !$to ?: $where['a.date <= '] = date_format(date_create_from_format('d/m/Y', $to), 'Ymd');

		$order_text = ['a.date DESC, a.sarfas ASC', 'a.date ASC, a.sarfas ASC'];

	    
	    
        $select = 'id_checklist_value AS id, day, date, time, sarfas, group, b.type, b.kode';
	    $table = 'checklist_value AS a';
        
        $order = $order_text[$urutkan - 1];
        $group = null;
		$join = [
            ['table' => 'filter AS b', 'condition' => 'a.sarfas=b.id_filter', 'type' => 'left'],	
        ];
        $url = 'checklist';
        $like = '';
        // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
        // return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
        $laporan['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        $laporan['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        return $laporan;
	}
    
	private function GetDetailChecklistData($id){

		$where = "id_checklist_value = '$id'";
		$select = '*';
		$table = 'checklist_value AS a';
		$order = null;	
		$group = null;
		$join = [
            ['table' => 'filter AS b', 'condition' => 'a.sarfas=b.id_filter', 'type' => 'left'],	
        ];
		$like = null;
		
        return $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group, $join);
		// $laporan['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
		// $laporan['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
		// return $laporan;
	    // return $this->DataModel->GetDataJoin($select,$table,$table2,$join_param);  
	}
	// private function GetAllLaporanData($per_page,$keyword,$nip){
	    
	// 	$from = $this->input->get('from');
    //     $to = $this->input->get('to');
    //     $priority = $this->input->get('priority');
    //     $status = $this->input->get('status');
    //     $urutkan = $this->input->get('urutkan') != NULL ? $this->input->get('urutkan') : 1;
        
	// 	$status_text = ['all','Kerusakan dilaporkan', 'Dalam proses', 'Selesai diperbaiki'];
	// 	$priority_text = ['all','Tinggi', 'Sedang', 'Rendah'];
	    
    //     $where = null;
	//     !$status ?: $where['a.status_laporan'] = $status_text[$status];
	//     !$priority ?: $where['a.priority'] = $priority_text[$priority];
    //     !$from ?: $where['a.tgl >= '] = date_format(date_create_from_format('d/m/Y', $from), 'Y-m-d');
    //     !$to ?: $where['a.tgl <= '] = date_format(date_create_from_format('d/m/Y', $to), 'Y-m-d');
	    
	// 	$order_text = ['a.id_laporan DESC', 'a.id_laporan ASC'];
	    
    //     $select = '*';
	//     $table = 'laporan AS a';
        
    //     $order = $order_text[$urutkan - 1];
    //     $group = null;
	// 	$join = [
    //         ['table' => 'sarfas AS b', 'condition' => 'a.sarfas=b.id_sarfas', 'type' => 'left'],	
    //         ['table' => 'jenis AS c', 'condition' => 'b.id_jenis=c.id_jenis', 'type' => 'left']
    //     ];
    //     $url = 'maintenance';
    //     $like = '';
    //     // $like = is_string($keyword) ? ['LOWER(NAMA_SUPPLIER)' => strtolower($keyword)] : NULL;
    //     // return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
    //     $laporan['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
    //     $laporan['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
    //     return $laporan;
	// }
	
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
            ['table' => 'sarfas AS b', 'condition' => 'a.sarfas=b.id_sarfas', 'type' => 'left'],	
            ['table' => 'jenis AS c', 'condition' => 'b.id_jenis=c.id_jenis', 'type' => 'left']
        ];
        
        
        $like = null;
        
        $laporan['data'] = $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group, $join);
        return $laporan;
	}
}
