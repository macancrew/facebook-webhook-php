<?php

$e = file_get_contents('php://input');

$mode = $_GET['hub_mode'];
$challenge = $_GET['hub_challenge'];
$vtoken = $_GET['hub_verify_token'];
if($mode=="subscribe" && $vtoken=="sorong"){echo $challenge; exit();} //token very = sorong


$headers = apache_request_headers();
if(strlen($headers['x-hub-signature-256'])!=0) { 
	$sig=$headers['x-hub-signature-256'];
	$sig0=crtsig($e);
	if($sig==$sig0){echo "200 OK HTTPS"; exit();}
	else {
	echo $sig0;
	exit();
	}
}

echo "by biston";


function crtsig($str){
$key = "xxxxxxxxxxxxxxxxxxx"; /////YOUR App secret


function encode($data) {
    return str_replace(['+', '/'], ['-', '_'], base64_encode($data));
}

function decode($data) {
    return base64_decode(str_replace(['-', '_'], ['+', '/'], $data));
}

$binaryKey = decode($key);

$sigg = encode(hash_hmac("sha256", $str, $binaryKey, true));
return $sigg;

}


//update baris 8 dan 26 
?>
