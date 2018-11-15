<?php
include 'init.php';
$security = new security;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ورود كابران</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen" />
        <link href="css/thin-admin.css" rel="stylesheet" media="screen" />
        <link href="css/font-awesome.css" rel="stylesheet" media="screen" />
        <link href="style/style.css" rel="stylesheet" />

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>


    <body>
        <div class="login-logo">
            <a href="../index.php"> <img src="images/logo2.png" width="100" height="94" />  </a>
        </div>          

        <div class="widget">
            <div class="login-content" id="login-content">
                <div class="widget-content" style="padding-bottom:0;">

                    <form name="login-form" method="POST" action="#"  />

                    <div class="form-group no-margin" style="direction: ltr;">
                        <label for="usernames" class="pull-right" >نام كاربري</label>
                        <div class="clearfix" ></div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" name='username' id='username' class="form-control input-lg"  style="direction: ltr;text-align: left;" />
                        </div>
                    </div>

                    <div class="form-group" style="direction: ltr;" >
                        <label for="passwords" class="pull-right" >كلمه ي عبور</label>
                        <div class="clearfix" ></div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-lock"></i>
                            </span>
                            <input type="password" name='password' id="password" class="form-control input-lg"  style="direction: ltr;text-align: left;" />
                        </div>
                    </div>

                    <div class="form-group" style="direction: ltr;" >
                        <label for="captchas" class="pull-right"> <img src="asset/captcha/captcha.php" alt="captcha" />  کــد امنیتی  </label>
                        <div class="clearfix" ></div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-key"></i>
                            </span>
                            <input type="text" name='captcha' id="captcha" class="form-control input-lg"  style="font-family:tahoma ;text-align: left;" />
                        </div>
                    </div>

                    <div class="form-actions" style="direction: rtl;">
                        <i class="btn btn-warning" type="botton" class="btn_login" id="btn_login" name="btn_login">    ورود    </i>
                        <label class="checkbox pull-right">
                            <div class="checker" ><span><input type="checkbox" value="1" name="remember" /></span></div> بادآوري
                        </label>
                        <div class="clearfix" ></div>
                        <div class="forgot"><a href="#" class="forgot" id="show_forgot" >كلمه ي عبور  خود را فراموش كرده ام</a></div>           
                    </div>

                    </form>
                </div>
            </div>


            <div class="login-content" id="forgot-content">
                <div class="widget-content" style="padding-bottom:0;">

                    <form name="forgot-form" method="POST" action="#"  />

                    <div class="form-group no-margin" style="direction: ltr;">
                        <label for="forgot_usernames" class="pull-right" >نام كاربري</label>
                        <div class="clearfix" ></div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" name='forgot_username' id='forgot_username' class="form-control input-lg"  style="direction: ltr;text-align: left;" />
                        </div>
                    </div>

                    <div class="form-group" style="direction: ltr;" >
                        <label for="email" class="pull-right" > آدرس ایمیل </label>
                        <div class="clearfix" ></div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-lock"></i>
                            </span>
                            <input type="Email" name='forgot_email' id="forgot_email" class="form-control input-lg"  style="direction: ltr;text-align: left;" />
                        </div>
                    </div>

                    <div class="form-group" style="direction: ltr;" >
                        <label for="captchas" class="pull-right"> <img src="asset/captcha/captcha.php" alt="captcha" />  کــد امنیتی  </label>
                        <div class="clearfix" ></div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-key"></i>
                            </span>
                            <input type="text" name='forgot_captcha' id="forgot_captcha" class="form-control input-lg"  style="font-family:tahoma ;text-align: left;" />
                        </div>
                    </div>

                    <div class="form-actions" style="direction: rtl;">
                        <i class="btn btn-warning" type="botton" class="btn_login" id="btn_forgot" name="btn_forgot">    ارسال رمز به ایمیل    </i>

                        <div class="clearfix" ></div>
                        <div class="forgot"><a href="#" class="forgot" id="backtologin" > بــازگشـــت </a></div>           
                    </div>

                    </form>
                </div>
            </div>

        </div>
        <div id="result" class="result">  </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        
        <script type="text/javascript">
            $("#forgot-content").hide();
            var check_session;
            var $res;
            $(document).ready(function() {
                
                $("#btn_login").click(function() {
                    //id = this.id; //OR: id = $(this).attr('id');                       
                    $btnlogin = "set";
                    $username = document.forms["login-form"]["username"].value;
                    $password = document.forms["login-form"]["password"].value;
                    $captcha = document.forms["login-form"]["captcha"].value;
                    
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        data: ({btnlogin: $btnlogin, username: $username, password: $password, captcha: $captcha}),
                        success: function(info) {
                            var str = "se=1";
                            $.ajax({
                                url: 'ajax.php',
                                type: 'POST',
                                data: ({str: str}),
                                cache: false,
                                success: function(res) {                                      
                                    if (res == 1) {                                       
                                        $res = 1;                                        
                                    } else {
                                        $res = 0;
                                    }
                                    function CheckForSession() {                                        
                                        if ($res == 1) {                                           
                                            window.location = "index.php";
                                        }
                                        else {
                                            alert($res);
                                            $("#result").fadeIn('fast');
                                            $("#result").html(info);
                                            $("#result").fadeOut(4000);
                                        }
                                    }
                                    CheckForSession();
                                }
                            });
                        }
                    });
                });
                
                $("#btn_forgot").click(function() {
                    //id = this.id; //OR: id = $(this).attr('id');                       
                    $btn_forgot = this.id;

                    $forgot_username = document.forms["forgot-form"]["forgot_username"].value;
                    $forgot_email = document.forms["forgot-form"]["forgot_email"].value;
                    $forgot_captcha = document.forms["forgot-form"]["forgot_captcha"].value;
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        data: ({btn_forgot: $btn_forgot, forgot_username: $forgot_username, forgot_email: $forgot_email, captcha: $forgot_captcha }),
                        success: function(info) {
                            
                                $("#result").fadeIn('fast');
                                $("#result").html(info);
                                $("#result").fadeOut(4000);  
                              
                     
                        }
                    });
                });

                $("#show_forgot").click(function() {
                    $("#login-content").hide().finish($("#forgot-content").fadeIn(1000));
                });
                
                $("#backtologin").click(function() {
                    $("#forgot-content").hide().finish($("#login-content").fadeIn(1000));
                });

            });
        </script>                                
    </body>
</html>
