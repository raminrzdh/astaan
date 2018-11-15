<?php
    include 'init.php';
    $security = new security;
    $connect = new connect;
 

if (isset($_POST['str'])) {
    $security->Check_Post($_POST['str']);
    if ($_SESSION['manager_log']) {
        echo "1";
    } else {
        echo "0";
    }
}

if (isset($_POST['btnlogin'])) {
    
    if (($_POST['username'] == '') || ($_POST['password'] == '')) {
        echo $security->massage("وارد کردن نام کاربری و رمز ورود اجباری است", "#FF0000", "4px");
    } else {
        $username = $security->Check_Post($_POST['username']);
        $password = $security->Check_Post($_POST['password']);
        $captcha = $security->Check_Post($_POST['captcha']);
        $pass_hash = $security->hash_value($password);


        if ($_SESSION['captcha'] != strtoupper($captcha)) {
            echo $security->massage("کد امنیتی صحیح نمی باشد", "#FF0000", "4px");
        } else {
            
            $sql = "SELECT * FROM `tbl_users` WHERE username='" . $username . "' && password='" . $pass_hash . "'";
            $result = $connect->query($sql);

            if (mysql_num_rows($result) > 0) {
                $rows = mysql_fetch_assoc($result);
                $_SESSION['user_id'] = $rows['id'] ;
                if ($rows["level"] == 1) {
                    if (mysql_num_rows($result) == 1) {
                        $_SESSION['manager_name'] = $rows['name'] . " " . $rows['family'];
                        $_SESSION['manager_log'] = true;                    
                         echo '1';
                    } else {
                        echo $security->massage("نام کاربری و یا رمز ورود اشتباه است", "#FF0000", "4px");
                    }
                } else if ($rows["level"] == 2) {
                    
                    
                } else if ($rows["level"] == 3) {
                    
                    
                }
            } else {
                echo $security->massage("نام کاربری و یا رمز ورود اشتباه است", "#FF0000", "4px");
            }
        }
    }
}

if (isset($_POST['btn_forgot'])) {

    if (($_POST['forgot_username'] == '') && ($_POST['forgot_email'] == '')) {
        echo $security->massage("وارد کردن آدرس ایمیل اجباری است", "#FF0000", "4px");
    } else {

        if ($_POST['forgot_username'] != '') {
            $forgot_username = $security->Check_Post($_POST['forgot_username']);
        }

        if ($_POST['forgot_email']) {
            $forgot_captcha = $security->Check_Post($_POST['captcha']);
            $forgot_email = $security->Check_Post($_POST['forgot_email']);
            if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z\.]+/", $forgot_email)) {
                $security->massage(" آدرس ایمـــیل معتـــبر نمــی بـاشــد", "#FF0000", "4px");
            } else {
                if ($_SESSION['captcha'] != strtoupper($forgot_captcha)) {
                    echo $security->massage("کد امنیتی صحیح نمی باشد", "#FF0000", "4px");
                } else {
                    if ($_POST['forgot_username'] != '') {
                        $sql = "SELECT * FROM `tbl_users` WHERE username='" . $forgot_username . "' && email='" . $forgot_email . "'";
                    } else {
                        $sql = "SELECT * FROM `tbl_users` WHERE  email ='" . $forgot_email . "'";
                    }
                    $result = $connect->query($sql);

                    if (mysql_num_rows($result) > 0) {
                        $rows = mysql_fetch_assoc($result);
// تابع ارسال ایمیل باید نوشته شود








                        echo $security->massage("رمز ورود برای شما ارسال شد", "#00FF00", "4px");
                    } else {
                        echo $security->massage(" چنین نام کاربری و یا ایمیلی وجود ندارد", "#FF0000", "4px");
                    }
                }
            }
        } else {
            echo $security->massage("جهت ارسال رمز وارد کردن ایمیل اجباری است", "#FF0000", "4px");
        }
    }
}

if (isset($_POST['btn_link_add'])) {        
    if($_POST['link_title'] == '' ){
        echo $security->massage(" عنوان  را وارد نمایید", "#FF0000", "4px");
    }else{
        if($_POST['link_text'] == '' ){
            echo $security->massage("متن  را وارد نمایید", "#FF0000", "4px");
        }else{
            $link_title = $security->Check_Post($_POST['link_title']);
            $link_text = $security->read($security->Check_Post($_POST['link_text']));
            $link_date = $today;
            $link_status = $security->Check_Post($_POST['status']);
            $sql = "INSERT INTO `tbl_links` (`title`,`text`,`date`, `status`) VALUES ('" . $link_title . "', '" . $link_text . "', '" . $link_date ."', '" . $link_status . "')";
            $result = $connect->query($sql);
            if ($result) {                
                echo $security->massage(" لینک داغ با موفقیت ایجاد شد.جهت نمایش در سایت آن را انتشار دهید", "#00FF00", "4px");
            } else {                
                echo $security->massage(" هنگام ثبت  خطایی رخ داد لطفا اطلاعات ورودی را چک نموده و مجددا پرونده را ثبت نمایید", "#FF0000", "4px");
            } 
        }
        
    }
}

