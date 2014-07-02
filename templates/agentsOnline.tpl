<a href="/" id="mainLogo"><img src="includes/pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>

<table id="offlineStats" cellspacing="10">
	<tr>
		<td width="130" style="padding-left: 20px">ОФФЛАЙН:</td>
		<td width="70" style="border-right: 1px dotted grey;" id="offline"></td>
		<td width="170" style="padding-left: 20px">НА ЛИНИИ:</td>
		<td id="online"></td>
	</tr>
</table>

<table id="agentsStat" width="60%" cellspacing="0">
	<tbody>
		<!-- DATA WILL BE PASSED HERE --!>
	</tbody>
</table>

<div id="callersStatDiv">
<div id="callersDiv">
<table id="callersStat">
	<thead>
		<tr><td colspan="2">входящая линия</td></tr>
	</thead>
	<tbody>
		<!-- DATA WILL BE PASSED HERE --!>
	</tbody>
</table>
</div>
</div>
{if ($loginStatus==1 && $loginRule > 1)}
<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0)" id="detailAgent">ДЕТАЛЬНО</a>
	{if ($loginRule > 2)}
	<a href="javascript: void(0)" id="spyAgent">ПРОСЛУШАТЬ</a>
	{/if}
   	<a href="javascript: void(0)" id="removeHistory">УДАЛИТЬ</a>
	<a href="javascript: void(0)" id="agentNote">КОММЕНТАРИЙ</a>
</div>
{/if}
