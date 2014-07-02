<?php
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

//create the context to send to the xmlrpc server
$context = stream_context_create(array('http' => array(
    'method' => "POST",
    'header' => "Content-Type: text/xml\r\nUser-Agent: PHPRPC/1.0\r\n",
    'content' => $request
)));

//i am not sure how to get the url, normally something like http://server/api/xml
$server = "http://".$host.":".$port; //?

//store the response
$file = file_get_contents($server, false, $context);
//decode the response to xml
$return xmlrpc_decode($file);
}
*/
$year = date("Y-m-d");
echo strtotime($year . " 15:30:00");
echo date("Y-m-d H:i:s" , 1360071000);

?>
