<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">        
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Tarif Layanan</h5>
                <div class="float-right card-header-right">
                    <!--<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateAccountListModal"><i class="fa fa-plus text-white"></i> Add Account List</button>-->
                    <form id="filter-account-list" class="form-search" action="<?php echo base_url('tarif-layanan'); ?>" method="get">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" value="<?php echo $this->input->get('keyword') ?: ''; ?>" placeholder="Search" aria-label="Keyword Search">
                                <div class="input-group-append">
                                    <button class="input-group-text"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">Kode Jasa</th>
                                <th class="text-uppercase text-secondary">Nama Unit</th>
                                <th class="text-uppercase text-secondary">Nama Jasa</th>
                                <th class="text-uppercase text-secondary text-center">Mata Uang</th>
                                <th class="text-uppercase text-secondary text-center">Tarif</th>
                                <th class="text-uppercase text-secondary text-center">Satuan</th>
                                <th class="text-center text-uppercase text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tarif_layanan as $t) { ?>
                                <tr>
                                    <td class="align-middle px-3">
                                        <span><?php echo $t['KODE_JASA']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $t['NAMA_UNIT']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $t['NAMA_JASA']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php echo $t['MATA_UANG']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php echo number_format($t['TARIF'],2,',','.'); ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php echo $t['SATUAN']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-outline-secondary btn-sm text-xs px-2" data-toggle="modal"  data-target="#DetailTarifLayananModal" onClick='DetailTarifLayanan(<?php echo json_encode($t); ?>)'>
                                                <i class="fa fa-list"></i>
                                                Detail
                                            </a>
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
<?php $this->load->view('modals/tarif_layanan/modal_tarif_layanan'); ?>


