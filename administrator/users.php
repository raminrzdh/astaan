<?php include 'init.php'; ?>
<?php

$security = new security();
$connect = new connect();

?>
<!DOCTYPE html>
<html>
<head>
<title> مدیریت | کاربران  </title>
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
 <script src="js/jquery-1.10.2.min.js"></script>

 
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
    
<div style="display: none;" aria-hidden="true" aria-labelledby="messagebox_lable" role="dialog" tabindex="-1" class="modal fade" id="messagebox">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x      </button>
                <h4 id="myModalLabel" class="modal-title"> پــیام</h4>
            </div>
            <div class="modal-body">                        

                <div id="result_msg" class="result_msg">کمی صبر کنید...درحال درج  </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">          بازگشت        </button>                                                 
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>   <!-- /.modal-dialog --> 
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
          <h2 class="page-title">کاربران <small>مدیریت کاربران سایت</small></h2>
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
                 <div class="col-lg-8">
                <form method="post" name='frm_user_add' class="form-horizontal" />
                <fieldset>                  
                  <div class="control-group">                    
                    <div class="controls form-group">					
                      <input type="text" placeholder="نام ..." class="form-control" id="user_name" /> 
                    </div>
                      
                    <div class="controls form-group">					
                      <input type="text" placeholder="فامیلی ..." class="form-control" id="user_family" /> 
                    </div>
                      
                    <div class="controls form-group">					
                        <input type="text" placeholder="username ..." class="form-control" id="user_username" style="direction: ltr;" /> 
                    </div>
                      
                    <div class="controls form-group">					
                        <input type="text" placeholder="password ..." class="form-control" id="user_password" style="direction: ltr;"/> 
                    </div>
                      
                    <div class="controls form-group">					
                        <input type="text" placeholder="Retry password ..." class="form-control" id="user_password2" style="direction: ltr;"/> 
                    </div>  
                   
                    <div class="controls form-group">					
                      <input type="text" placeholder="ایمیل ..." class="form-control" id="user_email" /> 
                    </div> 
                       
                    <div class="controls form-group">		
                          <li class="dropdown">
                              <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font" id="level_select">انتخاب  سطح دسترسی</span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                              <ul class="dropdown-menu" id="level">
                                  <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='1'   href='javascript:;' unselectable='on'> کاربر مدیر</a></li>                          
                                  <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='2'   href='javascript:;' unselectable='on'>ثبت کننده پرونده </a></li>                          
                                  <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='3'   href='javascript:;' unselectable='on'> تأیید کننده نظرات</a></li>                          
                              </ul>
                          </li>
                          <br />
                    <div>                                                                                  	
                      
                    <div class="controls form-group">					
                       <img src="images/user.jpg" width="60" height="75" /> 
                        <div class="fileUpload btn btn-primary">
                            <span>انتخاب تصویر</span>
                            <input type="file" class="upload" />
                        </div>                                             
                    </div>
                      
                    </div>  
                 
                
                          
                    <div class="form-actions" >
                        <div>
                            <a data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-warning pull-left" type="botton" class="btn_user_add" id="btn_user_add" name="btn_user_add">        افـــزودن        </a>
                            
                            <button class="btn btn-default" type="reset">         انصراف       </button>
                            &nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                  
                </fieldset>	
            </form>
				 
				
	      </div>
            </div>			
            <!-- /widget-content --> 
			
          </div>
        </div>
          
          <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> لیست کاربران سایت</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">                		
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th> عکس </th>
                            <th> نام و نام خانوادگی </th>
                            <th> نام کاربری </th>                                                
                            <th> ایمیل </th>	
                            <td> سطح دیترسی </td>
                            <th class="td-actions" style="width:70px;"> عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="result_list" class="result_list">                                                
<!--                        <tr>
                            <td> <img src="images/user.jpg" width="60" height="75" /> </td>
                            <td> رضــا  رحمـــانی</td>
                            <td> rahmani</td>
                            <td> r.rahmani@astaan.ir </td>
                            <td> ثبت کننده </td>

                            <td class="td-actions">                                                    
                                <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-edit"> </i></a>                                                    
                                <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                            </td>
                        </tr>-->
                    </tbody>
                </table>
                
                <ul class="pagination no-margin">                                        
                    <?php 
                        $sql = "SELECT * FROM tbl_users";
                        $query = $connect->query($sql);                                           
                        $number = ceil( (mysql_num_rows($query))/5);
                        echo '<li id="preview" class="disabled"><a href="#">قبلی</a></li>';

                        for ($i=1;$i<$number+1;$i++) {
                            echo' 
                                 <li id="'.$i.'" class="a1"><a>'.$i.'</a></li>                                                         
                                ';
                        }                                    
                        echo '<li id="next"><a href="#">بعدی</a></li>';
                    ?>      
                 </ul> 	 
	  
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
<script type="text/javascript" src="js/myscript.js"></script> 

<script>
$user_level = 0;
$(document).ready(function() {    
    $("#1").addClass("active");
    $page = 1;
    $user = "set";
    $.ajax({
        url: 'Ajax.php',
        type: 'POST',
        data: ({user_list_pagination : $user, page: $page}),
        success: function (info) {
            $("#result_list").html(info);
        }
    });
 });
 
 $(".a1").click(function(){ 
    $(".a1").removeClass("active");
    $(this).addClass("active");

    $page = this.id;
    $user = "set";
    $.ajax({
            url: 'Ajax.php',
            type: 'POST',
            data: ({user_list_pagination : $user, page: $page}),
            success: function (info) {
            $("#result_list").html(info);

              }

    });
});
 
 
function user_remove(){                                           
    $user_del_id = this.id;
    $user_del = "set"; 
     
    $.ajax({
        url: 'Ajax.php',
        type: 'POST',
        data: ({user_del : $user_del , user_id: $user_del_id}),
        success: function (info) {
                $("#result_msg").html(info),
                $(".a1").click();
                
          }
    });
};

$("#level li a").click(function() {                    
        $user_level = (this.id); // id of clicked li by directly accessing DOMElement property
        document.getElementById("level_select").innerHTML = document.getElementById(this.id).innerHTML;
  });
    
$("#btn_user_add").click(function() {
        $btn_user_add = "set";     
        $user_name =  document.forms["frm_user_add"]["user_name"].value;
        $user_family =  document.forms["frm_user_add"]["user_family"].value;                       
        $user_username = document.forms["frm_user_add"]["user_username"].value;
        $user_password = document.forms["frm_user_add"]["user_password"].value;
        $user_password2 = document.forms["frm_user_add"]["user_password2"].value;
        $user_email = document.forms["frm_user_add"]["user_email"].value;					
        $user_pic = 'none.jpg';

        $.ajax({                       
            url: 'ajax.php',
            type: 'POST',
            data: ({btn_user_add: $btn_user_add , user_name: $user_name ,user_family : $user_family ,user_username : $user_username ,user_password : $user_password ,user_password2 : $user_password2 ,user_email : $user_email ,user_pic : $user_pic , user_level: $user_level }),
            success: function(info) {                                  
                $("#result_msg").html(info),
                $(".a1").click();                                        
            }
        });
});
 
</script>    
</body>
</html>
