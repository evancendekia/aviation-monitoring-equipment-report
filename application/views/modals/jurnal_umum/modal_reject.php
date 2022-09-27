<div class="modal fade" id="RejectModal" tabindex="-1"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="<?php echo base_url('voucher-jurnal-umum/reject-voucher'); ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no_voucher" value="<?php echo $voucher['no_voucher']; ?>">
                    <p style="font-size: 16px">Apakah anda yakin ingin menolak voucher ini?</p>
                    <textarea class="form-control" rows="4" name="keterangan" placeholder="Berikan keterangan untuk proses penolakan voucher." required></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
