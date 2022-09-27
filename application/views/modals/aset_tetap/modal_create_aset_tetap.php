<div class="modal fade" id="AddAsetTetapModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Aset Tetap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="<?php echo base_url();?>aset-tetap" method="post">
        <div class="modal-body">
        <div class="row">
                    <div class="col-12">
                        <label>Akun COA</label>
                        <div class="select2-drpdwn">
                            <div class="mb-2">
                                <select name="coa" id="SelectCOA" style="width: 100% !important;" class="js-example-basic-single col-sm-12 form-control">
                                    <option value="">Pilih Akun COA</option>
                                    <?php foreach($coa as $c){?>
                                        <option value="<?php echo $c['kode_account_list']?>"><?php echo $c['kode_account_list'].' - '.$c['nama_account_list']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Unit</label>
                        <div class="select2-drpdwn">
                            <div class="mb-2">
                                <select name="unit" id="SelectUnit" style="width: 100% !important;" class="js-example-basic-single col-sm-12 form-control">
                                    <option value="">Pilih Unit</option>
                                    <?php foreach($unit_kerja as $uk){?>
                                        <option value="<?php echo $uk['KODE_UNIT']?>"><?php echo $uk['KODE_UNIT'].' - '.$uk['NAMA_UNIT']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Keterangan</label>
                        <div class="mb-3">
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>No Voucher</label>
                        <div class="mb-3">
                            <input type="text" name="no_voucher" class="form-control" placeholder="No Vouvher" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Jumlah</label>
                        <div class="mb-3">
                            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Satuan</label>
                        <div class="mb-3">
                            <input type="text" name="satuan" class="form-control" placeholder="Satuan" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Umur Ekonomis</label>
                        <div class="mb-3">
                            <input type="number" name="umur" class="form-control" placeholder="Umur EKonomis" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Tanggal</label>
                        <div class="mb-3">
                            <input type="date" name="tgl" class="form-control" placeholder="tanggal" required>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-secondary">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>

