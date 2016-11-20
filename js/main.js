$(document).ready(function(){
    $('.thumbnail').click(function(){
        // $('.modal-body').empty();
        var name = $(this).attr('name');
        var image = $(this).attr('image');
        var store = $(this).attr('store');
        var price = $(this).attr('price'); 
        var date = $(this).attr('date');
        var category = $(this).attr('category');
        var receiptid = $(this).attr('receiptid');

        $('.modal-title').text(name);
        $('.item-store').text(store);
        $('.item-price').text("$" + price);
        $('.modal-body .modal-img').attr('src',image);
        $('.item-date').text(date);
        $('.item-category').text(category);
        $('.item-location').text("York");
        $('#download-receipt').attr("href", "downloadreceipt.php?receiptid=" + receiptid);
    });

});