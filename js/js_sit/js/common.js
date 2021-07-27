
function JsPreImg(){
	var JsPreLoad = new Array();
	for( var JsRoop = 0; JsRoop < JsPreLoadList.length; JsRoop ++ ){
		JsPreLoad[ JsRoop ] = new Image();
		JsPreLoad[ JsRoop ].src = JsPreLoadList[ JsRoop ];
	}
}

var JsPreLoadList = new Array
	(
/*
	jsdir + "0000000",
*/
	jsdir + "common/image/spacer.gif"
	);
JsPreImg();


var MacIe = navigator.userAgent.indexOf( "Mac" ) > -1 &&  navigator.userAgent.indexOf( "MSIE" ) > -1;
var JsWin;

function commonpop( JsUrl, JsWinName, JSWidth, JSHeight ){
	JSWidth = parseInt( JSWidth );
	JSHeight = parseInt( JSHeight );
	if( !MacIe ){ JSWidth = JSWidth + 17; }
	if( MacIe ){ JSWidth = JSWidth - 1 ; }
	JsProperty = "toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=" + JSWidth + ",height=" + JSHeight;
	JsWin = window.open( JsUrl, JsWinName, JsProperty );
	if( MacIe ){ return; }
	JsWin.focus();
}

function commonpop2( JsUrl, JsWinName, JSWidth, JSHeight ){
	JSWidth = parseInt( JSWidth );
	JSHeight = parseInt( JSHeight );
	JsProperty = "toolbar=0,location=1,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=" + JSWidth + ",height=" + JSHeight;
	JsWin = window.open( JsUrl, JsWinName, JsProperty );
	if( MacIe ){ return; }
	JsWin.focus();
}
