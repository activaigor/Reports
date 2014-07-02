var callers_list = new Array();
var sqlcallers_list = new Array();

function getData(city,detail,logged,queue) {
	if (typeof detail == 'undefined') detail = "";

	send = $.post(javascriptHandler, {ajax: 1, get: 1, detail: detail, city: city, queue: queue});
	//send.error( function(data) {alert("ERROR")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		i=0;
		
		// FILL THE COLUMNS OF OFFLINE STATS
		$("#offlineStats").find("#offline").html(data["totalOffline"]);
		$("#offlineStats").find("#online").html(data["totalOnline"]);
		
		for (var key in data["agents"]) {
			i++;
			row = makeRow(data["agents"][key] , i , logged);
			$('#agentsStat').append(row);
			
			// ORDER CAN BE CHANGED SO WE MUST TO LOOK FOR A ADV-DIV AND ONCLICK ACTION
			$("." + data["agents"][key]["id"]).click([i] , function(e) {
				toggleWindow("agentDIV" + e.data[0]);
			});
		}
    	
		if (detail != "") {
			logText = 
				"<tr height=\"80%\"><td colspan=\"5\"><table id=\"logTable\">" +
					"<tr><td colspan=\"2\"><h3>ЖУРНАЛ СОБЫТИЙ</h3></td></tr>" +
					"<tr><td colspan=\"2\" width=\"800px\">" +
						"<div style=\"height: 600px; overflow: auto;\" id=\"logDIV\">" + data["logText"] + "</div>" +
					"</td></tr>" +
				"</table></td></tr>";
			$('#agentsStat').append(logText);
		}
	});
}

function getCallers(city,queue) {
	send = $.post(javascriptHandler, {ajax: 1, get_callers: 1, city: city, queue: queue});
	//send.error( function(data) {alert("ERROR1")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		i=0;
		for (var key in data) {
			i++;
			callers_list.push(data[key]["unique_id"]);
			row = makeRowCaller(data[key] , i , "default");
			$('#callersStat').append(row);
		}
	});
}

function updateDataCallers(city,queue) {
	send = $.post(javascriptHandler, {ajax: 1, get_callers: 1, city: city, queue: queue});
	//send.error( function(data) {alert("ERROR1")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		i=0;
		// Make the array empty
		sqlcallers_list.length = 0;
		for (var key in data) {
			sqlcallers_list[i] = data[key]["unique_id"];
			i++;

			if ($.inArray(data[key]["unique_id"], callers_list) == -1) {
				callers_list.push(data[key]["unique_id"]);
				row = makeRowCaller(data[key] , i , "new");
				$('#callersStat').append(row);
			} else {
				if ($("#" + data[key]["unique_id"].replace(".","-")).attr("class") == "new") {
					$("#" + data[key]["unique_id"].replace(".","-")).removeClass().addClass("default");
				}
			}
		}
		for (var key in callers_list) {
			if ($.inArray(callers_list[key], sqlcallers_list) == -1) {
				//old
				if ($("#" + callers_list[key].replace(".","-")).attr("class") != "old") {
					$("#" + callers_list[key].replace(".","-")).removeClass().addClass("old");
				} else {
					$("#" + callers_list[key].replace(".","-")).remove();
				}
			}
		}
		//$("#callersStat").find("tbody").children().each(function(){
		//	alert($(this).attr("id"));
		//});
		//alert(callers_list);
	});
}

function makeRowCaller(caller,order,flag) {
	newRow = 
		"<tr class=\"" + flag + "\" id=\"" + caller["unique_id"].replace(".","-") + "\">" +
			"<td><span class=\"" + flag + "\">" + caller["caller"] + "</span></td>" +
		"</tr>";
	return newRow;
}

function makeRow(agent,order,logged) {
		if (agent["drops"] > 0 && logged==1) drops = "<td width=\"50\" class=\"missedCalls\">" + agent["drops"] + "</td>";
		else drops = "<td width=\"50\"></td>";

		if (agent["shift_attr"] == "default") shift_attr = "<td width=\"50\"><img src=\"http://cdn1.iconfinder.com/data/icons/iconbeast-lite/30/question.png\"></td>";
		else shift_attr = "<td width=\"50\"></td>";
			
		if (agent["status"] != "online" && agent["status"] != "busy") offlineNum = "<td width=\"50\" id=\"offlineTD\"><p id=\"offlineNum\">" + agent["offlineNum"] + "</p></td>";
		else offlineNum = "<td width=\"50\" id=\"offlineTD\"></td>";
		
		newRow =  
			"<tr OnMouseOver=\"this.style.cursor='pointer';\" OnMouseOut=\"this.style.cursor='default';\" id=\"hoverAgents"+i+"\" class=\"" + agent["id"] + "\">" +
				"<td width=\"50px\" oncontextmenu='return popupMenu(event," + agent["id"] + ");'><p id=\"agentButton\">" + agent["last_name"] + "<br>" + agent["name"] + "</p></td>" +
				drops +
				shift_attr +
				"<td style=\"width: 90%;\">" +
					"<div id=\"extProgress\">" +
						"<div id=\"intProgress_online\" style=\"width: " + agent["online_perc"] + "%;\"><p>" + agent["online"] + "</p></div>" +
						"<div id=\"intProgress_pause\" style=\"width: " + agent["pause_perc"] + "%;\"><p>" + agent["pause"] + "</p></div>" +
						"<div id=\"intProgress_offline\" style=\"width: " + agent["offline_perc"] + "%;\"><p>" + agent["offline"] + "</p></div>" +
					"</div>" +
				"</td>" +
				"<td><p id=\"shiftP\">" + agent["duration"] + "h</p></td>" + 
				"<td width=\"20px\" id=\"statuses\"><p id=\"status" + agent["status"] + "\">" + agent["status"] + "</p></td>" +
				offlineNum +
			"</tr>" + 
			"<tr class=\"adv-" + agent["id"] + "\">" +
				"<td id=\"agentDIV" + order + "\" class=\"agentDIV\" style=\"display: none;\" colspan=\"5\">" +
					"<p id=\"begin\">Начало смены: " + agent["login"] + "</p>" +
					"<p id=\"call\">Время разговора: " + agent["call"] + "</p>" +
					"<p id=\"leave\">Время ухода: " + agent["logout"] + "</p>" +
					"<p id=\"comment\">Комментарий: " + agent["note"] + "</p>" +
					"<p id=\"ip\">IP: " + agent["ip"] + "</p>" +
				"</td>" +
			"</tr>";
		return newRow;
}

