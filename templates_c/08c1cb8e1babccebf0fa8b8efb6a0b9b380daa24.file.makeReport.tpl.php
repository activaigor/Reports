<?php /* Smarty version Smarty-3.1.12, created on 2013-05-15 13:56:34
         compiled from "/var/www/html/agents/BETA/templates/makeReport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1682320775519369e2210e13-63295640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08c1cb8e1babccebf0fa8b8efb6a0b9b380daa24' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/makeReport.tpl',
      1 => 1359974852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1682320775519369e2210e13-63295640',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'COLUMNS' => 0,
    'index' => 0,
    'FILTER' => 0,
    'name' => 0,
    'value' => 0,
    'report' => 0,
    'data' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_519369e22f5822_07660099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519369e22f5822_07660099')) {function content_519369e22f5822_07660099($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/makeReport.css"\>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/jquery-ui.css"\>
<script src="../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../includes/js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
	});
</script>
<style type="text/css" media="print,screen" >
th {
    font-family:Arial;
    color:black;
    background-color:lightgrey;
}
thead {
    display:table-header-group;
}
tbody {
    display:table-row-group;
}
</style>
</head>
<body>
<a href="../index.php" id="mainLogo"><img src="pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>
<table id="makeReport">
	<thead>
		<tr id="reportHead">
			<td>№</td>
			<form method="get">
			<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['COLUMNS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['order']->key;
?>
				<td><input type="submit" name="order" value="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"></td>
			<?php } ?>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['FILTER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
">
			<?php } ?>
			</form>
		</tr>
	</thead>
	<tbody>
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['report']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
		<?php if (($_smarty_tpl->tpl_vars['data']->value['total']>0)){?>
		<tr id="rowGrid<?php echo $_smarty_tpl->tpl_vars['i']->value%2;?>
">
        	<td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['data']->value['workDays'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['data']->value['total'];?>
<span title="Общее время"><?php echo $_smarty_tpl->tpl_vars['data']->value['totalPerc'];?>
%</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['data']->value['online'];?>
<span title="От общего времени"><?php echo $_smarty_tpl->tpl_vars['data']->value['onlinePerc'];?>
%</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['data']->value['call'];?>
<span title="От времени онлайн"><?php echo $_smarty_tpl->tpl_vars['data']->value['callPerc'];?>
%</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['data']->value['offline'];?>
<span title="От общего времени"><?php echo $_smarty_tpl->tpl_vars['data']->value['offlinePerc'];?>
%</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['data']->value['pause'];?>
<span title="От общего времени"><?php echo $_smarty_tpl->tpl_vars['data']->value['pausePerc'];?>
%</span></td>
			<td><?php echo $_smarty_tpl->tpl_vars['data']->value['late'];?>
<span title="От общего времени"><?php echo $_smarty_tpl->tpl_vars['data']->value['latePerc'];?>
%</span></td>
		</tr>
		<?php }?>
		<?php } ?>
	</tbody>
</table>
<?php echo $_smarty_tpl->getSubTemplate ("day-cityFilter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>
</html>
<?php }} ?>