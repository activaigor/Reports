<?php /* Smarty version Smarty-3.1.12, created on 2013-06-07 12:06:50
         compiled from "/var/www/html/agents/BETA/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1507601739518a169456efd5-77700518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8f79926880c6c4f4cc06c683e376662471377dd' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/index.tpl',
      1 => 1370595991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1507601739518a169456efd5-77700518',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a16946027d3_67122249',
  'variables' => 
  array (
    'sip' => 0,
    'city' => 0,
    'detail' => 0,
    'loginStatus' => 0,
    'queue' => 0,
    'WINDOWS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a16946027d3_67122249')) {function content_518a16946027d3_67122249($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" media="all" href="includes/css/index.css"\>
	<link type="text/css" rel="stylesheet" media="all" href="includes/css/agentsOnline.css"\>
	<script src="includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="includes/js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
	<script src="includes/js/advancedFuncs.js" type="text/javascript"></script>
<script src="includes/js/agentsAjax.js" type="text/javascript"></script>
<script type="text/javascript">
	SIP_PHONE = <?php echo $_smarty_tpl->tpl_vars['sip']->value;?>
;
	javascriptHandler = "includes/javascriptHandler.php";
	$(document).ready(function(){
		getData('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
' , '<?php echo $_smarty_tpl->tpl_vars['detail']->value;?>
' , <?php echo $_smarty_tpl->tpl_vars['loginStatus']->value;?>
 , '<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
');
		getCallers('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
' , '<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
');
		setInterval( function() { updateData('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
' , '<?php echo $_smarty_tpl->tpl_vars['detail']->value;?>
' , <?php echo $_smarty_tpl->tpl_vars['loginStatus']->value;?>
 , '<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
') } , 3000);
		setInterval( function() { updateDataCallers('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
' , '<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
') } , 1500);
	});

</script>
</head>
<body>
<?php if (($_smarty_tpl->tpl_vars['loginStatus']->value==1)){?>
<?php echo $_smarty_tpl->getSubTemplate ('indexSigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }elseif(($_smarty_tpl->tpl_vars['loginStatus']->value==0)){?>
<?php echo $_smarty_tpl->getSubTemplate ('indexUnsigned.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<?php  $_smarty_tpl->tpl_vars['window'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['window']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['WINDOWS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['window']->key => $_smarty_tpl->tpl_vars['window']->value){
$_smarty_tpl->tpl_vars['window']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['window']->key;
?>
	<?php echo $_smarty_tpl->getSubTemplate ("window.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php } ?>
</body>
</html>
<?php }} ?>