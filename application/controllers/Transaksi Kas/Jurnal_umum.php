<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_umum extends CI_Controller {

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
        $data['page'] = 'jurnal_umum';
        $data['folder'] = 'Transaksi Kas/jurnal_umum';
        $data['js'] = null;
        $data['alerts'] = $this->session->flashdata('alerts');
//        $data['filter'] = $this->GetFilter();
        $jurnal = $this->getListJurnalUmum();
        $data['jurnal_umum'] = $jurnal['data'];
        $data['total'] = $jurnal['total'];
//        $data['detail_pk'] = $this->getDetailPenerimaanKas($data['penerimaan_kas']);
//        echo json_encode($data);
        $this->load->view('layout/layout', $data);
    }

    private function getListJurnalUmum() {

        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $keyword = $this->input->get('keyword');
        $urutkan = $this->input->get('urutkan') != NULL ? $this->input->get('urutkan') : 1;
        if($this->session->userdata('role') == 1){
            $where['v_ju.status!='] = 'DRAFT';
        }
        $order_text = ['v_ju.tgl DESC', 'v_ju.tgl ASC'];

        !$from ?: $where['v_ju.tgl >= '] = date_format(date_create_from_format('d/m/Y', $from), 'Y-m-d');
        !$to ?: $where['v_ju.tgl <= '] = date_format(date_create_from_format('d/m/Y', $to), 'Y-m-d');
        $order = $order_text[$urutkan - 1];
        $like = $keyword != NULL ? ['memo' => $keyword] : NULL;        
        
        $where['v_ju.status'] = 'APPROVED';
        $group = 'v_ju.id_voucher';
        $select = ['v_ju.id_voucher', 'v_ju.tgl', 'v_ju.no_voucher', 'v_ju.status',
            'v_ju.memo', "GROUP_CONCAT(al.kode_account_list ORDER BY id_jurnal ASC SEPARATOR ';') as kode_account",
            "GROUP_CONCAT(al.nama_account_list ORDER BY id_jurnal ASC SEPARATOR ';') as nama_account", "GROUP_CONCAT(IFNULL(al.kode_mata_uang,' ') ORDER BY id_jurnal ASC SEPARATOR ';') as kode_mata_uang",
            "GROUP_CONCAT(IFNULL(ju.debit,' ') ORDER BY id_jurnal ASC SEPARATOR ';') as debit",
            "GROUP_CONCAT(IFNULL(ju.kredit,' ') ORDER BY id_jurnal ASC SEPARATOR ';') as kredit"];
        $table = 'voucher_jurnal_umum AS v_ju';
        $join = [
            ['table' => 'jurnal_umum AS ju', 'condition' => 'v_ju.id_voucher=ju.id_voucher', 'type' => 'left'],
            ['table' => 'account_list AS al', 'condition' => 'ju.kode_account=al.kode_account_list', 'type' => 'left']
        ];
        $url = 'jurnal-umum';
        $per_page = 10;
        $jurnal['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        $jurnal['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        return $jurnal;
    }

    public function listVoucher() {
        $data['menu'] = 'Transaksi Kas';
        $data['page'] = 'voucher_jurnal_umum';
        $data['folder'] = 'Transaksi Kas/jurnal_umum';
        $data['js'] = null;
        $data['alerts'] = $this->session->flashdata('alerts');
//        $data['filter'] = $this->GetFilter();
        $data['role'] = $role = $this->session->userdata('role');
        $voucher = $this->getListVoucherJurnalUmum();
        $data['voucher'] = $voucher['data'];
        $data['total'] = $voucher['total'];
//        $data['detail_pk'] = $this->getDetailPenerimaanKas($data['penerimaan_kas']);
//        echo json_encode($this->db->last_query());
        $this->load->view('layout/layout', $data);
    }

    private function getListVoucherJurnalUmum() {
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $keyword = $this->input->get('keyword');
        $status = $this->input->get('status');
        $urutkan = $this->input->get('urutkan') != NULL ? $this->input->get('urutkan') : 1;
        $status_text = ['Pilih Status', 'WAITING', 'APPROVED', 'REJECTED', 'DRAFT'];
        if($this->session->userdata('role') == 1){
            $where['v_ju.status!='] = 'DRAFT';
        }
        $order_text = ['v_ju.tgl DESC', 'v_ju.tgl ASC'];

        $where['v_ju.status !='] = 'CLOSE';
        !$status ?: $where['v_ju.status'] = $status_text[$status];
        !$from ?: $where['v_ju.tgl >= '] = date_format(date_create_from_format('d/m/Y', $from), 'Y-m-d');
        !$to ?: $where['v_ju.tgl <= '] = date_format(date_create_from_format('d/m/Y', $to), 'Y-m-d');
        $order = $order_text[$urutkan - 1];
        $group = null;
        $like = $keyword != NULL ? ['memo' => $keyword] : NULL;
        $select = ['v_ju.id_voucher', 'v_ju.tgl', 'v_ju.no_voucher', 'v_ju.status',
            'v_ju.memo'];
        $table = 'voucher_jurnal_umum AS v_ju';
        $join = [];
        $url = 'voucher-jurnal-umum';
        $per_page = 10;
        $voucher['data'] = $this->DataModel->GetDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        $voucher['total'] = $this->DataModel->GetTotalDataPagination($select, $table, $join, $url, $per_page, $where, $order, $group, $like);
        return $voucher;
    }

    public function tambahVoucher() {
        $no_voucher = $this->input->get('voucher');
        if (is_string($no_voucher)) {
            $no_voucher = urldecode($no_voucher);
            $data['voucher'] = $this->DataModel->GetRowData('*', 'voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT']);
            if ($data['voucher'] == NULL) {
                $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
                $this->session->set_flashdata('alerts', $alerts);
                redirect('voucher-jurnal-umum', 'GET');
            }
            $karyawan = $this->DataModel->GetRowData('NAMA', 'u1458735_dbho.pegawai', ['NIP'], [$data['voucher']['author']]);
            $data['voucher']['karyawan'] = $karyawan != NULL ? $karyawan['NAMA'] : $this->session->userdata('NIP');
            $data['list_request'] = $this->getDetailVoucherList($data['voucher']['id_voucher']);
        } else {
            $data['voucher'] = $this->generateVoucher();
            $data['list_request'] = [];
        }
        $data['menu'] = 'Transaksi Kas';
        $data['page'] = 'tambah_voucher_jurnal_umum';
        $data['folder'] = 'Transaksi Kas/jurnal_umum';
        $data['js'] = 'js_tambah_voucher_jurnal_umum';
        $data['alerts'] = $this->session->flashdata('alerts');
        $data['account'] = $this->getAccountList();
//        $data['unit_bisnis'] = $this->DataModel->GetDataGroup('', $table, $where, $like, $order, $group);
//        $data['detail_pk'] = $this->getDetailPenerimaanKas($data['penerimaan_kas']);
//        echo json_encode($data);
        $this->load->view('layout/layout', $data);
    }

    private function getAccountList($param = null) {
        $select = ['a.id_account_list', 'a.kode_account_list', 'a.nama_account_list', 'a.kode_header', 'b.nama_account_list as nama_header', 'mu.simbol'];
        $table = 'account_list as a';
        $where['a.status'] = 'OPEN';
        $where['a.is_header'] = 0;
        $like = null;
        $order = 'a.kode_header ASC, a.kode_account_list ASC';
        $group = NULL;
        $join = [
            ['table' => 'account_list as b', 'condition' => 'a.kode_header=b.kode_account_list', 'type' => 'left'],
            ['table' => 'mata_uang as mu', 'condition' => 'a.kode_mata_uang=mu.kode_mata_uang', 'type' => 'left']
        ];

        return $this->DataModel->getDataGroup($select, $table, $where, $like, $order, $group, $join);
    }

    private function getDetailVoucherList($id_voucher) {
        $select = ['ju.kode_account', 'al.nama_account_list as nama_account', 'ju.debit', 'ju.kredit', 'ju.uraian', 'mu.simbol'];
        $table = 'jurnal_umum as ju';
        $where['ju.status'] = 'OPEN';
        $where['ju.id_voucher'] = $id_voucher;
        $like = null;
        $order = 'id_jurnal ASC';
        $group = NULL;
        $join = [
            ['table' => 'account_list as al', 'condition' => 'ju.kode_account=al.kode_account_list', 'type' => 'left'],
            ['table' => 'mata_uang as mu', 'condition' => 'al.kode_mata_uang=mu.kode_mata_uang', 'type' => 'left']
        ];

        return $this->DataModel->getDataGroup($select, $table, $where, $like, $order, $group, $join);
    }

    private function generateVoucher() {
        $last_voucher = $this->DataModel->GetDataGroup('no_voucher', 'voucher_jurnal_umum', NULL, ['tgl' => date('Y-m')], 'tgl DESC, id_voucher DESC', NULL);
        if ($last_voucher == NULL) {
            $last_number = 1;
        } else {
            $last_number = intval(substr($last_voucher[0]['no_voucher'], 2, 3)) + 1;
        }
        $data['no_voucher'] = 'JU' . str_pad($last_number, 3, '0', STR_PAD_LEFT) . '/' . GetRomawi(date('m')) . '/' . date('Y');
        $data['author'] = $this->session->userdata('NIP');
        $data['tgl'] = date('Y-m-d');
        $data['set_time'] = date('Y-m-d');
        $data['status'] = 'DRAFT';
//        $this->DataModel->InsertData('voucher_jurnal_umum', $data);
        $karyawan = $this->DataModel->GetRowData('NAMA', 'u1458735_dbho.pegawai', ['NIP'], [$data['author']]);
        $data['karyawan'] = $karyawan != NULL ? $karyawan['NAMA'] : $this->session->userdata('NIP');
        $data['memo'] = NULL;
        $data['file'] = NULL;
        return $data;
    }

    public function editUraianVoucher() {
        $data['memo'] = $this->input->post('uraian');
        $no_voucher = $this->input->post('id');
        $update = $this->DataModel->UpdateData('voucher_jurnal_umum', ['no_voucher'], [$no_voucher], $data);
        if ($update['code'] != 0) {
            throw new Exception($update['message']);
            // throw new Exception('Unknown error occurred');
        }
        return true;
    }

    public function addJurnalUmum() {
        $input = json_decode($this->input->post('data'));
        $no_voucher = $input->no_voucher;
        $voucher = $this->DataModel->GetRowData('*', 'voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT']);
        if ($voucher == NULL) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            redirect('voucher-jurnal-umum', 'GET');
        }
        $data_insert = array(
            'id_voucher' => $voucher['id_voucher'],
            'kode_account' => $input->kode_account,
            'debit' => $input->debit != NULL ? str_replace('.', '', $input->debit) : NULL,
            'kredit' => $input->kredit != NULL ? str_replace('.', '', $input->kredit) : NULL,
            'uraian' => $input->uraian,
            'author' => $this->session->userdata('NIP'),
            'set_time' => date('d-m-Y'),
            'status' => 'OPEN'
        );
