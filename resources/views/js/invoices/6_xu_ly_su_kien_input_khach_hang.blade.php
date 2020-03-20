<script>
	$(function(){
		try
		{
			if($('#txtKhachHang').length)
				$('#txtKhachHang').on('input', function(){
					try
					{
						var $this = $(this);
						var option = null;
						var hiddenKhachHang = $('#hiddenKhachHang');
						if(!$this.val())
						{
							hiddenKhachHang.val('');
							hiddenKhachHang.attr('data-hidden-tenKhachHang', '');
							return true;
						}
						$('#datalistKhachHang option').each(function(i, v){
							option = $(v);
							if(option.text().toLowerCase() === $this.val().toLowerCase() || option.val().toLowerCase() === $this.val().toLowerCase())
							{
								$this.val(option.val() + ' - ' + option.text());
								hiddenKhachHang.val(option.val());
								hiddenKhachHang.attr('data-hidden-tenKhachHang', option.text());
								return false;
							}
							else
							{
								hiddenKhachHang.val('');
								hiddenKhachHang.attr('data-hidden-tenKhachHang', '');
							}
						});
						return true;
					}
					catch(err)
			        {
			            alert('Lỗi: ' + err.stack);
			            hiddenKhachHang.val('');
			            hiddenKhachHang.attr('data-hidden-tenKhachHang', '');
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