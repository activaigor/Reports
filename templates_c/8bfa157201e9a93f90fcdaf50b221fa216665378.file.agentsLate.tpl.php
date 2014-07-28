<?php /* Smarty version Smarty-3.1.12, created on 2014-05-30 16:01:29
         compiled from "/var/www/html/agents/BETA/templates/agentsLate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15621671305388812977c212-21275082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bfa157201e9a93f90fcdaf50b221fa216665378' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/agentsLate.tpl',
      1 => 1400755576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15621671305388812977c212-21275082',
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
    'agent' => 0,
    'data' => 0,
    'sumLate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_538881298fc941_56550964',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538881298fc941_56550964')) {function content_538881298fc941_56550964($_smarty_tpl) {?><script type="text/javascript">
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

<div id="daySelect">
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
/lateness/<?php echo $_smarty_tpl->tpl_vars['queue_en']->value;?>
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

<?php }} ?>