<script>
	$(function(){
		try
		{
			if($('#btnThemOrCapNhat').length)
        		$('#btnThemOrCapNhat').on('click', function(){
        			try
        			{
        				var khachHang = '';
        				var soDienThoai = 0;
        				var diaChi = '';
        				var ghiChu = '';
        				var trangThai = 0;
        				var formData = null;
        				var $this = $(this);
        				var cmd = $this.attr('data-button-command');
        				var _url = '{{route("themHoaDon")}}';
        				var dsSanPham = [];
        				var dsSanPhamChon = null;
        				var td = null;
        				var tongTien = 0;
        				var thanhTien = 0;
        				var soLuong = 0;
        				var tongSoLuong = 0;

        				khachHang = $('#hiddenKhachHang');
        				soDienThoai = $('#numDienThoai').val();
        				diaChi = $('#textareaDiaChi').val();
        				ghiChu = $('#textareaGhiChu').val();
        				trangThai = $('#selectTrangThai').val();
        				if(!khachHang.val())
        					throw new TypeError('Tên người dùng không được rỗng!');
        				if(!soDienThoai || isNaN(soDienThoai) || soDienThoai.length != 10)
        					throw new TypeError('Số điện thoại không được rỗng và phải có 10 chữ số!');
        				if(!diaChi)
        					throw new TypeError('Địa chỉ không được rỗng!');
        				dsSanPhamChon = $('#tbody_id_invoiceDetails');
        				if(!dsSanPhamChon.children().length)
        					throw new TypeError('Chưa có sản phẩm nào trên hoá đơn!');
        				$.each(dsSanPhamChon.children(), function(i, v){
        					td = $(v).children();
        					thanhTien = td.eq(5).text().split(' ')[0].split(',').join('');
        					soLuong = td.eq(3).text();
        					dsSanPham.push({'id': td.eq(1).text(), 'soLuong': soLuong});
        					tongTien += parseInt(thanhTien);
        					tongSoLuong += parseInt(soLuong);
        				});
        				
        				formData = new FormData();
    					formData.append('_token', $('#_token').attr('content'));
    					formData.append('khachHang', khachHang.val());
    					formData.append('soDienThoai', soDienThoai);
    					formData.append('diaChi', diaChi);
    					formData.append('ghiChu', ghiChu);
    					formData.append('trangThai', trangThai);
    					formData.append('dsSanPham', JSON.stringify(dsSanPham));
    					formData.append('tongTien', tongTien);
        				if(cmd === 'capnhat')
        				{
        					formData.append('id', $this.attr('data-button-hoaDonId'));
        					_url = '{{route("capNhatHoaDon")}}';
        				}
        				$.ajax({
        					type: 'POST',
        					dataType: 'JSON',
	                        url: _url,
	                        xhr: function(){return $.ajaxSettings.xhr();},
	                        cache: false,
	                        contentType: false,
	                        processData: false,
	                        data: formData,
	                        success: function(data)
	                        {
	                            try
	                            {
	                            	var tr = null;
	                            	var td = null;
	                            	var button = null;
	                            	var tbody = null;
	                                if(data.flag)
	                                {
	                                	if(cmd === 'capnhat')
	                                	{}
	                                	else
	                                	{
	                                		tbody = $('#tbody_id_invoices');
	                                		tbody.append('<tr>\
							                    <td>' + (tbody.children().length + 1) + '</td>\
							                    <td>' + data.id + '</td>\
							                    <td>' + khachHang.attr('data-hidden-tenKhachHang') + '</td>\
							                    <td>' + soDienThoai + '</td>\
							                    <td>' + diaChi + '</td>\
							                    <td>' + addCommas(tongSoLuong) + '</td>\
							                    <td>' + addCommas(tongTien) + ' VNĐ</td>\
							                    <td>' + ghiChu + '</td>\
							                    <td>\
							                        <div class="btn-group">\
							                            <button type="button" data-button-id="btnXoa" class="btn btn-danger" data-button-hoaDonId="' + data.id + '" data-button-khachHang="' + khachHang.attr('data-hidden-tenKhachHang') + '">Xoá</button>\
							                            <button type="button" data-button-id="btnSua" class="btn btn-success" data-button-hoaDonId="' + data.id + '">Sửa</button>\
							                            <button type="button" data-button-id="btnXoa" class="btn btn-info" data-button-hoaDonId="' + data.id + '" data-button-khachHang="' + khachHang.attr('data-hidden-tenKhachHang') + '">Xem chi tiết</button>\
							                        </div>\
							                    </td>\
							                </tr>');
	                                	} 
						                alert((cmd === 'capnhat' ? 'Cập nhật' : 'Thêm') + ' thành công!');
	                                }
	                                else
	                                    throw new TypeError('Không thể ' + (cmd === 'capnhat' ? 'cập nhật' : 'thêm mới') + ' thông tin người dùng. Lỗi: ' + data.error + '<br> Line: ' + data.line);
	                                return true;
	                            }
	                            catch(err)
	                            {
	                                alert('Lỗi: ' + err.stack);
	                                return false;
	                            }
	                        },
	                        error: function(jqXHR, textStatus, errorThrown){
	                            $('#err').html(jqXHR.responseText);
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
			return true;
		}
		catch(err)
        {
            alert('Lỗi: ' + err.stack);
            return false;
        }
	});
</script>