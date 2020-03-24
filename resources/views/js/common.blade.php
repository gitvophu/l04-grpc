<script>
	//định dạng số
	function addCommas(numberString) {
      var resultString = numberString + '';
      var x = resultString.split('.');
      var x1 = x[0];
      var x2 = x.length > 1 ? '.' + x[1] : '';
      var rgxp = /(\d+)(\d{3})/;
      while (rgxp.test(x1))
        x1 = x1.replace(rgxp, '$1' + ',' + '$2');
      return x1 + x2;
    }
	//check email in form
	function checkEmail(email)
	{
	    try
	    {
	        var i = 0;
	        var dot = 0;
	        var ac = 0;
	        if(email.indexOf('@') <= 0 || email.indexOf('.') <= 0)
	            return false;
	        for(; i < email.length; ++i)
	            if(i > 0 && i < email.length - 1)
	            {
	                if(email[i] === '@')
	                    ac = ++ac;
	                if(email[i] === '.' && ac)
	                    dot = ++dot;
	                if((email[i] === '@' && email[i - 1] === '.') || (email[i] === '@' && !/^[A-Z0-9]$/i.test(email[i + 1])) || ac > 1 || dot > 1)// sau @ khác chữ và số
	                    return false;
	            }
	            else if(i && (email[i] === '@' || email[i] === '.'))
	                return false;
	            else if(i && !dot)
	                return false;
	        return true;
	    }
	    catch(err)
	    {
	        alert('Lỗi: ' + err.stack + '!');
	        return false;
	    }
	}
</script>