<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Data Sarfas</h5>
                <div class="float-right card-header-right">
                    <!-- <?php if($role == 1){?>
                        <div class="btn-group">
                            <div class="px-2">
                                <button type="button" class="btn btn-secondary font-weight-bold" onclick="ShowAddLaporan()">Tambah Fasilitas</button>
                            </div>  
                        </div>
                    <?php }?> -->
                </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary">#</th>
                                <th class="text-center text-uppercase text-secondary">Type</th>
                                <th class="text-center text-uppercase text-secondary">Kode Alat</th>
                                <th class="text-center text-uppercase text-secondary">Masa Pakai</th>
                                <!-- <th class="align-middle text-center text-uppercase text-secondary">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($filter['data'] as $f){?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo (10*($page_num-1))+$no;?></td>
                                    <td class="align-middle text-center"><?php echo $f['type'];?> </td>
                                    <td class="align-middle text-center"><?php echo $f['kode'];?></td>
                                    <td class="align-middle text-center"><?php echo $f['masa_pakai']." Tahun";?></td>
                                    <!-- <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <a href="">
                                                <button type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" data-toggle="modal" data-target="#ResetPasswordModal" onClick=''>
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </button>
                                            </a>
                                        </div>
                                    </td> -->
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
      
