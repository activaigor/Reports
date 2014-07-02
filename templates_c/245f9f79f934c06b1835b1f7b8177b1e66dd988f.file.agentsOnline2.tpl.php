<?php /* Smarty version Smarty-3.1.12, created on 2013-01-10 15:23:28
         compiled from "/var/www/html/agents/BETA/templates/agentsOnline2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94171541050ee83ac111051-48747318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '245f9f79f934c06b1835b1f7b8177b1e66dd988f' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/agentsOnline2.tpl',
      1 => 1357824194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94171541050ee83ac111051-48747318',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ee83ac123b11_07460569',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ee83ac123b11_07460569')) {function content_50ee83ac123b11_07460569($_smarty_tpl) {?><a href="agentsOnline.php" id="mainLogo"><img src="includes/pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>

<table id="offlineStats" cellspacing="10">
	<tr>
		<td width="130" style="padding-left: 20px">ОФФЛАЙН:</td>
		<td width="70" style="border-right: 1px dotted grey;" id="offline"></td>
		<td width="170" style="padding-left: 20px">НА ЛИНИИ:</td>
		<td id="online"></td>
	</tr>
</table>

<table id="agentsStat" width="60%">
	<tbody>
		<!-- DATA WILL BE PASSED HERE --!>
	</tbody>
</table>

<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0)" id="detailAgent">ДЕТАЛЬНО</a>
	<a href="javascript: void(0)" id="spyAgent">ПРОСЛУШАТЬ</a>
   	<a href="javascript: void(0)" id="removeHistory">УДАЛИТЬ</a>
	<a href="javascript: void(0)" id="agentNote">КОММЕНТАРИЙ</a>
</div>
<?php }} ?>