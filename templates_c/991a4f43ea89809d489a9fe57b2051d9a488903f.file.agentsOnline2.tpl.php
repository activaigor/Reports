<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 15:15:30
         compiled from "/var/www/html/agents/templates/agentsOnline2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123619020850d44159eb6b87-43842280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '991a4f43ea89809d489a9fe57b2051d9a488903f' => 
    array (
      0 => '/var/www/html/agents/templates/agentsOnline2.tpl',
      1 => 1356527513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123619020850d44159eb6b87-43842280',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50d4415a0abe99_22805824',
  'variables' => 
  array (
    'city' => 0,
    'logged' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50d4415a0abe99_22805824')) {function content_50d4415a0abe99_22805824($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsOnline.css"\>
<script src="../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../includes/js/advancedFuncs.js" type="text/javascript"></script>
<script src="../includes/js/agentsAjax.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		getData();
		setInterval( function() { updateData() } , 3000);
	});
</script>
</head>
<body>

<a href="agentsOnline.php?city=<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
&logged=<?php echo $_smarty_tpl->tpl_vars['logged']->value;?>
" id="mainLogo"><img src="pictures/roundcube_logo.png" style="position: absolute; top: 25px; left: 0px; border: none;"></a>
<a href="javascript: updateData();">aaa</a>

<table id="offlineStats" cellspacing="10">
	<tr>
		<td width="130" style="padding-left: 20px">ОФФЛАЙН:</td>
		<td width="70" style="border-right: 1px dotted grey;" id="offline"></td>
		<td width="170" style="padding-left: 20px">НА ЛИНИИ:</td>
		<td id="online"></td>
	</tr>
</table>

<table id="agentsStat">
	<tbody>
		<!-- DATA WILL BE PASSED HERE --!>
	</tbody>
</table>

<div id="popupWindow" onMouseOut='timeGo("start");' onMouseOver='timeGo("stop");' style="display: none;">
	<a href="" id="detailAgent">ДЕТАЛЬНО</a>
   	<a href="" id="removeHistory">УДАЛИТЬ</a>
</div>

</body>
</html>
<?php }} ?>