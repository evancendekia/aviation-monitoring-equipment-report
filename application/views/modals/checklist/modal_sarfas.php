<div class="modal fade" id="AddLaporanMaintenanceModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Pilih sarfas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label>Sarfas</label>
                    <div class="select2-drpdwn">
                        <div class="mb-2">
                            <select name="sarfas_list" id="sarfas_list" style="width: 100% !important;" class="js-example-basic-single col-sm-12 form-control" required>
                                <option value="">Pilih Sarfas</option>
                                <?php foreach($sarfas as $s){?>
                                    <option value="<?php echo $s['id_sarfas'];?>"><?php echo $s['jenis'].' - '.$s['merk'].' - '.$s['kapasitas'].' - '.$s['tahun_perolehan'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-secondary" onclick=SubmitSarfas()>Submit</button>
        </div>
    </div>
  </div>
</div>

