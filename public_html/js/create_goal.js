//ajax and JS functions to be included in the html/php files
////////////////////////////////////////////////////////////////////////////

// This functions created the ajax object
function objetoAjax()
{
 try
 {
  var xmlhttp = new XMLHttpRequest();
 }
 catch(err1)
 {
  var ieXmlHttpVersions = new Array();
  ieXmlHttpVersions[ieXmlHttpVersions.length] = "MSXML2.XMLHttp.7.0";
  ieXmlHttpVersions[ieXmlHttpVersions.length] = "MSXML2.XMLHttp.6.0";
  ieXmlHttpVersions[ieXmlHttpVersions.length] = "MSXML2.XMLHttp.5.0";
  ieXmlHttpVersions[ieXmlHttpVersions.length] = "MSXML2.XMLHttp.4.0";
  ieXmlHttpVersions[ieXmlHttpVersions.length] = "MSXML2.XMLHttp.3.0";
  ieXmlHttpVersions[ieXmlHttpVersions.length] = "MSXML2.XMLHttp";
  ieXmlHttpVersions[ieXmlHttpVersions.length] = "Microsoft.XMLHttp";

  var i;
  for (i=0; i < ieXmlHttpVersions.length; i++)
  {
   try
   {
    var xmlhttp = new ActiveXObject(ieXmlHttpVersions[i]);
    break;
   }
   catch (err2)
   {
   
   }
  }
 }

 return xmlhttp;
}
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////


