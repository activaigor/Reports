<script type="text/javascript">
	$(document).ready(function(){
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
                	<li><a href="/{$city}/account/{$queue_en}">{$QUEUES.$queue_en}</a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
</div>

<table id="makeReport">
	<thead>
		<tr id="reportHead">
			<td>№</td>
			<form method="post">
			{foreach from=$COLUMNS item=order key=index}
				<td><input type="submit" name="order" value="{$index}"></td>
			{/foreach}
			{foreach from=$FILTER item=value key=name}
				<input type="hidden" name="{$name}" value="{$value}">
			{/foreach}
				<input type="hidden" name="queue" value="{$queue}">
			</form>
		</tr>
	</thead>
	<tbody>
		{$i=1}
		{foreach from=$report item=data key=name}
		{if ($data.total > 0)}
		<tr id="rowGrid{$i%2}">
        	<td>{$i++}</td>
			<td>{$name}</td>
			<td>{$data.workDays}</td>
			<td>{$data.total}<span title="Общее время">{$data.totalPerc}%</span></td>
			<td>{$data.online}<span title="От общего времени">{$data.onlinePerc}%</span></td>
			<td>{$data.call}<span title="От времени онлайн">{$data.callPerc}%</span></td>
			<td>{$data.offline}<span title="От общего времени">{$data.offlinePerc}%</span></td>
			<td>{$data.pause}<span title="От общего времени">{$data.pausePerc}%</span></td>
			<td>{$data.late}<span title="От общего времени">{$data.latePerc}%</span></td>
		</tr>
		{/if}
		{/foreach}
	</tbody>
</table>
