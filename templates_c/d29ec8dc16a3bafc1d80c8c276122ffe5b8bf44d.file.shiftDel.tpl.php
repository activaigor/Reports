<?php /* Smarty version Smarty-3.1.12, created on 2013-06-10 09:29:37
         compiled from "/var/www/html/agents/templates/shiftDel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18909657251b57251d40de3-18143129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd29ec8dc16a3bafc1d80c8c276122ffe5b8bf44d' => 
    array (
      0 => '/var/www/html/agents/templates/shiftDel.tpl',
      1 => 1369904461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18909657251b57251d40de3-18143129',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51b57251d42c49_55295008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b57251d42c49_55295008')) {function content_51b57251d42c49_55295008($_smarty_tpl) {?><form method="post">
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