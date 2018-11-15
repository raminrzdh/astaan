<?php
include './administrator/init.php';
$security = new security;
$connect = new connect;

if (!isset($_GET['id'])) {
    $security->Redirect("index");
}
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
        <script type="text/javascript">
            <!--
            function myrate() {
                window.open("my_vote.php?file_id=1", "myWindow",
                        "status = 1, height = 500, width = 350, resizable = 0,location=center")
            }
            function toBottom()
            {

                window.scrollTo(0, document.body.scrollHeight);
            }
//-->
        </script>

        <title>پرونده ها</title>
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
                <img src="img/sidebar_title_top.jpg">
                <ul>
                    <a href="#">صفحه اصلعمومی</a>
                    <a href="#">صفحه اصلعمومی</a>
                    <a href="#">صفحه اصلعمومی</a>
                    <a href="#">صفحه اصلعمومی</a>
                    <a href="#">صفحه اصلعمومی</a>
                </ul>
                <img src="img/sidebar_title_middle.jpg">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>

        </div>


        <div id="container">

            <?php
            $id = $security->Check_Get($_GET['id']);
            $sql = "SELECT * FROM tbl_file WHERE id ='" . $id . "'";

            $result = $connect->query($sql);
            while ($row = mysql_fetch_assoc($result)) {

                $file_id = $row['id'];
                echo" <div  id='item-top'>
                <div class='item-title-page-id'>" . $row['id'] . "</div>
                <div class='item-title-page'>
                    <p> " . $row['title'] . "</p><br>
                         
                         <p>دسته ی :" . category_list($row['category']) . "</p>
                </div>
                <div id='item-content'>                
                    <img src='img/files/" . $row['pic'] . "'>
                    <p> " . $row['text'] . "</p>
                    
                    </div>";
            }

            $id = $security->Check_Get($_GET['id']);
            $sql = "SELECT * FROM tbl_subfile  inner join tbl_expert On tbl_subfile.expert_id=tbl_expert.id  WHERE file_id ='" . $id . "'";
            //    $sql_a="SELECT * FROM tbl_subfile "
            //         . " inner join tbl_expert "
            //           . "On tbl_subfile.expert_id=tbl_expert.id "
            //           . "inner join tbl_comment "
            //            . "on tbl_subfile.id=tbl_comment.subfile  WHERE file_id ='".$id."'";
            $result = $connect->query($sql);
            while ($row = mysql_fetch_assoc($result)) {

                ECHO "<div id='exp_box'>
                     <div id='exp_avatar'>  <img src='img/exp/" . $row['pic'] . "'> <div id='exp_detail'> <h3> " . $row['name'] . " " . $row['family'] . "<br></h3><h2> " . $row['education'] . "</h2></div> <div id='item-rate'> <a><img id='create_button'  onClick='toBottom()'  id='" . $row['id'] . "' src='img/send_comment_icon.png' alt='ارسال نظر '></a>  <a><img id='create_button'  onClick='myrate()'  src='img/rate_icon.png' alt='امتیاز شما به این مطلب'></a></div>    </div>  
                     <div id='exp_head'> <p>  " . $row['text'] . "</div>
                   </div>";
                $s_id = $row['id'];
                //  $sql="SELECT * FROM tbl_subfile  inner join tbl_comment On tbl_subfile.id=tbl_comment.subfile_id  WHERE file_id ='".$id."'";

                $sql_comment = "SELECT * FROM tbl_comment  WHERE  subfile_id='" . $s_id . "' and file_id='" . $file_id . "'";
                $result_comment = $connect->query($sql_comment);
                while ($row_c = mysql_fetch_assoc($result_comment)) {
                    echo"<ul class='comment' >
                            <li class='comment-item'>
                                <div class='comment-badge'>                 
                                    <div class='contrl-pm'> 
                                        <div class='like'>
                                            <img data='2' class='like-btn' src='img/likebtn.png'>
                                            <span class='l_count'></span>
                                        </div>
                                        <div class='clearfix'></div>
                                        <div class='like'>
                                            <img data='2'  class='dislike-btn' src='img/dislikebtn.png'>
                                            <span class='d_count'></span>
                                        </div>
                                    </div>
                                    <div class='comment_avator'> 
                                        <img src='img/comment-none.jpg'  class='img-responsive img-circle' > 
                                    </div>   
                                </div> 
                                <div class='comment-head'>
                                    <h4 class='comment-title'> <i> 93/03/07</i>    " . $row_c['status'] . " </h4>
                                    <p>" . $row_c['text'] . " </p>
                                </div>
                            </li>
                        </ul>";
                }
            }
            ?>

            <form class="commentator-form" >
                <h3>لطفا قبل از ارسال نظر <a href="Rules.php" target="_blank">قوانین</a>  را مطالعه نمایید</h3>
                <div class="comment-avatar"><span class="user">
                        <img width="96" height="96" class="avatar avatar-96 photo avatar-default colorbox-manual" src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96" alt=""> 
                    </span>
                </div>
                <input type="name"  id="c_name" placeholder="نام شما"><input type="Email" id="c_email" placeholder="یمیل شما"> 

                <input type="button" id="send" value="ارسال">
                <div class="comment-area">
                    <textarea class="comment-textarea" placeholder="متن مورد نظر شما" > </textarea>
                </div>
            </form>




        </div>

    </body>

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/mys.js"></script>

    <script src="js/main.js"></script>
    <script>
            $(document).ready(function() {

                //insert record
                $('#send').click(function() {

                    var name = $('#name').val();
                    var email = $('#email').val();
                    var website = $('#website').val();
                    var email = $('#text').val();
                    var id_subfile = $('#text').val();
                    var id_file = $('#text').val();

                    $.post('ajax_root.php',
                            {
                                action_contact: "POST_comment",
                                name: name,
                                email: email,
                                website: website,
                                id_subfile: id_subfile,
                                id_file: id_file,
                                
                            }

                    , function(res) {
                        $('#result').html(res);
                    });
                });
            });
    </script>
</html>
