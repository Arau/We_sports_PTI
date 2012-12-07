function showMapModal(id,route) {	
	document.getElementById(id).className = "";
	document.getElementById(id).className = "modal";
	initialize_routeModal(route,id);
}



function modal() {
	$('.modal').appendTo($("body"));
}

function closeRegister() {	
	$("#myModal").modal("hide");	
}

function logout() {
	window.location ="../functions/logout.php";			
	
}

function submitRegister() {
	var name = document.getElementById("name_reg").value;	
	var mail = document.getElementById("mail_reg").value;	
	var pwd	 = document.getElementById("pwd_reg").value;
	var sport = new Array();
	sport['cycling'] = new Array();	
	sport['roller'] = new Array();
	sport['run'] = new Array();	
	defineSportsAndLevels(sport);
	//validateRegister();	
	ajaxSubmit(name,mail,pwd,sport);
	$("#myModal").modal("hide");
	showValidateLogin();
}

function defineSportsAndLevels(sports) {	
	sport = initArraysToZero(sports);
	if ($('#cycle-button').hasClass("active")) {
		atLeastOneCyc(false);
		if ($('#beginer_cyc_button').hasClass("active")) 		sport['cycling']['beginer'] = 1;
		else if ($('#amateur_cyc_button').hasClass("active")) 	sport['cycling']['amateur'] = 1;
		else if ($('#expert_cyc_button').hasClass("active")) 	sport['cycling']['expert'] = 1; 
		else atLeastOneCyc(true);
	}	

	if ($('#roller-button').hasClass("active")) {
		atLeastOneRoll(false);
		if ($('#beginer_roller_button').hasClass("active")) 		sport['roller']['beginer'] = 1;		
		else if ($('#amateur_roller_button').hasClass("active")) 	sport['roller']['amateur'] = 1;		
		else if ($('#expert_roller_button').hasClass("active")) 	sport['roller']['expert'] = 1;		
		else atLeastOneRoll(true);
	}	
	
	if ($('#running-button').hasClass("active")) {
		atLeastOneRun(false);
		if ($('#beginer_run_button').hasClass("active")) 		sport['run']['beginer'] = 1;			
		else if ($('#amateur_run_button').hasClass("active")) 	sport['run']['amateur'] = 1;		
		else if ($('#expert_run_button').hasClass("active")) 	sport['run']['expert'] = 1;
		else atLeastOneRun(true);
	}	
}

function cycl() {
	if ($('#cycle-button').hasClass("active")) {
		document.getElementById("cycling-levels").style.display = "none";
		$('#beginer_cyc_button').removeClass("active");
		$('#amateur_cyc_button').removeClass("active");
		$('#expert_cyc_button').removeClass("active");
	}
	else document.getElementById("cycling-levels").style.display = "block"; 	
}

function roller() {
	if ($('#roller-button').hasClass("active")) {
		document.getElementById("roller-levels").style.display = "none";
		$('#beginer_roller_button').removeClass("active");
		$('#amateur_roller_button').removeClass("active");
		$('#expert_roller_button').removeClass("active");
	}
	else document.getElementById("roller-levels").style.display = "block";
}

function running() {
	if ($('#running-button').hasClass("active")) {
		document.getElementById("running-levels").style.display = "none";
		$('#beginer_run_button').removeClass("active");
		$('#amateur_run_button').removeClass("active");
		$('#expert_run_button').removeClass("active");
	}
	else document.getElementById("running-levels").style.display = "block";
}

function atLeastOneCyc(param) {
	//document.getElementById("cyclingText").style.color = 'red';
	if(!param)document.getElementById("atLeastCyc").style.display = "none";
	else document.getElementById("atLeastCyc").style.display = "block";
} 

function atLeastOneRoll(param) {
 //	document.getElementById("rollerText").style.color = 'red';	
 	if(!param)document.getElementById("atLeastRoll").style.display = "none";
 	else document.getElementById("atLeastRoll").style.display = "block";
} 

function atLeastOneRun(param) {
	//document.getElementById("runningText").style.color = 'red'; 	
	if(!param)document.getElementById("atLeastRun").style.display = "none";
	else document.getElementById("atLeastRun").style.display = "block";
} 


