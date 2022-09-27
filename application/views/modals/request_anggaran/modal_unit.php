
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="select2-drpdwn">
                    <div class="row">
                        <div class="col-12">
                            <select id="NoUnit" onchange="GetValueUnit()" class="f-12 js-example-basic-single form-control" style="width: 100% !important;" >
                                <option value="">Pilih Unit</option>
                                <?php foreach($unit as $u){?>
                                    <option value="<?php echo htmlspecialchars(json_encode($u));?>"><?php echo $u['KODE_UNIT'].' - '.$u['NAMA_UNIT']?></option>
                                <?php }?>
                            </select>
                            
                        </div>
                    </div>
                </div>  
        
            </div>
        </div>
    </div>
</div>
