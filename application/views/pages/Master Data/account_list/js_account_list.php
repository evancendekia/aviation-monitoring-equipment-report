<script>

    $('#select-account-list').change(function () {
        $('#filter-account-list').submit();
    });

    function TambahAccountList(account_list) {
        $('#static-code').val(account_list.kode_account_list + ' - ' + account_list.nama_account_list);
        $('#kode-header').val(account_list.kode_account_list);
        $('#text-kode-header').text(account_list.kode_account_list);
        $('input[type=radio][name=is_header]').change(function () {
            if (this.value == 1) {
                $('#open_balance').hide();
            } else {
                $('#open_balance').show();
            }
        });
        if (account_list.kode_account_list.length === 6) {
            $('#type-account-0').attr('disabled', true);
        } else {
            $('#type-account-0').attr('disabled', false);
        }
        $('.priceformat').each(function (index) {
            $(this).priceFormat({prefix: '', thousandsSeparator: '.', centsSeparator: ',', clearOnEmpty: true, centsLimit: 2});
        });
    }

    function EditAccountList(account_list) {
        let kode = account_list.kode_account_list;
        $("#id_account_list").val(account_list.id_account_list);
        $("#kode_account_list").val(kode);
        $("#nama_account_list").val(account_list.nama_account_list);
        $("#static-code-edit").val(kode.length == 1 ? kode : account_list.kode_header + ' - ' + account_list.header);
        $("#type-account-edit").val(account_list.is_header == 1 ? 'Header' : 'Detail');
//        $("#type-account-edit-1").prop('checked', account_list.is_header == 1 ? false : true);
        $("#label-static").html(kode.length == 1 ? 'Kode Account' : 'Header Account');
        if (kode.length == 1) {
            $('#container-kode-edit').hide();
            $('#container-tipe-edit').hide();
        } else {
            $('#container-kode-edit').show();
            $('#container-tipe-edit').show();
        }
    }

</script>
