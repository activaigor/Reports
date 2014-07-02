<?php /* Smarty version Smarty-3.1.12, created on 2013-05-31 16:17:33
         compiled from "/var/www/html/agents/BETA/templates/shiftAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191391439851a5d22274c552-88614317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '191391439851a5d22274c552-88614317',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51a5d22274e504_44948904',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a5d22274e504_44948904')) {function content_51a5d22274e504_44948904($_smarty_tpl) {?><form method="post">
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