<?php include 'init.php'; ?>
<?php
$security = new security;
$connect = new connect;
 
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
                    <?php administrator_menu(); ?>
                </div>
            </div>
            <div class="page-content">
                <div class="content container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-title">کارشناسی<small>  ثبت نظر کارشناسی برای پرونده ها</small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-bookmark"></i>
                                    <h3> ثبت نظر کارشناسی</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">                					
                                    <div class="controls form-group">					
                                                <li class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle"><span class="current-font" id="expert_selected">انتخاب دسته بندی</span>&nbsp;&nbsp;<i class="icon-caret-down"></i></a>
                                                    <ul class="dropdown-menu" id="expert_list">
                                                        <?php
                                                        $sql = "SELECT * FROM `tbl_expert` ORDER BY `id` DESC";
                                                        $result = $connect->query($sql);
                                                        while ($rows = mysql_fetch_assoc($result)) {
                                                            echo "<li><a href='#' data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='" . $security->read($rows['id']) . "' unselectable='on'> " . $security->read($rows['name']) ." ". $security->read($rows['family']). "</a></li>";
                                                        }
                                                        ?> 
                                                    </ul>
                                                </li>
                                    </div>	 
                                    <form name="frm_expert_comment" method="post" />
                                        <fieldset>
                                            <div class="controls form-group">					
                                                <input type="hidden" name="file_id"  id="file_id" value="<?php echo $security->Check_Get(@$_GET['file_id']); ?>" />
                                                <input type="text" placeholder="عنوان نظر کارشناس..." class="form-control" name="comment_title" id="comment_title" /> 
                                            </div>					
                                            <div class="controls form-group">					                                                
                                                 <textarea  placeholder="عنوان پرونده..." class="form-control" id="comment_text" name="comment_text"> متن نظر...</textarea>                      												
                                                <script type="text/javascript">
                                                    var ckeditor1 = CKEDITOR.replace('comment_text');
                                                    AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});
                                                </script> 
                                            </div>	
                                            <div class="controls form-group">					                                                 
                                                <button data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-warning pull-left" name="btn_exp_comment_add" class="btn_exp_comment_add" id="btn_exp_comment_add" type="button">  ثبت نظر کارشناس </button>                        
                                            </div>
                                            </div>
                                        </fieldset>	
                                    </form>
                                </div>
                                <!-- /widget-content --> 
                            </div>
                        </div>
                    </div>
                </div>
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
                        <button data-dismiss="modal" class="btn btn-default"  id="goback" name="goback" type="button">          بازگشت        </button>                                                 
                    </div>
                </div>
                <!-- /.modal-content --> 
            </div>   <!-- /.modal-dialog --> 
        </div>
        <div class="bottom-nav footer">  طراحی توسط گروه نرم افزاری لینک.   &copy;2014</div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 

        
<script type="text/javascript">     
    
        $("#expert_list li a").click(function() {            
            $exp_id = (this.id); // id of clicked li by directly accessing DOMElement property            
            document.getElementById("expert_selected").innerHTML = document.getElementById(this.id).innerHTML;
        });
        
                 
        $("#goback").click(function(){  
             if ($file_id != 0 && $file_id != '') {
                window.location  = "expert_comment_post.php?id="+$file_id;         
            }else {
                window.location  = "file_list.php";         
            }
                
        });

        $(document).ready(function() {                
                $("#btn_exp_comment_add").click(function() {                   
                    
                    $btn_exp_comment_add = this.id; 
                    $file_id =  document.forms["frm_expert_comment"]["file_id"].value;
                    $comment_title =  document.forms["frm_expert_comment"]["comment_title"].value;
                    $comment_text =  $('#comment_text').innerHTML = html = ckeditor1.getData();
                    
                    $.ajax({                       
                        url: 'ajax.php',
                        type: 'POST',
                        data: ({
                                btn_exp_comment_add: $btn_exp_comment_add ,
                                comment_title : $comment_title , 
                                comment_text : $comment_text , 
                                file_id : $file_id , 
                                exp_id: $exp_id
                                }),
                        success: function(info) {                                  
                                 $("#result_msg").html(info);                                        
                        }
                    });
                });
            });
</script>


    </body>
</html>
