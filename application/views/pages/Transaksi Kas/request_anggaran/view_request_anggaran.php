<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-2 mb-2">
        <button type="button" class="btn btn-block btn-secondary font-weight-bold" onclick="(window.location = '<?php echo base_url('request-anggaran');?>')"><i class="fa fa-caret-left  "></i> Back</button>
    </div>
</div>
<div class="row">
    
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Form Permintaan Anggaran <span class="text-success">[<?php echo str_replace("_"," ",$pa[0]['type']);?>]<span></h5>
                <!-- <?php if($pa[0]['status'] == 'Approved' && $pa[0]['author'] == $this->session->userdata('NIP')){?>
                    <div class="float-right card-header-right">
                        <form action="<?php echo base_url('pengeluaran-kas');?>"  method="POST">
                            <input type="hidden" name="id" value="<?php echo $pa[0]['id_pa'];?>">
                            <button type="submit" class="btn btn-success font-weight-bold" >Ajukan Pengeluaran Kas</button>
                        </form>
                    </div>
                <?php }?>  -->
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
                                    <tr>
                                        <td class="p-1">Status<td>
                                        <td class="p-1">: <span class="badge badge-<?php echo $pa[0]['status'] == 'Draft' ? ('light') : ($pa[0]['status'] == 'Approved' ? 'success': 'primary');?> badge-lg"><?php echo $pa[0]['status'];?></span><td>
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
                    <div id="first_tab">
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="table-responsive p-0">
                                    <table class="table table-hover align-items-center mb-3 f-12">
                                        <?php $this->load->view('components/request_anggaran/head_view');?>
                                        <tbody>
                                            <?php $sum = 0; $sum_acc = 0;?>
                                            <?php foreach($list_request as $lr){?>
                                                <tr>
                                                    <td><span><?php echo $lr['no_unit'];?></span></td>
                                                    <td><span><?php echo $lr['kode_anggaran'];?></span></td
                                                    ><td><span><?php echo $lr['nama_akun'];?></span></td>
                                                    <td><span><?php echo $lr['unit_kerja'];?></span></td>
                                                    <td><span><?php echo $lr['unit_bisnis'];?></span></td>
                                                    <?php //if($pa[0]['status'] != 'Approved'){?>
                                                        <td class="text-right"><span><?php echo $lr['jumlah'] == null ? '' : number_format($lr['jumlah'],0,",",".");?></span></td>
                                                        <td class="text-right"><span><?php echo $lr['jumlah_acc'] == null ? '' : number_format($lr['jumlah_acc'],0,",",".");?></span></td>
                                                    <?php //}else{?>

                                                    <?php //}?>
                                                    <td><span><?php echo $lr['keterangan'];?></span></td>
                                                </tr>
                                            <?php $sum= $sum + $lr['jumlah']; $sum_acc = $sum_acc + $lr['jumlah_acc']; }?>
                                            <tr>
                                                <td colspan="5" class="text-right"><b>Total</b></td>
                                                <td class="text-right"><?php echo number_format($sum,0,",",".")?></td>
                                                <td class="text-right"><?php echo $sum_acc != 0 ?number_format($sum_acc,0,",","."):'';?></td>
                                                <td colspan="2"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php if($pa[0]['status'] == 'Waiting Approval' && $role == 1){?>
                            <div class="row">
                                <div class="col-6">
                                    <a class='btn btn-block btn-danger text-white font-weight-bold' id="close_button">Tolak</a>
                                </div>
                                <div class="col-6">
                                    <button type="button" class='btn btn-block btn-secondary font-weight-bold' onClick='Proses();'>Proses Permintaan Anggaran</button>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div id="second_tab" style="display: none;">
                        <?php if($pa[0]['status'] == 'Waiting Approval' && $role == 1){?>
                            <form  action="<?php echo base_url('proses-request-anggaran');?>" method="post">
                            <input type='hidden' name="id_pa" value="<?php echo $pa[0]['id_pa'];?>" class='form-control f-12'>
                            <input type='hidden' name="num" value="<?php echo $this->input->get('num');?>" class='form-control f-12'>
                            <input type='hidden' name="jumlah_detil" value="<?php echo count($list_request);?>" class='form-control f-12'>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="table-responsive p-0">
                                            <table class="table table-hover align-items-center mb-3 f-12">
                                                <?php $this->load->view('components/request_anggaran/head_view');?>
                                                <tbody>
                                                    <?php $index = 0; foreach($list_request as $lr){?>
                                                        <input type='hidden' name="id_detil-<?php echo $index;?>" value="<?php echo $lr['id_pa_detil'];?>" class='form-control f-12'>
                                                        <tr>
                                                            <td><span><?php echo $lr['no_unit'];?></span></td>
                                                            <td><span><?php echo $lr['kode_anggaran'];?></span></td>
                                                            <td><span><?php echo $lr['nama_akun'];?></span></td>
                                                            <td><span><?php echo $lr['unit_kerja'];?></span></td>
                                                            <td><span><?php echo $lr['unit_bisnis'];?></span></td>
                                                            <td>
                                                                <input type='tel' value="<?php echo $lr['jumlah'];?>" class='form-control f-12 text-right priceformat' disabled>
                                                            </td>
                                                            <td>
                                                                <input type='tel' name="jumlah-<?php echo $index;?>" value="<?php echo $lr['jumlah'];?>"class='text-right form-control f-12 priceformat'>
                                                            </td>
                                                            <td><span><?php echo $lr['keterangan'];?></span></td>
                                                        </tr>
                                                    <?php $index++;}?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="valid" value="1" class="custom-control-input" id="valid" required>
                                    <label class="custom-control-label" for="valid">Saya yakin untuk memproses permintaan anggaran ini</label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type='submit' class='btn btn-block btn-secondary font-weight-bold'>Proses Permintaan Anggaran</button>
                                    </div>
                                </div>
                            </form>
                        <?php }?>
                    </div>
            </div>
        </div>
    </div>
</div>