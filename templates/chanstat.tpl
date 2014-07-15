    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Дата', 'Звонков'],
	  {foreach from=$cdr_stat_mtc item=row key=datetime}
	  {$time = explode(" ",$datetime)}
          ['{$time.1}',  {$row.calls}],
	  {/foreach}
        ]);

        var options = {
	  chartArea: {
	  	left: 25,
	  	width: "90%", 
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
	var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div_chans'));
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
        $(document).ready(function(){
                $(function() {
			$('.datepicker').datetimepicker({
				format:'Y-m-d H:i',
				step:30
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
	
</form>

<div id="gsm_channels">
	{foreach from=$mtc_chans item=chan}
		<div class="{$chan.status}">
			<span>{$chan.name}</span>
		</div>
	{/foreach}
</div>
	
<div id="cdr_stat">
	<div id="chart_div_chans"></div>
</div>


