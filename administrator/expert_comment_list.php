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
               
            </div>
        </div>
                                    
        <div style="display: none;" aria-hidden="true" aria-labelledby="messagebox_lable" role="dialog" tabindex="-1" class="modal fade" id="messagebox">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close"  type="button">x      </button>
                        <h4 id="myModalLabel" class="modal-title"> پــیام</h4>
                    </div>
                    <div class="modal-body">                        

                        <div id="result_msg" class="result_msg">کمی صبر کنید...   </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" id="goback" name="goback" type="button">          بازگشت        </button>                                                 
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
                            <h2 class="page-title"> نظرکارشناسان<small>لیست نظر کارشناسان برای هر پرونده</small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-bookmark"></i>
                                    <h3>لیست نظر کارشناسان</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">                					

                                    <table style="width: 100%;">
                                        <tr>
                                            <td width="10px">
                                                <div class="controls form-group">					
                                                <li class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font" id="file_category">انتخاب دسته بندی</span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                                                    <ul class="dropdown-menu" id="category">
                                                        <?php
                                                        $sql = "SELECT * FROM `tbl_category` ORDER BY `id` DESC";
                                                        $result = $connect->query($sql);
                                                        while ($rows = mysql_fetch_assoc($result)) {
                                                            echo "<li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='" . $security->read($rows['id']) . "' ;  href='javascript:;' unselectable='on'> " . $security->read($rows['name_fa']) . "</a></li>";
                                                        }
                                                        ?> 
                                                    </ul>
                                                </li>
                                            </div>		  
                                            </td>
                                            <td>
                                                 <div class="controls form-group">					
                                                <li class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font" id="file_category">انتخاب  شماره پرونده</span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                                                    <ul class="dropdown-menu"  id="category">
                                                        <?php
                                                        $sql = "SELECT * FROM `tbl_file` ORDER BY `id` DESC LIMIT 0,9 ";
                                                        $result = $connect->query($sql);
                                                        while ($rows = mysql_fetch_assoc($result)) {
                                                            echo "<li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='" . $security->read($rows['id']) . "' ;  href='javascript:;' unselectable='on'> " . $security->read($rows['id'])." )    ".$security->read($rows['title']) . "</a></li>";
                                                        }
                                                        ?> 
                                                    </ul>
                                                </li>
                                            </div>	
                                            </td>
                                            <td class="pull-left">
                                                <div class="controls form-group">					
                                                <input type="text"  placeholder="جستجو براساس شماره پرونده" class="form-control" id="search_input" /> 
                                            </div>
                                                
                                            </td>
                                            
                                        </tr>
                                    </table>  
                                   


                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> موضوع پرونده </th>
                                                <th>  عنوان نظر  </th>
                                                <th> مختصری از متن نظر </th>
                                                <td> تاریخ </td>
                                                <th> وضعیت </th>					
                                                <th class="td-actions" style="width:110px;"> عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="result">
                                             <tr> <td colspan="6">در حال بارگذاری...</td></tr>                                  
                                        </tbody>
                                    </table>                                    

                                    <span id="result_pagination">
                                        <?php 
                                        
                                            $sql = "SELECT * FROM tbl_subfile";    
                                            $query = $connect->query($sql);                                          
                                                $number = ceil((mysql_num_rows($query))/5);
                                                 if ($number > 1) {
                                                     echo '<ul class="pagination no-margin">';   
                                                     echo '<li id="preview" class="disabled"><a href="#">قبلی</a></li>';
                                                        for ($i=1;$i<$number+1;$i++) {
                                                            echo' 
                                                                 <li id="'.$i.'" class="Number"><a>'.$i.'</a></li>';
                                                        }                 
                                                        echo '<li id="next"><a href="#">بعدی</a></li>';
                                                        echo '</ul>';
                                                     }
                                        
                                        ?>
                                    </span>
                                         
                                    
                                    <!-- /shortcuts --> 
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
            
            $(document).ready(function() {
                $("#1").addClass("active");
                $page = 1;
                $(this).addClass("active");
                $cat = "2";
                $file_id = 1;
                $page = this.id;
                $exp_comment_list_pagination = "set";
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({exp_comment_list_search: $exp_comment_list_pagination, page: $page ,category: $cat , file_id: $file_id}),
                        success: function (info) {
                                 $("#result").html(info);
                          }
                });
                
           });
             
            $(".Number").click(function(){               
                $(".Number").removeClass("active");
                $(this).addClass("active");
                $cat = "2";
                $file_id = 1;
                $page = this.id;
                $exp_comment_list_pagination = "set";
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({exp_comment_list_pagination : $exp_comment_list_pagination, page: $page ,category: $cat , file_id: $file_id}),
                        success: function (info) {
                                 $("#result").html(info);                              
                          }
                });
            });
                    
            function exp_comment_remove(id){                                           
                $id = id;
                $exp_comment_remove = "ok";                
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({exp_comment_remove : $exp_comment_remove , comment_id: $id}),
                        success: function (info) {
                                $("#result_msg").html(info);
                          }
                });
            };
            
            $("#goback").click(function(){  
                $(".Number").removeClass("active");    
                $("#1").addClass("active");
                $page = 1;                
                $cat = "2";
                $file_id = 1;
                $page = 1;
                $exp_comment_list_pagination = "set";
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({exp_comment_list_search: $exp_comment_list_pagination, page: $page ,category: $cat , file_id: $file_id}),
                        success: function (info) {
                                 $("#result").html(info);                                  
                          }
                });
               
            });
            
            function exp_comment_edit(){             
                $expert_add = "expert_comment_post.php?file_id="+this.id;                
                window.location = "expert_comment_post.php?file_id="+this.id; 
            };
               
            $("#search_input").keyup(function(event){                 
                    if(event.keyCode == 13){                        
                        $(".Number").removeClass("active");
                        $("#1").addClass("active");
                        $cat = "2";
                        $file_id = 1;
                        $page = this.id;
                        $search_file_id = $("#search_input").val();
                        $exp_comment_list_search = "set";
                        $.ajax({
                                url: 'Ajax.php',
                                type: 'POST',
                                data: ({exp_comment_list_search: $exp_comment_list_search ,search_file_id:$search_file_id }),
                                success: function (info) {
                                        $("#result").html(info);
                                        

                                  }

                        });                    
                }   
                });
        
        </script>
    </body>
</html>
