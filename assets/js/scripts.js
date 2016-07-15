$( document ).ready(function() {
    $( ".prod_qty" ).change(function() {
            var value = $(this).val();
            if(value>0){
                var new_value = $(this).attr('value',value);
            }
        });


    var sum= $('.total_sum_class').text();
    $('.order_total_sum').attr('value',sum);


    $( ".buy_qty" ).change(function() {
        var value = $(this).val();
        var sum= $('.total_sum_class').text();
        alert(sum);
        $('.order_total_sum').attr('value',sum);
        var price =  $(this).closest('.tr1').find('.product_price').text();
        if(value>0){
            var new_value = $(this).attr('value',value);
            var product_total_sum = price*value;
            $(this).closest('.tr1').find('.total_price').text(product_total_sum);
            sum = sum-$(this).closest('.tr1').find('.product_price').text();
            sum +=product_total_sum;
            $('.total_sum_class').text(sum);
            $('.order_total_sum').attr('value',sum);
        }
    });



    $('.img_class').click(function(){
        var product_id = $(this).attr('data-id');
        var ajax_url = $('.ajax_url').val();
        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            data:{product_id: product_id},
            success: function(res) {
            }

        });
    });

});