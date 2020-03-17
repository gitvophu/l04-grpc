<script>
	$(function(){
		try
		{
			if($('#btnThem').length)
				$('#btnThem').on('click', function(){
					try
					{
						$('#txtTenNguoiDung').val('');
						$('#numTuoi').val('');
						$('#txtEmail').val('');
						$('#btnThemOrCapNhat').attr('data-button-command','them');
						$('#formTitle').text('Thêm người dùng mới');
						$('#frmUsers').slideDown(800);
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