<?php include 'init.php'; ?>
<?php 
$security = new security();
$connect = new connect();

$sql = "SELECT * FROM tbl_page WHERE type = 1 ";
$result = $connect->query($sql);
$row = mysql_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
<title> مدیریت |  صفحه ها</title>
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

<!-- included JS for cdEditor -->
    <script type="text/javascript" src="./asset/AjexFileManager/ajex.js"></script>  
    <script src="asset/ckeditor/ckeditor.js"></script>
<!-- end of included js for cdEditor-->
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
                 
                  <div id="result2" class="result2">  <span id="result">  </span> </div>
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-default" type="button">          بازگشت        </button>                                                 
                </div>
              </div>
              <!-- /.modal-content --> 
            </div>   <!-- /.modal-dialog --> 
</div>

    
<div style="display: none;" aria-hidden="true" aria-labelledby="messagebox_lable" role="dialog" tabindex="-1" class="modal fade" id="messagebox">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x      </button>
                  <h4 id="myModalLabel" class="modal-title"> پــیام</h4>
                </div>
                <div class="modal-body">                                        
                  <div id="result2" class="result2">  <span id="result">  </span> </div>
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
          <h2 class="page-title">صفحه ها<small>  تغییر متن صفحه درباره ما  </small></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>   درباره ما </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">  					
		<form  name="frm_about"  method="POST" action=""   >       
                <fieldset>
                  <div class="control-group">                    
                    <div class="controls form-group">					
                        <input type="text" placeholder="عنوان صفحه..." class="form-control" name="page_title" id="page_title" value="<?php echo $security->read($row['title']); ?>" /> 
                    </div>					
 
                      <div class="controls form-group">					
			<textarea  class="form-control" id="page_text" name="page_text"><?php echo $row['txt'];  ?></textarea> 
                        <script type="text/javascript">
                            var ckeditor1 = CKEDITOR.replace('page_text');
                            AjexFileManager.init({returnTo: 'page_text', editor: ckeditor1});
                        </script> 
                    </div>	 				 
                    <div class="controls form-group">					                        
                        <i data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-warning pull-left" type="botton" class="btn_about" id="btn_about" name="btn_about">    ثبت تغییرات     </i>
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
<div class="bottom-nav footer">  طراحی توسط گروه نرم افزاری لینک.   &copy;2014</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 



<script type="text/javascript">     
          $(document).ready(function() {
                
                $("#btn_about").click(function() {
                    
                    $btn_about_post = this.id;     
                      
                    $page_title =  document.forms["frm_about"]["page_title"].value;
                    $page_text =  $('#page_text').innerHTML = html = ckeditor1.getData();
                    $page_pic = 'none.jpg';                                        
                    $page_type = 1;
            
                    $.ajax({                       
                        url: 'ajax.php',
                        type: 'POST',
                        data: ({btn_page_post: $btn_about_post , page_title : $page_title , page_text : $page_text , page_pic : $page_pic , page_type : $page_type}),
                        success: function(info) {                                  
                                 $("#result").html(info);                                        
                        }
                    });
                });
            });
</script>

</body>
</html>
