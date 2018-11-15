<?php include 'init.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title> مدیریت | کارشناسان  </title>
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
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> اطلاعات کارشناس جدید</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                
                <form method="post" class="form-horizontal" />
                <fieldset>                  
                  <div class="control-group">                    
                    <div class="controls form-group">					
                      <input type="text" placeholder="نام ..." class="form-control" id="expert_name" /> 
                    </div>
                      
                    <div class="controls form-group">					
                      <input type="text" placeholder="فامیلی ..." class="form-control" id="expert_family" /> 
                    </div>
                      
                    <div class="controls form-group">					
                      <input type="text" placeholder="شغل ..." class="form-control" id="expert_job" /> 
                    </div>
                      
                    <div class="controls form-group">					                                        					
                          <li class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font">انتخاب مدرک تحصیلی </span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                              <ul class="dropdown-menu">
                                  <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">دکتری</a></li>
                                  <li><a data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">فوق لیسانس</a></li>
                                  <li><a data-wysihtml5-command-value="span" data-wysihtml5-command="formatInline" href="javascript:;" unselectable="on">لیسانس</a></li>                                                                    
                              </ul>
                          </li>                   
                    </div>
                      
                        <div class="controls form-group">					
                      <input type="text" placeholder="ایمیل ..." class="form-control" id="expert_email" /> 
                    </div>                                         	
                      
                    <div class="controls form-group">					
                        <div class="fileUpload btn btn-primary">
                            <span>انتخاب تصویر</span>
                            <input type="file" class="upload" />
                        </div>
                        
                        <img src="images/logo.png" />
                    </div>
                      
                    <div class="controls form-group">					
			<input class="btn btn-warning pull-left" type="submit" value="تغییر مشخصات  کارشناس" />					
                    </div>
                  </div>
                  
                </fieldset>	
            </form>				 			     
          
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
          
            <!-- /widget-content --> 
          </div>
        </div>
        
      </div>
      
    
  
    </div>
  </div>
</div>
<div class="bottom-nav footer">  طراحی توسط گروه نرم افزاری لینک.   &copy;2014</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 

</body>
</html>
