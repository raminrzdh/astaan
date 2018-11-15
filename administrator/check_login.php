<?php 
include 'include/security.php';
$security = new security;
session_start(); 

$security->Check_Post($_POST['str']);
if (isset($_POST['str'])) { 
    if($_SESSION['manager_log'])    {            
        echo "1";
    } else {            
        echo "0";
    }    
}
  