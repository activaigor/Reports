<html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/makeReport.css"\>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/jquery-ui.css"\>
<script src="../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../includes/js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
	});
</script>
<style type="text/css" media="print,screen" >
th {
    font-family:Arial;
    color:black;
    background-color:lightgrey;
}
thead {
    display:table-header-group;
}
tbody {
    display:table-row-group;
}
</style>
</head>
<body>
<a href="../index.php" id="mainLogo"><img src="/includes/pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>
<table id="makeReport">
	<thead>
		<tr id="reportHead">
			<td>№</td>
			<form method="get">
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
{include file="day-cityFilter.tpl"}

</body>
</html>
