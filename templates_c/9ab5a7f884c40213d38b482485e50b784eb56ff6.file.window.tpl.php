<?php /* Smarty version Smarty-3.1.12, created on 2014-05-26 16:07:58
         compiled from "/var/www/html/agents/BETA/templates/window.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123789449153833cae006f56-68951870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ab5a7f884c40213d38b482485e50b784eb56ff6' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/window.tpl',
      1 => 1359732485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123789449153833cae006f56-68951870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53833cae0517f4_86189702',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53833cae0517f4_86189702')) {function content_53833cae0517f4_86189702($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['window']->value['id'];?>
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