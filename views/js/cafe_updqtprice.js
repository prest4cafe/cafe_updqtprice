prestashop.on('updatedProduct', calculate);
 
 function calculate (){

    var qt = $("#quantity_wanted").val();
    var regular_price = $(".regular-price").text();
    var regular_price_rep = regular_price.toString().replace(currency, '').toString().replace(',', '.');
    var regular_price_change = (regular_price_rep*qt).toFixed(2);
    var currentprice = $(".current-price-value").attr("content");
    var new_currentprice = (currentprice*qt).toFixed(2);
    $( ".regular-price" ).replaceWith("<span class='regular-price'>" + regular_price_change + ' ' + currency + "</span>");
    $( ".current-price-value" ).replaceWith("<span class='current-price-value' content='" + new_currentprice + "' >" + new_currentprice + ' ' + currency + "</span>");

}
