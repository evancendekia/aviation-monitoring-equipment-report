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