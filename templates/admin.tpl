<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/index.css"\>
</head>
<body>
<div id="index" class="main">

{if ($loginStatus==1)}
	{include file='adminSigned.tpl'}
{elseif ($loginStatus==0)}
	{include file='adminUnsigned.tpl'}
{/if}

</div>
</body>
</html>
