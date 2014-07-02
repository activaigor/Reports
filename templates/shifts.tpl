<html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="./includes/css/shifts.css"\>
<link type="text/css" rel="stylesheet" media="all" href="./includes/css/jquery-ui.css"\>
<link rel="stylesheet" href="./includes/css/jquery.fileInput.css" />
<script src="./includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="./includes/js/jquery-ui.js" type="text/javascript"></script>
<script src="./includes/js/jquery.fileInput.js" type="text/javascript"></script>
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

	});
</script>
</head>
<body>
<a href="/" id="mainLogo"><img src="./includes/pictures/roundcube_logo.png" style="position: fixed; top: 5px; left: 0px; border: none;"></a>

<div id="main_navigation">
	<h3>панель экспорта</h3>
	<form id="shifts_export" method="post" enctype="multipart/form-data">
		<table>
		<tr>
			<td><input type="file" name="shift"></td>
			<td><input type="submit" name="export" value="ok"></td>
		</tr>
		<tr>
			<td><input type="text" name="year_month" value="{date("Y-m")}"></td>
		</tr>
		</table>
	</form>
	<h3>фильтр даты</h3>
	{include file='dayFilter.tpl'}
	<h3>фильтр смен</h3>
	<form id="shift_select" method="get">
		
		{if ($duration == 8)}
		<input type="submit" name="shift_type" class="selected" value="8">
		{else}
		<input type="submit" name="shift_type" value="8">
		{/if}
		{if ($duration == 12)}
		<input type="submit" name="shift_type" class="selected" value="12">
		{else}
		<input type="submit" name="shift_type" value="12">
		{/if}
		<input type="hidden" name="from" value="{$FILTER.from}">
		<input type="hidden" name="to" value="{$FILTER.to}">
		<input type="hidden" name="shift_class" value="{$type}">
		<input type="hidden" name="shift_class" value="{$type}">
		<input type="hidden" name="city" value="{$city}">
	</form>
	<h3>тип смен</h3>
	<form id="shift_select" method="get">
		
		{if ($type == "tech")}
		<input type="submit" name="shift_class" class="selected" value="tech">
		{else}
		<input type="submit" name="shift_class" value="tech">
		{/if}
		{if ($type == "manager")}
		<input type="submit" name="shift_class" class="selected" value="manager">
		{else}
		<input type="submit" name="shift_class" value="manager">
		{/if}
		<input type="hidden" name="from" value="{$FILTER.from}">
		<input type="hidden" name="to" value="{$FILTER.to}">
		<input type="hidden" name="shift_type" value="{$duration}">
		<input type="hidden" name="shift_type" value="{$duration}">
		<input type="hidden" name="city" value="{$city}">
	</form>
	
	<h3>город</h3>
	<div id="daySelect">
	<form method="get">
		<select name="city">
		{foreach from=$CITIES item=city_cur key=city_eng}
			{if ($city_eng == $city)}
			<option selected value="{$city_eng}">{$city_cur}</option>
			{else}
			<option value="{$city_eng}">{$city_cur}</option>
			{/if}
		{/foreach}
		</select>
		
		<input type="submit" name="shift_class" value="ok">
		<input type="hidden" name="from" value="{$FILTER.from}">
		<input type="hidden" name="to" value="{$FILTER.to}">
		<input type="hidden" name="shift_type" value="{$duration}">
		<input type="hidden" name="shift_type" value="{$duration}">
		<input type="hidden" name="shift_class" value="{$type}">
	</form>
	</div>

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
		<td class="date">{(int)($date[2])}</td>
		<td class="date">{$week_day}</td>
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
			<td {$td_class}>
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

</body>
</html>
