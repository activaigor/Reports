<?php /* Smarty version Smarty-3.1.12, created on 2014-07-24 15:00:38
         compiled from "/var/www/html/Reports-dev/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199969548053d0dc5d04ff27-10757200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87ae85273a1278dbe9a1b136a9f1c68f1b89b3d5' => 
    array (
      0 => '/var/www/html/Reports-dev/templates/index.tpl',
      1 => 1406203229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199969548053d0dc5d04ff27-10757200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53d0dc5d4e2914_38691076',
  'variables' => 
  array (
    'loginStatus' => 0,
    'feature' => 0,
    'WINDOWS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0dc5d4e2914_38691076')) {function content_53d0dc5d4e2914_38691076($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/index.css"\>

	<?php if (($_smarty_tpl->tpl_vars['loginStatus']->value==1)){?>
	<?php echo $_smarty_tpl->getSubTemplate ("jsVars.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php if (($_smarty_tpl->tpl_vars['feature']->value=="queue")){?>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="history")){?>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.treeview.js" type="text/javascript"></script>
	<script src="/includes/js/agentsHistory.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.datetimepicker.js"></script>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/agentsHistory.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/historyDesc.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" type="text/css" href="/includes/js/jquery.datetimepicker.css"/>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="cdr")){?>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/cdr.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" type="text/css" href="/includes/js/jquery.datetimepicker.css"/>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/audio/audiojs/audio.min.js"></script>
	<script src="/includes/js/jquery.datetimepicker.js"></script>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="shifts")){?>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/shifts.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" href="/includes/css/jquery.fileInput.css" />
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.fileInput.js" type="text/javascript"></script>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="lateness")){?>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/agentsLate.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/historyDesc.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/advancedFuncs.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.treeview.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="account")){?>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/makeReport.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="chanstat")){?>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/cdr.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
	<link rel="stylesheet" type="text/css" href="/includes/js/jquery.datetimepicker.css"/>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/includes/js/jquery.datetimepicker.js"></script>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="logging")){?>
	<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
	<?php }?>
	<link type="text/css" rel="stylesheet" media="all" href="/includes/css/agentsOnline.css"\>
	<link href="/includes/js/toastr/toastr.css" rel="stylesheet"/>
	<script src="/includes/js/agentsAjax.js" type="text/javascript"></script>
	<script src="/includes/js/advancedFuncs.js" type="text/javascript"></script>
	<script src="/includes/js/whoCall.js" type="text/javascript"></script>
	<script src="/includes/js/toastr/toastr.min.js" type="text/javascript"></script>
	<script type="application/javascript" src="http://jsonip.appspot.com/?callback=getip"> </script>
	<?php }?>

</head>
<body>
<div id="index" class="main">

<?php if (($_smarty_tpl->tpl_vars['loginStatus']->value==1)){?>
<?php echo $_smarty_tpl->getSubTemplate ('indexSigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ((isset($_smarty_tpl->tpl_vars['WINDOWS']->value))){?>
<?php  $_smarty_tpl->tpl_vars['window'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['window']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['WINDOWS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['window']->key => $_smarty_tpl->tpl_vars['window']->value){
$_smarty_tpl->tpl_vars['window']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['window']->key;
?>
	<?php echo $_smarty_tpl->getSubTemplate ("window.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php } ?>
<?php }?>
<?php }elseif(($_smarty_tpl->tpl_vars['loginStatus']->value==0)){?>
<?php echo $_smarty_tpl->getSubTemplate ('indexUnsigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

</div>
</body>
</html>
<?php }} ?>