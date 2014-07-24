<div id="whoCall" style="display: none;">
	<div class="avatar" style="background-image: url(https://my.lanet.ua/download.php?source=photo&id={$userPhoto});">
		<!--<img src="https://my.lanet.ua/download.php?source=photo&id={$userPhoto}" alt="avatar" />-->
	</div>
	<table id="whoCallBar">
	</table>

	<div id="callInfo">
		<table id="newCall" cellspacing="0">
			<tr>
				<td>Клиент</td><td width="250" id="fio"></td>
				<td id="numb"></td>
			</tr>
			<tr>
				<td>Город</td><td width="200" id="city"></td>
				<td align="right" id="lang"></td>
			</tr>
		</table>
	</div>

	<table id="advBar" cellspacing="2">
		<tr>
			<td width="120" id="whoCall_begin"></td>
			<td width="110" id="whoCall_online"></td>
			<td width="110" id="whoCall_pause"></td>
			<td width="150" id="whoCall_shift"></td>
		</tr>
		<tr>
			<td id="whoCall_end"></td>
			<td id="whoCall_offline"></td>
			<td id="whoCall_duration"></td>
			<td id="whoCall_ip"></td>
		</tr>
	</table>
	
	<div id="changeStatus-online" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="online">
		<ul class="status_action"><li><a href="#" id="statusonline" status="none">online</a>
		<ul>
			<li><a href="#" id="statusaway" status="pause">away</a></li>
			<li><a href="#" id="statuslunch" status="lunch">lunch</a></li>
			<li><a href="#" id="statusoffline" status="offline">offline</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-offline" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="offline">
		<ul class="status_action"><li><a href="#" id="statusoffline" status="none">offline</a>
		<ul>
			<li><a href="#" id="statuslunch" status="lunch">lunch</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-lunch" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="lunch">
		<ul class="status_action"><li><a href="#" id="statuslunch" status="none">lunch</a>
		<ul>
			<li><a href="#" id="statusoffline" status="offline">offline</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-busy" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="busy">
		<ul class="status_action"><li><a href="#" id="statusbusy" status="none">busy</a></li>
		</ul>
		</div>
	</div>
	
	<div id="changeStatus-away" class="changeStatus" style="display: none;">
		<div id="statusMenu" status="away">
		<ul class="status_action"><li><a href="#" id="statusaway" status="none">pause</a>
		<ul>
			<li><a href="#" id="statusonline" status="unpause">online</a></li>
			<li><a href="#" id="statuslunch" status="lunch">lunch</a></li>
			<li><a href="#" id="statusoffline" status="offline">offline</a></li>
		</ul>
		</li>
		</ul>
		</div>
	</div>

</div>
