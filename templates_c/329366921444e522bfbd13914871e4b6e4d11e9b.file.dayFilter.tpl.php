<?php /* Smarty version Smarty-3.1.12, created on 2014-06-11 12:57:13
         compiled from "/var/www/html/agents/BETA/templates/dayFilter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:591177605539827f9361645-67277174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '329366921444e522bfbd13914871e4b6e4d11e9b' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/dayFilter.tpl',
      1 => 1378109128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '591177605539827f9361645-67277174',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FILTER' => 0,
    'city' => 0,
    'queue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_539827f937e604_96828875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539827f937e604_96828875')) {function content_539827f937e604_96828875($_smarty_tpl) {?><div id="daySelect">
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="get">
		<input type="text" class="datepicker" name="from" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['from'];?>
">
		<input type="text" class="datepicker" name="to" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['to'];?>
">
		<input type="submit" value="ok">
		<input type="hidden" name="show" value="1">
		<input type="hidden" name="city" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
">
		<input type="hidden" name="queue" value="<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
">
	</form>
</div>
<?php }} ?>