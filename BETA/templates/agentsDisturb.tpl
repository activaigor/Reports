<html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsDist.css"\>
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

<h3 id="distTitle">история нарушений</h3>
<hr>
<ul id="agentsHistory">
{$i=0}
{foreach from=$agents item=agent key=agentName}
	{$i=$i+1}
	{$name = explode(" | " , $agentName)}
	<li class="ext" id="agentOrder{$i%2}" class="agentOrder"><span class="agentName" style="padding: 5px;">{$i}. {$name.0}</span>
		<ul>
		{$sumLate=0}
		{$k=0}
		{foreach from=$agent item=data key=index}
			{$k=$k+1}
			<li id="workDay" class="grid{$k%2}">
				<table>
					<tr>
					<td class="datetime"><span class="date">* {$data.start_date}</span> {$data.start} \ {$data.duration}</td>
					<td class="type">{$disturbs[$data.dist_type]}</td>
					</tr>
				</table>
			</li>
		{/foreach}
		</ul>
	</li>
{/foreach}
</ul>
	
{include file='historyDesc.tpl'}
{include file='dayFilter.tpl'}

</body>
</html>
