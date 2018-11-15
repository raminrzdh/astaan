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
    <script type="text/javascript" src="./asset/AjexFileManager/ajex.js"></script>  
    <script src="asset/ckeditor/ckeditor.js"></script>
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

                <div id="result_msg" class="result_msg">کمی صبر کنید...   </div>
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
          <h2 class="page-title"> لینکــها<small> مدیریت لینکهای داغ  </small></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3> اطلاعات لینک جدید</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                 <div class="col-lg-12">
                <form method="post" name='frm_link_add'  />
                <fieldset>                  
                  <div class="control-group">                    
                    <div class="controls form-group">					
                      <input type="text" placeholder="عنوان ..." class="form-control" id="link_title" /> 
                    </div>
                      
                    <div class="controls form-group">					
                      <input type="text" placeholder="متن ..." class="form-control" id="link_text" /> 
                        <script type="text/javascript">
                            var ckeditor1 = CKEDITOR.replace('link_text');
                            AjexFileManager.init({returnTo: 'link_text', editor: ckeditor1});
                        </script> 
                                                
                    </div>
                    
                    <div class="controls form-group">					
                       <img src="images/user.jpg" width="60" height="75" /> 
                        <div class="fileUpload btn btn-primary">
                            <span>   انتخاب تصویر شاخص   </span>
                            <input type="file" class="upload" />
                        </div>                                             
                    </div>
                      
                    </div>  
                 
                
                          
                    <div class="form-actions" >
                        <div>
                            <a data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-warning pull-left" type="botton" class="btn_link_add" id="btn_link_add" name="btn_link_add">        افـــزودن        </a>
                            
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
                            <th> ردیف </th>
                            <th>عکس  </th>
                            <th> عنوان   </th>                                                                                                            
                            <th> بخشی از متن  </th>                                            
                            <th> تاریخ  </th> 
                           
                            <th class="td-actions" style="width:70px;"> عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="result_list" class="result_list">                                                

                    </tbody>
                </table>
                
                <ul class="pagination no-margin">                                        
                    <?php 
                        $sql = "SELECT * FROM tbl_links";
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

        $(document).ready(function() {    
            $("#1").addClass("active");
            $page = 1;
            $link = "set";
            $.ajax({
                url: 'Ajax.php',
                type: 'POST',
                data: ({link_list_pagination : $link, page: $page}),
                success: function (info) {
                    $("#result_list").html(info);
                }
            });
         });

         $(".a1").click(function(){ 
            $(".a1").removeClass("active");
            $(this).addClass("active");

            $page = this.id;
            $link = "set";
            $.ajax({
                    url: 'Ajax.php',
                    type: 'POST',
                    data: ({link_list_pagination : $link, page: $page}),
                    success: function (info) {
                    $("#result_list").html(info);

                      }

            });
        });
 
 
        function link_remove(){  
            $link_del_id = this.id;
            $link_del = "set"; 
          
            $.ajax({
                url: 'Ajax.php',
                type: 'POST',
                data: ({link_del : $link_del , link_del_id: $link_del_id }),
                success: function (info) {
                        $("#result_msg").html(info),
                        $(".a1").click();

                  }
            });
        };

        function accept_link(){  
            $accept_id = this.id;
            $accept_link = "set"; 
           
            $.ajax({
                url: 'Ajax.php',
                type: 'POST',
                data: ({accept_link : $accept_link , accept_id: $accept_id}),
                success: function (info) {
                        $("#result_msg").html(info),
                        $(".a1").click();

                  }
            });
        };



        $("#btn_link_add").click(function() {
                $btn_link_add = "set";     

                $link_title = document.forms["frm_link_add"]["link_title"].value;
                $link_text =  $('#link_text').innerHTML = html = ckeditor1.getData();			
                $user_pic = 'none.jpg';
                $status = 0;                
                
                
                $.ajax({                       
                    url: 'ajax.php',
                    type: 'POST',
                    data: ({btn_link_add: $btn_link_add , link_title: $link_title ,link_text : $link_text , user_pic : $user_pic ,  status : $status}),
                    success: function(info) {                                  
                        $("#result_msg").html(info),
                        $(".a1").click();                                        
                    }
                });
        });
 
</script>    
</body>
</html>
