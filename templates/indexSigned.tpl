	<div id="loginP">
		<strong>Вы вошли в систему как {$user}</strong>
		<a href="/logout">Выйти</a>
	</div>
	
	<div id="head_nav">
		<div style="height: 50px" class="dot_background">
		<p id="logo">Reports</p>
		</div>
      		<ul id="city_select">
		{if ($feature == "queue")}
			{$queue_href = "/$queue"}
		{else}
			{$queue_href = ""}
		{/if}
            	{foreach from=$login_city item=city_en}
			{if ($city == $city_en)}
                	<li><a class="selected" href="/{$city_en}/{$feature}{$queue_href}"><span>{$CITIES.$city_en}</span></a></li>
			{else}
                	<li><a href="/{$city_en}/{$feature}{$queue_href}"><span>{$CITIES.$city_en}</span></a></li>
			{/if}
            	{/foreach}
      		</ul>
	</div>

	{if ($agent_name != Null)}
		{include file="whoCall.tpl"}
	{/if}
	
	{if ($feature == "queue")}
		<div id="realtimeBlock">
			{include file="agentsOnline.tpl"}
		</div>
	{else if ($feature == "history")}
		<div id="historyBlock">
			{include file="agentsHistory.tpl"}
		</div>
	{else if ($feature == "cdr")}
		<div id="cdrBlock">
			{include file="queueCDR.tpl"}
		</div>
	{else if ($feature == "shifts")}
		<div id="shiftsBlock">
			{include file="shifts.tpl"}
		</div>
	{else if ($feature == "lateness")}
		<div id="latenessBlock">
			{include file="agentsLate.tpl"}
		</div>
	{else if ($feature == "account")}
		<div id="accountBlock">
			{include file="makeReport.tpl"}
		</div>
	{else if ($feature == "logging")}
		<div id="loggingBlock">
			{include file="logging.tpl"}
		</div>
	{else if ($feature == "chanstat")}
		<div id="cdrBlock">
			{include file="chanstat.tpl"}
		</div>
	{/if}

	<div id="main_menu">
      		<ul>
            	{foreach from=$login_features item=feature_en}
			{if ($feature == $feature_en)}
                	<li><a id="selected" href="/{$city}/{$feature_en}" style="background: white url({str_replace("[icon_type]", "light", $ICONS.$feature_en)}) no-repeat center"></a></li>
			{else}
                	<li><a class="unselected" href="/{$city}/{$feature_en}" style="background: url({str_replace("[icon_type]", "light", $ICONS.$feature_en)}) no-repeat center"></a></li>
			{/if}
		{/foreach}
      		</ul>
   		</li>
	</div>

	<!--
	<div style="position: fixed; left: 50%; top: 0px; margin-left: 85px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href="/"><span>{$QUEUES.$queue}</span></a>
      		<ul>
            	{foreach from=$QUEUES item=queueName key=index}
                	<li><a href="/{$city}_{$index}"></a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
	-->

	{if ($feature == "workdata")}
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


	{/if}
	
