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
        <link rel="stylesheet"  type="text/css" href="style/main.css">
        <style>
            /**
             * Grid items
             */
            #tiles li {
                opacity: 0;
                -webkit-transition: all 0.8s ease-out;
                -moz-transition: all 0.8s ease-out;
                -o-transition: all 0.8s ease-out;
                transition: all 0.8s ease-out;
            }
        </style>
        <title>شبکه مجازی آستان</title>
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
                <br/>
 
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


            <div id="main" role="main">

                <ul id="tiles">
                    <!-- These is where we place content loaded from the Wookmark API -->
                </ul>

                <div id="loader">
                    <div id="loaderCircle"></div>
                </div>

            </div>


        </div>

        <script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/main.js"></script>

        <!-- include jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Include the imagesLoaded plug-in -->
        <script src="js/jquery.imagesloaded.js"></script>

        <!-- Include the plug-in -->
        <script src="js/jquery.wookmark.js"></script>

        <!-- Once the page is loaded, initalize the plug-in. -->
        <script type="text/javascript">
            (function($) {
                var $tiles = $('#tiles'),
                        $handler = $('li', $tiles),
                        page = 1,
                        isLoading = true,
                        apiURL = 'server.php',
                        lastRequestTimestamp = 0,
                        fadeInDelay = 100,
                        $window = $(window),
                        $document = $(document);

                // Prepare layout options.
                var options = {
                    autoResize: true, // This will auto-update the layout when the browser window is resized.
                    container: $('#tiles'), // Optional, used for some extra CSS styling
                    offset: 2, // Optional, the distance between grid items
                    itemWidth: 254


                };


                /**
                 * When scrolled all the way to the bottom, add more tiles.
                 */
                function onScroll(event) {
                    // Only check when we're not still waiting for data.
                    if (!isLoading) {
                        // Check if we're within 100 pixels of the bottom edge of the broser window.
                        var closeToBottom = ($window.scrollTop() + $window.height() > $document.height() - 100);
                        if (closeToBottom) {
                            // Only allow requests every second
                            var currentTime = new Date().getTime();
                            if (lastRequestTimestamp < currentTime - 1000) {
                                lastRequestTimestamp = currentTime;
                                page = page + 1;
                                loadData();
                            }
                        }
                    }
                }
                ;

                /**
                 * Refreshes the layout.
                 */
                function applyLayout($newImages) {
                    options.container.imagesLoaded(function() {
                        // Destroy the old handler
                        if ($handler.wookmarkInstance) {
                            $handler.wookmarkInstance.clear();
                        }

                        // Create a new layout handler.
                        $tiles.append($newImages);
                        $handler = $('li', $tiles);
                        $handler.wookmark(options);

                        // Set opacity for each new image at a random time
                        $newImages.each(function() {
                            var $self = $(this);
                            window.setTimeout(function() {
                                $self.css('opacity', 1);
                            }, Math.random() * fadeInDelay);
                        });
                    });
                }
                ;

                /**
                 * Loads data from the API.
                 */
                function loadData() {
                    isLoading = true;
                    $('#loaderCircle').show();

                    $.ajax({
                        url: apiURL,
                        dataType: 'json', // Set to jsonp if you use a server on a different domain and change it's setting accordingly
                        data: {page: page}, // Page parameter to make sure we load new data
                        success: onLoadData
                    });
                }
                ;

                /**
                 * Receives data from the API, creates HTML for images and updates the layout
                 */
                function onLoadData(response) {
                    isLoading = false;
                    $('#loaderCircle').hide();

                    // Increment page index for future calls.
                    page++;

                    // Create HTML for the images.
                    var html = '',
                            data = response.data,
                            i = 0, length = data.length, image, opacity
                            ,
                            $newImages;







                    for (; i < length; i++) {
                        image = data[i];

                        html += '<li >';
                        html += '<diV id="item">';
                        html += '<div class="picture">';
                        html += '<img src="' + image.image + '">';
                        html += '</div>';
                        html += '  <div id="item_text">';
                        html += ' <div id="file_id"> ' + image.id + '</div>    <h1>' + image.title + '</h1>';
                        html += ' <h4>منتشر شده در   93/03/30 </h4>';
                        html += ' <P> ' + image.text + '</p>';
                        html += '</div>';
                        html += '  <div id="status_box_item">';
                        html += '  <div class="more">';
                        html += '  <a href="item.php?id=' + image.id + '">  بیشتر...</a>';
                        html += '   </div>';
                        html += '     <div id="icon">';
                        html += '  <a href="#"> <img src="img/comment_icon_item.png"></a>';
                        html += '<a href="#"> <img src="img/share_icon_item.png"></a>';
                        html += '  </div>';
                        html += '  </div> ';
                        html += ' </diV>';
                        html += '</li>';
                    }

                    $newImages = $(html);

                    // Disable requests if we reached the end
                    if (response.message == 'No more pictures') {
                        $document.off('scroll', onScroll);
                    }

                    // Apply layout.
                    applyLayout($newImages);
                }
                ;

                // Capture scroll event.
                $document.on('scroll', onScroll);

                // Load first data from the API.
                loadData();
            })(jQuery);
        </script>

    </body>

</html>
