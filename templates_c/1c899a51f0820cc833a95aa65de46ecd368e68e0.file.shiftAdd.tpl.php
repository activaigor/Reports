<?php /* Smarty version Smarty-3.1.12, created on 2014-07-11 14:29:30
         compiled from "/var/www/html/Reports/templates/shiftAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136706831853bfca9a9596d4-79316772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c899a51f0820cc833a95aa65de46ecd368e68e0' => 
    array (
      0 => '/var/www/html/Reports/templates/shiftAdd.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136706831853bfca9a9596d4-79316772',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53bfca9a960c12_75519696',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bfca9a960c12_75519696')) {function content_53bfca9a960c12_75519696($_smarty_tpl) {?><form method="post">
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