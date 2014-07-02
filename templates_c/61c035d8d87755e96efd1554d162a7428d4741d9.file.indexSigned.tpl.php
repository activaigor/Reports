<?php /* Smarty version Smarty-3.1.12, created on 2014-02-12 13:05:34
         compiled from "/var/www/html/agents/templates/indexSigned.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114456730150bf2a4f0902c4-84182483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61c035d8d87755e96efd1554d162a7428d4741d9' => 
    array (
      0 => '/var/www/html/agents/templates/indexSigned.tpl',
      1 => 1392203132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114456730150bf2a4f0902c4-84182483',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bf2a4f092099_39282446',
  'variables' => 
  array (
    'loginRule' => 0,
    'user' => 0,
    'login_features' => 0,
    'feature_en' => 0,
    'FEATURES' => 0,
    'city' => 0,
    'CITIES' => 0,
    'login_city' => 0,
    'city_en' => 0,
    'queue' => 0,
    'QUEUES' => 0,
    'index' => 0,
    'queueName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bf2a4f092099_39282446')) {function content_50bf2a4f092099_39282446($_smarty_tpl) {?>	<?php if (($_smarty_tpl->tpl_vars['loginRule']->value>=3)){?>
	<div id="realtimeBlock" style="width: 60%">
		<?php echo $_smarty_tpl->getSubTemplate ("agentsOnline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php }elseif(($_smarty_tpl->tpl_vars['loginRule']->value==2||$_smarty_tpl->tpl_vars['loginRule']->value==1)){?>
	<div id="realtimeBlock" style="width: 99%">
		<?php echo $_smarty_tpl->getSubTemplate ("agentsOnline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php }?>
	
	<div id="loginP">
		<strong>Вы вошли в систему как <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</strong>
		<a href="/logout">Выйти</a>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px; margin-left: -85px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href="/"><span>меню</span></a>
      		<ul>
                <!--<li><a href="javascript: show_logs();" id="showLogging"><span>логирование</span></a></li>-->
            	<?php  $_smarty_tpl->tpl_vars['feature_en'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature_en']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['login_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature_en']->key => $_smarty_tpl->tpl_vars['feature_en']->value){
$_smarty_tpl->tpl_vars['feature_en']->_loop = true;
?>
                	<li><a href="/<?php echo $_smarty_tpl->tpl_vars['feature_en']->value;?>
" target="__blank"><span><?php echo $_smarty_tpl->tpl_vars['FEATURES']->value[$_smarty_tpl->tpl_vars['feature_en']->value];?>
</span></a></li>
		<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href="/"><span><?php echo $_smarty_tpl->tpl_vars['CITIES']->value[$_smarty_tpl->tpl_vars['city']->value];?>
</span></a>
      		<ul>
            	<?php  $_smarty_tpl->tpl_vars['city_en'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city_en']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['login_city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city_en']->key => $_smarty_tpl->tpl_vars['city_en']->value){
$_smarty_tpl->tpl_vars['city_en']->_loop = true;
?>
                	<li><a href="/<?php echo $_smarty_tpl->tpl_vars['city_en']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['CITIES']->value[$_smarty_tpl->tpl_vars['city_en']->value];?>
</span></a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
	
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
"><span><?php echo $_smarty_tpl->tpl_vars['queueName']->value;?>
</span></a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>

	<?php if (($_smarty_tpl->tpl_vars['loginRule']->value>=3)){?>
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

	<?php if (($_smarty_tpl->tpl_vars['loginRule']->value>3)){?>
	<div id="makeReportButt">
    	<a onMouseOver='$("#reportLable").toggle()' onMouseOut='$("#reportLable").toggle()' href="/includes/makeReport.php?queue=<?php echo $_smarty_tpl->tpl_vars['queue']->value;?>
" target="_blank">B</a>
    	<p id="reportLable" style="display: none;">СДЕЛАТЬ<br>ОТЧЕТ</p>
	</div>
	<?php }?>
	<?php }?>
	
<?php }} ?>