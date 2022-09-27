<script>
    function ShowDetailLaporan(laporan,role){
        document.getElementById('no_laporan').value = laporan.no_laporan;
        document.getElementById('sarfas').value = laporan.jenis+' - '+laporan.merk+' - '+laporan.kapasitas+' - '+laporan.tahun_perolehan;
        document.getElementById('tgl').value = laporan.tgl;
        document.getElementById('author').value = laporan.author;
        document.getElementById('laporan_kerusakan').value = laporan.laporan_kerusakan;
        
        document.getElementById('badge_stat').className = "badge badge-"+color_switcher(laporan.status_laporan)+" f-12 badge-lg";
        document.getElementById('badge_stat').innerHTML = laporan.status_laporan;
        
        document.getElementById('badge_priority').className = "badge badge-"+color_switcher2(laporan.priority)+" f-12 badge-sm";
        document.getElementById('badge_priority').innerHTML = "Prioritas "+laporan.priority;
        
        document.getElementById("lampiran_1").src= '<?php echo base_url();?>/upload/file/maintenance/'+laporan.lampiran_1;
        document.getElementById("lampiran_2").src= '<?php echo base_url();?>/upload/file/maintenance/'+laporan.lampiran_2;
        
        document.getElementById('jenis_perbaikan').value = laporan.type;
        document.getElementById('processor').value = laporan.processor;
        document.getElementById('tgl_proses').value = laporan.tgl_proses;
        document.getElementById('tgl_selesai').value = laporan.tgl_selesai;
        document.getElementById('pelaksanaan').value = laporan.pelaksanaan;
        document.getElementById('saran').value = laporan.saran;
        if(laporan.status_laporan == 'Kerusakan dilaporkan'){
            document.getElementById('perbaikan').style.display = 'none';
            if(role == 2){
                document.getElementById('proses').style.display = 'block'; 
                
                document.getElementById('in').value = laporan.id_laporan;
                document.getElementById('ex').value = laporan.id_laporan;
            }
        }else{
            document.getElementById('proses').style.display = 'none'; 
            document.getElementById('perbaikan').style.display = 'block'; 
            console.log('tgl selesai',laporan.tgl_selesai);
            if(laporan.tgl_selesai === null && role == 2){
                document.getElementById('not_finish').style.display = 'block';
                document.getElementById('finish').style.display = 'none'; 
                document.getElementById('id_finish').value = laporan.id_laporan;
            }else{
                document.getElementById('not_finish').style.display = 'none';
                document.getElementById('finish').style.display = 'block'; 
            }
            
        }
        var role = '<?php echo $this->session->userdata('role');?>';
        if(role == 2){
            document.getElementById('first').style.display = 'block'; 
        }
        document.getElementById('second').style.display = 'none'; 
        $("#LaporanMaintenanceModal").modal('show');
    }
    function show(id_img){
        var now = document.getElementById('image_'+id_img).style.display;
        if(now == 'none'){
            document.getElementById('btn_'+id_img).innerHTML = 'hide';
            document.getElementById('image_'+id_img).style.display = 'block';
        }else{
            document.getElementById('btn_'+id_img).innerHTML = 'view';
            document.getElementById('image_'+id_img).style.display = 'none';
        }
        // document.getElementById('image_lampiran_1').style.display = 'block';
    }
    function color_switcher(stat){
        switch(stat) {
          case 'Kerusakan dilaporkan': return 'primary'; break;
          case 'Dalam proses': return 'warning'; break;
          case 'Menunggu approval OH': return 'secondary'; break;
          case 'Selesai diperbaiki': return 'success'; break;
          default:
            // code block
        } 
    }
    function color_switcher2(priority){
        switch(priority) {
          case 'Tinggi': return 'danger'; break;
          case 'Sedang': return 'warning'; break;
          case 'Rendah': return 'success'; break;
          default:
            // code block
        } 
    }
    function ShowChoice(){
        
        document.getElementById('first').style.display = 'none'; 
        document.getElementById('second').style.display = 'block'; 
        // document.getElementById('second').fadeIn("slow");
    }
