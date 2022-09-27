<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">        
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Account List</h5>
                <div class="float-right card-header-right">
                    <!--<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateAccountListModal"><i class="fa fa-plus text-white"></i> Add Account List</button>-->
                    <form id="filter-account-list" action="<?php echo base_url('account-list'); ?>" method="get">
                        <select id="select-account-list" name="kode_header" class="form-control">
                            <option value="0">Semua Account List</option>
                            <?php foreach ($filter as $f) { ?>
                                <option value="<?php echo $f['kode_account_list']; ?>" <?php echo $this->input->get('kode_header') != NULL ? ($this->input->get('kode_header') == $f['kode_account_list'] ? 'selected' : '') : ''; ?>><?php echo ucwords(strtolower($f['nama_account_list'])); ?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">Kode Account List</th>
                                <th class="text-uppercase text-secondary">Nama</th>
                                <th class="text-center text-uppercase text-secondary">Balance</th>
<!--                                <th class="text-uppercase text-secondary">Type</th>
                                <th class="text-center text-uppercase text-secondary">Set Time</th>
                                <th class="text-center text-uppercase text-secondary">Author</th>
                                <th class="text-center text-uppercase text-secondary">Status</th>-->
                                <th class="text-center text-uppercase text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($account_list as $al) { ?>
                                <tr>
                                    <td class="align-middle px-3 <?php echo!$al['is_header'] == 1 ?: 'font-weight-bold'; ?>">
                                        <span><?php echo $al['kode_account_list']; ?></span>
                                    </td>
                                    <td class="align-middle <?php echo!$al['is_header'] == 1 ?: 'font-weight-bold'; ?>">
                                        <span><?php echo $al['nama_account_list']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php echo $al['simbol'].$al['balance']; ?></span>
                                    </td>
<!--                                    <td class="align-middle">
                                        <span><?php // echo $al['tipe_account_list']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php // echo $al['set_time']; ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php // echo $al['author']; ?></span>
                                    </td>
                                    <td class="align-middle text-center <?php // echo $al['status'] == 'OPEN' ? 'text-success' : 'text-danger'; ?>">
                                        <span><?php // echo $al['status']; ?></span>
                                    </td>-->
                                    <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <?php if (strlen($al['kode_account_list']) < 8) { ?>
                                                <button type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" data-toggle="modal" data-target="#CreateAccountListModal" onClick='TambahAccountList(<?php echo json_encode($al); ?>)'>
                                                    <i class="fa fa-plus"></i>
                                                    Tambah
                                                </button>
                                            <?php } ?>
                                            <button type="button" class="btn btn-outline-warning btn-sm text-xs px-2" data-toggle="modal" data-target="#EditAccountListModal" onClick='EditAccountList(<?php echo json_encode($al); ?>)'>
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                            <?php if (strlen($al['kode_account_list']) > 1) { ?>
                                                <button type="button" class="btn btn-outline-danger btn-sm text-xs px-2" data-toggle="modal"  data-target="#DeleteAccountListModal" onClick='DeleteAccountList(<?php echo json_encode($al); ?>)'>
                                                    <i class="fa fa-ban"></i>
                                                    Close
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
<?php $this->load->view('modals/account_list/modal_create_account_list'); ?>
<?php $this->load->view('modals/account_list/modal_delete_account_list'); ?>
<?php $this->load->view('modals/account_list/modal_edit_account_list'); ?>


