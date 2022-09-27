<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Link_account extends CI_Controller {

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
        $data['page'] = 'link_account';
        $data['folder'] = $data['menu']."/".$data['page'];
        $data['js'] = 'js_link_account';
        $data['alerts'] = $this->session->flashdata('alerts');
//        $data['filter'] = $this->GetFilter();
        $data['account_list'] = $this->GetAllAccountList();
        $data['bank'] = $this->getAllBank();
        $data['sales'] = $this->getAllSales();
        $data['purchases'] = $this->getAllPurchases();
//        echo json_encode($data['account_list']);
        $this->load->view('layout/layout', $data);
    }

    public function update_link_account() {
//        echo json_encode($this->input->post());
        $error = 0;
        $type = $this->input->post('type');
        if ($type == 'bank') {
            $error = $this->updateBank();
        }

        if ($type == 'sales') {
            $error = $this->updateSales();
        }
        
        if($type == 'purchases'){
            $error = $this->updatePurchases();
        }

//        $data['tipe_account_list'] = $this->input->post('tipe_account_list');
        if ($error == 0) {
            $alerts = GenerateDataAlert('success', 'Edit Link Account Success');
        } else {
            $alerts = GenerateDataAlert('failed', 'Edit Link Account Gagal');
        }
        $this->session->set_flashdata('alerts', $alerts);
        redirect('link-account');
    }

    private function updateBank() {
        $error = 0;
        if ($this->input->post('historical_balancing') != NULL && $this->input->post('historical_balancing') != 0) {
            $data['id_account_list'] = $this->input->post('historical_balancing');
            $data['kode_account'] = $this->getKodeAccount($this->input->post('historical_balancing'));
            $error = $this->UpdateDataLinkAccount($data, 3) != true ? $error + 1 : $error;
        }
        if ($this->input->post('undeposited_funds') != NULL && $this->input->post('undeposited_funds') != 0) {
            $data['id_account_list'] = $this->input->post('undeposited_funds');
            $data['kode_account'] = $this->getKodeAccount($this->input->post('undeposited_funds'));
            $error = $this->UpdateDataLinkAccount($data, 4) != true ? $error + 1 : $error;
        }
        if ($this->input->post('currency_gain_loss') != NULL && $this->input->post('currency_gain_loss') != 0) {
            $data['id_account_list'] = $this->input->post('currency_gain_loss');
            $data['kode_account'] = $this->getKodeAccount($this->input->post('currency_gain_loss'));
            $error = $this->UpdateDataLinkAccount($data, 5) != true ? $error + 1 : $error;
        }
        return $error;
    }

    private function updateSales() {
        if ($this->input->post('tracking_receivable') != NULL && $this->input->post('tracking_receivable') != 0) {
            $data['id_account_list'] = $this->input->post('tracking_receivable');
            $data['kode_account'] = $this->getKodeAccount($this->input->post('tracking_receivable'));
            $error = $this->UpdateDataLinkAccount($data, 6) != true ? $error + 1 : $error;
        }
        if ($this->input->post('customer_receipt') != NULL && $this->input->post('customer_receipt') != 0) {
            $data['id_account_list'] = $this->input->post('customer_receipt');
            $data['kode_account'] = $this->getKodeAccount($this->input->post('customer_receipt'));
            $error = $this->UpdateDataLinkAccount($data, 7) != true ? $error + 1 : $error;
        }

        $data['id_account_list'] = $this->input->post('freight') != NULL && $this->input->post('freight') != 0 ? $this->input->post('freight') : NULL;
        $data['kode_account'] = $this->input->post('freight') != NULL ? $this->getKodeAccount($this->input->post('freight')) : NULL;
        $data['is_active'] = $this->input->post('status_freight') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 8) != true ? $error + 1 : $error;

        $data['id_account_list'] = $this->input->post('customer_deposit') != NULL && $this->input->post('customer_deposit') != 0 ? $this->input->post('customer_deposit') : NULL;
        $data['kode_account'] = $this->input->post('customer_deposit') != NULL ? $this->getKodeAccount($this->input->post('customer_deposit')) : NULL;
        $data['is_active'] = $this->input->post('status_customer_deposit') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 9) != true ? $error + 1 : $error;

        $data['id_account_list'] = $this->input->post('discount') != NULL && $this->input->post('discount') != 0 ? $this->input->post('discount') : NULL;
        $data['kode_account'] = $this->input->post('discount') != NULL ? $this->getKodeAccount($this->input->post('discount')) : NULL;
        $data['is_active'] = $this->input->post('status_discount') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 10) != true ? $error + 1 : $error;

        $data['id_account_list'] = $this->input->post('late_charge') != NULL && $this->input->post('late_charge') != 0 ? $this->input->post('late_charge') : NULL;
        $data['kode_account'] = $this->input->post('late_charge') != NULL ? $this->getKodeAccount($this->input->post('late_charge')) : NULL;
        $data['is_active'] = $this->input->post('status_late_charge') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 11) != true ? $error + 1 : $error;
        
        return $error;
    }
    
    private function updatePurchases() {
        if ($this->input->post('tracking_payable') != NULL && $this->input->post('tracking_payable') != 0) {
            $data['id_account_list'] = $this->input->post('tracking_payable');
            $data['kode_account'] = $this->getKodeAccount($this->input->post('tracking_payable'));
            $error = $this->UpdateDataLinkAccount($data, 12) != true ? $error + 1 : $error;
        }
        if ($this->input->post('paying_bill') != NULL && $this->input->post('paying_bill') != 0) {
            $data['id_account_list'] = $this->input->post('paying_bill');
            $data['kode_account'] = $this->getKodeAccount($this->input->post('paying_bill'));
            $error = $this->UpdateDataLinkAccount($data, 13) != true ? $error + 1 : $error;
        }

        $data['id_account_list'] = $this->input->post('item_receipt') != NULL && $this->input->post('item_receipt') != 0 ? $this->input->post('item_receipt') : NULL;
        $data['kode_account'] = $this->input->post('item_receipt') != NULL ? $this->getKodeAccount($this->input->post('item_receipt')) : NULL;
        $data['is_active'] = $this->input->post('status_item_receipt') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 14) != true ? $error + 1 : $error;

        $data['id_account_list'] = $this->input->post('freight_paid') != NULL && $this->input->post('freight_paid') != 0 ? $this->input->post('freight_paid') : NULL;
        $data['kode_account'] = $this->input->post('freight_paid') != NULL ? $this->getKodeAccount($this->input->post('freight_paid')) : NULL;
        $data['is_active'] = $this->input->post('status_freight_paid') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 15) != true ? $error + 1 : $error;

        $data['id_account_list'] = $this->input->post('supplier_deposit') != NULL && $this->input->post('supplier_deposit') != 0 ? $this->input->post('supplier_deposit') : NULL;
        $data['kode_account'] = $this->input->post('supplier_deposit') != NULL ? $this->getKodeAccount($this->input->post('supplier_deposit')) : NULL;
        $data['is_active'] = $this->input->post('status_supplier_deposit') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 16) != true ? $error + 1 : $error;

        $data['id_account_list'] = $this->input->post('discount_taken') != NULL && $this->input->post('discount_taken') != 0 ? $this->input->post('discount_taken') : NULL;
        $data['kode_account'] = $this->input->post('discount_taken') != NULL ? $this->getKodeAccount($this->input->post('discount_taken')) : NULL;
        $data['is_active'] = $this->input->post('status_discount_taken') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 17) != true ? $error + 1 : $error;
        
        $data['id_account_list'] = $this->input->post('late_fees_paid') != NULL && $this->input->post('late_fees_paid') != 0 ? $this->input->post('late_fees_paid') : NULL;
        $data['kode_account'] = $this->input->post('late_fees_paid') != NULL ? $this->getKodeAccount($this->input->post('late_fees_paid')) : NULL;
        $data['is_active'] = $this->input->post('status_late_fees_paid') == true ? 1 : 0;
        $error = $this->UpdateDataLinkAccount($data, 18) != true ? $error + 1 : $error;
        
        return $error;
    }

    private function UpdateDataLinkAccount($data, $id) {
        $table = 'link_account';
        $col = array('id_link_account');
        $par = array($id);
        $update = $this->DataModel->UpdateData($table, $col, $par, $data);
        if ($update['code'] != 0) {
            return false;
        } else {
            return true;
        }
    }

    private function GetFilter() {
        $select = '*';
        $table = 'account_list';
        $col = array('kode_header');
        $par = array(0);
        return $this->DataModel->GetData($select, $table, $col, $par);
    }

    private function GetAllAccountList() {
        $where['status'] = 'OPEN';
        $where['is_header'] = 0;
        $order = 'kode_account_list ASC';
        $group = null;
        $like = null;
        $select = ['*'];
        $table = 'account_list';
        return $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group);
    }

    private function GetAllBank() {
        $where['status'] = 'OPEN';
        $where['tipe_link_account'] = 'Accounts and Banking Accounts';
        $order = 'id_link_account ASC';
        $group = null;
        $like = null;
        $select = ['*'];
        $table = 'link_account';
        return $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group);
    }

    private function GetAllSales() {
        $where['status'] = 'OPEN';
        $where['tipe_link_account'] = 'Sales Linked Accounts';
        $order = 'id_link_account ASC';
        $group = null;
        $like = null;
        $select = ['*'];
        $table = 'link_account';
        return $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group);
    }

    private function GetAllPurchases() {
        $where['status'] = 'OPEN';
        $where['tipe_link_account'] = 'Purchases Linked Accounts';
        $order = 'id_link_account ASC';
        $group = null;
        $like = null;
        $select = ['*'];
        $table = 'link_account';
        return $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group);
    }

    private function getKodeAccount($id_account) {
        $select = '*';
        $table = 'account_list';
        $col = array('status', 'id_account_list');
        $par = array('OPEN', $id_account);
        $account = $this->DataModel->GetRowData($select, $table, $col, $par);
        return $account['kode_account_list'];
    }

}
