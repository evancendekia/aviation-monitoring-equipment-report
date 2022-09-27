<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-2 mb-2">
        <button type="button" class="btn btn-block btn-secondary" onclick="(window.location = '<?php echo base_url('request-anggaran');?>')"><i class="fa fa-caret-left  "> Back</i></button>
    </div>
</div>
<div class="row">
    
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Form Permintaan Anggaran <span class="text-success">[<?php echo str_replace("_"," ",$pa[0]['type']);?>]<span></h5>
                <div class="float-right card-header-right">
                    <form action="<?php echo base_url('pengeluaran-kas');?>"  method="POST">
                        <input type="hidden" name="id" value="<?php echo $pa[0]['id_pa'];?>">
                        <button type="submit" class="btn btn-success font-weight-bold" >Ajukan Pengeluaran Kas</button>
                    </form>
                </div>
                    
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <table class="table table-bordernone table-hover f-12 align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <td class="col-1 p-1">No<td>
                                        <td class="col-11 p-1">: <?php echo $pa[0]['no_pa'];?><td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Tanggal<td>
                                        <td class="p-1">: <?php echo $pa[0]['tgl'];?><td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Uraian<td>
                                        <td class="p-1">: <?php echo $pa[0]['uraian'];?><td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 offset-1">
                                <table class="table table-bordernone table-hover f-12 mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="col-4 p-1">Unit Report<td>
                                            <td class="col-8 p-1" >: <?php echo $pa[0]['NAMA_UNIT'];?><td>
                                        </tr>
                                        <tr>
                                            <td class="p-1 ">Kode Induk Anggran<td>
                                            <td class="p-1 ">: <?php echo $pa[0]['kode_induk'];?><td>
                                        </tr>
                                        <tr>
                                            <td class="p-1 ">Karyawan<td>
                                            <td class="p-1 ">: <?php echo $pa[0]['NAMA'];?><td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="table-responsive p-0">
                                <table class="table table-hover align-items-center mb-3 f-12">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary">No Unit</th>
                                            <th class="text-uppercase text-secondary">Kode Anggaran</th>
                                            <th class="text-uppercase text-secondary">Nama Akun</th>
                                            <th class="text-uppercase text-secondary">Unit Kerja</th>
                                            <th class="text-uppercase text-secondary">Unit Bisnis</th>
                                            <th class="text-uppercase text-secondary">Jumlah (Rp)</th>
                                            <th class="text-uppercase text-secondary">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_list">
                                        <?php $this->load->view('components/request_anggaran/list_data');?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>