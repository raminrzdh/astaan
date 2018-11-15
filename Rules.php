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


        <title>قوانین  </title>
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
$sql = "SELECT * FROM tbl_Links WHERE status=1";
$result = $connect->query($sql);
while ($rows_link = mysql_fetch_assoc($result)) {

    echo"<li><a href=links.php?id=" . $rows_link['id'] . "> " . $rows_link['title'] . "</a></li>";
};
?>
                </ul>
            </div>

        </div>


        <div id="container">

            <?php
            $sql = "SELECT * FROM tbl_page WHERE type =3";
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



        </div>

    </body>

    <script src="js/main.js"></script>
</html>
