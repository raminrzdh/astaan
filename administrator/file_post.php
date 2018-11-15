<?php
include 'init.php';
include 'asset/crop_upload/image_functions.php';
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

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <!-- included JS for cdEditor -->
        <script type="text/javascript" src="./asset/AjexFileManager/ajex.js"></script>  
        <script src="asset/ckeditor/ckeditor.js"></script>        
    <!-- end of included js for cdEditor-->
    

     
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

                        <div id="result2" class="result2">کمی صبر کنید...درحال درج  </div>
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
                            <h2 class="page-title"> پرونده ها<small>مدیریت پرونده ها</small></h2>
                        </div>
                    </div>       
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-bookmark"></i>
                                    <h3>لیست پرونده ها   </h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">                           
                                    <form  name="frm_file_post"  method="POST" action="#" enctype="multipart/form-data"  >               
                                        <legend class="section">اطلاعات پرونده : </legend>
                                        <div class="control-group">                    
                                            <div class="controls form-group">					
                                                <input type="text" placeholder="عنوان پرونده..." class="form-control" id="file_title" /> 
                                                <input type="hidden" name="picname" id="picname" value="<?php echo $thumb_image_name ?>" />
                                            </div>					

                                            <div class="controls form-group">					
                                                <textarea  placeholder="عنوان پرونده..." class="form-control" id="file_text" name="file_text"> متن پرونده...</textarea>                      												
                                                <script type="text/javascript">
                                                    var ckeditor1 = CKEDITOR.replace('file_text');
                                                    AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});
                                                </script>                                                                                                            
                                            </div>	


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
                                            
                                            <div id="upload_status"></div>

                                            <div class="controls form-group">					
                                                <div class="fileUpload btn btn-primary">
                                                    <span> <p><a id="upload_link"  href="#">انتخاب تصویر </a></p></span>                                                    
                                                </div>
                                            </div>

                                            <span id="loader" style="display:none;">
                                                <img src="loader.gif" alt="Loading..."/>
                                            </span> 
                                            <span id="progress"></span>
                                            <br />

                                            <div id="uploaded_image" style="float: right;">     </div>                                                 
                                            <div class="clearfix"></div>

                                            <div id="thumbnail_form" style="display:none;">
                                                <form name="form" action="" method="post">
                                                    <input type="hidden" name="x1" value="" id="x1" />
                                                    <input type="hidden" name="y1" value="" id="y1" />
                                                    <input type="hidden" name="x2" value="" id="x2" />
                                                    <input type="hidden" name="y2" value="" id="y2" />
                                                    <input type="hidden" name="w" value="" id="w" />
                                                    <input type="hidden" name="h" value="" id="h" />
                                                    <br />
                                                    <input type="submit" name="save_thumb" class="btn btn-default" value="    تأیید     " id="save_thumb" />
                                                </form>
                                            </div>
 
                                         

                                            <div class="controls form-group">					                        
                                                <button data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-warning pull-left" name="btn_file_post" class="btn_file_post" id="btn_file_post" type="button">  افزودن پرونده جدید </button>                        
                                            </div>
                                        </div>                             	
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
        <script src="js/smooth-sliding-menu.js"></script> 

        <script type="text/javascript" src="asset/crop_upload/js/jquery-pack.js"></script>            
        <script type="text/javascript" src="asset/crop_upload/js/jquery.imgareaselect.min.js"></script>
        <script type="text/javascript" src="asset/crop_upload/js/jquery.ocupload-packed.js"></script>

    
