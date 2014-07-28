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
                	<li><a href="/{$city}/history/{$queue_en}">{$QUEUES.$queue_en}</a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
</div>

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

{foreach from=$WINDOWS item=window key=index}
	{include file="window.tpl"}
{/foreach}

<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0);" id="goRecords">ЗАПИСИ</a>
	<a href="javascript: void(0);" id="showDisturbs">НАРУШЕНИЯ</a>
</div>
