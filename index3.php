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
        <link rel="stylesheet" type="text/css" href="style/main.css"/>
        <link rel="stylesheet" type="text/css" href="style/reset.css"/>
        <title>شبکه مجازی آستان</title>
    </head>
    <body>
        <nav id="mobile-nav">

            <a href="#">صفحه اصلی</a>
            <a href="#">درباره ما</a>
            <a href="#">نقشه سایت</a>
        </nav>
        <div id="main1">
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

                <ul id="filters">
                   <?php
                $sql = "SELECT * FROM tbl_category";
                $result = $connect->query($sql);
                while ($rows_cat = mysql_fetch_assoc($result)) {
                echo"<li data-filter=".$rows_cat['id'].">".$rows_cat['name_fa']."</li><br>";
                }
                    ?>
                </ul>
                <br/>

                <img src="img/sidebar_title_middle.jpg">
                <ul>
                       <?php
                $sql = "SELECT * FROM tbl_Links WHERE status=1";
                $result = $connect->query($sql);
                while ($rows_link = mysql_fetch_assoc($result)) {
                    
                    echo"<li><a href=links.php?id=".$rows_link['id']."> ".$rows_link['title']."</a></li>";
                };?>
                </ul>
            </div>

        </div>




        <div id="container">
            
            
   


            <ul id="tiles">

                <!--         <li data-filter-class=["b"]>
                          <img src="sample-images/image_6.jpg" height="297" width="200">
                          <p>b</p>
                        </li>
                -->

                <?php
                $sql = "SELECT * FROM tbl_file WHERE status=1";
                $result = $connect->query($sql);
                while ($rows = mysql_fetch_assoc($result)) {


                    Echo "<li  data-filter-class=[" . $rows['category'] . "]>
            <diV id='item'>
                <div class='picture'>
                    <img src='img/files/Item_241.jpg'>

                </div>
                <div id='item_text'>
                    <div id='file_id'> " . $rows['id'] . "</div>    <h1>'" . $rows['title'] . "'</h1>
                    <h4>'" . $rows['date'] . "' </h4>
                    <P>'" . $rows['text'] . "'</P>
                </div>


                <div id='status_box_item'>
                    <div class='more'>
                        <a href='item.php?id=" . $rows['id'] . "'>  بیشتر...</a>

                    </div>
                    <div id='icon'>
                        <a href='#'> <img src='img/comment_icon_item.png'></a>
                        <a href='#'> <img src='img/share_icon_item.png'></a>
                    </div>
                </div> 
            </diV>
        </li>";
                }
                ?>
            </ul>

  
        </div>
        <script src="js/jquery.min.js"></script>
           <script src="js/jquery.imagesloaded.js"></script>
        <script src="js/jquery.wookmark.js"></script>
     


        <script src="js/main.js"></script>
        <script type="text/javascript">
            (function($) {
                $('#tiles').imagesLoaded(function() {
                    // Prepare layout options.
                    var options = {
                        autoResize: true, // This will auto-update the layout when the browser window is resized.
                        container: $('#container'), // Optional, used for some extra CSS styling
                        offset: 2, // Optional, the distance between grid items
                        itemWidth: 260, // Optional, the width of a grid item
                        fillEmptySpace: true // Optional, fill the bottom of each column with widths of flexible height
                    };

                    // Get a reference to your grid items.
                    var handler = $('#tiles li'),
                            filters = $('#filters li');

                    // Call the layout function.
                    handler.wookmark(options);

                    /**
                     * When a filter is clicked, toggle it's active state and refresh.
                     */
                    var onClickFilter = function(event) {
                        //    alert("lllllllllllllll");
                        var item = $(event.currentTarget),
                                activeFilters = [];

                        if (!item.hasClass('active')) {
                            filters.removeClass('active');
                        }
                        item.toggleClass('active');

                        // Filter by the currently selected filter
                        if (item.hasClass('active')) {
                            activeFilters.push(item.data('filter'));
                        }

                        handler.wookmarkInstance.filter(activeFilters);
                    }

                    // Capture filter click events.
                    filters.click(onClickFilter);
                });
            })(jQuery);
        </script>
    </body>

</html>
