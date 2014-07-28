<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD

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
=======
/*
echo 1;
$strHost="127.0.0.1";
$strUser="admin";  
$strSecret="FcnthbcrFlvby";  
$strChannel="SIP/2288";  
$strWaitTime="10";  
$strCallerId="2288";  
$strReceiver="0939440149";  
$strContext="preprocessing";  
  
  $oSocket = @fsockopen($strHost, 5038, $errnum, $errdesc)  
or die("Connection to host failed");  
        fputs($oSocket, "Action: login\r\n");  
        fputs($oSocket, "Events: off\r\n");  
        fputs($oSocket, "Username: $strUser\r\n");  
        fputs($oSocket, "Secret: $strSecret\r\n\r\n");  
        fputs($oSocket, "Action: originate\r\n");  
        fputs($oSocket, "Channel: $strChannel\r\n");  
        fputs($oSocket, "WaitTime: $strWaitTime\r\n");  
        fputs($oSocket, "CallerID: $strCallerId\r\n");  
        fputs($oSocket, "Exten: $strReceiver\r\n");  
        fputs($oSocket, "Context: $strContext\r\n");  
        fputs($oSocket, "Priority: 1\r\n\r\n");  
        fputs($oSocket, "Action: Logoff\r\n\r\n");  
  while (!feof($oSocket)) {  
    $wrets .= fread($oSocket, 8192);  
  }  
 fclose($oSocket);  
  if (stripos($wrets, 'Originate successfully queued')) {  
    echo "Call completed ";  
  } else {  
    echo "No accept call ";  
  }  
*/
?>

<?php
/*
function sendRequest($host, $url, $request, $port = 80) {
>>>>>>> origin/devel

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
<<<<<<< HEAD
=======
*/
$year = date("Y-m-d");
echo strtotime($year . " 15:30:00");
echo date("Y-m-d H:i:s" , 1360071000);
>>>>>>> 3aca116d1fe9118a8e2021133640a317630b9b8a
>>>>>>> origin/devel

?>
