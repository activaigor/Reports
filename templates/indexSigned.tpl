	{if ($loginRule >= 3)}
	<div id="realtimeBlock" style="width: 60%">
		{include file="agentsOnline.tpl"}
	</div>
	{else if ($loginRule == 2 || $loginRule == 1)}
	<div id="realtimeBlock" style="width: 99%">
		{include file="agentsOnline.tpl"}
	</div>
	{/if}
	
	<div id="loginP">
		<strong>Вы вошли в систему как {$user}</strong>
		<a href="/logout">Выйти</a>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px; margin-left: -85px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href="/"><span>меню</span></a>
      		<ul>
                <!--<li><a href="javascript: show_logs();" id="showLogging"><span>логирование</span></a></li>-->
            	{foreach from=$login_features item=feature_en}
                	<li><a href="/{$feature_en}" target="__blank"><span>{$FEATURES.$feature_en}</span></a></li>
		{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href="/"><span>{$CITIES.$city}</span></a>
      		<ul>
            	{foreach from=$login_city item=city_en}
                	<li><a href="/{$city_en}"><span>{$CITIES.$city_en}</span></a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px; margin-left: 85px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href="/"><span>{$QUEUES.$queue}</span></a>
      		<ul>
            	{foreach from=$QUEUES item=queueName key=index}
                	<li><a href="/{$city}_{$index}"><span>{$queueName}</span></a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>

	{if ($loginRule >= 3)}
	<iframe id="historyFrame" src="includes/agentsHistory.php?city={$city}&queue={$queue}" width="38%" height="85%"></iframe>
	<a id="showLate" href="javascript: toggleLate('{$city}','{$queue}');">Показать опоздавших</a>
	<a id="showDisturb" href="javascript: toggleDist('{$city}','{$queue}');">история нарушений</a>

	
	<div id="lateDiv" style="display: none;">
		<table id="titleWindow">
			<tr>
				<td width="95%">Окно истории</td>
				<td width="5%" id="nameTitle"><a href="javascript: toggleLate('{$city}');">x</a></td>
			</tr>
		</table>
		<iframe id="lateFrame" src="includes/agentsLate.php"></iframe>
	</div>
	<div id="distDiv" style="display: none;">
		<table id="titleWindow">
			<tr>
			<td width="95%">Окно истории</td>
			<td width="5%" id="nameTitle"><a href="javascript: toggleDist('{$city}');">x</a></td>
			</tr>
		</table>
		<iframe id="distFrame" src="includes/agentsDist.php"></iframe>
	</div>

	{if ($loginRule > 3)}
	<div id="makeReportButt">
    	<a onMouseOver='$("#reportLable").toggle()' onMouseOut='$("#reportLable").toggle()' href="/includes/makeReport.php?queue={$queue}" target="_blank">B</a>
    	<p id="reportLable" style="display: none;">СДЕЛАТЬ<br>ОТЧЕТ</p>
	</div>
	{/if}
	{/if}
	
