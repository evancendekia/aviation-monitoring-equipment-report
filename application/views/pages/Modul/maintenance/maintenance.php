<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Laporan Kerusakan</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <div class="px-2">
                            <button class="btn btn-success mb-3 mx-2" onclick="printPDF()"><i class="fa fa-download text-white"></i>Download Laporan</button>
                        </div>  
                         <?php if($role == 1){?>
                            <div class="px-2">
                                <button type="button" class="btn btn-secondary font-weight-bold" onclick="ShowAddLaporan()">Tambah Laporan</button>
                            </div>      
                        <?php }?>
                    </div>
                </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
                <form id="form-filter" method="get" action="<?php echo base_url('maintenance'); ?>">
                    <div class="row mx-4 border mb-3 mt-2 rounded">
                        <div class="col-12 mx-1 mt-3">
                            <label class="f-16">Filter</label>
                        </div>
                        <div class="col-4">
                            <div class="form-group pl-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">From</span>
                                    </div>
                                    <input type="text" name="from" autocomplete="off" placeholder="__/__/____" data-language="id" value="<?php echo $this->input->get('from') ? $this->input->get('from') : NULL; ?>" class="datepicker-here form-control digits f-14" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group pr-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">To</span>
                                    </div>
                                    <input type="text" name="to" data-language="id" class="datepicker-here form-control digits f-14" value="<?php echo $this->input->get('to') ? $this->input->get('to') : date('d/m/Y'); ?>" aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                        </div>               
                        <div class="col-4">
                            <div class="form-group pr-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Prioritas</span>
                                    </div>
                                    <select class="form-control f-12" name="priority">
                                        <option value="0" <?php echo set_select('status', 0, $this->input->get('priority') == 0 ? TRUE : FALSE); ?>>Seluruh data prioritas</option>
                                        <option value="1" <?php echo set_select('status', 1, $this->input->get('priority') == 1 ? TRUE : FALSE); ?>>Tinggi</option>
                                        <option value="2" <?php echo set_select('status', 2, $this->input->get('priority') == 2 ? TRUE : FALSE); ?>>Sedang</option>
                                        <option value="2" <?php echo set_select('status', 2, $this->input->get('priority') == 2 ? TRUE : FALSE); ?>>Rendah</option>
                                    </select>
                                </div>
                            </div>
                        </div>                
                        <div class="col-4">
                            <div class="form-group pr-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Status</span>
                                    </div>
                                    <select class="form-control f-12" name="status">
                                        <option value="0" <?php echo set_select('status', 0, $this->input->get('status') == 0 ? TRUE : FALSE); ?>>Seluruh status</option>
                                        <option value="1" <?php echo set_select('status', 1, $this->input->get('status') == 1 ? TRUE : FALSE); ?>>Kerusakan dilaporkan</option>
                                        <option value="2" <?php echo set_select('status', 2, $this->input->get('status') == 2 ? TRUE : FALSE); ?>>Dalam proses</option>
                                        <option value="3" <?php echo set_select('status', 3, $this->input->get('status') == 3 ? TRUE : FALSE); ?>>Menunggu approval OH</option>
                                        <option value="4" <?php echo set_select('status', 4, $this->input->get('status') == 4 ? TRUE : FALSE); ?>>Selesai diperbaiki</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-secondary mb-3"><span class="f-12">Terapkan</span></button>
                            <a href="<?php echo base_url('maintenance');?>" class="btn btn-secondary mb-3"><span class="f-12">Tampilkan semua</span></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                        <p class="ml-4 mb-2"><i class="fa fa-search"></i> <?php echo $laporan['total']; ?> Data ditemukan</p>
                        <!--<div>-->
                            
                            <div class=" text-right">
                                <div class="form-group pr-4">
                                    
                                <div class="input-group">
                                    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Urutkan</span>
                                    </div>
                                    <select class="form-control f-12" name="urutkan" onchange="$('#form-filter').submit()">
                                        <option value="1" <?php echo set_select('urutkan', 1, $this->input->get('urutkan') == 1 ? TRUE : FALSE); ?>>Terbaru</option>
                                        <option value="2" <?php echo set_select('urutkan', 2, $this->input->get('urutkan') == 2 ? TRUE : FALSE); ?>>Terlama</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            
                            
                        <!--</div>-->
                    </div>
                </form>
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary">#</th>
                                <th class="text-center text-uppercase text-secondary">No Laporan</th>
                                <th class="text-center text-uppercase text-secondary">Tanggal</th>
                                <th class="text-center text-uppercase text-secondary">Sarfas</th>
                                <th class="text-center text-uppercase text-secondary">Laporan Kerusakan</th>
                                <th class="text-center text-uppercase text-secondary">Prioritas</th>
                                <th class="text-center text-uppercase text-secondary">Status</th>
                                <th class="text-center text-uppercase text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    function color_switcher($stat){
                                        switch($stat){
                                            case 'Kerusakan dilaporkan' : return 'primary'; break;
                                            case 'Dalam proses' : return 'warning'; break;
                                            case 'Menunggu approval OH' : return 'secondary'; break;
                                            case 'Selesai diperbaiki' : return 'success'; break;
                                            case 'Menunggu Lampiran Evident' : return 'danger'; break;
                                            default :  return 'primary'; break;
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
                            <?php $no=1; foreach($laporan['data'] as $l){?>
                                
                                <tr>
                                    <td class="align-middle text-center"><?php echo (10*($page_num-1))+$no;?></td>
                                    <td class="align-middle text-center"><?php echo $l['no_laporan'];?> </td>
                                    <td class="align-middle text-center"><?php echo date_format(date_create($l['tgl']),"d M Y");?></td>
                                    <td class="align-middle text-center" style="width:20%"><?php echo $l['kode'].' - '.$l['type'];?></td>
                                    <td class="align-middle" style="width:20%">
                                        <?php 
                                            if(strlen($l['laporan_kerusakan']) > 30){
                                                echo substr($l['laporan_kerusakan'],0,30)."...";  
                                            }else{
                                                echo $l['laporan_kerusakan'];
                                            };
                                        ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-<?php echo color_switcher2($l['priority']);?> f-12">
                                            <?php echo $l['priority'];?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-<?php echo color_switcher($l['status_laporan']);?> f-12">
                                            <?php echo $l['status_laporan']; if($l['status_laporan'] == 'Dalam proses'){ echo ' ('.$l['laporan_type'].')';}?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <?php if($role == 3 && $l['status_laporan'] == 'Menunggu approval OH'){?>
                                            
                                            <form id="form-filter" method="post" action="<?php echo base_url('maintenance/approve');?>">
                                                <input type="hidden" name="id_laporan" value="<?php echo $l['id_laporan']?>">
                                                <button type="submit" class="btn btn-outline-success btn-sm px-2 mb-1">
                                                    <i class="fa fa-file-text"></i>
                                                    Approve
                                                </button>
                                                
                                            </form>
                                        <?php }?>
                                        <button type="button" class="btn btn-outline-secondary btn-sm px-2" onclick='ShowDetailLaporan(<?php echo json_encode($l);?>,<?php echo $role;?>)'>
                                            <i class="fa fa-file-text"></i>
                                            View Details
                                        </button>
                                        <?php if($l['lampiran_1']  == null && $l['author'] == $this->session->userdata('username')){?>
                                            <button type="button" class="btn btn-outline-danger btn-sm px-2 my-1" onclick='UploadEvident(<?php echo json_encode($l);?>,<?php echo $role;?>)'>
                                                <i class="fa fa-upload"></i>
                                                Upload Evident
                                            </button>
                                        <?php }?>
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
<?php $this->load->view('modals/maintenance/modal_upload_evident');?>
      
<?php $this->load->view('modals/maintenance/modal_add_laporan_maintenance');?>
<?php $this->load->view('modals/maintenance/modal_laporan_maintenance');?>
