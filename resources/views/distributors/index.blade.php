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
                    <th>Mã NPP</th>
                    <th>Tên</th>
                    <th>Năm sinh</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_distributors as $item)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>NPP{{ sprintf('%07d',$item['id']) }}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['age']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>
                        <a onclick="return confirm('Xác nhận muốn xóa {{$item['name']}}')" href="{{route('deleteDistributor',['id'=>$item['id']])}}">Xóa</a> |
                        {{-- <a href="{{route('addProductView',['id'=>$item['id']])}}">Sửa</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
@endsection