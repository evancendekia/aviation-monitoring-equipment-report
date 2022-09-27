<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Permintaan Anggaran</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <?php if($role != 1){?>
                            <div class="px-2">
                                <button type="button" class="btn btn-secondary font-weight-bold" data-toggle="modal"  data-target="#PermintaanAnggaranModal">Ajukan Permintaan Anggaran</button>
                            </div>
                        <?php }?>   
                    </div>
                </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">No</th>
                                <th class="text-uppercase text-secondary">No PA</th>
                                <th class="text-uppercase text-secondary">Kode Induk Anggaran</th>
                                <th class="text-uppercase text-secondary">Tanggal</th>
                                <th class="text-uppercase text-secondary">Uraian</th>
                                <th class="text-uppercase text-secondary">Tipe</th>
                                <th class="text-uppercase text-secondary">Status</th>
                                <th class="text-center text-uppercase text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($permintaan_anggaran as $pa){?>
                                <tr>
                                    <td class="align-middle">
                                        <?php echo $no;?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pa['no_pa'];?>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pa['kode_induk'];?> 
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pa['tgl'];?> 
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $pa['uraian'];?> 
                                    </td>
                                    <td class="align-middle">
                                        <?php echo str_replace("_"," ",$pa['type']);?> 
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge badge-<?php echo $pa['status'] == 'Draft' ? ('light') : ($pa['status'] == 'Approved' ? 'success': 'primary');?> badge-lg"><?php echo $pa['status'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!-- <div class="btn-group"> -->
                                            <?php if($pa['status'] == 'Draft'){?>
                                                <a type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" href="<?php echo base_url('form-request-anggaran?num='.$pa['no_pa']);?>" class="text-secondary font-weight-bold">
                                                    <i class="fa fa-edit"></i>
                                                    Continue
                                                </a>
                                            <?php }else{?>
                                                <a class="btn btn-outline-secondary btn-sm text-xs px-2" href="<?php echo base_url('view-request-anggaran?num='.$pa['no_pa']);?>" class="text-secondary font-weight-bold">
                                                    <i class="fa fa-file-text"></i>
                                                    View Document
                                                </a>

                                            <?php }?>
                                        <!-- </div> -->
                                    </td>
                                </tr>
                            <?php $no++;}?>
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
<?php $this->load->view('modals/request_anggaran/first_form');?>
      
