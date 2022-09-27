<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">        
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Mata Uang</h5>
                <div class="float-right card-header-right">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateMataUangModal" onClick="TambahMataUang()"><i class="fa fa-plus text-white"></i> Add Mata Uang</button>
               </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">Simbol</th>
                                <th class="text-uppercase text-secondary">Keterangan</th>
                                <th class="text-center text-uppercase text-secondary">Koversi (Rp)</th>
                                <th class="text-center text-uppercase text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mata_uang as $u) { ?>
                                <tr>
                                    <td class="align-middle px-3">
                                        <span><?php echo $u['simbol']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $u['text']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php echo 'Rp '.number_format($u['konversi'],2,',','.'); ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-warning btn-sm text-xs px-2" data-toggle="modal" data-target="#EditMataUangModal" onClick='EditMataUang(<?php echo json_encode($u); ?>)'>
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                            <?php if ($u['status'] == 'OPEN') { ?>
                                                <button type="button" class="btn btn-outline-danger btn-sm text-xs px-2" data-toggle="modal"  data-target="#DeleteMataUangModal" onClick='DeleteMataUang(<?php echo json_encode($u); ?>)'>
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            <?php } ?>
                                        </div>
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
<?php $this->load->view('modals/mata_uang/modal_create_mata_uang'); ?>
<?php $this->load->view('modals/mata_uang/modal_delete_mata_uang'); ?>
<?php $this->load->view('modals/mata_uang/modal_edit_mata_uang'); ?>


