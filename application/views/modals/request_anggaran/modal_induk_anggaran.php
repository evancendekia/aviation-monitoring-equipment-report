
<div class="modal fade" id="IndukAnggaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kode Induk Anggaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="select2-drpdwn">
                    <div class="row">
                        <div class="col-12">
                            <select id="NoIndukAnggaran" onchange="GetValueInduk()" class="f-12 js-example-basic-single form-control" style="width: 100% !important;" >
                                <option value="">Pilih Kode Induk</option>
                                <?php foreach($coa as $c){?>
                                    <option value="<?php echo $c['kode_account_list'];?>"><?php echo $c['kode_account_list'].' - '.$c['nama_account_list'];?></option>
                                <?php }?>
                            </select>
                            
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</div>