if(isset($_POST['link_list_pagination'])){
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);    
    if ($page == '')
        $page = 1;
    $start = ($page - 1 ) * $counter;    
    $sql = "SELECT * FROM tbl_links ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";         
    $result = $connect->query($sql);  
    while ($rows = mysql_fetch_assoc($result)) {  
         if ($security->read($rows['status'])) {
             $register_status = 'icon-check';
         }else {
             $register_status = 'icon-unchecked';
         }
        echo ' 
           </tr>
                <tr>
                <td class="hidden-xs-portrait">'.$security->read($rows['id']).'</td>
                <td><img src="images/1.jpg" /></td>
                <td>'.$security->read($rows['title']).'</td>
                <td class="hidden-xs"> '.$security->read($rows['text']).' </td>
                <td class="hidden-xs"> '.$security->read($rows['date']).' </td>
                
                <td class="td-actions">                                                       
                      <a href="javascript:id=' . $security->read($rows['id']) . ';accept_link();">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  '.$register_status.'"> </i>
                        </i>													
                    </a>
                    <a  href="javascript:id=' . $security->read($rows['id']) . ';link_remove();" >
                        <i class="btn btn-small btn-icon-only" >
                            <i  class="btn-icon-only  icon-remove" > </i>
                        </i>													
                    </a>
                    
                 </td>
              </tr> 
            ';
    }
}

if (isset($_POST['link_del'])) {
    $link_id = $security->Check_Post($_POST['link_del_id']);
    $sql = "DELETE FROM `tbl_links` WHERE `id` = " . $link_id;
    $result = $connect->query($sql);
    if ($result) {
        echo $security->massage("حذف با موفقیت انجام شد", "#00FF00", "4px");
    }else {
        echo $security->massage( "اشکالی در حین انجام عملیات حذف صورت گرفت.دوباره امتحان کنید.", "#FF0000", "4px");
    }
}

if (isset($_POST['accept_link'])) {
    $accept_id = $security->Check_Post($_POST['accept_id']);
    $sql1 = "SELECT id,status FROM tbl_links WHERE id = ". $accept_id;
    $result1 = $connect->query($sql1);
    $row = mysql_fetch_assoc($result1);
    if ($security->read($row['status']) == 1 ){          
        $sql = "UPDATE `tbl_links` SET `status` = 0 WHERE `id` = " . $accept_id;
    }
    else {
        $sql = "UPDATE `tbl_links` SET `status` = 1 WHERE `id` = " . $accept_id;
    }
    
    $result = $connect->query($sql);
    if ($result) {
        echo $security->massage("انتشار  با موفقیت انجام شد", "#00FF00", "4px");
    }else {
        echo $security->massage( "اشکالی در حین انجام عملیات  صورت گرفت.دوباره امتحان کنید.", "#FF0000", "4px");
    }
}

if(isset($_POST['register_list_pagination'])){
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);
    $filter = $security->Check_Post(@$_POST["filter_type"]);
    if ($page == '')
        $page = 1;
    $start = ($page - 1 ) * $counter; 
   
    if($filter == 2) {
        $sql = "SELECT * FROM tbl_register ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";   
    }else {
        $sql = "SELECT * FROM tbl_register WHERE status = ".$filter." ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
    }
   
    $result = $connect->query($sql);
  
    while ($rows = mysql_fetch_assoc($result)) {  
         if ($security->read($rows['status'])) {
             $register_status = 'icon-check';
         }else {
             $register_status = 'icon-unchecked';
         }
        echo ' 
           </tr>
                <tr>
                <td class="hidden-xs-portrait">'.$security->read($rows['id']).'</td>
                <td><img src="images/1.jpg" /></td>
                <td>'.$security->read($rows['name'])." ".$security->read($rows['family']).'</td>
                <td class="hidden-xs"> '.$security->read($rows['email']).' </td>
                <td class="hidden-xs"> '.$security->read($rows['mobile']).' </td>
                <td class="hidden-xs"> '.$security->read($rows['tell']).' </td>
                <td> '.$security->read($rows['city']).' </td>
                <td class="hidden-xs"> '.$security->read($rows['username']).' </td>
                <td class="hidden-xs"> '.$security->read($rows['birthday']).' </td>
                <td class="hidden-xs-portrait"> '.$security->read($rows['reg_date']).' </td>
                <td class="td-actions">                                                       
                      <a href="javascript:id=' . $security->read($rows['id']) . ';accept_register();">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  '.$register_status.'"> </i>
                        </i>													
                    </a>
                    <a  href="javascript:id=' . $security->read($rows['id']) . ';register_remove();" >
                        <i class="btn btn-small btn-icon-only" >
                            <i  class="btn-icon-only  icon-remove" > </i>
                        </i>													
                    </a>
                    
                 </td>
              </tr> 
            ';
    }
}

