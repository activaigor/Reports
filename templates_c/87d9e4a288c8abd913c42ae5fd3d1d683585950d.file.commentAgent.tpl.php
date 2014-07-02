<?php /* Smarty version Smarty-3.1.12, created on 2013-05-08 12:10:44
         compiled from "/var/www/html/agents/BETA/templates/commentAgent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:839608990518a16946a6dd7-63713552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '839608990518a16946a6dd7-63713552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a16946a87e9_71036376',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a16946a87e9_71036376')) {function content_518a16946a87e9_71036376($_smarty_tpl) {?><table id="bodyWindow">
	<tr>
		<td width="250"><input onFocus="doClear(this)" onBlur="doDefault(this)" id="commentInput" type="text" value="ваш комментарий"></td>
		<td width="50"><a href="javascript: saveComment();">OK</a></td>
	</tr>
</table>
<?php }} ?>