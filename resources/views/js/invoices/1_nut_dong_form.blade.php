<script>
	$(function(){
		try
		{
			if($('#btnDong').length)
				$('#btnDong').on('click', function(){
					try
        			{
        				$('#divHoaDon').slideUp(800);
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