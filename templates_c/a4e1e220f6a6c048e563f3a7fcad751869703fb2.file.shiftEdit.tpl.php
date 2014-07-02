<?php /* Smarty version Smarty-3.1.12, created on 2013-06-10 09:29:37
         compiled from "/var/www/html/agents/templates/shiftEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114121170051b57251d3c6d1-81876039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4e1e220f6a6c048e563f3a7fcad751869703fb2' => 
    array (
      0 => '/var/www/html/agents/templates/shiftEdit.tpl',
      1 => 1370006252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114121170051b57251d3c6d1-81876039',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51b57251d3e2f8_12773881',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b57251d3e2f8_12773881')) {function content_51b57251d3e2f8_12773881($_smarty_tpl) {?><form method="post">
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