<?php

class security{
	
	//HASH
	function hash_value($value){
	 	return md5($value)."speiw#sb^&ewiq";                
	}
	//check post data
	function Check_Post($value){
		$Return1 = mysql_real_escape_string($value);
		$Return2 = htmlspecialchars($Return1);
		return $Return2;
	}
	
	//check get data
	function Check_Get($value){
		$Return1 = mysql_real_escape_string($value);
		$Return2 = htmlspecialchars($Return1);
		$Return3 = intval($Return2);
		return $Return3;
	}
	
	//check get search
	function Check_Get_Search($value){
		$Return1 = mysql_real_escape_string($value);
		$Return2 = htmlspecialchars($Return1);
		return $Return2;
	}
	
	//redirect function
	function Redirect($page,$parametr)
	{	
		if(isset($page) && isset($parametr))
		{
		$page_filter = $page.".php?".$parametr;
		header("location:$page_filter");
		exit;
		}
		else if(isset($page)){
			$page_filter = $page.".php";
		header("location:$page_filter");
		exit;
		}
		
	}
	
	//covering function ---->include()
	function Covering($page){
		$page_filter = $page.".php";
		include "$page_filter";
	}
	
	//check manager log
	function check_manage()
	{
		if($_SESSION['manager_log'] != true )
		{                    
			$this->Redirect("login");
		}
		
	}
	
	//check user log
	function check_user()
	{
		if($_SESSION['user_log']!=true)
		{
			$this->Redirect("../login/index");
		}
		
	}
	function read($value){
		 $return1=strip_tags($value);
		 $return2=stripslashes($return1);
		 return $return2;
	}
        
        function massage($text,$color,$size){
		echo "<center><b><font color=$color size='$size'>$text</font></b><center>";
	}
        
     
	
}


 

?>