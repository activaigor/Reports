<?php /* Smarty version Smarty-3.1.12, created on 2014-07-16 15:51:55
         compiled from "/var/www/html/Reports/templates/logging.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183708061753c6756b5af222-03849919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c3b465aa3c049d76a511ac2a7bb211277b67996' => 
    array (
      0 => '/var/www/html/Reports/templates/logging.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183708061753c6756b5af222-03849919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'log_text' => 0,
    'line' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53c6756b6123c7_64446691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c6756b6123c7_64446691')) {function content_53c6756b6123c7_64446691($_smarty_tpl) {?><table id="bodyWindow">
	<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['log_text']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value){
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
		<tr><td><?php echo $_smarty_tpl->tpl_vars['line']->value;?>
</td></tr>
	<?php } ?>
</table>
<?php }} ?>