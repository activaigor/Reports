<?php

if (array_key_exists("num",$_GET)) {
$num = $_GET["num"];
$request = xmlrpc_encode_request("makeCall", array("0445000303", $num));
$context = stream_context_create(array('http' => array(
	'method' => "POST",
	'header' => "Content-Type: text/xml",
	'content' => $request
)));
$file = file_get_contents("http://194.50.85.100:8125/RPC2", false, $context);
$response = xmlrpc_decode($file);
if ($response && xmlrpc_is_fault($response)) {
	    trigger_error("xmlrpc: $response[faultString] ($response[faultCode])");
} else {
	    print_r($response);
}
}

?>
