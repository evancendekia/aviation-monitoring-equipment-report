<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js" integrity="sha512-rDbVu5s98lzXZsmJoMa0DjHNE+RwPJACogUCLyq3Xxm2kJO6qsQwjbE5NDk2DqmlKcxDirCnU1wAzVLe12IM3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.min.js" integrity="sha512-BDZ+kFMtxV2ljEa7OWUu0wuay/PAsJ2yeRsBegaSgdUhqIno33xmD9v3m+a2M3Bdn5xbtJtsJ9sSULmNBjCgYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // function ChooseSarfas(){
    //     // $("#KodeAnggaran").select2({
    //     //     dropdownParent: $("#KodeAnggaranModal")
    //     // });
    //     $("#KodeAnggaranModal").modal('show');
    // }
    function ChooseSarfas(){
        $("#sarfas_list").select2({
            dropdownParent: $("#AddLaporanMaintenanceModal")
        });
        $("#AddLaporanMaintenanceModal").modal('show');
    }
    function SubmitSarfas(){
        $("#AddLaporanMaintenanceModal").modal('hide');
        var data = $('#sarfas_list').select2('data');
        var sarfas = document.getElementById('sarfas_list').value;
        
        document.getElementById('sarfas').value =  data[0]['text'];
        document.getElementById('sarfas_value').value =  sarfas;
        console.log('sarfas',sarfas);
        console.log('data',data[0]['text']);
    }
    function CheckingSwitch(code, switch_type){
        var valueS = document.getElementById('S_'+code).checked;
        var valueC = document.getElementById('C_'+code).checked;
        // console.log('S value '+code,valueS);
        // console.log('C value '+code,valueC);
        if(switch_type == 'S' && valueC == true){
            document.getElementById('C_'+code).checked = false;
        }
        if(switch_type == 'C' && valueS == true){
            document.getElementById('S_'+code).checked = false;
        }
        // document.getElementById("checkbox").checked = true;
        
    }
    
