<script>
	$(function(){
		try
		{
			if($('#btnThemSanPham').length)
				$('#btnThemSanPham').on('click', function(){
					try
					{
						var hiddenSanPham = $('#hiddenSanPham');
						var soLuongSanPham = $('#numSoLuongSanPham').val();
						var trs = null;
						var tbody = null;
						var donGia = $('#txtDonGia').val();
						var preventAdd = false;
						var def = null;
						var defs = [];

						if(!hiddenSanPham.val())
							throw new TypeError('Thông tin sản phẩm không đúng hoặc sản phẩm không tồn tại!');
						if(!soLuongSanPham || isNaN(soLuongSanPham) || (!isNaN(soLuongSanPham) && !soLuongSanPham))
							throw new TypeError('Thông tin số lượng sản phẩm không hợp lệ!');
						tbody = $('#tbody_id_invoiceDetails');
						trs = tbody.children();
						if(trs.length)
						{
							def = $.Deferred();
							defs.push(def.promise());
							$.each(trs, function(i, v){
								if($(v).children().eq(1).text() === hiddenSanPham.val())
								{
									preventAdd = !preventAdd;
									def.resolve();
									return false;
								}
								if(i === trs.length -  1)
									def.resolve();
							});
						}
						$.when.apply($, defs).then(function(){
							if(!preventAdd)
								tbody.append('<tr>\
									<td>' + (trs.length ? trs.length : (trs.length + 1)) + '</td>\
									<td>' + hiddenSanPham.val() + '</td>\
									<td>' + hiddenSanPham.attr('data-hidden-tenSanPham') + '</td>\
									<td>' + soLuongSanPham + '</td>\
									<td>' + donGia + '</td>\
									<td>' + addCommas((parseInt(donGia) * parseInt(soLuongSanPham)).toString()) + ' VNĐ</td>\
									<td>\
										<div class="btn-group">\
											<button type="button" class="btn btn-success" data-button-sanPhamId="' + hiddenSanPham.val() + '">Sửa</button>\
											<button type="button" class="btn btn-danger" data-button-sanPhamId="' + hiddenSanPham.val() + '" data-button-tenSanPham="' + hiddenSanPham.attr('data-hidden-tenSanPham') + '">Xoá</button>\
										</div>\
									</td>\
									</tr>');
							else
								alert('Sản phẩm đã được thêm!');
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