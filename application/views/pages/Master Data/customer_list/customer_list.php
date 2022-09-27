<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">        
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Customer List</h5>
                <div class="float-right card-header-right">
                    <!--<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateAccountListModal"><i class="fa fa-plus text-white"></i> Add Account List</button>-->
                    <form id="filter-account-list" class="form-search" action="<?php echo base_url('customer-list'); ?>" method="get">
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
                                <th class="text-uppercase text-secondary">Kode Customer</th>
                                <th class="text-uppercase text-secondary">Nama</th>
                                <th class="text-uppercase text-secondary">Alamat</th>
                                <th class="text-uppercase text-secondary text-center">Kategori</th>
                                <th class="text-uppercase text-secondary text-center">Bidang Usaha</th>
                                <th class="text-center text-uppercase text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customer as $c) { ?>
                                <tr>
                                    <td class="align-middle px-3">
                                        <span><?php echo $c['KODE_CUSTOMER']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $c['NAMA_CUSTOMER']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $c['ALAMAT']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php echo $c['KATEGORI_CUSTOMER']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php echo $c['BIDANG_USAHA']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-outline-secondary btn-sm text-xs px-2" data-toggle="modal"  data-target="#DetailCustomerModal" onClick='DetailCustomer(<?php echo json_encode($c); ?>)'>
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
<?php $this->load->view('modals/customer/modal_detail_customer'); ?>


