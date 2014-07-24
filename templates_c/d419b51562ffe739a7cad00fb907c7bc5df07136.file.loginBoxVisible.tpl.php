<?php /* Smarty version Smarty-3.1.12, created on 2014-07-04 13:08:32
         compiled from "/var/www/html/Reports/templates/loginBoxVisible.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208058623353b67d20d9e898-02553821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd419b51562ffe739a7cad00fb907c7bc5df07136' => 
    array (
      0 => '/var/www/html/Reports/templates/loginBoxVisible.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208058623353b67d20d9e898-02553821',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53b67d20d9fcf0_98255501',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b67d20d9fcf0_98255501')) {function content_53b67d20d9fcf0_98255501($_smarty_tpl) {?><div id="loginBoxVisible">
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