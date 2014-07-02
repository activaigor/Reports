<?php /* Smarty version Smarty-3.1.12, created on 2013-09-02 11:23:03
         compiled from "/var/www/html/agents/templates/shifts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173964413951b57251b506b2-52287782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc2f22f568afd0ba879aba88a8b20f598b9a8911' => 
    array (
      0 => '/var/www/html/agents/templates/shifts.tpl',
      1 => 1378109127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173964413951b57251b506b2-52287782',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51b57251cf87a7_45865637',
  'variables' => 
  array (
    'agentsNames' => 0,
    'name' => 0,
    'duration' => 0,
    'FILTER' => 0,
    'type' => 0,
    'city' => 0,
    'CITIES' => 0,
    'city_eng' => 0,
    'city_cur' => 0,
    'mysql_shifts' => 0,
    'cur_day' => 0,
    'date' => 0,
    'week_day' => 0,
    'day_shifts' => 0,
    'day_shift' => 0,
    'shift' => 0,
    'agentNum' => 0,
    'agentsNamesOnline' => 0,
    'td_class' => 0,
    'shifts_limits' => 0,
    'step' => 0,
    'WINDOWS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b57251cf87a7_45865637')) {function content_51b57251cf87a7_45865637($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="./includes/css/shifts.css"\>
<link type="text/css" rel="stylesheet" media="all" href="./includes/css/jquery-ui.css"\>
<link rel="stylesheet" href="./includes/css/jquery.fileInput.css" />
<script src="./includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="./includes/js/jquery-ui.js" type="text/javascript"></script>
<script src="./includes/js/jquery.fileInput.js" type="text/javascript"></script>
<script>
	var hoverTimeout;
	var agentNames = [
		<?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['agentsNames']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value){
$_smarty_tpl->tpl_vars['name']->_loop = true;
?>
		"<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
",
		<?php } ?>
	];
	$(document).ready(function(){
		
		$( ".name_fill" ).autocomplete({
			source: agentNames
		});
		
		$(function() {
			$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
		});
		
		$('input[type=file]').prettyFileInput();
		$(".add_shift").find("a").click(function(){
			$("#shift_add").css("display" , "block");
			$("#shift_add").find("#cur_day").val($(this).attr("id"));
		});

		$(".shift_nav").css('opacity' , '0');

		$(".shift_nav").hover(function(){
			clearTimeout(hoverTimeout);
			var cur_item = $(this);
			hoverTimeout = setTimeout(function(){	
				cur_item.animate({
					opacity: 1
				}, 200);
			} , 300);
		}, function(){
			clearTimeout(hoverTimeout);
			$(this).animate({
				opacity: 0
			}, 200);
		});

		$(".edit").find("a").click(function(){
			id = $(this).attr("id");
			$("#shift_edit").find("#shift_id").val($(this).attr("id"));
			$("#shift_edit").find("#last_name").val($("#item_" + id).find("#name").html());
			time = $("#item_" + id).find("#time").html().split(" - ");
			cur_day = $("#item_" + id).find("#cur_day").val();
			$("#shift_edit").find("#start").val(time[0]);
			$("#shift_edit").find("#end").val(time[1]);
			$("#shift_edit").find("#cur_day").val(cur_day);
			$("#shift_edit").css("display" , "block");
		});
		
		$(".remove").find("a").click(function(){
			id = $(this).attr("id");
			$("#shift_delete").find("#shift_id").val($(this).attr("id"));
			$("#shift_delete").find("#last_name").val($("#item_" + id).find("#name").html());
			time = $("#item_" + id).find("#time").html().split(" - ");
			$("#shift_delete").find("#start").val(time[0]);
			$("#shift_delete").find("#end").val(time[1]);
			$("#shift_delete").css("display" , "block");
		});

	});
</script>
</head>
<body>
<a href="/" id="mainLogo"><img src="./includes/pictures/roundcube_logo.png" style="position: fixed; top: 5px; left: 0px; border: none;"></a>

<div id="main_navigation">
	<h3>панель экспорта</h3>
	<form id="shifts_export" method="post" enctype="multipart/form-data">
		<table>
		<tr>
			<td><input type="file" name="shift"></td>
			<td><input type="submit" name="export" value="ok"></td>
		</tr>
		<tr>
			<td><input type="text" name="year_month" value="<?php echo date("Y-m");?>
"></td>
		</tr>
		</table>
	</form>
	<h3>фильтр даты</h3>
	<?php echo $_smarty_tpl->getSubTemplate ('dayFilter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<h3>фильтр смен</h3>
	<form id="shift_select" method="get">
		
		<?php if (($_smarty_tpl->tpl_vars['duration']->value==8)){?>
		<input type="submit" name="shift_type" class="selected" value="8">
		<?php }else{ ?>
		<input type="submit" name="shift_type" value="8">
		<?php }?>
		<?php if (($_smarty_tpl->tpl_vars['duration']->value==12)){?>
		<input type="submit" name="shift_type" class="selected" value="12">
		<?php }else{ ?>
		<input type="submit" name="shift_type" value="12">
		<?php }?>
		<input type="hidden" name="from" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['from'];?>
">
		<input type="hidden" name="to" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['to'];?>
">
		<input type="hidden" name="shift_class" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
		<input type="hidden" name="shift_class" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
		<input type="hidden" name="city" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
">
	</form>
	<h3>тип смен</h3>
	<form id="shift_select" method="get">
		
		<?php if (($_smarty_tpl->tpl_vars['type']->value=="tech")){?>
		<input type="submit" name="shift_class" class="selected" value="tech">
		<?php }else{ ?>
		<input type="submit" name="shift_class" value="tech">
		<?php }?>
		<?php if (($_smarty_tpl->tpl_vars['type']->value=="manager")){?>
		<input type="submit" name="shift_class" class="selected" value="manager">
		<?php }else{ ?>
		<input type="submit" name="shift_class" value="manager">
		<?php }?>
		<input type="hidden" name="from" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['from'];?>
">
		<input type="hidden" name="to" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['to'];?>
">
		<input type="hidden" name="shift_type" value="<?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
">
		<input type="hidden" name="shift_type" value="<?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
">
		<input type="hidden" name="city" value="<?php echo $_smarty_tpl->tpl_vars['city']->value;?>
">
	</form>
	
	<h3>город</h3>
	<div id="daySelect">
	<form method="get">
		<select name="city">
		<?php  $_smarty_tpl->tpl_vars['city_cur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city_cur']->_loop = false;
 $_smarty_tpl->tpl_vars['city_eng'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CITIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city_cur']->key => $_smarty_tpl->tpl_vars['city_cur']->value){
$_smarty_tpl->tpl_vars['city_cur']->_loop = true;
 $_smarty_tpl->tpl_vars['city_eng']->value = $_smarty_tpl->tpl_vars['city_cur']->key;
?>
			<?php if (($_smarty_tpl->tpl_vars['city_eng']->value==$_smarty_tpl->tpl_vars['city']->value)){?>
			<option selected value="<?php echo $_smarty_tpl->tpl_vars['city_eng']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['city_cur']->value;?>
</option>
			<?php }else{ ?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['city_eng']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['city_cur']->value;?>
</option>
			<?php }?>
		<?php } ?>
		</select>
		
		<input type="submit" name="shift_class" value="ok">
		<input type="hidden" name="from" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['from'];?>
">
		<input type="hidden" name="to" value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value['to'];?>
">
		<input type="hidden" name="shift_type" value="<?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
">
		<input type="hidden" name="shift_type" value="<?php echo $_smarty_tpl->tpl_vars['duration']->value;?>
">
		<input type="hidden" name="shift_class" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
	</form>
	</div>

</div>

<table id="shifts_table" cellspacing="0">
	<?php  $_smarty_tpl->tpl_vars['day_shifts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day_shifts']->_loop = false;
 $_smarty_tpl->tpl_vars['cur_day'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mysql_shifts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day_shifts']->key => $_smarty_tpl->tpl_vars['day_shifts']->value){
$_smarty_tpl->tpl_vars['day_shifts']->_loop = true;
 $_smarty_tpl->tpl_vars['cur_day']->value = $_smarty_tpl->tpl_vars['day_shifts']->key;
?>
	<?php if (($_smarty_tpl->tpl_vars['cur_day']->value==date("Y-m-d"))){?>
	<tr class="current_day">
	<?php }else{ ?>
	<tr>
	<?php }?>
		<?php $_smarty_tpl->tpl_vars['date'] = new Smarty_variable(explode("-",$_smarty_tpl->tpl_vars['cur_day']->value), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['week_day'] = new Smarty_variable(date("D",strtotime($_smarty_tpl->tpl_vars['cur_day']->value)), null, 0);?>
		<td class="date"><?php echo (int)($_smarty_tpl->tpl_vars['date']->value[2]);?>
</td>
		<td class="date"><?php echo $_smarty_tpl->tpl_vars['week_day']->value;?>
</td>
		<?php $_smarty_tpl->tpl_vars['day_shift'] = new Smarty_variable(0, null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['shift'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shift']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['day_shifts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shift']->key => $_smarty_tpl->tpl_vars['shift']->value){
$_smarty_tpl->tpl_vars['shift']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars['day_shift'] = new Smarty_variable($_smarty_tpl->tpl_vars['day_shift']->value+1, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['agentNum'] = new Smarty_variable(array_search($_smarty_tpl->tpl_vars['shift']->value['last_name'],$_smarty_tpl->tpl_vars['agentsNames']->value), null, 0);?>
			<?php if ((array_key_exists($_smarty_tpl->tpl_vars['agentNum']->value,$_smarty_tpl->tpl_vars['agentsNamesOnline']->value)&&$_smarty_tpl->tpl_vars['cur_day']->value==date("Y-m-d"))){?>
				<?php if ((abs($_smarty_tpl->tpl_vars['agentsNamesOnline']->value[$_smarty_tpl->tpl_vars['agentNum']->value]-$_smarty_tpl->tpl_vars['shift']->value['start'])<=10*60)){?>

					<?php $_smarty_tpl->tpl_vars['td_class'] = new Smarty_variable("class=\"present_ok\"", null, 0);?>
				<?php }else{ ?>
					<?php $_smarty_tpl->tpl_vars['td_class'] = new Smarty_variable("class=\"present_warn\"", null, 0);?>
				<?php }?>
			<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['td_class'] = new Smarty_variable('', null, 0);?>
			<?php }?>
			<td <?php echo $_smarty_tpl->tpl_vars['td_class']->value;?>
>
				<div id="item_<?php echo $_smarty_tpl->tpl_vars['shift']->value['id'];?>
" class="shift_item">
					<div id="name" class="name"><?php echo $_smarty_tpl->tpl_vars['shift']->value['last_name'];?>
</div>
					<div id="time" class="time"><?php echo date("H",$_smarty_tpl->tpl_vars['shift']->value['start']);?>
 - <?php echo date("H",$_smarty_tpl->tpl_vars['shift']->value['end']);?>
</div>
					<input type="hidden" id="cur_day" value="<?php echo $_smarty_tpl->tpl_vars['cur_day']->value;?>
">
				</div>
				<div class="shift_nav">
					<div class="edit">
						<a id="<?php echo $_smarty_tpl->tpl_vars['shift']->value['id'];?>
" href="javascript: void(0);"></a>
					</div>
					<div class="remove">
						<a id="<?php echo $_smarty_tpl->tpl_vars['shift']->value['id'];?>
" href="javascript: void(0);"></a>
					</div>
				</div>
			</td>
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['step'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['step']->_loop = false;
 $_from = range(0,$_smarty_tpl->tpl_vars['shifts_limits']->value[$_smarty_tpl->tpl_vars['duration']->value]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['step']->key => $_smarty_tpl->tpl_vars['step']->value){
$_smarty_tpl->tpl_vars['step']->_loop = true;
?>
			<?php if (($_smarty_tpl->tpl_vars['step']->value>$_smarty_tpl->tpl_vars['day_shift']->value)){?>
				<td class="add_shift"><a id="<?php echo $_smarty_tpl->tpl_vars['cur_day']->value;?>
" href="javascript: void(0)">+</a></td>
			<?php }?>
		<?php } ?>

	</tr>
	<?php } ?>
</table>

<?php  $_smarty_tpl->tpl_vars['window'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['window']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['WINDOWS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['window']->key => $_smarty_tpl->tpl_vars['window']->value){
$_smarty_tpl->tpl_vars['window']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['window']->key;
?>
	<?php echo $_smarty_tpl->getSubTemplate ("window.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php } ?>

</body>
</html>
<?php }} ?>