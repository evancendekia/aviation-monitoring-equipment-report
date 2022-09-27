<?php $name_arr = array('NAMA','NIP','ALAMAT','KOTA','TEMPAT_LAHIR','TGL_LAHIR','KELAMIN','DARAH','AGAMA','TGL_MASUK','PENDIDIKAN','KODE_GOLONGAN','KODE_JABATAN','NAMA_UNIT','NO_DAPEN','NO_ASTEK','JENIS_KULIT','JENIS_RAMBUT','BERAT_BADAN','WARNA_MATA','BENTUK_WAJAH','HOBI','SUKU','KESEHATAN','KONTRASEPSI','NOMOR_REKENING','AN_REKENING','DAPEN','NPWP','ID_PROXIMITY','NO_MESIN','NO_BPJS','JURUSAN','NOMOR_HP','EMAIL','NIK');?>

<div class="modal fade" id="DetailKaryawanModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body">
                <div class="card card-absolute mb-0">
                    <div class="card-header bg-secondary">
                        <h5 id="head"></h5>
                    </div>
                    <div class="card-body">
                        <div class="d-table mx-auto" style="width: calc(100% - 24px)">
                          <?php for($i=0;$i<count($name_arr);$i++){?>
                            <div class="d-table-row">
                                <div class="d-table-cell text-right pr-3 pl-1 align-middle f-13" style="width: 35%; font-weight: 400; color: #667E99">
                                  <?php echo str_replace("_"," ",$name_arr[$i]);?>
                                </div>
                                <div class="d-table-cell p-2 f-13">
                                    <span id="<?php echo $name_arr[$i];?>"></span>
                                </div>
                            </div>
                          <?php }?>
                            
                        </div>
                        <div class="text-right">
                            <button class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="modal fade" id="DetailKaryawanModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      
      <form action="<?php echo base_url();?>user-delete" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id_user" id="id_user" class="form-control" >
            <table class="table mb-0 p-0">
              <tbody>
                  <?php for($i=0;$i<count($name_arr);$i++){?>
                  <tr>
                      <td class="align-middle col-4 p-0">
                        <span class="text-secondary font-weight-bold"><?php echo str_replace("_"," ",$name_arr[$i]);?></span>
                      </td>
                      <td class="align-middle p-0">
                        <span class="text-secondary"  id="<?php echo $name_arr[$i];?>">
                      </td>
                  </tr>
                  <?php }?>
              </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
 -->
