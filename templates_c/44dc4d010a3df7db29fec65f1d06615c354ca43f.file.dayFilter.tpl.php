<?php /* Smarty version Smarty-3.1.12, created on 2013-09-02 11:05:32
         compiled from "/var/www/html/agents/templates/dayFilter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24495730450d0617944e074-04417988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44dc4d010a3df7db29fec65f1d06615c354ca43f' => 
    array (
      0 => '/var/www/html/agents/templates/dayFilter.tpl',
      1 => 1378109128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24495730450d0617944e074-04417988',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50d06179462b68_90627006',
  'variables' => 
  array (
    'FILTER' => 0,
    'city' => 0,
    'queue' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50d06179462b68_90627006')) {function content_50d06179462b68_90627006($_smarty_tpl) {?><div id="daySelect">
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