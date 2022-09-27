<div class="modal fade" id="ViewDokumenModal" tabindex="-1"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dokumen Lampiran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe style="height: 80vh"
                    src="<?php echo base_url('upload/pdf/jurnal_umum/'.$voucher['file']); ?>"
                    frameBorder="0"
                    scrolling="auto"
                    width="100%"
                    ></iframe>

            </div>
        </div>
    </div>
</div>
