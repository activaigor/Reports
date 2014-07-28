<?php /* Smarty version Smarty-3.1.12, created on 2014-06-02 10:22:05
         compiled from "/var/www/html/agents/BETA/templates/makeReport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8112581815384a061077d75-34678232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08c1cb8e1babccebf0fa8b8efb6a0b9b380daa24' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/makeReport.tpl',
      1 => 1401693721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8112581815384a061077d75-34678232',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5384a0611a0231_63043231',
  'variables' => 
  array (
    'FILTER' => 0,
    'queue' => 0,
    'QUEUES' => 0,
    'login_queue' => 0,
    'city' => 0,
    'queue_en' => 0,
    'COLUMNS' => 0,
    'index' => 0,
    'name' => 0,
    'value' => 0,
    'report' => 0,
    'data' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5384a0611a0231_63043231')) {function content_5384a0611a0231_63043231($_smarty_tpl) {?><script type="text/javascript">
	$(document).ready(function(){
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
/account/<?php echo $_smarty_tpl->tpl_vars['queue_en']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['QUEUES']->value[$_smarty_tpl->tpl_vars['queue_en']->value];?>
</a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
</div>

<table id="makeReport">
	<thead>
		<tr id="reportHead">
			<td>№</td>
			<form method="post">
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
				<input type="hidden" name="queue" value="<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
">
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
<?php }} ?>