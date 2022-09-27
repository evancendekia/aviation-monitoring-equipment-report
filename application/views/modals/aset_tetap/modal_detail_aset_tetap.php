<?php foreach($aset as $a){?>
<div class="modal fade" id="DetailAsetTetapModal<?php echo $a['id_aset_tetap'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Aset Tetap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <form action="<?php echo base_url();?>aset-tetap-delete" method="POST">
        <div class="modal-body">
          <?php 
              $end_date =  date('Y-m-d',strtotime("+".$a['umur_ekonomis']." months", strtotime($a['tgl'])));
              $y_end =  date_format(date_create($end_date),'Y');
              $y =  date_format(date_create($a['tgl']),'Y');
              $m =  date_format(date_create($a['tgl']),'m');
            ?>
          <div class="row">
            <div class="col-6">
              <table class="table table-hover align-items-center">
                <tbody> 
                  <tr>
                    <td class="col-6" >Akun COA</td>
                    <td >: <?php echo $a['coa'];?></td>
                  </tr>
                  <tr>
                    <td>Nama Unit</td>
                    <td >: <?php echo $a['NAMA_UNIT'];?></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td >: <?php echo $a['keterangan'];?></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td >: <?php echo $a['no_voucher'];?></td>
                  </tr>
                  <tr>
                    <td>Jumlah</td>
                    <td >: <?php echo $a['jumlah'].' '.$a['satuan'];?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-6">
              
            <div class="table-responsive p-0 px-3">
              <table class="table table-hover align-items-center">
                <tbody> 
                  <tr>
                    <td>Umur Ekonomis</td>
                    <td >: <?php echo $a['umur_ekonomis'];?></td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td >: <?php echo $a['tgl'];?></td>
                  </tr>
                  <tr>
                    <td>Harga Perolehan</td>
                    <td >: Rp <?php echo number_format($a['harga_perolehan'],0,",",".");?></td>
                  </tr>
                  <tr>
                    <td>Biaya Penyusutan</td>
                    <td >: Rp <?php echo number_format(($a['harga_perolehan']/$a['umur_ekonomis']),0,",",".");?></td>
                  </tr>
                  <tr>
                    <td>Total Penyusutan</td>
                    <?php $diff = ((date('Y') - $y) * 12) + (date('m') - $m)?>
                      <?php if($diff >= $a['umur_ekonomis']){?>
                          <td >: Rp <?php echo number_format(($a['harga_perolehan']),0,",",".");?></td>
                      <?php }else{?>
                          <td >: Rp <?php echo number_format(($a['harga_perolehan']/$a['umur_ekonomis'])*$diff,0,",",".");?></td>
                      <?php }?>
                    
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            
            <h4 class="mt-3">Penyusutan</h4>
              <table class="table f-12 table-hover table-striped align-items-center">
                <thead>
                  <tr >
                      <th class="text-center">Th</th>
                      <th class="text-center">Pengurangan</th>
                      <th class="text-center">Penambahan</th>
                      <th class="text-center" colspan="12">Bulan</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php $year = date('Y') - $y;?>
                  <?php for($i=0;$i<=$year;$i++){?>
                    <?php if((date('Y')-$i) <= $y_end){?>
                  <tr >
                    <td class="text-center"><?php echo date('Y')-$i;?></td>
                    <td class="text-center">-</td>
                    <td class="text-center"><?php echo (date('Y')-$i) == $y ? number_format($a['harga_perolehan'],0,",",".") : '-'?></td>
                      <?php for($j=1;$j<=12;$j++){?>
                          <?php $dif = ((date('Y')-$i - $y) * 12) + ($j - $m)?>
                          <?php if($dif <= $a['umur_ekonomis']){?>
                              <?php if($year == 0){?>
                                      <?php if($j > date('m')){?>
                                          <td class="text-center" ></td>
                                      <?php }else{?>
                                          <td class="text-center <?php echo $m < $j ? 'bg-success': '';?>" ><?php echo "$j";?></td>
                                      <?php }?>
                              <?php }else {?>
                                  <?php if((date('Y')-$i) == date('Y')){?>
                                      <td class="text-center <?php echo $j > date('m') ? '' : 'bg-success';?>" ><?php echo $j > date('m') ?'': $j;;?></td>
                                  <?php }else if( (date('Y')-$i) == $y){?>
                                    <td class="text-center <?php echo $m < $j ? 'bg-success': '';?>" ><?php echo "$j";?></td>
                                  <?php }else{?>
                                    <td class="text-center bg-success" ><?php echo "$j";?> </td>
                                  <?php }?>
                              <?php }?>
                          <?php }else{?>
                            <td class="text-center" ><?php echo "$j";?> </td>
                          <?php }?>
                      <?php }?>
                            
                  </tr>
                  <?php }?>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
            
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-secondary">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php }?>

