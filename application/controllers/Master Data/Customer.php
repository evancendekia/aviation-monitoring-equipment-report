<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
        $data['page'] = 'customer_list';
        $data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_customer_list';
        $data['alerts'] = $this->session->flashdata('alerts');
//        $data['filter'] = $this->GetFilter();
        $data['customer'] = $this->GetAllCustomerList();
//        echo json_encode($data);
        $this->load->view('layout/layout', $data);
    }

    private function GetAllCustomerList() {
        $keyword = $this->input->get('keyword');
//        if (!is_string($keyword)) {
//            return redirect('customer-list');
//        }
        $like = is_string($keyword) ? ['LOWER(NAMA_CUSTOMER)' => strtolower($keyword)] : NULL;
        $where['STATUS'] = 'AKTIF';
        $order = 'KODE_CUSTOMER ASC';
        $group = NULL;
        $select = ['*'];
        $table = 'u1458735_ops.customer';
        $join = [];
        $url = 'customer-list';
        $per_page = 20;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
    }


}
