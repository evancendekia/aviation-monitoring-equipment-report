<div class="modal fade" id="DetailCustomerModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <!--            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>-->
            <div class="modal-body">
                <div class="card card-absolute mb-0">
                    <div class="card-header bg-secondary">
                        <h5 id="kodeCustomer"></h5>
                    </div>
                    <div class="card-body">
                        <div class="d-table mx-auto" style="width: calc(100% - 24px)">
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99">
                                    Nama
                                </div>
                                <div class="d-table-cell p-2">
                                    <span id="namaCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Alamat
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="alamatCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Kategori
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="kategoriCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Bidang Usaha
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="bidangUsahaCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Kontak
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="kontakCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Tanggal Bergabung
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="tglBergabungCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Tanggal Keluar
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="tglKeluarCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Jenis Pekerjaan
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="jenisPekerjaanCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Jenis Tarif
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="jenisTarifCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Jenis Pembayaran
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="jenisPembayaranCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Mata Uang
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="mataUangCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    TM3 BM
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="tm3BMCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Nomor Kontrak
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="nomorKontrakCustomer"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    KD Customer Pusat
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="kdCustomerPusatCustomer"></span>
                                </div>
                            </div>

                        </div>
                        <div class="text-right">
                            <button class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--            <div class="modal-footer">
                            <button class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>-->
        </div>
    </div>
</div>