<script>

    $('#select-mata-uang').change(function () {
        $('#filter-mata-uang').submit();
    });

    function TambahMataUang() {
        $('.priceformat').each(function (index) {
            $(this).priceFormat({prefix: 'Rp ', thousandsSeparator: '.', centsSeparator: ',', clearOnEmpty: true, centsLimit: 2});
        });
    }

    function EditMataUang(mata_uang) {
        $("#id_mata_uang").val(mata_uang.id_mata_uang);
        $("#simbol_mata_uang").val(mata_uang.simbol);
        $("#keterangan_mata_uang").val(mata_uang.text);
        $("#konversi_mata_uang").val(mata_uang.konversi);
        $('.priceformat').each(function (index) {
            $(this).priceFormat({prefix: 'Rp ', thousandsSeparator: '.', centsSeparator: ',', clearOnEmpty: true, centsLimit: 2});
        });
    }
    
    function DeleteMataUang(mata_uang) {
        $("#idMataUang").val(mata_uang.id_mata_uang);
        $("#simbolMataUang").text(": "+mata_uang.simbol);
        $("#keteranganMataUang").text(": "+mata_uang.text);
    }

</script>
