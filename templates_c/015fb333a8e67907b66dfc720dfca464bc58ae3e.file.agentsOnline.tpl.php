<?php /* Smarty version Smarty-3.1.12, created on 2014-02-05 13:04:34
         compiled from "/var/www/html/agents/templates/agentsOnline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183741466450bf3c6e66c431-08511607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '015fb333a8e67907b66dfc720dfca464bc58ae3e' => 
    array (
      0 => '/var/www/html/agents/templates/agentsOnline.tpl',
      1 => 1391598177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183741466450bf3c6e66c431-08511607',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bf3c6e6ab748_52861844',
  'variables' => 
  array (
    'loginStatus' => 0,
    'loginRule' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bf3c6e6ab748_52861844')) {function content_50bf3c6e6ab748_52861844($_smarty_tpl) {?><a href="/" id="mainLogo"><img src="includes/pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>

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
<?php if (($_smarty_tpl->tpl_vars['loginStatus']->value==1&&$_smarty_tpl->tpl_vars['loginRule']->value>1)){?>
<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0)" id="detailAgent">ДЕТАЛЬНО</a>
	<?php if (($_smarty_tpl->tpl_vars['loginRule']->value>2)){?>
	<a href="javascript: void(0)" id="spyAgent">ПРОСЛУШАТЬ</a>
	<?php }?>
   	<a href="javascript: void(0)" id="removeHistory">УДАЛИТЬ</a>
	<a href="javascript: void(0)" id="agentNote">КОММЕНТАРИЙ</a>
</div>
<?php }?>
<?php }} ?>