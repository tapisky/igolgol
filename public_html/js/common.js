//ajax and JS functions to be included in the html/php files
////////////////////////////////////////////////////////////////////////////

// This function validates the password
// Password rules:
// 1. Password has to be between 7 and 10 characters long
//2. Must contain at least one capital letter
//3. Must contain at least one special character "!@#$%^&*()+=-[]\\\';,./{}|\":<>?"
//4. Must contain a number "0 - 9"
function validatepwd()
{
	document.showscorer.id.value = playerid;
	document.showscorer.submit();
	
	var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
	var SC=false;

	
	for (var i = 0; i < document.loginform.pass.value.length; i++)
	{
		if (iChars.indexOf(document.loginform.pass.value.charAt(i)) != -1)
		{
			SC=true;
			break;
		}
	}
	
	if(document.loginform.pass.value!=null && Trim(document.loginform.pass.value).length>=7 && Trim(document.loginform.pass.value).length<=10 && ((document.loginform.pass.value).match(/([a-z])/)&&(document.loginform.pass.value).match(/([A-Z])/)) && ((document.loginform.pass.value).match(/([0-9])/)) && SC)
	{
	numalphaSC=true;
	}

	if(!numalphaSC)
	{
		var sErr = "<font color='red'>El password debe cumplir todas las siguientes normas de seguridad:<br>";
		sErr = sErr + "1. Debe tener entre 7 y 10 caracteres<br>";
		sErr = sErr + "2. Debe contener al menos una letra may&uacute;scula y al menos un n&uacute;mero<br>";
		sErr = sErr + "3. Debe contener al menos un s&iacute;mbolo (!@#$%^&*()+=-[]\\\';,./{}|\":<>?)<br>";
		document.getElementById('loginmsg').innerHTML = sErr;
	}
	else
	{
		document.loginform.submit();
	}
}

// this function initializes google trackers
function google_track()
{
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	
	try
	{
		var pageTracker = _gat._getTracker("UA-6517397-1");
		pageTracker._trackPageview();
	}

	catch(err) {}
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


