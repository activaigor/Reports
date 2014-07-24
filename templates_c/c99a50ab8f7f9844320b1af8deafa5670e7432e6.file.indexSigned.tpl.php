<?php /* Smarty version Smarty-3.1.12, created on 2014-07-24 13:13:50
         compiled from "/var/www/html/Reports-dev/templates/indexSigned.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138068874353d0dc5e9a5816-10864327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c99a50ab8f7f9844320b1af8deafa5670e7432e6' => 
    array (
      0 => '/var/www/html/Reports-dev/templates/indexSigned.tpl',
      1 => 1406196676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138068874353d0dc5e9a5816-10864327',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'feature' => 0,
    'login_city' => 0,
    'city' => 0,
    'city_en' => 0,
    'queue_href' => 0,
    'CITIES' => 0,
    'agent_name' => 0,
    'login_features' => 0,
    'feature_en' => 0,
    'ICONS' => 0,
    'queue' => 0,
    'QUEUES' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53d0dc5edbbb33_96747436',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0dc5edbbb33_96747436')) {function content_53d0dc5edbbb33_96747436($_smarty_tpl) {?>	<div id="loginP">
		<strong>Вы вошли в систему как <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</strong>
		<a href="/logout">Выйти</a>
	</div>
	
	<div id="head_nav">
		<div style="height: 50px" class="dot_background">
		<p id="logo">Reports</p>
		</div>
      		<ul id="city_select">
		<?php if (($_smarty_tpl->tpl_vars['feature']->value=="queue")){?>
			<?php $_smarty_tpl->tpl_vars['queue_href'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['queue']->value), null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['queue_href'] = new Smarty_variable('', null, 0);?>
		<?php }?>
            	<?php  $_smarty_tpl->tpl_vars['city_en'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city_en']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['login_city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city_en']->key => $_smarty_tpl->tpl_vars['city_en']->value){
$_smarty_tpl->tpl_vars['city_en']->_loop = true;
?>
			<?php if (($_smarty_tpl->tpl_vars['city']->value==$_smarty_tpl->tpl_vars['city_en']->value)){?>
                	<li><a class="selected" href="/<?php echo $_smarty_tpl->tpl_vars['city_en']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['feature']->value;?>
<?php echo $_smarty_tpl->tpl_vars['queue_href']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['CITIES']->value[$_smarty_tpl->tpl_vars['city_en']->value];?>
</span></a></li>
			<?php }else{ ?>
                	<li><a href="/<?php echo $_smarty_tpl->tpl_vars['city_en']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['feature']->value;?>
<?php echo $_smarty_tpl->tpl_vars['queue_href']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['CITIES']->value[$_smarty_tpl->tpl_vars['city_en']->value];?>
</span></a></li>
			<?php }?>
            	<?php } ?>
      		</ul>
	</div>

	<?php if (($_smarty_tpl->tpl_vars['agent_name']->value!=null)){?>
		<?php echo $_smarty_tpl->getSubTemplate ("whoCall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	
	<?php if (($_smarty_tpl->tpl_vars['feature']->value=="queue")){?>
		<div id="realtimeBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("agentsOnline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="history")){?>
		<div id="historyBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("agentsHistory.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="cdr")){?>
		<div id="cdrBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("queueCDR.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="shifts")){?>
		<div id="shiftsBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("shifts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="lateness")){?>
		<div id="latenessBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("agentsLate.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="account")){?>
		<div id="accountBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("makeReport.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="logging")){?>
		<div id="loggingBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("logging.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['feature']->value=="chanstat")){?>
		<div id="cdrBlock">
			<?php echo $_smarty_tpl->getSubTemplate ("chanstat.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	<?php }?>

	<div id="main_menu">
      		<ul>
            	<?php  $_smarty_tpl->tpl_vars['feature_en'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature_en']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['login_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature_en']->key => $_smarty_tpl->tpl_vars['feature_en']->value){
$_smarty_tpl->tpl_vars['feature_en']->_loop = true;
?>
			<?php if (($_smarty_tpl->tpl_vars['feature']->value==$_smarty_tpl->tpl_vars['feature_en']->value)){?>
                	<li><a id="selected" href="/<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['feature_en']->value;?>
" style="background: white url(<?php echo str_replace("[icon_type]","light",$_smarty_tpl->tpl_vars['ICONS']->value[$_smarty_tpl->tpl_vars['feature_en']->value]);?>
) no-repeat center"></a></li>
			<?php }else{ ?>
                	<li><a class="unselected" href="/<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['feature_en']->value;?>
" style="background: url(<?php echo str_replace("[icon_type]","light",$_smarty_tpl->tpl_vars['ICONS']->value[$_smarty_tpl->tpl_vars['feature_en']->value]);?>
) no-repeat center"></a></li>
			<?php }?>
		<?php } ?>
      		</ul>
   		</li>
	</div>

	<!--
	<div style="position: fixed; left: 50%; top: 0px; margin-left: 85px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href="/"><span><?php echo $_smarty_tpl->tpl_vars['QUEUES']->value[$_smarty_tpl->tpl_vars['queue']->value];?>
</span></a>
      		<ul>
            	<?php  $_smarty_tpl->tpl_vars['queueName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['queueName']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['QUEUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['queueName']->key => $_smarty_tpl->tpl_vars['queueName']->value){
$_smarty_tpl->tpl_vars['queueName']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['queueName']->key;
?>
                	<li><a href="/<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"></a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
	-->

	<?php if (($_smarty_tpl->tpl_vars['feature']->value=="workdata")){?>
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


	<?php }?>
	
<?php }} ?>