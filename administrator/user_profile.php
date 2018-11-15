<?php include 'init.php'; ?>
<?php 
    $security = new security();
    $connect = new connect();

    $sql = "SELECT * FROM `tbl_users` WHERE id ='" . $_SESSION['user_id'] . "'";
    $result = $connect->query($sql);
    $row = mysql_fetch_assoc($result);
    


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
         <?php administrator_menu (); ?>
    </div>
  </div>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">مشخصات من <small> سایت شبکه مجازی آستان</small></h2>
        </div>
      </div>
      <div class="row">
      
	  <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-user"></i>
              <h3>اطلاعات کاربری</h3>
            </div>
            <div class="widget-content">
              <div class="body">
                <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="user-form" />
                  <div class="row">
                    <div class="col-md-4">
                      <div class="text-align-center"> <img style="height: 112px;" alt="64x64" src="images/user.jpg" class="img-circle" /> </div>
                    </div>
                    <div class="col-md-8">
                      <h3 class="no-margin"> <?php echo $row['name']." ".$row['family']; ?> </h3>
                      <address>
                          <strong>  سطح دسترسی: </strong>  <strong><a href="#"> 
                              <?php 
                                if($row['level']== 0 ) { 
                                    echo 'کاربر مدیر';                               
                                } elseif ($row['level']==1) {
                                    echo "کاربر ثبت کننده";                                     
                                }else {
                                    echo 'کاربر تأیید کننده نظرات';
                                } 
                              ?>
                              </a></strong><br /><br />
                      <abbr title="Work email">ایمــیل : </abbr> <a href="mailto:#"><?php echo $row['email']; ?></a><br />
                      
                      </address>
                    </div>
                  </div>
                  <fieldset>
                    <legend>ثبت و یا تغییر  <small> اطلاعات </small></legend>
                  </fieldset>
                  <fieldset style="direction:ltr;">
                    <legend class="section">اطلاعات شخصی</legend>
                 
                    <div class="control-group">
                      <label for="first-name" class="control-label">نــام <span class="required">*</span></label>
                      <div class="controls form-group">
                        <input type="text" class="col-xs-12 parsley-validated" required="" name="first-name" id="first-name" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label for="last-name" class="control-label">نــام خانوادگی <span class="required">*</span></label>
                      <div class="controls form-group">
                        <input type="text" class="col-xs-12 parsley-validated" required="" name="last-name" id="last-name" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="middle-name">نام مستعار</label>
                      <div class="controls form-group">
                        <input type="text" value="" name="middle-name" class="col-xs-12" id="middle-name" />
                      </div>
                    </div>
					<div class="control-group">
                      <label class="control-label" for="date-of-birth">تاریخ تولد <span class="required">*</span></label>
                      <div class="controls form-group">
                        <input type="text" value="" name="date-of-birth" required="" class="col-sm-6 col-xs-12 date-picker parsley-validated" id="date-of-birth" />
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">جنسیت</label>
                      <div class="controls form-group">
                        <div data-toggle="buttons" class="btn-group" id="gender">
                          <label data-toggle-passive-class="btn-default" data-toggle-class="btn-primary" class="btn btn-primary active">
                            <input type="radio" value="male" name="gender" />
                            &nbsp; مــرد &nbsp; </label>
                          <label data-toggle-passive-class="btn-default" data-toggle-class="btn-primary" class="btn btn-default">
                            <input type="radio" value="female" name="gender" />
                            زن </label>
                        </div>
                      </div>
                    </div>
                    
                  </fieldset>
                  <fieldset>
                    <legend class="section">اطلاعات تماس</legend>
                    <div class="control-group" style="direction:ltr;">
                      <label class="control-label" for="email" id="email-label">ایمیل <span class="required">*</span></label>
                      <div class="controls form-group">
                        <div class="col-xs-12 col-sm-8">
                          <div class="input-group">
                            <input type="email" name="email" class="form-control parsley-validated" required="" data-trigger="change" id="email" />
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-success">چک کردن ایمیل</button>
                            </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="control-group" style="direction:ltr;">
                      <label class="control-label" for="phone">شماره تماس <span class="required">*</span></label>
                      <div class="controls form-group">
                        <div class="col-xs-12 col-sm-8">
                          <div class="input-group">
                            <input type="text" maxlength="28" name="phone" required="" class="form-control  mask parsley-validated" id="phone" />
                            <span class="input-group-btn">
                            <select data-style="btn-default" class="selectpicker" id="phone-type" style="display: none;">
                              <option />مویابل
                              <option />منزل
                              <option />محل کار
                            </select>							
                            <div class="btn-group bootstrap-select" style="direction:ltr;">
                              <button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-default" id="phone-type"><span class="filter-option">شماره تماس</span>&nbsp;<i class="icon-caret-down"></i></button>
                              <ul role="menu" class="dropdown-menu" style="overflow-y: auto; min-height: 60px; max-height: 14.75px;">
                                <li rel="0"><a class="" href="#" tabindex="-1">موبایل</a></li>
                                <li rel="1"><a class="" href="#" tabindex="-1">منزل</a></li>
                                <li rel="2"><a class="" href="#" tabindex="-1">محل کار</a></li>
                              </ul>
                            </div>
                            </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="control-group" style="direction:ltr;">
                      <label class="control-label" for="fax">نمابر</label>
                      <div class="controls form-group">
                        <div class="col-xs-12 col-sm-8">
                          <div class="input-group">
                            <input type="text" maxlength="28" name="phone" class="form-control" id="fax" />
                            <span class="input-group-btn">
                            <select data-style="btn-default" class="selectpicker" id="fax-type" style="display: none;">                              
                              <option />منزل
                              <option />محل کار
                            </select>
                            <div class="btn-group bootstrap-select">
                              <button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-default" id="fax-type"><span class="filter-option">شماره نمابر</span>&nbsp;<i class="icon-caret-down"></i></button>
                              <ul role="menu" class="dropdown-menu" style="overflow-y: auto; min-height: 60px; max-height: 48.75px;">                                
                                <li rel="1"><a class="" href="#" tabindex="-1">منزل</a></li>
                                <li rel="2"><a class="" href="#" tabindex="-1">محل کار</a></li>
                              </ul>
                            </div>
                            </span> </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
				  
				                    <fieldset>
                    <legend class="section">اطلاعات ورود</legend>
                    <div class="control-group" style="direction:ltr;">
                      <label class="control-label" for="email" id="email-label">ایمیل <span class="required">*</span></label>
                      <div class="controls form-group">
                        <div class="col-xs-12 col-sm-8">
                          <div class="input-group">
                            <input type="email" name="email" class="form-control parsley-validated" required="" data-trigger="change" id="email" />
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-success">چک کردن </button>
                            </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="control-group" style="direction:ltr;">
                      <label class="control-label" for="phone"> نام کاربری <span class="required">*</span></label>
                      <div class="controls form-group">
                        <div class="col-xs-12 col-sm-8">
                          <div class="input-group">
                            <input type="text" maxlength="28" name="phone" required="" class="form-control  mask parsley-validated" id="phone" />
                            <span class="input-group-btn">
                            	<button type="button" class="btn btn-success">چک کردن</button>                             
                            </span> 
						  </div>
                        </div>
                      </div>
                    </div>
                    <div class="control-group" style="direction:ltr;">
                      <label class="control-label" for="fax">رمز ورود</label>
                      <div class="controls form-group">
                        <div class="col-xs-12 col-sm-8">
                          <div class="input-group">
                            <input type="text" maxlength="28" name="pass" class="form-control" id="pass" style="direction:ltr;" />
                             </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
				  
                  <div class="form-actions">
                    <button class="btn btn-primary" type="submit">بررسی و ارسال</button>
                    <button class="btn btn-default" type="button">انصراف</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
