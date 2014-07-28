<?php /* Smarty version Smarty-3.1.12, created on 2014-07-28 17:13:12
         compiled from "/var/www/html/Reports/templates/commentAgent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121005930153d65a7809bc03-95463424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07fc8afba6e28c2b8f066183fa263270bab38aca' => 
    array (
      0 => '/var/www/html/Reports/templates/commentAgent.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121005930153d65a7809bc03-95463424',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53d65a7809d563_97934189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d65a7809d563_97934189')) {function content_53d65a7809d563_97934189($_smarty_tpl) {?><table id="bodyWindow">
	<tr>
		<td width="250"><input onFocus="doClear(this)" onBlur="doDefault(this)" id="commentInput" type="text" value="ваш комментарий"></td>
		<td width="50"><a href="javascript: saveComment();">OK</a></td>
	</tr>
</table>
<?php }} ?>