 
<?php 
 
/*
------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------  Administrator Panel Functions -------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
*/
function administrator_logo(){
	echo '
	  <img src="images/logo.png" width="189" height="50" />
	';
}

function administrator_footer(){
	echo '
	  <div  id="footer" class="clearfix">
			<div id="footer_txt">مدیریت سایت جامعه مجازی آستان</div>
			<p class="right"> 
			<a target="_blank" href="http://www.linkgroup.ir/"><IMG src="img/linkgroup_logo.png" alt="گروه نرم افزاری لینک"  /> </a></p>
		</div><!-- end #footer -->
	';
}

 function administrator_menu (){
   
	echo '
		 <ul id="nav">
        <li class="current"> <a href="index.php"> <i class="icon-dashboard"></i> داشبورد </a> </li>
        <li> <a href="#"> <i class="icon-desktop"></i> مطالب سایت  <i class="arrow icon-angle-left"></i></a>
          <ul class="sub-menu">
            <li> <a href="file_post.php"> <i class="icon-angle-right"></i> پرونده جدید</a> </li>
            <li> <a href="file_list.php"> <i class="icon-angle-right"></i> لیست پرونده ها </a> </li>
            <li> <a href="expert_comment_post.php"> <i class="icon-angle-right"></i> ثبت نظر کارشناس </a> </li>
            <li> <a href="expert_comment_list.php"> <i class="icon-angle-right"></i> لیست نظرکارشناسی </a> </li>
            <li> <a href="category.php"> <i class="icon-angle-right"></i> دسته بندی</a> </li> 
          </ul>
        </li>		
		 <li> <a href="#"> <i class="icon-desktop"></i> صفحه ها  <i class="arrow icon-angle-left"></i></a>
          <ul class="sub-menu">
            <li> <a href="about.php"> <i class="icon-angle-right"></i> درباره ما </a> </li>
            <li> <a href="contactus.php"> <i class="icon-angle-right"></i> تماس با ما</a> </li> 
            <li> <a href="laws.php"> <i class="icon-angle-right"></i> قوانین و مقررات</a> </li> 
          </ul>
        </li>
	<li> <a href="links.php"> <i class="icon-edit"></i>  لینکهای داغ </a></li>
	
	<li> <a href="#"> <i class="icon-desktop"></i> کاربران  <i class="arrow icon-angle-left"></i></a>
        <ul class="sub-menu">
            <li> <a href="expert.php"> <i class="icon-angle-right"></i> کارشناس  </a> </li>            
            <li> <a href="users.php"> <i class="icon-angle-right"></i> کاربر  </a> </li>
        </ul>
        <li> <a href="registers.php"> <i class="icon-desktop"></i>  عضو شده ها   <span class="label label-info pull-right">4</span> </a> </li> 
        <li> <a href="comments.php"> <i class="icon-folder-open-alt"></i> نظرات <span class="label label-info pull-right">'. $_SESSION['unread_comment'] .'</span> </a>
		  <li> <a href="#"> <i class="icon-desktop"></i> گزارشات  <i class="arrow icon-angle-left"></i></a>
          <ul class="sub-menu">
                <li> <a href="#"> <i class="icon-angle-right"></i> بازدید ها </a> </li>
                <li> <a href="registers.php"> <i class="icon-angle-right"></i> عضویت ها</a> </li> 
		<li> <a href="#"> <i class="icon-angle-right"></i> پسند شده ها</a> </li> 
		<li> <a href="#"> <i class="icon-angle-right"></i> مطالب</a> </li> 
          </ul>
        </li>
        <li> <a href="user_profile.php"> <i class="icon-desktop"></i> مشخصات من  </a> </li> 
	<li> <a href="logout.php"> <i class="icon-desktop"></i> خروج  </a> </li>
        
        
      </ul>	
	';
}			

 function administrator_side_menu (){        
    echo '
	<div id="sidebar" class="right">
          <h2 class="ico_mug">منــو</h2>
          <ul id="menu">
            <li> <a href="#" class="ico_user">کودک</a>
              <ul>
                <li><a href="baby.php">ثبت نام کودک</a></li>
                <li><a href="baby.php?#tabs-2">لیست کودکان</a></li>
              </ul>
              <a href="#" class="ico_posts">محتوا</a>
              <ul>
                <li><a href="content.php">درج خبر</a></li>
                <li><a href="content.php?#tabs-2">درج مقاله</a></li>
                <li><a href="contentlist.php">لیست اخبار </a></li>
                <li><a href="contentlist.php?#tab-2">لیست مقالات </a></li>
              </ul>
              <a href="#" class="ico_user">مربیان</a>
              <ul>
                <li><a href="teachers.php#tab-2">ثبت مربی جدید</a></li>
                <li><a href="teachers.php">لیست مربیان</a></li>
              </ul>
              <a href="#" class="ico_page">لیست کلاسها</a>
              <ul>
                <li><a href="class.php#tab-2">ثبت کلاس</a></li>
                <li><a href="class.php">لیست کلاسها</a></li>
              </ul>
              <a href="#" class="ico_settings">تنظیمات</a>
              <ul>
                <li><a href="settings.php">اطلاعات مهدکودک</a></li>                                
                <li><a href="settings.php#tabs-4">تغییر رمز مدیر</a></li>
              </ul>
            </li>
          </ul>
        </div>
		
		';
}




/*
------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------  Site Functions --------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
*/
 function info_select (){        
    $result = mysql_query("SELECT name FROM info ") or die(mysql_error());
    $row = mysql_fetch_field($result, MYSQL_NUM);
    return $row;
}


function category_list($c){
    
    $result = mysql_query("SELECT * FROM tbl_category WHERE id=".$c) or die(mysql_error());
    $row = mysql_fetch_assoc($result);
    return $row['name_fa'];
}






/*
------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------  Admin Profile Functions ----------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
*/