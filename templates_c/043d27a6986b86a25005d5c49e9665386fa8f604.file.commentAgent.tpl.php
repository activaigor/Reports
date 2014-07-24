<?php /* Smarty version Smarty-3.1.12, created on 2014-07-24 13:13:50
         compiled from "/var/www/html/Reports-dev/templates/commentAgent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23156044553d0dc5eed3d47-95336914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '043d27a6986b86a25005d5c49e9665386fa8f604' => 
    array (
      0 => '/var/www/html/Reports-dev/templates/commentAgent.tpl',
      1 => 1406196676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23156044553d0dc5eed3d47-95336914',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53d0dc5eed52d7_64556351',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0dc5eed52d7_64556351')) {function content_53d0dc5eed52d7_64556351($_smarty_tpl) {?><table id="bodyWindow">
	<tr>
		<td width="250"><input onFocus="doClear(this)" onBlur="doDefault(this)" id="commentInput" type="text" value="ваш комментарий"></td>
		<td width="50"><a href="javascript: saveComment();">OK</a></td>
	</tr>
</table>
<?php }} ?>