$("#button").click(function()
{
	if(navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(showLocation, errors);
	}	
  	else
	{
		$("#holder").text("Geolocation is not supported by this browser.");
	}
});

function showLocation(position)
{
	var lat1, lon1, lat2, lon2, arrayLength, lowest, calc=[], id, name, idList=[];
	lat1 = position.coords.latitude;
	lon1 = position.coords.longitude;
	
	$("#holder").text("Latitude: " + lat1 + " & Longitude: " + lon1);
	
	arrayLength = locationArray.length;
	
	for(i=0; i<arrayLength; i++)
	{
		lat2 = locationArray[i][1];
		lon2 = locationArray[i][2];
		calc.push(distance(lat1,lon1,lat2,lon2));
		idList.push(locationArray[i][0]);
	}
	
	lowest = 0;
	for(i=1; i<calc.length; i++)
	{
		if(calc[i] < calc[lowest])
		{
			lowest = i;
		}
	}
	
	id = idList[lowest];
	name = locationArray[lowest];
	$("#holder").append(name);
	console.log(name);
}

function errors(error) 
{
	switch(error.code)
	{
		case error.PERMISSION_DENIED:
			$("#holder").text("The user denied the request for Geolocation.");
			break;
		case error.POSITION_UNAVAILABLE:
			$("#holder").text("Current location infomation is unavailable.");
			break;
		case error.TIMEOUT:
			$("#holder").text("The request timed out.");
			break;
		case error.UNKNOWN_ERROR:
			$("#holder").text("An unknown error occured.");
			break;
	}
}

function distance(lat1,lon1,lat2,lon2)
{
	var R = 6371;
	var dLat = (lat2-lat1) * Math.PI / 180;
	var dLon = (lon2-lon1) * Math.PI / 180;
	var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(lat1 * Math.PI / 180 ) * Math.cos(lat2 * Math.PI / 180 ) * Math.sin(dLon/2) * Math.sin(dLon/2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	var d = R * c;
	
	if (d>1) 
	{
		return Math.round(d);
	}
	// else if (d<=1) return Math.round(d*1000);
	else
	{
		return d;
	}
}
