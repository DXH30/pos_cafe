$('#tabel_stok').DataTable({responsive: true});

function hapus(produk_id) {
    $.ajax({
        url: "https://pos.dxh30.my.id/api/inventory/stock_management/hapus?id="+produk_id,
        method: "DELETE",
        success: function(result) {
            console.log(result);
            window.location.reload();
        }
    });
}
