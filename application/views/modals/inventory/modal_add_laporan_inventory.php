<script>
    function ShowAddLaporan(){
        $("#jenis_list").select2({
            dropdownParent: $("#AddLaporanInventoryModal")
        });
        $("#AddLaporanInventoryModal").modal('show');
    }
</script>
<div class="modal fade" id="AddLaporanInventoryModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form  enctype="multipart/form-data" action="<?php echo base_url('inventory/add');?>"  method="post">
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label>No Inventaris</label>
                    <div class="mb-3">
                        <input type="text" name="no_inv" value="" class="form-control" placeholder="Tuliskan nama barang" required>
                    </div>
                </div>
                <div class="col-6">
                    <label>Tanggal Barang Diterima</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="date" name="tgl_diterima" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label>Nama Barang</label>
                    <div class="mb-3">
                        <input type="text" name="nama_barang" value="" class="form-control" placeholder="Tuliskan nama barang" required>
                    </div>
                </div>
                <div class="col-6">
                    <label>Jenis Barang</label>
                    <select name="jenis" class="form-control mb-3" required>
                        <option value="">Pilih Jenis Barang</option>
                        <?php foreach($jenis_barang as $jb){?>
                            <option value="<?php echo $jb['id_jenis_barang'];?>"><?php echo $jb['jenis_barang'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-12">
                    <label>Spesifikasi Barang</label>
                    <div class="mb-3">
                        <input type="text" name="spesifikasi_barang" value="" class="form-control" placeholder="Tuliskan spesifikasi barang" required>
                    </div>
                </div>
                <div class="col-6">
                    <label>Lokasi Penyimpanan</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="lokasi" class="form-control" placeholder="Lokasi Penyimpanan" required>
                        </div>
                    </div>
                </div> 
                <div class="col-6">
                    <label>Jumlah Stock</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Stock" required>
                        </div>
                    </div>
                </div> 
                <div class="col-6">
                    <label>Tanggal Pengeluaran Barang</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="date" name="tgl_keluar" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label>Dipakai Oleh</label>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="dipakai_oleh" class="form-control" placeholder="Dipakai Oleh" required>
                        </div>
                    </div>
                </div> 
                <div class="col-6">
                    <label>Status</label>
                    <select name="status" class="form-control mb-3" required>
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
                            <input type="text" name="dipakai_untuk" class="form-control" placeholder="Dipakai Untuk" required>
                        </div>
                    </div>
                </div> 
                <div class="col-12">    
                    <label>Keterangan</label>
                    <div class="mb-3">
                    <textarea class="form-control" name="keterangan" name="textarea" placeholder="Keterangan"></textarea>
                         <!--<input type="text" value="Lakukan pengecekan pada bagian bawah selang" disabled class="form-control" placeholder="Confirm Password" required> -->
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

