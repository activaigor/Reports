<html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsHistory.css"\>
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
		$( ".draggable" ).draggable({
			revert : true,
			zIndex: 1,
			containment:'parent'
		});
		$( ".draggable" ).droppable({
			drop: function( event, ui ) {
				var dragged = ui.draggable;
				idDragged = $(dragged).find("span").find("input").val();
				idDropped = $(this).find("span").find("input").val();
				historySum(idDragged , idDropped);
			}
		});
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
	});
</script>
</head>
<body>
<ul id="agentsHistory">
{$i=0}
{foreach from=$agents item=agentMonth key=agentName}
	{$i=$i+1}
	{$name = explode(" | " , $agentName)}
	<li id="agentOrder{$i%2}" class="agentOrder"><span style="padding: 5px;">{$i}. {$name.0}</span>
		<ul>
		{foreach from=$agentMonth item=monthData key=month}
			<li id="monthSelect"><span style="padding: 5px;">* {$month}</span>
				<ul>
				{foreach from=$monthData item=data}
					<li id="workDay" class="draggable" onClick='showData(Array("{$data.id}","{$data.offline}","{$data.pause}","{$data.online}","{$data.call}","{$data.late}","{$data.login}","{$data.leave}","{$data.note}","{$data.name}"))' oncontextmenu='return popupMenuHist(event,"{$data.id}");'>
						<span>{$data.day}
							<input type="hidden" value="{$data.id}">
						</span>
					</li>
				{/foreach}
				</ul>
			</li>
		{/foreach}
		</ul>
	</li>
{/foreach}
</ul>
	
{include file='historyDesc.tpl'}
{include file='dayFilter.tpl'}

{foreach from=$WINDOWS item=window key=index}
	{include file="window.tpl"}
{/foreach}

<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0);" id="goRecords">ЗАПИСИ</a>
	<a href="javascript: void(0);" id="showDisturbs">НАРУШЕНИЯ</a>
</div>

</body>
</html>
