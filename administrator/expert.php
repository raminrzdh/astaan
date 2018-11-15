<?php include 'init.php'; ?>
<?php 
$security = new security();
    $connect = new connect();

?>
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
                        <button data-dismiss="modal" class="btn btn-default" id="goback" type="button">          بازگشت        </button>                                                 
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
                
                <form method="post" name="frm_expert" class="form-group col-lg-8" />
                            
                  <div class="control-group">                    
                    <div class="controls form-group">					
                      <input type="text" placeholder="نام ..." class="form-control" id="expert_name" name="expert_name" /> 
                    </div>
                      
                    <div class="controls form-group">					
                      <input type="text" placeholder="فامیلی ..." class="form-control" id="expert_family" name="expert_family" /> 
                    </div>                       
                      
                    <div class="controls form-group">					
                      <input type="text" placeholder="تخصص..." class="form-control" id="expert_skill" name="expert_skill" /> 
                    </div>
                      
                    <div class="controls form-group">		
                        <li class="dropdown">
                           <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font" id="education_select">انتخاب دسته بندی</span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                           <ul class="dropdown-menu" id="education">
                                <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='3'   href='javascript:;' unselectable='on'> دکتری</a></li>                          
                                <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='2'   href='javascript:;' unselectable='on'> فوق لیسانس</a></li>                          
                                <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='1'   href='javascript:;' unselectable='on'> لیسانس</a></li>                          
                           </ul>
                       </li>
                       <br />
                    <div>                                                                   
         
                    <div class="controls form-group">					
                      <input type="text" placeholder="ایمیل ..." class="form-control" id="expert_email" name="expert_email" /> 
                    </div>                                         	
                      
                    <div class="controls form-group">					
                        <div class="fileUpload btn btn-primary">
                            <span>انتخاب تصویر</span>
                            <input type="file" class="upload" />
                        </div>
                        
                        <img src="images/logo.png" />
                    </div>
                      
                    <div class="controls form-group">					
                        <a data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-warning pull-left" type="botton" class="btn_expert_add" id="btn_expert_add" name="btn_expert_add">        افـــزودن        </a>
                    </div>
                  </div>                             	
            </form>                                 			     
          
            </div>
                      
            <!-- /widget-content --> 
          </div>
        </div>
          
          <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> لیست کارشناسان سایت</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">               		
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th> عکس </th>
                            <th> نام و نام خانوادگی </th>
                            <th> تحصیلات </th>
                            <td> تخصص </td>
                            <th> ایمیل </th>					                                                
                            <th class="td-actions" style="width:70px;"> عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="result_list" class="result_list">
                               
                    </tbody>
                </table>

                <ul class="pagination no-margin">                                        
                    <?php 
                        $sql = "SELECT * FROM tbl_expert";
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

<script>
$expert_education = 0;

$("#education li a").click(function() {                    
      $expert_education = (this.id); // id of clicked li by directly accessing DOMElement property
      document.getElementById("education_select").innerHTML = document.getElementById(this.id).innerHTML;
  });
 
function expert_remove(){                                           
    $expert_del_id = this.id;
    $expert_del = "set"; 
     
    $.ajax({
        url: 'Ajax.php',
        type: 'POST',
        data: ({expert_del : $expert_del , expert_id: $expert_del_id}),
        success: function (info) {
                $("#result_msg").html(info),
                $(".a1").click();
                
          }
    });
}; 

$(document).ready(function() {    
    $("#1").addClass("active");
    $page = 1;
    $expert = "set";
    $.ajax({
        url: 'Ajax.php',
        type: 'POST',
        data: ({expert_list_pagination : $expert, page: $page}),
        success: function (info) {
            $("#result_list").html(info);
        }
    });
 });

 $(".a1").click(function(){ 
    $(".a1").removeClass("active");
    $(this).addClass("active");

    $page = this.id;
    $expert = "set";
    $.ajax({
            url: 'Ajax.php',
            type: 'POST',
            data: ({expert_list_pagination : $expert, page: $page}),
            success: function (info) {
            $("#result_list").html(info);

              }

    });
});
  
$("#btn_expert_add").click(function() {
                    
                    $btn_expert_add = "set";     
                     
                    $expert_name =  document.forms["frm_expert"]["expert_name"].value;
                    $expert_family =  document.forms["frm_expert"]["expert_family"].value;                       
                    $expert_skill = document.forms["frm_expert"]["expert_skill"].value;
                    $expert_email = document.forms["frm_expert"]["expert_email"].value;
                    $expert_pic = 'none.jpg';
                    
                    $.ajax({                       
                        url: 'ajax.php',
                        type: 'POST',
                        data: ({btn_expert_add: $btn_expert_add , expert_name: $expert_name ,expert_family : $expert_family ,expert_skill : $expert_skill ,expert_education : $expert_education ,expert_email : $expert_email ,expert_pic : $expert_pic }),
                        success: function(info) {                                  
                            $("#result_msg").html(info),
                            $(".a1").click();                                      
                        }
                    });
                });
</script>

</body>
</html>
