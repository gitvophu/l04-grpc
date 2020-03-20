<script>
	$(function(){
		try
		{
			if($('#txtSanPham').length)
				$('#txtSanPham').on('input', function(){
					try
					{
						var $this = $(this);
						var option = null;
						if(!$this.val())
						{
							$('#hiddenSanPham').val('');
							$('#txtDonGia').val('');
							$('#hiddenSanPham').attr('data-hidden-tenSanPham', '');
							return true;
						}
						$('#datalistSanPham option').each(function(i, v){
							option = $(v);
							if(option.text().toLowerCase() === $this.val().toLowerCase() || option.val().toLowerCase() === $this.val().toLowerCase())
							{
								$this.val(option.val() + ' - ' + option.text());
								$('#hiddenSanPham').val(option.val());
								$('#hiddenSanPham').attr('data-hidden-tenSanPham', option.text());
								$('#txtDonGia').val(option.attr('data-option-donGia'));
								return false;
							}
							else
							{
								$('#hiddenSanPham').val('');
								$('#txtDonGia').val('');
								$('#hiddenSanPham').attr('data-hidden-tenSanPham', '');
							}
						});
						return true;
					}
					catch(err)
			        {
			            alert('Lỗi: ' + err.stack);
			            $('#hiddenSanPham').val('');
						$('#txtDonGia').val('');
						$('#hiddenSanPham').attr('data-hidden-tenSanPham', '');
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