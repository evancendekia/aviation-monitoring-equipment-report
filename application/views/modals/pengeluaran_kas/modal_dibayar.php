<div class="modal fade" id="DibayarModal" tabindex="-1"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dibayar Kepada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="GetValueDibayar(event)">
                <div class="modal-body">
                    <div class="select2-drpdwn">
                        <div class="row">
                            <div class="col-12">
                                
                                <label>Dibayar kepada</label>
                                <div class="mb-3">
                                    <input type="text" id="dibayar" class="form-control" placeholder="Dibayar Kepada">
                                </div>
                            </div>
                        </div>
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
