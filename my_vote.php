<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<html>
    <head>
        <title>رای شما به این پرونده</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
         <link rel="stylesheet" type="text/css" href="style/style.css"/>
         
          <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <div id="my_vote_title_box">  پرونده شماره: 45623   
            
            <h4>  کارشناس :  احمدی </h4>
        </div>
        <div id="my_vote_content">  
            
         
            <form action="" id="vote">
               
<input type="radio" name="vote" value="1">موافقم<br>
<input type="radio" name="vote" value="01">نسبتا موافقم<br>
<input type="radio" name="vote" value="2">مخالفم<br>
<input type="radio" name="vote" value="02">نسبتا مخافم<br>
<input type="radio" name="vote" value="3">نظری ندارم<br>
<input type="button" id="send_vote" value=" ثبت نظر" >

</form>
         
         
         </div>
       
         
    </body>
    <script>
        
        function closeWin() {
        myWindow.close();
}
</script>
    
     <script>
            
                 $(function() {
                     
                     //insert record
                   $("#send_vote").click(function() {
                       
                         var vote =$('input[name=vote]:checked' ).val()
                     //    alert (vote);
                         var send="send_vote";
                         var file_id='1';
                         var subfile_id='2';
                         var exp_id='3';
                   //syntax - $.post('filename', {data}, function(response){});
                         $.post('ajax_root.php',
                                 {
                                     action: "POST",
                                     your_yote: vote,
                                     send:send,
                                     file_id:file_id,
                                     subfile_id:subfile_id,
                                     exp_id:exp_id
                                 }

                         , function(res) {
                             $('#my_vote_content').html(res);
                         });
                     });
                 });
        </script>
       
        </html>
