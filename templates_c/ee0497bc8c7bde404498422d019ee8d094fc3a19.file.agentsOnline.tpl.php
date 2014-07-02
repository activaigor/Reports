<?php /* Smarty version Smarty-3.1.12, created on 2013-05-23 12:25:50
         compiled from "/var/www/html/agents/BETA/templates/agentsOnline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:875741238518a1694654680-24248816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee0497bc8c7bde404498422d019ee8d094fc3a19' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/agentsOnline.tpl',
      1 => 1369301106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '875741238518a1694654680-24248816',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a16946617a8_66423400',
  'variables' => 
  array (
    'loginStatus' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a16946617a8_66423400')) {function content_518a16946617a8_66423400($_smarty_tpl) {?><a href="index.php" id="mainLogo"><img src="includes/pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>

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

<?php if (($_smarty_tpl->tpl_vars['loginStatus']->value==1)){?>
<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0)" id="detailAgent">ДЕТАЛЬНО</a>
	<a href="javascript: void(0)" id="spyAgent">ПРОСЛУШАТЬ</a>
   	<a href="javascript: void(0)" id="removeHistory">УДАЛИТЬ</a>
	<a href="javascript: void(0)" id="agentNote">КОММЕНТАРИЙ</a>
</div>
<?php }?>
<?php }} ?>