$(document).on('keypress', '#txtSearch',  function (e) {
	var obj = $(this);	
    if (e.which == 13) {    	
        if($.trim(obj.val()) == ''){        	
        	return false;
        }
    }    
 });