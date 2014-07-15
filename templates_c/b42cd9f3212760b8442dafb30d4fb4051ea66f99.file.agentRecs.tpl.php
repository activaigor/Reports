<?php /* Smarty version Smarty-3.1.12, created on 2014-07-04 13:50:33
         compiled from "/var/www/html/Reports/templates/agentRecs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59854355553b686f9807470-06460332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b42cd9f3212760b8442dafb30d4fb4051ea66f99' => 
    array (
      0 => '/var/www/html/Reports/templates/agentRecs.tpl',
      1 => 1404392011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59854355553b686f9807470-06460332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53b686f980f224_85301371',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b686f980f224_85301371')) {function content_53b686f980f224_85301371($_smarty_tpl) {?><table id="tableRec">
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