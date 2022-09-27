<div class="modal fade" id="ResetPermintaanAnggaranModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Permintaan Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <form action="<?php echo base_url('reset-pa');?>" method="POST">
        <div class="modal-body">
            <input type="text" name="num" value="<?php echo $pa[0]['no_pa'];?>" class="form-control" >
            <h5>Dengan menekan tombol reset sistem akan menghapus semua data yang telah diinput pada permintaan anggaran dengan nomor <?php echo $this->input->get('num');?></h5>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>

