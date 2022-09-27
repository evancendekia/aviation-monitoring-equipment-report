<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-12">        
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="pull-left">Link Account</h5>
            </div>
            <div class="card-body">
                <div class="tabbed-card">
                    <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtab1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-clrhome-tab1" data-toggle="pill" href="#pills-clrhome1" role="tab" aria-controls="pills-clrhome1" aria-selected="true">
                                Accounts and Banking Accounts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-clrprofile-tab1" data-toggle="pill" href="#pills-clrprofile1" role="tab" aria-controls="pills-clrprofile1" aria-selected="false">
                                Sales Accounts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-clrcontact-tab1" data-toggle="pill" href="#pills-clrcontact1" role="tab" aria-controls="pills-clrcontact1" aria-selected="false">
                                Purchases Accounts
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-clrtabContent1">
                        <div class="tab-pane fade show active" id="pills-clrhome1" role="tabpanel" aria-labelledby="pills-clrhome-tab1">
                            <form action="<?php echo base_url('link-account-update'); ?>" method="post">
                                <input type="hidden" name="type" value="bank">
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Equity Account for Current Earnings
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <span class="mr-2 d-md-inline d-none">:</span><b>39 - Current Year Earning</b>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Equity Account for Retained Earnings
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <span class="mr-2 d-md-inline d-none">:</span><b>38 - Retained Earning</b>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Equity Account for Historical Balancing
                                    </div>
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <select class="js-example-basic-single" name="historical_balancing" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $bank[2]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Equity Account for Undeposited Funds
                                    </div>
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <select class="js-example-basic-single" name="undeposited_funds" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $bank[3]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Account for Currency Gain/Losses
                                    </div>
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <select class="js-example-basic-single"name="currency_gain_loss" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $bank[4]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 col-md-11 text-md-right text-center">
                                        <button type="submit" class="btn btn-secondary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-clrprofile1" role="tabpanel" aria-labelledby="pills-clrprofile-tab1">
                            <form action="<?php echo base_url('link-account-update'); ?>" method="post">
                                <input type="hidden" name="type" value="sales">
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Asset Account for Tracking Receivables
                                    </div>
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <select class="js-example-basic-single" name="tracking_receivable" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $sales[0]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Bank Account for Customer Receipts
                                    </div>
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <select class="js-example-basic-single" name="customer_receipt" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $sales[1]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="sales-1" name="status_freight" type="checkbox" <?php echo $sales[2]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="sales-1">I charge freight on sales</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-sales-1" style="display: <?php echo $sales[2]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Income Account for Freight</label>
                                        <select class="js-example-basic-single" name="freight" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $sales[2]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="sales-2" name="status_customer_deposit" type="checkbox" <?php echo $sales[3]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="sales-2">I track deposits collected from customers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-sales-2" style="display: <?php echo $sales[3]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Liability Account for Customer Deposits</label>
                                        <select class="js-example-basic-single" name="customer_deposit" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $sales[3]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="sales-3" name="status_discount" type="checkbox" <?php echo $sales[4]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="sales-3">I give discounts for early payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-sales-3" style="display: <?php echo $sales[4]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Expense or Cost of Sales Account for Discounts</label>
                                        <select class="js-example-basic-single" name="discount" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $sales[4]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="sales-4" name="status_late_charge" type="checkbox" <?php echo $sales[5]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="sales-4">I assess charges for late payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-sales-4" style="display: <?php echo $sales[5]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Income Account for Late Charges</label>
                                        <select class="js-example-basic-single" name="late_charge" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $sales[5]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 col-md-11 text-md-right text-center">
                                        <button type="submit" class="btn btn-secondary">Save</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <div class="tab-pane fade" id="pills-clrcontact1" role="tabpanel" aria-labelledby="pills-clrcontact-tab1">
                            <form action="<?php echo base_url('link-account-update'); ?>" method="post">
                                <input type="hidden" name="type" value="purchases">
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Liability Account for Tracking Payables
                                    </div>
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <select class="js-example-basic-single" name="tracking_payable" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $purchases[0]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-lg-5 col-md-6 text-md-right text-left">
                                        Bank Account for Paying Bills
                                    </div>
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <select class="js-example-basic-single" name="paying_bill" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $purchases[1]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="purchases-1" name="status_item_receipt" type="checkbox" <?php echo $purchases[2]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="purchases-1">I can receive items without a Supplier bill</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-purchases-1" style="display: <?php echo $purchases[2]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Liability Account for Item Receipts</label>
                                        <select class="js-example-basic-single" name="item_receipt" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $purchases[2]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="purchases-2" name="status_freight_paid" type="checkbox" <?php echo $purchases[3]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="purchases-2">I pay freight on purchases</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-purchases-2" style="display: <?php echo $purchases[3]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Expense or Cost of Sales Account for Freight</label>
                                        <select class="js-example-basic-single" name="freight_paid" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $purchases[3]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="purchases-3" name="status_supplier_deposit" type="checkbox" <?php echo $purchases[4]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="purchases-3">I track deposits paid to suppliers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-purchases-3" style="display: <?php echo $purchases[4]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Asset Account for Supplier Deposits</label>
                                        <select class="js-example-basic-single" name="supplier_deposit" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $purchases[4]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="purchases-4" name="status_discount_taken" type="checkbox" <?php echo $purchases[5]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="purchases-4">I take discounts for early payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-purchases-4" style="display: <?php echo $purchases[5]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Income (or Contra) Account for Discounts</label>
                                        <select class="js-example-basic-single" name="discount_taken" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $purchases[5]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="purchases-5" name="status_late_fees_paid" type="checkbox" <?php echo $purchases[6]['is_active'] != 0 ? 'checked' : ''; ?>>
                                            <label for="purchases-5">I pay charges for late payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3 ml-lg-3" id="container-purchases-5" style="display: <?php echo $purchases[6]['is_active'] != 0 ? 'block' : 'none'; ?>">
                                    <div class="col-lg-5 col-md-5 select2-drpdwn">
                                        <label>Expense Account for Late Charges</label>
                                        <select class="js-example-basic-single" name="late_fees_paid" style="max-width: 100%; width: 100%">
                                            <option value="0" selected>Pilih Account</option>
                                            <?php foreach ($account_list as $a) { ?>
                                                <option value="<?php echo $a['id_account_list']; ?>" <?php echo $purchases[6]['id_account_list'] == $a['id_account_list'] ? 'selected' : ''; ?>><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 col-md-11 text-md-right text-center">
                                        <button type="submit" class="btn btn-secondary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


