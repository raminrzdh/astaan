<?php
require_once('../tools/mail/class.phpmailer.php');
$mail = new PHPMailer(true);
$mail->IsSMTP();
try {	
    $mail->Host       = "smtp.gmail.com"; // آدرس SMTP سایت گوگل        
  $mail->SMTPAuth   = true;                  // استفاده از SMTP authentication
  $mail->SMTPSecure = "tls";                 // استفاده از پروتکل امن    
  $mail->Port       = 587;                   // درگاه خروجی سرویس ایمیل گوگل  
  $mail->Username   = "mr.akbarimanesh@gmail.com"; // نام کاربری حساب گوگل
  $mail->Password   = "password";        // کلمه عبور حساب گوگل
  $mail->AddReplyTo('info@aptana.ir', 'aptana'); // افزودن پاسخ به ارسال کننده
  $mail->AddAddress('mr.akbarimanesh@yahoo.com', 'akbarimanesh'); // تنظیم آدرس گیرنده ایمیل
  $mail->SetFrom('info@aptana.ir', 'aptana'); // تنظیم قسمت ارسال کننده ایمیل
  $mail->Subject = 'PHPMailer تست'; // موضوع ایمیل
  $mail->AltBody = 'برنامه شما از این ایمیل پشتیبانی نمی کند، برای دیدن آن، لطفا از برنامه دیگری استفاده نمائید'; // متنی برای کاربرانی که نمی توانند ایمیل را به درستی مشاهده کنند
  $mail->CharSet = 'UTF-8'; // یونیکد برای زبان فارسی
  $mail->ContentType = 'text/html'; // استفاده از html  
  $txt='<html>
<body>
این یک <font color="#CC0000">تست</font> است!
</body>
</html>';
  $mail->MsgHTML($txt); // متن پیام به صورت html
  //$mail->AddAttachment('images/phpmailer.gif'); // ضمیمه کردن فایل
  $mail->Send(); // ارسال
  echo "پیام با موفقیت ارسال شد\n";
} 
catch (phpmailerException $e) {
	echo "خطا در ارسال"; // پیام خطا از phpmailer
} 
catch (Exception $e) {
	echo $e->getMessage(); // سایر خطاها
}
?>