function ajaxSubmit(name,mail,pwd,sport) {	
		
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  	// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp = new XMLHttpRequest();
	}
	else {
	  // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	params = "name="+name+"&mail="+mail+"&pwd="+pwd+"&sport="+array2json(sport);
	xmlhttp.open("POST","functions/register.php",false);
		
	//Send the proper header information along with the request
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");

	xmlhttp.send(params);

	//document.getElementById("test").innerHTML = xmlhttp.responseText;	
}

function initArraysToZero(sport) {
	sport['cycling']['beginer'] = 0;
	sport['cycling']['amateur'] = 0;
	sport['cycling']['expert'] = 0; 
	

	sport['roller']['beginer'] = 0;		
	sport['roller']['amateur'] = 0;		
	sport['roller']['expert'] = 0;		
		
	sport['run']['beginer'] = 0;			
	sport['run']['amateur'] = 0;		
	sport['run']['expert'] = 0;
	return sport;
}

function array2json(arr) {
    var parts = [];
    var is_list = (Object.prototype.toString.apply(arr) === '[object Array]');

    for(var key in arr) {
    	var value = arr[key];
        if(typeof value == "object") { //Custom handling for arrays
            if(is_list) parts.push(array2json(value)); /* :RECURSION: */
            else parts[key] = array2json(value); /* :RECURSION: */
        } else {
            var str = "";
            if(!is_list) str = '"' + key + '":';

            //Custom handling for multiple data types
            if(typeof value == "number") str += value; //Numbers
            else if(value === false) str += 'false'; //The booleans
            else if(value === true) str += 'true';
            else str += '"' + value + '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Functions?)

            parts.push(str);
        }
    }
    var json = parts.join(",");
    
    if(is_list) return '[' + json + ']';//Return numerical JSON
    return '{' + json + '}';//Return associative JSON
}
/*
function validateRegister() {
 
	 $('#register_form').validate(
	 {
	  rules: {
	    name: {
	      minlength: 2,
	      required: true
	    },
	    email: {
	      required: true,
	      email: true
	    },
	    password: {
	      minlength: 2,
	      required: true
	    },
	    
	  },
	  highlight: function(label) {
	    $(label).closest('.control-group').addClass('error');
	  },
	  success: function(label) {
	    label
	      .text('OK!').addClass('valid')
	      .closest('.control-group').addClass('success');
	  }
	 });
} 
*/

function toggleActive(obj,lastObject) {
	if (lastObject == obj) 
		obj.className = '';
	else 
		lastObject.className = '';
	
	if (obj.className != 'active')	
			obj.className = 'active';
	
	else 
		lastObject.className = '';
	
}

var lastObjectZone = '';
function toggleActiveZone(obj,zone) {	
	toggleActive(obj,lastObjectZone);
	lastObjectZone = obj;
	initialize_zone(zone);
}

var lastObjectRoute = '';
function toggleActiveRoute(obj,route) {		
	toggleActive(obj,lastObjectRoute);
	lastObjectRoute = obj;	
	initialize_route(route);	
}

function active() {
	$("zones1").addClass('active');
}

function loadHome() {
	loadContent("userhome.php");
}

function loadRoutes() {
	loadContent("userroutes.php");
}

function loadEvents() {
	loadContent("userevents.php");
}

function loadZones() {	
	loadContent("userzones.php");		
}

function loadCycle() {
	loadContent("usercycle.php");
}

function loadRoller() {
	loadContent("userroller.php");
}

function loadRun() {
	loadContent("userrun.php");
}

function loadLeftContent(page) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  	// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp = new XMLHttpRequest();
	}
	else {
	  // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET",page,false);			
	xmlhttp.send();
	document.getElementById("left").innerHTML = xmlhttp.responseText;	
}

function loadContent(page) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  	// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp = new XMLHttpRequest();
	}
	else {
	  // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET",page,false);			
	xmlhttp.send();

	document.getElementById("wrap").innerHTML = xmlhttp.responseText;	

	var zone = /zones/i;
	var routes = /routes/i;
	if (page.match(zone))
		loadLeftContent('loadmenuzones.php');
	else if (page.match(routes)) {
		loadLeftContent('loadmenuroutes.php');
	}
	else loadLeftContent('profile.php');
}


