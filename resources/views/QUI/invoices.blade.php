@extends('layout.master')
@section('content')
    <div class="container">
    	<div class="row" id="divHoaDon" style="display: none;">
    		<div class="col-md-12">
    			<div class="row">
		        	<div class="col-md-2"></div>
		        	<div class="col-md-8">
		        		<form>
					    	<h2 id="formTitle"></h2>
				            <div class="col-md-6">
				                <div class="form-group">
				                    <label for="">Khách hàng</label>
				                    <input type="text" id="txtKhachHang" list="datalistKhachHang" class="form-control">
				                    <datalist id="datalistKhachHang">
				                    	@foreach($danhSachKhachHang['danhSachKhachHang'] as $khachHang)
				                    	<option value="{{$khachHang['id']}}">{{$khachHang['name']}}</option>
				                    	@endforeach
				                    </datalist>
				                    <input type="hidden" id="hiddenKhachHang">
				                </div>
				                <div class="form-group">
				                    <label for="">Điện thoại</label>
				                    <input type="number" min="0" class="form-control" id="numDienThoai">
				                </div>
				                <div class="form-group">
				                    <label for="">Địa chỉ</label>
				                    <textarea class="form-control" id="textareaDiaChi" cols="3"></textarea>
				                </div>
				                <div class="form-group">
				                    <label for="">Ghi chú</label>
				                    <textarea class="form-control" id="textareaGhiChu" cols="4"></textarea>
				                </div>
				                <div class="form-group">
				                    <label for="">Trạng thái</label>
				                    <select class="form-control" id="selectTrangThai">
				                    	<option value="0">Chưa thanh toán</option>
				                    	<option value="1">Đã thanh toán</option>
				                    	<option value="2">Đã huỷ</option>
				                    </select>
				                </div>
				                <div class="form-group">
				                	<div class="row">
				                		<div class="col-md-9">
						                	<label for="">Sản phẩm</label>
						                    <input type="text" id="txtSanPham" list="datalistSanPham" class="form-control">
						                    <datalist id="datalistSanPham">
						                    	@foreach($danhSachSanPham as $sanPham)
					                    		<option value="{{$sanPham->getId()}}" data-option-donGia="{{$sanPham->getPrice()}}">{{$sanPham->getName()}}</option>
					                    		@endforeach
						                    </datalist>
						                    <input type="hidden" id="hiddenSanPham">
				                		</div>
				                		<div class="col-md-3">
				                			<button type="button" id="btnThemSanPham" class="btn btn-success">Thêm sản phẩm</button>
				                		</div>
				                	</div>
				                </div>
				                <div class="form-group">
				                    <label for="">Đơn giá</label>
				                    <input type="text" id="txtDonGia" class="form-control" readonly="">
				                </div>
				                <div class="form-group">
				                    <label for="">Số lượng</label>
				                    <input type="number" class="form-control" id="numSoLuongSanPham" min="1">
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
		        	<div class="col-md-2"></div>
    			</div>
    			<div class="row">
		        	<div class="col-md-12">
				        <h2>Danh sách chi tiết hoá đơn</h2>
		        	</div>
		        </div>
		        <div class="row">
		        	<div class="col-md-12">
				        <table class="table table-bordered">
				            <thead>
				                <tr>
				                    <th>STT</th>
				                    <th>ID</th>
				                    <th>Sản phẩm</th>
				                    <th>Số lượng</th>
				                    <th>Đơn giá</th>
				                    <th>Thành tiền</th>
				                    <th>Thao tác</th>
				                </tr>
				            </thead>
				            <tbody id="tbody_id_invoiceDetails">
				            </tbody>
				        </table>
		        	</div>
		        </div>
    		</div>
        </div>
        <div class="row">
        	<div class="col-md-3"></div>
        	<div class="col-md-6" style="text-align: center;">
        		<button id="btnThem" class="btn btn-success">Thêm hoá đơn mới</button>
        	</div>
        	<div class="col-md-3"></div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        		<h3>Danh sách hoá đơn</h3>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        		<table class="table table-bordered">
		            <thead>
		                <tr>
		                    <th>STT</th>
		                    <th>ID</th>
		                    <th>Khách hàng</th>
		                    <th>Điện thoại</th>
		                    <th>Địa chỉ</th>
		                    <th>Tổng số sản phẩm</th>
		                    <th>Tổng tiền</th>
		                    <th>Thao tác</th>
		                </tr>
		            </thead>
		            <tbody id="tbody_id_invoices">
		                @foreach ($danhSachHoaDon as $i => $hoaDon)
		                <tr>
		                    <td>{{$i + 1}}</td>
		                    <td>{{$hoaDon->id}}</td>
		                    <td>{{$hoaDon->khachHang}}</td>
		                    <td>{{$hoaDon->dienThoai}}</td>
		                    <td>{{$hoaDon->diaChi}}</td>
		                    <td>{{$hoaDon->tongSanPham}}</td>
		                    <td>{{$hoaDon->tongTien.' VNĐ'}}</td>
		                    <td>
		                        <div class="btn-group">
		                            <button type="button" data-button-id="btnXoa" class="btn btn-danger" data-button-hoaDonId="{{$hoaDon->id}}" data-button-khachHang="{{$hoaDon->khachHang}}">Xoá</button>
		                            <button type="button" data-button-id="btnSua" class="btn btn-success" data-button-hoaDonId="{{$hoaDon->id}}">Sửa</button>
		                            <button type="button" data-button-id="btnXoa" class="btn btn-info" data-button-hoaDonId="{{$hoaDon->id}}" data-button-khachHang="{{$hoaDon->khachHang}}">Xem chi tiết</button>
		                        </div>
		                    </td>
		                </tr>
		                @endforeach
		            </tbody>
		        </table>
        	</div>
        </div>
    </div>
    <div id="err"></div>
@endsection
@section('script')
	<!-- Add common functions -->
	@include('js.common')
	<!-- Xử lý cho nút thêm mới -->
	@include('js.invoices.0_nut_mo_form_them')
	<!-- Xử lý cho nút đóng form -->
	@include('js.invoices.1_nut_dong_form')
	<!-- Xử lý cho nút thêm mới/cập nhật dữ liệu vào csdl -->
	@include('js.invoices.2_nut_them_or_capNhat_tren_form')
	<!-- Xử lý cho nút lấy dữ liệu trên table -->
	<!-- @include('js.users.3_nut_cap_nhat_tren_table') -->
	<!-- Xử lý cho nút xoá trên table -->
	<!-- @include('js.users.4_nut_xoa_tren_table') -->
	<!-- Xử lý hiển thị ảnh sau khi chọn -->
	<!-- @include('js.users.5_xu_ly_hien_thi_anh_sau_khi_chon') -->
	<!-- Xử lý cho sự kiện input textbox khách hàng -->
	@include('js.invoices.6_xu_ly_su_kien_input_khach_hang');
	<!-- Xử lý cho sự kiện input textbox sản phẩm -->
	@include('js.invoices.7_xu_ly_su_kien_input_san_pham');
	<!-- Xử lý cho nút thêm sản phẩm vào hoá đơn -->
	@include('js.invoices.8_nut_them_san_pham_vao_hoa_don');
@endsection