<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Jurnal Umum</h5>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <form id="form-filter" method="get" action="<?php echo base_url('jurnal-umum'); ?>">
                    <div class="row mx-4 border mb-3 rounded">
                        <div class="col-12 mx-1 mt-3">
                            <label class="f-16">Filter</label>
                        </div>
                        <div class="col-6">
                            <div class="form-group pl-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">From</span>
                                    </div>
                                    <input type="text" name="from" placeholder="__/__/____" data-language="id" value="<?php echo $this->input->get('from') ? $this->input->get('from') : NULL; ?>" class="datepicker-here form-control digits f-14" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pr-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">To</span>
                                    </div>
                                    <input type="text" name="to" data-language="id" class="datepicker-here form-control digits f-14" value="<?php echo $this->input->get('to') ? $this->input->get('to') : date('d/m/Y'); ?>" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pl-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Keyword</span>
                                    </div>
                                    <input type="text" name="keyword" value="<?php echo $this->input->get('keyword') != NULL ? $this->input->get('keyword') : NULL; ?>" class="form-control f-12 py-2" value="" aria-describedby="basic-addon2" placeholder="Kata Kunci Uraian">
                                </div>
                            </div>
                        </div>                    
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-secondary mb-3"><span class="f-12">Terapkan</span></button>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                        <p class="ml-4 mb-2"><i class="fa fa-search"></i> <?php echo $total;  ?> Data ditemukan</p>
                        <div class="form-group pr-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Urutkan</span>
                                </div>
                                <select class="form-control f-12" name="urutkan" onchange="$('#form-filter').submit()">
                                    <option value="1" <?php echo set_select('urutkan', 1, $this->input->get('urutkan') == 1 ? TRUE : FALSE); ?>>Terbaru</option>
                                    <option value="2" <?php echo set_select('urutkan', 2, $this->input->get('urutkan') == 2 ? TRUE : FALSE); ?>>Terlama</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-center">No</th>
                                <th class="text-uppercase text-secondary text-center">Tanggal</th>
                                <th class="text-uppercase text-secondary">No Voucher</th>
                                <th class="text-uppercase text-secondary">Account</th>
                                <th class="text-uppercase text-secondary text-center">Debit</th>
                                <th class="text-uppercase text-secondary text-center">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <?php
                            if ($jurnal_umum != NULL) {
                                $page = $this->input->get('page');
                                $i = 1 + ($page != NULL ? ($page - 1) * 10 : 0);
                                foreach ($jurnal_umum as $ju) {
                                    $kode_account = explode(';', $ju['kode_account']);
                                    ?>
                                    <tr>
                                        <td class="align-top text-center" rowspan="<?php echo count($kode_account) + 1; ?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td class="align-top text-center" rowspan="<?php echo count($kode_account) + 1; ?>">
                                            <?php echo date('d/m/Y', strtotime($ju['tgl'])); ?>
                                        </td>
                                        <td class="align-middle" colspan="4">
                                            <?php echo $ju['memo']; ?> 
                                        </td>         
                                    </tr>
                                    <?php
                                    $nama_account = explode(';', $ju['nama_account']);
                                    $kode_mata_uang = explode(';', $ju['kode_mata_uang']);
                                    $debit = explode(';', $ju['debit']);
                                    $kredit = explode(';', $ju['kredit']);
                                    foreach ($kode_account as $j => $ka) {
                                        ?>
                                        <tr>
                                            <td class="align-middle border-top-0">
                                                <?php echo $ju['no_voucher']; ?>
                                            </td>
                                            <td class="align-middle border-top-0">
                                                <b><?php echo $ka; ?></b> - <?php echo $nama_account[$j]; ?>
                                            </td>
                                            <td class="align-middle text-right text-center border-top-0">
                                                <?php echo $debit[$j] != ' ' ? $kode_mata_uang[$j] . ' ' . number_format(floatval($debit[$j]), 2, ',', '.') : ''; ?>
                                            </td>
                                            <td class="align-middle text-right text-center border-top-0">
                                                <?php echo $kredit[$j] != ' ' ? $kode_mata_uang[$j] . ' ' . number_format(floatval($kredit[$j]), 2, ',', '.') : ''; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9" class="align-middle text-center">
                                        Data belum tersedia
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- <nav aria-label="..." class="mx-4 my-3">                    
                <?php //echo $this->pagination->create_links();     ?>                 
                </nav> -->
            </div>
        </div>
    </div>
</div>
<?php // $this->load->view('modals/permintaan_kas/first_form');  ?>
      
