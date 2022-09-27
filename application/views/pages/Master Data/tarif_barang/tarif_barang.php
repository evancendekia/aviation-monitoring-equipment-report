<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tarif Barang</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <div>
                            <form id="filter-account-list" class="form-search" action="<?php echo base_url('tarif-barang'); ?>" method="get">
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
                            <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('tarif-barang');?>?qty='+this.options[this.selectedIndex].value+'<?php echo $key == null ?'': '&key='.$key;?>');">
                                <?php $num = [10,25,50,100,250];?>
                                <?php for($i=0;$i<count($num);$i++){?>
                                    <option value="<?php echo $num[$i];?>" <?php  echo  $per_page != $num[$i] ?:'selected';?>><?php echo $num[$i];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <!-- <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('tarif-barang');?>?qty='+this.options[this.selectedIndex].value);">
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
                                <th class="text-uppercase text-secondary">Kode Barang</th>
                                <th class="text-uppercase text-secondary">Nama Barang</th>
                                <th class="text-uppercase text-secondary">Jenis Barang</th>
                                <th class="text-center text-secondary">HARGA (Rp)</th>
                                <th class="text-center text-uppercase text-secondary">Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $this->input->get('page') == NULL ? 1 : ($this->input->get('page') - 1) * $per_page + 1;?>
                            <?php foreach($tarif as $t){?>
                                <tr>
                                    <td>
                                        <span><?php echo $no;?></span>
                                    </td>
                                    <td>
                                        <span><?php echo $t['KODE_BARANG'];?></span>
                                    </td>
                                    <td>
                                        <span><?php echo $t['NAMA_BARANG'];?></span>
                                    </td>
                                    <td>
                                        <span><?php echo $t['NAMA_JENIS_BARANG'];?></span>
                                    </td>
                                    <td class="align-middle text-right">
                                        <span><?php echo number_format($t['HARGA'],0,",",".");?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span><?php if($t['SATUAN'] != null){echo $t['SATUAN'];}else{echo "-";}?></span>
                                    </td>
                                </tr>
                            <?php $no++; }?>
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

      
