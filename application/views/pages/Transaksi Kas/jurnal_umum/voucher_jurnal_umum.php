<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Voucher Jurnal Umum</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <?php if ($role != 1) { ?>
                            <div class="px-2">
                                <a href="<?php echo base_url('voucher-jurnal-umum/add'); ?>" class="btn btn-secondary font-weight-bold">Tambah Voucher Jurnal Umum</a>
                            </div>
                        <?php } ?>   
                    </div>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <form id="form-filter" method="get" action="<?php echo base_url('voucher-jurnal-umum'); ?>">
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
                        <div class="col-6">
                            <div class="form-group pr-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Status</span>
                                    </div>
                                    <select class="form-control f-12" name="status">
                                        <option value="0" <?php echo set_select('status', 0, $this->input->get('status') == 0 ? TRUE : FALSE); ?>>Pilih Status</option>
                                        <option value="1" <?php echo set_select('status', 1, $this->input->get('status') == 1 ? TRUE : FALSE); ?>>Waiting</option>
                                        <option value="2" <?php echo set_select('status', 2, $this->input->get('status') == 2 ? TRUE : FALSE); ?>>Approved</option>
                                        <option value="3" <?php echo set_select('status', 3, $this->input->get('status') == 3 ? TRUE : FALSE); ?>>Rejected</option>
                                        <?php if ($role != 1) { ?>
                                            <option value="4" <?php echo set_select('status', 4, $this->input->get('status') == 4 ? TRUE : FALSE); ?>>Draft</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-secondary mb-3"><span class="f-12">Terapkan</span></button>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                        <p class="ml-4 mb-2"><i class="fa fa-search"></i> <?php echo $total; ?> Data ditemukan</p>
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
                                <th class="text-uppercase text-secondary">Uraian</th>
                                <th class="text-uppercase text-secondary text-center">Status</th>
                                <th class="text-uppercase text-secondary text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <?php
                            if ($voucher != NULL) {
                                $page = $this->input->get('page');
                                $i = 1 + ($page != NULL ? ($page - 1) * 10 : 0);
                                foreach ($voucher as $v) {
                                    ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <?php echo $i; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?php echo date('d/m/Y', strtotime($v['tgl'])); ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php echo $v['no_voucher']; ?>
                                        </td> 
                                        <td class="align-middle">
                                            <?php echo $v['memo']; ?> 
                                        </td>   
                                        <td class="align-middle text-center">
                                            <?php $status_color = ['DRAFT' => 'light', 'WAITING' => 'primary', 'APPROVED' => 'success', 'REJECTED' => 'danger']; ?>
                                            <span class="badge badge-<?php echo $status_color[$v['status']]; ?> badge-lg"><?php echo $v['status']; ?></span>
                                        </td>   
                                        <td class="align-middle text-center">
                                            <!-- <div class="btn-group"> -->
                                            <?php if ($v['status'] == 'DRAFT') { ?>
                                                <a href="<?php echo base_url('voucher-jurnal-umum/add?voucher=' . urlencode($v['no_voucher'])); ?>" class="btn btn-outline-secondary btn-sm text-xs px-2" class="text-secondary font-weight-bold">
                                                    <i class="fa fa-edit"></i>
                                                    Continue
                                                </a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url('voucher-jurnal-umum/' . $v['id_voucher']); ?>" class="btn btn-outline-secondary btn-sm text-xs px-2" class="text-secondary font-weight-bold">
                                                    <i class="fa fa-file-text"></i>
                                                    View Document
                                                </a>

                                            <?php } ?>
                                            <!-- </div> -->
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" class="align-middle text-center">
                                        Data belum tersedia
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="..." class="mx-4 my-3">                    
                    <?php echo $this->pagination->create_links(); ?>                 
                </nav> 
            </div>
        </div>
    </div>
</div>
<?php // $this->load->view('modals/permintaan_kas/first_form');  ?>
      
