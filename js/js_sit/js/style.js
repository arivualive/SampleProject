//___________________________________________________________���� [ read CSS ]
document.write ( '<link rel="stylesheet" type="text/css" href="' + jsdir + 'common/css/common.css">' );
document.write ( '<link rel="stylesheet" type="text/css" href="' + jsdir + 'common/css/' + ( bIsWin ? "win" : "mac" ) + "_" + ( bIsIE ? "ie" :( bIsSafari ? "safari" :( bIsW3CDOM ? "nn6" : "nn4" ) ) ) + '.css">' );

//___________________________________________________________���� [ resize for NN4 ]

if( document.layers ){
	origWidth = innerWidth;
	origHeight = innerHeight;
	document.captureEvents( Event.RESIZE );
	onresize=redo
}

function redo(){
	if( innerWidth != origWidth || innerHeight != origHeight ){
	location.reload();
	}
}

