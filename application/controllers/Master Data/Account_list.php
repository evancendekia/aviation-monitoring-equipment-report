<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_list extends CI_Controller {

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
        $data['page'] = 'account_list';
        $data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_account_list';
        $data['alerts'] = $this->session->flashdata('alerts');
        $data['filter'] = $this->GetFilter();
        $data['account_list'] = $this->GetAllAccountList();
//        echo json_encode($data['account_list']);
        $this->load->view('layout/layout', $data);
    }

    public function create_account() {
        //data account
        $data['kode_account_list'] = $this->input->post('kode_header') . $this->input->post('kode_account_list');
        $data['nama_account_list'] = $this->input->post('nama_account_list');
        $data['balance'] = $this->input->post('is_header') == 0 ? $this->input->post('balance') : 0;
        $data['kode_header'] = $this->input->post('kode_header');
        $data['is_header'] = $this->input->post('is_header');
//        $data['tipe_account_list'] = $this->input->post('tipe_account_list');
        $data['author'] = $this->session->userdata('NIP');
        $data['status'] = 'OPEN';
        $data['set_time'] = date('d-m-Y');

        //data header
        $data_header['is_header'] = 1;
        try {
            $this->CheckKode($data['kode_account_list']);
            $this->InsertData($data);
            $this->UpdateHeaderAccount($data_header, $data['kode_header']);
            $alerts = GenerateDataAlert('success', 'Add Account Success');
        } catch (Exception $e) {
            $alerts = GenerateDataAlert('failed', $e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('account-list');
    }

    public function update_account() {
        $id = $this->input->post('id_account_list');
        $data['kode_account_list'] = $this->input->post('kode_account_list');
        $data['nama_account_list'] = $this->input->post('nama_account_list');
        $data['is_header'] = $this->input->post('isHeader');
//        $data['tipe_account_list'] = $this->input->post('tipe_account_list');
        try {
            $this->CheckKodeUpdate($data['kode_account_list'], $id);
            $this->UpdateDataAccountList($data, $id);
            $alerts = GenerateDataAlert('success', 'Edit Account Success');
        } catch (Exception $e) {
            $alerts = GenerateDataAlert('failed', $e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('account-list');
    }

    public function delete_account() {
        $id = $this->input->post('id_account_list');
        try {
            $this->DeleteDataAccount($id);
            $header = $this->DataModel->GetRowData('kode_header', 'account_list', ['id_account_list'], ["$id"]);
            if ($this->countDetail($header['kode_header']) < 1) {
                //update status is_header dari header account
                $data['is_header'] = 0;
                $this->UpdateHeaderAccount($data, $header['kode_header']);
            }
            $alerts = GenerateDataAlert('success', 'Delete Account Success');
        } catch (Exception $e) {
            $alerts = GenerateDataAlert('failed', $e->getMessage());
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('account-list');
    }

    private function UpdateHeaderAccount($data, $kode) {
        $table = 'account_list';
        $col = array('kode_account_list');
        $par = array($kode);
        $update = $this->DataModel->UpdateData($table, $col, $par, $data);
        if ($update['code'] != 0) {
            throw new Exception('Unknown error occurred');
        }
        return true;
    }

    private function UpdateDataAccountList($data, $id) {
        $table = 'account_list';
        $col = array('id_account_list');
        $par = array($id);
        $update = $this->DataModel->UpdateData($table, $col, $par, $data);
        if ($update['code'] != 0) {
            throw new Exception('Unknown error occurred');
        }
        return true;
    }

    private function DeleteDataAccount($id) {
        $table = 'account_list';
        $data['status'] = 'CLOSE';
        $col = array('id_account_list');
        $par = array($id);
        if ($id == null) {
            throw new Exception("Data id account is missing");
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

    private function countDetail($kode_header) {
        $table = 'account_list';
        $col = array('kode_header', 'status');
        $par = array($kode_header, 'OPEN');
        return $this->DataModel->CheckUniversal($table, $col, $par);
    }

    private function GetFilter() {
        $select = '*';
        $table = 'account_list';
        $col = array('kode_header');
        $par = array(0);
        return $this->DataModel->GetData($select, $table, $col, $par);
    }

    private function GetAllAccountList() {
        $kode_header = $this->input->get('kode_header');
        if (is_numeric($kode_header) && $kode_header < 1) {
            return redirect('account-list');
        }
        $where = is_numeric($kode_header) ? ['SUBSTRING(a.kode_account_list, 1, 1) = ' => $kode_header] : NULL;
        $where['a.status'] = 'OPEN';
        $order = 'a.kode_account_list ASC';
        $group = 'a.id_account_list';
        $select = ['a.id_account_list', 'a.kode_account_list', 'a.nama_account_list', 'a.tipe_account_list', 'a.is_header',
            'a.kode_header', 'b.nama_account_list as header', 'mata_uang.simbol', 'a.balance', 'a.author', 'a.set_time', 'a.status'];
        $table = 'account_list AS a';
        $join = [
            ['table' => 'account_list AS b', 'condition' => 'a.kode_header=b.kode_account_list', 'type' => 'left'],
            ['table' => 'mata_uang', 'condition' => 'a.kode_mata_uang=mata_uang.kode_mata_uang', 'type' => 'left']
        ];
        $url = 'account-list';
        $per_page = 20;
        return $this->DataModel->GetDataPagination2($select, $table, $join, $url, $per_page, $where, $order, $group);
    }

    private function CheckKode($kode) {
        $table = 'account_list';
        $col = array('kode_account_list');
        $par = array($kode);
        if ($this->DataModel->CheckUniversal($table, $col, $par) > 0) {
            throw new Exception("Kode Account List already registered");
        }
        return true;
    }

    private function CheckKodeUpdate($kode, $id) {
        $table = 'account_list';
        $col = array('kode_account_list', 'id_account_list');
        $par = array($kode, $id);
        if ($this->DataModel->CheckUniversal($table, $col, $par) < 1) {
            return $this->CheckKode($kode);
        }
        return true;
    }

    private function InsertData($data) {
        $table = 'account_list';
        $insert = $this->DataModel->InsertData($table, $data);
        if ($insert['code'] != 0) {
            // throw new Exception($insert['message']);
            throw new Exception('Oops! Something went wrong');
        }
        return true;
    }

}
