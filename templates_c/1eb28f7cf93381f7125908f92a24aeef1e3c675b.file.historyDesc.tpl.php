<?php /* Smarty version Smarty-3.1.12, created on 2013-06-13 11:58:18
         compiled from "/var/www/html/agents/templates/historyDesc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205408092950cf23fc087974-26278674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1eb28f7cf93381f7125908f92a24aeef1e3c675b' => 
    array (
      0 => '/var/www/html/agents/templates/historyDesc.tpl',
      1 => 1371113695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205408092950cf23fc087974-26278674',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cf23fc08a4e5_92308989',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cf23fc08a4e5_92308989')) {function content_50cf23fc08a4e5_92308989($_smarty_tpl) {?><div id="historyDesc" style="display: none;" class="myDialog">
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