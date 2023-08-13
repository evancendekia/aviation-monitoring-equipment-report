<?php $this->load->view('components/alert');?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Checklist</h5>
                <div class="float-right card-header-right">
                    <div class="btn-group">
                        <!--<div class="px-2">-->
                            <!--<button class="btn btn-primary mb-3 mx-2" onclick="printPDF()"><i class="fa fa-download text-white"></i>Download Laporan</button>-->
                        <!--</div>  -->
                         <?php if($role == 1){?>
                            <!--<div class="px-2">-->
                            <!--    <button type="button" class="btn btn-secondary font-weight-bold" onclick="ShowAddLaporan()">Tambah Laporan</button>-->
                            <!--</div>      -->
                        <?php }?>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
              <form  enctype="multipart/form-data" action="<?php echo base_url('checklist/add');?>"  method="post">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Day</span>
                                </div>
                                <input type="text" class="form-control f-12" value="<?php echo date("l")?>" disabled>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Date</span>
                                </div>
                                <input type="text" class="form-control f-12" value="<?php echo date("d F Y")?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 offset-4">
                        <div class="form-group m-form__group" style="height: 32px !important;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Sarfas</span>
                                </div>
                                <select class="form-control f-12" name="equipment">
                                    <!-- <option value="0" <?php echo set_select('equipment', 0, $this->input->get('equipment') == 0 ? TRUE : FALSE); ?>>Semua Equipment</option> -->
                                    <?php foreach($sarfas as $s){?>
                                    <option value="<?php echo $s['id_filter'];?>" <?php echo set_select('equipment', $s['id_filter'], $this->input->get('equipment') == $s['kode'] ? TRUE : FALSE); ?>><?php echo $s['kode']." - ".$s['type'];?></option>
                                    <?php }?>
                                </select>
                                <!-- <input type="text" id="sarfas" name="sarfas" value="" class="form-control f-12" onclick="ChooseSarfas()" required>
                                <input type="hidden" id="sarfas_value" name="sarfas_value" value="" class="form-control f-12"> -->
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text f-12">Group</span>
                                </div>
                                <input type="text" name="group" class="form-control f-12" value="A">
                            </div>
                        </div>
                    </div>
                </div>
                <?php $truck_conditions = array(
                    'Fuel','Radiator Condition / Water','Lubricant','Batery Condition','Brake',
                    'General Conditions of Engine','Horn','Wiper','Head & Tail Lamps Conditions','Sign Lamps',
                    'Beacon Light','Fueling Lamps','PTO / Hydraulic Pump','Compressor','Mirrors',
                    'Tires','General Conditons of Transmission','Hydraulic Ladder / Platform','Rearward Gear Warning');?>
                <?php $truck_conditions_code = array(
                    'II_1','II_2','II_3','II_4','II_5',
                    'II_6','II_7','II_8','II_9','II_10',
                    'II_11','II_12','II_13','II_14','II_15',
                    'II_16','II_17','II_18','II_19');?>
                <?php $tank_condition = array(
                    'Step Condition','Jet Level Sensor Condition','Pressure Vacum Valve / Free Vent','Water Drain Line Tank (roof area water drain)');?>
                <?php $tank_condition_code = array(
                    'III_1','III_2','III_3','III_4');?>
                <?php $safety_equipment = array(
                    'Flame Trap Condition','Grounding and Bounding Cable','Interlock System','Seal Overide Interlock System','Fire Extinguishers (seal, number & date of last check',
                    '"Product","NO SMOKING" signs (placards)','Safety Cone & Lanyard');?>
                <?php $safety_equipment_code = array(
                    'IV_1','IV_2','IV_3','IV_4','IV_5',
                    'IV_6','IV_7');?>
                <?php $refueling_equipment_before = array(
                    'Underwing Hoses Condition','Platform Hoses','Condition of Flow Meter','Deadman Control Condition','Input Coupler Condition',
                    'Date of Last Filter Change','PCV & Regulator','Nitrogen Preasure Indicator');?>
                <?php $refueling_equipment_before_code = array(
                    '','','','V_B_4','V_B_5',
                    'V_B_6','V_B_7','V_B_8');?>
                <?php $sub_re = array(
                    're_0' => array('Rear Hoses & Reel Conditions','Front Hoses & Reel Conditions'),
                    're_1' => array('Left','Right'),
                    're_2' => array('Sealing', 'Calibration exp. Date'),
                )?>
                <?php $sub_re_code = array(
                    're_0' => array('V_B_1_1','V_B_1_2'),
                    're_1' => array('V_B_2_1','V_B_2_2'),
                    're_2' => array('V_B_3_1','V_B_3_2'))?>
                <?php $refueling_equipment_during = array(
                    'Inlet Pressure Indicator','PCV Monitor Indicator','PCV Air Reference Indicator','PDG Indicator');?>
                <?php $refueling_equipment_during_code = array(
                    'V_D_1','V_D_2','V_D_3','V_D_4');?>
                <?php $others = array(
                    'Operating Hours Record','Rubber BLock','Oil Absorbent','Sights Glass');?>
                <?php $others_code = array(
                    'VI_1','VI_2','VI_3','VI_4');?>
                <div class="row product-page-main">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#I_II" role="tab" aria-controls="top-home" aria-selected="false">I & II</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#III" role="tab" aria-controls="top-profile" aria-selected="false">III</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#IV" role="tab" aria-controls="top-contact" aria-selected="true">IV</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="brand-top-tab" data-toggle="tab" href="#V" role="tab" aria-controls="top-brand" aria-selected="true">V</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="brand-top-tab" data-toggle="tab" href="#VI" role="tab" aria-controls="top-brand" aria-selected="true">VI</a>
                                <div class="material-border"></div>
                            </li>
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade  active show" id="I_II" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary">No</th>
                                                <th class="text-center text-uppercase text-secondary">Checks</th>
                                                <th class="text-center text-uppercase text-secondary" colspan="2">S/C</th>
                                                <th class="text-center text-uppercase text-secondary">Remarks</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center">I</td>
                                                    <td class="align-middle">Cleanliness</td>
                                                    <td class="align-middle"colspan="2"></td>
                                                    <td class="align-middle"></td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center">II</td>
                                                    <td class="align-middle">Truck Conditions</td>
                                                    <td class="align-middle"colspan="2"></td>
                                                    <td class="align-middle"></td>
                                            </tr>
                                            <?php for($i=0; $i<count($truck_conditions);$i++){?>
                                                <tr>
                                                        <td class="align-middle text-center col-1"><?php echo $i+1;?></td>
                                                        <td class="align-middle col-4"><?php echo $truck_conditions[$i];?></td>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchS" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'S_'.$truck_conditions_code[$i];?>" name="<?php echo 'S_'.$truck_conditions_code[$i];?>" onclick="CheckingSwitch('<?php echo$truck_conditions_code[$i];?>','S')">
                                                                    <span class="switchS-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchC" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'C_'.$truck_conditions_code[$i];?>" name="<?php echo 'C_'.$truck_conditions_code[$i];?>" onclick="CheckingSwitch('<?php echo$truck_conditions_code[$i];?>','C')">
                                                                    <span class="switchC-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle col-5">
                                                            <input type="text" id="<?php echo $truck_conditions_code[$i];?>" name="<?php echo 'Remarks_'. $truck_conditions_code[$i];?>" value="" class="form-control f-12">
                                                        </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="col-sm-12 mt-3"> 
                                    <div class="nav" id="top-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-secondary btn-block" id="profile-top-tab" data-toggle="tab" href="#III" role="tab" aria-controls="top-profile">III</a>
                                            <div class="material-border"></div>
                                        </li>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                                </div> -->
                                
                        
                            </div>
                            <div class="tab-pane fade" id="III" role="tabpanel" aria-labelledby="profile-bottom-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary">No</th>
                                                <th class="text-center text-uppercase text-secondary">Checks</th>
                                                <th class="text-center text-uppercase text-secondary" colspan="2">S/C</th>
                                                <th class="text-center text-uppercase text-secondary">Remarks</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center">III</td>
                                                    <td class="align-middle">Tank Conditions</td>
                                                    <td class="align-middle" colspan="2"></td>
                                                    <td class="align-middle"></td>
                                            </tr>
                                            <?php for($i=0; $i<count($tank_condition);$i++){?>
                                                <tr>
                                                        <td class="align-middle text-center col-1"><?php echo $i+1;?></td>
                                                        <td class="align-middle col-4"><?php echo $tank_condition[$i];?></td>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchS" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'S_'.$tank_condition_code[$i];?>" name="<?php echo 'S_'.$tank_condition_code[$i];?>" onclick="CheckingSwitch('<?php echo $tank_condition_code[$i];?>','S')">
                                                                    <span class="switchS-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchC" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'C_'.$tank_condition_code[$i];?>" name="<?php echo 'C_'.$tank_condition_code[$i];?>" onclick="CheckingSwitch('<?php echo $tank_condition_code[$i];?>','C')">
                                                                    <span class="switchC-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle col-5">
                                                            <input type="text" id="<?php echo $tank_condition_code[$i];?>" name="<?php echo 'Remarks_'. $tank_condition_code[$i];?>" value="" class="form-control f-12">
                                                        </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="IV" role="tabpanel" aria-labelledby="contact-top-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary">No</th>
                                                <th class="text-center text-uppercase text-secondary">Checks</th>
                                                <th class="text-center text-uppercase text-secondary" colspan="2">S/C</th>
                                                <th class="text-center text-uppercase text-secondary">Remarks</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center">IV</td>
                                                    <td class="align-middle">Safety Equipment</td>
                                                    <td class="align-middle" colspan="2"></td>
                                                    <td class="align-middle"></td>
                                            </tr>
                                            <?php for($i=0; $i<count($safety_equipment);$i++){?>
                                                <tr>
                                                        <td class="align-middle text-center col-1"><?php echo $i+1;?></td>
                                                        <td class="align-middle col-4"><?php echo $safety_equipment[$i];?></td>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchS" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'S_'.$safety_equipment_code[$i];?>" name="<?php echo 'S_'.$safety_equipment_code[$i];?>" onclick="CheckingSwitch('<?php echo $safety_equipment_code[$i];?>','S')">
                                                                    <span class="switchS-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchC" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'C_'.$safety_equipment_code[$i];?>" name="<?php echo 'C_'.$safety_equipment_code[$i];?>" onclick="CheckingSwitch('<?php echo $safety_equipment_code[$i];?>','C')">
                                                                    <span class="switchC-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle col-5">
                                                            <input type="text" id="<?php echo $safety_equipment_code[$i];?>" name="<?php echo 'Remarks_'. $safety_equipment_code[$i];?>" value="" class="form-control f-12">
                                                        </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="V" role="tabpanel" aria-labelledby="brand-top-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary">No</th>
                                                <th class="text-center text-uppercase text-secondary">Checks</th>
                                                <th class="text-center text-uppercase text-secondary" colspan="2">S/C</th>
                                                <th class="text-center text-uppercase text-secondary">Remarks</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center">IV</td>
                                                    <td class="align-middle">Safety Equipment</td>
                                                    <td class="align-middle" colspan="3"></td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center"></td>
                                                    <td class="align-middle">Before Refueling</td>
                                                    <td class="align-middle" colspan="3"></td>
                                            <?php for($i=0; $i<count($refueling_equipment_before);$i++){?>
                                                <tr>
                                                    <td class="align-middle text-center col-1"><?php echo $i+1;?></td>
                                                    <td class="align-middle col-4"><?php echo $refueling_equipment_before[$i];?></td>
                                                    <?php if($i >= 3){?>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchS" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'S_'.$refueling_equipment_before_code[$i];?>" name="<?php echo 'S_'.$refueling_equipment_before_code[$i];?>" onclick="CheckingSwitch('<?php echo $refueling_equipment_before_code[$i];?>','S')">
                                                                    <span class="switchS-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                            <div class="media-body text-left icon-state">
                                                                <label class="switchC" style="display: block; margin-left: auto; margin-right: auto;">
                                                                    <input type="checkbox" value="1" id="<?php echo 'C_'.$refueling_equipment_before_code[$i];?>" name="<?php echo 'C_'.$refueling_equipment_before_code[$i];?>" onclick="CheckingSwitch('<?php echo $refueling_equipment_before_code[$i];?>','C')">
                                                                    <span class="switchC-state"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle col-5">
                                                            <input type="text" id="<?php echo $refueling_equipment_before_code[$i];?>" name="<?php echo 'Remarks_'.$refueling_equipment_before_code[$i];?>" value="" class="form-control f-12">
                                                        </td>
                                                    <?php }else{?>
                                                    <td class="align-middle text-center col-1" colspan="3"></td>
                                                    <?php }?>
                                                </tr>
                                                <?php if($i < 3){?>
                                                    <?php for($j=0; $j<count($sub_re["re_$i"]);$j++){?>
                                                
                                                        <tr>
                                                            <td class="align-middle text-center col-1"></td>
                                                            <td class="align-middle col-4" style="padding-left: 4em;"><?php echo $sub_re["re_$i"][$j];?></td>
                                                            <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                                <div class="media-body text-left icon-state">
                                                                    <label class="switchS" style="display: block; margin-left: auto; margin-right: auto;">
                                                                        <input type="checkbox" value="1" id="<?php echo 'S_'.$sub_re_code["re_$i"][$j];?>" name="<?php echo 'S_'.$sub_re_code["re_$i"][$j];?>" onclick="CheckingSwitch('<?php echo $sub_re_code["re_$i"][$j];?>','S')">
                                                                        <span class="switchS-state"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                                <div class="media-body text-left icon-state">
                                                                    <label class="switchC" style="display: block; margin-left: auto; margin-right: auto;">
                                                                        <input type="checkbox" value="1" id="<?php echo 'C_'.$sub_re_code["re_$i"][$j];?>" name="<?php echo 'C_'.$sub_re_code["re_$i"][$j];?>" onclick="CheckingSwitch('<?php echo $sub_re_code["re_$i"][$j];?>','C')">
                                                                        <span class="switchC-state"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle col-5">
                                                                <input type="text" id="<?php echo $sub_re_code["re_$i"][$j];?>" name="<?php echo 'Remarks_'.$sub_re_code["re_$i"][$j];?>" value="" class="form-control f-12">
                                                            </td>
                                                        </tr>
                                                
                                                    <?php }?>
                                                <?php }?>
                                            <?php }?>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center"></td>
                                                    <td class="align-middle">During Refueling</td>
                                                    <td class="align-middle" colspan="3"></td>
                                            </tr>
                                            <?php for($i=0; $i<count($refueling_equipment_during);$i++){?>
                                                <tr>
                                                    <td class="align-middle text-center col-1"><?php echo $i+1;?></td>
                                                    <td class="align-middle col-4"><?php echo $refueling_equipment_during[$i];?></td>
                                                    <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                        <div class="media-body text-left icon-state">
                                                            <label class="switchS" style="display: block; margin-left: auto; margin-right: auto;">
                                                                <input type="checkbox" value="1" id="<?php echo 'S_'.$refueling_equipment_during_code[$i];?>" name="<?php echo 'S_'.$refueling_equipment_during_code[$i];?>" onclick="CheckingSwitch('<?php echo $refueling_equipment_during_code[$i];?>','S')">
                                                                <span class="switchS-state"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                        <div class="media-body text-left icon-state">
                                                            <label class="switchC" style="display: block; margin-left: auto; margin-right: auto;">
                                                                <input type="checkbox" value="1" id="<?php echo 'C_'.$refueling_equipment_during_code[$i];?>" name="<?php echo 'C_'.$refueling_equipment_during_code[$i];?>" onclick="CheckingSwitch('<?php echo $refueling_equipment_during_code[$i];?>','C')">
                                                                <span class="switchC-state"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle col-5">
                                                        <input type="text" id="<?php echo $refueling_equipment_during_code[$i];?>" name="<?php echo 'Remarks_'.$refueling_equipment_during_code[$i];?>" value="" class="form-control f-12">
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="VI" role="tabpanel" aria-labelledby="contact-top-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary">No</th>
                                                <th class="text-center text-uppercase text-secondary">Checks</th>
                                                <th class="text-center text-uppercase text-secondary" colspan="2">S/C</th>
                                                <th class="text-center text-uppercase text-secondary">Remarks</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                    <td class="align-middle text-center">VI</td>
                                                    <td class="align-middle">Others</td>
                                                    <td class="align-middle" colspan="2"></td>
                                                    <td class="align-middle"></td>
                                            </tr>
                                            <?php for($i=0; $i<count($others);$i++){?>
                                                <tr>
                                                    <td class="align-middle text-center col-1"><?php echo $i+1;?></td>
                                                    <td class="align-middle col-4"><?php echo $others[$i];?></td>
                                                    <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                        <div class="media-body text-left icon-state">
                                                            <label class="switchS" style="display: block; margin-left: auto; margin-right: auto;">
                                                                <input type="checkbox" value="1" id="<?php echo 'S_'.$others_code[$i];?>" name="<?php echo 'S_'.$others_code[$i];?>" onclick="CheckingSwitch('<?php echo $others_code[$i];?>','S')">
                                                                <span class="switchS-state"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center col-1" style="padding:0.3rem; padding-top: 0.6rem">
                                                        <div class="media-body text-left icon-state">
                                                            <label class="switchC" style="display: block; margin-left: auto; margin-right: auto;">
                                                                <input type="checkbox" value="1" id="<?php echo 'C_'.$others_code[$i];?>" name="<?php echo 'C_'.$others_code[$i];?>" onclick="CheckingSwitch('<?php echo $others_code[$i];?>','C')">
                                                                <span class="switchC-state"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle col-5">
                                                        <input type="text" id="<?php echo $others_code[$i];?>" name="<?php echo 'Remarks_'.$others_code[$i];?>" value="" class="form-control f-12">
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12 mt-3"> 
                                    <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#I_II" role="tab" aria-controls="top-home" aria-selected="false">I & II</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#III" role="tab" aria-controls="top-profile" aria-selected="false">III</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#IV" role="tab" aria-controls="top-contact" aria-selected="true">IV</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="brand-top-tab" data-toggle="tab" href="#V" role="tab" aria-controls="top-brand" aria-selected="true">V</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="brand-top-tab" data-toggle="tab" href="#VI" role="tab" aria-controls="top-brand" aria-selected="true">VI</a>
                                <div class="material-border"></div>
                            </li>
                        </ul> -->
                    </div>
                    <!-- <div class="col-sm-12 mt-3"> 
                        <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                    </div> -->
                </div>
              </form>
            </div>
        </div>
    </div>
<?php $this->load->view('modals/checklist/modal_sarfas');?>
      