if (isset($_POST['register_del'])) {
    $registe_id = $security->Check_Post($_POST['register_id']);
    $sql = "DELETE FROM `tbl_register` WHERE `id` = " . $registe_id;
    $result = $connect->query($sql);
    if ($result) {
        echo $security->massage("حذف با موفقیت انجام شد", "#00FF00", "4px");
    }else {
        echo $security->massage( "اشکالی در حین انجام عملیات حذف صورت گرفت.دوباره امتحان کنید.", "#FF0000", "4px");
    }
}

if (isset($_POST['accept_register'])) {
    $accept_id = $security->Check_Post($_POST['accept_id']);
    $sql1 = "SELECT id,status FROM tbl_register WHERE id = ". $accept_id;
    $result1 = $connect->query($sql1);
    $row = mysql_fetch_assoc($result1);
    if ($security->read($row['status']) == 1 ){          
        $sql = "UPDATE `tbl_register` SET `status` = 0 WHERE `id` = " . $accept_id;
    }
    else {
        $sql = "UPDATE `tbl_register` SET `status` = 1 WHERE `id` = " . $accept_id;
    }
    
    $result = $connect->query($sql);
    if ($result) {
        echo $security->massage("تأیید عضویت با موفقیت انجام شد", "#00FF00", "4px");
    }else {
        echo $security->massage( "اشکالی در حین انجام عملیات  صورت گرفت.دوباره امتحان کنید.", "#FF0000", "4px");
    }
}

if (isset($_POST['btn_user_add'])) {   
    if($_POST['user_level'] == 0 ){
        echo $security->massage("سطح دسترسی کاربر را مشخص نمایید", "#FF0000", "4px");
    }else{
        if($_POST['user_name'] == '' ){
             echo $security->massage("نام  کاربر را مشخص نمایید", "#FF0000", "4px");
        }else{

          if($_POST['user_family'] == '' ){
             echo $security->massage("فامیلی  کاربر را مشخص نمایید", "#FF0000", "4px");
          }else{              
                if($_POST['user_username'] == '' ){
                  echo $security->massage("نام کاربری، کاربر را مشخص نمایید", "#FF0000", "4px");
                }else{
                    if($_POST['user_password'] == '' ){
                          echo $security->massage("  رمز را وارد  نمایید ", "#FF0000", "4px");
                    }else {
                        if($_POST['user_password2'] == '' ){
                             echo $security->massage(" تکرار رمز جهت اطمینان از صحیح وارد کردن رمز الزامیست  ", "#FF0000", "4px");
                            }else{
                               if($_POST['user_password'] != $_POST['user_password2'] ){
                                   echo $security->massage(" رمزهای وارد شده با یکدیگر همخوانی ندارد", "#FF0000", "4px");
                               }else{                           
                                    if($_POST['user_email'] == '' ){
                                        echo $security->massage("ایمیل کاربر را وارد نمایید", "#FF0000", "4px");
                                    }else{
                                        if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z\.]+/", $_POST['user_email'])) {
                                            $security->massage(" آدرس ایمـــیل معتـــبر نمــی بـاشــد", "#FF0000", "4px");
                                        } else { 
                                            $user_name = $security->Check_Post($_POST['user_name']);
                                            $user_family  = $security->Check_Post($_POST['user_family']);
                                            $user_username  = $security->Check_Post($_POST['user_username']);
                                            $user_password = $security->Check_Post($_POST['user_password']);
                                            $user_email = $security->Check_Post($_POST['user_email']);
                                            $user_pic = $security->Check_Post($_POST['user_pic']);
                                            $user_level = $security->Check_Post($_POST['user_level']);
                                            $user_hash_pass = $security->hash_value($user_password);

                                            $sql = "SELECT * FROM tbl_users WHERE username = '".$user_username ."'";
                                            $result = $connect->query($sql);
                                            if (mysql_num_rows($result)>0) {
                                                echo $security->massage("نام کاربری از قبل وجود دارد", "#FF0000", "4px"); 
                                                exit();
                                            }
                                            
                                            $sql = "SELECT * FROM tbl_users WHERE email = '".$user_email ."'";
                                            $result = $connect->query($sql);
                                            if (mysql_num_rows($result)>0) {
                                                echo $security->massage("ایمیل تکراری است", "#FF0000", "4px"); 
                                                exit();
                                            }
                                            
                                            
                                            $sql = "INSERT INTO `tbl_users` (`name`, `family`, `email`, `username`, `password`, `level`, `pic`) VALUES ('" . $user_name . "', '" . $user_family . "', '" . $user_email . "', '" . $user_username . "', '" . $user_hash_pass . "', '" . $user_level . "', '" . $user_pic . "')";
                                            $result = $connect->query($sql);
                                            if ($result) {                
                                                echo $security->massage("کاربر با موفقیت ثبت شد", "#00FF00", "4px");
                                            } else {                
                                                echo $security->massage(" هنگام ثبت  خطایی رخ داد لطفا اطلاعات ورودی را چک نموده و مجددا پرونده را ثبت نمایید", "#FF0000", "4px");
                                            }                                                                                                                                                                                    

                                        }
                                    }                                                       
                               }
                           }   
                        } 
                        
                        
                    }
                    }
            } 
        } 
    }