<script>

        $("#category li a").click(function() {
            $cat = (this.id); // id of clicked li by directly accessing DOMElement property
            document.getElementById("file_category").innerHTML = document.getElementById(this.id).innerHTML;
        });
        
        $(function() {
                //insert record
                $('#btn_file_post').click(function() {
                    var title = $('#file_title').val();
                    //var content = $('#file_text').val();
                    var content = $('#file_text').innerHTML = html = ckeditor1.getData();
                    var picture = $('#picname').val();;
                    var btn_file_post = "a";
                    //syntax - $.post('filename', {data}, function(response){});
                    $.post('ajax.php',
                            {                                
                                action: "POST",
                                file_title: title,
                                file_text: content,
                                file_pic: picture,
                                file_category: $cat,
                                btn_file_post: btn_file_post
                            }
                    , function(res) {                        
                        $('#result2').html(res);
                        
                    });
                });
            });
 
            //create a preview of the selection
            function preview(img, selection) { 
                    //get width and height of the uploaded image.
                    var current_width = $('#uploaded_image').find('#thumbnail').width();
                    var current_height = $('#uploaded_image').find('#thumbnail').height();

                    var scaleX = <?php echo $thumb_width;?> / selection.width; 
                    var scaleY = <?php echo $thumb_height;?> / selection.height; 

                    $('#uploaded_image').find('#thumbnail_preview').css({ 
                            width: Math.round(scaleX * current_width) + 'px', 
                            height: Math.round(scaleY * current_height) + 'px',
                            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
                            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
                    });
                    $('#x1').val(selection.x1);
                    $('#y1').val(selection.y1);
                    $('#x2').val(selection.x2);
                    $('#y2').val(selection.y2);
                    $('#w').val(selection.width);
                    $('#h').val(selection.height);
            } 

            //show and hide the loading message
            function loadingmessage(msg, show_hide){
                    if(show_hide=="show"){
                            $('#loader').show();
                            $('#progress').show().text(msg);
                            $('#uploaded_image').html('');
                    }else if(show_hide=="hide"){
                            $('#loader').hide();
                            $('#progress').text('').hide();
                    }else{
                            $('#loader').hide();
                            $('#progress').text('').hide();
                            $('#uploaded_image').html('');
                    }
            }

            //delete the image when the delete link is clicked.
            function deleteimage(large_image, thumbnail_image){
                    loadingmessage('براي حذف تصوير بزرگ چند لحظه منتظر بمانيد...', 'show');
                    $.ajax({
                            type: 'POST',
                            url: '<?=$image_handling_file?>',
                            data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
                            cache: false,
                            success: function(response){
                                    loadingmessage('', 'hide');
                                    response = unescape(response);
                                    var response = response.split("|");
                                    var responseType = response[0];
                                    var responseMsg = response[1];
                                    if(responseType=="success"){
                                         //   $('#upload_status').show().html('<h1>Success</h1><p>'+responseMsg+'</p>');
                                            $('#uploaded_image').html('');
                                    }else{
                                            $('#upload_status').show().html('<h1> خطای ناشناخته </h1><p>لطفا دوباره تلاش فرمایید</p>'+response);
                                    }
                            }
                    });
            }

            $(document).ready(function () {
            
                            $('#loader').hide();
                            $('#progress').hide();
                            var myUpload = $('#upload_link').upload({
                               name: 'image',
                               action: '<?=$image_handling_file?>',
                               enctype: 'multipart/form-data',
                               params: {upload:'Upload'},
                               autoSubmit: true,
                               onSubmit: function() {
                                            $('#upload_status').html('').hide();
                                            loadingmessage('درحال بارگذاری تصویر. لطفا چند لحظه صبر نمایید...', 'show');
                               },
                               onComplete: function(response) {
                                            loadingmessage('', 'hide');
                                            response = unescape(response);
                                            var response = response.split("|");
                                            var responseType = response[0];
                                            var responseMsg = response[1];
                                            if(responseType=="success"){                                                   
                                                    $('#upload_status').show().html('<h1>انجام شد</h1><p>تصویر مورد نظر انتخاب شد</p>');                                                    
                                                    //put the image in the appropriate div
                                                    $('#uploaded_image').html('<img src="'+responseMsg+'" style="float: right; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />'),                                                   
                                                    //find the image inserted above, and allow it to be cropped
                                                       
                                                    $('#uploaded_image').find('#thumbnail').imgAreaSelect({ onSelectChange: preview }); 
                                                    
                                                    
                                                    //display the hidden form
                                                    $('#thumbnail_form').show();
                                            }else if(responseType=="error"){
                                                   // $('#upload_status').show().html('<h1>خطا</h1><p>'+responseMsg+'</p>');
                                                    $('#uploaded_image').html('');
                                                    $('#thumbnail_form').hide();
                                            }else{
                                                   // $('#upload_status').show().html('<h1>خطای ناشناخته</h1><p>  لطفا دوباره تلاش فرمایید</p>'+response);
                                                    $('#uploaded_image').html('');
                                                    $('#thumbnail_form').hide();
                                            }
                               }
                            });

                    //create the thumbnail
                    $('#save_thumb').click(function() {
                            var x1 = $('#x1').val();
                            var y1 = $('#y1').val();
                            var x2 = $('#x2').val();
                            var y2 = $('#y2').val();
                            var w = $('#w').val();
                            var h = $('#h').val();
                            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                                    alert("شما ابتدا بايد يک تصوير انتخاب نماييد");
                                    return false;
                            }else{
                                    //hide the selection and disable the imgareaselect plugin
                                    $('#uploaded_image').find('#thumbnail').imgAreaSelect({ disable: false, hide: true }); 
                                    loadingmessage('Please wait, saving thumbnail....', 'show');
                                    $.ajax({
                                            type: 'POST',
                                            url: '<?=$image_handling_file?>',
                                            data: 'save_thumb=Save Thumbnail&x1='+x1+'&y1='+y1+'&x2='+x2+'&y2='+y2+'&w='+w+'&h='+h,
                                            cache: false,
                                            success: function(response){
                                                    loadingmessage('', 'hide');
                                                    response = unescape(response);
                                                    var response = response.split("|");
                                                    var responseType = response[0];
                                                    var responseLargeImage = response[1];
                                                    var responseThumbImage = response[2];
                                                    if(responseType=="success"){
                                                            //$('#upload_status').show().html('<h1>Success</h1><p>The thumbnail has been saved!</p>');
                                                            //load the new images
                                                            $('#uploaded_image').html('<img src="'+responseThumbImage+'" alt="Thumbnail Image"/>');
                                                            //hide the thumbnail form
                                                            $('#thumbnail_form').hide();
                                                    }else{
                                                            //$('#upload_status').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
                                                            //reactivate the imgareaselect plugin to allow another attempt.
                                                            $('#uploaded_image').find('#thumbnail').imgAreaSelect({  onSelectChange: preview }); 
                                                            $('#thumbnail_form').show();
                                                    }
                                            }
                                    });
                                        
                                    return false;
                            }
                    });
            }); 


 
</script>
 
    </body>
</html>
