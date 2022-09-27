<div class="modal fade" id="SubmitPermintaanAnggaranModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Permintaan Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <form action="<?php echo base_url('submit-pa');?>" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id_pa" value="<?php echo $pa[0]['id_pa'];?>" class="form-control" >
            
            <h5>Pastikan seluruh data yang telah diinputkan sudah benar!</h5>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" name="valid" value="1" class="custom-control-input" id="valid" required>
                <label class="custom-control-label" for="valid">Data yang saya inputkan sudah benar</label>
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

