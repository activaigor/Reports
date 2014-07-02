<?php /* Smarty version Smarty-3.1.12, created on 2014-03-12 13:12:19
         compiled from "/var/www/html/agents/templates/queueCDR.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15082035152d12209350d56-74176416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d15cd17ac7ab2b961689d23d3e1dc39ff63c95e' => 
    array (
      0 => '/var/www/html/agents/templates/queueCDR.tpl',
      1 => 1394622727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15082035152d12209350d56-74176416',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52d1220939a0a7_09475076',
  'variables' => 
  array (
    'cdr_stat' => 0,
    'datetime' => 0,
    'time' => 0,
    'row' => 0,
    'agentsNames' => 0,
    'name' => 0,
    'repeat_calls' => 0,
    'call' => 0,
    'cdr' => 0,
    'queues' => 0,
    'queue_en' => 0,
    'queue_ru' => 0,
    'PAGE' => 0,
    'i' => 0,
    'PREV_PAGE' => 0,
    'pages_url' => 0,
    'cdr_table' => 0,
    'k' => 0,
    'pages_count' => 0,
    'NEXT_PAGE' => 0,
    'total_calls' => 0,
    'missed_calls' => 0,
    'avg_holdtime' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d1220939a0a7_09475076')) {function content_52d1220939a0a7_09475076($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="/includes/css/index.css"\>
<link type="text/css" rel="stylesheet" media="all" href="/includes/css/jquery-ui.css"\>
<link rel="stylesheet" type="text/css" href="/includes/js/jquery.datetimepicker.css"/>
<script src="/includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/includes/js/jquery-ui.js" type="text/javascript"></script>
<script src="/includes/js/audio/audiojs/audio.min.js"></script>
<script src="/includes/js/jquery.datetimepicker.js"></script>


    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Дата', 'Звонков'],
	  <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['datetime'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cdr_stat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['datetime']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
	  <?php $_smarty_tpl->tpl_vars['time'] = new Smarty_variable(explode(" ",$_smarty_tpl->tpl_vars['datetime']->value), null, 0);?>
          ['<?php echo $_smarty_tpl->tpl_vars['time']->value[1];?>
',  <?php echo $_smarty_tpl->tpl_vars['row']->value['calls'];?>
],
	  <?php } ?>
        ]);

        var options = {
	  chartArea: {
	  	left: 25,
	  	width: "60%", 
		height: "55%" 
	  },
          title: 'Интенсивность звонков',
	  enableInteractivity: true,
          hAxis: {
	  	showTextEvery: 10,
		title: 'Время',  
		titleTextStyle: {
			color: '#333'
		}
	},
          vAxis: {
		minValue: 0
	}
        };
	var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	//function initialize () {
	//	$("#test_cl").click(function() {
	//		drawChart();
	//	});
	//}
      google.load("visualization", "1", {
		packages:["corechart"]
	});
      google.setOnLoadCallback(drawChart);

    </script>



<script type="text/javascript">
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
                $(function() {
			$('.datepicker').datetimepicker({
				format:'Y-m-d H:i',
				step:30
			});
			var a = audiojs.createAll({
				'useFlash' : true
			});
			var audio = a[0];
			$(".play_wav").click(function(e){
				audio.pause();
				var record = "/includes/records/monitor/" + $(this).attr("record") + ".WAV";
				audio.load(record);
				audio.updatePlayhead(0);
				audio.skipTo(0);
				audio.play();
			});
                        //$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
			$("#cdr_header").find(".input_a").click(function(){
				$(this).toggle();
				$(this).parent().find("input").toggle();
			});
			$("#cdr_header").find(".select_a").click(function(){
				$(this).toggle();
				$(this).parent().find("select").toggle();
			});
			$( "#name_fill" ).autocomplete({
				source: agentNames
			});
						
			$("#cdr_window").html("====");

			$("#repeat_butt").click(function(){
				if ($("#cdr_window").html() === "====") {
					$("#cdr_window").animate({
						height: "200px"
					} , 250, function(){
						$("#cdr_window").html(
							"<table>" + 
							"<thead>" + 
							"<tr><td align=\"center\" width=\"150\">Номер</td><td align=\"center\" width=\"50\">Повторов</td></tr>" + 
							"</thead>" + 
							"<tbody>" + 
							<?php  $_smarty_tpl->tpl_vars['call'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['call']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['repeat_calls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['call']->key => $_smarty_tpl->tpl_vars['call']->value){
$_smarty_tpl->tpl_vars['call']->_loop = true;
?>
							"<tr><td><a href=\"/cdr<?php echo $_smarty_tpl->tpl_vars['cdr']->value->add_filter($_GET,'caller',$_smarty_tpl->tpl_vars['call']->value['caller']);?>
\"><?php echo $_smarty_tpl->tpl_vars['call']->value['caller'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['call']->value['count'];?>
</td></tr>" +
							<?php } ?>
							"</tbody>" + 
							"</table>"
						);
					
					});
				} else {
					$("#cdr_window").animate({
						height: "20px"
					} , 250, function(){
						$("#cdr_window").html("====");
					});
				}
			});
                });
        });

</script>

</head>
<body style="background: white;">
    
<form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="get">

	<div id="cdr_navigation">
		<?php echo $_smarty_tpl->getSubTemplate ("header_signed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div id="daySelect">
			<table>
				<tr>
					<td><input type="text" class="datepicker" name="from" value="<?php echo $_GET['from'];?>
"></td>
					<td><input type="text" class="datepicker" name="to" value="<?php echo $_GET['to'];?>
"></td>
					<td><input type="submit" value="OK"></td>
				</tr>
			</table>
		</div>
	
		<div id="wav_player">
			<audio preload="auto"><source src=""></audio>
		</div>
	</div>

	<div id="left_body">
	<div id="pre_cdr">
		<a href="/cdr" id="refresh_filters">сбросить фильтры</a>
		<div id="cdr_window">
			====
		</div>
	</div>

	<table id="cdr" cellspacing="0">
		<thead id="cdr_header">
		<tr>
			<td width="130">
				<span>старт</span>
			</td>
			<td width="90">
				<a class="input_a" href="javascript: void(0)">оператор</a>
				<input style="display: none;" type="text" name="dstchannel" id="name_fill" value="<?php echo $_GET['dstchannel'];?>
">
			</td>
			<td width="100">
				<a class="input_a" href="javascript: void(0)">вход</a>
				<input style="display: none;" type="text" name="callie" value="<?php echo $_GET['callie'];?>
">
			</td>
			<td width="170">
				<a class="select_a" href="javascript: void(0)">линия</a>

				<select style="display: none" name="queue_alias">
					<option value=""></option>
					<?php  $_smarty_tpl->tpl_vars['queue_ru'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['queue_ru']->_loop = false;
 $_smarty_tpl->tpl_vars['queue_en'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['queues']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['queue_ru']->key => $_smarty_tpl->tpl_vars['queue_ru']->value){
$_smarty_tpl->tpl_vars['queue_ru']->_loop = true;
 $_smarty_tpl->tpl_vars['queue_en']->value = $_smarty_tpl->tpl_vars['queue_ru']->key;
?>
					<?php if (($_GET['queue_alias']==$_smarty_tpl->tpl_vars['queue_en']->value)){?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['queue_en']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['queue_ru']->value;?>
</option>
					<?php }else{ ?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['queue_en']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['queue_ru']->value;?>
</option>
					<?php }?>
					<?php } ?>
				</select>
			</td>
			<td width="100">
				<a class="input_a" href="javascript: void(0)">клиент</a>
				<input style="display: none;" type="text" name="caller" value="<?php echo $_GET['caller'];?>
">
			</td>
			<td width="60">
				<a class="input_a" href="javascript: void(0)">ожидание</a>
				<input style="display: none;" type="text" name="holdtime" value="<?php echo $_GET['holdtime'];?>
">
			</td>
			<td width="60">
				<a class="input_a" href="javascript: void(0)">разговор</a>
				<input style="display: none;" type="text" name="speaktime" value="<?php echo $_GET['speaktime'];?>
">
			</td>
			<td width="40">
			</td>
		</tr>
		</thead>
		<tbody style="height:100px; overflow:auto;">
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['PREV_PAGE'] = new Smarty_variable($_smarty_tpl->tpl_vars['PAGE']->value-1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['NEXT_PAGE'] = new Smarty_variable($_smarty_tpl->tpl_vars['PAGE']->value+1, null, 0);?>
		
		<?php if (($_smarty_tpl->tpl_vars['PAGE']->value>1)){?>
		<tr class="row<?php echo $_smarty_tpl->tpl_vars['i']->value%2;?>
">
			<td colspan="8" class="cdr_prevnext"><a href="<?php echo $_smarty_tpl->tpl_vars['pages_url']->value[$_smarty_tpl->tpl_vars['PREV_PAGE']->value];?>
">назад</a></td>
		</tr>
		<?php }?>
		
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cdr_table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value+1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
		<tr class="row<?php echo $_smarty_tpl->tpl_vars['i']->value%2;?>
">
			<td width="130"><?php echo $_smarty_tpl->tpl_vars['row']->value['start'];?>
</td>
			<td width="90"><?php echo $_smarty_tpl->tpl_vars['row']->value['dstchannel'];?>
</td>
			<td width="100"><?php echo $_smarty_tpl->tpl_vars['row']->value['callie'];?>
</td>
			<td width="170"><?php echo $_smarty_tpl->tpl_vars['row']->value['city_queue'];?>
</td>
			<td width="100"><?php echo $_smarty_tpl->tpl_vars['row']->value['caller'];?>
</td>
			<td width="60"><?php echo $_smarty_tpl->tpl_vars['row']->value['holdtime'];?>
</td>
			<td width="60"><?php echo $_smarty_tpl->tpl_vars['row']->value['speaktime'];?>
</td>
			<?php if (($_smarty_tpl->tpl_vars['row']->value['answered']==1)){?>
			<td width="30"><a href="javascript: void(0)" class="play_wav" record="<?php echo $_smarty_tpl->tpl_vars['row']->value['record'];?>
"><img src="/includes/pictures/media-play.png"></a></td>
			<?php }else{ ?>
			<td width="30"></td>
			<?php }?>
		</tr>
		<?php } ?>
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
		
		<?php if (($_smarty_tpl->tpl_vars['PAGE']->value!=$_smarty_tpl->tpl_vars['pages_count']->value)){?>
		<tr class="row<?php echo $_smarty_tpl->tpl_vars['i']->value%2;?>
">
			<td colspan="8" class="cdr_prevnext"><a href="<?php echo $_smarty_tpl->tpl_vars['pages_url']->value[$_smarty_tpl->tpl_vars['NEXT_PAGE']->value];?>
">далее</a></td>
		</tr>
		<?php }?>
		
		</tbody>
	</table>
	</div>

	<div id="right_body">
	<div id="cdr_stat">
		<table>
			<tr>
				<td width="80">Звонков</td>
				<td width="100"><?php echo $_smarty_tpl->tpl_vars['total_calls']->value;?>
</td>
			</tr>
			<tr>
				<td width="80">Пропущенных</td>
				<td width="100"><?php echo $_smarty_tpl->tpl_vars['missed_calls']->value;?>
</td>
			</tr>
			<tr>
				<td width="80">Повторных</td>
				<td width="100"><a href="#" id="repeat_butt"><?php echo count($_smarty_tpl->tpl_vars['repeat_calls']->value);?>
</a></td>
			</tr>
			<tr>
				<td width="80">Ожидание</td>
				<td width="100"><?php echo $_smarty_tpl->tpl_vars['avg_holdtime']->value;?>
</td>
			</tr>
		</table>
		<div id="chart_div" style="width: 400px; height: 200px; margin: 0px; margin-left: -25px; margin-top: 20px;"></div>
	</div>
	</div>

</form>

<a href="/" id="mainLogo"><img src="/includes/pictures/roundcube_logo.png"></a>


</body>
</html>
<?php }} ?>