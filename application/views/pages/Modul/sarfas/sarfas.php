<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Data Fasilitas</h5>
                <div class="float-right card-header-right">
                    <?php if($role == 1){?>
                        <div class="btn-group">
                            <div class="px-2">
                                <button type="button" class="btn btn-secondary font-weight-bold" onclick="ShowAddLaporan()">Tambah Fasilitas</button>
                            </div>  
                        </div>
                    <?php }?>
                </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0 px-3">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary">#</th>
                                <th class="text-center text-uppercase text-secondary">Fasilitas</th>
                                <th class="text-center text-uppercase text-secondary">Merk</th>
                                <th class="text-center text-uppercase text-secondary">Kapasitas</th>
                                <th class="text-center text-uppercase text-secondary">Jumlah</th>
                                <th class="text-center text-uppercase text-secondary">Dipergunakan untuk</th>
                                <th class="text-center text-uppercase text-secondary">Kondisi</th>
                                <th class="text-center text-uppercase text-secondary">Tahun perolehan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($sarfas as $s){?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $no;?></td>
                                    <td class="align-middle text-center"><?php echo $s['jenis'];?> </td>
                                    <td class="align-middle text-center"><?php echo $s['merk'];?></td>
                                    <td class="align-middle text-center"><?php echo $s['kapasitas'];?></td>
                                    <td class="align-middle text-center"><?php echo $s['jumlah'];?> Unit</td>
                                    <td class="align-middle" style="width:30%"><?php echo $s['pergunaan'];?></td>
                                    <td class="align-middle text-center"><?php echo $s['kondisi'];?>%</td>
                                    <td class="align-middle text-center"><?php echo $s['tahun_perolehan'];?></td>
                                    <!--<td class="align-middle text-center">-->
                                    <!--    <button type="button" class="btn btn-outline-secondary btn-sm px-2" onclick='ShowDetailLaporan(<?php echo json_encode($l);?>,<?php echo $role;?>)'>-->
                                    <!--        <i class="fa fa-file-text"></i>-->
                                    <!--        View Details-->
                                    <!--    </button>-->
                                    <!--</td>-->
                                </tr>
                            <?php $no++;}?>
                        </tbody>
                    </table>
                </div>
                <!--<nav aria-label="..." class="mx-4 my-3">                    -->
                <!--    <?php //echo $this->pagination->create_links(); ?>                 -->
                <!--</nav>-->
            </div>
        </div>
    </div>
</div>
      
