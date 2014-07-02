<?php /* Smarty version Smarty-3.1.12, created on 2013-08-30 11:47:33
         compiled from "/var/www/html/agents/templates/agentsHistory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27990883150c5c0223b6097-92161024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f6bef52529971a1339b2dfe212d6d0c3bf8efc6' => 
    array (
      0 => '/var/www/html/agents/templates/agentsHistory.tpl',
      1 => 1377852447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27990883150c5c0223b6097-92161024',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c5c022415691_30030832',
  'variables' => 
  array (
    'agents' => 0,
    'i' => 0,
    'agentName' => 0,
    'name' => 0,
    'agentMonth' => 0,
    'month' => 0,
    'monthData' => 0,
    'data' => 0,
    'WINDOWS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c5c022415691_30030832')) {function content_50c5c022415691_30030832($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsHistory.css"\>
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
		$( ".draggable" ).draggable({
			revert : true,
			zIndex: 1,
			containment:'parent'
		});
		$( ".draggable" ).droppable({
			drop: function( event, ui ) {
				var dragged = ui.draggable;
				idDragged = $(dragged).find("span").find("input").val();
				idDropped = $(this).find("span").find("input").val();
				historySum(idDragged , idDropped);
			}
		});
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
	});
</script>
</head>
<body>
<ul id="agentsHistory">
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['agentMonth'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['agentMonth']->_loop = false;
 $_smarty_tpl->tpl_vars['agentName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['agents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['agentMonth']->key => $_smarty_tpl->tpl_vars['agentMonth']->value){
$_smarty_tpl->tpl_vars['agentMonth']->_loop = true;
 $_smarty_tpl->tpl_vars['agentName']->value = $_smarty_tpl->tpl_vars['agentMonth']->key;
?>
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
	<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable(explode(" | ",$_smarty_tpl->tpl_vars['agentName']->value), null, 0);?>
	<li id="agentOrder<?php echo $_smarty_tpl->tpl_vars['i']->value%2;?>
" class="agentOrder"><span style="padding: 5px;"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php echo $_smarty_tpl->tpl_vars['name']->value[0];?>
</span>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['monthData'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['monthData']->_loop = false;
 $_smarty_tpl->tpl_vars['month'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['agentMonth']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['monthData']->key => $_smarty_tpl->tpl_vars['monthData']->value){
$_smarty_tpl->tpl_vars['monthData']->_loop = true;
 $_smarty_tpl->tpl_vars['month']->value = $_smarty_tpl->tpl_vars['monthData']->key;
?>
			<li id="monthSelect"><span style="padding: 5px;">* <?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</span>
				<ul>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['monthData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
					<li id="workDay" class="draggable" onClick='showData(Array("<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['offline'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['pause'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['online'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['call'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['late'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['login'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['leave'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['note'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"))' oncontextmenu='return popupMenuHist(event,"<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
");'>
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value['day'];?>

							<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
						</span>
					</li>
				<?php } ?>
				</ul>
			</li>
		<?php } ?>
		</ul>
	</li>
<?php } ?>
</ul>
	
<?php echo $_smarty_tpl->getSubTemplate ('historyDesc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('dayFilter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php  $_smarty_tpl->tpl_vars['window'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['window']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['WINDOWS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['window']->key => $_smarty_tpl->tpl_vars['window']->value){
$_smarty_tpl->tpl_vars['window']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['window']->key;
?>
	<?php echo $_smarty_tpl->getSubTemplate ("window.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php } ?>

<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0);" id="goRecords">ЗАПИСИ</a>
	<a href="javascript: void(0);" id="showDisturbs">НАРУШЕНИЯ</a>
</div>

</body>
</html>
<?php }} ?>