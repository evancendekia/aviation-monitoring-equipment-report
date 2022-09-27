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
            
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <?php if($pk[0]['status_pk'] == 'Approved'){?>
                            <div class="px-2">
                                <button type="button" class="btn btn-secondary font-weight-bold" data-toggle="modal"  data-target="#RekapTransakiModal">Rekap Transaksi</button>
                            </div>
                        <?php }?>   
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-bordernone table-hover f-12 align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-1">Dibayar Kepada<td>
                                        <td class="p-1">: <?php echo $pk[0]['dibayar_kepada'];?><td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Uang Sejumlah<td>
                                        <td class="p-1">: <?php echo number_format($pk[0]['jumlah'],0,",",".");?><td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Uraian<td>
                                        <td class="p-1">: <?php echo $pk[0]['uraian'];?><td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Status<td>
                                        <td class="p-1">: <span class="badge badge-<?php echo $pk[0]['status_pk'] == 'Draft' ? ('light') : ($pk[0]['status_pk'] == 'Approved' ? 'success': 'primary');?> badge-lg"><?php echo $pk[0]['status_pk'];?></span>
                                    <td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5 offset-1">
                                <table class="table table-bordernone table-hover f-12 mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="col-4 p-1">No PA<td>
                                            <td class="col-8 p-1" >: <?php echo $pk[0]['no_pa'];?><td>
                                        </tr>
                                        <tr>
                                            <td class="p-1 ">No Voucher<td>
                                            <td class="p-1 ">: <?php echo $pk[0]['no_voucher'];?><td>
                                        </tr>
                                        <tr>
                                            <td class="p-1 ">Tanggal<td>
                                            <td class="p-1 ">: <?php echo $pk[0]['tgl_pk'];?><td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                        <?php $sum = 0; $sumD = 0; $sumK = 0; $index = 1; foreach($pa_list as $lr){?>
                                            <tr>
                                                <td><span><?php echo $lr['kode_anggaran'];?></span></td>
                                                <td><span><?php echo $lr['nama_akun'];?></span></td>
                                                <td class="text-right"><span><?php echo $lr['debit'] == 0 ?'': number_format($lr['debit'],0,",",".");?></span></td>
                                                <td class="text-right"><span><?php echo $lr['kredit'] == 0 ?'': number_format($lr['kredit'],0,",",".");?></span></td>
                                                <td><span><?php echo $lr['unit_kerja'];?></span></td>
                                                <td><span><?php echo $lr['unit_bisnis'];?></span></td>
                                                <td><span><?php echo $lr['keterangan'];?></span></td>
                                            </tr>
                                            <input type="hidden" name="id_pa-<?php echo $index;?>" value="<?php echo $lr['id_pa_detil'];?>" class="form-control f-12">
                                        <?php 
                                            $sum = $sum+$lr['jumlah_acc']; 
                                            $sumD = $sumD+$lr['debit']; 
                                            $sumK = $sumK+$lr['kredit']; 
                                            $index++;}?>
                                    </tbody>
                                    
                                    <tbody>
                                        <?php if($pk[0]['type'] == 'uang_muka'){?>
                                            <tr>
                                                <td><?php echo $link_account[0]['kode_account'];?></td>
                                                <td><?php echo $link_account[0]['nama_account_list'];?></td>
                                                <td></td>
                                                <td class="text-right"><?php echo number_format($sum,0,",",".");?></span></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $kas[0]['kode_account_list'];?></td>
                                                <td><?php echo $kas[0]['nama_account_list'];?></td>
                                                <?php 
                                                if(($sumD - $sumK) > 0){
                                                    $count = $sum - ($sumD - $sumK); 
                                                }else{
                                                    $count = $sum + ($sumD - $sumK);
                                                }
                                                ?>
                                                <td class="text-right"><?php echo $count > 0 ? number_format($count,0,",",".") : '';?></td>
                                                <td class="text-right"><?php echo $count < 0 ? number_format(($count*-1),0,",",".") : '';?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php }else{?>
                                            
                                            <tr>
                                                <td><?php echo $kas[0]['kode_account_list'];?></td>
                                                <td><?php echo $kas[0]['nama_account_list'];?></td>
                                                <?php $count = $sumD - $sumK;?>
                                                <td class="text-right"><?php echo $count < 0 ? number_format(($count*-1),0,",",".") : '';?></td>
                                                <td class="text-right"><?php echo $count > 0 ? number_format($count,0,",",".") : '';?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                    
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php  if($pk[0]['status_pk'] == 'Waiting Approval' && $role == 1){?>
                        <form  action="<?php echo base_url('proses-pengeluaran-kas');?>" method="post">
                            <input type='hidden' name="id_pk" value="<?php echo $pk[0]['id_pk'];?>">
                            <input type='hidden' name="num" value="<?php echo $this->input->get('num');?>">
                            
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" name="valid" value="1" class="custom-control-input" id="valid" required>
                                <label class="custom-control-label" for="valid">Saya yakin untuk memproses pengeluaran kas ini</label>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type='submit' class='btn btn-block btn-secondary font-weight-bold'>Proses Pengeluaran Kas</button>
                                </div>
                            </div>
                        </form>
                    <?php }?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('modals/pengeluaran_kas/modal_rekap_transaksi');?>
                                