<?php /* Smarty version Smarty-3.1.12, created on 2013-06-12 12:08:02
         compiled from "/var/www/html/agents/BETA/templates/indexSigned.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1983849465518a1694607515-51035368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7a7e08d2fdc9726e6d641d327d3e3ff089a1a74' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/indexSigned.tpl',
      1 => 1371027988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1983849465518a1694607515-51035368',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a1694650ed7_02723219',
  'variables' => 
  array (
    'loginRule' => 0,
    'user' => 0,
    'city' => 0,
    'CITIES' => 0,
    'index' => 0,
    'cityName' => 0,
    'queue' => 0,
    'QUEUES' => 0,
    'queueName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a1694650ed7_02723219')) {function content_518a1694650ed7_02723219($_smarty_tpl) {?>	<?php if (($_smarty_tpl->tpl_vars['loginRule']->value==3)){?>
	<div id="realtimeBlock" style="width: 60%">
		<?php echo $_smarty_tpl->getSubTemplate ("agentsOnline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['loginRule']->value==2)){?>
	<div id="realtimeBlock" style="width: 99%">
		<?php echo $_smarty_tpl->getSubTemplate ("agentsOnline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php }?>
	
	<div id="loginP">
		<strong>Вы вошли в систему как <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</strong>
		<a href="<?php echo $_SERVER['REQUESTED_URI'];?>
?signout=1">Выйти</a>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href='#'><span><?php echo $_smarty_tpl->tpl_vars['CITIES']->value[$_smarty_tpl->tpl_vars['city']->value];?>
</span></a>
      		<ul>
            	<?php  $_smarty_tpl->tpl_vars['cityName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cityName']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CITIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cityName']->key => $_smarty_tpl->tpl_vars['cityName']->value){
$_smarty_tpl->tpl_vars['cityName']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['cityName']->key;
?>
                	<li><a href="?city=<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</span></a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px; margin-left: 85px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href='#'><span><?php echo $_smarty_tpl->tpl_vars['QUEUES']->value[$_smarty_tpl->tpl_vars['queue']->value];?>
</span></a>
      		<ul>
            	<?php  $_smarty_tpl->tpl_vars['queueName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['queueName']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['QUEUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['queueName']->key => $_smarty_tpl->tpl_vars['queueName']->value){
$_smarty_tpl->tpl_vars['queueName']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['queueName']->key;
?>
                	<li><a href="?queue=<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['queueName']->value;?>
</span></a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>

	<?php if (($_smarty_tpl->tpl_vars['loginRule']->value==3)){?>
	<iframe id="historyFrame" src="includes/agentsHistory.php?city=<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
&queue=<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
" width="38%" height="85%"></iframe>
	<a id="showLate" href="javascript: toggleLate('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
');">Показать опоздавших</a>
	<a id="showDisturb" href="javascript: toggleDist('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
');">история нарушений</a>

	
	<div id="lateDiv" style="display: none;">
		<table id="titleWindow">
			<tr>
				<td width="95%">Окно истории</td>
				<td width="5%" id="nameTitle"><a href="javascript: toggleLate('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
');">x</a></td>
			</tr>
		</table>
		<iframe id="lateFrame" src="includes/agentsLate.php"></iframe>
	</div>
	<div id="distDiv" style="display: none;">
		<table id="titleWindow">
			<tr>
			<td width="95%">Окно истории</td>
			<td width="5%" id="nameTitle"><a href="javascript: toggleDist('<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
');">x</a></td>
			</tr>
		</table>
		<iframe id="distFrame" src="includes/agentsDist.php"></iframe>
	</div>
	
	<div id="makeReportButt">
    	<a onMouseOver='$("#reportLable").toggle()' onMouseOut='$("#reportLable").toggle()' href="includes/makeReport.php">B</a>
    	<p id="reportLable" style="display: none;">СДЕЛАТЬ<br>ОТЧЕТ</p>
	</div>
	<?php }?>
	
<?php }} ?>