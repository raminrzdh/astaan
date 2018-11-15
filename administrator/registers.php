<?php include 'init.php'; ?>
<?php
$security = new security();
$connect = new connect();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> مدیریت | عضویت ها  </title>
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
                            <h2 class="page-title">کاربران <small>مدیریت  عضویت های سایت</small></h2>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-list-ol"></i>
                                    <h3>Varius content</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="body">

                                        <legend>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="controls form-group">					
                                                            <li class="dropdown">
                                                                <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle">                                  
                                                                    <span class="current-font" id="filter_selected"> هــمــــه </span>
                                                                    <i class="icon-caret-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" id="filter_list">
                                                                    <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on" id="2">همه</a></li>
                                                                    <li><a data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on" id="1">تأیید شده ها</a></li>
                                                                    <li><a data-wysihtml5-command-value="span" data-wysihtml5-command="formatInline" href="javascript:;" unselectable="on" id="0">تأیید نشده ها</a></li>
                                                                </ul>
                                                            </li>
                                                        </div>	  
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </table>
                                        </legend> 

                                        <table class="table table-striped table-images">
                                            <thead>
                                                <tr>
                                                    <th class="hidden-xs-portrait">#</th>
                                                    <th>تصویر</th>
                                                    <th>نام و نام خانوادگی</th>
                                                    <th class="hidden-xs">ایمیل</th>
                                                    <th class="hidden-xs">موبایل</th>
                                                    <th class="hidden-xs">تلفن</th>
                                                    <th>استان</th>
                                                    <th class="hidden-xs">نام کاربری</th>
                                                    <th class="hidden-xs">تاریخ تولد</th>
                                                    <th class="hidden-xs-portrait">تاریخ عضویت</th>

                                                </tr>
                                            </thead>
                                            <tbody id ="result_list">

                                                
                                                


                                            </tbody>
                                        </table>

                                        <ul class="pagination no-margin">                                        
                                            <?php
                                            $sql = "SELECT * FROM tbl_register";
                                            $query = $connect->query($sql);
                                            $number = ceil((mysql_num_rows($query)) / 5);
                                            echo '<li id="preview" class="disabled"><a href="#">قبلی</a></li>';

                                            for ($i = 1; $i < $number + 1; $i++) {
                                                echo' 
                                                        <li id="' . $i . '" class="a1" href="#"><a>' . $i . '</a></li>                                                         
                                                     ';
                                            }
                                            echo '<li id="next"><a href="#">بعدی</a></li>';
                                            ?>      
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
        var $filter_type = 2 ;
        $("#filter_list li a").click(function() {                    
                $filter_type = this.id;      
                document.getElementById("filter_selected").innerHTML = document.getElementById(this.id).innerHTML;

                $("#1").addClass("active");
                $page = 1;
                $registers = "set";
                $.ajax({
                    url: 'Ajax.php',
                    type: 'POST',
                    data: ({register_list_pagination: $registers, page: $page, filter_type:$filter_type}),
                    success: function(info) {
                        $("#result_list").html(info);
                    }
                });
        });

        $(".a1").click(function() {         
            $(".a1").removeClass("active");
            $(this).addClass("active");

            $page = this.id;
            $registers = "set";
            $.ajax({
                url: 'Ajax.php',
                type: 'POST',
                data: ({register_list_pagination: $registers, page: $page}),
                success: function(info) {
                    $("#result_list").html(info);

                }

            });
        });

        $(document).ready(function() {
            $("#1").addClass("active");
            $page = 1;
            $registers = "set";
            $filter_type = "2";
            $.ajax({
                url: 'Ajax.php',
                type: 'POST',
                data: ({register_list_pagination: $registers, page: $page ,filter_type : $filter_type}),
                success: function(info) {
                    $("#result_list").html(info);
                }
            });
        });
 
        function register_remove(){  
            $register_del_id = this.id;
            $register_del = "set"; 
            $filter_type = "2";      
            $.ajax({
                url: 'Ajax.php',
                type: 'POST',
                data: ({register_del : $register_del , register_id: $register_del_id ,filter_type: $filter_type}),
                success: function (info) {
                        $("#result_msg").html(info),
                        $(".a1").click();

                  }
            });
        };

        function accept_register(){  
            $accept_id = this.id;
            $accept_register = "set"; 
            $filter_type = "2";      
            $.ajax({
                url: 'Ajax.php',
                type: 'POST',
                data: ({accept_register : $accept_register , accept_id: $accept_id,filter_type: $filter_type}),
                success: function (info) {
                        $("#result_msg").html(info),
                        $(".a1").click();

                  }
            });
        };

    </script>

</body>
</html>
