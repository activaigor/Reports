<?php /* Smarty version Smarty-3.1.12, created on 2014-07-04 13:24:44
         compiled from "/var/www/html/Reports/templates/jsVars.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92214128053b680ec121db2-10573712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f75646755781f78aa678fae828d720caaa6f1a21' => 
    array (
      0 => '/var/www/html/Reports/templates/jsVars.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92214128053b680ec121db2-10573712',
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
  'unifunc' => 'content_53b680ec16bd66_57343047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b680ec16bd66_57343047')) {function content_53b680ec16bd66_57343047($_smarty_tpl) {?><script type="text/javascript">
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