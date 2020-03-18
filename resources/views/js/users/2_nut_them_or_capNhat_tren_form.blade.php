<script>
	$(function(){
		try
		{
			if($('#btnThemOrCapNhat').length)
        		$('#btnThemOrCapNhat').on('click', function(){
        			try
        			{
        				var tenNguoiDung = '';
        				var tuoi = 0;
        				var email = '';
        				var formData = null;
        				var $this = $(this);
        				var cmd = $this.attr('data-button-command');
        				var _url = '{{route("them")}}';
        				var anhDaiDien = $('#imgFileAnh').attr('src');
        				var file = null;

        				tenNguoiDung = $('#txtTenNguoiDung').val();
        				tuoi = $('#numTuoi').val();
        				email = $('#txtEmail').val();
        				if(tenNguoiDung.length > 64 || !tenNguoiDung)
        					throw new TypeError('Tên người dùng không được rỗng và phải có độ dài nhỏ hơn 64 ký tự!');
        				if(!tuoi || isNaN(tuoi) || (!isNaN(tuoi) && (tuoi < 18 || tuoi > 70)))
        					throw new TypeError('Tuổi không được rỗng và phải là số nguyên dương lớn hơn bằng 18 và nhỏ hơn bằng 70!');
        				if(!checkEmail(email))
        					throw new TypeError('Email không được rỗng và phải hợp lệ!');
        				formData = new FormData();
    					formData.append('_token', $('#_token').attr('content'));
    					formData.append('tenNguoiDung', tenNguoiDung);
    					formData.append('tuoi', tuoi);
    					formData.append('email', email);
    					if(anhDaiDien)
    					{
    						file = $('#fileAnh').prop('files')[0];
	    					formData.append('', anhDaiDien);
	    					formData.append('tenFile', file.name.split('.')[0]);
	    					formData.append('duoiFile', file.name.split('.')[1]);
    					}
        				if(cmd === 'capnhat')
        				{
        					formData.append('id', $this.attr('data-button-userId'));
        					_url = '{{route("capNhatNguoiDung")}}';
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
	                                if(data.flag)
	                                {
	                                	if(cmd === 'capnhat')
	                                	{
	                                		button = $('#tbody_id_users').children().find('[data-button-userId="' + $this.attr('data-button-userId') + '"][data-button-id="btnSua"]');
			                            	tr = button.parent().closest('tr');
			                            	td = tr.children();
	                                		td.eq(2).text(tenNguoiDung);
	                                		td.eq(3).text(tuoi);
	                                		td.eq(4).text(email);
	                                		$('[data-button-id="btnXoa"][data-button-userId="' + $this.attr('data-button-userId') + '"]').attr('data-button-userName', tenNguoiDung);
	                                	}
	                                	else
		                                    $('#tbody_id_users').append('<tr>\
							                    <td>' + ($('#tbody_id_users').children().length + 1) + '</td>\
							                    <td>' + data.id + '</td>\
							                    <td>' + tenNguoiDung + '</td>\
							                    <td>' + tuoi + '</td>\
							                    <td>' + email + '</td>\
							                    <td>' + (anhDaiDien ? '<img src="' + anhDaiDien + '" alt="Ảnh đại diện">' : 'Chưa cập nhật') + '</td>\
							                    <td>\
							                        <div class="btn-group">\
							                            <button data-button-id="btnXoa" class="btn btn-danger" data-button-userId="' + data.id + '" data-button-userName="' + tenNguoiDung + '">Xoá</button>\
							                            <button data-button-id="btnSua" class="btn btn-info" data-button-userId="' + data.id + '">Sửa</button>\
							                        </div>\
							                    </td>\
							                </tr>');
						                alert((cmd === 'capnhat' ? 'Cập nhật' : 'Thêm') + ' thành công!');
	                                }
	                                else
	                                    throw new TypeError('Không thể ' + (cmd === 'capnhat' ? 'cập nhật' : 'thêm mới') + ' thông tin người dùng. Lỗi: ' + data.error);
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