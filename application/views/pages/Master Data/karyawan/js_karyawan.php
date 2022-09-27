<?php $name_arr = array('NAMA','NIP','ALAMAT','KOTA','TEMPAT_LAHIR','TGL_LAHIR','KELAMIN','DARAH','AGAMA','TGL_MASUK','PENDIDIKAN','KODE_GOLONGAN','KODE_JABATAN','NAMA_UNIT','NO_DAPEN','NO_ASTEK','JENIS_KULIT','JENIS_RAMBUT','BERAT_BADAN','WARNA_MATA','BENTUK_WAJAH','HOBI','SUKU','KESEHATAN','KONTRASEPSI','NOMOR_REKENING','AN_REKENING','DAPEN','NPWP','ID_PROXIMITY','NO_MESIN','NO_BPJS','JURUSAN','NOMOR_HP','EMAIL','NIK');?>
<script>
    function ShowDetailKaryawan(k){
        $('#head').text(k.NAMA+' | '+k.NIP);
        var name_arr = <?php echo json_encode($name_arr);?>;
        for (let i = 0; i < name_arr.length; i++) {  
            document.getElementById(name_arr[i]).innerHTML = ":  "+k[name_arr[i]];
        } 
    }
</script>