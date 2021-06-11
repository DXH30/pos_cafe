$(document).ready(function() {
    $('#tabel_order').DataTable({responsive: true});
    $('#orderan').keypress(function(e) {
        var key = e.which;
        if (key == 32) {
            tambah_order();
        }
    });

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


    $('#orderan input:first').focus();
});

function tambah_order() {
    var order = document.createElement("input");
    order.setAttribute('type', 'text');
    order.setAttribute('name', 'sku[]');
    order.setAttribute('placeholder', 'Stock Keeping Unit');
    order.setAttribute('class', 'form-control sku');
    // Cek dulu kalau ada barangnya dilihat dari sku nya baru di prepend
    var sku = $('#orderan input:first').val();
    $.ajax({
        url: 'https://pos.dxh30.my.id/api/inventory/track_order/product/'+sku,
        method: 'GET',
        success: function(result) {
            if (result.success == true) {
                if ($('#totalnya').text() == "-") {
                    var total = 0;
                } else {
                    var total = parseInt($('#totalnya').text());
                }
                $('#alert').css("display", "none");
                $('#orderan').prepend(order);
                $('#orderan input:first').focus();
                var nama = result.product.name;
                var harga = document.createElement("p"); 
                harga.setAttribute('class', 'form-text');
                harga.setAttribute('id', 'harga[]');
                harga.innerHTML = nama + "-" + result.product.price;
                total = total + parseInt(result.product.price);
                console.log(total);
                $('#totalnya').text(total);
                $('#harganya').prepend(harga);
            } else {
                $('#alert').css("display", "block");
                $('#alert').text("SKU tidak ditemukan");
            }
        }
    });
}

function hapus_terakhir() {
    var total = parseInt($('#totalnya').text());
    if ($('.sku').length > 1) {
        var sku = $('#orderan input:nth-child(2)').val();
        console.log(sku);
        $.ajax({
            url: 'https://pos.dxh30.my.id/api/inventory/track_order/product/'+sku,
            method: 'GET',
            success: function(result) {
                console.log(result);
                total = total - parseInt(result.product.price);
                $('#orderan input:first').remove();
                $('#orderan input:first').val("");
                $('#harganya p:first').remove();
                $('#totalnya').text(total);
            }
        });
    }
}
