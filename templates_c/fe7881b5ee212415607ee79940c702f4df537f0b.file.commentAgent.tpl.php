<?php /* Smarty version Smarty-3.1.12, created on 2013-01-08 15:03:25
         compiled from "/var/www/html/agents/templates/commentAgent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84437015250ec191d1c0611-86342197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe7881b5ee212415607ee79940c702f4df537f0b' => 
    array (
      0 => '/var/www/html/agents/templates/commentAgent.tpl',
      1 => 1357645087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84437015250ec191d1c0611-86342197',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ec191d1c2417_15432614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ec191d1c2417_15432614')) {function content_50ec191d1c2417_15432614($_smarty_tpl) {?><table id="bodyWindow">
	<tr>
		<td width="250"><input onFocus="doClear(this)" onBlur="doDefault(this)" id="commentInput" type="text" value="ваш комментарий"></td>
		<td width="50"><a href="javascript: saveComment();">OK</a></td>
	</tr>
</table>
<?php }} ?>