if (isset($_POST['btn_expert_add'])) {    
    if($_POST['expert_education'] == 0 ){
        echo $security->massage("تحصیلات کارشناس را انتخاب نمایید", "#FF0000", "4px");
    }else{
        if($_POST['expert_name'] == ''){
            echo $security->massage("نام کارشناس وارد نشده است", "#FF0000", "4px");
        }else{
            if($_POST['expert_family'] == '') {
                echo $security->massage("فامیلی کارشناس وارد نشده است", "#FF0000", "4px");
            } else {
                
                if($_POST['expert_skill'] == '') {
                    echo $security->massage("تخصص کارشناس وارد نشده است", "#FF0000", "4px");
                } else {

                    if($_POST['expert_email'] == '') {
                        echo $security->massage("ایمیل کارشناس وارد نشده است", "#FF0000", "4px");
                    } else {                        
                         if (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z\.]+/", $_POST['expert_email'])) {
                            $security->massage(" آدرس ایمـــیل معتـــبر نمــی بـاشــد", "#FF0000", "4px");
                        } else {                        
                            $expert_name = $security->Check_Post($_POST['expert_name']);
                            $expert_family = $security->Check_Post($_POST['expert_family']);
                            $expert_skill = $security->Check_Post($_POST['expert_skill']);
                            $expert_education = $security->Check_Post($_POST['expert_education']);
                            $expert_email = $security->Check_Post($_POST['expert_email']);
                            $expert_pic = $security->Check_Post($_POST['expert_pic']);

                            $sql = "INSERT INTO `tbl_expert` (`name`, `family`, `email`, `skill`, `education`, `pic`) VALUES ('" . $expert_name . "', '" . $expert_family . "', '" . $expert_email . "', '" . $expert_skill . "', '" . $expert_education . "', '" . $expert_pic . "')";
                            $result = $connect->query($sql);
                            if ($result) {                
                                echo $security->massage("کارشناس با موفقیت ثبت شد", "#00FF00", "4px");
                            } else {                
                                echo $security->massage(" هنگام ثبت  خطایی رخ داد لطفا اطلاعات ورودی را چک نموده و مجددا پرونده را ثبت نمایید", "#FF0000", "4px");
                            }
                        }

                    }

                }

            }
        }
    }        
}

if (isset($_POST['user_del'])) {
    $user_id = $security->Check_Post($_POST['user_id']);
    $sql = "DELETE FROM `tbl_users` WHERE `id` = " . $user_id;
    $result = $connect->query($sql);
    if ($result) {
        echo $security->massage("حذف با موفقیت انجام شد", "#00FF00", "4px");
    }else {
        echo $security->massage( "اشکالی در حین انجام عملیات حذف صورت گرفت.دوباره امتحان کنید.", "#FF0000", "4px");
    }
}

if(isset($_POST['user_list_pagination'])){
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);
    if ($page == '')
        $page = 1;
    $start = ($page - 1 ) * $counter;
    $sql = "SELECT * FROM tbl_users ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
    $result = $connect->query($sql);
    while ($rows = mysql_fetch_assoc($result)) {       
        echo ' 
            <tr>
                <td> <img src="images/user.jpg" width="60" height="75" /> </td>
                <td>'.$rows["name"]." ".$rows["family"].'</td>
                <td> '.$rows["username"].'</td>
                <td> '.$rows["email"].' </td>
                <td> '.$rows["level"].'  </td>  
                <td class="td-actions">                                                           
                    <a href="javascript:id=' . $security->read($rows['id']) . ';;">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  icon-edit"> </i>
                        </i>													
                    </a>
                    <a  href="javascript:id=' . $security->read($rows['id']) . ';user_remove();" >
                        <i class="btn btn-small btn-icon-only" >
                            <i  class="btn-icon-only  icon-remove" > </i>
                        </i>													
                    </a>
                    
                    
                </td>
            </tr>   ';
    }
}
 
