<?php /* Smarty version Smarty-3.1.12, created on 2014-05-30 15:34:23
         compiled from "/var/www/html/agents/BETA/templates/shiftAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77916829853887acf599dc2-97950910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3737b195f741845c244722b45b9ee31710ef7041' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/shiftAdd.tpl',
      1 => 1370006238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77916829853887acf599dc2-97950910',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53887acf5a80d7_44983723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53887acf5a80d7_44983723')) {function content_53887acf5a80d7_44983723($_smarty_tpl) {?><form method="post">
	<table id="bodyWindow">
		<tr>
			<td colspan="2"><input class="name_fill" name="last_name" type="text" value=""></td>
		</tr>
		<tr>
			<td width="250"><input name="start" type="text" value=""></td>
			<td width="250"><input name="end" type="text" value=""></td>
		</tr>
		<tr colspan="2">
			<td colspan="2"><input type="submit" name="add" value="ok"></td>
		</tr>
	</table>
	<input type="hidden" name="cur_day" id="cur_day" value="">
</form>
<?php }} ?>