function updateData(city,detail,logged,queue) {
	if (typeof detail == 'undefined') detail = "";
	
	dynamicData = Array("online" , "pause" , "offline");
	send = $.post(javascriptHandler, {ajax: 1, get: 1, detail: detail, city: city, queue: queue});
	//send.error( function(data) {alert("ERROR")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		i = 0;
		
		// FILL THE COLUMNS OF OFFLINE STATS
		$("#offlineStats").find("#offline").html(data["totalOffline"]);
		$("#offlineStats").find("#online").html(data["totalOnline"]);
		
		for (var key in data["agents"]) {
			i++;
			// If data is not new - we must upgrade the existed values
			if ($("." + data["agents"][key]["id"]).size()){
				
				// UPDATE DROPS
				if (data["agents"][key]["drops"] > 0 && logged==1) $("." + data["agents"][key]["id"]).find("#missedCalls").html(data["agents"][key]["drops"]);
				
				// UPDATE SHIFT DURATION
				$("." + data["agents"][key]["id"]).find("#shiftP").html(data["agents"][key]["duration"] + "h");
				
				// UPDATE BARs-DATA
				for (var index in dynamicData) {
					$("." + data["agents"][key]["id"]).find("#intProgress_" + dynamicData[index]).css("width" , data["agents"][key][dynamicData[index] + "_perc"] + "%");
					$("." + data["agents"][key]["id"]).find("#intProgress_" + dynamicData[index]).find("p").html(data["agents"][key][dynamicData[index]]);
				}
				
				// UPDATE STATUS AND NAME (ORDER CAN BE CHANGED)
				$("." + data["agents"][key]["id"]).find("#statuses").find("p").attr("id" , "status" + data["agents"][key]["status"]);
				$("." + data["agents"][key]["id"]).find("#statuses").find("p").html(data["agents"][key]["status"]);
				$("." + data["agents"][key]["id"]).find("#agentButton").html(data["agents"][key]["last_name"] + "<br>" + data["agents"][key]["name"]);
				
				// UPDATE OFFLINE ORDER
				(data["agents"][key]["status"] != "online" && data["agents"][key]["status"] != "busy") 
					? $("." + data["agents"][key]["id"]).find("#offlineTD").html("<p id=\"offlineNum\">" + data["agents"][key]["offlineNum"] + "</p>") 
					: $("." + data["agents"][key]["id"]).find("#offlineTD").html("");
				
				// UPDATE ADVANCED BLOCK
				$(".adv-" + data["agents"][key]["id"]).find("#begin").html("Начало смены: " + data["agents"][key]["login"]);
				$(".adv-" + data["agents"][key]["id"]).find("#call").html("Время разговора: " + data["agents"][key]["call"]);
				$(".adv-" + data["agents"][key]["id"]).find("#leave").html("Время ухода: " + data["agents"][key]["logout"]);
				$(".adv-" + data["agents"][key]["id"]).find("#comment").html("Комментарий: " + data["agents"][key]["note"]);
				$(".adv-" + data["agents"][key]["id"]).find("#ip").html("IP: " + data["agents"][key]["ip"]);
				
				// ORDER CAN BE CHANGED SO WE MUST TO LOOK FOR A ADV-DIV AND ONCLICK ACTION
				$(".adv-" + data["agents"][key]["id"]).find(".agentDIV").attr("id", "agentDIV" + i);
				$("." + data["agents"][key]["id"]).unbind("click").click([i] , function(e) {
					toggleWindow("agentDIV" + e.data[0]);
				});
				
			// If data is new - we must add new values to the top of the table
			} else {
				row = makeRow(data["agents"][key] , i);
				$('#agentsStat').prepend(row);
				
				// ORDER CAN BE CHANGED SO WE MUST TO LOOK FOR A ADV-DIV AND ONCLICK ACTION
				$("." + data["agents"][key]["id"]).unbind("click").click([i] , function(e) {
					toggleWindow("agentDIV" + e.data[0]);
				});
			}
			
			if (detail != "") {
				$("#logTable").find("#logDIV").html(data["logText"]);
			}
		}
	});
}