if(isset($_POST['catetory_list_pagination'])){
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);
    if ($page == '')
        $page = 1;
    $start = ($page - 1 ) * $counter;
    $sql = "SELECT * FROM tbl_category ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
    $result = $connect->query($sql);
    while ($rows = mysql_fetch_assoc($result)) {       
        echo ' 
            <tr>
                <td>'.$rows["name_fa"].'</td>
                <td> '.$rows["name_en"].'</td>                
                <td class="td-actions">                                                           
                    <a href="javascript:id=' . $security->read($rows['id']) . ';;">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  icon-edit"> </i>
                        </i>													
                    </a>
                    <a  href="javascript:id=' . $security->read($rows['id']) . ';cat_remove();" >
                        <i class="btn btn-small btn-icon-only" >
                            <i  class="btn-icon-only  icon-remove" > </i>
                        </i>													
                    </a>
                </td>
            </tr>   ';
    }
}

if(isset($_POST['cat_list_select'])){
    $cat_id = $security->Check_Post($_POST['cat_seletced']);
    $sql = "SELECT * FROM `tbl_file` WHERE ( category = ".$cat_id." ) ORDER BY `id` DESC LIMIT 0,9";
    $result = $connect->query($sql);
    echo ' <li style="background: #999;" >  آخرین پرونده ها  </li>';
    while ($rows = mysql_fetch_assoc($result)) {
        echo "<li><a data-wysihtml5-command-value='div' data-wysihtml5-command='formatBlock'   id='" . $security->read($rows['id']) . "' ; href='javascript:;'  unselectable='on'> " . $security->read($rows['id']) . " )" . $security->read($rows['title']) . "</a></li>";
    }
}

if(isset($_POST['comment_list_pagination'])){
    $comment_list_pagination = $security->Check_Post($_POST['comment_list_pagination']);
    
    if($comment_list_pagination == 'number'){
            $counter = 5;
            $page = $security->Check_Post(@$_POST["page"]);
            if ($page == '')
                $page = 1;
            $start = ($page - 1 ) * $counter;
            $sql = "SELECT * FROM tbl_comment ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
            $result = $connect->query($sql);
            while ($rows = mysql_fetch_assoc($result)) {       
                echo ' 
                    <tr>
                        <td class="hidden-xs-portrait">2</td>
                        <td class="hidden-xs"><img src="images/1.jpg" /></td>
                        <td>'.$security->read($rows['text']).'</td>                      
                        <td>'.$security->read($rows['date']).'</td>
                        <td class="hidden-xs"> 1393/03/30 </td>                                                                  

                        <td class="td-actions">                                 
                            <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-check"> </i></a>                                                    
                            <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                        </td>
                    </tr>
                ';
            }
    }
    
    elseif ($comment_list_pagination=='filter') {
        
        $status = $security->Check_Post($_POST['status']);
        $file_selected = $security->Check_Post($_POST['file_select']);
        
         $counter = 5;
            $page = $security->Check_Post(@$_POST["page"]);
            if ($page == '')
                $page = 1;
            $start = ($page - 1 ) * $counter;
           $sql = "SELECT * FROM tbl_comment  ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
            
            if ($status == 'all' ){
                if ($file_selected != '') {
                    $sql = "SELECT * FROM tbl_comment WHERE ( file_id= ".$file_selected." ) ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
                }else {
                    $sql = "SELECT * FROM tbl_comment  ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
                }
            }else{
               if ($file_selected != '') {
                    $sql = "SELECT * FROM tbl_comment WHERE (file_id= ".$file_selected." AND status = ".$status." ) ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
                }else {
                    $sql = "SELECT * FROM tbl_comment WHERE  status = ".$status." ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
                }                                                
            }
                
            $result = $connect->query($sql);
            while ($rows = mysql_fetch_assoc($result)) {       
                echo ' 
                    <tr>
                        <td class="hidden-xs-portrait">2</td>
                        <td class="hidden-xs"><img src="images/1.jpg" /></td>
                        <td>'.$security->read($rows['text']).'</td>                      
                        <td>'.$security->read($rows['date']).'</td>
                        <td class="hidden-xs"> 1393/03/30 </td>                                                                  

                        <td class="td-actions">                                 
                            <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-check"> </i></a>                                                    
                            <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                        </td>
                    </tr>
                ';
            }
        
        
    }
    
    elseif ($comment_list_pagination == 'ready'){
        
         $counter = 5;
            $page = $security->Check_Post(@$_POST["page"]);
            if ($page == '')
                $page = 1;
            $start = ($page - 1 ) * $counter;
            $sql = "SELECT * FROM tbl_category ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
            $result = $connect->query($sql);
            while ($rows = mysql_fetch_assoc($result)) {       
                echo ' 
                    <tr>
                        <td class="hidden-xs-portrait">2</td>
                        <td class="hidden-xs"><img src="images/1.jpg" /></td>
                        <td>'.$security->read($rows['text']).'</td>                      
                        <td>'.$security->read($rows['date']).'</td>
                        <td class="hidden-xs"> '.$security->read($rows['file_id']).' </td>                                                                  

                        <td class="td-actions">                                 
                            <a class="btn btn-small btn-icon-only" href="javascript:;"><i class="btn-icon-only icon-check"> </i></a>                                                    
                            <a class="btn btn-icon-only btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a>
                        </td>
                    </tr>
                ';
            }                
    }
        
}

