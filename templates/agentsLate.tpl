<script type="text/javascript">
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

<div id="daySelect">
	<form action="{$smarty.server.REQUEST_URI}" method="post">
		<input type="text" class="datepicker" name="from" value="{$FILTER.from}">
		<input type="text" class="datepicker" name="to" value="{$FILTER.to}">
		<input type="submit" value="ok">
	</form>
</div>

<div id="select_queue">
	<div id="cssmenu">
	<ul>
   		<li class="has-sub"><a href="/" id="queue_selected"><span>{$QUEUES.$queue}</span></a>
      		<ul>
            	{foreach from=$login_queue item=queue_en}
                	<li><a href="/{$city}/lateness/{$queue_en}">{$QUEUES.$queue_en}</a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
</div>

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
