@extends('layout.master')
@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="tbody_id_products">
                @foreach ($list_products as $i => $product)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>SP{{ sprintf('%07d',$product['id']) }}</td>
                    <td>{{$product['name']}}</td>
                    <td>${{$product['price']}}</td>
                    <td width=20%>
                        <img src="{{$HOST_RESOURCE."/".$product['image']}}" alt="" style="max-width: 100%">
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="<?=route('deleteProduct',['id'=>$product['id']])?>"><button class="btn btn-danger" >Xoá</button></a>
                            <a href="<?=route('addProductView',['id'=>$product['id']])?>"><button class="btn btn-info" >Sửa</button></a>
                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>   
        <div id="error"> </div> 
    </div>
@endsection