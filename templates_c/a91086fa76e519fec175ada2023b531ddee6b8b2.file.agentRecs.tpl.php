<?php /* Smarty version Smarty-3.1.12, created on 2013-05-08 12:10:44
         compiled from "/var/www/html/agents/BETA/templates/agentRecs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151024411518a1694a76bf9-27023409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a91086fa76e519fec175ada2023b531ddee6b8b2' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/agentRecs.tpl',
      1 => 1357827511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151024411518a1694a76bf9-27023409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a1694a80a97_87893108',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a1694a80a97_87893108')) {function content_518a1694a80a97_87893108($_smarty_tpl) {?><table id="tableRec">
	<tr>
		<td>
			<audio id="recordSource" controls="controls">
				<source src="" type="audio/wav">
				Your browser does not support this audio format.
			</audio>
		</td>
	</tr>
	<tr>
		<td>
			<div style="overflow: auto; height: 430px; width: <?php echo $_smarty_tpl->tpl_vars['window']->value['width']-10;?>
; margin: 0px auto;">
				<table id="recordsList">
				</table>
			</div>
		</td>
	</tr>
</table>
<?php }} ?>