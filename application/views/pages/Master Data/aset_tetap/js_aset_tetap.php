<script>
    function ShowEditAsetTetap(aset){
        $("#coa_edit").select2({
            dropdownParent: $("#EditAsetTetapModal")
        }).val(aset.coa).trigger('change');
        $("#unit_edit").select2({
            dropdownParent: $("#EditAsetTetapModal")
        }).val(aset.KODE_UNIT).trigger('change');
        document.getElementById("id_aset_edit").value = aset.id_aset_tetap;
        document.getElementById("keterangan_edit").value = aset.keterangan;
        document.getElementById("no_voucher_edit").value = aset.no_voucher;
        document.getElementById("jumlah_edit").value = aset.jumlah;
        document.getElementById("satuan_edit").value = aset.satuan;
        document.getElementById("umur_edit").value = aset.umur_ekonomis;
        document.getElementById("tgl_edit").value = aset.tgl;
        $("#EditAsetTetapModal").modal('show');
    }
    function DeleteAsetTetap(aset){
        document.getElementById("id_aset").value = aset.id_aset_tetap;
        document.getElementById("dataCOA").innerHTML = ": "+aset.coa;
        document.getElementById("dataUnit").innerHTML = ": "+aset.NAMA_UNIT;
        document.getElementById("dataKeterangan").innerHTML = ": "+aset.keterangan;
    }
    function DetailAsetTetap(aset){
        // console.log(aset.coa);
        // document.getElementById("detailCOA").innerHTML = ": "+aset.coa;
        // document.getElementById("detailUnit").innerHTML = ": "+aset.NAMA_UNIT;
        // document.getElementById("detailKeterangan").innerHTML = ": "+aset.keterangan;
        // document.getElementById("detailNoVoucher").innerHTML = ": "+aset.no_voucher;
        // document.getElementById("detailJumlah").innerHTML = ": "+aset.jumlah+' '+aset.satuan;
        // document.getElementById("detailUmur").innerHTML = ": "+aset.umur_ekonomis;
        // document.getElementById("detailTanggal").innerHTML = ": "+aset.tgl;
        // document.getElementById("detailHP").innerHTML = ": "+aset.harga_perolehan;
        // document.getElementById("detailBP").innerHTML = ": "+(aset.harga_perolehan/aset.umur_ekonomis);
    }
    function ShowAddAsetTetap(){
        $("#SelectCOA").select2({
            dropdownParent: $("#AddAsetTetapModal")
        });
        $("#SelectUnit").select2({
            dropdownParent: $("#AddAsetTetapModal")
        });
        $("#AddAsetTetapModal").modal('show');
    }
</script>