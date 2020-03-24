@extends('layout.master')
@section('content')
    <div class="container">
        @foreach ($errors->all() as $err)
        <div class="alert alert-danger">{{$err}}</div>
        @endforeach
        @if(Session::has('success')) 
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <h2>Nhập thông tin npp</h2>
        @php
        $route_data = [];
        if(isset($dis)){
            $route_data['id']=$dis['id'];
        }
        @endphp 
        <form action="{{route('addDistributorStore',$route_data)}}" method="post" >
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên</label>
                    <input name="txtName" type="text" class="form-control" value="{{isset($dis)?$dis['name']:old('txtName')}}">
                </div>
                <div class="form-group">
                    <label for="">Tuổi</label>
                    <input name="txtAge" type="number" class="form-control" value="{{isset($dis)?$dis['age']:old('txtAge')}}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="txtEmail" type="text" class="form-control" value="{{isset($dis)?$dis['email']:old('txtEmail')}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" 
                    value="{{isset($dis)?'Cập nhật':'Thêm mới'}}">
                </div>
            </div>
            
        </form>  
    </div>
@endsection