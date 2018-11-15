<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT'].'/astaan');

require_once 'include/config.php'; 
require_once 'include/functions.php';
require_once 'include/security.php';
require_once 'asset/date/jdf.php';
session_start();

$today = jdate('Y/n/j') ;

/*   نکته اهم پارامترهای تاریخ
 

  پارامترهای تک کاراکتری
jdate('F');// بهمن
jdate('f');// زمستان
jdaTe('f');// خطا ، نام تابع ، اشتباه است

 ترکیب دو یا چند کاراکتر با حروف اضافه در یک خروجی 
jdate('H i s');// 10 26 53
jdate('H:i:s');// 10:26:53
jdate('Y/n/j');// 1389/11/22
jdate('Y F j');// 22 بهمن 1389
jdate('V F J');// بیست و دو بهمن هزار و سیصد و هشتاد و نه

 خارج کردن بعضی از کاراکترها یا حروف ، به صورت خام و تبدیل نشده با گذاشتن \ قبل از آن ها 
منظور از کاراکتر ، تمامی حروف بزرگ و کوچک انگلیسی است که در جدول مربوطه نیز فهرست شده اند 
jdate('H:i:s');// 10:26:53
jdate('H:\i:s');// 10:i:53
jdate('H : \i\r\a\n');// 10 : iran
jdate('\HH');// H10
jdate('H\H');// 10H
jdate('H\ H');// 10 10
jdate('\HH\H');// H10H
jdate('\H\o\u : H _ \M\i\n : i _ \S\e\c : s');// Hou : 10 _ Min : 26 _ Sec : 53

*/

