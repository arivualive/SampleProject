tm1 = setTimeout("wn = window.open('/alerttime.html','timeout','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=no,width=500,height=300,alwaysRaised=yes')", 2400000);

tm2 = setTimeout("wn.close(); self.window.location.replace('/timeout.html')", 3600000);



function resetTimer() {
	clearTimeout(tm1)
	clearTimeout(tm2)
	tm1 = setTimeout("wn = window.open('/alerttime.html','timeout','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=no,width=500,height=300,alwaysRaised=yes')", 2400000);
	tm2 = setTimeout("wn.close(); self.window.location.replace('/timeout.html')", 3600000);



	}
