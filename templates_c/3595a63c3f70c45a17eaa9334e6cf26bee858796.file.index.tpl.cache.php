<?php /* Smarty version Smarty-3.1.12, created on 2012-12-08 14:03:03
         compiled from "/var/www/html/agents/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83167604250bf0f2a522218-46164446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3595a63c3f70c45a17eaa9334e6cf26bee858796' => 
    array (
      0 => '/var/www/html/agents/templates/index.tpl',
      1 => 1354705289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83167604250bf0f2a522218-46164446',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bf0f2a5696c3_32050791',
  'variables' => 
  array (
    'loginStatus' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bf0f2a5696c3_32050791')) {function content_50bf0f2a5696c3_32050791($_smarty_tpl) {?><?php if (($_smarty_tpl->tpl_vars['loginStatus']->value==1)){?>
<?php echo $_smarty_tpl->getSubTemplate ('headerSigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('indexSigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }elseif(($_smarty_tpl->tpl_vars['loginStatus']->value==0)){?>
<?php echo $_smarty_tpl->getSubTemplate ('headerUnsigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('indexUnsigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }?>
<?php }} ?>