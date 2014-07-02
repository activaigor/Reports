<?php /* Smarty version Smarty-3.1.12, created on 2013-03-28 10:47:52
         compiled from "/var/www/html/agents/templates/window.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129198531050ec191d1830f5-58834241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9e070b5d08e5fd093ec2effc2b0391ed7ac3934' => 
    array (
      0 => '/var/www/html/agents/templates/window.tpl',
      1 => 1364460266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129198531050ec191d1830f5-58834241',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ec191d1b7040_32820148',
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ec191d1b7040_32820148')) {function content_50ec191d1b7040_32820148($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['window']->value['id'];?>
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