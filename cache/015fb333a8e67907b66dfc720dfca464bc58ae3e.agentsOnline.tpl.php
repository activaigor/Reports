<?php /*%%SmartyHeaderCode:124014478550c32c771a39c3-46606312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '015fb333a8e67907b66dfc720dfca464bc58ae3e' => 
    array (
      0 => '/var/www/html/agents/templates/agentsOnline.tpl',
      1 => 1354891739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124014478550c32c771a39c3-46606312',
  'variables' => 
  array (
    'totalOffline' => 0,
    'totalOnline' => 0,
    'agents' => 0,
    'i' => 0,
    'agent' => 0,
    'detail' => 0,
    'logText' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c32c772b2376_01745643',
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c32c772b2376_01745643')) {function content_50c32c772b2376_01745643($_smarty_tpl) {?><html>
<head>
<link type="text/css" rel="stylesheet" media="all" href="../includes/css/agentsOnline.css"\>
<script src="../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="../includes/js/advancedFuncs.js" type="text/javascript"></script>
</head>
<body>

<table id="offlineStats" cellspacing="10">
	<tr>
		<td width="50" style="padding-left: 20px">ОФФЛАЙН:</td>
		<td width="70" style="border-right: 1px dotted grey;">1</td>
		<td width="80" style="padding-left: 20px">НА ЛИНИИ:</td>
		<td>13</td>
	</tr>
</table>
<table id="agentsStat">
	<tr id="hoverAgents" onclick='toggleWindow("agentDIV0");'>
		<td width="50px" >
			<p id="agentButton">Плетняков<br>Agent/25</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 22.530864197531%;">
					<p>2:01</p>
				</div>
				<div id="intProgressPause" style="width: 6.033950617284%;">
					<p>0:32</p>
				</div>
				<div id="intProgressOff" style="width: 0%;">
					<p>0:00</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusaway">away</p>
		</td>
		<td width="50px">
			            	<p id="offlineNum">2</p>
					</td>
	</tr>
		<tr>
		<td id="agentDIV0" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 11:26:13</p>
			<p>Время разговора: 1:39</p>
			<p>Время ухода: 2012-12-08 14:01:27</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV1");'>
		<td width="50px" >
			<p id="agentButton">Ткаченко<br>Agent/47</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 25.41049382716%;">
					<p>2:17</p>
				</div>
				<div id="intProgressPause" style="width: 3.5432098765432%;">
					<p>0:19</p>
				</div>
				<div id="intProgressOff" style="width: 1.0185185185185%;">
					<p>0:05</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusonline">online</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV1" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 11:16:49</p>
			<p>Время разговора: 1:39</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV2");'>
		<td width="50px" >
			<p id="agentButton">Конопко<br>Agent/26</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 23.648148148148%;">
					<p>2:07</p>
				</div>
				<div id="intProgressPause" style="width: 4.1018518518519%;">
					<p>0:22</p>
				</div>
				<div id="intProgressOff" style="width: 4.033950617284%;">
					<p>0:21</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusbusy">busy</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV2" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 11:03:04</p>
			<p>Время разговора: 1:25</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV3");'>
		<td width="50px" >
			<p id="agentButton">Бочкор<br>Agent/51</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 24.466049382716%;">
					<p>2:12</p>
				</div>
				<div id="intProgressPause" style="width: 7.5401234567901%;">
					<p>0:40</p>
				</div>
				<div id="intProgressOff" style="width: 1.4938271604938%;">
					<p>0:08</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusbusy">busy</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV3" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 11:00:48</p>
			<p>Время разговора: 1:37</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV4");'>
		<td width="50px" >
			<p id="agentButton">Семинская<br>Agent/39</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 18.268518518519%;">
					<p>1:38</p>
				</div>
				<div id="intProgressPause" style="width: 0.51234567901235%;">
					<p>0:02</p>
				</div>
				<div id="intProgressOff" style="width: 25.117283950617%;">
					<p>2:15</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusonline">online</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV4" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 10:02:23</p>
			<p>Время разговора: 1:06</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV5");'>
		<td width="50px" >
			<p id="agentButton">Шулежко<br>Agent/31</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 35.391975308642%;">
					<p>3:11</p>
				</div>
				<div id="intProgressPause" style="width: 2.5987654320988%;">
					<p>0:14</p>
				</div>
				<div id="intProgressOff" style="width: 6.1388888888889%;">
					<p>0:33</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusonline">online</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV5" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 10:02:18</p>
			<p>Время разговора: 2:26</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV6");'>
		<td width="50px" >
			<p id="agentButton">Христинченко<br>Agent/24</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 40.314814814815%;">
					<p>3:37</p>
				</div>
				<div id="intProgressPause" style="width: 2.7222222222222%;">
					<p>0:14</p>
				</div>
				<div id="intProgressOff" style="width: 1.2561728395062%;">
					<p>0:06</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statuslunch">lunch</p>
		</td>
		<td width="50px">
			            	<p id="offlineNum">1</p>
					</td>
	</tr>
		<tr>
		<td id="agentDIV6" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 09:59:47</p>
			<p>Время разговора: 2:59</p>
			<p>Время ухода: 2012-12-08 14:00:36</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV7");'>
		<td width="50px" >
			<p id="agentButton">Заяц<br>Agent/55</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 27.91975308642%;">
					<p>2:30</p>
				</div>
				<div id="intProgressPause" style="width: 13.398148148148%;">
					<p>1:12</p>
				</div>
				<div id="intProgressOff" style="width: 3.0216049382716%;">
					<p>0:16</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusbusy">busy</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV7" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 09:59:06</p>
			<p>Время разговора: 1:49</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV8");'>
		<td width="50px" >
			<p id="agentButton">Куцева<br>Agent/37</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 41.817901234568%;">
					<p>3:45</p>
				</div>
				<div id="intProgressPause" style="width: 0.66666666666667%;">
					<p>0:03</p>
				</div>
				<div id="intProgressOff" style="width: 12.049382716049%;">
					<p>1:05</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusonline">online</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV8" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 09:00:09</p>
			<p>Время разговора: 2:15</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV9");'>
		<td width="50px" >
			<p id="agentButton">Коваленко<br>Agent/28</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 46.33950617284%;">
					<p>4:10</p>
				</div>
				<div id="intProgressPause" style="width: 0%;">
					<p>0:00</p>
				</div>
				<div id="intProgressOff" style="width: 9.1574074074074%;">
					<p>0:49</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusonline">online</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV9" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 08:59:29</p>
			<p>Время разговора: 3:00</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV10");'>
		<td width="50px" >
			<p id="agentButton">Белодед<br>Agent/40</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 47.061728395062%;">
					<p>4:14</p>
				</div>
				<div id="intProgressPause" style="width: 6.1358024691358%;">
					<p>0:33</p>
				</div>
				<div id="intProgressOff" style="width: 2.3148148148148%;">
					<p>0:12</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusbusy">busy</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV10" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 08:59:36</p>
			<p>Время разговора: 2:43</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV11");'>
		<td width="50px" >
			<p id="agentButton">Федько<br>Agent/58</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 45.586419753086%;">
					<p>4:06</p>
				</div>
				<div id="intProgressPause" style="width: 1.6543209876543%;">
					<p>0:08</p>
				</div>
				<div id="intProgressOff" style="width: 8.9228395061728%;">
					<p>0:48</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusbusy">busy</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV11" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 08:57:08</p>
			<p>Время разговора: 2:54</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV12");'>
		<td width="50px" >
			<p id="agentButton">Каменская<br>Agent/60</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 50.083333333333%;">
					<p>4:30</p>
				</div>
				<div id="intProgressPause" style="width: 12.185185185185%;">
					<p>1:05</p>
				</div>
				<div id="intProgressOff" style="width: 13.734567901235%;">
					<p>1:14</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusonline">online</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV12" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 07:08:48</p>
			<p>Время разговора: 2:22</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV13");'>
		<td width="50px" >
			<p id="agentButton">Завьялов<br>Agent/56</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 56.391975308642%;">
					<p>5:04</p>
				</div>
				<div id="intProgressPause" style="width: 10.506172839506%;">
					<p>0:56</p>
				</div>
				<div id="intProgressOff" style="width: 10.283950617284%;">
					<p>0:55</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusonline">online</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV13" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 07:00:32</p>
			<p>Время разговора: 2:45</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

		<tr id="hoverAgents" onclick='toggleWindow("agentDIV14");'>
		<td width="50px" >
			<p id="agentButton">Сапега<br>Agent/30</p>
		</td>
				<td width="50"></td>
				<td style="width: 90%;">
			<div id="extProgress">
				<div id="intProgress" style="width: 55.308641975309%;">
					<p>4:58</p>
				</div>
				<div id="intProgressPause" style="width: 12.651234567901%;">
					<p>1:08</p>
				</div>
				<div id="intProgressOff" style="width: 10.185185185185%;">
					<p>0:55</p>
				</div>
			</div>
		</td>
		<td>
			<p id="shiftP">9h</p>
		</td>
		<td width="20px">
			<p id="statusbusy">busy</p>
		</td>
		<td width="50px">
					</td>
	</tr>
		<tr>
		<td id="agentDIV14" style="display: none;" colspan="5">
			<p>Начало смены: 2012-12-08 06:59:41</p>
			<p>Время разговора: 2:53</p>
			<p>Время ухода: пусто</p>
		</td>
	</tr>

	</table>

</body>
</html>
<?php }} ?>