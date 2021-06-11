@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Buat Order</h5>
                </div>
                <div class="ibox-content">
                    <form action="" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <button class="btn btn-success" onclick="buat_orderan()">Buat Order</button>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>
                    <p>Untuk membuat order klik tombol Buat Order diatas</p>
                    <div class="row">
                        <div class="col-1">
                            <button type="button" class="btn btn-danger btn-block" onclick="hapus_terakhir()">-</button>
                        </div>
                        <div class="col-lg-3" id="orderan">
                            <input type="text" class="form-control sku" name="sku[]" placeholder="Stock Keeping Unit"> 
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-info btn-block" onclick="tambah_order()">+</button>
                        </div>
                        <div class="col-lg-3">
                            <p class="form-text" id="totalnya">-</p>
                            <div id="harganya">
                            </div>
                            <code id="alert" style="display:none"></code>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>MENU</h5>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>SKU</th>
                                    <th>Harga</th>
                                </tr>
                                </thead>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->price}}</td>
                                </tr>
                            @endforeach
                            </table>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List Order</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                    <table id="tabel_order" class="table table-stripped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>List</th>
                                <th>Timestamp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                @if($order->order_unit != null)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>
                                            <ul>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach($order->order_unit as $ou)
                                                    <li>{{App\Product::where('upc', $ou->upc)->first()->name}}
                                                        (Rp {{$ou->price}})
                                                        @php
                                                            $total = $total + $ou->price;
                                                        @endphp
                                                    </li>
                                                @endforeach
                                                TOTAL : Rp {{$total}}
                                            </ul>
                                        </td>
                                        <td>
                                            {{$order->created_at}} / {{$order->updated_at}}
                                        </td>
                                        <td>
                                            @if($order->done == 0)
                                                <a href="{{route('order-done', ['id' => $order->id])}}" target="_blank">
                                                    Selesai
                                                </a>
                                            @else
                                                X
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/main/order.js')}}?v={{time()}}">
    </script>
@endsection
