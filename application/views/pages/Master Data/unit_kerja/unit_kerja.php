<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Unit Kerja <?php echo $bisnis;?></h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <div>
                            <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('unit-kerja');?>'+'?qty='+this.options[this.selectedIndex].value+'<?php echo $bisnis == null ?'':'&bisnis='.$bisnis;?>')">
                                <?php $num = [10,25,50,100,250];?>
                                <?php for($i=0;$i<count($num);$i++){?>
                                    <option value="<?php echo $num[$i];?>" <?php  echo  $per_page != $num[$i] ?:'selected';?>><?php echo $num[$i];?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="px-2">
                            <select name="role" class="form-control" onchange="(window.location = '<?php echo base_url('unit-kerja');?>'+'?qty=<?php echo $per_page;?>&bisnis='+this.options[this.selectedIndex].value)">
                            
                            <option value="" <?php  echo  $bisnis != '' ?: 'selected';?>>SEMUA</option>    
                            <?php foreach($unit_bisnis as $ub){?>
                                    <option value="<?php echo $ub['KETERANGAN'];?>" <?php  echo  $bisnis != $ub['KETERANGAN'] ?:'selected';?>><?php echo $ub['KETERANGAN'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">No</th>
                                <th class="text-uppercase text-secondary">Kode Unit</th>
                                <th class="text-uppercase text-secondary">Nama Unit</th>
                                <th class="text-uppercase text-secondary">Keterangan</th>
                                <th class="text-uppercase text-secondary">Acct Unit</th>
                                <th class="text-uppercase text-secondary">Trans Jurnal</th>
                                <th class="text-uppercase text-secondary">KDDIV</th>
                                <th class="text-uppercase text-secondary">NMDIV</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $this->input->get('page') == NULL ? 1 : ($this->input->get('page') - 1) * $per_page + 1;?>
                            <?php foreach($unit_kerja as $uk){?>
                                <tr>
                                    <td class="align-middle">
                                        <span><?php echo $no;?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $uk['KODE_UNIT'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $uk['NAMA_UNIT'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $uk['KETERANGAN'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $uk['ACCT_UNIT'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php echo $uk['TRANS_JURNAL'];?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php if($uk['KDDIV'] != null){echo $uk['KDDIV'];}else{echo "-";}?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span><?php if($uk['NMDIV'] != null){echo $uk['NMDIV'];}else{echo "-";}?></span>    
                                    </td>
                                </tr>
                            <?php $no++;}?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <nav aria-label="..." class="mx-4 my-3">                    
                            <?php echo $this->pagination->create_links(); ?>                 
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      
