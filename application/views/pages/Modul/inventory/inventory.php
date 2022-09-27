<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Stock Inventory</h5>
                <div class="float-right card-header-right">
                    <?php //if($role == 1){?>
                        <div class="btn-group">
                            <div class="px-2">
                                <button type="button" class="btn btn-secondary font-weight-bold" onclick="ShowAddLaporan()">Tambah Inventory</button>
                            </div>  
                        </div>
                    <?php //}?>
                </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
                <!--<form id="form-filter" method="get" action="<?php echo base_url('maintenance'); ?>">-->
                <!--    <div class="row mx-4 border mb-3 mt-2 rounded">-->
                <!--        <div class="col-12 mx-1 mt-3">-->
                <!--            <label class="f-16">Filter</label>-->
                <!--        </div>-->
                <!--        <div class="col-4">-->
                <!--            <div class="form-group pl-1">-->
                <!--                <div class="input-group">-->
                <!--                    <div class="input-group-prepend">-->
                <!--                        <span class="input-group-text f-12">From</span>-->
                <!--                    </div>-->
                <!--                    <input type="text" name="from" autocomplete="off" placeholder="__/__/____" data-language="id" value="<?php echo $this->input->get('from') ? $this->input->get('from') : NULL; ?>" class="datepicker-here form-control digits f-14" aria-describedby="basic-addon2">-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-4">-->
                <!--            <div class="form-group pr-1">-->
                <!--                <div class="input-group">-->
                <!--                    <div class="input-group-prepend">-->
                <!--                        <span class="input-group-text f-12">To</span>-->
                <!--                    </div>-->
                <!--                    <input type="text" name="to" data-language="id" class="datepicker-here form-control digits f-14" value="<?php echo $this->input->get('to') ? $this->input->get('to') : date('d/m/Y'); ?>" aria-describedby="basic-addon2">-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                        
                <!--        <div class="col-4">-->
                <!--        </div>               -->
                <!--        <div class="col-4">-->
                <!--            <div class="form-group pr-1">-->
                <!--                <div class="input-group">-->
                <!--                    <div class="input-group-prepend">-->
                <!--                        <span class="input-group-text f-12">Prioritas</span>-->
                <!--                    </div>-->
                <!--                    <select class="form-control f-12" name="priority">-->
                <!--                        <option value="0" <?php echo set_select('status', 0, $this->input->get('priority') == 0 ? TRUE : FALSE); ?>>Seluruh data prioritas</option>-->
                <!--                        <option value="1" <?php echo set_select('status', 1, $this->input->get('priority') == 1 ? TRUE : FALSE); ?>>Tinggi</option>-->
                <!--                        <option value="2" <?php echo set_select('status', 2, $this->input->get('priority') == 2 ? TRUE : FALSE); ?>>Sedang</option>-->
                <!--                        <option value="2" <?php echo set_select('status', 2, $this->input->get('priority') == 2 ? TRUE : FALSE); ?>>Rendah</option>-->
                <!--                    </select>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>                -->
                <!--        <div class="col-4">-->
                <!--            <div class="form-group pr-1">-->
                <!--                <div class="input-group">-->
                <!--                    <div class="input-group-prepend">-->
                <!--                        <span class="input-group-text f-12">Status</span>-->
                <!--                    </div>-->
                <!--                    <select class="form-control f-12" name="status">-->
                <!--                        <option value="0" <?php echo set_select('status', 0, $this->input->get('status') == 0 ? TRUE : FALSE); ?>>Seluruh status</option>-->
                <!--                        <option value="1" <?php echo set_select('status', 1, $this->input->get('status') == 1 ? TRUE : FALSE); ?>>Kerusakan dilaporkan</option>-->
                <!--                        <option value="2" <?php echo set_select('status', 2, $this->input->get('status') == 2 ? TRUE : FALSE); ?>>Dalam proses</option>-->
                <!--                        <option value="2" <?php echo set_select('status', 2, $this->input->get('status') == 2 ? TRUE : FALSE); ?>>Selesai diperbaiki</option>-->
                <!--                    </select>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-4 text-right">-->
                <!--            <button type="submit" class="btn btn-secondary mb-3"><span class="f-12">Terapkan</span></button>-->
                <!--            <a href="<?php echo base_url('maintenance');?>" class="btn btn-secondary mb-3"><span class="f-12">Tampilkan semua</span></a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="d-flex align-items-end justify-content-between">-->
                <!--        <p class="ml-4 mb-2"><i class="fa fa-search"></i> <?php echo $laporan['total']; ?> Data ditemukan</p>-->
                <!--        <div class="form-group pr-4">-->
                <!--            <div class="input-group">-->
                <!--                <div class="input-group-prepend">-->
                <!--                    <span class="input-group-text f-12">Urutkan</span>-->
                <!--                </div>-->
                <!--                <select class="form-control f-12" name="urutkan" onchange="$('#form-filter').submit()">-->
                <!--                    <option value="1" <?php echo set_select('urutkan', 1, $this->input->get('urutkan') == 1 ? TRUE : FALSE); ?>>Terbaru</option>-->
                <!--                    <option value="2" <?php echo set_select('urutkan', 2, $this->input->get('urutkan') == 2 ? TRUE : FALSE); ?>>Terlama</option>-->
                <!--                </select>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</form>-->
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary">#</th>
                                <th class="text-center text-uppercase text-secondary">No Inventaris</th>
                                <th class="text-center text-uppercase text-secondary">Tanggal</th>
                                <th class="text-center text-uppercase text-secondary">Nama Barang</th>
                                <th class="text-center text-uppercase text-secondary">Jenis</th>
                                <th class="text-center text-uppercase text-secondary">Lokasi Penyimpanan</th>
                                <th class="text-center text-uppercase text-secondary">Stock</th>
                                <th class="text-center text-uppercase text-secondary">Status</th>
                                <th class="text-center text-uppercase text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    function color_switcher($stat){
                                        switch($stat){
                                            case 'Dipakai' : return 'success'; break;
                                            case 'Pembelian' : return 'primary'; break;
                                            case 'Pengiriman' : return 'info'; break;
                                            case 'Standby' : return 'secondary'; break;
                                            case 'Kosong' : return 'danger'; break;
                                        }
                                    }
                                    function color_switcher2($priority){
                                        switch($priority){
                                            case 'Tinggi' : return 'danger'; break;
                                            case 'Sedang' : return 'warning'; break;
                                            case 'Rendah' : return 'success'; break;
                                        }
                                    }
                                ?>
                            <?php $no=1; foreach($inventory['data'] as $in){?>
                                
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no;?></td>
                                    <td class="align-middle text-center"><?php echo $in['no_inv'];?> </td>
                                    <td class="align-middle text-center"><?php echo date_format(date_create($in['tgl_diterima']),"d M Y");?></td>
                                    <td class="align-middle text-center"><?php echo $in['nama_barang'];?></td>
                                    <td class="align-middle text-center"><?php echo $in['jenis_barang'];?></td>
                                    <td class="align-middle text-center"><?php echo $in['lokasi'];?></td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-success f-12">
                                            <?php echo $in['jumlah'];?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-<?php echo color_switcher($in['status']);?> f-12">
                                            <?php echo $in['status'];?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="btn btn-outline-secondary btn-sm px-2" onclick='ShowDetailLaporan(<?php echo json_encode($in);?>,<?php echo $role;?>)'>
                                            <i class="fa fa-file-text"></i>
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                            <?php $no++;}?>
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
<?php $this->load->view('modals/inventory/modal_add_laporan_inventory');?>
<?php $this->load->view('modals/inventory/modal_laporan_inventory');?>
      