if (isset($_POST['btn_cat_add'])) {    
    if($_POST['name_fa'] == '' ){
        echo $security->massage(" نام فارسی را وارد نمایید", "#FF0000", "4px");
    }else{
        if($_POST['name_en'] == '' ){
            echo $security->massage(" نام انگلیسی را وارد نمایید", "#FF0000", "4px");
        }else{
            $name_fa = $security->Check_Post($_POST['name_fa']);
            $name_en = $security->Check_Post($_POST['name_en']);
            $sql = "INSERT INTO `tbl_category` (`name_fa`, `name_en`) VALUES ('" . $name_fa . "', '" . $name_en . "')";
            $result = $connect->query($sql);
            if ($result) {                
                echo $security->massage("دسته بندی جدید با موفقیت ثبت شد", "#00FF00", "4px");
            } else {                
                echo $security->massage(" هنگام ثبت  خطایی رخ داد لطفا اطلاعات ورودی را چک نموده و مجددا پرونده را ثبت نمایید", "#FF0000", "4px");
            } 
        }
        
    }
}

if (isset($_POST['cat_del'])) {
    $cat_id = $security->Check_Post($_POST['cat_id']);
    $sql = "DELETE FROM `tbl_category` WHERE `id` = " . $cat_id;
    $result = $connect->query($sql);
    if ($result) {
        echo $security->massage("حذف با موفقیت انجام شد", "#00FF00", "4px");
    }else {
        echo $security->massage( "اشکالی در حین انجام عملیات حذف صورت گرفت.دوباره امتحان کنید.", "#FF0000", "4px");
    }
}

if (isset($_POST['expert_del'])) {
    $expert_id = $security->Check_Post($_POST['expert_id']);
    $sql = "DELETE FROM `tbl_expert` WHERE `id` = " . $expert_id;
    $result = $connect->query($sql);
    if ($result) {
        echo $security->massage("حذف با موفقیت انجام شد", "#00FF00", "4px");
    }else {
        echo $security->massage( $sql."اشکالی در حین انجام عملیات حذف صورت گرفت.دوباره امتحان کنید.", "#FF0000", "4px");
    }
}

if(isset($_POST['expert_list_pagination'])){
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);
    if ($page == '')
        $page = 1;
    $start = ($page - 1 ) * $counter;
    $sql = "SELECT * FROM tbl_expert ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
    $result = $connect->query($sql);
    while ($rows = mysql_fetch_assoc($result)) {       
        echo ' 
            <tr>
                <td> <img src="images/user.jpg" width="60" height="75" /> </td>
                <td>'.$rows["name"].' ' .$rows["family"]. '</td>
                <td>'.$rows["education"].'</td>                                   
                <td> '.$rows["skill"].'  </td>  
                <td> '.$rows["email"].' </td>
                
                <td class="td-actions">                                                           
                    <a href="javascript:id=' . $security->read($rows['id']) . ';;">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  icon-edit"> </i>
                        </i>													
                    </a>
                    <a  href="javascript:id=' . $security->read($rows['id']) . ';expert_remove();" >
                        <i class="btn btn-small btn-icon-only" >
                            <i  class="btn-icon-only  icon-remove" > </i>
                        </i>													
                    </a>
                    
                    
                </td>
            </tr>   ';
    }
}

if (isset($_POST['btn_file_post'])) {
    if (($_POST['file_title'] == '') || ($_POST['file_text'] == '') || ($_POST['file_category'] == '') || ($_POST['file_pic'] == '')) {
        echo $security->massage("تمام فیلدها و موارد اجباری هستند", "#FF0000");
    } else {
        $file_title = $security->Check_Post($_POST['file_title']);
        $file_text = $security->Check_Post($_POST['file_text']);
        $file_category = $security->Check_Post($_POST['file_category']);
        $file_pic = $security->Check_Post($_POST['file_pic']);

        $sql = "INSERT INTO `tbl_file` (`title`, `text`, `category`, `pic`, `date`, `update_date`, `status`) VALUES ('" . $file_title . "', '" . $file_text . "', '" . $file_category . "', '" . $file_pic . "', '" . $today . "', '" . $today . "', '0')";
        $result = $connect->query($sql);
        if ($result) {
//$security->Redirect("index","insert=2020");
            echo $security->massage("پرونده با موفقیت درج گردید لطفا نظر کارشناسان را درج نموده و سپس پرونده را به حالت انتشار در آورید", "#00FF00", "4px");
        } else {
//$security->Redirect("index","error=2020");
            echo $security->massage(" هنگام ثبت پرونده خطایی رخ داد لطفا اطلاعات ورودی را چک نموده و مجددا پرونده را ثبت نمایید", "#FF0000", "4px");
        }
    }
}

