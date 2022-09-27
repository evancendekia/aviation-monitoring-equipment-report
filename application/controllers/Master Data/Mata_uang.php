<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_uang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('DataModel');
        if ($this->session->userdata('IsLoggedIn') != TRUE) {
            $alerts = GenerateDataAlert('oops', 'Your session is expired');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('login');
        }
    }

    public function index() {
        $data['menu'] = 'Master Data';
        $data['page'] = 'mata_uang';
        $data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_mata_uang';
        $data['alerts'] = $this->session->flashdata('alerts');
//        $data['filter'] = $this->GetFilter();
        $data['mata_uang'] = $this->GetAllMataUang();
//        echo json_encode($data['mata_uang']);
        $this->load->view('layout/layout', $data);
    }

    public function create_mata_uang() {
        //data account
        $data['simbol'] = $this->input->post('simbol');
        $data['text'] = $this->input->post('keterangan');
        $data['konversi'] = str_replace(',','.',str_replace('.','',str_replace('Rp ','',$this->input->post('konversi'))));
//        $data['tipe_mata_uang'] = $this->input->post('tipe_mata_uang');
        $data['author'] = $this->session->userdata('NIP');
        $data['status'] = 'OPEN';
        $data['set_time'] = date('d-m-Y');
        echo json_encode($data);
        try {
            $this->InsertData($data);
            $alerts = GenerateDataAlert('success', 'Add Mata Uang Success');
        } catch (Exception $e) {
            $alerts = GenerateDataAlert('failed', $e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('mata-uang');
    }

    public function update_mata_uang() {
        $id = $this->input->post('id_mata_uang');
        $data['simbol'] = $this->input->post('simbol');
        $data['text'] = $this->input->post('keterangan');
        $data['konversi'] = str_replace(',','.',str_replace('.','',str_replace('Rp ','',$this->input->post('konversi'))));
//        $data['tipe_mata_uang'] = $this->input->post('tipe_mata_uang');
        try {
            $this->UpdateDataMataUang($data, $id);
            $alerts = GenerateDataAlert('success', 'Edit Mata Uang Success');
        } catch (Exception $e) {
            $alerts = GenerateDataAlert('failed', $e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('mata-uang');
    }

    public function delete_mata_uang() {
        $id = $this->input->post('id_mata_uang');
        try {
            $this->DeleteMataUang($id);            
            $alerts = GenerateDataAlert('success', 'Delete Mata Uang Success');
        } catch (Exception $e) {
            $alerts = GenerateDataAlert('failed', $e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('mata-uang');
    }

    private function UpdateDataMataUang($data, $id) {
        $table = 'mata_uang';
        $col = array('id_mata_uang');
        $par = array($id);
        $update = $this->DataModel->UpdateData($table, $col, $par, $data);
        if ($update['code'] != 0) {
            throw new Exception('Unknown error occurred');
        }
        return true;
    }

    private function DeleteMataUang($id) {
        $table = 'mata_uang';
        $data['status'] = 'CLOSE';
        $col = array('id_mata_uang');
        $par = array($id);
        if ($id == null) {
            throw new Exception("Data id mata uang is missing");
        }
        if ($this->DataModel->CheckUniversal($table, $col, $par) < 1) {
            throw new Exception("Data not found");
        }
        $delete = $this->DataModel->UpdateData($table, $col, $par, $data);
        if ($delete['code'] != 0) {
            // throw new Exception($update['message']);
            throw new Exception('Unknown error occurred');
        }
        return true;
    }

    private function GetAllMataUang() {
//        $kode_header = $this->input->get('kode_header');
//        if (is_numeric($kode_header) && $kode_header < 1) {
//            return redirect('account-list');
//        }
//        $where = is_numeric($kode_header) ? ['SUBSTRING(a.kode_mata_uang, 1, 1) = ' => $kode_header] : NULL;
        $where['status'] = 'OPEN';
        $order = 'id_mata_uang ASC';
        $select = ['*'];
        $table = 'mata_uang';
        $join = [];
        $url = 'mata-uang';
        $per_page = 20;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order);
    }

    private function InsertData($data) {
        $table = 'mata_uang';
        $insert = $this->DataModel->InsertData($table, $data);
        if ($insert['code'] != 0) {
             throw new Exception($insert['message']);
//            throw new Exception('Oops! Something went wrong');
        }
        return true;
    }

}
