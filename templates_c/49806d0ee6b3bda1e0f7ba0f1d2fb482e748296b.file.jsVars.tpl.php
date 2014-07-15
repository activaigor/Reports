<?php /* Smarty version Smarty-3.1.12, created on 2014-05-26 16:05:26
         compiled from "/var/www/html/agents/BETA/templates/jsVars.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194678537953833c163a9440-90413473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49806d0ee6b3bda1e0f7ba0f1d2fb482e748296b' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/jsVars.tpl',
      1 => 1400838348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194678537953833c163a9440-90413473',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53833c163f55a1_21403492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53833c163f55a1_21403492')) {function content_53833c163f55a1_21403492($_smarty_tpl) {?><script type="text/javascript">
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
</script>
<?php }} ?>