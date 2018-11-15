<?php
session_start();
unset($_SESSION['manager_name']);
unset($_SESSION['manager_log']);
header("Location:login.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

