<div class="modal fade" id="DeleteDokumenModal" tabindex="-1"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="<?php echo base_url('voucher-jurnal-umum/delete-file'); ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Dokumen Lampiran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no_voucher" value="<?php echo $voucher['no_voucher']; ?>">
                    <p>Apakah anda yakin ingin menghapus dokumen ini?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
