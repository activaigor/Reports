	{if ($smarty.server.REMOTE_ADDR == "194.50.85.922")}
	<div id="realtimeBlock" style="width: 99%">
		{include file="agentsOnline.tpl"}
	</div>
	<div id="loginP">
		<strong>Вы не вошли в систему</strong>
		<a href="javascript: toggle('loginBox'); void(0);">Войти</a>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href='#'><span>{$CITIES.$city}</span></a>
      		<ul>
            	{foreach from=$login_city item=city_en}
                	<li><a href="/{$city_en}"><span>{$CITIES.$city_en}</span></a></li>
            	{/foreach}
      		</ul>
   		</li>
	</ul>
	</div>
	
	{include file="loginBox.tpl"}
	{else}
	<a href="/" id="mainLogo"><img src="includes/pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>
	<div id="loginP">
		<strong>Вы не вошли в систему</strong>
	</div>

	<div style="position: absolute; top: 50%; width: 100%; height: 500px; margin-top: -270px; background: url(http://parts.blog.livedoor.jp/img/cmn/dot.gif) white repeat; opacity: 0.3">
	</div>

	
	{include file="loginBoxVisible.tpl"}
	{/if}
