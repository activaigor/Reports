<?php /* Smarty version Smarty-3.1.12, created on 2013-07-23 10:20:57
         compiled from "/var/www/html/agents/templates/agentRecs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151366672950eed0d8038e34-41003356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a18ed3e93aaafe8a09fa32315340b2369e2d9c1' => 
    array (
      0 => '/var/www/html/agents/templates/agentRecs.tpl',
      1 => 1374564033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151366672950eed0d8038e34-41003356',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50eed0d80442b4_50015572',
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50eed0d80442b4_50015572')) {function content_50eed0d80442b4_50015572($_smarty_tpl) {?><table id="tableRec">
	<tr>
		<td>
			<audio id="recordSource" controls="controls">
				<source src="/includes/records/monitor/2013/07/05/agent_05072013075903_1373000328.184467.WAV" type="audio/wav">
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