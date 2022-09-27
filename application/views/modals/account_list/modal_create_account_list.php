<div class="modal fade" id="CreateAccountListModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url(); ?>account-list" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="static-code" class="col-sm-4 col-form-label">Header Account</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="kode_header" id="kode-header" value="">
                            <input type="text" readonly class="form-control-plaintext font-weight-bold" id="static-code" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-lg-left" for="type-account">Tipe Account</label>
                        <div class="col-sm-9 pl-md-radios">
                            <div class="m-checkbox-inline"> 
                                <div class="radio radio-secondary"> 
                                    <input type="radio" name="is_header" id="type-account-0" value="1">
                                    <label class="radio-inline" for="type-account-0"> Header</label> 
                                </div> 
                                <div class="radio radio-secondary">  
                                    <input type="radio" name="is_header" id="type-account-1" value="0" checked="checked">
                                    <label class="radio-inline" for="type-account-1"> Detail</label>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <label>Kode Account</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="text-kode-header"></span>
                        </div>
                        <input type="text" name="kode_account_list" class="form-control" placeholder="Kode Account List" required>
                    </div>
                    <label>Nama Account</label>
                    <div class="mb-3">
                        <input type="text" name="nama_account_list" class="form-control" placeholder="Nama Account List" required>
                    </div>  
                    <div id="open_balance">
                        <label>Open Balance</label>
                        <div class="mb-3">
                            <input type="tel" name="balance" class="form-control priceformat" placeholder="Open Balance">
                        </div>
                    </div>
                    <!--                    <label>Author</label>
                                        <div class="mb-3">
                                            <input type="text" name="author" class="form-control" placeholder="Author" required>
                                        </div>
                                        <label>Status</label>
                                        <div class="mb-3">
                                            <input type="text" name="status" class="form-control" placeholder="Status" required>
                                        </div>-->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>