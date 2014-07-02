<?php /* Smarty version Smarty-3.1.12, created on 2014-01-11 13:00:04
         compiled from "/var/www/html/agents/templates/header_signed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127316990052d1220939e204-10219133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab2a9108f2de5c691dfe6f147da3dbb5786cba1e' => 
    array (
      0 => '/var/www/html/agents/templates/header_signed.tpl',
      1 => 1389438003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127316990052d1220939e204-10219133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52d122093e4ee3_28349092',
  'variables' => 
  array (
    'user' => 0,
    'loginRule' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d122093e4ee3_28349092')) {function content_52d122093e4ee3_28349092($_smarty_tpl) {?><div id="loginP">
	<strong>Вы вошли в систему как <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</strong>
	<a href="/logout">Выйти</a>
</div>
	
<?php if (($_smarty_tpl->tpl_vars['loginRule']->value==3)){?>
<div style="position: fixed; left: 50%; top: 0px; margin-left: -85px;" id='cssmenu'>
<ul>
	<li class='has-sub '><a href="/"><span>меню</span></a>
		<ul><li><a href="javascript: show_logs();" id="showLogging"><span>логирование</span></a></li>
		<li><a href="/table" target="__blank"><span>графики смен</span></a></li>
      		</ul>
   	</li>
</ul>
</div>
<?php }?>
<?php }} ?>