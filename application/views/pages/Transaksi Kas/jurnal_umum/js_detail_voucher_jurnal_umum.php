<script src="../assets/js/sweet-alert/sweetalert.min.js"></script>
<script>
    $('#form-confirm').submit(function (e) {
        // Stop the form submitting
        e.preventDefault();
        // Do whatever it is you wish to do
        //...
        swal({
            title: "Konfirmasi",
            text: "Apakah anda yakin ingin menyetujui voucher ini?",
            icon: "warning",
            buttons: ['Tidak','Ya']
        }).then((willSave) => {
            if (willSave) {
                // Now submit it 
                // Don't use $(this).submit() FFS!
                // You'll never leave this function & smash the call stack! :D
                e.currentTarget.submit();
            }
        });

    });
</script>