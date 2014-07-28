<?php /* Smarty version Smarty-3.1.12, created on 2014-05-26 17:52:15
         compiled from "/var/www/html/agents/BETA/templates/historyDesc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11530518505383551fe03d77-07258698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2eb3e5b32ce22d207f29c1306c0fd5ff2d27f68' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/historyDesc.tpl',
      1 => 1371113695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11530518505383551fe03d77-07258698',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5383551fe1f958_16014427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5383551fe1f958_16014427')) {function content_5383551fe1f958_16014427($_smarty_tpl) {?><div id="historyDesc" style="display: none;" class="myDialog">
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
			<td><input id="loginTime" title="" type="text" disabled="true" value="пусто"></td>
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