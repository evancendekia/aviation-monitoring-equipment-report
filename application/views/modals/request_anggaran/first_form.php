
<div class="modal fade" id="PermintaanAnggaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background: transparent;">
        <div class="row">
            <div class="col-6">
                <form action="<?php echo base_url('request-anggaran');?>" method="post">
                    <input type="hidden" name="type" value="uang_muka" class="form-control" required>
                    <button type="submit"class="btn btn-lg btn-block btn-dark">Uang Muka</button>
                </form>
            </div>
            <div class="col-6">
                <form action="<?php echo base_url('request-anggaran');?>" method="post">
                    <input type="hidden" name="type" value="bukan_uang_muka" class="form-control" required>
                    <button type="submit" class="btn btn-lg btn-block btn-dark">Bukan Uang Muka  </button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

