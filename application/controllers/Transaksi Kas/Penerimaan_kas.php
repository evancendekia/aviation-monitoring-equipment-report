<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_kas extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('DataModel');
        if ($this->session->userdata('IsLoggedIn') != TRUE) {
            $alerts = GenerateDataAlert('oops', 'Your session is expired');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('login');
        }
    }

    public function index() {
        $data['menu'] = 'Transaksi Kas';
        $data['page'] = 'penerimaan_kas';
        $data['folder'] = 'Transaksi Kas/penerimaan_kas';
        $data['js'] = 'js_penerimaan_kas';
        $data['alerts'] = $this->session->flashdata('alerts');
//        $data['filter'] = $this->GetFilter();
        $data['penerimaan_kas'] = $this->getListPenerimaanKas();
//        $data['detail_pk'] = $this->getDetailPenerimaanKas($data['penerimaan_kas']);
//        echo json_encode($data);
        $this->load->view('layout/layout', $data);
    }

    public function tambah() {
        $data['menu'] = 'Transaksi Kas';
        $data['page'] = 'tambah_penerimaan_kas';
        $data['folder'] = 'Transaksi Kas/penerimaan_kas';
        $data['js'] = 'js_tambah_penerimaan_kas';
        $data['alerts'] = $this->session->flashdata('alerts');
        $data['penerimaan_kas'] = $this->generatePenerimaanKas();
//        $data['unit_bisnis'] = $this->DataModel->GetDataGroup('', $table, $where, $like, $order, $group);
//        $data['detail_pk'] = $this->getDetailPenerimaanKas($data['penerimaan_kas']);
//        echo json_encode($data);
        $this->load->view('layout/layout', $data);
    }

    private function generatePenerimaanKas() {
        $last_jurnal = $this->DataModel->GetDataGroup('no_voucher', 'penerimaan_kas', ['tgl' => date('Y-m-d')], NULL, 'tgl DESC', NULL);
        if ($last_jurnal == NULL) {
            $last_number = 1;
        } else {
            $last_number = intval(substr($last_jurnal[0]['no_voucher'],2,3)) + 1;
        }
        $data['no_voucher'] = 'PK'.str_pad($last_number, 3, '0', STR_PAD_LEFT).'/'.GetRomawi(date('m')).'/'.date('Y');
        $data['author'] = $this->session->userdata('NIP');
        $data['tgl'] = date('Y-m-d');
        $data['set_time'] = date('Y-m-d');
        $data['status'] = 'DRAFT';
//        $this->DataModel->InsertData('penerimaan_kas', $data);
        $karyawan = $this->DataModel->GetRowData('NAMA','u1458735_dbho.pegawai',['NIP'],[$data['author']]);
        $data['karyawan'] = $karyawan != NULL ? $karyawan['NAMA'] : $this->session->userdata('NIP');
        return $data;
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

    private function getListPenerimaanKas() {
//        $kode_header = $this->input->get('kode_header');
//        if (is_numeric($kode_header) && $kode_header < 1) {
//            return redirect('account-list');
//        }
//        $where = is_numeric($kode_header) ? ['SUBSTRING(a.kode_account_list, 1, 1) = ' => $kode_header] : NULL;
        $where['v_pk.status'] = 'APPROVED';
        $order = 'v_pk.tgl ASC';
        $group = 'v_pk.id_voucher';
        $select = ['v_pk.id_voucher', 'v_pk.tgl', 'v_pk.no_voucher', 'v_pk.jumlah', 'v_pk.status',
            'v_pk.memo', "GROUP_CONCAT(al.kode_account_list ORDER BY id_jurnal ASC SEPARATOR ';') as kode_account",
            "GROUP_CONCAT(al.nama_account_list ORDER BY id_jurnal ASC SEPARATOR ';') as nama_account", "GROUP_CONCAT(IFNULL(al.kode_mata_uang,' ') ORDER BY id_jurnal ASC SEPARATOR ';') as kode_mata_uang",
            "GROUP_CONCAT(IFNULL(j_pk.debit,' ') ORDER BY id_jurnal ASC SEPARATOR ';') as debit",
            "GROUP_CONCAT(IFNULL(j_pk.kredit,' ') ORDER BY id_jurnal ASC SEPARATOR ';') as kredit"];
        $table = 'voucher_penerimaan_kas AS v_pk';
        $join = [
            ['table' => 'jurnal_penerimaan_kas AS j_pk', 'condition' => 'v_pk.id_voucher=j_pk.id_voucher', 'type' => 'left'],
            ['table' => 'account_list AS al', 'condition' => 'j_pk.kode_account=al.kode_account_list', 'type' => 'left']
        ];
        $url = 'penerimaan-kas';
        $per_page = 10;
        return $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group);
    }

    private function getDetailPenerimaanKas($penerimaan_kas) {
//        $kode_header = $this->input->get('kode_header');
//        if (is_numeric($kode_header) && $kode_header < 1) {
//            return redirect('account-list');
//        }
//        $where = is_numeric($kode_header) ? ['SUBSTRING(a.kode_account_list, 1, 1) = ' => $kode_header] : NULL;
        $where = "pk_detail.status = 'OPEN' AND pk_detail.id_penerimaan_kas IN (" . implode(',', array_column($penerimaan_kas, 'id_penerimaan_kas')) . ")";
        $order = 'pk_detail.id_penerimaan_kas ASC, pk_detail.id_pk_detail ASC';
        $group = NULL; //'pk_detail.id_penerimaan_kas';
        $select = ['*'];
        $table = 'penerimaan_kas_detail AS pk_detail';
        $like = null;
        return $this->DataModel->GetDataGroup($select, $table, $where, $like, $order, $group);
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
