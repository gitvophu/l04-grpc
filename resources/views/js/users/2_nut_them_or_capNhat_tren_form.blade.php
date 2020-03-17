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

        				tenNguoiDung = $('#txtTenNguoiDung').val();
        				tuoi = $('#numTuoi').val();
        				email = $('#txtEmail').val();

        				if(tenNguoiDung.length > 64 || !tenNguoiDung)
        					throw new TypeError('Tên người dùng không được rỗng và phải có độ dài nhỏ hơn 64 ký tự!');
        				if(!tuoi || isNaN(tuoi))
        					throw new TypeError('Tuổi không được rỗng và phải là số nguyên dương!');
        				if(!checkEmail(email))
        					throw new TypeError('Email không được rỗng và phải hợp lệ!');
        				formData = new FormData();
    					formData.append('_token', $('#_token').attr('content'));
    					formData.append('tenNguoiDung', tenNguoiDung);
    					formData.append('tuoi', tuoi);
    					formData.append('email', email);
        				if(cmd === 'capnhat')
        				{
        					formData.append('id', $this.attr('data-button-userId'));
        					_url = '{{route("capNhatNguoiDung")}}';
        				}
        				$.ajax({
        					type: 'POST',
        					dataType: 'JSON',
	                        url: url,
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
	                                if(data.flag)
	                                {
	                                	if(cmd === 'capnhat')
	                                	{
	                                		var tr = $('#tbody_id_users').children('[data-button-userId="' + $this.attr('data-button-userId') + '"]');
			                            	var td = tr.children();
	                                		td.eq(2).html(tenNguoiDung);
	                                		td.eq(3).html(tuoi);
	                                		td.eq(4).html(email);
	                                		$('[data-button-id="btnXoa"][data-button-userId="' + $this.attr('data-button-userId') + '"]').attr('data-button-userName', tenNguoiDung);
	                                	}
	                                	else
		                                    $('#tbody_id_users').append('<tr>\
							                    <td>' + ($('#tbody_id_users').children().length + 1) + '</td>\
							                    <td>' + data.id + '</td>\
							                    <td>' + tenNguoiDung + '</td>\
							                    <td>' + tuoi + '</td>\
							                    <td>' + email + '</td>\
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