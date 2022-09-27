<div class="modal fade" id="EditAccountListModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Account List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url(); ?>account-list-update" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_account_list" id='id_account_list' class="form-control" required>

                    <div class="form-group row mb-0">
                        <label for="static-code" class="col-sm-4 col-form-label" id="label-static"></label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext font-weight-bold" id="static-code-edit" value="">
                        </div>
                    </div>
                    <div class="form-group row mb-0" id="container-tipe-edit">
                        <label class="col-sm-4 col-form-label" for="type-account">Tipe Account</label>
                        <div class="col-sm-8 pl-md-radios">
                            <!--                            <div class="m-checkbox-inline"> 
                                                            <div class="radio radio-secondary"> 
                                                                <input type="radio" name="isHeader" id="type-account-edit-0" value="1">
                                                                <label class="radio-inline" for="type-account-edit-0"> Header</label> 
                                                            </div> 
                                                            <div class="radio radio-secondary">  
                                                                <input type="radio" name="isHeader" id="type-account-edit-1" value="0">
                                                                <label class="radio-inline" for="type-account-edit-1"> Detail</label>
                                                            </div>
                                                        </div> -->    
                            <input type="text" readonly class="form-control-plaintext font-weight-bold" id="type-account-edit" value="">                        
                        </div>
                    </div>
                    <div class="form-group row mb-0" id="container-kode-edit">
                        <label class="col-sm-4 col-form-label" id="label-static">Kode Account</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext font-weight-bold" id="kode_account_list" value="">
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label>Nama Account</label>
                        <div class="mb-3">
                            <input type="text" name="nama_account_list" id="nama_account_list" class="form-control" placeholder="Nama Account List" required>
                        </div>
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