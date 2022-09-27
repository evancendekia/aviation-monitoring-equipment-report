<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Data User</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <?php if(count($user) > 10){?>
                            <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('user');?>?qty='+this.options[this.selectedIndex].value);">
                                <?php $num = [10,25,50,100,250];?>
                                <?php for($i=0;$i<count($num);$i++){?>
                                    <option value="<?php echo $num[$i];?>" <?php  echo  $per_page != $num[$i] ?:'selected';?>><?php echo $num[$i];?></option>
                                <?php }?>
                            </select>
                        <?php }?>
                        <div class="px-2">
                            <button type="button" class="btn btn-secondary" onclick="ShowAddUser()"><i class="fa fa-plus text-white"></i> Add user</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">No</th>
                                <th class="text-uppercase text-secondary">User account</th>
                                <th class="text-uppercase text-secondary">Username</th>
                                <th class="text-uppercase text-secondary">Password</th>
                                <th class="text-center text-uppercase text-secondary">Jenis User</th>
                                <th class="text-center text-uppercase text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $this->input->get('page') == NULL ? 1 : ($this->input->get('page') - 1) * $per_page + 1;?>
                            <?php foreach($user as $u){?>
                                <tr>
                                    <td class="align-middle">
                                        <span class="text-secondary font-weight-bold"><?php echo $no;?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-secondary font-weight-bold">
                                            <?php echo $u['username'];?>
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-secondary font-weight-bold"><?php echo $u['NIP'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-secondary font-weight-bold">*********</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-secondary badge-sm"><?php echo $u['type'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" data-toggle="modal" data-target="#ResetPasswordModal" onClick='ResetPasswordUser(<?php echo json_encode($u);?>)'>
                                                <i class="fa fa-key"></i>
                                                Reset
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-sm text-xs px-2"  data-toggle="modal"  data-target="#DeleteUserModal" onClick='DeleteUser(<?php echo json_encode($u);?>)'>
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php $no++;}?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="..." class="mx-4 my-3">                    
                    <?php echo $this->pagination->create_links(); ?>                 
                </nav>
            </div>
        </div>
    </div>
</div>
                        
<?php $this->load->view('modals/user/modal_create_user')?>
<?php $this->load->view('modals/user/modal_delete_user')?>
<?php $this->load->view('modals/user/modal_reset_password')?>


      
