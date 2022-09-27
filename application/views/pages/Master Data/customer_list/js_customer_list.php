<script>

    function DetailCustomer(c) {
        $('#kodeCustomer').text(c.KODE_CUSTOMER);
        $('#namaCustomer').text(c.NAMA_CUSTOMER);
        $('#alamatCustomer').text(c.ALAMAT + (c.KOTA != null ? ' Kota ' + c.KOTA : '') + (c.NEGARA != null ? ' ' + c.NEGARA : ''));
        $('#kategoriCustomer').text(c.KATEGORI_CUSTOMER);
        $('#bidangUsahaCustomer').text(c.BIDANG_USAHA);
        $('#kontakCustomer').text(c.KONTAK_PERSON);
        $('#namaCustomer').text(c.NAMA_CUSTOMER);
        $('#tglBergabungCustomer').text(c.TGL_BERGABUNG != null ? dateFormat(c.TGL_BERGABUNG) : '');
        $('#tglKeluarCustomer').text(c.TGL_KELUAR != null ? dateFormat(c.TGL_KELUAR) : '');
        $('#jenisPekerjaanCustomer').text(c.JENIS_PEKERJAAN);
        $('#jenisTarifCustomer').text(c.JENIS_TARIF);
        $('#jenisPembayaranCustomer').text(c.JENIS_PEMBAYARAN);
        $('#mataUangCustomer').text(c.MATA_UANG);
        $('#tm3BMCustomer').text(c.TM3_BM);
        $('#nomorKontrakCustomer').text(c.NOMOR_KONTRAK);
        $('#kdCustomerPusatCustomer').text(c.KD_CUSTOMER_PUSAT);
    }

    function dateFormat(date) {

        var y = date.substring(0, 4);
        var i_m = date.substring(5, 7);
        var text_m = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        var m = text_m[parseInt(i_m) - 1];
        var d = date.substring(8, 10);
        var formattedDate = d + " " + m + " " + y;

        return formattedDate;
//        console.log(formattedDate)
    }

</script>
