<?php /* Smarty version Smarty-3.1.12, created on 2014-07-24 12:06:35
         compiled from "/var/www/html/Reports/templates/dayFilter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79512870153d0cc9b88eda7-02677067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9779e0769db56ccf47911a9178ea9ae72fcab4c' => 
    array (
      0 => '/var/www/html/Reports/templates/dayFilter.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79512870153d0cc9b88eda7-02677067',
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
  'unifunc' => 'content_53d0cc9b8c4fa7_28989263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0cc9b8c4fa7_28989263')) {function content_53d0cc9b8c4fa7_28989263($_smarty_tpl) {?><div id="daySelect">
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