//        echo json_encode($data_insert);
        //set point
        $this->DataModel->InsertData('jurnal_umum', $data_insert);
        $data['list_request'] = $this->getDetailVoucherList($voucher['id_voucher']);
        $this->load->view('components/jurnal_umum/list_data', $data);
    }

    public function updateFileLampiran() {
        $no_voucher = $this->input->post('no_voucher');
        if (!is_string($no_voucher)) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }
        $no_voucher = urldecode($no_voucher);
        $voucher = $this->DataModel->GetRowData('*', 'voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT']);
        if ($voucher == NULL) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }

        //$this->DataModel->uploadFile($name, $folder, $limit_size, $type, $rename)
        //name = name form input, folder = lokasi penyimpanan file, limit_size = batas ukuran file dalam MB, 
        //type = tipe file yang diizinkan, rename = nama file saat disimpan ke dalam sistem

        $upload = $this->DataModel->uploadFile('dokumen', 'pdf/jurnal_umum', 10, 'pdf', 'dokumen_lampiran_' . str_replace('/', '-', $no_voucher));
        if ($upload == NULL) {
            $alerts = GenerateDataAlert('failed', 'Upload File Gagal!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }

        $data['file'] = $upload;
        $update = $this->DataModel->UpdateData('voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT'], $data);
        if ($update) {
            $alerts = GenerateDataAlert('success', 'Upload File Berhasil!');
            $this->session->set_flashdata('alerts', $alerts);
        } else {
            $alerts = GenerateDataAlert('failed', 'Upload File Gagal!');
            $this->session->set_flashdata('alerts', $alerts);
        }

        redirect('voucher-jurnal-umum/add?voucher=' . urlencode($no_voucher));
    }

    public function deleteFileLampiran() {
        $no_voucher = $this->input->post('no_voucher');
        if (!is_string($no_voucher)) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }
        $no_voucher = urldecode($no_voucher);
        $voucher = $this->DataModel->GetRowData('*', 'voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT']);
        if ($voucher == NULL) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }


        $data['file'] = NULL;
        $update = $this->DataModel->UpdateData('voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT'], $data);
        if ($update) {
            $alerts = GenerateDataAlert('success', 'Delete File Berhasil!');
            $this->session->set_flashdata('alerts', $alerts);
        } else {
            $alerts = GenerateDataAlert('failed', 'Delete File Gagal!');
            $this->session->set_flashdata('alerts', $alerts);
        }

        redirect('voucher-jurnal-umum/add?voucher=' . urlencode($no_voucher));
    }

    public function prosesTambahVoucher() {
        $no_voucher = $this->input->post('no_voucher');
        if (!is_string($no_voucher)) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }
        $no_voucher = urldecode($no_voucher);
        $voucher = $this->DataModel->GetRowData('*', 'voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT']);
        if ($voucher == NULL) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }

        $data['status'] = 'WAITING';
        $update = $this->DataModel->UpdateData('voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'DRAFT'], $data);
        if ($update) {
            $alerts = GenerateDataAlert('success', 'Voucher berhasil diterbitkan!');
            $this->session->set_flashdata('alerts', $alerts);
        } else {
            $alerts = GenerateDataAlert('failed', 'Voucher gagal diterbitkan!');
            $this->session->set_flashdata('alerts', $alerts);
        }

        redirect('voucher-jurnal-umum');
    }

    public function detailVoucher($id_voucher) {
        $select = ['v_ju.id_voucher', 'v_ju.tgl', 'v_ju.no_voucher', 'v_ju.memo', 'v_ju.file', 'v_ju.keterangan', 'v_ju.status', 'pegawai.NAMA as karyawan', 'v_ju.author'];
        $table = 'voucher_jurnal_umum as v_ju';
        $where['id_voucher'] = $id_voucher;
        $where = "v_ju.id_voucher = $id_voucher AND v_ju.status != 'DRAFT' AND v_ju.status != 'CLOSE'";
        $like = NULL;
        $group = NULL;
        $order = NULL;
        $join = [
            ['table' => 'u1458735_dbho.pegawai as pegawai', 'condition' => 'v_ju.author=pegawai.NIP', 'type' => 'left'],
        ];
        $voucher = $this->DataModel->getDataGroup($select, $table, $where, $like, $order, $group, $join);
        if ($voucher == NULL) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }

        $data['menu'] = 'Transaksi Kas';
        $data['page'] = 'detail_voucher_jurnal_umum';
        $data['folder'] = 'Transaksi Kas/jurnal_umum';
        $data['js'] = 'js_detail_voucher_jurnal_umum';
        $data['alerts'] = $this->session->flashdata('alerts');
        $data['voucher'] = $voucher[0];
        $data['list_request'] = $this->getDetailVoucherList($id_voucher);
        $data['role'] = $role = $this->session->userdata('role');
