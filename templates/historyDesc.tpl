<div id="historyDesc" style="display: none;" class="myDialog">
	<table id="titleWindow">
		<tr>
			<td width="80%">Окно истории</td>
			<td width="20%" id="nameTitle"></td>
		</tr>
	</table>
	<table id="infoTable">
		<tr>
			<td>Время разговора:</td>
			<td><input id="callTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время онлайна:</td>
			<td><input id="onlineTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время паузы:</td>
			<td><input id="pauseTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время оффлайна:</td>
			<td><input id="offlineTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Время опоздания:</td>
			<td><input id="lateTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Начало смены:</td>
			<td><input id="loginTime" title="" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td>Конец смены:</td>
			<td><input id="leaveTime" type="text" disabled="true" value="пусто"></td>
		</tr>
		<tr>
			<td width="170px">Примечание:</td>
			<td><input id="note" type="text" disabled="true" value="пусто"></td>
			<input type="hidden" value="пусто" id="historyId">
		</tr>
	</table>
	<p id="adminLine">
		<a id="historyRedBut" href="javascript: editData();">Редактировать</a>
		<a id="historySaveBut" style="display: none;" href="javascript: saveData();">Сохранить</a>
		<a id="historyDelBut" href="">Удалить</a>
	</p>
    <a id="closeButt" href="javascript: closeData();">Закрыть</a>
</div>
