<?php include_once 'init.php'; ?> 
<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> مديريت  مطالب </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap -->
       

        <link href="css/bootstrap.css" rel="stylesheet" media="screen" />
        <link href="css/thin-admin.css" rel="stylesheet" media="screen" />
        <link href="css/font-awesome.css" rel="stylesheet" media="screen" />
        <link href="style/style.css" rel="stylesheet" />
        <link href="style/dashboard.css" rel="stylesheet" />
   
        <link rel="stylesheet" type="text/css" media="all" href="calender_fa/aqua/theme.css" title="Aqua" />	    
        <script type="text/javascript" src="calender_fa/jalali.js"></script>
        <script type="text/javascript" src="calender_fa/calendar.js"></script>
        <script type="text/javascript" src="calender_fa/calendar-setup.js"></script>
        <script type="text/javascript" src="calender_fa/calendar-fa.js"></script>
        
         <script type="text/javascript" src="./asset/AjexFileManager/ajex.js"></script>  
    <script src="asset/ckeditor/ckeditor.js"></script>
 <script src="../js/jquery-1.10.2.min.js"></script>
   <script>
	$(function(){
		//insert record
		$('#insert').click(function(){
			var title = $('#page_title').val();
			var content = $('#content_txt2').val();
			var picture="asasas.jpg";
			var type='1';
			var btn_about_post="aa";

			
			$.post('ajax.php',
			{action: "insert",btn_page_post: btn_about_post, page_title :title , page_text : content , page_pic : picture , page_type : type }
                        
       ,function(res){
				$('#result').html(res);
			});		
		});

		
		
	});
</script>





        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="../../assets/js/html5shiv.js"></script>
              <script src="../../assets/js/respond.min.js"></script>
            <![endif]-->        
       <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>






            
        <div class="wrapper">
            <div class="left-nav">
                <div id="side-nav">

                    <!-- نمایش منو    -->
                  
                </div>
            </div>
            <div class="page-content">
                  <span id="result" class=" btn btn-success btn-lg btn-block  "> </span>              
                <div class="content container">    

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header"> <i class="icon-align-right"></i>
                                    <h3> ارسال مطالب </h3>
                                </div>
                                <div class="widget-content">
                                    <form method="POST" name="frm_content" action="process.php"  >
                                        <fieldset>
                                            <div class="controls form-group">
                                                <label>عنوان</label>

                                                <input type="text" id="page_title" name="page_title" class="form-control parsley-validated" required="">                 
                                                <label>متن</label>
 
                                                <textarea id="content_txt2" name="content_txt2" >
                                                    
                                             </textarea>
                                                <script> 
                                                    var ckeditor1 = CKEDITOR.replace('content_txt2');
                                                    AjexFileManager.init({returnTo: 'content_txt2', editor: ckeditor1});
                                                </script>
   
                                                <label>کلمات کلیدی</label>   
                                                <textarea class="form-control" name="keyword_txt" rows="3" id="keyword_txt"></textarea>
                                                                 
                                                
                                                
                                                
                                                <label>کلمات را با علامت  کاما از یکدیگر جدا کنید</label>   

                                                <br />

                                                <div class="btn-group" >                                                   
                                                    <table class="table table-bordered ">                                                         
                                                        <tr>
                                                            <td>   <label>موضوعات</label>  </td>
                                                            <td>
                                                                <select name="slc_cat" id="slc_cat"  > 
                                                                <option value="خبر"> خبر</option>
                                                                 <option value="مقاله"> مقاله</option>
                                                                 <option value="همایش"> همایش</option>
                                                                 
                                                                </select>
                                                                <input type="hidden" name="atu" id="atu">
                                                            </td>
                                                            
                                                            <td>  <label>شهر </label>  
                                                           
                                                            </td>
                                                            
                                                            <td>
                                                                <label>انتخاب عکس </label>  
                                                                <input type="file" name="userfile">  </td>
                                                        </tr>  
                                                        <tr>
                                                            <td colspan="3"> <label>به صفحه اول پیوست شود؟</label>  
                                                                <input type="checkbox" class="input-group input-group-addon" id="chk_pin"  name="chk_pin" value="1"  />
                                                            </td>
                                                            <td colspan="4"><label>تاریخ انتشار</label>                                                             
                                                              
                                                                <input name="PublishDate" class="form-group regform_inputbox" id="pdate" type="text" />
                                                                <img id="date_btn_1" src="calender_fa/cal.png" style="max-width:100px;" />
                                                             

                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>                                                                                   
                                        </fieldset>
                                        <div class="form-actions ">
                                            <div class=" ">
                                                <input type="button" id="insert" class="btn btn-inverse" value="درج مطلب" />
                                                <button type="button"  id="button" class="btn btn-inverse">انصراف</button>
                                                                                       </div>
                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>             


                </div>
            </div>
        </div>
        <div class="bottom-nav footer"> 2013 &copy; <a href="http://www.linkgroup.ir" >linkGroup</a>  </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="js/smooth-sliding-menu.js"></script> 



    </body>
</html>
