<?php /* Smarty version Smarty-3.1.12, created on 2013-06-10 09:29:37
         compiled from "/var/www/html/agents/templates/shiftAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48349755751b57251d374b6-77988541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '009d180b83367c581ec44000880cd54a089cd0af' => 
    array (
      0 => '/var/www/html/agents/templates/shiftAdd.tpl',
      1 => 1370006238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48349755751b57251d374b6-77988541',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51b57251d397f1_52625559',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b57251d397f1_52625559')) {function content_51b57251d397f1_52625559($_smarty_tpl) {?><form method="post">
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