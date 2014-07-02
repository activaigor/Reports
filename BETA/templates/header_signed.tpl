<div id="loginP">
	<strong>Вы вошли в систему как {$user}</strong>
	<a href="/logout">Выйти</a>
</div>
	
{if ($loginRule == 3)}
<div style="position: fixed; left: 50%; top: 0px; margin-left: -85px;" id='cssmenu'>
<ul>
	<li class='has-sub '><a href="/"><span>меню</span></a>
		<ul><li><a href="javascript: show_logs();" id="showLogging"><span>логирование</span></a></li>
		<li><a href="/table" target="__blank"><span>графики смен</span></a></li>
      		</ul>
   	</li>
</ul>
</div>
{/if}