//        echo json_encode($data);
        $this->load->view('layout/layout', $data);
    }

    public function rejectVoucher() {
        $no_voucher = $this->input->post('no_voucher');
        if (!is_string($no_voucher)) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }
        $no_voucher = urldecode($no_voucher);
        $voucher = $this->DataModel->GetRowData('*', 'voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'WAITING']);
        if ($voucher == NULL) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }
        $data['keterangan'] = $this->input->post('keterangan');
        $data['status'] = 'REJECTED';
        $update = $this->DataModel->UpdateData('voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'WAITING'], $data);
        if ($update) {
            $alerts = GenerateDataAlert('success', 'Voucher berhasil ditolak!');
            $this->session->set_flashdata('alerts', $alerts);
        } else {
            $alerts = GenerateDataAlert('failed', 'Voucher gagal ditolak!');
            $this->session->set_flashdata('alerts', $alerts);
        }
        redirect('voucher-jurnal-umum');
    }

    public function approveVoucher() {
        $no_voucher = $this->input->post('no_voucher');
        if (!is_string($no_voucher)) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }
        $no_voucher = urldecode($no_voucher);
        $voucher = $this->DataModel->GetRowData('*', 'voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'WAITING']);
        if ($voucher == NULL) {
            $alerts = GenerateDataAlert('failed', 'Data Voucher is not found!');
            $this->session->set_flashdata('alerts', $alerts);
            return redirect('voucher-jurnal-umum', 'GET');
        }
        $data['status'] = 'APPROVED';
        $update = $this->DataModel->UpdateData('voucher_jurnal_umum', ['no_voucher', 'status'], [$no_voucher, 'WAITING'], $data);
        if ($update) {
            $alerts = GenerateDataAlert('success', 'Voucher berhasil disetujui!');
            $this->session->set_flashdata('alerts', $alerts);
        } else {
            $alerts = GenerateDataAlert('failed', 'Voucher gagal disetujui!');
            $this->session->set_flashdata('alerts', $alerts);
        }
        redirect('voucher-jurnal-umum');
    }

}
