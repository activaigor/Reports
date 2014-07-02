<?php /* Smarty version Smarty-3.1.12, created on 2013-02-06 09:50:55
         compiled from "/var/www/html/agents/templates/agentsLate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137143136050c9e36141aba8-39951204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff95cb89f6cb9adfd91a08af46090fdcbb88cfef' => 
    array (
      0 => '/var/www/html/agents/templates/agentsLate.tpl',
      1 => 1360053540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137143136050c9e36141aba8-39951204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c9e3614d2373_00033132',
  'variables' => 
  array (
    'agents' => 0,
    'i' => 0,
    'agentName' => 0,
    'name' => 0,
    'agent' => 0,
    'data' => 0,
    'sumLate' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c9e3614d2373_00033132')) {function content_50c9e3614d2373_00033132($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsLate.css"\>
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

<h3 id="lateTitle">СПИСОК ОПОЗДАВШИХ</h3>
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
	<li id="agentOrder<?php echo $_smarty_tpl->tpl_vars['i']->value%2;?>
" class="agentOrder"><span style="padding: 5px;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php echo $_smarty_tpl->tpl_vars['name']->value[0];?>
</span>
		<ul>
		<?php $_smarty_tpl->tpl_vars['sumLate'] = new Smarty_variable(0, null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['agent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
			<li id="workDay" onClick='showLateData(Array("<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['offline'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['pause'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['online'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['call'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['late'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['login'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['leave'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['note'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"))'>
				<span style="padding: 5px;">* <?php echo $_smarty_tpl->tpl_vars['data']->value['workDay'];?>
 Опоздание: <?php echo $_smarty_tpl->tpl_vars['data']->value['late'];?>

				<?php if (($_smarty_tpl->tpl_vars['data']->value['note']!='')){?>
					<p><i>Примечание: <?php echo $_smarty_tpl->tpl_vars['data']->value['note'];?>
</i></p>
				<?php }?>
				</span>
			</li>
		<?php $_smarty_tpl->tpl_vars['sumLate'] = new Smarty_variable($_smarty_tpl->tpl_vars['sumLate']->value+$_smarty_tpl->tpl_vars['data']->value['lateTime'], null, 0);?>
		<?php } ?>
			<li id="totalLate" style="padding: 10px;">Суммарное опоздание: <?php echo gmdate("H:i",$_smarty_tpl->tpl_vars['sumLate']->value);?>
</li>
		</ul>
	</li>
<?php } ?>
</ul>
	
<?php echo $_smarty_tpl->getSubTemplate ('historyDesc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('dayFilter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>
</html>
<?php }} ?>