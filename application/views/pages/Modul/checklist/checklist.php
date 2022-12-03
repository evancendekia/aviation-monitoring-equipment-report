<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Data Checklist</h5>
                <div class="float-right card-header-right">
                    <!-- <?php if($role == 1){?>
                        <div class="btn-group">
                            <div class="px-2">
                                <button type="button" class="btn btn-secondary font-weight-bold" onclick="ShowAddLaporan()">Tambah Fasilitas</button>
                            </div>  
                        </div>
                    <?php }?> -->
                    <?php //if($role == 1){?>
                        
                        <div class="px-2">
                            <a href="<?php echo base_url("checklist/add");?>">
                                <button type="button" class="btn btn-secondary font-weight-bold">Input Data</button>
                            </a>
                        </div>      
                    <?php //}?>
                </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
            <form id="form-filter" method="get" action="<?php echo base_url('checklist'); ?>">
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
                        <div class="col-5">
                            <div class="form-group pr-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Equipment</span>
                                    </div>
                                    <select class="form-control f-12" name="equipment">
                                        <option value="0" <?php echo set_select('equipment', 0, $this->input->get('equipment') == 0 ? TRUE : FALSE); ?>>Semua Equipment</option>
                                        <?php foreach($sarfas as $s){?>
                                        <option value="<?php echo $s['kode'];?>" <?php echo set_select('equipment', $s['id_filter'], $this->input->get('equipment') == $s['kode'] ? TRUE : FALSE); ?>><?php echo $s['kode']." - ".$s['type'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>      
                        <div class="col-3"></div>        
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-secondary mb-3"><span class="f-12">Terapkan</span></button>
                            <a href="<?php echo base_url('pdg');?>" class="btn btn-secondary mb-3"><span class="f-12">Tampilkan semua</span></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                        <p class="ml-4 mb-2"><i class="fa fa-search"></i> <?php echo $checklist['total']; ?> Data ditemukan</p>
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
                    <table class="table f-12 table-hover table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary">#</th>
                                <th class="text-center text-uppercase text-secondary">Date</th>
                                <th class="text-center text-uppercase text-secondary">Equipment</th>
                                <th class="text-center text-uppercase text-secondary">Group</th>
                                <th class="align-middle text-center text-uppercase text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($checklist['data'] as $c){?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no;?></td>
                                    <td class="align-middle text-center"><?php echo date_format(date_create($c['date']),"d F Y");?> </td>
                                    <td class="align-middle text-center"><?php echo $c['kode']." - ".$c['type'];?></td>
                                    <td class="align-middle text-center"><?php echo $c['group'];?></td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('checklist/detail')?>?id=<?php echo $c['id'];?>">
                                                <button type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" data-toggle="modal" data-target="#ResetPasswordModal" onClick=''>
                                                    <i class="fa fa-file-text"></i>
                                                    View Details
                                                </button>
                                            </a>
                                        </div>
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
      
