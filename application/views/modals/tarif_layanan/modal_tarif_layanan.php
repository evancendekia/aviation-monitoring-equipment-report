<div class="modal fade" id="DetailTarifLayananModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <!--            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">TarifLayanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>-->
            <div class="modal-body">
                <div class="card card-absolute mb-0">
                    <div class="card-header bg-secondary">
                        <h5 id="kodeJasa"></h5>
                    </div>
                    <div class="card-body">
                        <div class="d-table mx-auto" style="width: calc(100% - 24px)">
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99">
                                    Grup Jasa
                                </div>
                                <div class="d-table-cell p-2">
                                    <span id="grupJasa"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Nama Jasa
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="namaJasa"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Grup Unit
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="grupUnit"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Nama Unit
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="namaUnit"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Mata Uang
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="mataUang"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Tarif
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="tarif"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Satuan
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="satuan"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    CARGODORING
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="cargodoring"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Ukuran
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="ukuran"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Ket UK
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="ketUK"></span>
                                </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right py-2 pr-3 pl-1 align-middle" style="width: 30%; font-weight: 400; color: #667E99; border-top: 1px dotted #D5E4F1 ">
                                    Ket Jasa
                                </div>
                                <div class="d-table-cell p-2" style="border-top: 1px dotted #D5E4F1">
                                    <span id="kJasa"></span>
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