<?php /* Smarty version Smarty-3.1.12, created on 2014-07-18 16:14:03
         compiled from "/var/www/html/Reports/templates/whoCall.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206902206653b680ec275233-92568865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc4fa6c33d77b9381f59f67c28d57e0431b0922c' => 
    array (
      0 => '/var/www/html/Reports/templates/whoCall.tpl',
      1 => 1405689152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206902206653b680ec275233-92568865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53b680ec27dd93_61253128',
  'variables' => 
  array (
    'userPhoto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b680ec27dd93_61253128')) {function content_53b680ec27dd93_61253128($_smarty_tpl) {?><div id="whoCall" style="display: none;">
	<div class="avatar" style="background-image: url(https://my.lanet.ua/download.php?source=photo&id=<?php echo $_smarty_tpl->tpl_vars['userPhoto']->value;?>
);">
		<!--<img src="https://my.lanet.ua/download.php?source=photo&id=<?php echo $_smarty_tpl->tpl_vars['userPhoto']->value;?>
" alt="avatar" />-->
	</div>
	<table id="whoCallBar">
	</table>

	<div id="callInfo">
		<table id="newCall" cellspacing="0">
			<tr>
				<td>Клиент</td><td width="250" id="fio"></td>
				<td id="numb"></td>
			</tr>
			<tr>
				<td>Город</td><td width="200" id="city"></td>
				<td align="right" id="lang"></td>
			</tr>
		</table>
	</div>

	<table id="advBar" cellspacing="2">
		<tr>
			<td width="120" id="whoCall_begin"></td>
			<td width="110" id="whoCall_online"></td>
			<td width="110" id="whoCall_pause"></td>
			<td width="150" id="whoCall_shift"></td>
		</tr>
		<tr>
			<td id="whoCall_end"></td>
			<td id="whoCall_offline"></td>
			<td id="whoCall_duration"></td>
			<td id="whoCall_ip"></td>
		</tr>
	</table>
	
	<div id="changeStatus-online" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="online">
		<ul class="status_action"><li><a href="#" id="statusonline" status="none">online</a>
		<ul>
			<li><a href="#" id="statusaway" status="pause">away</a></li>
			<li><a href="#" id="statuslunch" status="lunch">lunch</a></li>
			<li><a href="#" id="statusoffline" status="offline">offline</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-offline" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="offline">
		<ul class="status_action"><li><a href="#" id="statusoffline" status="none">offline</a>
		<ul>
			<li><a href="#" id="statuslunch" status="lunch">lunch</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-lunch" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="lunch">
		<ul class="status_action"><li><a href="#" id="statuslunch" status="none">lunch</a>
		<ul>
			<li><a href="#" id="statusoffline" status="offline">offline</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-busy" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="busy">
		<ul class="status_action"><li><a href="#" id="statusbusy" status="none">busy</a></li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-away" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="away">
		<ul class="status_action"><li><a href="#" id="statusaway" status="none">pause</a>
		<ul>
			<li><a href="#" id="statusonline" status="unpause">online</a></li>
			<li><a href="#" id="statuslunch" status="lunch">lunch</a></li>
			<li><a href="#" id="statusoffline" status="offline">offline</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>

</div>
<?php }} ?>