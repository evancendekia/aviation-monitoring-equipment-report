<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Jurnal Penerimaan Kas</h5>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
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
                            if ($penerimaan_kas != NULL) {
                                $page = $this->input->get('page');
                                $i = 1 + ($page != NULL ? ($page - 1) * 10 : 0);
                                foreach ($penerimaan_kas as $pk) {
                                    $kode_account = explode(';', $pk['kode_account']);
                                    ?>
                                    <tr>
                                        <td class="align-top text-center" rowspan="<?php echo count($kode_account) + 1; ?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td class="align-top text-center" rowspan="<?php echo count($kode_account) + 1; ?>">
                                            <?php echo date('d/m/Y', strtotime($pk['tgl'])); ?>
                                        </td>
                                        <td class="align-middle" colspan="4">
                                            <?php echo $pk['memo']; ?> 
                                        </td>       
                                    </tr>
                                    <?php
                                    $nama_account = explode(';', $pk['nama_account']);
                                    $kode_mata_uang = explode(';', $pk['kode_mata_uang']);
                                    $debit = explode(';', $pk['debit']);
                                    $kredit = explode(';', $pk['kredit']);
                                    foreach ($kode_account as $j => $ka) {
                                        ?>
                                        <tr>
                                            <td class="align-middle border-top-0">
                                                <?php echo $pk['no_voucher']; ?>
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
      
