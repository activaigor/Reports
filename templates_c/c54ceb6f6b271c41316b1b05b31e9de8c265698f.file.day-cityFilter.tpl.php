<?php /* Smarty version Smarty-3.1.12, created on 2013-05-15 13:56:34
         compiled from "/var/www/html/agents/BETA/templates/day-cityFilter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192442403519369e22fe0f2-36265739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c54ceb6f6b271c41316b1b05b31e9de8c265698f' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/day-cityFilter.tpl',
      1 => 1355999722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192442403519369e22fe0f2-36265739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FILTER' => 0,
    'CITIES' => 0,
    'value' => 0,
    'city' => 0,
    'ORDER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_519369e23409b3_40241142',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519369e23409b3_40241142')) {function content_519369e23409b3_40241142($_smarty_tpl) {?><div id="daySelect">
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="get">
		<table>
			<tr>
				<td><input type="text" class="datepicker" name="from" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['from'];?>
"></td>
				<td><input type="text" class="datepicker" name="to" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['to'];?>
"></td>
			</tr>
			<tr>
				<td>
					<select name="city">
					<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CITIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
 $_smarty_tpl->tpl_vars['value']->value = $_smarty_tpl->tpl_vars['city']->key;
?>
						<?php if (($_smarty_tpl->tpl_vars['FILTER']->value['city']==$_smarty_tpl->tpl_vars['value']->value)){?>	
							<option selected value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['city']->value;?>
</option>
						<?php }else{ ?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['city']->value;?>
</option>
						<?php }?>
					<?php } ?>
					</select>
				</td>
				<td><input type="submit" value="OK"></td>
				<input type="hidden" name="order" value="<?php echo $_smarty_tpl->tpl_vars['ORDER']->value;?>
">
		</table>
	</form>
</div>
<?php }} ?>