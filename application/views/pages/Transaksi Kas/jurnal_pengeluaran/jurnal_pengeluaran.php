<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-2 mb-2">
        <!-- <button type="button" class="btn btn-block btn-secondary font-weight-bold" onclick="(window.location = '<?php echo base_url('pengeluaran-kas');?>')"><i class="fa fa-caret-left  "></i> Back</button> -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Jurnal Pengeluaran</h5>
            </div>
            <div class="card-body">
                
            <div class="table-responsive p-0 px-0">
                    <table class="table f-12 table-hover table-bordernone align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">Tanggal</th>
                                <th class="text-uppercase text-secondary">No Voucher</th>
                                <th class="text-uppercase text-secondary">Account</th>
                                <th class="text-center text-secondary">DEBIT (Rp)</th>
                                <th class="text-center text-secondary">KREDIT (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pengeluaran_kas as $pk){?>
                                <tr>
                                    <td><?php echo $pk['tgl_pk'];?></td>
                                    <td colspan="4"><?php echo $pk['uraian'];?></td>
                                </tr>
                                <?php $sum = 0; $sumD = 0; $sumK = 0; foreach($pk['detil'] as $detil){?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $pk['no_voucher'];?></td>
                                        <td><?php echo $detil['kode_anggaran']." - ".$detil['nama_akun'];?></td>
                                        <td class="text-right"><?php echo number_format($detil['debit'],0,",",".");?></td>
                                        <td></td>
                                    </tr>
                                    <?php 
                                            $sum = $sum+$detil['jumlah_acc']; 
                                            $sumD = $sumD+$detil['debit']; 
                                            $sumK = $sumK+$detil['kredit']; 
                                    }?>
                                <!-- <?php ?> -->
                                <?php if($pk['type'] == 'uang_muka'){?>
                                    <tr >
                                        <td></td>
                                        <td><?php echo $pk['no_voucher'];?></td>
                                        <td><?php echo $link_account[0]['kode_account']." - ".$link_account[0]['nama_account_list'];?></td>
                                        <td></td>
                                        <td class="text-right"><?php echo number_format($sum,0,",",".");?></span></td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td></td>
                                        <td><?php echo $pk['no_voucher'];?></td>
                                        <td><?php echo $kas[0]['kode_account_list']." - ".$kas[0]['nama_account_list'];?></td>
                                        <?php 
                                        if(($sumD - $sumK) > 0){
                                            $count = $sum - ($sumD - $sumK); 
                                        }else{
                                            $count = $sum + ($sumD - $sumK);
                                        }
                                        ?>
                                        <td class="text-right"><?php echo $count > 0 ? number_format($count,0,",",".") : '';?></td>
                                        <td class="text-right"><?php echo $count < 0 ? number_format(($count*-1),0,",",".") : '';?></td>
                                    </tr>
                                <?php }else{?>
                                    <tr class="border-bottom">
                                        <td></td>
                                        <td><?php echo $pk['no_voucher'];?></td>
                                        <td><?php echo $kas[0]['kode_account_list']." - ".$kas[0]['nama_account_list'];?></td>
                                        
                                        <?php $count = $sumD - $sumK;?>
                                        <td class="text-right"><?php echo $count < 0 ? number_format(($count*-1),0,",",".") : '';?></td>
                                        <td class="text-right"><?php echo $count > 0 ? number_format($count,0,",",".") : '';?></td>
                                    </tr>
                                <?php }?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                                