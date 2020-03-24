@extends('layout.master')
@section('content')
    <div class="container">
    	<div class="row">
        	<div class="col-md-6">
        		<form id="frmUsers" style="display: none;">
			    	<h2 id="formTitle"></h2>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <label for="">Tên người dùng</label>
		                    <input type="text" class="form-control" id="txtTenNguoiDung">
		                </div>
		                <div class="form-group">
		                    <label for="">Tuổi</label>
		                    <input type="number" min="18" max="70" class="form-control" id="numTuoi">
		                </div>
		                <div class="form-group">
		                    <label for="">Email</label>
		                    <input type="email" class="form-control" id="txtEmail">
		                </div>
		                <div class="form-group">
		                	<div class="row">
		                		<div class="col-md-12">
			                    	<label for="">Chọn ảnh đại diện</label>
			                    </div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-12">
					                <input type="file" class="form-control" id="fileAnh">
			                    </div>
		                	</div>
		                </div>
		                <div class="form-group">
		                	<div class="row">
		                		<div class="col-md-12">
			                    	<label for="">Ảnh đại diện</label>
			                    </div>
		                	</div>
		                	<div class="row">
		                		<div class="col-md-12">
					                <img src="" id="imgFileAnh" crossorigin="anonymous">
			                    </div>
		                	</div>
		                </div>
		                <div class="form-group">
		                	<div class="btn-group">
			                    <button type="button" class="btn btn-success" id="btnThemOrCapNhat">Cập nhật</button>
			                    <button type="button" class="btn btn-danger" id="btnDong">Đóng</button>
		                	</div>
		                </div>
		            </div>
		        </form>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<button id="btnThem" class="btn btn-success">Thêm Người dùng mới</button>
        	</div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Tuổi</th>
                    <th>Email</th>
                    <th>Ảnh đại diện</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="tbody_id_users">
                @foreach ($danhSachNguoiDung as $i => $nguoiDung)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$nguoiDung['id']}}</td>
                    <td>{{$nguoiDung['name']}}</td>
                    <td>{{$nguoiDung['age']}}</td>
                    <td>{{$nguoiDung['email']}}</td>
                    <td>@if($nguoiDung['image'])<img src="{{$nguoiDung['image']}}" alt="Ảnh đại diện">@else Chưa cập nhật @endif</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" data-button-id="btnXoa" class="btn btn-danger" data-button-userId="{{$nguoiDung['id']}}" data-button-userName="{{$nguoiDung['name']}}">Xoá</button>
                            <button type="button" data-button-id="btnSua" class="btn btn-info" data-button-userId="{{$nguoiDung['id']}}">Sửa</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>   
        <div id="error"> </div> 
    </div>
@endsection
@section('script')
	<!-- Add common functions -->
	@include('js.common')
	<!-- Xử lý cho nút thêm mới -->
	@include('js.users.0_nut_mo_form_them')
	<!-- Xử lý cho nút đóng form -->
	@include('js.users.1_nut_dong_form')
	<!-- Xử lý cho nút thêm mới/cập nhật dữ liệu vào csdl -->
	@include('js.users.2_nut_them_or_capNhat_tren_form')
	<!-- Xử lý cho nút lấy dữ liệu trên table -->
	@include('js.users.3_nut_cap_nhat_tren_table')
	<!-- Xử lý cho nút xoá trên table -->
	@include('js.users.4_nut_xoa_tren_table')
	<!-- Xử lý hiển thị ảnh sau khi chọn -->
	@include('js.users.5_xu_ly_hien_thi_anh_sau_khi_chon')
@endsection