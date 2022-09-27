<script>
    function ShowAddUser(){
        $("#SelectKaryawan").select2({
            dropdownParent: $("#AddUserModal")
        });
        $("#AddUserModal").modal('show');
    }
</script>
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="<?php echo base_url();?>user" method="post">
        <div class="modal-body">
            <label>Username</label>
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <label>Name</label>
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <label>Email</label>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <label>Password</label>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <label>Confirm Password</label>
            <div class="mb-3">
                <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" required>
            </div>
            <label>Role</label>
            <div class="mb-3">
                <select name="role" class="form-control">
                <option value="1">Operasional</option>
                <option value="2">Maintenance</option>
                </select>
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

