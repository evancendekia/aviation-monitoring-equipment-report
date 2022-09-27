<div class="modal fade" id="DeleteAsetTetapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Aset Tetap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <form action="<?php echo base_url();?>aset-tetap-delete" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id_aset" id="id_aset" class="form-control" >
            <table class="table mb-0">
              <tbody>
                  <tr>
                      <td class="align-middle col-4">
                        <span class="text-secondary font-weight-bold">No COA</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="dataCOA"></span>
                      </td>
                  </tr>
                  <tr>
                      <td class="align-middle col-4">
                        <span class="text-secondary font-weight-bold">Unit</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="dataUnit"></span>
                      </td>
                  </tr>
                  <tr>
                      <td class="align-middle col-4">
                        <span class="text-secondary font-weight-bold">Keterangan</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="dataKeterangan"></span>
                      </td>
                  </tr>
              </tbody>
            </table>
            <h5 class="mt-3">
                Are you sure want to delete this user?
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

