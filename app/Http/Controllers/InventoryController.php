<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderUnit;
use App\Product;

class InventoryController extends Controller
{
    public function stock_management(Request $request) {
        $products = Product::get();
        $data = array(
            'products' => $products
        );
        return view('inventory.stock_management', $data);
    }

    public function postStock(Request $request) {
        $data_in = array(
            'upc' => $request->input('upc'),
            'sku' => $request->input('sku'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'cid' => $request->input('cid') ?? 1
        );

        $filename = $request->input('sku').".jpg";
        $data_in['photo'] = $filename;

        $file = $request->file('photo')->storeAs('public', $filename);

        $product = new Product;
        $product->fill($data_in);
        $product->save();
        return redirect()->back();
    }

    public function editStock(Request $request, $id) {
        $data_in = array(
            'upc' => $request->input('upc'),
            'sku' => $request->input('sku'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'cid' => $request->input('cid') ?? 1
        );

        $product = Product::find($id);
        $product->fill($data_in);
        $product->save();
        return redirect()->back();
    }

    public function deleteStock(Request $request) {
        $product_id = $request->input('id');
        if (Product::find($product_id)->delete()) {
            $response = array(
                'msg' => "Berhasil hapus produk",
                'success' => true
            );
        } else {
            $response = array(
                'msg' => "Gagal hapus produk",
                'success' => false
            );
        }
        return response()->json($response);
    }

    public function track_order(Request $request) {
        $data_in['orders'] = Order::with('order_unit')->get();
        $data_in['products'] = Product::get();
        if ($request->isMethod('POST')) {
        } else {
            return view('inventory.track_order', $data_in);
        }
    }

    public function postOrder(Request $request) {
        $order = new Order;
        $order->customer_id = auth()->user()->id;
        $order->save();

        foreach($request->input('sku') as $sku) {
            if ($sku !== null) {
                $order_unit = new OrderUnit;
                $order_unit->sku = $sku;
                $product = Product::where('sku', $sku)->first();
                $order_unit->order_id = $order->id;
                $order_unit->upc = $product['upc']; 
                $order_unit->price = $product['price'];
                $order_unit->save();
            }
        }
        return redirect()->back();
    }

    public function order_done(Request $request, $id) {
        $order = Order::find($id);
        $order->done = 1;
        $order->save();
        // Print struk
        return redirect()->to(route('order-print', ['id' => $id]));
    }

    public function order_print(Request $request, $id) {
        $data_in['orders'] = Order::with(['order_unit'])->find($id);
        return view('print_struk', $data_in);
    }

    public function requests(Request $request) {
        if ($request->isMethod('POST')) {
        } else {
            return view('inventory.requests');
        }
    }
}
