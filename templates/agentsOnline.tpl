
{if ($user == 'i.rizhiy@lanet.ua')}
<a href="#" onclick='sipRegister();'>Register</a>
<a href="#" onclick='sipCall("call-audio");'>Call</a>
<a href="#" onclick='sipSendDTMF("1");'>1</a>
<a href="#" onclick='sipSendDTMF("6");'>6</a>
<a href="#" onclick='sipSendDTMF("#");'>#</a>
<a href="#" onclick='sipDTMFString("161#161#");'>Login</a>
<audio id="audio_remote"></audio>
{/if}


<table id="offlineStats" cellspacing="1">
	<tr>
		<td width="100" style="padding-left: 20px">ОФФЛАЙН:</td>
		<td id="offline"></td>
		<td width="100" style="padding-left: 20px">НА ЛИНИИ:</td>
		<td id="online"></td>
	</tr>

</table>

<div id="select_queue">
	<div id="cssmenu">
	<ul>
   		<li class="has-sub"><a href="/" id="queue_selected"><span>{$QUEUES.$queue}</span></a>
      		<ul>
            	{foreach from=$login_queue item=queue_en}
                	<li><a href="/{$city}/queue/{$queue_en}">{$QUEUES.$queue_en}</a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
</div>

<div id="agentsStatDiv">
	<table id="agentsStat" cellspacing="0">
		<tbody>
			<!-- DATA WILL BE PASSED HERE --!>
		</tbody>
	</table>
</div>

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
  
