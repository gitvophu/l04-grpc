<script>
	$(function(){
		try
		{
			if($('#tbody_id_invoiceDetails').length)
        		$('#tbody_id_invoiceDetails').on('click', '[data-button-id="btnSua"]', function(){
	                try
	                {
	                    var id = $(this).attr('data-button-hoaDonId');
	                    var formData = new FormData();
	                    formData.append('_token', $('#_token').attr('content'));
	                    formData.append('id', id);
	                    $.ajax({
	                        type: 'POST',
	                        dataType : 'JSON',
	                        url: '{{route("layThongTinCapNhatHoaDon")}}',
	                        xhr: function(){return $.ajaxSettings.xhr();},
	                        cache: false,
	                        contentType: false,
	                        processData: false,
	                        data: formData,
	                        success: function(data)
	                        {
	                            try
	                            {
	                            	var i = 0;
	                            	var txtKhachHang = $('#txtKhachHang');
	                            	var numDienThoai = $('#numDienThoai');
	                            	var textareaDiaChi=$('#textareaDiaChi');
	                            	var textareaGhiChu = $('#textareaGhiChu');
	                                if(data.flag)
	                                {
	                                	txtKhachHang.val(data.hoaDon.khachHang);
										numDienThoai.val(data.hoaDon.dienThoai);
										textareaDiaChi.val(data.hoaDon.diaChi);
										textareaGhiChu.val(data.hoaDon.ghiChu);
										
										txtKhachHang.attr('readonly','');
										numDienThoai.attr('readonly','');
										textareaGhiChu.attr('readonly','');
										textareaDiaChi.attr('readonly','');

										$('#selectTrangThai').val(data.hoaDon.trangThai);
	                                    $('#btnThemOrCapNhat').attr('data-button-hoaDonId', id);
	                                    $('#btnThemOrCapNhat').attr('data-button-command','capnhat');
	                                    $('#btnThemOrCapNhat').text('Cập nhật');
	                                    $('#formTitle').text('Cập nhật hoá đơn');
	                                    for(; i < data.hoaDonChiTiet.length; ++i)
		                                    $('#tbody_id_invoiceDetails').append('<tr>\
											<td>' + (i + 1) + '</td>\
											<td>' + data.hoaDonChiTiet[i].id + '</td>\
											<td>' + data.hoaDonChiTiet[i].tenSanPham + '</td>\
											<td>' + addCommas(data.hoaDonChiTiet[i].soLuongSanPham) + '</td>\
											<td>' + addCommas(data.hoaDonChiTiet[i].donGia) + '</td>\
											<td>' + addCommas(data.hoaDonChiTiet[i].thanhTien) + ' VNĐ</td>\
											<td>\
												<div class="btn-group">\
													<button type="button" class="btn btn-success" data-button-sanPhamId="' + data.hoaDonChiTiet[i].id + '">Sửa</button>\
													<button type="button" class="btn btn-danger" data-button-sanPhamId="' + data.hoaDonChiTiet[i].id + '" data-button-tenSanPham="' + data.hoaDonChiTiet[i].tenSanPham + '">Xoá</button>\
												</div>\
											</td>\
											</tr>');
	                                    $('#divHoaDon').slideDown(800);
	                                }
	                                else
	                                    throw new TypeError('Không thể lấy thông tin người dùng. Lỗi: ' + data.error);
	                                return true;
	                            }
	                            catch(err)
	                            {
	                                alert('Lỗi: ' + err.stack);
	                                return false;
	                            }
	                        },
	                        error: function(jqXHR, textStatus, errorThrown){
	                            alert(jqXHR.responseText);
	                            return false;
	                        }
	                    });
	                }
	                catch(err)
	                {
	                    alert('Lỗi: ' + err.stack);
	                    return false;
	                }
	            });
			return true;
		}
		catch(err)
        {
            alert('Lỗi: ' + err.stack);
            return false;
        }
	});
</script>