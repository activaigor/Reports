<?php /* Smarty version Smarty-3.1.12, created on 2013-05-08 13:11:13
         compiled from "/var/www/html/agents/BETA/templates/indexUnsigned.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1077078070518a24c1e3b9a5-05304634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81f7e4a5a4ee31ff1378a7507215a6f816a61110' => 
    array (
      0 => '/var/www/html/agents/BETA/templates/indexUnsigned.tpl',
      1 => 1357825295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1077078070518a24c1e3b9a5-05304634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'city' => 0,
    'CITIES' => 0,
    'index' => 0,
    'cityName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a24c1eae9b7_22782547',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a24c1eae9b7_22782547')) {function content_518a24c1eae9b7_22782547($_smarty_tpl) {?>	<div id="realtimeBlock" style="width: 99%">
		<?php echo $_smarty_tpl->getSubTemplate ("agentsOnline.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div id="loginP">
		<strong>Вы не вошли в систему</strong>
		<a href="javascript: toggle('loginBox'); void(0);">Войти</a>
	</div>
	
	<div style="position: fixed; left: 50%; top: 0px;" id='cssmenu'>
	<ul>
   		<li class='has-sub '><a href='#'><span><?php echo $_smarty_tpl->tpl_vars['CITIES']->value[$_smarty_tpl->tpl_vars['city']->value];?>
</span></a>
      		<ul>
            	<?php  $_smarty_tpl->tpl_vars['cityName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cityName']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CITIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cityName']->key => $_smarty_tpl->tpl_vars['cityName']->value){
$_smarty_tpl->tpl_vars['cityName']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['cityName']->key;
?>
                	<li><a href="?city=<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</span></a></li>
            	<?php } ?>
      		</ul>
   		</li>
	</ul>
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate ("loginBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>