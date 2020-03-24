<script>
	$(function(){
		try
		{
			if($('#fileAnh').length)
				$('#fileAnh').on('change', function(){
					try
					{
						var fr = null;
				        var files = $(this).prop('files');
				        var img = $('#imgFileAnh');
					    // FileReader support
					    if (FileReader && files && files.length) {
					        fr = new FileReader();
					        fr.onload = function () {
					            img.attr('src', fr.result);
					        }
					        fr.readAsDataURL(files[0]);
					    }
					    // Not supported
					    else if(!FileReader)
					    {
					       alert('Unsupported display image after pick!');
					       return false;
					    }
					    else if(img[0].hasAttribute('src'))
					    	img.removeAttr('src');
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