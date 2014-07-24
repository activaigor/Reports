<?php /* Smarty version Smarty-3.1.12, created on 2014-07-24 13:13:49
         compiled from "/var/www/html/Reports-dev/templates/loginBoxVisible.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74300023353d0dc5d513cb5-19065235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a6f1b111b09ca2184e317c82836e9c4173c675c' => 
    array (
      0 => '/var/www/html/Reports-dev/templates/loginBoxVisible.tpl',
      1 => 1406196676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74300023353d0dc5d513cb5-19065235',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53d0dc5d514f50_52528838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0dc5d514f50_52528838')) {function content_53d0dc5d514f50_52528838($_smarty_tpl) {?><div id="loginBoxVisible">
	<form name="logging" method="post" action="/">
		<input type="hidden" name="logging" value="1">
		<table id="loginTable">
			<tr><td>Логин</td><td><input type="text" name="name" value=""></td></tr>
			<tr><td>Пароль</td><td><input type="password" name="password" value=""></td></tr>
			<tr><td colspan="2"><input type="submit" value="Войти"></td></tr>
		</table>
	</form>
</div>
<?php }} ?>