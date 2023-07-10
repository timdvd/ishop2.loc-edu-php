//FILTERS

$('.w_sidebar input').on('change', function () {
   var checked = $('.w_sidebar input:checked'),
        data = '';
   checked.each(function () {
        data += this.value + ',';
   });
   if(data){
        $.ajax({
           url: location.href,
           data: {filter: data},
           type: 'GET',
           beforeSend: function () {
               $('.preload').fadeIn(300, function () {
                   $('.product-one').hide();
               });
           },
            success: function (res) {
                $('.preload').delay(500).fadeOut('slow',function () {
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                });
            },
            error: function () {

            }
        });
   }else{
       window.location = location.pathname;
   }
});

//SEARCH
var products = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.whitespace,
   queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: "%QUERY",
        url: path + '/search/typeahead?query=%QUERY'
    }
});
products.initialize();

$('#typeahead').typeahead({
   highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 9,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion){
   window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});
//CART
$('.add-to-cart-link').on('click', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
        mod = $('.available select').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Error');
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function () {
    var id = $(this).data('id');
    $.ajax({
       url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
           showCart(res);
        },
        error: function () {
            alert('Error');
        }
    });
});


function showCart(cart){
    if($.trim(cart) == '<h3>Cart is empty</h3>'){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }else{
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if($('.cart-sum').text()){
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    }else{
        $('.simpleCart_total').text('Cart is empty');
    }
}

function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error');
        }
    });
}
//CART

$('#currency').change(function () {
    window.location = 'currency/change?curr=' + $(this).val();
});

$(".available select").on('change', function(){
    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');
    if(price){
        $('#base-price').text(symbolLeft + price + symbolRight);
    }else{
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
    }
});

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Error');
        }
    });
}