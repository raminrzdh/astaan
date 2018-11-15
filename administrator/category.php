<?php include 'init.php'; ?>
<?php

$security = new security();
$connect = new connect();

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
                            <h2 class="page-title">دسته بندی <small>مدیریت دسته بندی پرونده ها</small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-align-left"></i>
                                    <h3>افزودن دسته بندی </h3>
                                </div>
                                <div class="widget-content">
                                    <form method="post" name="frm_cat_add" class="form-horizontal" />
                                    <fieldset>                  
                                        <div class="control-group">
                                            <div class="controls form-group">
                                                <input type="text" placeholder="نام فارسی دسته بندی..." class="form-control" name="name_fa" id="name_fa" />
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <div class="controls form-group">
                                                <input type="text" placeholder="نام انگلیسی دسته بندی..." class="form-control" name="name_en" id="name_en" />
                                            </div>
                                        </div> 
                                        <div class="form-actions">
                                            <div>
                                                <a data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-warning pull-left" type="botton" class="btn_cat_add" id="btn_cat_add" name="btn_cat_add">        افـــزودن        </a>
                                                <button class="btn btn-default" type="reset">انصراف</button>
                                            </div>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-bookmark"></i>
                                    <h3>لیست دسته بندی ها</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        
                                        <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> نام فارسی  </th>
                                                <th> نام انگلیسی</th>
                                               				
                                                <th class="td-actions" style="width:70px;"> عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="result_list">
                                             

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
        <div class="bottom-nav footer"> <?php administrator_footer(); ?></div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 
        <script>
            $("#btn_cat_add").click(function() {
                    $btn_cat_add = "set";     
                    $name_fa =  document.forms["frm_cat_add"]["name_fa"].value;
                    $name_en =  document.forms["frm_cat_add"]["name_en"].value;                       
                   
                    $.ajax({                       
                        url: 'ajax.php',
                        type: 'POST',
                        data: ({btn_cat_add: $btn_cat_add , name_fa: $name_fa , name_en : $name_en  }),
                        success: function(info) {                                  
                            $("#result_msg").html(info),
                            document.forms["frm_cat_add"]["name_fa"].value = '',
                            document.forms["frm_cat_add"]["name_en"].value = '',
                            $(".a1").click();                                        
                        }
                    });
            });

            $(document).ready(function() {    
                $("#1").addClass("active");
                $page = 1;
                $category  = "set";
                $.ajax({
                    url: 'Ajax.php',
                    type: 'POST',
                    data: ({catetory_list_pagination : $category, page: $page}),
                    success: function (info) {
                        $("#result_list").html(info);
                    }
                });
            });
            
            function cat_remove(){   
                
                $cat_del_id = this.id;
                $cat_del = "set";                 
                $.ajax({
                    url: 'Ajax.php',
                    type: 'POST',
                    data: ({cat_del : $cat_del , cat_id: $cat_del_id}),
                    success: function (info) {
                            $("#result_msg").html(info),
                            $(".a1").click();

                      }
                });
            };
            
            $(".a1").click(function(){ 
                $(".a1").removeClass("active");
                $(this).addClass("active");

                $page = this.id;              
                $category  = "set";
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({catetory_list_pagination : $category, page: $page}),
                        success: function (info) {
                        $("#result_list").html(info);

                          }

                });
            });
            
            
        </script>

    </body>
</html>
