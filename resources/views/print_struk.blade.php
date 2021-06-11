<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
@media print {
    body {
        width: ; 
    };
    text-align: center;
}
  @page {
      size: portrait;
      margin: 0 auto;
  }
    </style>
</head>
<body>
    <code>
            <table>
                <tr>
                    <td colspan="3" align="center">~~ TAWA KAWA CAFE ~~</td>
                </tr>
                <tr>
                    <td width="40%">ORDER ID</td>
                    <td>:</td>
                    <td align="right">{{$orders->id}}</td>
                </tr>
                <tr>
                    <td>DIBUAT</td>
                    <td>:</td>
                    <td align="right">{{date('m/d H:i', strtotime($orders->created_at))}}</td>
                </tr>
                <tr>
                    <td>DIBAYAR</td>
                    <td>:</td>
                    <td align="right">{{date('m/d H:i', strtotime($orders->updated_at))}}</td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                @php
                    $total = 0;
                @endphp
                @foreach($orders->order_unit as $ou)
                    @php
                        $produk = \App\Product::where('sku', $ou->sku)->first();
                        $total = $total + $produk->price;
                    @endphp
                    <tr>
                        <td>{{$produk->name}}</td>
                        <td>Rp</td>
                        <td align="right">{{number_format($produk->price, 2, ',', '.')}}</td>
                    </tr>
                @endforeach
                <tr>
                    @php
                        $ppn = $total*0.1;
                    @endphp
                    <td>PPN10%</td>
                    <td>Rp</td>
                    <td align="right">{{number_format($ppn, 2, ',', '.')}}</td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rp</td>
                    <td align="right">{{number_format($total+$ppn, 2, ',', '.')}}</td>
                </tr>
            </table>
    </code>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.print();
        });
    </script>
</body>
</html>