if (isset($_POST['btn_page_post'])) {

    $page_title = $security->Check_Post($_POST['page_title']);
    $page_text = $security->Check_Post($_POST['page_text']);
    $page_pic = $security->Check_Post($_POST['page_pic']);
    $type = $security->Check_Post($_POST['page_type']);

    if ($page_title != '') {
        $sql = "UPDATE `tbl_page` SET `title` = '" . $page_title . "' , `txt` = '" . $page_text . "' , `pic` = '" . $page_pic . "'  WHERE `type` = " . $type;
        $result = $connect->query($sql);
        if ($result) {
            echo $security->massage("بروزرسانی محتوای صفحه با موفقیت انجام شد.", "#00FF00", "4px");
        }
    } else {
        echo $security->massage(" عنوان صفحه را وارد نمایید", "#00FF00", "4px");
    }
}

if (isset($_POST['file_list_pagination'])) {
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);
    if ($page == '')
        $page = 1;
    $start = ($page - 1 ) * $counter;
    $sql = "SELECT * FROM tbl_file ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
    $result = $connect->query($sql);
    while ($rows = mysql_fetch_assoc($result)) {
        $sql = "SELECT name_fa FROM tbl_category WHERE id = " . $rows['category'];
        $cat_result = $connect->query($sql);
        $category = mysql_fetch_assoc($cat_result);

        echo ' 
            <tr>
                <td> ' . $security->read($rows['title']) . '</td>
                <td> ' . $security->read($rows['text']) . ' </td>
                <td> ' . $security->read($category['name_fa']) . ' </td>
                <td> ' . $security->read($rows['date']) . ' </td>
                <td> ' . $security->read($rows['status']) . ' </td>
                <td class="td-actions">                   
                    <a href="javascript:id=' . $security->read($rows['id']) . ';experts_add();">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  icon-group"> </i>
                        </i>													
                    </a>
                    
                    <a href="javascript:id=' . $security->read($rows['id']) . ';file_edit();">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  icon-edit"> </i>
                        </i>													
                    </a>
                    <a  href="javascript:id=' . $security->read($rows['id']) . ';file_remove();" >
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  icon-remove" > </i>
                        </i>													
                    </a>
                    
                    
                </td>
            </tr>   ';
    }
}

if (isset($_POST['file_remove'])) {

    $file_id = $security->Check_Post($_POST['file_id']);
    $sql = "DELETE FROM tbl_file WHERE id = " . $file_id;
    $result = $connect->query($sql);

    if ($result) {
        echo $security->massage("پرونده مورد نظر شما حذف گردید", "#FF0000", "4px");
    } else {
        echo $security->massage(" هنگام  حذف پرونده خطا رخ داد ", "#FF0000", "4px");
    }
}

if (isset($_POST['btn_exp_comment_add'])) {
    if($_POST['file_id']== '' || $_POST['file_id']== '0') {
         echo $security->massage("شما باید یک پرونده را از صفحه لیست پرونده ها انتخاب نمایید", "#FF0000","4px");
    }else {
        if (($_POST['exp_id'] == '')) {
            echo $security->massage("کارشناس را انتخاب نمایید", "#FF0000");
        } else {
            $exp_id = $security->Check_Post($_POST['exp_id']);
            if (($_POST['comment_title'] == '')) {
                echo $security->massage("عنوان نظر را وارد نمایید", "#FF0000");
            } else {
                $comment_title = $security->Check_Post($_POST['comment_title']);
                $comment_text = $security->Check_Post($_POST['comment_text']);
                $file_id = $security->Check_Post($_POST['file_id']);

                $sql = "INSERT INTO `tbl_subfile`( `file_id`, `expert_id`, `title`, `text`, `date`) VALUES ('" . $file_id . "','" . $exp_id . "','" . $comment_title . "','" . $comment_text . "','" . $today . "')   ";
                $result = $connect->query($sql);
                if ($result) {
                    echo $security->massage("این نظرکارشناس برای پرونده شماره" . "  " . $file_id . "  " . "درج گردید", "#00FF00", "4px");
                } else {
                    echo $security->massage($sql, "#FF0000", "4px");
                }
            }
        }
    }
}

if (isset($_POST['exp_comment_remove'])){
    
    $comment_id = $security->Check_Post($_POST['comment_id']);
    $sql = "DELETE FROM tbl_subfile WHERE id = " . $comment_id;
    $result = $connect->query($sql);

    if ($result) {
        echo $security->massage("نظر کارشناس  حذف گردید", "#FF0000", "4px");
    } else {
        echo $security->massage(" هنگام  حذف  خطا رخ داد ", "#FF0000", "4px");
    }
    
}

