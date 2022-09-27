<div class="modal fade" id="KodeAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kode Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="select2-drpdwn">
                    <div class="row">
                        <div class="col-12">
                            <select id="KodeAccount" onchange="GetValueKodeAccount()" class="f-12 js-example-basic-single form-control" style="width: 100% !important;" >
                                <option value="">Pilih Kode Account</option>
                                <?php
                                $old_group = 'kosong';
                                foreach ($account as $i => $a) {
                                    ?>
                                    <?php if ($a['kode_header'] != $old_group) { ?>
                                        <?php if ($i != 0) { ?>
                                            </optgroup>
                                        <?php } ?>
                                        <optgroup label="<?php echo $a['nama_header']; ?>">
                                            <?php
                                            $old_group = $a['kode_header'];
                                        }
                                        ?>
                                        <option value='<?php echo htmlspecialchars(json_encode($a)); ?>'><?php echo $a['kode_account_list'] . ' - ' . $a['nama_account_list']; ?></option>
                                        <?php if ($i == count($account) - 1) { ?>
                                        </optgroup>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</div>