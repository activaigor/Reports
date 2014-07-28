<?php /* Smarty version Smarty-3.1.12, created on 2014-05-30 15:34:23
         compiled from "/var/www/html/agents/BETA/templates/shiftEdit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165420932353887acf5abcb0-17423531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '165420932353887acf5abcb0-17423531',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53887acf5bd567_70964550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53887acf5bd567_70964550')) {function content_53887acf5bd567_70964550($_smarty_tpl) {?><form method="post">
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