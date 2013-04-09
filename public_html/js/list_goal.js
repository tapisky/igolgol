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
			if (document.getElementById("list_region"))
			{
				strpost = strpost + "&id_region=" + document.createitem.clubregion.value;
			}
			else
			{
				strpost = strpost + "&id_region=0";
			}
			if (document.getElementById("list_division"))
			{
				strpost = strpost + "&id_division=" + document.createitem.clubdivision.value;
			}
			else
			{
				strpost = strpost + "&id_division=0";
			}
			if (document.getElementById("list_group"))
			{
				strpost = strpost + "&id_group=" + document.createitem.clubgroup.value;
			}
			else
			{
				strpost = strpost + "&id_group=0";
			}
			if (document.getElementById("list_club"))
			{
				strpost = strpost + "&id_club=" + document.createitem.club.value;
			}
			else
			{
				strpost = strpost + "&id_group=0";
			}
			strpost = strpost + "&id_season=" + document.createitem.season.value;
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
	// season (only need to check if season2 is not empty)
	bseason = document.createitem.season2.value != "";
	if (!bseason)
	{
		document.createitem.season.value = 0;
	}
	else
	{
		document.createitem.season.value = document.createitem.season1.value + "/" + document.createitem.season2.value
	}
		
		
	// At this point, if bok equals true, then the  details have been filled correctly
	////////////////////////////////////////////////////////////////////////
	
	// submit form if it has been correctly populated
	show_topscorers("div_topscorer","get_topscorer.php")
}

// function to check if the text typed is only alpha
function isAlpha(parm)
{
	var lwr = 'abcdefghijklmnÒopqrstuvwxyz‡·‚„‰ÂÊÁËÈÍÎÏÌÓÔÚÛÙıˆ¯˘˙˚¸˝˛ˇ ';
	var upr = 'ABCDEFGHIJKLMN—OPQRSTUVWXYZ¿¡¬√ƒ≈∆«»… ÀÃÕŒœ–“”‘’÷◊ÿŸ⁄€‹›ﬁﬂ';
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
/////////////////////////////////////////

// This function sends the parameters
function show_topscorers(div_id,url)
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
	str_send = getparameters(4);
	ajax.send(str_send);
			
}

// This function shows a player passed by parameter
function show_player(playerid)
{
	document.showscorer.id.value = playerid;
	document.showscorer.submit();
}