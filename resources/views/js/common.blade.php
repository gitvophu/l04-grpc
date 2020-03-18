<script>
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