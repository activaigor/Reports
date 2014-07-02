<?php /* Smarty version Smarty-3.1.12, created on 2013-05-08 12:10:44
         compiled from "/var/www/html/agents/BETA/templates/historyDesc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1953205359518a1694a528d3-32319620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2eb3e5b32ce22d207f29c1306c0fd5ff2d27f68' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/historyDesc.tpl',
      1 => 1358935596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1953205359518a1694a528d3-32319620',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a1694a55b29_35616134',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a1694a55b29_35616134')) {function content_518a1694a55b29_35616134($_smarty_tpl) {?><div id="historyDesc" style="display: none;" class="myDialog">
	<table id="titleWindow">
		<tr>
			<td width="80%">Окно истории</td>
			<td width="20%" id="nameTitle"></td>
		</tr>
	</table>
	<table id="infoTable">
		<tr>
			<td>Время разговора:</td>
			<td><input id="callTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время онлайна:</td>
			<td><input id="onlineTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время паузы:</td>
			<td><input id="pauseTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время оффлайна:</td>
			<td><input id="offlineTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время опоздания:</td>
			<td><input id="lateTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Начало смены:</td>
			<td><input id="loginTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Конец смены:</td>
			<td><input id="leaveTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td width="170px">Примечание:</td>
			<td><input id="note" type="text" disabled="true" value="пусто"></td>
			<input type="hidden" value="пусто" id="historyId">
		</tr>
	</table>
	<p id="adminLine">
		<a id="historyRedBut" href="javascript: editData();">Редактировать</a>
		<a id="historySaveBut" style="display: none;" href="javascript: saveData();">Сохранить</a>
		<a id="historyDelBut" href="">Удалить</a>
	</p>
    <a id="closeButt" href="javascript: closeData();">Закрыть</a>
</div>
<?php }} ?>