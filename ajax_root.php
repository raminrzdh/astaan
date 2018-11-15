<?php

include './administrator/init.php';
$security = new security;
$connect = new connect;
$db = new connect;

if (isset($_POST['action'])) {

    $your_vote = $security->Check_Post($_POST['your_yote']);
    $file_id = $security->Check_Post($_POST['file_id']);
    $subfile_id = $security->Check_Post($_POST['subfile_id']);
    $exp_id = $security->Check_Post($_POST['exp_id']);
    $sql = "INSERT INTO `tbl_vote`(`file_id`, `subfile_id`, `expert_id`, `answering`) VALUES ('" . $file_id . "','" . $subfile_id . "','" . $exp_id . "','" . $your_vote . "')";
    $result = $connect->query($sql);
    if ($result) {

        echo $security->massage("رای  شما ثبت گردید", "#00FF00", "4px");

        echo $security->massage("<button  href='javascript:alert('asdasdasd');' >بستن پنجره</button>  ", "#00FF00", "4px");
    } else {
        

        echo $security->massage("خطا در ارسال- نظر شما ثبت نشد", "#00FF00", "6px");
        
    }
}

if (isset($_POST['action_contact'])) {
    
    $name=$security->Check_Post($_POST['name']);
    $text=$security->Check_Post($_POST['txt']);
    $email=$security->Check_Post($_POST['email']);
    $date=$security->Check_Post($_POST['date']);
     $captcha=$security->Check_Post($_POST['captcha']);
     
     if($captcha==$_SESSION['captcha'] ){
         
         if($name=="" || $text=="" || $email=="" )
           {

             echo $security->massage("همه ی فیلد ها رو پر کنید", "#00FF00", "4px");
            }
            else{
                
             $sql="INSERT INTO `tbl_contact`( `name`, `email`, `text`, `date`) VALUES ('".$name."','".$email."','".$text."','".$date."')";
            $result=$connect->query($sql);
            if($result){

                 echo $security->massage("پيام شما ثبت گرديد", "#00FF00", "4px");
            }
            else
            {
                 echo $security->massage("پيام شما ارسال نشد ", "#00FF00", "4px");
             }
                       
            
            }
         
                   


         }
 else {
         echo $security->massage("کد امنيتي صحيح نميباشد", "red", "4px");    
         }     
}

 $func=null;
 $id=null;
 if(isset($_GET['func']) && isset($_GET['id']))
 {
   $func=$_GET['func'];
   $id=$_GET['id']; 
   
   if(empty($func) || empty($id))
   {
       exit;
   } 
 }


switch ($func) {
         case 'updatelike': updatelike(2);
 		
		 break;
         
     case 'updatedislike':updatedislike(2);
         
         break;
             
     case 'showlike':showlike(2);
         
         break;
     case 'showdislike':showdislike(2);
         
         break;
 	
	 default: exit;
		 break;
 }
/**********************************************/
     function updatelike($id){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        
        $db=new connect;
         
        $result=$db->query("SELECT * FROM tbl_comment where id='{$id}'");
        $row=mysql_fetch_array($result);
        if(!user_validation($user_ip,$row['id']))
        {
            echo 'رای شما قبلا برای این مطلب ثبت گردیده است';
            return;        
        }
        $newlike=++$row['up'];
        $db->query("UPDATE  `tbl_comment` SET  `up` ={$newlike} WHERE  `id` ='{$id}'");
        
        $db->query("INSERT INTO `tbl_comment_vote`(`ip`, `c_id`, `ip_date`) VALUES ('".$user_ip."','".$row['id']."','1393/03/03')");
        
        unset($db);
        echo 'رای شما با موفقیت ثبت گردید'."  ". $row['id'];
		
     }
	 
	 function showlike($id)
	 {
		$db=new connect;
         
		$result=$db->query("SELECT * FROM tbl_comment where id='{$id}'");
		$row=mysql_fetch_array($result);
		echo $row['up'];
         
		unset($db);
        
	 }
/**********************************************/
 	function updatedislike($id){
 	    $user_ip=$_SERVER['REMOTE_ADDR'];
        $db=new connect;
         
        $result=$db->query("SELECT * FROM tbl_comment where id='{$id}'");
        $row=mysql_fetch_array($result);
        if(!user_validation($user_ip,$row['id']))
        {
            echo 'رای شما قبلا برای این مطلب ثبت گردیده است';
            return;        
        }
        $newlike=++$row['down'];
        $db->query("UPDATE  `tbl_comment` SET  `down` ={$newlike} WHERE  `id` ={$row['id']}");
       $db->query("INSERT INTO `tbl_comment_vote`(`ip`, `c_id`, `ip_date`) VALUES ('".$user_ip."','".$row['id']."','1393/03/03')");
        
        unset($db);
        echo 'رای شما با موفقیت ثبت گردید';
        
     }
     
     function showdislike($id)
     {
        $db=new connect;
         
        $result=$db->query("SELECT * FROM tbl_comment where id='{$id}'");
        $row=mysql_fetch_array($result);
        echo $row['down'];
        
        unset($db);
     }   
     
    function user_validation($user_ip,$c_id)
    { 
     $db=new connect;
      
     $result=$db->query("SELECT * FROM tbl_comment_vote WHERE c_id='{$c_id}' and ip='{$user_ip}' LIMIT 1");
     $row=mysql_fetch_array($result);
     if($row)
     {
         return false;
     }
     else {
         return true;
     }  
    }  
    
    
    function validtime($time1)
    {
    $ts1=strtotime($time1);
    $ts2=strtotime(date("Y-m-d H:i:s"));
    $diff=$ts2-$ts1;
    $day=floor($diff/3600/24);
    return ($day>1)?true:fasle;
    }