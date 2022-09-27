<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-2 mb-2">
        <button type="button" class="btn btn-block btn-secondary font-weight-bold" onclick="(window.location = '<?php echo base_url('pengeluaran-kas');?>')"><i class="fa fa-caret-left  "></i> Back</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Form Pengeluaran Kas <span class="text-success">[<?php echo str_replace("_"," ",$pk[0]['type']);?>]<span></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>submit-pengeluaran-kas" method="post">
                    <input type="hidden" name="id" value="<?php echo $pk[0]['id_pk'];?>" class="form-control f-12">
                    <input type="hidden" name="no_pk" value="<?php echo $pk[0]['no_voucher'];?>" class="form-control f-12">
                    <input type="hidden" name="sum_data" value="<?php echo count($pa_list);?>" class="form-control f-12">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Dibayar Kepada</span>
                                    </div>
                                    <input required type="text" name="dibayar_kepada" value="<?php echo $pk[0]['dibayar_kepada'] == null ?'':$pk[0]['dibayar_kepada'];?>" placeholder="Dibayar Kepada" class="form-control f-12">
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Uang Sejumlah</span>
                                    </div>
                                    <input required type="tell" name="uang_sejumlah" placeholder="Uang Sejumlah"  class="form-control f-12 priceformat">
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Uraian</span>
                                    </div>
                                    <input type="text" id="data_uraian" value="<?php echo $pk[0]['uraian'];?>" class="form-control f-12" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 offset-2">
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">No PA</span>
                                    </div>
                                    <input type="text" class="form-control f-12" value="<?php echo $pk[0]['no_pa'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group m-form__group" style="height: 32px !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">No Voucher</span>
                                    </div>
                                    <input type="text" class="form-control f-12" value="<?php echo $pk[0]['no_voucher'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group m-form__group" style="height: 32px !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Tanggal</span>
                                    </div>
                                    <input type="text" class="form-control f-12" value="<?php echo $pk[0]['tgl_pk'];?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="table-responsive p-0">
                                <table class="table table-hover align-items-center mb-3 f-12">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary">Kode Akun</th>
                                            <th class="text-uppercase text-secondary">Nama Akun</th>
                                            <th class="text-secondary">DEBIT (Rp)</th>
                                            <th class="text-secondary">KREDIT (Rp)</th>
                                            <th class="text-uppercase text-secondary">Unit Kerja</th>
                                            <th class="text-uppercase text-secondary">Unit Bisnis</th>
                                            <th class="text-uppercase text-secondary">Keterangan</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $index = 1; foreach($pa_list as $lr){?>
                                            <tr>
                                                <td><span><?php echo $lr['kode_anggaran'];?></span></td>
                                                <td><span><?php echo $lr['nama_akun'];?></span></td>
                                                <td><input type="text" name="debit-<?php echo $index;?>" class="form-control f-12 priceformat"></td>
                                                <td><input type="text" name="kredit-<?php echo $index;?>" class="form-control f-12 priceformat"></td>
                                                <td><span><?php echo $lr['unit_kerja'];?></span></td>
                                                <td><span><?php echo $lr['unit_bisnis'];?></span></td>
                                                <td><span><?php echo $lr['keterangan'];?></span></td>
                                            </tr>
                                            <input type="hidden" name="id_pa-<?php echo $index;?>" value="<?php echo $lr['id_pa_detil'];?>" class="form-control f-12">
                                        <?php $index++;}?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-block btn-secondary font-weight-bold" >SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <?php $this->load->view('modals/pengeluaran_kas/modal_dibayar');?> -->
                                