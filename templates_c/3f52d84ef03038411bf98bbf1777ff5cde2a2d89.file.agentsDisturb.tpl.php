<?php /* Smarty version Smarty-3.1.12, created on 2013-05-18 14:57:49
         compiled from "/var/www/html/agents/templates/agentsDisturb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121912180151976cbdaab9d3-04951018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f52d84ef03038411bf98bbf1777ff5cde2a2d89' => 
    array (
      0 => '/var/www/html/agents/templates/agentsDisturb.tpl',
      1 => 1368022077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121912180151976cbdaab9d3-04951018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'agents' => 0,
    'i' => 0,
    'agentName' => 0,
    'name' => 0,
    'agent' => 0,
    'k' => 0,
    'data' => 0,
    'disturbs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51976cbdb5d793_25775406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51976cbdb5d793_25775406')) {function content_51976cbdb5d793_25775406($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsDist.css"\>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/historyDesc.css"\>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/jquery-ui.css"\>
<script src="../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../includes/js/advancedFuncs.js" type="text/javascript"></script>
<script src="../includes/js/jquery.treeview.js" type="text/javascript"></script>
<script src="../includes/js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
	javascriptHandler = "javascriptHandler.php";
	function initTrees() {
		$("#agentsHistory").treeview({
			collapsed: true,animated: "fast"
		});
	}
	$(document).ready(function(){
		initTrees();
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
	});
</script>
</head>
<body>

<h3 id="distTitle">история нарушений</h3>
<hr>
<ul id="agentsHistory">
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['agent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['agent']->_loop = false;
 $_smarty_tpl->tpl_vars['agentName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['agents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['agent']->key => $_smarty_tpl->tpl_vars['agent']->value){
$_smarty_tpl->tpl_vars['agent']->_loop = true;
 $_smarty_tpl->tpl_vars['agentName']->value = $_smarty_tpl->tpl_vars['agent']->key;
?>
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
	<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable(explode(" | ",$_smarty_tpl->tpl_vars['agentName']->value), null, 0);?>
	<li class="ext" id="agentOrder<?php echo $_smarty_tpl->tpl_vars['i']->value%2;?>
" class="agentOrder"><span class="agentName" style="padding: 5px;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php echo $_smarty_tpl->tpl_vars['name']->value[0];?>
</span>
		<ul>
		<?php $_smarty_tpl->tpl_vars['sumLate'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable(0, null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['agent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
			<?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value+1, null, 0);?>
			<li id="workDay" class="grid<?php echo $_smarty_tpl->tpl_vars['k']->value%2;?>
">
				<table>
					<tr>
					<td class="datetime"><span class="date">* <?php echo $_smarty_tpl->tpl_vars['data']->value['start_date'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['data']->value['start'];?>
 \ <?php echo $_smarty_tpl->tpl_vars['data']->value['duration'];?>
</td>
					<td class="type"><?php echo $_smarty_tpl->tpl_vars['disturbs']->value[$_smarty_tpl->tpl_vars['data']->value['dist_type']];?>
</td>
					</tr>
				</table>
			</li>
		<?php } ?>
		</ul>
	</li>
<?php } ?>
</ul>
	
<?php echo $_smarty_tpl->getSubTemplate ('historyDesc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('dayFilter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>
</html>
<?php }} ?>