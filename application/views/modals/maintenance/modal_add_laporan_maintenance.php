<script>
    function ShowAddLaporan(){
        $("#sarfas_list").select2({
            dropdownParent: $("#AddLaporanMaintenanceModal")
        });
        $("#AddLaporanMaintenanceModal").modal('show');
    }
</script>
<div class="modal fade" id="AddLaporanMaintenanceModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Kerusakan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form  enctype="multipart/form-data" action="<?php echo base_url('maintenance/add');?>"  method="post">
        <div class="modal-body">
            <div class="row">
                <!--<div class="col-6">-->
                <!--    <label>No Laporan</label>-->
                <!--    <div class="mb-3">-->
                <!--        <input type="text" value="LM005/III/2022" disabled class="form-control" placeholder="Password" required>-->
                <!--    </div>        -->
                <!--</div>-->
                <!--<div class="col-6">-->
                <!--    <label>Tanggal</label>-->
                <!--    <div class="mb-3">-->
                <!--        <input type="text" value="08-03-2022" disabled class="form-control" placeholder="Password" required>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-6">
                    <label>Sarfas</label>
                    <div class="select2-drpdwn">
                        <div class="mb-2">
                            <select name="sarfas" id="sarfas_list" style="width: 100% !important;" class="js-example-basic-single col-sm-12 form-control" required>
                                <option value="">Pilih Sarfas</option>
                                <?php foreach($sarfas as $s){?>
                                    <option value="<?php echo $s['id_filter'];?>"><?php echo $s['kode'].' - '.$s['type'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label>Prioritas Perbaikan</label>
                    <select name="priority" class="form-control mb-3" required>
                        <option value="Tinggi">Tinggi</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Rendah">Rendah</option>
                    </select>
                </div>      
                
                <div class="col-12">
                    <label>Laporan Kerusakan</label>
                    <div class="mb-3">
                        <input type="text" name="laporan_kerusakan" value="" class="form-control" placeholder="Tuliskan laporan kerusakan" required>
                    </div>
                </div>
                
                <div class="col-12">
                    <label>File lampiran (JPG/PNG)</label> 
                    <div class="form-group">
                        <input type="file" name="dokumen" id="dokumen-lampiran" class="form-control f-14" required>
                        <small>File lampiran dengan ukuran maksimal 10MB.</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

