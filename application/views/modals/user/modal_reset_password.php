<div class="modal fade" id="ResetPasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="<?php echo base_url();?>reset-password" method="post">
        <div class="modal-body">
            <input type="hidden" name="id_user" id="id_user_reset" class="form-control">
            <label>New Password</label>
            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
            </div>
            <label>Confirm Password</label>
            <div class="mb-3">
                <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" >
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