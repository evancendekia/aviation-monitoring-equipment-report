<script>
    function ShowDetailLaporan(laporan,role){
        document.getElementById('no_inv').value = laporan.no_inv;
        document.getElementById('id_laporan').value = laporan.id_laporan;
        document.getElementById('tgl_diterima').value = laporan.tgl_diterima;
        document.getElementById('nama_barang').value = laporan.nama_barang;
        document.getElementById('jenis_barang').value = laporan.jenis_barang;
        document.getElementById('spesifikasi').value = laporan.spesifikasi_barang;
        document.getElementById('lokasi').value = laporan.lokasi;
        document.getElementById('jumlah').value = laporan.jumlah;
        
        document.getElementById('tgl_keluar').value = laporan.tgl_keluar;
        document.getElementById('dipakai_oleh').value = laporan.dipakai_oleh;
        document.getElementById('dipakai_untuk').value = laporan.dipakai_untuk;
        document.getElementById('status').value = laporan.status;
        document.getElementById('keterangan').value = laporan.keterangan;
        
        document.getElementById("lampiran").src= '<?php echo base_url();?>/upload/file/inventory/'+laporan.lampiran;
        // document.getElementById('laporan_kerusakan').value = laporan.laporan_kerusakan;
        
        $("#LaporanInventoryModal").modal('show');
    }
    function EditLaporan(logic){
        event.preventDefault();
        // document.getElementById('no_inv').disabled = logic;
        document.getElementById('tgl_diterima').disabled = logic;
        document.getElementById('nama_barang').disabled = logic;
        document.getElementById('jenis_barang').disabled = logic;
        document.getElementById('spesifikasi').disabled = logic;
        document.getElementById('lokasi').disabled = logic;
        document.getElementById('jumlah').disabled = logic;
        document.getElementById('tgl_keluar').disabled = logic;
        document.getElementById('dipakai_oleh').disabled = logic;
        document.getElementById('dipakai_untuk').disabled = logic;
        document.getElementById('status').disabled = logic;
        document.getElementById('keterangan').disabled = logic;
        if(logic == true){
            document.getElementById('button_form_edit').style.display = 'block'; 
        }else{
            document.getElementById('button_form_edit').style.display = 'block'; 
        }
        
        // $("#LaporanInventoryModal").modal('show');
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
          case 'Dalam proses': return 'secondary'; break;
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
<div class="modal fade" id="LaporanInventoryModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body">
          <form  enctype="multipart/form-data" action="<?php echo base_url('inventory/edit');?>"  method="post">
            <div class="row">
                <div class="col-6">
                    <label>No Inventaris</label>
                    <div class="mb-3">
                        <input type="text" name="no_inv" id="no_inv" value="" class="form-control" disabled required>
                        <input type="hidden" name="id_laporan" id="id_laporan" value="" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <label>Tanggal Barang Diterima</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="date" name="tgl_diterima" id="tgl_diterima" class="form-control" disabled required>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label>Nama Barang</label>
                    <div class="mb-3">
                        <input type="text" name="nama_barang" id="nama_barang" value="" class="form-control" disabled required>
                    </div>
                </div>
                <div class="col-6">
                    <label>Jenis Barang</label>
                    <div class="mb-3">
                        <input type="text" id="jenis_barang" value="" class="form-control" disabled required>
                    </div>
                </div>     
                
                <div class="col-12">
                    <label>Spesifikasi Barang</label>
                    <div class="mb-3">
                        <input type="text" id="spesifikasi" value="" class="form-control" disabled required>
                    </div>
                </div>
                
                <div class="col-6">
                    <label>Lokasi Penyimpanan</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" id="lokasi" class="form-control" disabled required>
                        </div>
                    </div>
                </div> 
                <div class="col-6">
                    <label>Jumlah Stock</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" id="jumlah" class="form-control" disabled required>
                        </div>
                    </div>
                </div> 
                
                <div class="col-6">
                    <label>Tanggal Pengeluaran Barang</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control" disabled required>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                    <label>Dipakai Oleh</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="dipakai_oleh" id="dipakai_oleh" class="form-control" disabled required>
                        </div>
                    </div>
                </div> 
                <div class="col-6">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control mb-3" disabled required>
                        <option value="">Pilih Status</option>
                        <option value="Dipakai">Dipakai</option>
                        <option value="Pembelian">Pembelian</option>
                        <option value="Pengiriman">Pengiriman</option>
                        <option value="Standby">Standby</option>
                        <option value="Kosong">Kosong</option>
                    </select>
                </div>
                <div class="col-6">
                    <label>Dipakai Untuk</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="dipakai_untuk" id="dipakai_untuk" class="form-control" disabled required>
                        </div>
                    </div>
                </div> 
                <div class="col-12">    
                    <label>Keterangan</label>
                    <div class="mb-3">
                    <textarea class="form-control" name="keterangan" id="keterangan" name="textarea" placeholder="Keterangan" disabled required></textarea>
                         <!--<input type="text" value="Lakukan pengecekan pada bagian bawah selang" disabled class="form-control" placeholder="Confirm Password" required> -->
                    </div>
                </div>
                
                <div class="col-12">
                    <label>File lampiran <button id="btn_lampiran" class="btn btn-sm btn-info f-12 py-0" onclick="show('lampiran')" >view</button></label>
                    <br>
                    <div id="image_lampiran" style="display: none";>
                        <img id="lampiran" class="m-4">
                    </div>
                </div>
                <div class="col-12">
                    <div id="button_form_edit" style="display: none;">
                        <div class="row">
                            <div class="col-6">
                                <button onclick="EditLaporan(true)" class="btn btn-block btn-danger">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-block btn-secondary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-info" onclick="EditLaporan(false)">Edit</button>
            <button class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

