<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" href="includes/css/index.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="includes/css/agentsOnline.css"\>
	<script src="includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="includes/js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	<script src="includes/js/advancedFuncs.js" type="text/javascript"></script>
<script src="includes/js/agentsAjax.js" type="text/javascript"></script>
<script type="text/javascript">
	SIP_PHONE = {$sip};
	javascriptHandler = "includes/javascriptHandler.php";
	$(document).ready(function(){
		getData('{$city}' , '{$detail}' , {$loginStatus} , '{$queue}');
		getCallers('{$city}' , '{$queue}');
		setInterval( function() { updateData('{$city}' , '{$detail}' , {$loginStatus} , '{$queue}') } , 3000);
		setInterval( function() { updateDataCallers('{$city}' , '{$queue}') } , 1500);
	});

</script>
</head>
<body>
{if ($loginStatus==1)}
{include file='indexSigned.tpl'}
{elseif ($loginStatus==0)}
{include file='indexUnsigned.tpl'}
{/if}
{foreach from=$WINDOWS item=window key=index}
	{include file="window.tpl"}
{/foreach}
</body>
</html>