if (isset($_POST['exp_comment_list_pagination'])) {
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);
    if ($page == '')
        $page = 1;
    $start = ($page - 1 ) * $counter;
    $sql = "SELECT * FROM tbl_subfile ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";
    $result = $connect->query($sql);
    while ($rows = mysql_fetch_assoc($result)) {
        echo ' 
            <tr>
                <td>  ' . $security->read($rows['file_id']) . ' </td>
                <td>  ' . $security->read($rows['title']) . '</td>
                <td>  ' . $security->read($rows['text']) . ' </td>
                <td>  ' . $security->read($rows['date']) . '</td>
                <td>  ' . $security->read($rows['status']) . ' </td>
                <td class="td-actions">                 
                    <a href="javascript:id=' . $security->read($rows['id']) . '; exp_comment_edit();">
                        <i class="btn btn-small btn-icon-only" >
                            <i class="btn-icon-only  icon-edit"> </i>
                        </i>													
                    </a>
                        
<i data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-small btn-icon-only  icon-remove" name="btn_file_post" id="btn_file_post" type="button" onclick="exp_comment_remove(' . $security->read($rows['id']) . ');"></i>                        
                   
                    
                    
                </td>
            </tr>   ';
    }
}

if (isset($_POST['exp_comment_list_search'])) {
    $counter = 5;
    $page = $security->Check_Post(@$_POST["page"]);
    if (!isset($_POST["search_file_id"])){
        $search_file_id = '';
    }else {
        $search_file_id = $security->Check_Post($_POST["search_file_id"]);
    }
    
    $page = 1;
    $start = ($page - 1 ) * $counter;
    if ($search_file_id == ''){
       
                $sql = "SELECT * FROM tbl_subfile ORDER BY `id` DESC LIMIT " . $start . "," . $counter . "";                
                $result = $connect->query($sql);
                
                
                while ($rows = mysql_fetch_assoc($result)) {
                    $sql2 = "SELECT * FROM tbl_file WHERE id =  " .$security->read($rows['file_id']);                
                    $result2 = $connect->query($sql2);
                    $row = mysql_fetch_assoc($result2);
                    echo ' 
                        <tr>
                            <td>  ' . $security->read($rows['file_id']) . ' </td>
                            <td>  ' . $security->read($rows['title']) . '</td>
                            <td>  ' . $security->read($rows['text']) . ' </td>
                            <td>  ' . $security->read($rows['date']) . '</td>
                            <td>  ' . $security->read($rows['status']) . ' </td>
                            <td class="td-actions">                 
                                <a href="javascript:id=' . $security->read($rows['id']) . '; exp_comment_edit();">
                                    <i class="btn btn-small btn-icon-only" >
                                        <i class="btn-icon-only  icon-edit"> </i>
                                    </i>													
                                </a>
                                <i data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-small btn-icon-only  icon-remove" name="btn_file_post" id="btn_file_post" type="button" onclick="exp_comment_remove(' . $security->read($rows['id']) . ');"></i>                        
                            </td>
                        </tr>   ';
                    
                }

                        
    }else {
            $sql = "SELECT * FROM tbl_subfile WHERE (file_id = ".$search_file_id.") ORDER BY `id` DESC ";
            $result = $connect->query($sql);    
            $row_num = mysql_num_rows($result);
            if ( $row_num > 0) {
                        while ($rows = mysql_fetch_assoc($result)) {
                            $sql2 = "SELECT * FROM tbl_file WHERE id =  " .$security->read($rows['file_id']);                
                            $result2 = $connect->query($sql2);
                            $row = mysql_fetch_assoc($result2);
                            echo ' 
                                <tr>
                                    <td>  ' . $security->read($rows['file_id']) . ' </td>
                                    <td>  ' . $security->read($rows['title']) . '</td>
                                    <td>  ' . $security->read($rows['text']) . ' </td>
                                    <td>  ' . $security->read($rows['date']) . '</td>
                                    <td>  ' . $security->read($rows['status']) . ' </td>
                                    <td class="td-actions">                 
                                        <a href="javascript:id=' . $security->read($rows['id']) . '; exp_comment_edit();">
                                            <i class="btn btn-small btn-icon-only" >
                                                <i class="btn-icon-only  icon-edit"> </i>
                                            </i>													
                                        </a>

                    <i data-backdrop="false" data-target="#messagebox" data-toggle="modal" class="btn btn-small btn-icon-only  icon-remove" name="btn_file_post" id="btn_file_post" type="button" onclick="exp_comment_remove(' . $security->read($rows['id']) . ');"></i>                        



                                    </td>
                                </tr>   ';
                        }
                }
    }
  
}

?>

 