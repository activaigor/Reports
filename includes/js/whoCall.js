var myIP;
var ws = new WebSocket("ws://pbx-expand.la.net.ua:8125/ws");
var sipStack;

function getip(json){
	myIP = json.ip;
}

$(document).ready(function(){

ws.onmessage = function(evt){
    data = eval("(" + evt.data + ")");
    msg_from = data['From'];
    msg_type = data['Type'];
    msg_name = data['Name'];
    evt_data = data['Data'];
    if (evt_data) {
    	msg_agent = evt_data['To'];
    }
    if (msg_from == "server" && msg_type == "service" && msg_name == "whoCall" && evt_data) {
    	if (msg_agent == agent_name) {
		if (evt_data['Action'] == "Connect") {
			client_data = evt_data['ClientData'];
			fillCallData(client_data);
			$("#newCall").animate({
				marginLeft: "10px"
			} , 250);
			client_id = client_data["BillingID"];
			client_login = client_data["Login"];
			if (client_login != "Anonymous") {
				//win = window.open("https://my.lanet.ua/clients.php?cls_login_filter=%3D" + client_login + "&cls_id=" + client_id, '_blank');
				//win.focus();
				setTimeout(function() {
					var popup  = window.open("about:blank", "_blank");
					popup.location = "https://my.lanet.ua/clients.php?cls_login_filter=%3D" + client_login + "&cls_id=" + client_id;
				}, 2000)
			}
		} else if (evt_data['Action'] == "Complete") {
			$("#newCall").animate({
				marginLeft: "-500px"
			} , 150);
		}
		setInterval(function() { updateData(city,detail,queue,agent_name)},1000);
	}
    }
};
    
$("#ws").click(function(){
    ws.send("HELLO");   
});

setTimeout(function() { agent_hello(agent_name); } , 1500);
setInterval( function() { agent_hello(agent_name) } , 10000);

});

function fillCallData(cd){
	$("#newCall").find("#fio").html(cd['Initials']);
	$("#newCall").find("#numb").html(cd['Number']);
	$("#newCall").find("#city").html(cd['City']);
	$("#newCall").find("#lang").html(cd['Language']);
	toastr.info(cd['CallReason']);
}

function agent_hello(name) {
	msg = {};
	msg["From"] = "client";
	msg["Type"] = "service";
	msg["Name"] = "reports";
	msg["Data"] = {};
	msg["Data"]["Action"] = "Hello";
	msg["Data"]["AgentName"] = name;
	msg["Data"]["AgentIP"] = myIP;
	msg = JSON.stringify(msg);
	ws.send(msg);
}

function agent_changeStatus(name,newstatus) {
	if (newstatus != "none") {
		msg = {};
		msg["From"] = "client";
		msg["Type"] = "service";
		msg["Name"] = "reports";
		msg["Data"] = {};
		msg["Data"]["Action"] = "Status";
		msg["Data"]["AgentName"] = name;
		msg["Data"]["Status"] = newstatus;
		msg = JSON.stringify(msg);
		ws.send(msg);
	}
}
