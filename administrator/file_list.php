<?php include 'init.php'; ?>
<?php
$security = new security();
$connect = new connect();
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title> مدیریت | پرونده ها</title>
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
                            <h2 class="page-title"> پرونده ها<small>مدیریت پرونده ها</small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-bookmark"></i>
                                    <h3>لیست پرونده ها</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">                					

                                    <span class="btn btn-warning pull-right" type="button" name="btn_file_post" id="btn_file_post" > افزودن پرونده جدید</span>

                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> موضوع پرونده </th>
                                                <th> مختصری از متن پرونده </th>
                                                <th> دسته </th>
                                                <td> تاریخ </td>
                                                <th> وضعیت </th>					
                                                <th class="td-actions" style="width:110px;"> عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="result">                 
            
                                                
                                        </tbody>
                                    </table>
                                    <ul class="pagination no-margin">
                                        
                                        <?php 
                                            $sql = "SELECT * FROM tbl_file";
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
                                    <!-- /shortcuts --> 
                                </div>
                                <!-- /widget-content --> 
                            </div>
                        </div>

                    </div>


                <a class="btn btn-small btn-icon-only userman" href="javascript:alert(aaa);"><i class="btn-icon-only icon-user"> </i></a>
                </div>
            </div>
        </div>
        <div class="bottom-nav footer">  طراحی توسط گروه نرم افزاری لینک.   &copy;2014</div>
        <div style="display: none;" aria-hidden="true" aria-labelledby="messagebox_lable" role="dialog" tabindex="-1" class="modal fade" id="messagebox">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x      </button>
                  <h4 id="myModalLabel" class="modal-title"> پــیام</h4>
                </div>
                <div class="modal-body">                        
                 
                  <div id="result_msg" class="result_msg">    tyu  </div>
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-default" id="goback" name="goback" type="button">          بازگشت        </button>                                                 
                </div>
              </div>
              <!-- /.modal-content --> 
            </div>   <!-- /.modal-dialog --> 
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <!--<script type="text/javascript" src="js/smooth-sliding-menu.js"></script> -->
        <script> 
           
           
           
            $("#btn_file_post").click(function(){               
                window.location  = "file_post.php";
            });
 
           $(document).ready(function() {
                $("#1").addClass("active");
                $page = 1;
                $file = "a";
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({file_list_pagination : $file, page: $page}),
                        success: function (info) {
                                 $("#result").html(info);
                          }
                });
                
           });
           
           $(".a1").click(function(){ 
                $(".a1").removeClass("active");
                $(this).addClass("active");
                
                $page = this.id;
                $file = "a";
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({file_list_pagination : $file, page: $page}),
                        success: function (info) {
                                 $("#result").html(info);
                              
                          }
                        
                });
            });   
            
            function experts_add(){             
                 
                $expert_add = "expert_comment_post.php?file_id="+this.id;                
                window.location = "expert_comment_post.php?file_id="+this.id; 
            };
            
              function file_remove(){                                           
                $id = this.id;
                $file_remove_ok = "ok"; 
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({file_remove : $file_remove_ok , file_id: $id}),
                        success: function (info) {
                                $("#result_msg").html(info),
                                window.location = 'file_list.php';
                               
                          }
                        
                });
                
            };
              function file_edit(){             
                $expert_add = "expert_comment_post.php?file_id="+this.id;                
                window.location = "expert_comment_post.php?file_id="+this.id; 
            };
             
                                                       
        </script>
    </body>
</html>
