if (document.images) {
	img1on = new Image();
	img1on.src = "common/head_btn01on.gif";
	img1off = new Image();
	img1off.src = "common/head_btn01.gif";
	img2on = new Image();
	img2on.src = "common/head_btn02on.gif";
	img2off = new Image();
	img2off.src = "common/head_btn02.gif";
	img3on = new Image();
	img3on.src = "common/head_btn03on.gif";
	img3off = new Image();
	img3off.src = "common/head_btn03.gif";
	img4on = new Image();
	img4on.src = "common/head_btn04on.gif";
	img4off = new Image();
	img4off.src = "common/head_btn04.gif";
	img5on = new Image();
	img5on.src = "common/head_btn05on.gif";
	img5off = new Image();
	img5off.src = "common/head_btn05.gif";

	img101on = new Image();
	img101on.src = "image/index_btn01on.gif";
	img101off = new Image();
	img101off.src = "image/index_btn01.gif";
	img102on = new Image();
	img102on.src = "image/index_btn01on.gif";
	img102off = new Image();
	img102off.src = "image/index_btn01.gif";
	img103on = new Image();
	img103on.src = "image/index_btn01on.gif";
	img103off = new Image();
	img103off.src = "image/index_btn01.gif";
	img104on = new Image();
	img104on.src = "image/index_btn05on.gif";
	img104off = new Image();
	img104off.src = "image/index_btn05.gif";
	img105on = new Image();
	img105on.src = "image/index_btn02on.gif";
	img105off = new Image();
	img105off.src = "image/index_btn02.gif";
	img106on = new Image();
	img106on.src = "image/index_btn02on.gif";
	img106off = new Image();
	img106off.src = "image/index_btn02.gif";
	img107on = new Image();
	img107on.src = "image/index_btn06on.gif";
	img107off = new Image();
	img107off.src = "image/index_btn06.gif";
}
function imgOn(imgName) {
	if (document.images) {
		document[imgName].src=eval(imgName+"on.src");
	}
}
function imgOff(imgName) {
	if (document.images) {
		document[imgName].src=eval(imgName+"off.src");
	}
}


function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

