<div id="loginBox" style="display: none;">
	<table id="titleWindow">
		<tr>
			<td width="90%">login box</td>
			<td width="10%"><a id="close" href="javascript: toggleWindow('loginBox'); void(0);">x</a></td>
		</tr>
	</table>
	<form name="logging" method="post" action="/kiev">
		<input type="hidden" name="logging" value="1">
		<table id="loginTable">
			<tr><td>Логин:</td><td><input type="text" name="name" value=""></td></tr>
			<tr><td>Пароль:</td><td><input type="password" name="password" value=""></td></tr>
			<tr><td colspan="2"><input type="submit" value="Войти"></td></tr>
		</table>
	</form>
</div>
