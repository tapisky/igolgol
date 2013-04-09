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


// This function sends the information to be displayed on the div
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
			if (document.getElementById("list_club"))
			{
				while (document.createitem.club.length > 1)
				{
					document.createitem.club.remove(document.createitem.club.length-1);
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
			if (document.getElementById("list_club"))
			{
				while (document.createitem.club.length > 1)
				{
					document.createitem.club.remove(document.createitem.club.length-1);
				}
			}
			break;
		case 3:
			// refresh clubs
			if (document.getElementById("list_club"))
			{
				while (document.createitem.club.length > 1)
				{
					document.createitem.club.remove(document.createitem.club.length-1);
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
	}
	return strpost;
}
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// This function validates the form for creating players
function validate_form()
{
	//input fields validation information
	bfirst = (document.createitem.firstname.value != "") && (isAlpha(document.createitem.firstname.value));
	blast = (document.createitem.lastname.value != "") && (isAlpha(document.createitem.lastname.value));;
	bheight = (document.createitem.height.value != "") && (!isNaN(document.createitem.height.value));
	bheight = (bheight) && (document.createitem.height.value > 100) && (document.createitem.height.value <251);
	bweight = (document.createitem.weight.value != "") && (!isNaN(document.createitem.weight.value));
	bweight = (bweight) && (document.createitem.weight.value > 39) && (document.createitem.weight.value <121);
	
	
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
	
	//first name
	if (!bfirst)
	{
	document.getElementById('firstnamemsg').innerHTML="obligatorio, sin n&uacute;meros ni s&iacute;mbolos";
	bok = false;
	}
	else
	{
	document.getElementById('firstnamemsg').innerHTML="";
	}
	
	//last name
	if (!blast)
	{
	document.getElementById('lastnamemsg').innerHTML="obligatorio, sin n&uacute;meros ni s&iacute;mbolos";
	bok = false;
	}
	else
	{
	document.getElementById('lastnamemsg').innerHTML="";
	}
	
	//height
	if (!bheight)
	{
	document.getElementById('heightmsg').innerHTML="n&uacute;mero (entre 100 y 250)";
	bok = false;
	}
	else
	{
	document.getElementById('heightmsg').innerHTML="";
	}
	
	//weight
	if (!bweight)
	{
	document.getElementById('weightmsg').innerHTML="n&uacute;mero (entre 40 y 120)";
	bok = false;
	}
	else
	{
	document.getElementById('weightmsg').innerHTML="";
	}
	
	//date
	if (!bdate)
	{
	document.getElementById('datemsg').innerHTML="fecha inexistente";
	bok = false;
	}
	else
	{
	document.createitem.date.value = sdate;
	document.getElementById('datemsg').innerHTML="";
	}
	
	// At this point, if bok equals true, then the player details have been filled correctly
	////////////////////////////////////////////////////////////////////////
	
	// validate player actual club
	// country
	bcountry = (document.createitem.clubcountry.selectedIndex != 0);
		
	// region
	if (document.getElementById("list_region"))
	{
		bregion = (document.createitem.clubregion.selectedIndex != 0);
	}
	
	// division
	if (document.getElementById("list_division"))
	{
		bdivision = (document.createitem.clubdivision.selectedIndex != 0);
	}

	// group
	if (document.getElementById("list_group"))
	{
		bgroup = (document.createitem.clubgroup.selectedIndex != 0);
	}
	
	// club
	if (document.getElementById("list_club"))
	{
		bclub = (document.createitem.club.selectedIndex != 0);
	}
	
	if (bcountry && bregion && bdivision && bgroup && bclub)
	{
		// club has been selected
		bselected_club = true;
		document.getElementById('clubmsg').innerHTML="";
	}
	else
	{
		// club has not been selected
		bselected_club = false;
		document.getElementById('clubmsg').innerHTML="Elige equipo";
	}
	
	// At this point, if bselected_club equals true, then the player actual club has been filled correctly
	////////////////////////////////////////////////////////////////////////

	// submit form if it has been correctly populated
	if (bok && bselected_club)
	{
		document.createitem.submit();
	}
	
}

// This function validates the form for creating players
function validate_form_player_manager()
{
	//input fields validation information
	bfirst = (document.createitem.firstname.value != "") && (isAlpha(document.createitem.firstname.value));
	blast = (document.createitem.lastname.value != "") && (isAlpha(document.createitem.lastname.value));;
	bheight = (document.createitem.height.value != "") && (!isNaN(document.createitem.height.value));
	bheight = (bheight) && (document.createitem.height.value > 100) && (document.createitem.height.value <251);
	bweight = (document.createitem.weight.value != "") && (!isNaN(document.createitem.weight.value));
	bweight = (bweight) && (document.createitem.weight.value > 39) && (document.createitem.weight.value <121);
	
	
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
	
	//first name
	if (!bfirst)
	{
	document.getElementById('firstnamemsg').innerHTML="obligatorio, sin n&uacute;meros ni s&iacute;mbolos";
	bok = false;
	}
	else
	{
	document.getElementById('firstnamemsg').innerHTML="";
	}
	
	//last name
	if (!blast)
	{
	document.getElementById('lastnamemsg').innerHTML="obligatorio, sin n&uacute;meros ni s&iacute;mbolos";
	bok = false;
	}
	else
	{
	document.getElementById('lastnamemsg').innerHTML="";
	}
	
	//height
	if (!bheight)
	{
	document.getElementById('heightmsg').innerHTML="n&uacute;mero (entre 100 y 250)";
	bok = false;
	}
	else
	{
	document.getElementById('heightmsg').innerHTML="";
	}
	
	//weight
	if (!bweight)
	{
	document.getElementById('weightmsg').innerHTML="n&uacute;mero (entre 40 y 120)";
	bok = false;
	}
	else
	{
	document.getElementById('weightmsg').innerHTML="";
	}
	
	//date
	if (!bdate)
	{
	document.getElementById('datemsg').innerHTML="fecha inexistente";
	bok = false;
	}
	else
	{
	document.createitem.date.value = sdate;
	document.getElementById('datemsg').innerHTML="";
	}
	
	// At this point, if bok equals true, then the player details have been filled correctly
	////////////////////////////////////////////////////////////////////////
	
	// submit form if it has been correctly populated
	if (bok)
	{
		// so to make the following page know that the form has been sent, we need to give any value to the submit button
		document.createitem.formsent.value = 1;
		
		// send the form
		document.createitem.submit();
	}
}


// function to check if the text typed is only alpha
function isAlpha(parm)
{
	var lwr = 'abcdefghijklmnñopqrstuvwxyzàáâãäåæçèéêëìíîïðòóôõöøùúûüýþÿ ';
	var upr = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÒÓÔÕÖ×ØÙÚÛÜÝÞß';
	var val = lwr+upr;
	if (parm == "") return true;
	for (i=0; i<parm.length; i++)
	{
		if (val.indexOf(parm.charAt(i),0) == -1) return false;
	}
	return true;
}

// this functions changes the picture of the position listbox
function change_position()
{
	document.getElementById('pitch_cover').innerHTML= "<img src='http://www.igolgol.com/images/graphics/positions/" + document.createitem.position.value + ".jpg' height='150' width='110'>";
}

// This function sends the information to be displayed on the div
function preview_pic(div_id,url)
{	
	divResultado = document.getElementById(div_id);
	ajax=objetoAjax();
	ajax.open("POST", url,true);
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4)
		{
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	str_send = "file=" + document.createitem.file.value;
	ajax.send(str_send);
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