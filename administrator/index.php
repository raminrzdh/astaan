<?php 
include 'init.php';

$security=new security;
$connect=new connect;
$security->check_manage();

$sql2="SELECT * FROM tbl_users";
$result=$connect->query($sql2);
$rows = mysql_fetch_assoc($result);
//echo $rows['name']." ".$rows['family'];
$comment="SELECT * FROM tbl_comment WHERE status = 0";
$result_comment =$connect->query($comment);
$row_num = mysql_num_rows($result_comment);
$_SESSION['unread_comment'] = $row_num;

?>
 
<!DOCTYPE html>
<html>
<head>
<title> اصلی مدیریت سایت</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet" media="screen" />
<link href="css/thin-admin.css" rel="stylesheet" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet" media="screen" />
<link href="style/style.css" rel="stylesheet" />
<link href="style/dashboard.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
      <script src="../js/respond.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
      <div class="brand pull-left"> <a href="index.php"><?php administrator_logo(); ?></a></div>
    
    <ul class="nav navbar-nav navbar-right  hidden-xs">
      <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username">رضا رحمانی</span> <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">        
          <li><a href="#"><i class="icon-tasks"></i> مشخصات من</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="icon-key"></i> خروج</a></li>
        </ul>
      </li>
    </ul>
    <form class="pull-right" />
                    <input type="search" placeholder="جستجو..." class="search" id="search-input" />
    </form>
  </div>
</div>
<div class="wrapper">
  <div class="left-nav">
    <div id="side-nav">
      <?php administrator_menu(); ?>
    </div>
  </div>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">داشبورد <small>مدیریت سایت شبکه مجازی آستان</small></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>کلیدهای میانبر</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
					<a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">پرونده ها</span> </a>
					<a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">لینک ها داغ</span> </a>
					<a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">گزارشات</span> </a>
					<a class="shortcut" href="javascript:;"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">نظرات</span> </a>
					<a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-user"></i><span class="shortcut-label">کاربران</span> </a>
					<a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">صفحه ها</span> </a>
					<a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">مدیریت فایلها</span> </a>
					<a class="shortcut" href="javascript:;"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">کلمات کلیدی</span> </a> 
			    </div>
              <!-- /shortcuts --> 
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-bookmark"></i>
               <h3>وضعیت امروز</h3>
            </div>
            <!-- /widget-header -->
			   <div class="widget-content">
              <div class="widget big-stats-container">
                <h6 class="bigstats">خلاصه آخرین آمار و اطلاعات وبسایت به شرح زیر است : </h6>
                <div class="cf" id="big_stats">
                  <div class="stat"> <i class="icon-anchor"></i> <span class="value">51</span> </div>
                  <!-- .stat -->
                  
                  <div class="stat"> <i class="icon-thumbs-up-alt"></i> <span class="value">41</span> </div>
                  <!-- .stat -->
                  
                  <div class="stat"> <i class="icon-twitter-sign"></i> <span class="value">91</span> </div>
                  <!-- .stat -->
                  
                  <div class="stat"> <i class="icon-bullhorn"></i> <span class="value">21</span> </div>
                  <!-- .stat --> 
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
			
          
            <!-- /widget-content --> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-file"></i>
              <h3>آخرین نظرات</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="messages_layout">
                <li class="from_user left"> <a class="avatar" href="#"><img src="images/message-avatar.jpg" /></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info">  <span class="time">  1 ساعت قبل </span> <a class="name">  علیرضا احمدی  | </a>
                      <div class="options_arrow">
                        <div class="dropdown pull-right">  
							<a href="#" data-target="#" data-toggle="dropdown" role="button" id="dLabel" class="dropdown-toggle "> <i class=" icon-caret-down"></i> </a>
							<ul aria-labelledby="dLabel" role="menu" class="dropdown-menu ">                            
								<li><a href="#"><i class=" icon-trash icon-large"></i> حذف</a></li>
								<li><a href="#"><i class=" icon-share icon-large"></i> تأیید</a></li>
							</ul>
                        </div>
                      </div>
                    </div>
                    <div class="text">  متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . </div>
                  </div>
                </li>
                <li class="by_myself right"> <a class="avatar" href="#"><img src="images/message-avatar.jpg" /></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info">  <span class="time">  2 ساعت قبل </span> <a class="name"> مرتضی جمشیدی  | </a>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a href="#" data-target="#" data-toggle="dropdown" role="button" id="dLabel" class="dropdown-toggle "> <i class=" icon-caret-down"></i> </a>
                          <ul aria-labelledby="dLabel" role="menu" class="dropdown-menu ">
                            <li><a href="#"><i class=" icon-trash icon-large"></i> حذف</a></li>
								<li><a href="#"><i class=" icon-share icon-large"></i> تأیید</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> متن نظر ثبت شده توسط این کاربر متن نظر ثبت شده توسط این کاربر  متن نظر ثبت شده توسط این کاربر متن نظر ثبت شده توسط این کاربر  متن نظر ثبت شده توسط این کاربر متن نظر ثبت شده توسط این کاربر  متن نظر ثبت شده توسط این کاربر متن نظر ثبت شده توسط این کاربر  متن نظر ثبت شده توسط این کاربر متن نظر ثبت شده توسط این کاربر  </div>
                  </div>
                </li>
                <li class="from_user left"> <a class="avatar" href="#"><img src="images/message-avatar.jpg" /></a>
                  <div class="message_wrap"> <span class="arrow"></span>
                     <div class="info">  <span class="time">  1 ساعت قبل </span> <a class="name">  علیرضا احمدی  | </a>
                      <div class="options_arrow">
                        <div class="dropdown pull-right">  
							<a href="#" data-target="#" data-toggle="dropdown" role="button" id="dLabel" class="dropdown-toggle "> <i class=" icon-caret-down"></i> </a>
							<ul aria-labelledby="dLabel" role="menu" class="dropdown-menu ">                            
								<li><a href="#"><i class=" icon-trash icon-large"></i> حذف</a></li>
								<li><a href="#"><i class=" icon-share icon-large"></i> تأیید</a></li>
							</ul>
                        </div>
                      </div>
                    </div>
                    <div class="text">  متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . متن نظر ارسال شده توصط علیرضا احمدی . </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <div class="col-lg-6">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>آخرین پیام ها</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> عنوان پیام </th>
                    <th> ارسال کننده</th>
                    <th class="td-actions"> عملیات</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
				  <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
				  <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
				  <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
				  <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
				  <tr>
                    <td> اعلام تشکر بابت سایت بسیار مفید و باز  که در بین سایتهای امروزی نمونه ندارد </td>
                    <td> darvishanpour@gmail.com </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
				   
                </tbody>
              </table>
              
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
    
      </div>
    </div>
  </div>
</div>
<div class="bottom-nav footer"> <?php administrator_footer (); ?></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 

</body>
</html>
