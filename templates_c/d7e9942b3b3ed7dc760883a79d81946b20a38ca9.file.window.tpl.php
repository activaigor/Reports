<?php /* Smarty version Smarty-3.1.12, created on 2013-05-29 12:37:50
         compiled from "/var/www/html/agents/BETA/templates/windows/window.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43456613151a5ca6ca2b2c8-37118401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7e9942b3b3ed7dc760883a79d81946b20a38ca9' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/windows/window.tpl',
      1 => 1369820270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43456613151a5ca6ca2b2c8-37118401',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51a5ca6ca64b59_68210179',
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a5ca6ca64b59_68210179')) {function content_51a5ca6ca64b59_68210179($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['window']->value['id'];?>
" class="myWindow" style="display: <?php echo $_smarty_tpl->tpl_vars['window']->value['display'];?>
; width: <?php echo $_smarty_tpl->tpl_vars['window']->value['width'];?>
px; height: <?php echo $_smarty_tpl->tpl_vars['window']->value['height'];?>
px; margin-left: -<?php echo $_smarty_tpl->tpl_vars['window']->value['width']/2;?>
px; margin-top: -<?php echo $_smarty_tpl->tpl_vars['window']->value['height']/2;?>
px">
	<table class="titleWindow">
		<tr>
			<td width="95%"><?php echo $_smarty_tpl->tpl_vars['window']->value['title'];?>
</td>
			<td width="5%" class="closeButt"><a onClick='$("#<?php echo $_smarty_tpl->tpl_vars['window']->value['id'];?>
").toggle();' href="javascript: void(0);">x</a></td>
		</tr>
	</table>
	<div style="overflow: auto; height: <?php echo $_smarty_tpl->tpl_vars['window']->value['height']-20;?>
px">
		<?php echo $_smarty_tpl->getSubTemplate ('windows'/$_smarty_tpl->tpl_vars['window']->value['body'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div>
<?php }} ?>