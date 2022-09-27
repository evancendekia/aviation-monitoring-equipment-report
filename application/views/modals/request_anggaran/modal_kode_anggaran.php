<div class="modal fade" id="KodeAnggaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kode Anggaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="select2-drpdwn">
                    <div class="row">
                        <div class="col-12">
                            <?php if($kode_induk != null){?>
                                <select id="KodeAnggaran" onchange="GetValueKodeAnggaran()" class="f-12 js-example-basic-single form-control" style="width: 100% !important;" >
                                    <option value="">Pilih Kode Anggaran</option>
                                    <?php foreach($anggaran as $a){?>
                                        <option value='<?php echo htmlspecialchars(json_encode($a));?>'><?php echo $a['kode_account_list'].' - '.$a['nama_account_list'];?></option>
                                    <?php }?>
                                    
                                </select>
                            <?php }else{?>
                                <h5>Pilih Kode Induk Anggaran Terlebih Dahulu!</h5>
                            <?php }?>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</div>