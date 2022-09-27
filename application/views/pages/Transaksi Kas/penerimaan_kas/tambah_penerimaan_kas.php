<?php $this->load->view('components/alert'); ?>
<div class="row">
    <div class="col-2 mb-2">
        <button type="button" class="btn btn-block btn-secondary font-weight-bold" onclick="(window.location = '<?php echo base_url('penerimaan-kas'); ?>')"><i class="fa fa-caret-left"></i> Back</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom-0">
                <h5>Tambah Penerimaan Kas</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <div class="px-2">
                            <button type="submit" class="btn btn-success font-weight-bold">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">No</span>
                                </div>
                                <input type="text" class="form-control f-12" value="<?php echo $penerimaan_kas['no_voucher']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Tgl</span>
                                </div>
                                <input type="text" class="form-control f-12" value="<?php echo date('d/m/Y', strtotime($penerimaan_kas['tgl'])); ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 offset-4">
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Deposit to Account</span>
                                </div>
                                <select class="form-control f-12">
                                    <option value="0">Pilih Account</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Unit Bisnis</span>
                                </div>
                                <select class="form-control f-12">
                                    <option value="0">Pilih Unit Bisnis</option>
                                </select>
                            </div>
                        </div>
<!--                        <div class="form-group m-form__group" style="height: 32px !important;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Karyawan</span>
                                </div>

                                <input type="text" class="form-control f-12" value="<?php // echo $penerimaan_kas['karyawan']; ?>" disabled>
                                 <input type="text" class="form-control f-12" placeholder="Tanggal" > 
                            </div>
                        </div>-->
<!--                        <div class="form-group m-form__group" style="height: 32px !important;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Kode Induk Anggaran</span>
                                </div>

                                <input type="text" name="induk_anggaran" id="induk_anggaran" value="" class="form-control f-12" placeholder="Unit Id" onclick="ChooseIndukAnggaran()">
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Uraian</span>
                                </div>
                                <input type="text" id="data_uraian" value="" class="form-control f-12" onclick="FillUraian()">
                            </div>
                        </div>
                    </div>
                    <div class="col-5 offset-2">
                        <div class="form-group m-form__group" style="height: 32px !important;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Karyawan</span>
                                </div>

                                <input type="text" class="form-control f-12" value="<?php echo $penerimaan_kas['karyawan']; ?>" disabled>
                                 <!--<input type="text" class="form-control f-12" placeholder="Tanggal" >--> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table f-12 table-hover align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary">#</th>
                                <th class="text-uppercase text-secondary" colspan="2">Account</th>
                                <th class="text-uppercase text-secondary text-center">Jumlah</th>
                                <th class="text-uppercase text-secondary text-center">Memo</th>
                            </tr>
                        </thead>
                        <tbody>                            

                        </tbody>
                    </table>
                    <div id="form_detil" style="display: block">

                        <form onsubmit="SubmitDataListRequestAnggaran(event, '1')" >
                            <table class="table align-items-center mb-0 f-12">
                                <tbody class="bg-light">
                                    <tr >
                                        <td>
                                            <label>Account</label>
                                            <input type='text' id='kode_anggaran' onclick='ChooseKodeAnggaran()'class='form-control f-12' required>
                                        </td>
                                        <td>
                                            <label>Nama Account</label>
                                            <input type='text' id='nama_akun' class='form-control f-12' required>
                                        </td>
                                        <td>
                                            <label>Jumlah</label>
                                            <input type='text' id='jumlah'class='form-control f-12' required>
                                        </td>
                                        <td>
                                            <label>Memo</label>
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
                            </table>
                        </form>
                    </div>
                    <div id="button_add_data_request_anggaran" style="display: block">
                        <button type="button" onclick="add()" class="btn btn-block btn-secondary" ><i class="fa fa-plus text-white"></i> Add more data</button>
                    </div>
                </div>
                <!-- <nav aria-label="..." class="mx-4 my-3">                    
                <?php //echo $this->pagination->create_links();     ?>                 
                </nav> -->
            </div>
        </div>
    </div>
</div>
<?php // $this->load->view('modals/permintaan_kas/first_form');  ?>
      
