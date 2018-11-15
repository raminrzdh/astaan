<?php include 'init.php'; ?>
<?php
$security = new security();
$connect = new connect();


?>



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
<!--                                                <td>
                                                    <div class="controls form-group">					
                                                        <li class="dropdown">


                                                            <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font" id="category_selected">انتخاب دسته بندی</span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                                                            <ul class="dropdown-menu" id="category_list">

                                                                //<?php
//                                                                $sql = "SELECT * FROM `tbl_category` ORDER BY `id` DESC";
//                                                                $result = $connect->query($sql);
//                                                                while ($rows = mysql_fetch_assoc($result)) {
//                                                                    echo "<li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='" . $security->read($rows['id']) . "' ;  href='javascript:;' unselectable='on'> " . $security->read($rows['name_fa']) . "</a></li>";
//                                                                }
//                                                                ?> 

                                                            </ul>
                                                        </li>
                                                    </div>	
                                                </td>-->
                                                <td>
                                                    <div class="controls form-group">					
                                                        <li class="dropdown">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-default btn-small dropdown-toggle">                                                            
                                                                <input type="text" class="current-font" id="file_selected" /> 
                                                                <i class="icon-caret-down"></i>                                                        
                                                            </a>
                                                            <ul class="dropdown-menu" id="file_list" >
                                                                <li style="background: #999;" >  پرونده های آخـر  </li>                                                                
                                                                <?php
                                                                $sql = "SELECT * FROM `tbl_file` ORDER BY `id` DESC LIMIT 0,9";
                                                                $result = $connect->query($sql);
                                                                while ($rows = mysql_fetch_assoc($result)) {
                                                                    echo "<li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='" . $security->read($rows['id']) . "' ; href='javascript:;'  unselectable='on'> " . $security->read($rows['id']) . " )" . $security->read($rows['title']) . "</a></li>";
                                                                }
                                                                ?> 

                                                            </ul>
                                                        </li>
                                                    </div>	
                                                </td>
                                               
                                                <td>
                                                    <div class="controls form-group">					
                                                        <li class="dropdown">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font" id="status_selected">نوع نظرات  </span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                                                            <ul class="dropdown-menu" id="status_list">
                                                                 <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock' href='javascript:;' id='all'>  هـمــــه</a></li>
                                                                 <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock' href='javascript:;' id='1'>تأیید شده ها</a></li>
                                                                 <li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock' href='javascript:;' id='0'>تأیید نشده ها</a></li>
                                                                 
                                                            </ul>
                                                        </li>
                                                    </div>
                                                </td>
                                                <td>
                                                        <a  class="btn btn-warning pull-left" type="botton" class="btn_show" id="btn_show" name="btn_show">        نمــایش        </a>

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
                                        <tbody id='result'>
                                             


                                        </tbody>
                                    </table>

                                    <ul class="pagination no-margin">
                                        
                                        <?php 
                                            $sql = "SELECT * FROM tbl_comment";
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



                </div>
            </div>
        </div>
        <div class="bottom-nav footer">  <?php administrator_footer(); ?></div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <!--<script type="text/javascript" src="js/smooth-sliding-menu.js"></script> -->

        <script>
            $cat_seletced = $status = $file_selected = '';
 
            $("#category_list li a").click(function() {
                $cat_seletced = this.id;
                document.getElementById("category_selected").innerHTML = document.getElementById(this.id).innerHTML;
                $cat_list_select = 'set';
                $.ajax({                       
                    url: 'ajax.php',
                    type: 'POST',
                    data: ({cat_list_select:$cat_list_select , cat_seletced : $cat_seletced}),                    
                    success: function(info) {                                  
                        $("#file_list").html(info),
                        $(".a1").click();                                      
                    }
                });
                
                
                
            });

            $("#file_selected").change(function() {
                alert(document.getElementById("file_selected").value);
                $file_selected = document.getElementById("file_selected").val();  
            });
            
            $("#file_list li a").click(function() {
                $file_selected = this.id;
                var elem = document.getElementById("file_selected");
                elem.value = $file_selected;
            });
 
            $("#status_list li a").click(function() {
                $status = this.id;                
                document.getElementById("status_selected").innerHTML = document.getElementById(this.id).innerHTML;
            });

            $("#btn_show").click(function() {
                $comment = 'filter';
                $.ajax({                       
                    url: 'ajax.php',
                    type: 'POST',
                    data: ({comment_list_pagination: $comment ,cat_select:$cat_seletced ,status: $status ,file_select: $file_selected  }),
                    success: function(info) {                                  
                        $("#result").html(info),
                        $(".a1").click();                                      
                    }
                });
               
           });
           
            $(document).ready(function() {    
                $("#1").addClass("active");
                $page = 1;
                $comment = "ready";
                $.ajax({
                    url: 'Ajax.php',
                    type: 'POST',
                    data: ({comment_list_pagination : $comment, page: $page}),
                    success: function (info) {
                        $("#result_list").html(info);
                    }
                });
             });

             $(".a1").click(function(){ 
                $(".a1").removeClass("active");
                $(this).addClass("active");

                $page = this.id;
                $comment = "number";
                $.ajax({
                        url: 'Ajax.php',
                        type: 'POST',
                        data: ({comment_list_pagination : $comment, page: $page}),
                        success: function (info) {
                        $("#result_list").html(info);

                          }

                });
            });


        </script>

    </body>
</html>
