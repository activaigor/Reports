<?php /* Smarty version Smarty-3.1.12, created on 2013-01-04 13:11:38
         compiled from "/var/www/html/agents/templates/agentSpy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172351412450e568bfaaf4b9-72468239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b84d838bf183a8c1fb5bd7d0d61e636cdd356695' => 
    array (
      0 => '/var/www/html/agents/templates/agentSpy.tpl',
      1 => 1357297875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172351412450e568bfaaf4b9-72468239',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50e568bfab6e65_29013802',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e568bfab6e65_29013802')) {function content_50e568bfab6e65_29013802($_smarty_tpl) {?><div id="spyDiv" style="display: none;">
	<table id="titleWindow">
		<tr>
			<td width="95%">Укажите номер</td>
			<td width="5%" id="nameTitle"><a href="javascript: $('#spyDiv').toggle();">x</a></td>
		</tr>
	</table>
	<table id="bodyWindow">
		<tr>
			<td width="250"><input onFocus="doClear(this)" onBlur="doDefault(this)" id="numSpy" type="text" value="номер SIP"></td>
			<td width="50"><a href="javascript: startSpy();">OK</a></td>
		</tr>
	</table>
</div>
<?php }} ?>