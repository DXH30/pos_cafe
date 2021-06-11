<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class InventoryController extends Controller
{
    //
    public function getStock(Request $request, $sku = NULL) {
        if ($sku == NULL) {
            $product = Product::get();
        } else {
            $product = Product::where('sku',$sku)->first();
        }
        if ($product != null) {
            $response = array(
                'msg' => 'Berhasil menemukan stock',
                'success' => true,
                'product' => $product
            );
        } else {
            $response = array(
                'msg' => 'Gagal menemukan stock',
                'success' => false
            );
        }
        return response()->json($response);
    }
}
