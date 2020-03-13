@extends('layout.master')
@section('content')
    <div class="container">
        @foreach ($errors->all() as $err)
        <div class="alert alert-danger">{{$err}}</div>
        @endforeach
        @if(Session::has('success')) 
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_products as $product)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>SP{{ sprintf('%07d',$product['id']) }}</td>
                    <td>{{$product['name']}}</td>
                    <td>${{$product['price']}}</td>
                    <td>
                        <a onclick="return confirm('Xác nhận muốn xóa {{$product['name']}}')" href="{{route('deleteProduct',['id'=>$product['id']])}}">Xóa</a> |
                        <a href="{{route('addProductView',['id'=>$product['id']])}}">Sửa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
@endsection