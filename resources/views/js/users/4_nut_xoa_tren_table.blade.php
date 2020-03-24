<script>
	$(function(){
		try
		{
			if($('#tbody_id_users').length)
	            $('#tbody_id_users').on('click', '[data-button-id="btnXoa"]', function(){
	                try
	                {
	                    var $this = $(this);
	                    var id = '';
	                    var formData = null;
	                    var cf = confirm('Bạn có thực sự muốn xoá người dùng ' + $this.attr('data-button-userName'));
                    	if(cf)
                    	{
	                        id = $this.attr('data-button-userId');
	                        formData = new FormData();
	                        formData.append('_token', $('#_token').attr('content'));
	                        formData.append('id', id);
	                        $.ajax({
	                            type: 'POST',
	                            dataType : 'JSON',
	                            url: '{{route("xoaNguoiDung")}}',
	                            xhr: function(){return $.ajaxSettings.xhr();},
	                            cache: false,
	                            contentType: false,
	                            processData: false,
	                            data: formData,
	                            success: function(data)
	                            {
	                                try
	                                {
	                                    var frmUsers = $('#frmUsers');
	                                    if(data.flag)
	                                    {
	                                        if((!frmUsers.is(':hidden') || !frmUsers[0].hasAttribute('hidden')) && $('#btnThemOrCapNhat').attr('data-button-userId') === id)
	                                            $('#frmUsers').hide();
	                                        $this.closest('tr').remove();
	                                        alert('Xoá thành công!');
	                                        return true;
	                                    }
	                                    else
	                                        throw new TypeError('Không thể xoá người dùng. Lỗi: ' + data.error);
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