
function PWFormatCheck(chkStr) {

	var datafilter=/^[0-9a-zA-Z]{6,12}$/;

	var returnval=datafilter.test(chkStr);

	if(returnval==false){
		if(chkStr.length>1){
			if(chkStr.charAt(chkStr.length-1)=="."){
				var returnval = datafilter.test(chkStr.substring(0,chkStr.length-1));
			}
		}
	}

	if(returnval==true){
		if(AlphabetCheck(chkStr)==true){
			returnval=false;
		}else{
			if(NCheck(chkStr)==true && ACheck(chkStr)==true){
			}else{
				returnval=false;
			}
		}
	}

	return returnval;
}

function PWFormatCheck2(chkStr) {

	var datafilter=/[^0-9a-zA-Z]{1,12}/i;
	var returnval=datafilter.test(chkStr);

	return returnval;
}


function AlphabetCheck(chkStr){
	var datafilter=/[^0-9a-zA-Z]+/;
	var returnval=datafilter.test(chkStr);
	return returnval;
}

function NCheck(chkStr){
	var datafilter=/[^0-9]+/;
	var returnval=datafilter.test(chkStr);
	return returnval;
}
function ACheck(chkStr){
	var datafilter=/[^a-zA-Z]+/;
	var returnval=datafilter.test(chkStr);
	return returnval;
}

function NumberCheck(chkStr) {

	var datafilter=/[^0-9]/i;
	var returnval=datafilter.test(chkStr);
	return returnval;
}


function checkIsHankakuKana(motoText){
	txt = "±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏĞÑÒÓÔÕÖ×ØÙÚÛÜ¦İ§¨©ª«¬­®¯°¤¡¢£Şß!#$%&'=~|`";
	for (i=0; i<motoText.length; i++)
	{
		if (txt.indexOf(motoText.charAt(i),0) >= 0) {
			return true;
		}
		else{
			return false;
		}
	}
}


function mb_LTrim(strArg) {
	var strRet = strArg;

	while (strRet.substring(0,1) == " " || strRet.substring(0,1) == "@") {
		strRet = strRet.substring(1, strRet.length);
	}
	return strRet;
}


function mb_RTrim(strArg) {
	var strRet = strArg;
	var lLen = strArg.length;

	while (strRet.substring(lLen-1, lLen) == " " || strRet.substring(lLen-1, lLen) == "@") {
		strRet = strRet.substring(0, strRet.length - 1);
		lLen--;
	}
	return strRet;
}


function trim(strArg) {
	var strRet = strArg;

	strRet = mb_LTrim(strRet);
	strRet = mb_RTrim(strRet);

	return strRet;
}


function checkIsZenkaku(value) {
	for (var i = 0; i < value.length; ++i) {
		var c = value.charCodeAt(i);

		if (c < 256 || (c >= 0xff61 && c <= 0xff9f)) {
			return false;
		}
	}
	return true;
}

