// CART AJAX

$('.add-to-cart').click(function(){ // ADDS PRODUCT TO CART
    var pid = $(this).data('id');
    
    $.ajax({
       url: BASE_URL+"/add_to_cart",
       data:{
           pid: pid
       },
       success: function(){
           location.reload();
       }
    });
});

$(".update-item-quantity").click(function() { // CONTROLLS OVER PRODUCT QUANTITY
    var pid = $(this).data('id');
    var op = $(this).data('op');
    
    $.ajax({
       url: BASE_URL+"/update_cart",
       data:{
           pid: pid,
           op: op
       },
       success: function(){
           location.reload();
       }
    });
});


// SUBSCRIBE AJAX

$(".subscribe").click(function() { // SUBSCRIBES USER EMAIL
    
    $.ajax({
        url: BASE_URL+"/subscribe",
        data:{
        },
        success: function(){
            location.reload();
        }
    });
});

$(".unsubscribe").click(function() { // UNSUBSCRIBES USER EMAIL
    
    $.ajax({
        url: BASE_URL+"/unsubscribe",
        data:{
        },
        success: function(){
            location.reload();
        }
    });
});