<?php /* Smarty version Smarty-3.1.12, created on 2014-07-04 13:50:33
         compiled from "/var/www/html/Reports/templates/agentsHistory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196465735453b686f96d4df2-97633643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '262bf80074d663603fd231560a8826d8eac30064' => 
    array (
      0 => '/var/www/html/Reports/templates/agentsHistory.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196465735453b686f96d4df2-97633643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FILTER' => 0,
    'queue' => 0,
    'QUEUES' => 0,
    'login_queue' => 0,
    'city' => 0,
    'queue_en' => 0,
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
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53b686f97faa86_02516891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b686f97faa86_02516891')) {function content_53b686f97faa86_02516891($_smarty_tpl) {?><div id="daySelect">
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post">
		<input type="text" class="datepicker" name="from" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['from'];?>
">
		<input type="text" class="datepicker" name="to" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['to'];?>
">
		<input type="submit" value="ok">
	</form>
</div>

<div id="select_queue">
	<div id="cssmenu">
	<ul>
   		<li class="has-sub"><a href="/" id="queue_selected"><span><?php echo $_smarty_tpl->tpl_vars['QUEUES']->value[$_smarty_tpl->tpl_vars['queue']->value];?>
</span></a>
      		<ul>
            	<?php  $_smarty_tpl->tpl_vars['queue_en'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['queue_en']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['login_queue']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['queue_en']->key => $_smarty_tpl->tpl_vars['queue_en']->value){
$_smarty_tpl->tpl_vars['queue_en']->_loop = true;
?>
                	<li><a href="/<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
/history/<?php echo $_smarty_tpl->tpl_vars['queue_en']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['QUEUES']->value[$_smarty_tpl->tpl_vars['queue_en']->value];?>
</a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
</div>

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
<?php }} ?>