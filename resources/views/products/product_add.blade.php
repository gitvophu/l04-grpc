@extends('layout.master')
@section('content')
    <div class="container">
        @foreach ($errors->all() as $err)
        <div class="alert alert-danger">{{$err}}</div>
        @endforeach
        @if(Session::has('success')) 
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <h2>Nhập thông tin sản phẩm</h2>
        @php
        $route_data = [];
        if(isset($product)){
            $route_data['id']=$product['id'];
        }
        @endphp 
        <form action="{{route('addProduct',$route_data)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input name="txtName" type="text" class="form-control" value="{{isset($product)?$product['name']:old('txtName')}}">
                </div>
                <div class="form-group">
                    <label for="">Giá tiền</label>
                    <input name="txtPrice" type="text" class="form-control" value="{{isset($product)?$product['price']:old('txtPrice')}}">
                </div>
                <div class="form-group">
                    <label for="">Giá tiền</label>
                    <input type="file" name="hinhanh">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" 
                    value="{{isset($product)?'Cập nhật':'Thêm mới'}}">
                </div>
            </div>
            
        </form>  
    </div>
@endsection