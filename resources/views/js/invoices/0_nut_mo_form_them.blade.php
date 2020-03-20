<script>
	$(function(){
		try
		{
			if($('#btnThem').length)
				$('#btnThem').on('click', function(){
					try
					{
						$('#txtKhachHang').val('');
						$('#txtKhachHang').trigger('input');
						$('#numDienThoai').val('');
						$('#textareaDiaChi').val('');
						$('#textareaGhiChu').val('');
						$('#selectTrangThai').val(0);
						$('#txtSanPham').val('');
						$('#txtSanPham').trigger('input');
						$('#numSoLuongSanPham').val('');
						$('#btnThemOrCapNhat').attr('data-button-command','them');
						$('#btnThemOrCapNhat').text('Thêm');
						$('#formTitle').text('Thêm hoá đơn mới');
						$('#divHoaDon').slideDown(800);
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