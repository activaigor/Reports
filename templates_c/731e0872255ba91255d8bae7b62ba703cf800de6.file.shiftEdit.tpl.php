<?php /* Smarty version Smarty-3.1.12, created on 2013-05-31 16:17:33
         compiled from "/var/www/html/agents/BETA/templates/shiftEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54545233351a6f958320346-22946570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '731e0872255ba91255d8bae7b62ba703cf800de6' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/shiftEdit.tpl',
      1 => 1370006252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54545233351a6f958320346-22946570',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51a6f958322e71_58299941',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a6f958322e71_58299941')) {function content_51a6f958322e71_58299941($_smarty_tpl) {?><form method="post">
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