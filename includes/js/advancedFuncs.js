myMenu = null;
var values=new Array("historyId","offlineTime","pauseTime","onlineTime","callTime","lateTime","loginTime","leaveTime","note");
var lateSRC="includes/agentsLate.php";
var distSRC="includes/agentsDist.php";
var agentSelected;

function doClear(theText) { 
	if (theText.value == theText.defaultValue) { theText.value = "" } 
}

function doDefault(theText) { 
	if (theText.value == "") { theText.value = theText.defaultValue } 
}

function confirmDelete(id) {
    if(confirm('Действительно хотите удалить?')) {
        top.document.location='index.php?remove='+id;
    }
}

function toggle(item) {
	$("#" + item).toggle();
}

function toggleWindow(item) {
	item=document.getElementById(item);
	if(item.style.display=="") {
		item.style.display="none";
	} else {
		item.style.display="";
	}
	return false;
};

function popupMenu(e,id){
  if(document.all) e=window.event;
  e.cancelBubble=true;
  hideMyMenu();
  myMenu = document.getElementById('popupWindow');
  myMenu.style.left = e.pageX+'px';
  myMenu.style.top  = e.pageY-35+$("#realtimeBlock").scrollTop()+'px';
  myMenu.style.display = 'block';
  
  //$("#removeHistory").prop("href" , "javascript: deleteFromList(" + id + "); void(0);");
  $("#removeHistory").unbind("click").click(function(){deleteFromList(id); $("#popupWindow").toggle();});
  $("#spyAgent").unbind("click").click(function(){prepareSpy(); $("#popupWindow").toggle();});
  $("#agentNote").unbind("click").click(function(){$('#commentDiv').toggle(); $("#popupWindow").toggle();});
  //$("#detailAgent").prop("href" , "?logged=1&detail=" + id);
  $("#detailAgent").prop("href" , "/agent" + id);
  
  agentSelected = id;

  return false;
}

function show_logs(){
	$("#loggingDiv").toggle();
}

function popupMenuHist(e,id){
  if(document.all) e=window.event;
  e.cancelBubble=true;
  hideMyMenu();
  if(!document.all){
    myMenu = document.getElementById('popupWindow');
    myMenu.style.left = e.pageX+'px';
    myMenu.style.top  = e.pageY+'px';
    myMenu.style.display = 'block';
  }
  else {
    myMenu = document.getElementById('popupWindow');
    myMenu.style.left = (e.clientX+document.body.scrollLeft)+'px';
    myMenu.style.top  = (e.clientY+document.body.scrollTop )+'px';
    myMenu.style.display = 'block';
  }
  $("#goRecords").unbind("click").click(function(){showRecords(id); $("#popupWindow").toggle();});
  $("#showDisturbs").unbind("click").click(function(){showDisturbs(id); $("#popupWindow").toggle();});
  
  return false;
}

function showDisturbs(id) {
	$("#offenceDiv").toggle();
	send = $.post(javascriptHandler, {ajax: 1, showOffence: 1, id: id});
    	send.error( function(data) {alert("ERROR")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		$("#tableOffence").html("<thead><td><td>start</td><td></td><td>end</td><td>dur</td>");
		for (var key in data) {
			if (data[key]["type"] == "time") {
				image = "pictures/clock.png";
			} else {
				image = "pictures/list.png";
			}
			newRow = 
			"<tr>" + 
				"<td width=\"30px\"><img height=\"25\" src=\""+image+"\"></td>" +
				"<td width=\"40px\">" + data[key]["start"] + "</td>" +
				"<td width=\"5px\"> - </td>" +
				"<td style=\"font-size: 10px; color: grey; border-right: 1px dotted grey\" width=\"55px\">" + data[key]["end"] + "</td>" +
				"<td width=\"50px\" align=\"right\">" + data[key]["duration"] + "</td>" +
			"</tr>";
			$("#tableOffence").append(newRow);
		}
	});
}

function showRecords(id) {
	$("#recDiv").toggle();
	send = $.post(javascriptHandler, {ajax: 1, showRec: 1, id: id});
    	send.error( function(data) {alert("ERROR")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		$("#recordsList").html("");
		for (var key in data) {
			caller = (data[key]["caller"] == "") ? "скрыт" : data[key]["caller"];
			startTime = data[key]["start"].split(" ")[1];
			endTime = data[key]["end"].split(" ")[1];
			newRow = 
			"<tr>" + 
				"<td width=\"60px\">" + startTime + "</td>" +
				"<td width=\"5px\"> - </td>" +
				"<td id=\"end\" width=\"60px\">" + endTime + "</td>" + 
				"<td id=\"order\">( " + caller + " )</td>" +
				"<td id=\"order\"><a href=\"/includes/records/monitor/" + data[key]["record"] + "\">123</a></td>" +
				"<td width=\"50px\" id=\"play\"><a href=\"javascript: playRecord('"+data[key]["record"]+"')\">play</a></td>" +
			"</tr>";
			$("#recordsList").append(newRow);
		}
	});
}

function playRecord(src) {
	$("#recordSource").attr("src","/includes/records/monitor/" + src);
	setTimeout(function(){
		$("#recordSource").trigger("play")
	} , 1000);
}

