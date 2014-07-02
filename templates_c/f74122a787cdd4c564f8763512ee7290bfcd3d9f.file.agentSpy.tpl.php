<?php /* Smarty version Smarty-3.1.12, created on 2013-01-08 13:16:29
         compiled from "/var/www/html/agents/BETA/templates/agentSpy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125240246650ebed81f274e4-00618086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f74122a787cdd4c564f8763512ee7290bfcd3d9f' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/agentSpy.tpl',
      1 => 1357643782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125240246650ebed81f274e4-00618086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ebed81f29783_16748653',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ebed81f29783_16748653')) {function content_50ebed81f29783_16748653($_smarty_tpl) {?><table id="bodyWindow">
	<tr>
		<td width="250"><input onFocus="doClear(this)" onBlur="doDefault(this)" id="numSpy" type="text" value="номер SIP"></td>
		<td width="50"><a href="javascript: startSpy();">OK</a></td>
	</tr>
</table>
<?php }} ?>