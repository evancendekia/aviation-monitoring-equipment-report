<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Pengeluaran Kas</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <!-- <div class="px-2">
                            <button type="button" class="btn btn-secondary" data-toggle="modal"  data-target="#PermintaanAnggaranModal">Ajukan Permintaan Anggaran</button>
                        </div> -->
                    </div>
                </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">No</th>
                                <th class="text-uppercase text-secondary">No Voucher</th>
                                <th class="text-uppercase text-secondary">No PA</th>
                                <th class="text-uppercase text-secondary">Tanggal</th>
                                <th class="text-uppercase text-secondary">Uraian</th>
                                <th class="text-uppercase text-secondary">Tipe</th>
                                <th class="text-uppercase text-secondary">Status</th>
                                <th class="text-center text-uppercase text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($pengeluaran_kas as $pk){?>
                                <tr>
                                    <td class="align-middle">
                                        <?php echo $no;?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pk['no_voucher'];?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pk['no_pa'];?> 
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pk['tgl_pk'];?> 
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pk['uraian'];?> 
                                    </td>
                                    <td class="align-middle">
                                        <?php echo str_replace("_"," ",$pk['type']);?> 
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge badge-<?php echo $pk['status_pk'] == 'Draft' ? ('light') : ($pk['status_pk'] == 'Approved' ? 'success': 'primary');?> badge-lg"><?php echo $pk['status_pk'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!-- <div class="btn-group"> -->
                                            <?php if($pk['status_pk'] == 'Draft'){?>
                                                <button type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" onclick="(window.location = '<?php echo base_url('form-pengeluaran-kas?num='.$pk['no_voucher']);?>');" class="text-secondary font-weight-bold">
                                                    <i class="fa fa-edit"></i>
                                                    Continue
                                                </button>
                                            <?php }else{?>
                                                <button type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" onclick="(window.location = '<?php echo base_url('view-pengeluaran-kas?num='.$pk['no_voucher']);?>');" class="text-secondary font-weight-bold">
                                                    <i class="fa fa-file-text"></i>
                                                    View Document
                                                </button>

                                            <?php }?>
                                        <!-- </div> -->
                                    </td>
                                </tr>
                            <?php $no++;}?>
                        </tbody>
                    </table>
                </div>
                <!-- <nav aria-label="..." class="mx-4 my-3">                    
                    <?php //echo $this->pagination->create_links(); ?>                 
                </nav> -->
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('modals/request_anggaran/first_form');?>
      
