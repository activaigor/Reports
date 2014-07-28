<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/index.css"\>

	{if ($loginStatus==1)}
	{include file="jsVars.tpl"}

	{if ($feature == "queue")}
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	{else if ($feature == "history")}
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.treeview.js" type="text/javascript"></script>
	<script src="/includes/js/agentsHistory.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.datetimepicker.js"></script>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/agentsHistory.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/historyDesc.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" type="text/css" href="/includes/js/jquery.datetimepicker.css"/>
	{else if ($feature == "cdr")}
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/cdr.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" type="text/css" href="/includes/js/jquery.datetimepicker.css"/>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/audio/audiojs/audio.min.js"></script>
	<script src="/includes/js/jquery.datetimepicker.js"></script>
	{else if ($feature == "shifts")}
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/shifts.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" href="/includes/css/jquery.fileInput.css" />
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.fileInput.js" type="text/javascript"></script>
	{else if ($feature == "lateness")}
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/agentsLate.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/historyDesc.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/advancedFuncs.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.treeview.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	{else if ($feature == "account")}
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/makeReport.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	{else if ($feature == "chanstat")}
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/cdr.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" type="text/css" href="/includes/js/jquery.datetimepicker.css"/>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.datetimepicker.js"></script>
	{else if ($feature == "logging")}
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	{/if}
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/agentsOnline.css"\>
<<<<<<< HEAD
	<link href="/includes/js/toastr/toastr.css" rel="stylesheet"/>
	<script src="/includes/js/agentsAjax.js" type="text/javascript"></script>
	<script src="/includes/js/advancedFuncs.js" type="text/javascript"></script>
	<script src="/includes/js/whoCall.js" type="text/javascript"></script>
	<script src="/includes/js/toastr/toastr.min.js" type="text/javascript"></script>
=======
	<script src="/includes/js/agentsAjax.js" type="text/javascript"></script>
	<script src="/includes/js/advancedFuncs.js" type="text/javascript"></script>
	<script src="/includes/js/whoCall.js" type="text/javascript"></script>
>>>>>>> 3aca116d1fe9118a8e2021133640a317630b9b8a
	<script type="application/javascript" src="http://jsonip.appspot.com/?callback=getip"> </script>
	{/if}

</head>
<body>
<div id="index" class="main">

{if ($loginStatus==1)}
{include file='indexSigned.tpl'}
{if (isset($WINDOWS))}
{foreach from=$WINDOWS item=window key=index}
	{include file="window.tpl"}
{/foreach}
{/if}
{elseif ($loginStatus==0)}
{include file='indexUnsigned.tpl'}
{/if}

</div>
</body>
</html>
