<script src="../assets/js/sweet-alert/sweetalert.min.js"></script>
<script>
    function FillUraian() {
        $("#UraianModal").modal('show');
    }

    function GetValueUraian() {
        uraian = document.getElementById('uraian').value;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo base_url('voucher-jurnal-umum/submit-uraian'); ?>',
            data: {id: '<?php echo $voucher['no_voucher']; ?>', uraian: uraian},
            cache: false,
            success: function (msg) {
                console.log(msg);
                document.getElementById("data_uraian").value = uraian;
                $("#UraianModal").modal('hide');
            }
        });
    }

    function ChooseKodeAccount() {
        $("#KodeAccount").select2({
            dropdownParent: $("#KodeAccountModal")
        });
        $("#KodeAccountModal").modal('show');
    }

    function GetValueKodeAccount() {
        var ka = $("#KodeAccount").select2('val');
        const kaJSON = JSON.parse(ka);
        document.getElementById("kode_account").value = kaJSON.kode_account_list;
        document.getElementById("nama_account").value = kaJSON.nama_account_list;
        $('.priceformat').each(function (index) {
            $(this).priceFormat({prefix: kaJSON.simbol, thousandsSeparator: '.', centsSeparator: ',', clearOnEmpty: true, centsLimit: 0});
        });
        $("#KodeAccountModal").modal('hide');
    }

    function addForm() {
        document.getElementById('form_detail').style.display = 'block';
        document.getElementById('button_add_data_jurnal_umum').style.display = 'none';
    }

    function closeForm() {
        console.log('aaa');
        document.getElementById('form_detail').style.display = 'none';
        document.getElementById('button_add_data_jurnal_umum').style.display = 'block';
    }

    function SubmitDataListJurnalUmum() {
        var data = new Object();
        data.no_voucher = $('#no_voucher').val();
        data.kode_account = $('#kode_account').val();
        data.debit = $('#debit').unmask();
        data.kredit = $('#kredit').unmask();
        data.uraian = $('#keterangan').val();
        var data_send = JSON.stringify(data);
//        console.log($('#debit').unmask());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo base_url('voucher-jurnal-umum/submit-list'); ?>',
            data: {data: data_send},
            cache: false,
            success: function (msg) {
                console.log(msg);
                document.getElementById('data_list').innerHTML = msg;
                document.getElementById('form_detil').style.display = 'none';
                document.getElementById('button_add_data_jurnal_umum').style.display = 'block';

                $('#kode_account').val('');
                $('#nama_account').val('');
                $('#debit').val('');
                $('#kredit').val('');
                $('#keterangan').val('');
            }
        });
    }

    function AddDataRequestAnggaran() {
        var button = document.getElementById("button_add_data_request_anggaran");
        var form = document.getElementById("form_data_request_anggaran");
        form.style.display = 'block';
        button.style.display = 'none';
    }

    function Proses() {
        document.getElementById("first_tab").style.display = 'none';
        document.getElementById("second_tab").style.display = 'block';
    }

    $('#dokumen-lampiran').on('change', function () {
        if (this.files && this.files[0]) {
            if (!validationDokumen(this.files[0])) {
                $('#dokumen-lampiran').val("");
            }
        }
    });


    function validationDokumen(file) {
        var ext = $('#dokumen-lampiran').val().split('.').pop().toLowerCase();
        //Allowed file types ( 'docx', 'doc', 'pdf', 'rtf', 'ppt', 'txt', 'odt' )
        if (!(/(pdf)$/i).test(ext)) {
            swal({
                title: "Silahkan pilih file PDF!",
                icon: "error",
                buttons: true,
                closeOnClickOutside: false
            }).then((success) => {

            });
            return false;
        }
        if (Math.round((file.size / 1024)) > 10240) {
            swal({
                title: "Ukuran file Dokumen terlalu besar!",
                text: "File maksimal memiliki ukuran 10MB",
                icon: "error",
                buttons: true,
                closeOnClickOutside: false
            }).then((success) => {

            });
            return false;
        } else {
            return true;
        }
    }

    $('#form-confirm').submit(function (e) {
        // Stop the form submitting
        e.preventDefault();
        // Do whatever it is you wish to do
        //...
        swal({
            title: "Apakah anda yakin?",
            text: "Pastikan semua data sudah diisi dengan lengkap sebelum anda menyimpan voucher.",
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