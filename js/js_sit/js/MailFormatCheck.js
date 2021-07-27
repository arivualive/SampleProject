function MailFormatCheck(chkStr) {

	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,3}|\d+)$/i

	var returnval=emailfilter.test(chkStr);

	if(returnval==false){

		if(chkStr.length>1){
			if(chkStr.charAt(chkStr.length-1)=="."){

				var returnval=emailfilter.test(chkStr.substring(0,chkStr.length-1));

			}
			else if(chkStr.indexOf(".@",0)!=-1){
				return false;
			}

		}
	}else{
		if(chkStr.length>1){
			if(chkStr.indexOf(".@",0)!=-1){
				return false;
			}
		}
	}



	return returnval;
}

