<script>
    $('.priceformat').each(function (index) {
        $(this).priceFormat({prefix: '', thousandsSeparator: '.', centsSeparator: ',', clearOnEmpty: true, centsLimit: 0});
    });
    function FillDibayar(){
        $("#DibayarModal").modal('show');
    }
    function GetValueDibayar(e){
        e.preventDefault();
        dibayar = document.getElementById('dibayar').value;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
         	url: '<?php echo base_url('submit-dibayar');?>',
         	data: {id: '<?php echo $pk[0]['id_pk'];?>', dibayar: dibayar},
          	cache: false,
          	success: function(msg){
                document.getElementById("data_dibayar_kepada").value = dibayar;
                $("#DibayarModal").modal('hide');
            }
        });
        // console.log(dibayar);
    }
</script>