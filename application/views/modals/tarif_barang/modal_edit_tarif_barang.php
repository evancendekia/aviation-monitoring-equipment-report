<script>
    function EditTarifBarang(tarif){
        console.log(tarif.id_tarif_barang);
        document.getElementById("id").value = tarif.id_tarif_barang;
        document.getElementById("kode_barang").value = tarif.kode_barang;
        document.getElementById("nama_barang").value = tarif.nama_barang;
        document.getElementById('jenis_barang').value = tarif.jenis_barang;
        document.getElementById("author").value = tarif.author;
        document.getElementById("status").value = tarif.status;
        document.getElementById("harga").value = tarif.harga;
        document.getElementById("satuan").value = tarif.satuan;
    }
</script>
<div class="modal fade" id="EditTarifBarangModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Tarif Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="<?php echo base_url();?>tarif-barang-update" method="post">
        <div class="modal-body">
          <input type="hidden" name="id_tarif_barang" id='id' class="form-control" required>
          <label>Kode Barang</label>
          <div class="mb-3">
              <input type="text" name="kode_barang" id='kode_barang' class="form-control" required>
          </div>
          
          <label>Nama Barang</label>
          <div class="mb-3">
              <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" required>
          </div>
          <label>Jenis Barang</label>
          <div class="mb-3">
            <select name="jenis_barang" id="jenis_barang" class="form-control">
              <?php foreach($jenis as $j){?>
                <option value="<?php echo $j['jenis_barang']?>"><?php echo $j['jenis_barang'].' - '.$j['nama_jenis_barang']?></option>
              <?php }?>
            </select>
          </div>
          <label>Author</label>
          <div class="mb-3">
              <input type="text" name="author" id="author" class="form-control" placeholder="Author" required>
          </div>
          <label>Status</label>
          <div class="mb-3">
              <input type="text" name="status" id="status" class="form-control" placeholder="Status" required>
          </div>
          <label>Harga</label>
          <div class="mb-3">
              <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" required>
          </div>
          <label>Satuan</label>
          <div class="mb-3">
              <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan">
          </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button id="btn-submit" type="submit" class="btn btn-secondary">Submit</button>
            <!-- <button id="btn-submit" type="submit" class="btn btn-secondary">Submit</button> -->
        </div>
      </form>
    </div>
  </div>
</div>