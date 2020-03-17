@extends('layout.master')
@section('content')
    <div class="container">
        <form>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Chủ đề</label>
                    <input type="text" class="form-control" id="txtChuDe">
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <input type="text" class="form-control" id="txtNoiDung">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" id="btnThemOrCapNhat">Cập nhật</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Chủ đề</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listNews as $i => $news)
                <tr>
                    <td>{{($i + 1)}}</td>
                    <td>{{$news->chuDe}}</td>
                    <td>{{$new->noDung}}</td>
                    <td>
                        <div class="btn-group">
                            <button id="btnXoa" class="btn btn-danger">Xoá</button>
                            <button id="btnSua" class="btn btn-info">Sửa</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
@endsection