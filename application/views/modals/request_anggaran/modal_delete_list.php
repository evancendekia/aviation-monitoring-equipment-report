<div class="modal fade" id="DeleteDetailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete List Permintaan Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="<?php echo base_url('delete-list-pa');?>" method="POST">
        <div class="modal-body">
            <input type="hidden" name="num" value="<?php echo $pa[0]['no_pa'];?>">
            <input type="text" id="id_pa_detil" name="id_pa_detil">
            <h5>Dengan menekan tombol delete sistem akan menghapus data list permintaan anggaran sebagai berikut :</h5>
            <table  class="table table-hover align-items-center mb-3">
              <tr>
                <td class="col-4"> Kode Unit</td>
                <td id="kode_unit_detil">: </td>
              </tr>
              <tr>
                <td>Kode Anggaran</td>
                <td id="kode_anggaran_detil">: </td>
              </tr>
              <tr>
                <td>Nama_akun</td>
                <td id="nama_akun_detil">: </td>
              </tr>
              <tr>
                <td>Unit Kerja</td>
                <td id="unit_kerja_detil">: </td>
              </tr>
              <tr>
                <td>Unit Bisnis</td>
                <td id="unit_bisnis_detil">: </td>
              </tr>
              <tr>
                <td>Jumlah</td>
                <td id="jumlah_detil">: </td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td id="keterangan_detil">: </td>
              </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger btn-secondary">Delete</button>
        </div>
      </form>
    </div>
  </div>  
</div>

