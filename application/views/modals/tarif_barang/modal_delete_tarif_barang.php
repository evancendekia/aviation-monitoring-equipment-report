<script>
    function DeleteTarifBarang(tarif){
        document.getElementById("id_tarif_barang").value = tarif.id_tarif_barang;
        document.getElementById("KodeBarang").innerHTML = ": "+tarif.kode_barang;
        document.getElementById("NamaBarang").innerHTML = ": "+tarif.nama_barang;
        document.getElementById("JenisBarang").innerHTML = ": "+tarif.nama_jenis_barang;
    }
</script>
<div class="modal fade" id="DeleteTarifBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Tarif Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <form action="<?php echo base_url();?>tarif-barang-delete" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id_tarif_barang" id="id_tarif_barang" class="form-control" >
            <table class="table mb-0">
              <tbody>
                  <tr>
                      <td class="align-middle col-3">
                        <span class="text-secondary font-weight-bold">Kode Barang</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="KodeBarang"></span>
                      </td>
                  </tr>
                  <tr>
                      <td class="align-middle col-3">
                        <span class="text-secondary font-weight-bold">Nama Barang</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="NamaBarang"></span>
                      </td>
                  </tr>
                  <tr>
                      <td class="align-middle col-3">
                        <span class="text-secondary font-weight-bold">Jenis Barang</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="JenisBarang"></span>
                      </td>
                  </tr>
              </tbody>
            </table>
            <h5 class="mt-3">
                Are you sure want to delete this data?
            </h5>
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-secondary">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>