function initialize_zone(zone) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  	// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp = new XMLHttpRequest();
	}
	else {
	  // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","loadzone.php?zone="+zone,false);			
	xmlhttp.send();

	var xmlDoc= xmlhttp.responseXML;

	var lat= xmlDoc.getElementsByTagName("lat");
	var lon= xmlDoc.getElementsByTagName("long");
	var geo= xmlDoc.getElementsByTagName("geopoint");




    var mapOptions = {
      center: new google.maps.LatLng(lat[0].childNodes[0].nodeValue, lon[0].childNodes[0].nodeValue),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_zone"),
        mapOptions);
    
    document.getElementById("map_zone").style.height = "500px";    
}


function initialize_route(route) {		
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  	// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp = new XMLHttpRequest();
	}
	else {
	  // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","loadroute.php?route="+route,false);			
	xmlhttp.send();

	var xmlDoc= xmlhttp.responseXML;
//foreach-- Retornar un XML amb tots els geopoints.
	var geo = xmlDoc.getElementsByTagName("geopoint")[0].childNodes[0].nodeValue;

//console.log(geo);
	var lat = xmlDoc.getElementsByTagName("lat");
	var lon = xmlDoc.getElementsByTagName("long");
	var size = (xmlDoc.getElementsByTagName("size")[0].childNodes[0].nodeValue)*1;




    var mapOptions = {
      center: new google.maps.LatLng(lat[0].childNodes[0].nodeValue, lon[0].childNodes[0].nodeValue),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };



    var map = new google.maps.Map(document.getElementById("map_route"),
        mapOptions);


    for (var i = 1; i < size; ++i) {

	 	var latlng1 = new google.maps.LatLng(lat[i-1].childNodes[0].nodeValue, lon[i-1].childNodes[0].nodeValue);
	 	var latlng2 = new google.maps.LatLng(lat[i].childNodes[0].nodeValue, lon[i].childNodes[0].nodeValue);
	    var polyline = new google.maps.Polyline(
						{       
							path:[latlng1,latlng2], 
							map:map,
							strokeColor:"#ff1c41",
							strokeOpacity:0.8,
							strokeWeight:5

						});										
	}

    document.getElementById("map_route").style.height = "500px";    
}


function initialize_routeModal(route,id) {		
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  	// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp = new XMLHttpRequest();
	}
	else {
	  // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function() {
	  	if (xmlhttp.readyState==4 && xmlhttp.status==200)  {
  			var xmlDoc= xmlhttp.responseXML;			
			var geo = xmlDoc.getElementsByTagName("geopoint")[0].childNodes[0].nodeValue;		
			var lat = xmlDoc.getElementsByTagName("lat");
			var lon = xmlDoc.getElementsByTagName("long");
			var size = (xmlDoc.getElementsByTagName("size")[0].childNodes[0].nodeValue)*1;
	    	var mapOptions = {
		      center: new google.maps.LatLng(lat[0].childNodes[0].nodeValue, lon[0].childNodes[0].nodeValue),
		      zoom: 12,
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    };

		    var map = new google.maps.Map(document.getElementById("map_modal"+id),
		        mapOptions);


		    for (var i = 1; i < size; ++i) {

			 	var latlng1 = new google.maps.LatLng(lat[i-1].childNodes[0].nodeValue, lon[i-1].childNodes[0].nodeValue);
			 	var latlng2 = new google.maps.LatLng(lat[i].childNodes[0].nodeValue, lon[i].childNodes[0].nodeValue);
			    var polyline = new google.maps.Polyline(
								{       
									path:[latlng1,latlng2], 
									map:map,
									strokeColor:"#ff1c41",
									strokeOpacity:0.8,
									strokeWeight:5

								});										
			}

    		document.getElementById("map_modal"+id).style.height = "400px";    
		}
	} 
	
	xmlhttp.open("GET","loadroute.php?route="+route,true);			
	xmlhttp.send();






    
}











function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng(41.3, 2.16),
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"),
        mapOptions);
    
    document.getElementById("map").style.height = "500px";

}

  
