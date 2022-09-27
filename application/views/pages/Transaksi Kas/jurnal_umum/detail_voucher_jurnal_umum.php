<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-2 mb-2">
        <a href="<?php echo base_url('voucher-jurnal-umum'); ?>" class="btn btn-block btn-secondary font-weight-bold"><i class="fa fa-caret-left"></i> Back</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Detail Voucher Jurnal Umum</h5>
                <?php if($voucher['status'] == 'WAITING' && $role == 1){ ?>
                <div class="float-right card-header-right">
                    <form id="form-confirm" method="post" action="<?php echo base_url('voucher-jurnal-umum/approve-voucher'); ?>">
                        <input type="hidden" name="no_voucher" value="<?php echo $voucher['no_voucher']; ?>">
                        <div class="btn-group">
                            <div class="px-2">
                                <button type="button" class="btn btn-danger font-weight-bold" data-toggle="modal" data-target="#RejectModal">Reject <i class="fa fa-thumbs-down mr-0 text-light"></i></button>
                                <button type="submit" class="btn btn-success font-weight-bold">Approve <i class="fa fa-thumbs-up mr-0 text-light"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-5 pl-5">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label pt-0 font-weight-bold">Nomor</label>
                            <div class="col-xl-9 col-lg-8">
                                <div class="form-control-static">
                                    <?php echo $voucher['no_voucher']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label pt-0 font-weight-bold">Tanggal</label>
                            <div class="col-xl-9 col-lg-8">
                                <div class="form-control-static">
                                    <?php echo date('d/m/Y', strtotime($voucher['tgl'])); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 offset-2 pr-5">
                        <div class="form-control-static text-right font-weight-bold">
                            <?php echo $voucher['karyawan']; ?>
                        </div>                 
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 pl-5">                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-4 col-form-label pt-0 font-weight-bold">Uraian</label>
                            <div class="col-xl-9 col-lg-8">
                                <div class="form-control-static">
                                    <?php echo $voucher['memo']; ?>
                                </div>
                            </div>
                        </div>    
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($voucher['file'] != NULL) { ?>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom-0">
                    <h5>File Lampiran</h5>
                </div>

                <div class="card-body pt-0 text-center">
                    <i class="fa fa-file-pdf-o" style="font-size: 40px"></i>
                    <p class="text-center">File Dokumen</p>
                    <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#ViewDokumenModal">View</button>

                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($voucher['file'] != NULL) $this->load->view('modals/jurnal_umum/modal_dokumen'); ?>
<?php $this->load->view('modals/jurnal_umum/modal_reject'); ?>
      
