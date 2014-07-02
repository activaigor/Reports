    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Дата', 'Звонков'],
	  {if ($cdr_stat != Null)}
		  {foreach from=$cdr_stat item=row key=datetime}
		  {$time = explode(" ",$datetime)}
	          ['{$time.1}',  {$row.calls}],
		  {/foreach}
	  {else}
	          ['0',  0]
	  {/if}
        ]);

        var options = {
	  chartArea: {
	  	left: 25,
	  	width: "75%", 
		height: "75%" 
	  },
          title: 'Интенсивность звонков',
	  enableInteractivity: true,
          hAxis: {
	  	showTextEvery: 10,
		title: 'Время',  
		titleTextStyle: {
			color: '#333'
		}
	},
          vAxis: {
		minValue: 0
	}
        };
	var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	//function initialize () {
	//	$("#test_cl").click(function() {
	//		drawChart();
	//	});
	//}
      google.load("visualization", "1", {
		packages:["corechart"]
	});
      google.setOnLoadCallback(drawChart);

    </script>



<script type="text/javascript">
	var agentNames = [
		{foreach from=$agentsNames item=name}
		"{$name}",
		{/foreach}
	];
        $(document).ready(function(){
                $(function() {
			$('.datepicker').datetimepicker({
				format:'Y-m-d H:i',
				step:30
			});
			var a = audiojs.createAll({
				'useFlash' : true
			});
			var audio = a[0];
			$(".play_wav").click(function(e){
				audio.pause();
				var record = "/includes/records/monitor/" + $(this).attr("record") + ".WAV";
				audio.load(record);
				audio.updatePlayhead(0);
				audio.skipTo(0);
				audio.play();
			});
                        //$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
			$("#cdr_header").find(".input_a").click(function(){
				$(this).toggle();
				$(this).parent().find("input").toggle();
			});
			$("#cdr_header").find(".select_a").click(function(){
				$(this).toggle();
				$(this).parent().find("select").toggle();
			});
			$( "#name_fill" ).autocomplete({
				source: agentNames
			});
						
			$("#cdr_window").html("====");

			$("#repeat_butt").click(function(){
				if ($("#cdr_window").html() === "====") {
					$("#cdr_window").animate({
						height: "200px"
					} , 250, function(){
						$("#cdr_window").html(
							"<table>" + 
							"<thead>" + 
							"<tr><td align=\"center\" width=\"50\">Номер</td><td align=\"center\" width=\"40\">Повторов</td></tr>" + 
							"</thead>" + 
							"<tbody>" + 
							{foreach from=$repeat_calls item=call}
							"<tr><td><a href=\"/cdr{$cdr->add_filter($smarty.get,'caller',$call.caller)}\">{$call.caller}</a></td><td>{$call.count}</td></tr>" +
							{/foreach}
							"</tbody>" + 
							"</table>"
						);
					
					});
				} else {
					$("#cdr_window").animate({
						height: "20px"
					} , 250, function(){
						$("#cdr_window").html("====");
					});
				}
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
        });

</script>

<form action="{$smarty.server.REQUEST_URI}" method="post">

	<div id="daySelect">
		<input type="text" class="datepicker" name="from" value="{$DATE_FILTERS.from}">
		<input type="text" class="datepicker" name="to" value="{$DATE_FILTERS.to}">
		<input type="submit" value="ok">
	</div>
	
		<div id="wav_player" style="display: none">
			<audio preload="auto"><source src=""></audio>
		</div>

	<div id="cdr_stat">
		<table cellspacing="0" id="main_stats">
			<tr>
				<td width="80">Звонков</td>
				<td width="100">{$total_calls}</td>
			</tr>
			<tr>
				<td width="80">Пропущенных</td>
				<td width="100">{$missed_calls}</td>
			</tr>
			<tr>
				<td width="80">Повторных</td>
				<td width="100"><a href="#" id="repeat_butt">{count($repeat_calls)}</a></td>
			</tr>
			<tr>
				<td width="80">Ожидание</td>
				<td width="100">{$avg_holdtime}</td>
			</tr>
			<tr>
				<td colspan="2">
					<div id="cdr_window" align="center">====</div>
				</td>
			</tr>
		</table>
		<div id="chart_div"></div>
	</div>
	
	<div id="pre_cdr">
		<a href="/cdr" id="refresh_filters">сбросить фильтры</a>
	</div>

	<table id="cdr" cellspacing="0">
		<thead id="cdr_header">
		<tr>
			<td width="130">
				<span>старт</span>
			</td>
			<td width="90">
				<a class="input_a" href="javascript: void(0)">оператор</a>
				<input style="display: none;" type="text" name="dstchannel" id="name_fill" value="{$input_filters.dstchannel}">
			</td>
			<td width="100">
				<a class="input_a" href="javascript: void(0)">вход</a>
				<input style="display: none;" type="text" name="callie" value="{$input_filters.callie}">
			</td>
			<td width="170">
				<a class="select_a" href="javascript: void(0)">линия</a>

				<select style="display: none" name="queue_alias">
					<option value=""></option>
					{foreach from=$queues item=queue_ru key=queue_en}
					{if ($input_filters.queue_alias == $queue_en)}
					<option value="{$queue_en}" selected>{$queue_ru}</option>
					{else}
					<option value="{$queue_en}">{$queue_ru}</option>
					{/if}
					{/foreach}
				</select>
			</td>
			<td width="100">
				<a class="input_a" href="javascript: void(0)">клиент</a>
				<input style="display: none;" type="text" name="caller" value="{$input_filters.caller}">
			</td>
			<td width="60">
				<a class="input_a" href="javascript: void(0)">ожидание</a>
				<input style="display: none;" type="text" name="holdtime" value="{$input_filters.holdtime}">
			</td>
			<td width="60">
				<a class="input_a" href="javascript: void(0)">разговор</a>
				<input style="display: none;" type="text" name="speaktime" value="{$input_filters.speaktime}">
			</td>
			<td width="40">
			</td>
		</tr>
		</thead>
		<tbody style="height:100px; overflow:auto;">
		{$i = 0}
		{$k = 0}
		{$PREV_PAGE = $PAGE - 1}
		{$NEXT_PAGE = $PAGE + 1}
		
		{if ($PAGE > 1)}
		<tr class="row{$i%2}">
			<td colspan="8" class="cdr_prevnext"><a href="/{$city}/cdr{$pages_url.$PREV_PAGE}">назад</a></td>
		</tr>
		{/if}
	
		{if ($cdr_table != Null)}
		{foreach from=$cdr_table item=row}
		{$k = $k + 1}
		{if ($k >= $PREV_PAGE*50 and $k <= $PAGE*50)}
		{$i = $i + 1}
		<tr class="row{$i%2}">
			<td width="130">{$row.start}</td>
			<td width="90">{$row.dstchannel}</td>
			<td width="100">{$row.callie}</td>
			<td width="170">{$row.city_queue}</td>
			<td width="100">{$row.caller}</td>
			<td width="60">{$row.holdtime}</td>
			<td width="60">{$row.speaktime}</td>
			{if ($row.answered == 1)}
			<td width="30"><a href="javascript: void(0)" class="play_wav" record="{$row.record}"><img src="/includes/pictures/media-play.png"></a></td>
			{else}
			<td width="30"></td>
			{/if}
		</tr>
		{/if}
		{/foreach}
		{/if}
		{$i = $i + 1}
		{if ($PAGE != $pages_count)}
		<tr class="row{$i%2}">
			<td colspan="8" class="cdr_prevnext"><a href="/{$city}/cdr{$pages_url.$NEXT_PAGE}">далее</a></td>
		</tr>
		{/if}
		
		</tbody>
	</table>


</form>
