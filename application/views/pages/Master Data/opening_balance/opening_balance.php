<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">        
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Opening Balance</h5>
                <div class="float-right card-header-right">
                    <!--<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#CreateAccountListModal"><i class="fa fa-plus text-white"></i> Add Account List</button>-->
                    <form id="filter-account-list" action="<?php echo base_url('opening-balance'); ?>" method="get">
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
                                        <span><?php echo number_format($al['balance'],2,',','.'); ?></span>
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


