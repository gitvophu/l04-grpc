<script>
	$(function(){
		try
		{
			if($('#tbody_id_invoices').length)
	            $('#tbody_id_invoices').on('click', '[data-button-id="btnXoa"]', function(){
	                try
	                {
	                    var $this = $(this);
	                    var id = '';
	                    var formData = null;
	                    var cf = confirm('Bạn có thực sự muốn xoá hoá đơn của khách hàng ' + $this.attr('data-button-khachHang'));
                    	if(cf)
                    	{
	                        id = $this.attr('data-button-hoaDonId');
	                        formData = new FormData();
	                        formData.append('_token', $('#_token').attr('content'));
	                        formData.append('id', id);
	                        $.ajax({
	                            type: 'POST',
	                            dataType : 'JSON',
	                            url: '{{route("xoaHoaDon")}}',
	                            xhr: function(){return $.ajaxSettings.xhr();},
	                            cache: false,
	                            contentType: false,
	                            processData: false,
	                            data: formData,
	                            success: function(data)
	                            {
	                                try
	                                {
	                                    var divHoaDon = $('#divHoaDon');
	                                    if(data.flag)
	                                    {
	                                        if((!divHoaDon.is(':hidden') || !divHoaDon[0].hasAttribute('hidden')) && $('#btnThemOrCapNhat').attr('data-button-hoaDonId') === id)
	                                            $('#divHoaDon').hide();
	                                        $this.closest('tr').remove();
	                                        alert('Xoá thành công!');
	                                        return true;
	                                    }
	                                    else
	                                        throw new TypeError('Không thể xoá hoá đơn. Lỗi: ' + data.error);
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