<?php /* Smarty version Smarty-3.1.12, created on 2014-07-24 13:13:50
         compiled from "/var/www/html/Reports-dev/templates/window.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106890525253d0dc5ee3c3e0-20664197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06332a447e646510570ae50e85d8ebc109c38884' => 
    array (
      0 => '/var/www/html/Reports-dev/templates/window.tpl',
      1 => 1406196676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106890525253d0dc5ee3c3e0-20664197',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53d0dc5eed1724_52358649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0dc5eed1724_52358649')) {function content_53d0dc5eed1724_52358649($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['window']->value['id'];?>
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
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['window']->value['body'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div>
<?php }} ?>