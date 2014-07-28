var callers_list = new Array();
var sqlcallers_list = new Array();

$(document).ready(function(){
	getData(city, detail, queue, agent_name);
	getCallers(city, queue);
	setInterval( function() { updateData(city, detail, queue, agent_name) } , 3000);
	setInterval( function() { updateDataCallers(city, queue) } , 1500)
});

function getData(city,detail,queue,my_agent) {
	if (typeof detail == 'undefined') detail = "";

	send = $.post(javascriptHandler, {ajax: 1, get: 1, detail: detail, city: city, queue: queue, my_agent: my_agent})
	//send.error( function(data) {alert("ERROR")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		i=0;
			
		// FILL THE COLUMNS OF OFFLINE STATS
		$("#offlineStats").find("#offline").html(data["totalOffline"]);
		$("#offlineStats").find("#online").html(data["totalOnline"]);
		for (var key in data["agents"]) {
			i++;
			if (agent_name == data["agents"][key]["name"]) {
				row = makeRow(city, data["agents"][key] , i , "myRow");
				$('#whoCallBar').append(row);
				$(".toggleStatus").click(function(){
					$("#subStatus").slideToggle("fast");
				});

				$(".status_action").find("a").click(function(){
				    	newstatus = $(this).attr("status");
					agent_changeStatus(agent_name,newstatus);
					setTimeout( function() { updateData(city, detail, queue, my_agent) } , 1000);
				});
		
				$("#whoCall").css("display","block");

			} else {
				row = makeRow(city, data["agents"][key] , i , "");
				$('#agentsStat').append(row);
				// ORDER CAN BE CHANGED SO WE MUST TO LOOK FOR A ADV-DIV AND ONCLICK ACTION
				$("." + data["agents"][key]["id"]).click([i] , function(e) {
					toggleWindow("agentDIV" + e.data[0]);
					//$("#main_menu").height($(document).height());
				});
			}
			
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
		
		$("#callersStatDiv").height($("#agentsStatDiv").height() + 20);
		//$("#main_menu").height($(document).height());

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

function makeRow(city,agent,order,subClass) {
		if (agent["drops"] > 0) drops = "<td width=\"50\" class=\"missedCalls\">" + agent["drops"] + "</td>";
		else drops = "<td width=\"50\"></td>";

		if (agent["shift_attr"] == "default") shift_attr = "<td width=\"50\"><img src=\"http://cdn1.iconfinder.com/data/icons/iconbeast-lite/30/question.png\"></td>";
		else shift_attr = "<td width=\"50\"></td>";
			
		if (agent["status"] != "online" && agent["status"] != "busy") offlineNum = "<td width=\"50\" id=\"offlineTD\"><p id=\"offlineNum\">" + agent["offlineNum"] + "</p></td>";
		else offlineNum = "<td width=\"50\" id=\"offlineTD\"><p id=\"offlineNum\"></p></td>";

		if (subClass == "myRow") {
			statusChange = $("#changeStatus-" + agent["status"]).html();
			statusBar = "<td width=\"20px\" id=\"statuses\">" + statusChange + "</td>";
			$("#whoCall_begin").html("Начало: " + agent["login"].split(" ")[1]);
			$("#whoCall_duration").html("Разговор: " + agent["call"]);
			$("#whoCall_end").html("Конец: " + agent["logout"].split(" ")[1]);
			$("#whoCall_ip").html("IP-адрес: " + agent["ip"]);
			$("#whoCall_online").html("Онлайн: " + agent["online"]);
			$("#whoCall_offline").html("Офлайн: " + agent["offline"]);
			$("#whoCall_pause").html("Пауза: " + agent["pause"]);
			$("#whoCall_shift").html("Смена: " + agent["duration"] + "-часовая");
		} else {
			statusBar = "<td width=\"20px\" id=\"statuses\"><p id=\"status" + agent["status"] + "\">" + agent["status"] + "</p></td>";
		}

		newRow =  
			"<tr OnMouseOver=\"this.style.cursor='pointer';\" OnMouseOut=\"this.style.cursor='default';\" id=\"hoverAgents"+i+"\" class=\"" + agent["id"] + " " + subClass + "\">" +
				"<td width=\"50px\" oncontextmenu='return popupMenu(event," + agent["id"] + ",\"" + city + "\");'><p id=\"agentButton\">" + agent["last_name"] + "<br>" + agent["name"] + "</p></td>" +
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
				statusBar + 
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

function updateData(city,detail,queue,my_agent) {
	if (typeof detail == 'undefined') detail = "";
	
	dynamicData = Array("online" , "pause" , "offline");
	send = $.post(javascriptHandler, {ajax: 1, get: 1, detail: detail, city: city, queue: queue, my_agent: my_agent});
	//send.error( function(data) {alert("ERROR")} );
	send.success( function(data) {
		data = eval("(" + data + ")");
		i = 0;
		
		// FILL THE COLUMNS OF OFFLINE STATS
		$("#offlineStats").find("#offline").html(data["totalOffline"]);
		$("#offlineStats").find("#online").html(data["totalOnline"]);
		
		for (var key in data["agents"]) {
			agent = data["agents"][key]
			i++;
			// If data is not new - we must upgrade the existed values
			if ($("." + agent["id"]).size()){
				
				// UPDATE DROPS
				if (agent["drops"] > 0) $("." + agent["id"]).find("#missedCalls").html(agent["drops"]);
				
				// UPDATE SHIFT DURATION
				$("." + agent["id"]).find("#shiftP").html(agent["duration"] + "h");
				
				// UPDATE BARs-DATA
				for (var index in dynamicData) {
					$("." + agent["id"]).find("#intProgress_" + dynamicData[index]).css("width" , agent[dynamicData[index] + "_perc"] + "%");
					$("." + agent["id"]).find("#intProgress_" + dynamicData[index]).find("p").html(agent[dynamicData[index]]);
				}
				
				// UPDATE STATUS AND NAME (ORDER CAN BE CHANGED)
				if (agent_name != agent["name"]) {
					$("." + agent["id"]).find("#statuses").find("p").attr("id" , "status" + agent["status"]);
					$("." + agent["id"]).find("#statuses").find("p").html(agent["status"]);
					$("." + agent["id"]).find("#agentButton").html(agent["last_name"] + "<br>" + agent["name"]);
				} else {
					$("#whoCall_begin").html("Начало: " + agent["login"].split(" ")[1]);
					$("#whoCall_duration").html("Разговор: " + agent["call"]);
					$("#whoCall_end").html("Конец: " + agent["logout"].split(" ")[1]);
					$("#whoCall_ip").html("IP-адрес: " + agent["ip"]);
					$("#whoCall_online").html("Онлайн: " + agent["online"]);
					$("#whoCall_offline").html("Офлайн: " + agent["offline"]);
					$("#whoCall_pause").html("Пауза: " + agent["pause"]);
					$("#whoCall_shift").html("Смена: " + agent["duration"] + "-часовая");
					if ($("#whoCall").css("display") == "none") {
						row = makeRow(city, data["agents"][key] , i , "myRow");
						$('#whoCallBar').append(row);
						$("#whoCall").css("display","block");
						statusChange = $("#changeStatus-" + agent["status"]).html();
						$("." + agent["id"]).find("#statuses").html(statusChange);
						$(".status_action").find("a").click(function(){
					    		newstatus = $(this).attr("status");
							agent_changeStatus(agent_name,newstatus);
							setTimeout( function() { updateData(city, detail, queue, my_agent) } , 1000);
						});
					}
					oldstatus = $("." + agent["id"]).find("#statuses").find("#statusMenu").attr("status");
					if (agent["status"] != oldstatus) {
						statusChange = $("#changeStatus-" + agent["status"]).html();
						$("." + agent["id"]).find("#statuses").html(statusChange);
						$(".status_action").find("a").click(function(){
					    		newstatus = $(this).attr("status");
							agent_changeStatus(agent_name,newstatus);
							setTimeout( function() { updateData(city, detail, queue, my_agent) } , 1000);
						});
					}
				}
				
				// UPDATE OFFLINE ORDER
				(agent["status"] != "online" && agent["status"] != "busy") 
					? $("." + agent["id"]).find("#offlineNum").html(agent["offlineNum"]) 
					: $("." + agent["id"]).find("#offlineNum").html("");
				
				// UPDATE ADVANCED BLOCK
				$(".adv-" + agent["id"]).find("#begin").html("Начало смены: " + agent["login"]);
				$(".adv-" + agent["id"]).find("#call").html("Время разговора: " + agent["call"]);
				$(".adv-" + agent["id"]).find("#leave").html("Время ухода: " + agent["logout"]);
				$(".adv-" + agent["id"]).find("#comment").html("Комментарий: " + agent["note"]);
				$(".adv-" + agent["id"]).find("#ip").html("IP: " + agent["ip"]);
				
				// ORDER CAN BE CHANGED SO WE MUST TO LOOK FOR A ADV-DIV AND ONCLICK ACTION
				if (agent_name != agent["name"]) {
					$(".adv-" + agent["id"]).find(".agentDIV").attr("id", "agentDIV" + i);
					$("." + agent["id"]).unbind("click").click([i] , function(e) {
						toggleWindow("agentDIV" + e.data[0]);
						//$("#main_menu").height($(document).height());
					});
				}
				
			// If data is new - we must add new values to the top of the table
			} else {
				row = makeRow(city,agent,i);
				$('#agentsStat').prepend(row);
				
				// ORDER CAN BE CHANGED SO WE MUST TO LOOK FOR A ADV-DIV AND ONCLICK ACTION
				$("." + agent["id"]).unbind("click").click([i] , function(e) {
					toggleWindow("agentDIV" + e.data[0]);
					//$("#main_menu").height($(document).height());
				});
			}
			
			if (detail != "") {
				$("#logTable").find("#logDIV").html(data["logText"]);
			}
		}
	});

	$("#callersStatDiv").height($("#agentsStatDiv").height() + 20);
	//$("#main_menu").height($(document).height() - 2);
}

