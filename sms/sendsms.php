<?php
/*------------ Way2sms code by www.Howi.In -----
 |  Find More Scripts @ www.Howi.in
 *--------------------------------------------*/
include('way2sms-api.php');
//$uid = $_POST['user'];
$uid ='9731063350';
//$pass = $_POST['pass'];
$pass ='priyanka0404';
$phone = $_POST['mob'];
//$message = $_POST['message'];
$message =mt_rand(100000,999999);

sendWay2SMS($uid,$pass,$phone,$message);
/*------------ Way2sms code by www.Howi.In -----
 |  Find More Scripts @ www.Howi.in
 *--------------------------------------------*/
