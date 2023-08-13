<script>
    function UploadEvident(laporan,role, origin = 'maintenance', id_checklist = null){
        document.getElementById('id_laporan').value = laporan.id_laporan;
        document.getElementById('origin').value = origin;
        document.getElementById('id_checklist').value = id_checklist;
        $("#EvidentModal").modal('show');
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
<div class="modal fade" id="EvidentModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Uplaod File Evident (Lampiran) </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form  enctype="multipart/form-data" action="<?php echo base_url('maintenance/add-evident');?>"  method="post">
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="id_laporan" id="id_laporan" value="" class="form-control" placeholder="Tuliskan laporan kerusakan" required>
                <input type="hidden" name="origin" id="origin" value="" class="form-control" required>
                <input type="hidden" name="id_checklist" id="id_checklist" value="" class="form-control" required>
                
                <div class="col-6">
                    <label>Prioritas Perbaikan</label>
                    <select name="priority" class="form-control mb-3" required>
                        <option value="Tinggi">Tinggi</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Rendah">Rendah</option>
                    </select>
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

