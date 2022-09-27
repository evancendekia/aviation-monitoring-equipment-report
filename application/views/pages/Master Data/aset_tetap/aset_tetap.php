<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Aset Tetap</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('aset-tetap');?>?qty='+this.options[this.selectedIndex].value);">
                            <?php $num = [10,25,50,100,250];?>
                            <?php for($i=0;$i<count($num);$i++){?>
                                <option value="<?php echo $num[$i];?>" <?php  echo  $per_page != $num[$i] ?:'selected';?>><?php echo $num[$i];?></option>
                            <?php }?>
                        </select>
                        <div class="px-2">
                            <button type="button" class="btn btn-secondary" onclick="ShowAddAsetTetap()"><i class="fa fa-plus text-white"></i> Add Aset Tetap</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary">No</th>
                                <th class="text-uppercase text-secondary">Akun coa</th>
                                <th class="text-uppercase text-secondary">Unit</th>
                                <th class="text-uppercase text-secondary">Keterangan</th>
                                <th class="text-uppercase text-secondary">No voucher</th>
                                <th class="text-uppercase text-secondary">Jumlah</th>
                                <th class="text-uppercase text-secondary">Umur Ekonomis</th>
                                <th class="text-uppercase text-secondary">Tanggal</th>
                                <th class="text-uppercase text-secondary">Harga Perolehan</th>
                                <th class="text-center text-uppercase text-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $this->input->get('page') == NULL ? 1 : ($this->input->get('page') - 1) * $per_page + 1;?>
                            <?php foreach($aset as $a){?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <span><?php echo $no;?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $a['coa'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $a['NAMA_UNIT'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $a['keterangan'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $a['no_voucher'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $a['jumlah'].' '.$a['satuan'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $a['umur_ekonomis'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $a['tgl'];?></span>
                                    </td>
                                    <td class="align-middle text-right">
                                        <span><?php echo number_format($a['harga_perolehan'],0,",",".");?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary btn-sm px-2" data-toggle="modal"  data-target="#DetailAsetTetapModal<?php echo $a['id_aset_tetap'];?>">
                                                <i class="fa fa-file-text"></i>
                                                Details
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm text-xs px-2" onclick='ShowEditAsetTetap(<?php echo json_encode($a);?>)' class="text-secondary font-weight-bold">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-sm text-xs px-2" data-toggle="modal"  data-target="#DeleteAsetTetapModal" onClick='DeleteAsetTetap(<?php echo json_encode($a);?>)'>
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </button>
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
<?php $this->load->view('modals/aset_tetap/modal_detail_aset_tetap');?>
<?php $this->load->view('modals/aset_tetap/modal_delete_aset_tetap');?>
<?php $this->load->view('modals/aset_tetap/modal_create_aset_tetap');?>
<?php $this->load->view('modals/aset_tetap/modal_edit_aset_tetap');?>