// This function sends the parameters
function optionRegion(div_id,url,populate)
{	
	divResultado = document.getElementById(div_id);
	ajax=objetoAjax();
	ajax.open("POST", "../php/" +url,true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			divResultado.innerHTML = ajax.responseText;
		}
		else if (ajax.readyState == 1)
		{
			divResultado.innerHTML = "<img src='../images/graphics/waitball.gif' border=0 height='20' width='20'>";
		}

	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	str_send = getparameters(populate);
	ajax.send(str_send);
	
	// Refresh other lists
	switch(populate)
	{
		case 1:
			// refresh divisions
			if (document.getElementById("list_division"))
			{
				while (document.createitem.clubdivision.length > 1)
				{
					document.createitem.clubdivision.remove(document.createitem.clubdivision.length-1);
				}
			}
			// refresh groups
			if (document.getElementById("list_group"))
			{
				while (document.createitem.clubgroup.length > 1)
				{
					document.createitem.clubgroup.remove(document.createitem.clubgroup.length-1);
				}
			}
			// refresh clubs
			if (document.getElementById("list_club_home"))
			{
				while (document.createitem.clubhome.length > 1)
				{
					document.createitem.clubhome.remove(document.createitem.clubhome.length-1);
				}
			}
			if (document.getElementById("list_club_away"))
			{
				while (document.createitem.clubaway.length > 1)
				{
					document.createitem.clubaway.remove(document.createitem.clubaway.length-1);
				}
			}
			// refresh scoring club
			while (document.createitem.scoring_club.length > 1)
			{
				document.createitem.scoring_club.remove(document.createitem.scoring_club.length-1);
			}
			//refreshing scorer
			if (document.getElementById("list_scorer"))
			{
				while (document.createitem.scorer.length > 1)
				{
					document.createitem.scorer.remove(document.createitem.scorer.length-1);
				}
			}
			//refreshing assister
			if (document.getElementById("list_assister"))
			{
				while (document.createitem.assister.length > 1)
				{
					document.createitem.assister.remove(document.createitem.assister.length-1);
				}
			}
			break;
		case 2:
			// refresh groups
			if (document.getElementById("list_group"))
			{
				while (document.createitem.clubgroup.length > 1)
				{
					document.createitem.clubgroup.remove(document.createitem.clubgroup.length-1);
				}
			}
			// refresh clubs
			if (document.getElementById("list_club_home"))
			{
				while (document.createitem.clubhome.length > 1)
				{
					document.createitem.clubhome.remove(document.createitem.clubhome.length-1);
				}
			}
			if (document.getElementById("list_club_away"))
			{
				while (document.createitem.clubaway.length > 1)
				{
					document.createitem.clubaway.remove(document.createitem.clubaway.length-1);
				}
			}
			// refresh scoring club
			while (document.createitem.scoring_club.length > 1)
			{
				document.createitem.scoring_club.remove(document.createitem.scoring_club.length-1);
			}
			//refreshing scorer
			if (document.getElementById("list_scorer"))
			{
				while (document.createitem.scorer.length > 1)
				{
					document.createitem.scorer.remove(document.createitem.scorer.length-1);
				}
			}
			//refreshing assister
			if (document.getElementById("list_assister"))
			{
				while (document.createitem.assister.length > 1)
				{
					document.createitem.assister.remove(document.createitem.assister.length-1);
				}
			}
			break;
		case 3:
			// refresh clubs
			if (document.getElementById("list_club_home"))
			{
				while (document.createitem.clubhome.length > 1)
				{
					document.createitem.clubhome.remove(document.createitem.clubhome.length-1);
				}
			}
			if (document.getElementById("list_club_away"))
			{
				while (document.createitem.clubaway.length > 1)
				{
					document.createitem.clubaway.remove(document.createitem.clubaway.length-1);
				}
			}
			// refresh scoring club
			while (document.createitem.scoring_club.length > 1)
			{
				document.createitem.scoring_club.remove(document.createitem.scoring_club.length-1);
			}
			//refreshing scorer
			if (document.getElementById("list_scorer"))
			{
				while (document.createitem.scorer.length > 1)
				{
					document.createitem.scorer.remove(document.createitem.scorer.length-1);
				}
			}
			//refreshing assister
			if (document.getElementById("list_assister"))
			{
				while (document.createitem.assister.length > 1)
				{
					document.createitem.assister.remove(document.createitem.assister.length-1);
				}
			}
			break;
		case 4:
			// refresh scoring club
			while (document.createitem.scoring_club.length > 1)
			{
				document.createitem.scoring_club.remove(document.createitem.scoring_club.length-1);
			}
			//refreshing scorer
			if (document.getElementById("list_scorer"))
			{
				while (document.createitem.scorer.length > 1)
				{
					document.createitem.scorer.remove(document.createitem.scorer.length-1);
				}
			}
			//refreshing assister
			if (document.getElementById("list_assister"))
			{
				while (document.createitem.assister.length > 1)
				{
					document.createitem.assister.remove(document.createitem.assister.length-1);
				}
			}		
			break;
	}
}
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// This function returns the parameters needed for the php files which will populate the lists (ajax)
function getparameters(list)
{
	switch(list)
	{
		case 1:
			strpost = "id_country="+document.createitem.clubcountry.value;
			break;
		case 2:
			strpost = "id_country=" + document.createitem.clubcountry.value;
			strpost = strpost + "&id_region=" + document.createitem.clubregion.value;
			break;
		case 3:
			strpost = "id_country=" + document.createitem.clubcountry.value;
			strpost = strpost + "&id_region=" + document.createitem.clubregion.value;
			strpost = strpost + "&id_division=" + document.createitem.clubdivision.value;
			break;
		case 4:
			strpost = "id_country=" + document.createitem.clubcountry.value;
			strpost = strpost + "&id_region=" + document.createitem.clubregion.value;
			strpost = strpost + "&id_division=" + document.createitem.clubdivision.value;
			strpost = strpost + "&id_group=" + document.createitem.clubgroup.value;
			break;
		case 5:
			strpost = "id_club=" + document.createitem.scoring_club.value;
			break;
	}
	return strpost;
}
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// This function validates the form for creating players
function validate_form_goal()
{
	// date validation information
	var mdate = new Date();
	s_year= mdate.getFullYear();
	byear = (document.createitem.year.value != "") && (document.createitem.year.value > (s_year-100));
	byear = (byear) && (document.createitem.year.value <= (s_year));
	sdate = document.createitem.year.value + "-" + document.createitem.month.value + "-" + document.createitem.day.value;
					
	var monthname=new Array("January","February","March","April","May","June","July","August",
		"September","October","November","December")
	
	var mdate2 = new Date(monthname[document.createitem.month.value - 1] + " " + Number(document.createitem.day.value) + "," + document.createitem.year.value);
	bdate = (byear) && ((mdate2.getMonth() + 1) == (Number(document.createitem.month.value)));
	
	////////////////////////////////////////////
	////////////////////////////////////////////
	//validation
	var bok=new Boolean(true);
	
	//country
	if (document.createitem.clubcountry.selectedIndex == 0)
	{
	document.getElementById('countrymsg').innerHTML="campo requerido";
	bok = false;
	}
	else
	{
	document.getElementById('countrymsg').innerHTML="";
	}
	
	// region
	if (document.getElementById("list_region"))
	{
		bregion = (document.createitem.clubregion.selectedIndex != 0);
		if (!bregion)
		{
			document.getElementById('regionmsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('regionmsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('regionmsg').innerHTML="campo requerido";
	}
	
	// division
	if (document.getElementById("list_division"))
	{
		bdivision = (document.createitem.clubdivision.selectedIndex != 0);
		if (!bdivision)
		{
			document.getElementById('divisionmsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('divisionmsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('divisionmsg').innerHTML="campo requerido";
	}

	// group
	if (document.getElementById("list_group"))
	{
		bgroup = (document.createitem.clubgroup.selectedIndex != 0);
		if (!bgroup)
		{
			document.getElementById('groupmsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('groupmsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('groupmsg').innerHTML="campo requerido";
	}
	
	// season (only need to check if season2 is not empty)
	bseason = document.createitem.season2.value != "";
	if (!bseason)
	{
		document.getElementById('seasonmsg').innerHTML="campo requerido";
		bok = false;
	}
	else
	{
		document.getElementById('seasonmsg').innerHTML="";
		document.createitem.season.value = document.createitem.season1.value + "/" + document.createitem.season2.value
	}
	
	//date
	if (!bdate)
	{
	document.getElementById('datemsg').innerHTML="la fecha elegida no existe";
	bok = false;
	}
	else
	{
	document.createitem.date.value = sdate;
	document.getElementById('datemsg').innerHTML="";
	}
	
	// home - away clubs
	if ((document.getElementById("list_club_home")) &&  (document.getElementById("list_club_away")))
	{
		bhome = (document.createitem.clubhome.selectedIndex != 0);
		baway = (document.createitem.clubaway.selectedIndex != 0);
		if ((!bhome) || (!baway))
		{
			document.getElementById('clubsmsg').innerHTML="campos requeridos";
			bok = false;
		}
		else
		{
			document.getElementById('clubsmsg').innerHTML="";
		}
		
		if (document.createitem.clubhome.selectedIndex == document.createitem.clubaway.selectedIndex)
		{
			if (bhome || baway)
			{
				document.getElementById('clubsmsg').innerHTML="no es posible que un equipo juegue contra si";
				bok = false;
			}
		}
	}
	else
	{
		document.getElementById('clubsmsg').innerHTML="campos requeridos";
	}
	
	// scoring club
	bscoring = (document.createitem.scoring_club.selectedIndex != 0);
	if (!bscoring)
	{
		document.getElementById('scoringmsg').innerHTML="campo requerido";
		bok = false;
	}
	else
	{
		document.getElementById('scoringmsg').innerHTML="";
	}
	
	// Scorer
	if (document.getElementById("list_scorer"))
	{
		bscorer = (document.createitem.scorer.selectedIndex != 0);
		if (!bscorer)
		{
			document.getElementById('scorermsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('scorermsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('scorermsg').innerHTML="campo requerido";
	}
	
	
	// assister (this field is not required)
	/*
	if (document.getElementById("list_assister"))
	{
		bassister = (document.createitem.assister.selectedIndex != 0);
		if (!bassister)
		{
			document.getElementById('assistermsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('assistermsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('assistermsg').innerHTML="campo requerido";
	}
	*/
	
	// other checks
	// the result cannot be 0-0 if you are uploading a goal
	bresult = ((document.createitem.goals_home.value > 0) || (document.createitem.goals_away.value > 0));
	if (!bresult)
		{
			document.getElementById('resultmsg').innerHTML="el resultado no puede ser 0-0 despu&eacute;s de un gol";
			bok = false;
		}
		else
		{
			document.getElementById('resultmsg').innerHTML="";
		}
		
	// scorer and assister cannot be the same player
	if (document.getElementById("list_scorer") && document.getElementById("list_assister"))
	{
	
		if (document.createitem.scorer.selectedIndex == 0)
		{
			document.getElementById('scorermsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			bplayer = document.createitem.scorer.selectedIndex != document.createitem.assister.selectedIndex;
			if (!bplayer)
				{
					document.getElementById('scorermsg').innerHTML="goleador y asistente no pueden ser el mismo";
					document.getElementById('assistermsg').innerHTML="goleador y asistente no pueden ser el mismo";
					bok = false;
				}
				else
				{
					document.getElementById('scorermsg').innerHTML="";
					document.getElementById('assistermsg').innerHTML="";
				}
		}
	}
	
	// At this point, if bok equals true, then the goal details have been filled correctly
	////////////////////////////////////////////////////////////////////////
	
	// submit form if it has been correctly populated
	if (bok)
	{
		document.createitem.submit();
	}
	
}

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// This function validates the form for creating players
function validate_form_goal_manager()
{
	// date validation information
	var mdate = new Date();
	s_year= mdate.getFullYear();
	byear = (document.createitem.year.value != "") && (document.createitem.year.value > (s_year-100));
	byear = (byear) && (document.createitem.year.value <= (s_year));
	sdate = document.createitem.year.value + "-" + document.createitem.month.value + "-" + document.createitem.day.value;
					
	var monthname=new Array("January","February","March","April","May","June","July","August",
		"September","October","November","December")
	
	var mdate2 = new Date(monthname[document.createitem.month.value - 1] + " " + Number(document.createitem.day.value) + "," + document.createitem.year.value);
	bdate = (byear) && ((mdate2.getMonth() + 1) == (Number(document.createitem.month.value)));
	
	////////////////////////////////////////////
	////////////////////////////////////////////
	//validation
	var bok=new Boolean(true);
	
	// season (only need to check if season2 is not empty)
	bseason = document.createitem.season2.value != "";
	if (!bseason)
	{
		document.getElementById('seasonmsg').innerHTML="campo requerido";
		bok = false;
	}
	else
	{
		document.getElementById('seasonmsg').innerHTML="";
		document.createitem.season.value = document.createitem.season1.value + "/" + document.createitem.season2.value
	}
	
	//date
	if (!bdate)
	{
	document.getElementById('datemsg').innerHTML="la fecha elegida no existe";
	bok = false;
	}
	else
	{
	document.createitem.date.value = sdate;
	document.getElementById('datemsg').innerHTML="";
	}
	
	// home - away clubs
	if ((document.getElementById("list_club_home")) &&  (document.getElementById("list_club_away")))
	{
		bhome = (document.createitem.clubhome.selectedIndex != 0);
		baway = (document.createitem.clubaway.selectedIndex != 0);
		if ((!bhome) || (!baway))
		{
			document.getElementById('clubsmsg').innerHTML="campos requeridos";
			bok = false;
		}
		else
		{
			document.getElementById('clubsmsg').innerHTML="";
		}
		
		if (document.createitem.clubhome.selectedIndex == document.createitem.clubaway.selectedIndex)
		{
			if (bhome || baway)
			{
				document.getElementById('clubsmsg').innerHTML="no es posible que un equipo juegue contra si";
				bok = false;
			}
		}
	}
	else
	{
		document.getElementById('clubsmsg').innerHTML="campos requeridos";
	}
	x = document.createitem.clubhome;
	y = document.createitem.clubaway;
	z = document.createitem.scoring_club;
	
	// for player/manager, one of the clubs has to be their club
	if ( document.getElementById('clubsmsg').innerHTML == "" )
	{
		if ( (x.options[x.selectedIndex].text != z.options[z.selectedIndex].text) && (y.options[y.selectedIndex].text != z.options[z.selectedIndex].text) )
		{
			document.getElementById('clubsmsg').innerHTML = z.options[z.selectedIndex].text + " ha de ser Local o Visitante";
			bok = false;
		}
	}
	
	
	// Scorer
	if (document.getElementById("list_scorer"))
	{
		bscorer = (document.createitem.scorer.selectedIndex != 0);
		if (!bscorer)
		{
			document.getElementById('scorermsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('scorermsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('scorermsg').innerHTML="campo requerido";
	}
	
	
	// assister (this field is not required)
	/*
	if (document.getElementById("list_assister"))
	{
		bassister = (document.createitem.assister.selectedIndex != 0);
		if (!bassister)
		{
			document.getElementById('assistermsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('assistermsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('assistermsg').innerHTML="campo requerido";
	}
	*/
	
	// other checks
	// the result cannot be 0-0 if you are uploading a goal
	bresult = ((document.createitem.goals_home.value > 0) || (document.createitem.goals_away.value > 0));
	if (!bresult)
		{
			document.getElementById('resultmsg').innerHTML="el resultado no puede ser 0-0 despu&eacute;s de un gol";
			bok = false;
		}
		else
		{
			document.getElementById('resultmsg').innerHTML="";
		}
		
	// scorer and assister cannot be the same player
	if (document.getElementById("list_scorer") && document.getElementById("list_assister"))
	{
	
		if (document.createitem.scorer.selectedIndex == 0)
		{
			document.getElementById('scorermsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			bplayer = document.createitem.scorer.selectedIndex != document.createitem.assister.selectedIndex;
			if (!bplayer)
				{
					document.getElementById('scorermsg').innerHTML="goleador y asistente no pueden ser el mismo";
					document.getElementById('assistermsg').innerHTML="goleador y asistente no pueden ser el mismo";
					bok = false;
				}
				else
				{
					document.getElementById('scorermsg').innerHTML="";
					document.getElementById('assistermsg').innerHTML="";
				}
		}
	}
	
	// At this point, if bok equals true, then the goal details have been filled correctly
	////////////////////////////////////////////////////////////////////////
	
	// submit form if it has been correctly populated
	if (bok)
	{
		document.createitem.submit();
	}
	
}


////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// This function validates the form for creating players
function validate_form_goal_player()
{
	// date validation information
	var mdate = new Date();
	s_year= mdate.getFullYear();
	byear = (document.createitem.year.value != "") && (document.createitem.year.value > (s_year-100));
	byear = (byear) && (document.createitem.year.value <= (s_year));
	sdate = document.createitem.year.value + "-" + document.createitem.month.value + "-" + document.createitem.day.value;
					
	var monthname=new Array("January","February","March","April","May","June","July","August",
		"September","October","November","December")
	
	var mdate2 = new Date(monthname[document.createitem.month.value - 1] + " " + Number(document.createitem.day.value) + "," + document.createitem.year.value);
	bdate = (byear) && ((mdate2.getMonth() + 1) == (Number(document.createitem.month.value)));
	
	////////////////////////////////////////////
	////////////////////////////////////////////
	//validation
	var bok=new Boolean(true);
	
	// season (only need to check if season2 is not empty)
	bseason = document.createitem.season2.value != "";
	if (!bseason)
	{
		document.getElementById('seasonmsg').innerHTML="campo requerido";
		bok = false;
	}
	else
	{
		document.getElementById('seasonmsg').innerHTML="";
		document.createitem.season.value = document.createitem.season1.value + "/" + document.createitem.season2.value
	}
	
	//date
	if (!bdate)
	{
	document.getElementById('datemsg').innerHTML="la fecha elegida no existe";
	bok = false;
	}
	else
	{
	document.createitem.date.value = sdate;
	document.getElementById('datemsg').innerHTML="";
	}
	
	// home - away clubs
	if ((document.getElementById("list_club_home")) &&  (document.getElementById("list_club_away")))
	{
		bhome = (document.createitem.clubhome.selectedIndex != 0);
		baway = (document.createitem.clubaway.selectedIndex != 0);
		if ((!bhome) || (!baway))
		{
			document.getElementById('clubsmsg').innerHTML="campos requeridos";
			bok = false;
		}
		else
		{
			document.getElementById('clubsmsg').innerHTML="";
		}
		
		if (document.createitem.clubhome.selectedIndex == document.createitem.clubaway.selectedIndex)
		{
			if (bhome || baway)
			{
				document.getElementById('clubsmsg').innerHTML="no es posible que un equipo juegue contra si";
				bok = false;
			}
		}
	}
	else
	{
		document.getElementById('clubsmsg').innerHTML="campos requeridos";
	}
	x = document.createitem.clubhome;
	y = document.createitem.clubaway;
	z = document.createitem.scoring_club;
	
	// for player/manager, one of the clubs has to be their club
	if ( document.getElementById('clubsmsg').innerHTML == "" )
	{
		if ( (x.options[x.selectedIndex].text != z.options[z.selectedIndex].text) && (y.options[y.selectedIndex].text != z.options[z.selectedIndex].text) )
		{
			document.getElementById('clubsmsg').innerHTML = z.options[z.selectedIndex].text + " ha de ser Local o Visitante";
			bok = false;
		}
	}
	
	// assister (this field is not required)
	/*
	if (document.getElementById("list_assister"))
	{
		bassister = (document.createitem.assister.selectedIndex != 0);
		if (!bassister)
		{
			document.getElementById('assistermsg').innerHTML="campo requerido";
			bok = false;
		}
		else
		{
			document.getElementById('assistermsg').innerHTML="";
		}
	}
	else
	{
		document.getElementById('assistermsg').innerHTML="campo requerido";
	}
	*/
	
	// other checks
	// the result cannot be 0-0 if you are uploading a goal
	bresult = ((document.createitem.goals_home.value > 0) || (document.createitem.goals_away.value > 0));
	if (!bresult)
		{
			document.getElementById('resultmsg').innerHTML="el resultado no puede ser 0-0 despu&eacute;s de un gol";
			bok = false;
		}
		else
		{
			document.getElementById('resultmsg').innerHTML="";
		}
	
	// At this point, if bok equals true, then the goal details have been filled correctly
	////////////////////////////////////////////////////////////////////////
	
	// submit form if it has been correctly populated
	if (bok)
	{
		document.createitem.submit();
	}
	
}



// function to check if the text typed is only alpha
function isAlpha(parm)
{
	var lwr = 'abcdefghijklmnñopqrstuvwxyzàáâãäåæçèéêëìíîïğòóôõöøùúûüışÿ ';
	var upr = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÒÓÔÕÖ×ØÙÚÛÜİŞß';
	var val = lwr+upr;
	if (parm == "") return true;
	for (i=0; i<parm.length; i++)
	{
		if (val.indexOf(parm.charAt(i),0) == -1) return false;
	}
	return true;
}

// this function adjusts the seasion lists depending on the year selected
function adjust_season()
{
	if (document.createitem.season1.selectedIndex == 0)
	{
		document.createitem.season2.value = "";
	}
	else
	{
		document.createitem.season2.value =  Number(document.createitem.season1.value) + 1;
	}
}

// This function fills both club lists whenever there is a change in the previous lists for selecting a club (create_goal)
function fill_clubs()
{
	optionRegion("div_home","club_home.php",4);
	var t=setTimeout("optionRegion('div_away','club_away.php',4)",2000);
}

// This function fills both players lists whenever there is a change in the scoring club list
function fill_players()
{
	optionRegion("div_scorer","scorer.php",5);
	var t=setTimeout("optionRegion('div_assister','assister.php',5)",2000);
}

// This function fills the scoring team once the user selects the clubs of the game
function score_club()
{
while (document.createitem.scoring_club.length > 1)
	{
		document.createitem.scoring_club.remove(document.createitem.scoring_club.length-1);
	}

if (document.createitem.clubaway.options[document.createitem.clubaway.selectedIndex].text == document.createitem.clubhome.options[document.createitem.clubhome.selectedIndex].text)
{
	if (document.createitem.clubhome.selectedIndex != 0)
	{
		var y = document.createElement('option');
		y.text = document.createitem.clubhome.options[document.createitem.clubhome.selectedIndex].text;
		y.value = document.createitem.clubhome.options[document.createitem.clubhome.selectedIndex].value;
		
		try
		{
			document.createitem.scoring_club.add(y,null); // standards compliant
		}
		catch(ex)
		{
			document.createitem.scoring_club.add(y); // IE only
		}
	}
}
else
{
	if (document.createitem.clubhome.selectedIndex != 0)
		{
			var y = document.createElement('option');
			y.text = document.createitem.clubhome.options[document.createitem.clubhome.selectedIndex].text;
			y.value = document.createitem.clubhome.options[document.createitem.clubhome.selectedIndex].value;
			
			try
			{
				document.createitem.scoring_club.add(y,null); // standards compliant
			}
			catch(ex)
			{
				document.createitem.scoring_club.add(y); // IE only
			}
		}

	if (document.createitem.clubaway.selectedIndex != 0)
	{
		var x = document.createElement('option');
		x.text = document.createitem.clubaway.options[document.createitem.clubaway.selectedIndex].text;
		x.value = document.createitem.clubaway.options[document.createitem.clubaway.selectedIndex].value;
		try
		{
			document.createitem.scoring_club.add(x,null); // standards compliant
		}
		catch(ex)
		{
			document.createitem.scoring_club.add(x); // IE only
		}
	}
}

//refreshing scorer
if (document.getElementById("list_scorer"))
{
	while (document.createitem.scorer.length > 1)
	{
		document.createitem.scorer.remove(document.createitem.scorer.length-1);
	}
}
//refreshing assister
if (document.getElementById("list_assister"))
{
	while (document.createitem.assister.length > 1)
	{
		document.createitem.assister.remove(document.createitem.assister.length-1);
	}
}		
}

// this function checks that the form is not empty and submits it
function validate_search_player()
{
	if (document.search_player.player_name.value.length > 5 )
	{
		document.search_player.submit();
	}
}

// this function checks that the form is not empty and submits it
function validate_search_club()
{
	if ( document.search_club.club_name.value.length > 5 )
	{
		document.search_club.submit();
	}
}