</script>
<script>
    function printPDF() {
        // e.preventDefault();
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

        function fetchImage(uri) {
            return new Promise(function (resolve, reject) {
                const image = new window.Image();
                image.onload = function () {
                    var canvas = document.createElement('canvas');
                    canvas.width = this.naturalWidth;
                    canvas.height = this.naturalHeight;
                    canvas.getContext('2d').drawImage(this, 0, 0);
                    resolve(canvas.toDataURL('image/png'));
                };
                image.onerror = function (params) {
                    reject(new Error('Cannot fetch image ' + uri + '.'));
                };
                image.src = uri;
            });
        }

        pdfMake.fonts = {
            Arial: {
                normal: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/arial.ttf',
                bold: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/arialbd.ttf',
                italic: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/ariali.ttf',
                bolditalics: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/arialbi.ttf'
            }
        };
        
        var truck_conditions = [
                    'Fuel','Radiator Condition / Water','Lubricant','Batery Condition','Brake',
                    'General Conditions of Engine','Horn','Wiper','Head & Tail Lamps Conditions','Sign Lamps',
                    'Beacon Light','Fueling Lamps','PTO / Hydraulic Pump','Compressor','Mirrors',
                    'Tires','General Conditons of Transmission','Hydraulic Ladder / Platform','Rearward Gear Warning'];

        const docDefinition = {
            
            info: {
                title: 'HYDRANT DISPENSER/REFUELLER CHECKLIST - <?php echo date('d-m-Y');?>',
                author: 'Aviation Monitoring Equipment & Report',
            },
            header : [
                {   
                    columns: [
                        {text: 'HYDRANT DISPENSER/REFUELLER CHECKLIST', style: 'title'},   
                        {image: '<?php echo base_url('assets/pertamina/Logo-panjang.png'); ?>', height: 25, width: 105, alignment: 'right', margin:[20,10,10,0]},
                    ]
                }
            ],
            pageSize: 'A4',
            pageOrientation: 'potrait',
            pageMargins: [ 35, 40, 25, 20 ],
            
            images: {
                '<?php echo base_url('assets/pertamina/Logo-panjang.png'); ?>': null,
                '<?php echo base_url('assets/pertamina/Logo-panjang.png'); ?>': null
            },
            content: [
                
                {text: '', style: 'title'},   
                
                
                // {text: 'As of 21-Apr-2022', style: 'sub_title'},
                {
                    margin: [0, -15, 0, 0],
                    table: {
                        widths: [ '16%','25%','25%','17%','17%'],
                        body: [ 
                                [   
                                    {text: 'DPPU HANG NADIM', style:"sub_header", margin: [0,0], border: [false, false, false, false], colSpan:2}, 
                                    '',
                                    {text: '<?php echo $checklist[0]['kode'];?>', style:"sub_header", margin: [0,0] ,border: [false, false, false, false], colSpan: 3}, 
                                    '',
                                    '',
                                ],
                                [   
                                    {text: '', style:"sub_header",border: [true, true, true, false]}, 
                                    {text: 'Day : <?php echo date('l', strtotime($checklist[0]['date']));?>', style:"sub_header",border: [true, true, true, false]}, 
                                    {text: 'Date : <?php echo date("d F Y", strtotime($checklist[0]['date']));?>', style:"sub_header",border: [true, true, true, false]}, 
                                    {text: 'Group : <?php echo $checklist[0]['group'];?>', style:"sub_header",border: [true, true, true, false]}, 
                                    {text: 'Revision : 0', style:"sub_header",border: [true, true, true, false]} 
                                ]
                        ]
                    }
                },
                {
                        margin: [0, 0, 0, 35],
                        table: {
                            headerRows: 1,
                            widths: [ '5%', '*', '7%', '*' ],
                            body: [
                                    [   
                                        {text: 'No', width: '20%', style:"header"}, 
                                        {text: 'Checks', style:"header"}, 
                                        {text: 'S/C', style:"header"}, 
                                        {text: 'Remarks', style:"header"} 
                                    ],
                                    [   
                                        {text: 'I', style:"sub_header", alignment: 'center'}, 
                                        {text: 'Cleanliness', style:"sub_header"}, 
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: '', style:"sub_header"}
                                    ],
                                    [   
                                        {text: 'II', style:"sub_header", alignment: 'center'}, 
                                        {text: 'Truck Conditions', style:"sub_header"}, 
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: '', style:"sub_header"}
                                    ]
                                    <?php for($i=0; $i<count($truck_conditions);$i++){?>
                                        ,[   
                                            {text: '<?php echo $i+1;?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo $truck_conditions[$i];?>', style:"content"}, 
                                            {text: '<?php echo unserialize($checklist[0][$truck_conditions_code[$i]])['check'];?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo unserialize($checklist[0][$truck_conditions_code[$i]])['Remarks'];?>', style:"content"}
                                        ]
                                    <?php }?>
                                    ,[   
                                        {text: 'III', style:"sub_header", alignment: 'center'}, 
                                        {text: 'Tank Conditions', style:"sub_header"}, 
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: '', style:"sub_header"}
                                    ]     
                                    <?php for($i=0; $i<count($tank_condition);$i++){?>
                                        ,[   
                                            {text: '<?php echo $i+1;?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo $tank_condition[$i];?>', style:"content"}, 
                                            {text: '<?php echo unserialize($checklist[0][$tank_condition_code[$i]])['check'];?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo unserialize($checklist[0][$tank_condition_code[$i]])['Remarks'];?>', style:"content"}
                                        ]
                                    <?php }?> 
                                    ,[   
                                        {text: 'IV', style:"sub_header", alignment: 'center'}, 
                                        {text: 'Safety Equipment', style:"sub_header"}, 
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: '', style:"sub_header"}
                                    ]   
                                    <?php for($i=0; $i<count($safety_equipment);$i++){?>
                                        ,[   
                                            {text: '<?php echo $i+1;?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo $safety_equipment[$i];?>', style:"content"}, 
                                            {text: '<?php echo unserialize($checklist[0][$safety_equipment_code[$i]])['check'];?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo unserialize($checklist[0][$safety_equipment_code[$i]])['Remarks'];?>', style:"content"}
                                        ]
                                    <?php }?>
                                    ,[   
                                        {text: 'V', style:"sub_header", alignment: 'center'}, 
                                        {text: 'Refueling Equipment', style:"sub_header"}, 
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: '', style:"sub_header"}
                                    ],[   
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: 'Before Refueling', style:"sub_header"}, 
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: '', style:"sub_header"}
                                    ]     
                                    <?php for($i=0; $i<count($refueling_equipment_before);$i++){?>
                                        ,[   
                                            {text: '<?php echo $i+1;?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo $refueling_equipment_before[$i];?>', style:"content"}
                                            <?php if($i >= 3){?>
                                                ,{text: '<?php echo unserialize($checklist[0][$refueling_equipment_before_code[$i]])['check'];?>', style:"content", alignment: 'center'}, 
                                                {text: '<?php echo unserialize($checklist[0][$refueling_equipment_before_code[$i]])['Remarks'];?>', style:"content"}
                                            <?php }else{?>
                                                ,{text: '', style:"content"}
                                                ,{text: '', style:"content"}
                                            <?php }?>
                                        ]
                                        <?php if($i < 3){?>
                                            <?php for($j=0; $j<count($sub_re["re_$i"]);$j++){?>
                                                ,[
                                                    {text: '', style:"content", alignment: 'center'},
                                                    {text: '<?php echo $sub_re["re_$i"][$j];?>', style:"content"},
                                                    {text: '<?php echo unserialize($checklist[0][$sub_re_code["re_$i"][$j]])['check'];?>', style:"content", alignment: 'center'}, 
                                                    {text: '<?php echo unserialize($checklist[0][$sub_re_code["re_$i"][$j]])['Remarks'];?>', style:"content"}
                                                ]
                                            <?php }?>
                                        <?php }?>
                                    <?php }?>
                                    
                                    ,[   
                                        {text: 'VI', style:"sub_header", alignment: 'center'}, 
                                        {text: 'During Refueling', style:"sub_header"}, 
                                        {text: '', style:"sub_header", alignment: 'center'}, 
                                        {text: '', style:"sub_header"}
                                    ]   
                                    <?php for($i=0; $i<count($refueling_equipment_during);$i++){?>
                                        ,[   
                                            {text: '<?php echo $i+1;?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo $refueling_equipment_during[$i];?>', style:"content"}, 
                                            {text: '<?php echo unserialize($checklist[0][$refueling_equipment_during_code[$i]])['check'];?>', style:"content", alignment: 'center'}, 
                                            {text: '<?php echo unserialize($checklist[0][$refueling_equipment_during_code[$i]])['Remarks'];?>', style:"content"}
                                        ]
                                    <?php }?>
                                    ,[   
                                        {text: 'Checked by', style:"sub_header", colSpan: 2}, '', 
                                        {text: '', style:"sub_header", colSpan: 2}, '', 
                                    ],[   
                                        {text: 'General Condition Summary by Supervisor', style:"sub_header", colSpan: 2}, '', 
                                        {text: '', style:"sub_header", colSpan: 2}, '', 
                                    ],[   
                                        {text: 'Refueling Supervisor', style:"sub_header", colSpan: 2}, '', 
                                        {text: '', style:"sub_header", colSpan: 2}, '', 
                                    ]
                            ]
                        }
                    }
            ],
            styles: {
                title: {
                    fontSize: 10,
                    bold: true,
                    alignment: 'Left',
                    margin: [35, 25, 0, 0]
                },
                sub_header: {
                    fontSize: 6.5,
                    bold: true,
                    border: [true, true, true, true],
                    margin: [5, 0, 5, 0]
                },
                content: {
                    fontSize: 6.5,
                    border: [true, true, true, true],
                    margin: [5, 0, 5, 0]
                },
                label_sub: {
                    bold: true,
                    margin: [15, 0, 15, 7]
                },
                header: {
                    fontSize : 6.5, 
                    bold: true,
                    alignment: 'center',
                    margin: [5, 0, 5, 0],
                    border: [true, true, true, true]
                },
                money_format: {
                    alignment: 'right',
                    bold: true,
                    margin: [10, 5, 10, 5]
                },
                
                footer_table: {
                    fontSize: 10,
                    margin: [5, 10, 5, 5]
                }
            },
            defaultStyle: {
                font: 'Arial'
            }
        };

        const fetches = [];
        Object.keys(docDefinition.images).forEach(src => {
            fetches.push(fetchImage(src).then(data => {
                docDefinition.images[src] = data;
            }));
        });

        Promise.all(fetches).then(() => {
            var win = window.open('', '_blank');
            pdfMake.createPdf(docDefinition).open({}, win);
            // pdfMake.createPdf(docDefinition).open({}, window)
            
            // pdfMake.createPdf(docDefinition).open();
        });

//        pdfMake.createPdf(docDefinition).open();
    }
</script>