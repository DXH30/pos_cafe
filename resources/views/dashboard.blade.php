@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-success float-right">New</span>
                    <h5>Produk</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{App\Product::count()}}</h1>
                    <small>Total Produk</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-info float-right">New</span>
                    <h5>Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{App\Order::count()}}</h1>
                    <small>Order Baru</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-primary float-right">Order</span>
                    <h5>Selesai</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{App\Order::where('done', 1)->count()}}</h1>
                    <small>Order</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-danger float-right">Order</span>
                    <h5>Pending</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{App\Order::where('done', 0)->count()}}</h1>
                    <small>Order</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Orders</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="container">
                            <p>
                            Sistem ini dapat digunakan dengan langsung menuju ke menu Inventory, lalu klik Menu untuk
                            menambah menu. Setelah menu ditambah, maka dapat di pesan di menu Inventory, lalu klik Pesan untuk melakukan
                            pemesanan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
