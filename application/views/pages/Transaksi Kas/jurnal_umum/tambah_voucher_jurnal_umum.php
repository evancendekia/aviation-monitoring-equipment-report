<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-2 mb-2">
        <a href="<?php echo base_url('voucher-jurnal-umum'); ?>" class="btn btn-block btn-secondary font-weight-bold" ><i class="fa fa-caret-left"></i> Back</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Tambah Voucher Jurnal Umum</h5>
                <div class="float-right card-header-right">
                    <form id="form-confirm" method="post" action="<?php echo base_url('voucher-jurnal-umum/add'); ?>">
                        <input type="hidden" name="no_voucher" value="<?php echo $voucher['no_voucher']; ?>">
                        <div class="btn-group">
                            <div class="px-2">
                                <button type="submit" class="btn btn-success font-weight-bold">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">No</span>
                                </div>
                                <input type="text" class="form-control f-12" id="no_voucher" value="<?php echo $voucher['no_voucher']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Tgl</span>
                                </div>
                                <input type="text" class="form-control f-12" value="<?php echo date('d/m/Y', strtotime($voucher['tgl'])); ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 offset-4">
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Karyawan</span>
                                </div>

                                <input type="text" class="form-control f-12" value="<?php echo $voucher['karyawan']; ?>" disabled>
                            </div>
                        </div>                        
                        <!--                        <div class="form-group m-form__group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text f-12">Unit Bisnis</span>
                                                        </div>
                                                        <select class="form-control f-12">
                                                            <option value="0">Pilih Unit Bisnis</option>
                                                        </select>
                                                    </div>
                                                </div>-->
                        <!--                        <div class="form-group m-form__group" style="height: 32px !important;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text f-12">Karyawan</span>
                                                        </div>
                        
                                                        <input type="text" class="form-control f-12" value="<?php // echo $voucher['karyawan'];      ?>" disabled>
                                                         <input type="text" class="form-control f-12" placeholder="Tanggal" > 
                                                    </div>
                                                </div>-->
                        <!--                        <div class="form-group m-form__group" style="height: 32px !important;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text f-12">Kode Induk Anggaran</span>
                                                        </div>
                        
                                                        <input type="text" name="induk_anggaran" id="induk_anggaran" value="" class="form-control f-12" placeholder="Unit Id" onclick="ChooseIndukAnggaran()">
                                                    </div>
                                                </div>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Uraian</span>
                                </div>
                                <input type="text" id="data_uraian" value="<?php echo $voucher['memo']; ?>" class="form-control f-12" onclick="FillUraian()">
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="col-5 offset-2">
                                            <div class="form-group m-form__group" style="height: 32px !important;">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text f-12">Karyawan</span>
                                                    </div>
                    
                                                    <input type="text" class="form-control f-12" value="<?php // echo $voucher['karyawan'];      ?>" disabled>
                                                     <input type="text" class="form-control f-12" placeholder="Tanggal" > 
                                                </div>
                                            </div>
                                        </div>-->
                </div>

                <div class="table-responsive">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary" colspan="2">Account</th>
                                <th class="text-uppercase text-secondary text-right">Debit</th>
                                <th class="text-uppercase text-secondary text-right">Kredit</th>
                                <th class="text-uppercase text-secondary text-center">Memo</th>
                            </tr>
                        </thead>
                        <tbody id="data_list">
                            <?php
                            if ($list_request != null) {
                                $this->load->view('components/jurnal_umum/list_data');
                            }
                            ?>
                        </tbody>
                    </table>
                    <div id="form_detail" style="display: block">

                        <!--<form onsubmit="SubmitDataListRequestAnggaran(event)" >-->
                        <table class="table align-items-center mb-0 f-12">
                            <tbody class="bg-light">
                                <tr >
                                    <td>
                                        <label>Account</label>
                                        <input type='text' id='kode_account' onclick='ChooseKodeAccount()'class='form-control f-12' required>
                                    </td>
                                    <td>
                                        <label>Nama Account</label>
                                        <input type='text' id='nama_account' class='form-control f-12' required>
                                    </td>
                                    <td>
                                        <label>Debit</label>
                                        <input type='text' id='debit' class='form-control f-12 priceformat' >
                                    </td>
                                    <td>
                                        <label>Kredit</label>
                                        <input type='text' id='kredit' class='form-control f-12 priceformat' >
                                    </td>
                                    <td>
                                        <label>Memo</label>
                                        <input type='text' id='keterangan' class='form-control f-12' >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">    
                                        <button type="button" class='btn btn-block btn-danger text-white' id="close_button" onclick="closeForm()"><i class="fa fa-times"></i> cancel</button>
                                    </td>   
                                    <td colspan="5">    
                                        <button type='button' onclick="SubmitDataListJurnalUmum()" class='btn btn-block btn-secondary'>Submit</button>
                                    </td>    
                                </tr>

                            </tbody>
                        </table>
                        <!--</form>-->
                    </div>
                    <div id="button_add_data_jurnal_umum" style="display: none">
                        <button type="button" onclick="addForm()" class="btn btn-block btn-secondary" ><i class="fa fa-plus text-white"></i> Add more data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>File Lampiran</h5>
            </div>

            <div class="card-body pt-0 text-center">
                <?php if ($voucher['file'] == NULL) { ?>
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('voucher-jurnal-umum/submit-file'); ?>">
                        <i class="fa fa-file-pdf-o" style="font-size: 40px"></i>
                        <div class="form-group">
                            <label>File Dokumen</label>
                            <input type="file" name="dokumen" id="dokumen-lampiran" class="form-control f-14" required>
                            <small>File PDF dengan ukuran maksimal 10MB.</small>
                        </div>
                        <input type="hidden" value="<?php echo $voucher['no_voucher']; ?>" name="no_voucher">
                        <button type="submit" class="btn btn-success">Simpan File</button>
                    </form>
                <?php } ?>
                <?php if ($voucher['file'] != NULL) { ?>
                    <i class="fa fa-file-pdf-o" style="font-size: 40px"></i>
                    <p class="text-center">File Dokumen</p>
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#DeleteDokumenModal">Delete</button>
                    <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#ViewDokumenModal">View</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modals/jurnal_umum/modal_uraian'); ?>
<?php $this->load->view('modals/jurnal_umum/modal_kode_account'); ?>
<?php if ($voucher['file'] != NULL) $this->load->view('modals/jurnal_umum/modal_dokumen'); ?>
<?php if ($voucher['file'] != NULL) $this->load->view('modals/jurnal_umum/modal_delete_dokumen'); ?>
      
