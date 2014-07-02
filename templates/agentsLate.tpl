<html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsLate.css"\>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/historyDesc.css"\>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/jquery-ui.css"\>
<script src="../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../includes/js/advancedFuncs.js" type="text/javascript"></script>
<script src="../includes/js/jquery.treeview.js" type="text/javascript"></script>
<script src="../includes/js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
	javascriptHandler = "javascriptHandler.php";
	function initTrees() {
		$("#agentsHistory").treeview({
			collapsed: true,animated: "fast"
		});
	}
	$(document).ready(function(){
		initTrees();
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
	});
</script>
</head>
<body>

<h3 id="lateTitle">СПИСОК ОПОЗДАВШИХ</h3>
<hr>
<ul id="agentsHistory">
{$i=0}
{foreach from=$agents item=agent key=agentName}
	{$i=$i+1}
	{$name = explode(" | " , $agentName)}
	<li id="agentOrder{$i%2}" class="agentOrder"><span style="padding: 5px;">{$i}. {$name.0}</span>
		<ul>
		{$sumLate=0}
		{foreach from=$agent item=data key=index}
			<li id="workDay" onClick='showLateData(Array("{$data.id}","{$data.offline}","{$data.pause}","{$data.online}","{$data.call}","{$data.late}","{$data.login}","{$data.leave}","{$data.note}","{$data.name}"))'>
				<span style="padding: 5px;">* {$data.workDay} Опоздание: {$data.late}
				{if ($data.note != "")}
					<p><i>Примечание: {$data.note}</i></p>
				{/if}
				</span>
			</li>
		{$sumLate = $sumLate + $data.lateTime}
		{/foreach}
			<li id="totalLate" style="padding: 10px;">Суммарное опоздание: {gmdate("H:i",$sumLate)}</li>
		</ul>
	</li>
{/foreach}
</ul>
	
{include file='historyDesc.tpl'}
{include file='dayFilter.tpl'}

</body>
</html>
