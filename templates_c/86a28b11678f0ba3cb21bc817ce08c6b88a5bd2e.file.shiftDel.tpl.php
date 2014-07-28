<?php /* Smarty version Smarty-3.1.12, created on 2014-05-30 15:34:23
         compiled from "/var/www/html/agents/BETA/templates/shiftDel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79684730153887acf5c21d2-71212858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '79684730153887acf5c21d2-71212858',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53887acf5d4817_91372546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53887acf5d4817_91372546')) {function content_53887acf5d4817_91372546($_smarty_tpl) {?><form method="post">
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