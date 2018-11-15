<?php include 'init.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>   مدیریت | نظرات</title>
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
          <h2 class="page-title">نظرات <small>  مدیریت تأیید و یا حذف نظرات بازدیدکنندگان </small></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>نظرات بازدیدکنندگان </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

                 <legend>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="controls form-group">					
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle">                                  
                                                            <span class="current-font">انتخاب دسته بندی</span>
                                                            <i class="icon-caret-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">اقتصادی</a></li>
                                                            <li><a data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">فرهنگی</a></li>
                                                            <li><a data-wysihtml5-command-value="span" data-wysihtml5-command="formatInline" href="javascript:;" unselectable="on">هنـــری</a></li>
                                                            <li><a data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">ورزشی</a></li>
                                                            <li><a data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">سیاسی</a></li>                            
                                                        </ul>
                                                    </li>
                                                </div>	  
                                            </td>
                                            <td>
                                                <div class="controls form-group">					
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle">                                  
                                                            <span class="current-font">  انتخاب پرونده</span>
                                                            <i class="icon-caret-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">پرونده شماره 1</a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">پرونده شماره 2</a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">پرونده شماره 3</a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">پرونده شماره 4</a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">پرونده شماره 5</a></li>
                                                        </ul>
                                                    </li>
                                                </div>	
                                            </td>
                                                   <td>
                                                <div class="controls form-group">					
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle">                                  
                                                            <span class="current-font">  انتخاب نظر کارشناس</span>
                                                            <i class="icon-caret-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"> کارشناس شماره 1پرونده</a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">   کارشناس شماره 2پرونده</a></li>                                                            
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"> کارشناس شماره 3 پرونده </a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"> کارشناس شماره 4 پرونده</a></li>
                                                        </ul>
                                                    </li>
                                                </div>	
                                            </td>
                                               <td>
                                                <div class="controls form-group">					
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle">                                  
                                                            <span class="current-font">  همه نظرات </span>
                                                            <i class="icon-caret-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"> همـه</a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"> تأیید شده ها</a></li>
                                                            <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on"> تأیید نشده ها</a></li>                                                            
                                                        </ul>
                                                    </li>
                                                </div>	
                                            </td>
                                            
                                        
                                        </tr>
                                    </table>
                                </legend>
                
                
                <table class="table table-striped table-images">
                  <thead>
                    <tr>
                      <th class="hidden-xs-portrait">#</th>
                      <th class="hidden-xs">تصویر</th>
                      <th>نام و نام خانوادگی</th>                                                                                                              
                      <th>متن نظر</th>                                                                                                              
                      <th class="hidden-xs">تاریخ ارسال نظر</th>
                      <th>  عملیات</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="hidden-xs-portrait">1</td>
                      <td class="hidden-xs"><img src="images/1.jpg" /></td>
                      <td> مهدی محمودی </td>                      
                      <td> گفته ی شما رو قبول دارم اما بهتر میشه عمل کرد و این مشکل رو با روش های دیگر هم میشود حل کرد </td>
                      <td class="hidden-xs"> 1393/03/30 </td>                                                                  
                      
                      <td class="td-actions">                                 
                            <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-check"> </i></a>                                                    
                            <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                       </td>
                    </tr>
                    
                    <tr>
                      <td class="hidden-xs-portrait">2</td>
                      <td class="hidden-xs"><img src="images/1.jpg" /></td>
                      <td> مهدی محمودی </td>                      
                      <td> گفته ی شما رو قبول دارم اما بهتر میشه عمل کرد و این مشکل رو با روش های دیگر هم میشود حل کرد </td>
                      <td class="hidden-xs"> 1393/03/30 </td>                                                                  
                      
                      <td class="td-actions">                                 
                            <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-check"> </i></a>                                                    
                            <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                       </td>
                    </tr>
                    
                    <tr>
                      <td class="hidden-xs-portrait">3</td>
                      <td class="hidden-xs"><img src="images/1.jpg" /></td>
                      <td> مهدی محمودی </td>                      
                      <td> گفته ی شما رو قبول دارم اما بهتر میشه عمل کرد و این مشکل رو با روش های دیگر هم میشود حل کرد </td>
                      <td class="hidden-xs"> 1393/03/30 </td>                                                                  
                      
                      <td class="td-actions">                                 
                            <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-check"> </i></a>                                                    
                            <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                       </td>
                    </tr>
                    
                    <tr>
                      <td class="hidden-xs-portrait">4</td>
                      <td class="hidden-xs"><img src="images/1.jpg" /></td>
                      <td> مهدی محمودی </td>                      
                      <td> گفته ی شما رو قبول دارم اما بهتر میشه عمل کرد و این مشکل رو با روش های دیگر هم میشود حل کرد </td>
                      <td class="hidden-xs"> 1393/03/30 </td>                                                                  
                      
                      <td class="td-actions">                                 
                            <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-check"> </i></a>                                                    
                            <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                       </td>
                    </tr>
                       
                     
                  </tbody>
                </table>
                 
                  <ul class="pagination no-margin">
                    <li class="disabled"><a href="#">قبلی</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">بعدی</a></li>
                  </ul>
			     
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        
      </div>
      
    
  
    </div>
  </div>
</div>
    <div class="bottom-nav footer">  <?php administrator_footer(); ?></div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 

</body>
</html>
