<script>
    function DeleteAccountList(account_list){
        document.getElementById("idAccountList").value = account_list.id_account_list;
        document.getElementById("kodeAccountList").innerHTML = ": "+account_list.kode_account_list;
        document.getElementById("namaAccountList").innerHTML = ": "+account_list.nama_account_list;
        document.getElementById("tipeAccountList").innerHTML = ": "+account_list.tipe_account_list;
    }
</script>
<div class="modal fade" id="DeleteAccountListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <form action="<?php echo base_url();?>account-list-delete" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id_account_list" id="idAccountList" class="form-control" >
            <table class="table mb-0">
              <tbody>
                  <tr>
                      <td class="align-middle col-3">
                        <span class="text-secondary font-weight-bold">Kode Account</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="kodeAccountList"></span>
                      </td>
                  </tr>
                  <tr>
                      <td class="align-middle col-3">
                        <span class="text-secondary font-weight-bold">Nama Account</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary font-weight-bold"  id="namaAccountList"></span>
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

