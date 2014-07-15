<script>
	var hoverTimeout;
	var agentNames = [
		{foreach from=$agentsNames item=name}
		"{$name}",
		{/foreach}
	];
	$(document).ready(function(){
		
		$( ".name_fill" ).autocomplete({
			source: agentNames
		});
		
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
		
		$('input[type=file]').prettyFileInput();
		$(".add_shift").find("a").click(function(){
			$("#shift_add").css("display" , "block");
			$("#shift_add").find("#cur_day").val($(this).attr("id"));
		});

		$(".shift_nav").css('opacity' , '0');

		$(".shift_nav").hover(function(){
			clearTimeout(hoverTimeout);
			var cur_item = $(this);
			hoverTimeout = setTimeout(function(){	
				cur_item.animate({
					opacity: 1
				}, 200);
			} , 300);
		}, function(){
			clearTimeout(hoverTimeout);
			$(this).animate({
				opacity: 0
			}, 200);
		});

		$(".edit").find("a").click(function(){
			id = $(this).attr("id");
			$("#shift_edit").find("#shift_id").val($(this).attr("id"));
			$("#shift_edit").find("#last_name").val($("#item_" + id).find("#name").html());
			time = $("#item_" + id).find("#time").html().split(" - ");
			cur_day = $("#item_" + id).find("#cur_day").val();
			$("#shift_edit").find("#start").val(time[0]);
			$("#shift_edit").find("#end").val(time[1]);
			$("#shift_edit").find("#cur_day").val(cur_day);
			$("#shift_edit").css("display" , "block");
		});
		
		$(".remove").find("a").click(function(){
			id = $(this).attr("id");
			$("#shift_delete").find("#shift_id").val($(this).attr("id"));
			$("#shift_delete").find("#last_name").val($("#item_" + id).find("#name").html());
			time = $("#item_" + id).find("#time").html().split(" - ");
			$("#shift_delete").find("#start").val(time[0]);
			$("#shift_delete").find("#end").val(time[1]);
			$("#shift_delete").css("display" , "block");
		});
			
		$("#pick_calendar").click(function(){
			if ($("#daySelect").css("margin-right") == "-260px") {
				$("#daySelect").animate({
					marginRight: "0px"
				},100);
			} else {
				$("#daySelect").animate({
					marginRight: "-260px"
				},100);
			}
		});

	});
</script>

<div id="daySelect">
	<a href="#" id="pick_calendar"><img height="48" src="{str_replace("[icon_type]", "light", $ICONS.calendar)}"></a>
	<input type="text" class="datepicker" name="from" value="{$smarty.get.from}">
	<input type="text" class="datepicker" name="to" value="{$smarty.get.to}">
	<input type="submit" value="ok">
</div>
	
<div id="main_navigation">

	<div id="select_queue">
		<div id="cssmenu">
		<ul>
	   		<li class="has-sub"><a href="/" id="queue_selected"><span>{$QUEUES.$queue}</span></a>
      			<ul>
            		{foreach from=$login_queue item=queue_en}
                		<li><a href="/{$city}/shifts/{$queue_en}">{$QUEUES.$queue_en}</a></li>
	            	{/foreach}
      			</ul>
   			</li>
		</ul>
		</div>
	</div>

	<form id="shifts_export" method="post" enctype="multipart/form-data">
	<img height="48" src="{str_replace("[icon_type]", "light", $ICONS.excel)}">
		<input type="text" name="year_month" value="{date("Y-m")}">
		<input type="file" name="shift">
		<input type="submit" name="export" value="ok">
	</form>
</div>

<table id="shifts_table" cellspacing="0">
	{foreach from=$mysql_shifts item=day_shifts key=cur_day}
	{if ($cur_day == date("Y-m-d"))}
	<tr class="current_day">
	{else}
	<tr>
	{/if}
		{$date = explode("-" , $cur_day)}
		{$week_day = date("D" , strtotime($cur_day))}
		<td width="50" class="date">{(int)($date[2])}</td>
		<td width="50" class="date">{$week_day}</td>
		{$day_shift = 0}
		{foreach from=$day_shifts item=shift}
			{$day_shift = $day_shift + 1}
			{$agentNum = array_search($shift.last_name , $agentsNames)}
			{if (array_key_exists($agentNum , $agentsNamesOnline) && $cur_day == date("Y-m-d"))}
				{if (abs($agentsNamesOnline.$agentNum - $shift.start) <= 10*60)}

					{$td_class = "class=\"present_ok\""}
				{else}
					{$td_class = "class=\"present_warn\""}
				{/if}
			{else}
			{$td_class = ""}
			{/if}
			<td width="150" {$td_class}>
				<div id="item_{$shift.id}" class="shift_item">
					<div id="name" class="name">{$shift.last_name}</div>
					<div id="time" class="time">{date("H" , $shift.start)} - {date("H" , $shift.end)}</div>
					<input type="hidden" id="cur_day" value="{$cur_day}">
				</div>
				<div class="shift_nav">
					<div class="edit">
						<a id="{$shift.id}" href="javascript: void(0);"></a>
					</div>
					<div class="remove">
						<a id="{$shift.id}" href="javascript: void(0);"></a>
					</div>
				</div>
			</td>
		{/foreach}
		{foreach from=range(0,$shifts_limits.$duration) item=step}
			{if ($step > $day_shift)}
				<td class="add_shift"><a id="{$cur_day}" href="javascript: void(0)">+</a></td>
			{/if}
		{/foreach}

	</tr>
	{/foreach}
</table>
	

{foreach from=$WINDOWS item=window key=index}
	{include file="window.tpl"}
{/foreach}
