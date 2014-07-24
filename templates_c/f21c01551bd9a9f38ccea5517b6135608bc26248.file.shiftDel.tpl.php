<?php /* Smarty version Smarty-3.1.12, created on 2014-07-11 14:29:30
         compiled from "/var/www/html/Reports/templates/shiftDel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128549424453bfca9a96bec4-41006788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f21c01551bd9a9f38ccea5517b6135608bc26248' => 
    array (
      0 => '/var/www/html/Reports/templates/shiftDel.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128549424453bfca9a96bec4-41006788',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53bfca9a9738c5_63615554',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bfca9a9738c5_63615554')) {function content_53bfca9a9738c5_63615554($_smarty_tpl) {?><form method="post">
	<table id="bodyWindow">
		<tr>
			<td colspan="2"><input id="last_name" name="last_name" type="text" value="" disabled></td>
		</tr>
		<tr>
			<td width="250"><input id="start" name="start" type="text" value="" disabled></td>
			<td width="250"><input id="end" name="end" type="text" value="" disabled></td>
		</tr>
		<tr colspan="2">
			<td colspan="2"><input type="submit" name="delete" value="delete"></td>
		</tr>
	</table>
	<input type="hidden" name="id" id="shift_id" value="">
</form>
<?php }} ?>