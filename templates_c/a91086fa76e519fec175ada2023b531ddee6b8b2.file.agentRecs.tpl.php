<?php /* Smarty version Smarty-3.1.12, created on 2014-05-27 16:25:39
         compiled from "/var/www/html/agents/BETA/templates/agentRecs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5731840155383551fe240e5-92335162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a91086fa76e519fec175ada2023b531ddee6b8b2' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/agentRecs.tpl',
      1 => 1401197130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5731840155383551fe240e5-92335162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5383551fe30fd1_74652376',
  'variables' => 
  array (
    'window' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5383551fe30fd1_74652376')) {function content_5383551fe30fd1_74652376($_smarty_tpl) {?><table id="tableRec">
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