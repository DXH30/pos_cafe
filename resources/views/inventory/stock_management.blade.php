@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tambah Barang</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-9">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row"><label class="col-sm-2 col-form-label">UPC</label>
                                    <div class="col-sm-10"><input type="text" class="form-control"
                                                placeholder="Universal Product Code..." name="upc"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">SKU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Stock Keeping Unit..." name="sku"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nama Menu..." name="name">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10"><input type="number" class="form-control"
                                                          placeholder="Harga..." name="price"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-10"><input type="file" class="form-control" name="photo"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List Barang</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="tabel_stok">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>SKU</th>
                                        <th>UPC</th>
                                        <th>Harga</th>
                                        <th>Tanggal/Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{$i=0}}
                                    @foreach($products as $product)
                                        {{$i++}}
                                        <tr>
                                            <td>
                                                <img src="{{asset('storage').'/'.$product->photo}}" width="100px">
                                            </td>
                                            <td>{{$i}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->sku}}</td>
                                            <td>{{$product->upc}}</td>
                                            <td>Rp {{number_format($product->price, 2, ',', '.')}}</td>
                                            <td>{{$product->updated_at}}</td>
                                            <td>
                                                <button onclick="hapus({{$product->id}})" class="btn btn-danger dim" type="button">
                                                    <i class="fa fa-trash" alt="hapus"></i>
                                                </button>
                                                <button class="btn btn-warning dim" 
                                                        type="button" 
                                                        data-toggle="modal"
                                                        data-target="#modal-{{$product->id}}">
                                                        <i class="fa fa-pencil" alt="edit"></i>
                                                </button>
                                                <div class="modal inmodal" id="modal-{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content animated bounceInRight">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <i class="fa fa-laptop modal-icon"></i>
                                                                <h4 class="modal-title">Edit Produk</h4>
                                                                <small class="font-bold">
                                                                    Untuk keluar tekan tombol x di pojok kanan atas.
                                                                    Silahkan edit produk
                                                                </small>
                                                            </div>
                                                            <form
                                                                    action="{{url('inventory/stock_management/edit').'/'.$product->id}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group"><label>Nama</label> 
                                                                            <input type="text" 
                                                                                   placeholder="Nama"
                                                                                   name="name" 
                                                                                   class="form-control"
                                                                                   value="{{$product->name}}">
                                                                        </div>
                                                                        <div class="form-group"><label>SKU</label> 
                                                                            <input type="text" 
                                                                                   placeholder="Stock Keeping Unit"
                                                                                   name="sku" 
                                                                                   class="form-control"
                                                                                   value="{{$product->sku}}">
                                                                        </div>
                                                                        <div class="form-group"><label>UPC</label> 
                                                                            <input type="text" 
                                                                                   placeholder="Universal Product Code"
                                                                                   name="upc" 
                                                                                   class="form-control"
                                                                                   value="{{$product->upc}}">
                                                                        </div>
                                                                        <div class="form-group"><label>Harga (Rp)</label> 
                                                                            <input type="number" 
                                                                                   placeholder="Universal Product Code"
                                                                                   name="price" 
                                                                                   class="form-control"
                                                                                   value="{{$product->price}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-info dim" type="button">
                                                    <i class="fa fa-eye" alt="check"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/main/product.js')}}?v={{time()}}">
    </script>
@endsection
