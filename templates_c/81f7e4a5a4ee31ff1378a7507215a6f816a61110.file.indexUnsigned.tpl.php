<?php /* Smarty version Smarty-3.1.12, created on 2014-05-26 16:05:26
         compiled from "/var/www/html/agents/BETA/templates/indexUnsigned.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193250035153833c163fa258-86080647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81f7e4a5a4ee31ff1378a7507215a6f816a61110' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/indexUnsigned.tpl',
      1 => 1392992251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193250035153833c163fa258-86080647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'city' => 0,
    'CITIES' => 0,
    'login_city' => 0,
    'city_en' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53833c1648c763_07851724',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53833c1648c763_07851724')) {function content_53833c1648c763_07851724($_smarty_tpl) {?>	<?php if (($_SERVER['REMOTE_ADDR']=="194.50.85.922")){?>
	<div id="realtimeBlock" style="width: 99%">
		<?php echo $_smarty_tpl->getSubTemplate ("agentsOnline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="loginP">
		<strong>Вы не вошли в систему</strong>
		<a href="javascript: toggle('loginBox'); void(0);">Войти</a>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href='#'><span><?php echo $_smarty_tpl->tpl_vars['CITIES']->value[$_smarty_tpl->tpl_vars['city']->value];?>
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
	
	<?php echo $_smarty_tpl->getSubTemplate ("loginBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }else{ ?>
	<a href="/" id="mainLogo"><img src="includes/pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>
	<div id="loginP">
		<strong>Вы не вошли в систему</strong>
	</div>

	<div style="position: absolute; top: 50%; width: 100%; height: 500px; margin-top: -270px; background: url(http://parts.blog.livedoor.jp/img/cmn/dot.gif) white repeat; opacity: 0.3">
	</div>

	
	<?php echo $_smarty_tpl->getSubTemplate ("loginBoxVisible.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
<?php }} ?>