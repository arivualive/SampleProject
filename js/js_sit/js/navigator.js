var bIsWin = (navigator.appVersion.indexOf ("Win") != -1);
var bIsMac = (navigator.appVersion.indexOf ("Mac") != -1);
var bIsSafari = (navigator.appVersion.indexOf ("Safari") != -1);
var bIsIE = (navigator.appName.indexOf ("Explorer") != -1);
var bIsNS = (navigator.appName.indexOf ("Netscape") != -1);
var bIsWinIE = (bIsWin && bIsIE);
var bIsWinNS = (bIsWin && bIsNS);
var bIsMacIE = (bIsMac && bIsIE);
var bIsMacNS = (bIsMac && bIsNS);
var bIsW3CDOM = document.getElementById ? true : false;
var bIsMSDOM = document.all ? true : false;
var bIsNCDOM = document.layers ? true : false;
var bIsDOM = (bIsW3CDOM || bIsMSDOM || bIsNCDOM);
