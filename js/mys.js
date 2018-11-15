$(document).ready(function(){
	
	
	$('.like-btn').hover(function() {
	    var id= $(this).attr("data");
	     showlike(this,id);
	      
		 $(this).next().stop().fadeIn(500);
		  
		
	}, function() {
	    
		$(this).next().stop().fadeOut(500);
		
	});
	/********************************************/
	$('.dislike-btn').hover(function() {
	    
	    var id=$(this).attr("data");
	    showdislike(this,id);
		$(this).next().stop().fadeIn(500);
		
	}, function() {
	    
		$(this).next().stop().fadeOut(500);
		
	});
	/********************************************/
	$('.like-btn').on("click",function()
	{
	    
	    $('.l_count').html('<img src="img/loader.gif" style="width:16px;height:16px;">');
	    var id=$(this).attr("data");
		updatelike(id);
		
	});
	/********************************************/
	$('.dislike-btn').on("click",function(){
	    
	    $('.d_count').html('<img src="img/loader.gif" style="width:16px;height:16px;">');
	     var id=$(this).attr("data");
		updatedislike(id);
		
	});
});
/***************************************************************/
function updatelike(id) {
		xhr= getXMLHttpRequest();
		xhr.onreadystatechange=function()
		{
			
			if(xhr.readyState==4 && xhr.status==200)
			{
				
				alert(xhr.responseText);
				
			}
		}
		xhr.open("GET","ajax_root.php?func=updatelike&id="+id,true);
		xhr.send();
}

function showlike(el,id){
	xhr= getXMLHttpRequest();
		xhr.onreadystatechange=function()
		{
			
			if(xhr.readyState==4 && xhr.status==200)
			{
				$(el).next().html(xhr.responseText);
				
			}
		}
		xhr.open("GET","ajax_root.php?func=showlike&id="+id,true);
		xhr.send();	
}
/***************************************************************/
function updatedislike(id) {
        xhr= getXMLHttpRequest();
        xhr.onreadystatechange=function()
        {
            
            if(xhr.readyState==4 && xhr.status==200)
            {
                alert(xhr.responseText);
                
            }
        }
        xhr.open("GET","ajax_root.php?func=updatedislike&id="+id,true);
        xhr.send();
}

function showdislike(el,id){
    xhr= getXMLHttpRequest();
        xhr.onreadystatechange=function()
        {
            
            if(xhr.readyState==4 && xhr.status==200)
            {
                $(el).next().html(xhr.responseText);
                
            }
        }
        xhr.open("GET","ajax_root.php?func=showdislike&id="+id,true);
        xhr.send(); 
}
/***************************************************************/
function getXMLHttpRequest() 
{
    if (window.XMLHttpRequest) {
        return new window.XMLHttpRequest;
    }
    else {
        try {
            return new ActiveXObject("MSXML2.XMLHTTP.3.0");
        }
        catch(ex) {
            return null;
        }
    }
}
