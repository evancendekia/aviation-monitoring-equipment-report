<script>
    function ChooseKodeAnggaran(){
        $("#KodeAnggaran").select2({
            dropdownParent: $("#KodeAnggaranModal")
        });
        $("#KodeAnggaranModal").modal('show');
    }
    function GetValueKodeAnggaran(){
        var ka = $("#KodeAnggaran").select2('val');
        const kaJSON = JSON.parse(ka);
        document.getElementById("kode_anggaran").value = kaJSON.kode_account_list;
        document.getElementById("nama_akun").value = kaJSON.nama_account_list;
        $("#KodeAnggaranModal").modal('hide');
    }
    function FillUraian(){
        $("#UraianModal").modal('show');
    }
    function GetValueUraian(e){
        e.preventDefault();
        uraian = document.getElementById('uraian').value;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
         	url: '<?php echo base_url('submit-uraian');?>',
         	data: {id: '<?php echo $pa[0]['id_pa'];?>', uraian: uraian},
          	cache: false,
          	success: function(msg){
                document.getElementById("data_uraian").value = uraian;
                $("#UraianModal").modal('hide');
            }
        });
    }
    function ChooseIndukAnggaran(){
        $("#NoIndukAnggaran").select2({
            dropdownParent: $("#IndukAnggaranModal")
        });
        $("#IndukAnggaranModal").modal('show');
    }
    function GetValueInduk(){
        var ia = $("#NoIndukAnggaran").select2('val');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
         	url: '<?php echo base_url('add-induk-anggaran');?>',
         	data: {id: '<?php echo $pa[0]['id_pa'];?>', induk: ia},
          	cache: false,
          	success: function(msg){
                document.getElementById("induk_anggaran").value = ia;
                document.getElementById("modal_kode_anggaran").innerHTML = msg;
                $("#IndukAnggaranModal").modal('hide');
            }
        });
    }
    function ChooseUnit(){
        $("#NoUnit").select2({
            dropdownParent: $("#exampleModalCenter")
        });
        $("#exampleModalCenter").modal('show');
    }
    function GetValueUnit(){
        var unit = $("#NoUnit").select2('val');
        const unitJSON = JSON.parse(unit);
        console.log(unitJSON);
        document.getElementById("unit").value = unitJSON.KODE_UNIT;
        document.getElementById("unit_kerja").value = unitJSON.NAMA_UNIT;
        document.getElementById("unit_bisnis").value = unitJSON.KETERANGAN;
        $("#exampleModalCenter").modal('hide');
    }
    function add(){
        document.getElementById('form_detil').style.display = 'block';
        document.getElementById('button_add_data_request_anggaran').style.display = 'none';
    }
    
    document.getElementById("close_button").addEventListener("click", close);
    function close(){
        console.log('aaa');
        document.getElementById('form_detil').style.display = 'none';
        document.getElementById('button_add_data_request_anggaran').style.display = 'block';
    }
    function SubmitDataListRequestAnggaran(e,id_pa){
        e.preventDefault();
        unit = document.getElementById('unit');
        kode_anggaran = document.getElementById('kode_anggaran');
        nama_akun = document.getElementById('nama_akun');
        jumlah = document.getElementById('jumlah');
        unit_kerja = document.getElementById('unit_kerja');
        unit_bisnis = document.getElementById('unit_bisnis');
        keterangan = document.getElementById('keterangan');

        var data = new Object();
        data.id_pa = id_pa;
        data.unit = unit.value;
        data.kode_anggaran = kode_anggaran.value;
        data.nama_akun = nama_akun.value;
        data.jumlah = jumlah.value;
        data.unit_kerja = unit_kerja.value;
        data.unit_bisnis = unit_bisnis.value;
        data.keterangan = keterangan.value;
        var data_send = JSON.stringify(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
         	url: '<?php echo base_url('submit-list-request-anggaran');?>',
         	data: {data : data_send},
          	cache: false,
          	success: function(msg){
                document.getElementById('data_list').innerHTML = msg;
                document.getElementById('form_detil').style.display = 'none';
                document.getElementById('button_add_data_request_anggaran').style.display = 'block';
                
                unit.value = '';
                kode_anggaran.value = '';
                nama_akun.value = '';
                jumlah.value = '';
                unit_kerja.value = '';
                unit_bisnis.value = '';
                keterangan.value = '';
            }
        });
    }
    function AddDataRequestAnggaran(){
        var button = document.getElementById("button_add_data_request_anggaran");
        var form = document.getElementById("form_data_request_anggaran");
        form.style.display = 'block';
        button.style.display = 'none';
    }
</script>