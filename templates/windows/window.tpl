<div id="{$window.id}" class="myWindow" style="display: {$window.display}; width: {$window.width}px; height: {$window.height}px; margin-left: -{$window.width/2}px; margin-top: -{$window.height/2}px">
	<table class="titleWindow">
		<tr>
			<td width="95%">{$window.title}</td>
			<td width="5%" class="closeButt"><a onClick='$("#{$window.id}").toggle();' href="javascript: void(0);">x</a></td>
		</tr>
	</table>
	<div style="overflow: auto; height: {$window.height-20}px">
		{include file=./$window.body}
	</div>
</div>
