<?php /* Smarty version Smarty-3.1.12, created on 2014-07-24 13:13:50
         compiled from "/var/www/html/Reports-dev/templates/jsVars.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68508431753d0dc5e90c414-40665856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '679a768b4dd3fe42c5b6aeb2d67f9743db8606c9' => 
    array (
      0 => '/var/www/html/Reports-dev/templates/jsVars.tpl',
      1 => 1406196676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68508431753d0dc5e90c414-40665856',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sip' => 0,
    'agent_name' => 0,
    'queue' => 0,
    'city' => 0,
    'detail' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53d0dc5e9a2687_42492988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0dc5e9a2687_42492988')) {function content_53d0dc5e9a2687_42492988($_smarty_tpl) {?><script type="text/javascript">
	var SIP_PHONE = "<?php echo $_smarty_tpl->tpl_vars['sip']->value;?>
";
	var javascriptHandler = "/includes/javascriptHandler.php";
	var agent_name = "<?php echo $_smarty_tpl->tpl_vars['agent_name']->value;?>
";
	var queue = "<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
";
	var city = "<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
";
	var detail = "<?php echo $_smarty_tpl->tpl_vars['detail']->value;?>
";
	var sUser = "<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
";
</script>
<?php }} ?>