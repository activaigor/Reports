<?php /* Smarty version Smarty-3.1.12, created on 2014-05-26 16:07:58
         compiled from "/var/www/html/agents/BETA/templates/commentAgent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69425170053833cae055921-94845143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87d9e4a288c8abd913c42ae5fd3d1d683585950d' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/commentAgent.tpl',
      1 => 1357645087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69425170053833cae055921-94845143',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53833cae061df4_26780298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53833cae061df4_26780298')) {function content_53833cae061df4_26780298($_smarty_tpl) {?><table id="bodyWindow">
	<tr>
		<td width="250"><input onFocus="doClear(this)" onBlur="doDefault(this)" id="commentInput" type="text" value="ваш комментарий"></td>
		<td width="50"><a href="javascript: saveComment();">OK</a></td>
	</tr>
</table>
<?php }} ?>