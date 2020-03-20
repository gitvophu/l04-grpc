<script>
	$(function(){
		try
		{
			if($('#tbody_id_users').length)
        		$('#tbody_id_users').on('click', '[data-button-id="btnSua"]', function(){
	                try
	                {
	                    var id = $(this).attr('data-button-userId');
	                    var formData = new FormData();
	                    formData.append('_token', $('#_token').attr('content'));
	                    formData.append('id', id);
	                    $.ajax({
	                        type: 'POST',
	                        dataType : 'JSON',
	                        url: '{{route("layThongTinCapNhat")}}',
	                        xhr: function(){return $.ajaxSettings.xhr();},
	                        cache: false,
	                        contentType: false,
	                        processData: false,
	                        data: formData,
	                        success: function(data)
	                        {
	                            try
	                            {
	                                if(data.flag)
	                                {
	                                    $('#txtTenNguoiDung').val(data.user.tenNguoiDung);
	                                    $('#numTuoi').val(data.user.tuoi);
	                                    $('#txtEmail').val(data.user.email);
	                                    $('#btnThemOrCapNhat').attr('data-button-userId', id);
	                                    $('#btnThemOrCapNhat').attr('data-button-command','capnhat');
	                                    $('#btnThemOrCapNhat').text('Cập nhật');
	                                    $('#formTitle').text('Cập nhật thông tin người dùng');
	                                    $('#frmUsers').slideDown(800);
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