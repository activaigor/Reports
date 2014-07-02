<?php /* Smarty version Smarty-3.1.12, created on 2013-05-30 12:01:25
         compiled from "/var/www/html/agents/BETA/templates/shiftDel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55347731451a7006e8af5f3-16737168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86a28b11678f0ba3cb21bc817ce08c6b88a5bd2e' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/shiftDel.tpl',
      1 => 1369904461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55347731451a7006e8af5f3-16737168',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51a7006e8b1083_20833426',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a7006e8b1083_20833426')) {function content_51a7006e8b1083_20833426($_smarty_tpl) {?><form method="post">
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