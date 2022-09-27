<div class="modal fade" id="RekapTransakiModal" tabindex="-1"aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rekap Transaski</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <tr>
                                <td><?php echo $pk[0]['tgl_pk'];?></td>
                                <td colspan="4"><?php echo $pk[0]['uraian'];?></td>
                            </tr>
                            <?php $sum = 0; $sumD = 0; $sumK = 0; foreach($pa_list as $lr){?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $pk[0]['no_voucher'];?></td>
                                    <td><?php echo $lr['kode_anggaran']." - ".$lr['nama_akun'];?></td>
                                    <td class="text-right"><?php echo number_format($lr['debit'],0,",",".");?></td>
                                    <td></td>
                                </tr>
                            <?php 
                                    $sum = $sum+$lr['jumlah_acc']; 
                                    $sumD = $sumD+$lr['debit']; 
                                    $sumK = $sumK+$lr['kredit']; 
                            }?>
                            <?php if($pk[0]['type'] == 'uang_muka'){?>
                                <tr >
                                    <td></td>
                                    <td><?php echo $pk[0]['no_voucher'];?></td>
                                    <td><?php echo $link_account[0]['kode_account']." - ".$link_account[0]['nama_account_list'];?></td>
                                    <td></td>
                                    <td class="text-right"><?php echo number_format($sum,0,",",".");?></span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><?php echo $pk[0]['no_voucher'];?></td>
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
                                <tr>
                                    <td></td>
                                    <td><?php echo $pk[0]['no_voucher'];?></td>
                                    <td><?php echo $kas[0]['kode_account_list']." - ".$kas[0]['nama_account_list'];?></td>
                                    
                                    <?php $count = $sumD - $sumK;?>
                                    <td class="text-right"><?php echo $count < 0 ? number_format(($count*-1),0,",",".") : '';?></td>
                                    <td class="text-right"><?php echo $count > 0 ? number_format($count,0,",",".") : '';?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                </table>
            </div>
                
                <!-- <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div> -->
        </div>
    </div>
</div>