function prepareSpy() {
	if (SIP_PHONE == 0) {
		$("#spyDiv").toggle();
	} else if (!isNaN(SIP_PHONE)) {
		startSpy();
	}
}

function startSpy() {
	if (SIP_PHONE == 0) {
		call = $("#numSpy").val();
		$("#spyDiv").toggle();
	} else {
		call = SIP_PHONE;
	}
	if (!isNaN(call)) {
	    send = $.post(javascriptHandler, {ajax: 1, spy: 1, victim: agentSelected, num: call});
        send.error( function(data) {alert("ERROR")} );
	} else {
		alert("Укажите номер, на который будет осуществлен звонок");
	}
}

function saveComment() {
	comment = $("#commentInput").val();
	if (comment != "") {
		$("#commentDiv").toggle();
	    send = $.post(javascriptHandler, {ajax: 1, comment: comment, agent: agentSelected});
        send.error( function(data) {alert("ERROR")} );
		alert("Комментарий сохранен");
	} else {
		alert("Введите комментарий для агента");
	}
}

function deleteFromList(id) {
	var send;
    if(confirm('Действительно хотите удалить?')) {
	    send = $.post(javascriptHandler, {ajax: 1, remove: 1, online: 1, id: id});
        send.error( function(data) {alert("ERROR")} );
	    send.success( function(data) {
			alert("Успешно выполнено!");
			window.location.href = "index.php";
	    });
    }
    
}

function historySum(idDragged, idDropped) {
	var send;
    if(confirm('Действительно хотите объединить?')) {
	    send = $.post(javascriptHandler, {ajax: 1, group: 1, id1: idDragged, id2: idDropped});
        send.error( function(data) {alert("ERROR")} );
	    send.success( function(data) {
			alert("Успешно выполнено!");
			window.location.href = window.location;
	    });
    }
    
}

function hideMyMenu(){
  if(myMenu){
    myMenu.style.display = 'none';
    myMenu = null;
  }
}
   
function timeGo(stat) {
    if (stat=="start") {
       timer=setTimeout('document.getElementById("popupWindow").style.display="none";', 500);
    }
    if (stat=="stop") {
        clearTimeout(timer);
    }
}

function showData(data) {
	for (index in values) {
		$("#" + values[index]).val(data[index]);
	}
	$("#historyDesc").css("display" , "block");
	$("#historyDelBut").prop("href" , "javascript: removeData();");
	$("#nameTitle").html(data[9]);
}

function showLateData(data) {
	for (index in values) {
		$("#" + values[index]).val(data[index]);
	}
	$("#historyDesc").css("display" , "block");
	$("#historyDelBut").prop("href" , "javascript: removeLateData();");
	$("#nameTitle").html(data[9]);
}

function removeLateData() {
	id = $("#historyId").val();	
	var send;
	send = $.post(javascriptHandler, {ajax: 1, remove: 1, late: 1, id: id});
    send.error( function(data) {alert("error")} );
	send.success( function(data) {
		alert("Успешно выполнено");
		window.location.href = window.location;
	});
}

function removeData() {
    if(confirm('Действительно хотите удалить?')) {
		id = $("#historyId").val();	
		var send;
		send = $.post(javascriptHandler, {ajax: 1, remove: 1, history: 1, id: id});
    	send.error( function(data) {alert("error")} );
		send.success( function(data) {
			alert("Успешно выполнено");
			window.location.href = window.location;
		});
	}
}

function closeData() {
	$("#historyDesc").css("display" , "none");
}

function editData() {
	for (index in values) {
		$("#" + values[index]).prop("disabled" , false);
	}
	$("#historyRedBut").toggle();
	$("#historySaveBut").toggle();
}

function saveData() {
	newData = Array();
	for (index in values) {
		newData[values[index]] = $("#" + values[index]).val();
		$("#" + values[index]).prop("disabled" , true);
	}
	var send;
	send = $.post(javascriptHandler, {ajax: 1, save: 1, id: newData["historyId"], online: newData["onlineTime"], offline: newData["offlineTime"], pause: newData["pauseTime"], call: newData["callTime"], late: newData["lateTime"], login: newData["loginTime"], leave: newData["leaveTime"], note: newData["note"]});
    send.error( function(data) {alert("error")} );
	send.success( function(data) {
		alert("Успешно выполнено");
		window.location.href = window.location;
	});
}

function toggleLate(city,queue) {
	if ($("#lateDiv").css("display") == "block") {
		$("#lateFrame").prop("src" , lateSRC + "?show=0");
		$("#lateDiv").css("display" , "none");
	} else {
		$("#lateFrame").prop("src" , lateSRC + "?show=1&city=" + city + "&queue=" + queue);
		$("#lateDiv").css("display" , "block");
	}
}

function toggleDist(city,queue) {
	if ($("#distDiv").css("display") == "block") {
		$("#distFrame").prop("src" , distSRC + "?show=0");
		$("#distDiv").css("display" , "none");
	} else {
		$("#distFrame").prop("src" , distSRC + "?show=1&city=" + city + "&queue=" + queue);
		$("#distDiv").css("display" , "block");
	}
}
