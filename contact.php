<?php
include './administrator/init.php';
$security = new security;
$connect = new connect;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <meta name="author" content="Astaan - Vituarl Network">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <link rel="stylesheet" type="text/css" href="style/reset.css"/>
        <script src="js/jquery-1.9.1.min.js"></script>

        <title>تماس با ما  </title>
    </head>
    <body>
        <nav id="mobile-nav">

            <a href="#">صفحه اصلی</a>
            <a href="#">درباره ما</a>
            <a href="#">نقشه سایت</a>
        </nav>
        <div id="main">
            <nav id="desktop-nav">
                <a href="#" id="nav-toggle"></a>
                <a href="#"> شبکه مجازی آستان</a>
                <a href="#">درباره ما</a>
                <a href="#">تماس با ما</a>
                <a href="#">آرشیو پرونده ها</a>
                <a href="#">نقشه سایت</a>
            </nav>
        </div>

        <div id="sidebar">
            <div id="sidebar_top_title">

                <img src="img/sidebar_title_middle.jpg">
                <ul>
                            <?php
                            $sql_link = "SELECT * FROM tbl_Links WHERE status=1";
                            $result_link = $connect->query($sql_link);
                            while ($rows_link = mysql_fetch_assoc($result_link)) {

                           echo"<li><a href=links.php?id=" . $rows_link['id'] . "> " . $rows_link['title'] . "</a></li>";
                            }
                            ?>
                </ul>
            </div>

        </div>


        <div id="container">

            <?php
            $sql = "SELECT * FROM tbl_page WHERE type =2";
            $result = $connect->query($sql);
            $row = mysql_fetch_assoc($result);


            echo" <div id='item-top'>
              
                    <div class='links-title-page'>
                    <p> " . $row['title'] . "</p><br>
                       
                </div>
                <div id='item-content'>                
                 
                    <p> " . $row['txt'] . "</p>
                    
                    </div>";
            ?>
           
<div id="result" ></div>
        <div style="margin-right:30%; margin-top: 20px;  ">
         
            <form>
		<p class="name">
                  
			<input type="text" name="name" id="name" placeholder="نام و نام خانوداگی " />
			
		</p>
		
		<p class="email">
                   
			<input type="text" name="email" id="email" placeholder="ایمیل شما" />
                        <input type="hidden"  name="date" id="date" value="<?php echo $today; ?>" />
			
		</p>
		
	
		<p class="text">
			<textarea name="text" id="txt" placeholder="متن شما" /></textarea>
		</p>
		<p class="text">
                       <img src="administrator/asset/captcha/captcha.php" alt="captcha" /> <br>
                     <input type="text" name='forgot_captcha' id="captcha" class="form-control input-lg"    placeholder="کــد امنیتی" />
		</p>
		<p class="submit">
                    <input type="button" value="ارسال"  id="send"/>
                
		</p>
	</form>
        </div>

        



        </div>

    </body>


    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() { 
       
            //insert record
            $('#send').click(function() {
              
                var name = $('#name').val();
                var txt = $('#txt').val();
                var date =$('#date').val();
                var email = $('#email').val();
                var captcha=$('#captcha').val();
                var ok="ok";
                $.post('ajax_root.php',
                        {
                            action_contact: "POST_contact",
                            name: name,
                            email: email,
                            txt: txt,
                            date: date,
                            ok:ok,
                            captcha:captcha
                        }

                , function(res) {
                    $('#result').html(res);
                });
            });
        });
        </script>
</html>
