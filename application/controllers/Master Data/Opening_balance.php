<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Opening_balance extends CI_Controller {

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
        $data['page'] = 'opening_balance';
        $data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_opening_balance';
        $data['alerts'] = $this->session->flashdata('alerts');
        $data['filter'] = $this->GetFilter();
        $data['account_list'] = $this->GetAllAccountList();
//        echo json_encode($data['account_list']);
        $this->load->view('layout/layout', $data);
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
            'a.kode_header', 'b.nama_account_list as header', 'a.balance', 'a.author', 'a.set_time', 'a.status'];
        $table = 'account_list AS a';
        $join = [
            ['table' => 'account_list AS b', 'condition' => 'a.kode_header=b.kode_account_list', 'type' => 'left']
        ];
        $url = 'opening-balance';
        $per_page = 20;
        return $this->DataModel->GetDataPagination2($select, $table, $join, $url, $per_page, $where, $order, $group);
    }
}
