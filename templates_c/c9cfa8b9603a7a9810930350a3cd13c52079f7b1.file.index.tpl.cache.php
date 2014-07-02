<?php /* Smarty version Smarty-3.1.12, created on 2012-12-04 16:41:00
         compiled from "/var/www/html/reports/agentsTemp/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20140948950bdfd8275a054-32325389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9cfa8b9603a7a9810930350a3cd13c52079f7b1' => 
    array (
      0 => '/var/www/html/reports/agentsTemp/templates/index.tpl',
      1 => 1354631162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20140948950bdfd8275a054-32325389',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bdfd827a9f56_35171603',
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bdfd827a9f56_35171603')) {function content_50bdfd827a9f56_35171603($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

Привет, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
, это тест.
<?php }} ?>