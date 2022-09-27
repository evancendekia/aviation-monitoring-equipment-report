<div class="modal fade" id="CreateTarifBarangModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tarif Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="<?php echo base_url();?>tarif-barang" method="post">
        <div class="modal-body">
          <label>Kode Barang</label>
          <div class="mb-3">
              <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
          </div>
          <label>Nama Barang</label>
          <div class="mb-3">
              <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
          </div>
          <label>Jenis Barang</label>
          <div class="mb-3">
            <select name="jenis_barang" class="form-control">
              <?php foreach($jenis as $j){?>
                <option value="<?php echo $j['jenis_barang']?>"><?php echo $j['jenis_barang'].' - '.$j['nama_jenis_barang']?></option>
              <?php }?>
            </select>
          </div>
          <label>Author</label>
          <div class="mb-3">
              <input type="text" name="author" class="form-control" placeholder="Author" required>
          </div>
          <label>Status</label>
          <div class="mb-3">
              <input type="text" name="status" class="form-control" placeholder="Status" required>
          </div>
          <label>Harga</label>
          <div class="mb-3">
              <input type="text" name="harga" class="form-control" placeholder="Harga" required>
          </div>
          <label>Satuan</label>
          <div class="mb-3">
              <input type="text" name="satuan" class="form-control" placeholder="Satuan">
          </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>