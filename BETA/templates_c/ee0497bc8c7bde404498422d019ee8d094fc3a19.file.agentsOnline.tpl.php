<?php /* Smarty version Smarty-3.1.12, created on 2014-05-26 16:07:57
         compiled from "/var/www/html/agents/BETA/templates/agentsOnline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10047743753833cadefeda0-77349843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee0497bc8c7bde404498422d019ee8d094fc3a19' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/agentsOnline.tpl',
      1 => 1400237269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10047743753833cadefeda0-77349843',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'queue' => 0,
    'QUEUES' => 0,
    'login_queue' => 0,
    'city' => 0,
    'queue_en' => 0,
    'loginStatus' => 0,
    'loginRule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53833cae0018a9_38334098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53833cae0018a9_38334098')) {function content_53833cae0018a9_38334098($_smarty_tpl) {?><table id="offlineStats" cellspacing="1">
	<tr>
		<td width="100" style="padding-left: 20px">ОФФЛАЙН:</td>
		<td id="offline"></td>
		<td width="100" style="padding-left: 20px">НА ЛИНИИ:</td>
		<td id="online"></td>
	</tr>
</table>

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
/queue/<?php echo $_smarty_tpl->tpl_vars['queue_en']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['QUEUES']->value[$_smarty_tpl->tpl_vars['queue_en']->value];?>
</a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
</div>

<div id="agentsStatDiv">
	<table id="agentsStat" cellspacing="0">
		<tbody>
			<!-- DATA WILL BE PASSED HERE --!>
		</tbody>
	</table>
</div>

<div id="callersStatDiv">
	<div id="callersDiv">
		<table id="callersStat">
		<thead>
			<tr><td colspan="2">входящая линия</td></tr>
		</thead>
		<tbody>
			<!-- DATA WILL BE PASSED HERE --!>
		</tbody>
		</table>
	</div>
</div>

<?php if (($_smarty_tpl->tpl_vars['loginStatus']->value==1&&$_smarty_tpl->tpl_vars['loginRule']->value>1)){?>
<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="javascript: void(0)" id="detailAgent">ДЕТАЛЬНО</a>
	<?php if (($_smarty_tpl->tpl_vars['loginRule']->value>2)){?>
	<a href="javascript: void(0)" id="spyAgent">ПРОСЛУШАТЬ</a>
	<?php }?>
   	<a href="javascript: void(0)" id="removeHistory">УДАЛИТЬ</a>
	<a href="javascript: void(0)" id="agentNote">КОММЕНТАРИЙ</a>
</div>
<?php }?>
  
<?php }} ?>