<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Karyawan</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <div>
                            <form id="filter-account-list" class="form-search" action="<?php echo base_url('karyawan'); ?>" method="get">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="hidden" name="qty" value="<?php echo $per_page;?>">
                                        <input type="text" class="form-control" name="key" value="<?php echo $this->input->get('key') ?: ''; ?>" placeholder="Search" aria-label="Keyword Search">
                                        <div class="input-group-append">
                                            <button class="input-group-text"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="px-2">
                            <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('karyawan');?>?qty='+this.options[this.selectedIndex].value+'<?php echo $key == null ?'': '&key='.$key;?>');">
                                <?php $num = [10,25,50,100,250];?>
                                <?php for($i=0;$i<count($num);$i++){?>
                                    <option value="<?php echo $num[$i];?>" <?php  echo  $per_page != $num[$i] ?:'selected';?>><?php echo $num[$i];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <!-- <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('karyawan');?>?qty='+this.options[this.selectedIndex].value);">
                        <?php $num = [10,25,50,100,250];?>
                        <?php for($i=0;$i<count($num);$i++){?>
                            <option value="<?php echo $num[$i];?>" <?php  echo  $per_page != $num[$i] ?:'selected';?>><?php echo $num[$i];?></option>
                        <?php }?>
                    </select> -->
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">No</th>
                                <th class="text-uppercase text-secondary">NIP</th>
                                <th class="text-uppercase text-secondary">Nama</th>
                                <th class="text-uppercase text-secondary">Alamat</th>
                                <th class="text-uppercase text-secondary">Pendidikan</th>
                                <th class="text-uppercase text-secondary">Kode Golongan</th>
                                <th class="text-uppercase text-secondary">Kode Jabatan</th>
                                <th class="text-uppercase text-secondary">Unit</th>
                                <th class="text-uppercase text-secondary">STATUS</th>
                                <th class="text-uppercase text-secondary">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $this->input->get('page') == NULL ? 1 : ($this->input->get('page') - 1) * $per_page + 1;?>
                            <?php foreach($karyawan as $k){?>
                                <tr>
                                    <td class="align-middle">
                                        <span><?php echo $no;?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['NIP'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['NAMA'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['ALAMAT'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['PENDIDIKAN'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['KODE_GOLONGAN'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['KODE_JABATAN'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['NAMA_UNIT'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $k['STATUS'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="btn btn-outline-secondary btn-sm px-2" data-toggle="modal"  data-target="#DetailKaryawanModal" onClick='ShowDetailKaryawan(<?php echo json_encode($k);?>)'>
                                            <i class="fa fa-file-text"></i>
                                            Details
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
<?php $this->load->view('modals/karyawan/modal_detail_karyawan');?>