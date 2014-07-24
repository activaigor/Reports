<div id="daySelect">
	<form action="{$smarty.server.REQUEST_URI}" method="get">
		<table>
			<tr>
				<td><input type="text" class="datepicker" name="from" value="{$FILTER.from}"></td>
				<td><input type="text" class="datepicker" name="to" value="{$FILTER.to}"></td>
			</tr>
			<tr>
				<td>
					<select name="city">
					{foreach from=$CITIES item=city key=value}
						{if ($FILTER.city == $value)}	
							<option selected value="{$value}">{$city}</option>
						{else}
							<option value="{$value}">{$city}</option>
						{/if}
					{/foreach}
					</select>
				</td>
				<td><input type="submit" value="OK"></td>
				<input type="hidden" name="order" value="{$ORDER}">
				{if (isset($queue))}
				<input type="hidden" name="queue" value="{$queue}">
				{/if}
		</table>
	</form>
</div>
