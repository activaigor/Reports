<?php /* Smarty version Smarty-3.1.12, created on 2014-07-11 14:29:30
         compiled from "/var/www/html/Reports/templates/shiftEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177608967253bfca9a962fe4-00009308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10d76c45afa0682609e5a7f2d80be4cc0aa110fe' => 
    array (
      0 => '/var/www/html/Reports/templates/shiftEdit.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177608967253bfca9a962fe4-00009308',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53bfca9a969032_27927638',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bfca9a969032_27927638')) {function content_53bfca9a969032_27927638($_smarty_tpl) {?><form method="post">
	<table id="bodyWindow">
		<tr>
			<td colspan="2"><input class="name_fill" id="last_name" name="last_name" type="text" value=""></td>
		</tr>
		<tr>
			<td width="250"><input id="start" name="start" type="text" value=""></td>
			<td width="250"><input id="end" name="end" type="text" value=""></td>
		</tr>
		<tr colspan="2">
			<td colspan="2"><input type="submit" name="edit" value="save"></td>
		</tr>
	</table>
	<input type="hidden" name="id" id="shift_id" value="">
	<input type="hidden" name="cur_day" id="cur_day" value="">
</form>
<?php }} ?>