</script>
<div class="modal fade" id="LaporanMaintenanceModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Laporan Kerusakan <span id="badge_stat" >Finish</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label>No Laporan</label>
                    <div class="mb-3">
                        <input type="text" id="no_laporan" disabled class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <label>Tanggal</label>
                    <div class="mb-3">
                        <input type="text" id="tgl" disabled class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <label>Sarfas</label>
                    <div class="mb-3">
                        <input type="text" id="sarfas" disabled class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <label>Dilaporkan oleh</label>
                    <div class="mb-3">
                        <input type="text" id="author" disabled class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <label>Laporan kerusakan <span id="badge_priority" ></span></label>
                    
                    <div class="mb-3">
                        <textarea class="form-control" id="laporan_kerusakan" disabled></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <label>File lampiran <button id="btn_lampiran_1" class="btn btn-sm btn-info f-12 py-0" onclick="show('lampiran_1')" >view</button></label>
                    <br>
                    <div id="image_lampiran_1" style="display: none";>
                        <img id="lampiran_1" style="max-width: 92%" class="m-4">
                    </div>
                </div>
            </div>
            <div id="proses">
                <div id="first" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-warning btn-block font-weight-bold" onclick="ShowChoice()">Proses Laporan Kerusakan</button>
                        </div>
                    </div>
                </div>
                <div id="second" style="display: none;">
                    <div class="row">
                        <div class="col-6">
                            <form action="<?php echo base_url('maintenance/proses');?>" method="post">
                                <input type="hidden" name="type" value="Internal" class="form-control"required>
                                <input type="hidden" id="in" name="id" class="form-control"required>
                                <button type="submit" class="btn btn-warning btn-block font-weight-bold">Proses Internal</button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="<?php echo base_url('maintenance/proses');?>" method="post">
                                <input type="hidden" name="type" value="Eksternal" class="form-control"required>
                                <input type="hidden" id="ex" name="id" class="form-control"required>
                                <button type="submit" class="btn btn-warning btn-block font-weight-bold">Proses Eksternal</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="perbaikan">
            <hr>
                <div class="row">
                    <div class="col-6">
                        <label>Jenis perbaikan</label>
                        <div class="mb-3">
                            <input type="text" id="jenis_perbaikan" value="Internal" disabled class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Diproses oleh</label>
                        <div class="mb-3">
                            <input type="text" id="processor" disabled class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Tanggal laporan diproses</label>
                        <div class="mb-3">
                            <input type="text" id="tgl_proses" disabled class="form-control">
                        </div>
                    </div>
                        <div class="col-6">
                            <label>Tanggal perbaikan selesai</label>
                            <div class="mb-3">
                                <input type="text" id="tgl_selesai" disabled class="form-control">
                            </div>
                        </div>
                </div>
                <div id="finish">
                    <div class="row">
                        <div class="col-12"> 
                            <label>Pelaksanaan Perbaikan</label>
                            <div class="mb-3">
                                <input type="text" id="pelaksanaan" class="form-control" disabled required>
                            </div>
                        </div>
                        <div class="col-12">    
                            <label>Saran Perawatan</label>
                            <div class="mb-3">
                            <textarea class="form-control" id="saran" name="textarea" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>File lampiran maintenance <button id="btn_lampiran_2" class="btn btn-sm btn-info f-12 py-0" onclick="show('lampiran_2')" >view</button></label>
                            <br>
                            <div id="image_lampiran_2" style="display: none";>
                                <img id="lampiran_2" style="max-width: 92%"  class="m-4">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="not_finish">
                    
                    <form enctype="multipart/form-data" action="<?php echo base_url('maintenance/finish');?>" method="post">
                        <div class="row">
                            <input type="hidden" id="id_finish" name="id" class="form-control"required>
                            <div class="col-12"> 
                                <label>Pelaksanaan Perbaikan</label>
                                <div class="mb-3">
                                    <input type="text" name="pelaksanaan" class="form-control" placeholder="Pelaksanaan perbaikan ex: Sudah dilakukan perbaikian" required>
                                </div>
                            </div>
                            <div class="col-12">    
                                <label>Saran Perawatan</label>
                                <div class="mb-3">
                                <textarea class="form-control" name="saran" id="textarea" name="textarea" placeholder="Saran perawatan sarfas"></textarea>
                                     <!--<input type="text" value="Lakukan pengecekan pada bagian bawah selang" disabled class="form-control" placeholder="Confirm Password" required> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <label>File lampiran Maintenance (JPG/PNG)</label> 
                                <div class="form-group">
                                    <input type="file" name="dokumen" id="dokumen-lampiran" class="form-control f-14" required>
                                    <small>File lampiran dengan ukuran maksimal 10MB.</small>
                                </div>
                            </div>
                            <div class="col-12"> 
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="valid" value="1" class="custom-control-input" id="valid" required>
                                    <label class="custom-control-label" for="valid">Data yang saya inputkan sudah benar</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-block font-weight-bold" onclick="Finish()">Selesai</button>
                            
                            </div>
                        </div>
                    </form>
                    
                </div>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

