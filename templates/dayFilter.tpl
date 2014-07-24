<div id="daySelect">
	<form action="{$smarty.server.REQUEST_URI}" method="get">
		<input type="text" class="datepicker" name="from" value="{$FILTER.from}">
		<input type="text" class="datepicker" name="to" value="{$FILTER.to}">
		<input type="submit" value="ok">
		<input type="hidden" name="show" value="1">
		<input type="hidden" name="city" value="{$city}">
		<input type="hidden" name="queue" value="{$queue}">
	</form>
</div>
