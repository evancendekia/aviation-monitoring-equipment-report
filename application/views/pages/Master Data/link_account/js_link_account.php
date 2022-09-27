<!-- Select2 js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/universal/assets/js/select2/select2.full.min.js"></script>
<script>

    $('#select-account-list').change(function () {
        $('#filter-account-list').submit();
    });
    
    $(".js-example-basic-single").select2();
    
    $('#sales-1').change(function () {
        var sales_1 = document.getElementById('sales-1');
        if(sales_1.checked){
            $('#container-sales-1').show();
            console.log(sales_1)
        } else {
            $('#container-sales-1').hide();
        }
    });
    
    $('#sales-2').change(function () {
        var sales_2= document.getElementById('sales-2');
        if(sales_2.checked){
            $('#container-sales-2').show();
            console.log(sales_1)
        } else {
            $('#container-sales-2').hide();
        }
    });
    
    $('#sales-3').change(function () {
        var sales_3 = document.getElementById('sales-3');
        if(sales_3.checked){
            $('#container-sales-3').show();
            console.log(sales_3)
        } else {
            $('#container-sales-3').hide();
        }
    });
    
    $('#sales-4').change(function () {
        var sales_4 = document.getElementById('sales-4');
        if(sales_4.checked){
            $('#container-sales-4').show();
            console.log(sales_4)
        } else {
            $('#container-sales-4').hide();
        }
    });
    
    $('#purchases-1').change(function () {
        var sales_1 = document.getElementById('purchases-1');
        if(sales_1.checked){
            $('#container-purchases-1').show();
            console.log(sales_1)
        } else {
            $('#container-purchases-1').hide();
        }
    });
    
    $('#purchases-2').change(function () {
        var sales_2= document.getElementById('purchases-2');
        if(sales_2.checked){
            $('#container-purchases-2').show();
            console.log(sales_1)
        } else {
            $('#container-purchases-2').hide();
        }
    });
    
    $('#purchases-3').change(function () {
        var sales_3 = document.getElementById('purchases-3');
        if(sales_3.checked){
            $('#container-purchases-3').show();
            console.log(sales_3)
        } else {
            $('#container-purchases-3').hide();
        }
    });
    
    $('#purchases-4').change(function () {
        var sales_4 = document.getElementById('purchases-4');
        if(sales_4.checked){
            $('#container-purchases-4').show();
            console.log(sales_4)
        } else {
            $('#container-purchases-4').hide();
        }
    });
    
    $('#purchases-5').change(function () {
        var sales_5 = document.getElementById('purchases-5');
        if(sales_5.checked){
            $('#container-purchases-5').show();
            console.log(sales_5)
        } else {
            $('#container-purchases-5').hide();
        }
    });
    

</script>
