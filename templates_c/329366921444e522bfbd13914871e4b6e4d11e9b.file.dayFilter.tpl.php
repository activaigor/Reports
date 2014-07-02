<?php /* Smarty version Smarty-3.1.12, created on 2013-06-01 10:14:27
         compiled from "/var/www/html/agents/BETA/templates/dayFilter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1148585356518a1694a58057-29856252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '329366921444e522bfbd13914871e4b6e4d11e9b' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/dayFilter.tpl',
      1 => 1370070862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1148585356518a1694a58057-29856252',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a1694a71e52_69811402',
  'variables' => 
  array (
    'FILTER' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a1694a71e52_69811402')) {function content_518a1694a71e52_69811402($_smarty_tpl) {?><div id="daySelect">
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
	</form>
</div>
<?php }} ?>