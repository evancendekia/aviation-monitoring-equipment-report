<script>

    function DetailTarifLayanan(t) {
        $('#kodeJasa').text(t.KODE_JASA);
        $('#grupJasa').text(t.GRUP_JASA);
        $('#namaJasa').text(t.NAMA_JASA);
        $('#grupUnit').text(t.GRUP_UNIT);
        $('#namaUnit').text(t.NAMA_UNIT);
        $('#mataUang').text(t.MATA_UANG);
        var tarif = parseFloat(t.TARIF);
        $('#tarif').text(tarif.toLocaleString('id-ID'));
        $('#satuan').text(t.SATUAN);
        $('#cargodoring').text(t.CARGODORING);
        $('#ukuran').text(t.UKURAN);
        $('#ketUK').text(t.KET_UK);
        $('#kJasa').text(t.K_JASA);
    }

</script>
