<?php /* Smarty version Smarty-3.1.12, created on 2012-12-08 14:03:03
         compiled from "/var/www/html/agents/templates/agentsOnline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124014478550c32c771a39c3-46606312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '015fb333a8e67907b66dfc720dfca464bc58ae3e' => 
    array (
      0 => '/var/www/html/agents/templates/agentsOnline.tpl',
      1 => 1354891739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124014478550c32c771a39c3-46606312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'totalOffline' => 0,
    'totalOnline' => 0,
    'agents' => 0,
    'i' => 0,
    'agent' => 0,
    'detail' => 0,
    'logText' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c32c7729ffe2_42370873',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c32c7729ffe2_42370873')) {function content_50c32c7729ffe2_42370873($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsOnline.css"\>
<script src="../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../includes/js/advancedFuncs.js" type="text/javascript"></script>
</head>
<body>

<table id="offlineStats" cellspacing="10">
	<tr>
		<td width="50" style="padding-left: 20px">ОФФЛАЙН:</td>
		<td width="70" style="border-right: 1px dotted grey;"><?php echo $_smarty_tpl->tpl_vars['totalOffline']->value;?>
</td>
		<td width="80" style="padding-left: 20px">НА ЛИНИИ:</td>
		<td><?php echo $_smarty_tpl->tpl_vars['totalOnline']->value;?>
</td>
	</tr>
</table>
<table id="agentsStat">
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['agent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['agent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['agents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['agent']->key => $_smarty_tpl->tpl_vars['agent']->value){
$_smarty_tpl->tpl_vars['agent']->_loop = true;
?>
	<tr id="hoverAgents" onclick='toggleWindow("agentDIV<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
");'>
		<td width="50px" >
			<p id="agentButton"><?php echo $_smarty_tpl->tpl_vars['agent']->value['last_name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['agent']->value['name'];?>
</p>
		</td>
		<?php if (($_smarty_tpl->tpl_vars['agent']->value['drops']>0)){?>
		<td width="50" id="missedCalls"><?php echo $_smarty_tpl->tpl_vars['agent']->value['drops'];?>
</td>
		<?php }else{ ?>
		<td width="50"></td>
		<?php }?>
		<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: <?php echo $_smarty_tpl->tpl_vars['agent']->value['online_perc'];?>
%;">
					<p><?php echo $_smarty_tpl->tpl_vars['agent']->value['online'];?>
</p>
				</div>
				<div id="intProgressPause" style="width: <?php echo $_smarty_tpl->tpl_vars['agent']->value['pause_perc'];?>
%;">
					<p><?php echo $_smarty_tpl->tpl_vars['agent']->value['pause'];?>
</p>
				</div>
				<div id="intProgressOff" style="width: <?php echo $_smarty_tpl->tpl_vars['agent']->value['offline_perc'];?>
%;">
					<p><?php echo $_smarty_tpl->tpl_vars['agent']->value['offline'];?>
</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="status<?php echo $_smarty_tpl->tpl_vars['agent']->value['status'];?>
"><?php echo $_smarty_tpl->tpl_vars['agent']->value['status'];?>
</p>
		</td>
		<td width="50px">
			<?php if (($_smarty_tpl->tpl_vars['agent']->value['status']!="busy"&&$_smarty_tpl->tpl_vars['agent']->value['status']!="online")){?>
            	<p id="offlineNum"><?php echo $_smarty_tpl->tpl_vars['agent']->value['offlineNum'];?>
</p>
			<?php }?>
		</td>
	</tr>
	<?php if (($_smarty_tpl->tpl_vars['detail']->value!=null)){?>
	<tr>
		<td id="agentDIV<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" colspan="5">
			<p>Начало смены: <?php echo $_smarty_tpl->tpl_vars['agent']->value['login'];?>
</p>
			<p>Время разговора: <?php echo $_smarty_tpl->tpl_vars['agent']->value['call'];?>
</p>
			<p>Время ухода: <?php echo $_smarty_tpl->tpl_vars['agent']->value['logout'];?>
</p>
		</td>
	</tr>
    <tr height="80%">
		<td colspan="5">
			<table id="logTable">
				<tr>
					<td colspan="2">
						<h3>ЖУРНАЛ СОБЫТИЙ</h3>
					</td>
				</tr>
				<tr>
					<td colspan="2" width="800px">
						<div style="height: 600px; overflow: auto;"><?php echo $_smarty_tpl->tpl_vars['logText']->value;?>
</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<?php }else{ ?>
	<tr>
		<td id="agentDIV<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="display: none;" colspan="5">
			<p>Начало смены: <?php echo $_smarty_tpl->tpl_vars['agent']->value['login'];?>
</p>
			<p>Время разговора: <?php echo $_smarty_tpl->tpl_vars['agent']->value['call'];?>
</p>
			<p>Время ухода: <?php echo $_smarty_tpl->tpl_vars['agent']->value['logout'];?>
</p>
		</td>
	</tr>

	<?php }?>
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
<?php } ?>
</table>

</body>
</html>
<?php }} ?>