<div class="modal fade" id="CreateMataUangModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Mata Uang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?php echo base_url(); ?>mata-uang" method="post">
                <div class="modal-body">
                    <label>Simbol</label>
                    <div class="mb-3">
                        <input type="text" name="simbol" class="form-control" placeholder="Simbol Mata Uang" required>
                    </div>
                    <label>Keterangan</label>
                    <div class="mb-3">
                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                    </div>
                    <label>Konversi</label>
                    <div class="mb-3">
                        <input type="tel" name="konversi" class="form-control priceformat" placeholder="Konversi dalam rupiah" required>
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