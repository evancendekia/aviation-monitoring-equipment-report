<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-2 mb-2">
        <button type="button" class="btn btn-block btn-secondary font-weight-bold" onclick="(window.location = '<?php echo base_url('request-anggaran');?>')"><i class="fa fa-caret-left"></i> Back</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Form Permintaan Anggaran <span class="text-success">[<?php echo str_replace("_"," ",$pa[0]['type']);?>]<span></h5>
                <div class="float-right card-header-right">
                    <button type="button" class="btn btn-success font-weight-bold" data-toggle="modal"  data-target="#SubmitPermintaanAnggaranModal">Submit Permintaan Anggaran</button>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">No</span>
                                    </div>
                                    <input type="text" class="form-control f-12" value="<?php echo $pa[0]['no_pa'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Tgl</span>
                                    </div>
                                    <input type="text" class="form-control f-12" value="<?php echo $pa[0]['tgl'];?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 offset-4">
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Unit Report</span>
                                    </div>
                                    <input type="text" class="form-control f-12" value="<?php echo $pa[0]['NAMA_UNIT'];?>" disabled>
                                </div>
                            </div>
                            <div class="form-group m-form__group" style="height: 32px !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Kode Induk Anggaran</span>
                                    </div>
                                    
                                    <input type="text" name="induk_anggaran" id="induk_anggaran" value="<?php echo $pa[0]['kode_induk']?>" class="form-control f-12" placeholder="Unit Id" onclick="ChooseIndukAnggaran()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group m-form__group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Uraian</span>
                                    </div>
                                    <input type="text" id="data_uraian" value="<?php echo $pa[0]['uraian'];?>" class="form-control f-12" onclick="FillUraian()">
                                </div>
                            </div>
                        </div>
                        <div class="col-5 offset-2">
                            <div class="form-group m-form__group" style="height: 32px !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text f-12">Karyawan</span>
                                    </div>
                                    
                                    <input type="text" class="form-control f-12" value="<?php echo $pa[0]['NAMA'];?>" disabled>
                                    <!-- <input type="text" class="form-control f-12" placeholder="Tanggal" > -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                        <div class="table-responsive p-0">
                    <table class="table table-hover align-items-center mb-3 f-12">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">No Unit</th>
                                <th class="text-uppercase text-secondary">Kode Anggaran</th>
                                <th class="text-uppercase text-secondary">Nama Akun</th>
                                <th class="text-uppercase text-secondary">Unit Kerja</th>
                                <th class="text-uppercase text-secondary">Unit Bisnis</th>
                                <th class="text-uppercase text-secondary">Jumlah (Rp)</th>
                                <th class="text-uppercase text-secondary">Keterangan</th>
                                <!-- <th class="text-uppercase text-secondary">Action</th> -->
                            </tr>
                        </thead>
                        <tbody id="data_list">
                            <?php if($list_request != null){$this->load->view('components/request_anggaran/list_data');} ?>
                        </tbody>
                        
                        
                    </table>
                    
                    <div id="form_detil" style="display: <?php echo $list_request != null ? 'none': 'block';?>">
                        
                    <table class="table align-items-center mb-0 f-12">
                        <form onsubmit="SubmitDataListRequestAnggaran(event,'<?php echo $pa[0]['id_pa'];?>')" >
                        <tbody class="bg-light">
                            <tr >
                                <td>
                                    <label>No Unit</label>
                                    <input type='text' id='unit' class='form-control f-12' onclick='ChooseUnit()' required>
                                </td>
                                <td>
                                    <label>Kode Anggaran</label>
                                    <input type='text' id='kode_anggaran' onclick='ChooseKodeAnggaran()'class='form-control f-12' required>
                                </td>
                                <td>
                                    <label>Nama Akun</label>
                                    <input type='text' id='nama_akun' class='form-control f-12' required>
                                </td>
                                <td>
                                    <label>Unit Kerja</label>
                                    <input type='text' id='unit_kerja' class='form-control f-12' required>
                                </td>
                                <td>
                                    <label>Unit Bisnis</label>
                                    <input type='text' id='unit_bisnis' class='form-control f-12' required>
                                </td>
                                <td>
                                    <label>Jumlah</label>
                                    <input type='text' id='jumlah'class='form-control f-12' required>
                                </td>
                                <td>
                                    <label>Keterangan</label>
                                    <input type='text' id='keterangan'class='form-control f-12' required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">    
                                    <a class='btn btn-block btn-danger text-white' id="close_button" onclick="close()"><i class="fa fa-times"></i> cancel</a>
                                </td>   
                                <td colspan="5">    
                                    <button type='submit' class='btn btn-block btn-secondary'>Submit</button>
                                </td>    
                            </tr>

                        </tbody>
                    </form>
                    </table>
                    </div>
                    <div id="button_add_data_request_anggaran" style="display: <?php echo $list_request != null ? 'block': 'none';?>">
                        <button type="button" onclick="add()" class="btn btn-block btn-secondary" ><i class="fa fa-plus text-white"></i> Add more data</button>
                    </div>
                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
  <!-- <button onclick="add()">Add</button>
  <button onclick="remove()">remove</button> -->
  <input type="hidden" value="1" id="total_row">
  <input type="hidden" value="1" id="total_data_list">

<?php $this->load->view('modals/request_anggaran/modal_induk_anggaran');?>
<?php $this->load->view('modals/request_anggaran/modal_uraian');?>
<?php $this->load->view('modals/request_anggaran/modal_unit');?>
<div id="modal_kode_anggaran">
    <?php $this->load->view('modals/request_anggaran/modal_kode_anggaran');?>
</div>
<?php $this->load->view('modals/request_anggaran/modal_submit_permintaan_anggaran');?>
                                