
function modal() {
	$('.modal').appendTo($("body"));
}

function closeRegister() {	
	$("#myModal").modal("hide");	
}


var cycle_reg;
var run_reg;
var roller_reg;
var level_reg;
function submitRegister() {
	var name = document.getElementById("name_reg").value;	
	var mail = document.getElementById("mail_reg").value;	
	var pwd	 = document.getElementById("pwd_reg").value;
	var sports = Array();
	sports[0] = (cycle_reg == 1) ? 1 : 0;
	sports[1] = (roller_reg == 1)? 1 : 0;
	sports[2] = (run_reg == 1)	 ? 1 : 0;
	
	console.log(sports[0]);
}

function beginer() {
	level_reg = 0;
}

function amateur() {
	level_reg = 1;
}

function expert() {
	level_reg = 2;
}

function cycl() {
	cycle_reg = 1;
}

function roller() {
	roller_reg= 1;
}

function running() {
	run_reg = 1;
}