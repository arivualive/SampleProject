/*--------------------------------------------------------
 * fncQkbnChange
 * 概　要：セレクトボックス選択時選択した値を持って遷移
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function fncQkbnChange(sw){
//  document.answer_serch.q_kbn.selectedIndex;
  document.answer_serch.mode.value  = "qtype_serch";
  //document.answer_serch.mode.value  = "find";



  
//	var faq_view = document.qtype_serch.faq_view.selectedIndex;
//	url = url + '?q_kbn=' + q_kbn + '&mode=' + mode;


    if(sw==0){
        if(document.answer_serch.q_kbn.selectedIndex==0){
            document.answer_serch.ask_cd.selectedIndex=0;
        }
    }

    if(sw==1){
        document.answer_serch.ask_cd.selectedIndex=0;
    }


	document.answer_serch.submit();
}



// 入力チェック 
function InputChk() {
	with (document.answer_serch){

/*
		if(fncGetLength(kainno.value) > 8){
				fncAlert("お客様番号は半角8文字以内で入力してください",kainno);
				return false;
		}

		
		if( (!fncJudgeHankaku(kainno.value))  && (fncTrim(kainno.value) != "") ){
			fncAlert("お客様番号は半角英数字で入力してください",kainno);
			return false;
		}	
		


		if(fncGetLength(kain_nm.value) > 18){
				fncAlert("お名前は全角9文字以内で入力してください",kain_nm);
				return false;
		}

		if(fncGetLength(hndl_nm.value) > 15){
				fncAlert("ハンドルネームは全角15文字以内で入力してください",hndl_nm);
				return false;
		}


		
		if ( (fncChkDateTime(toko_from.value) == false) && (fncTrim(toko_from.value) != "") ) {
			fncAlert("投稿日(FROM)を正しく入力してください",toko_from);
			return false;
		}
		
		if ((fncChkDateTime(toko_to.value) == false) && (fncTrim(toko_to.value) != "") ) {
			fncAlert("投稿日(TO)を正しく入力してください",toko_to);
			return false;
		}
*/
	}


  document.answer_serch.mode.value  = "find";
  document.answer_serch.submit();
}

//更新時の入力チェック
function UpdateInputChk() {
	with (document.form_inp){



		if (fncTrim(HNDL_NAME.value) == "") {
			fncAlert("お名前を入力してください",HNDL_NAME);
			return false;
		}else{
    		if(fncGetLength(HNDL_NAME.value) > 30){
    				fncAlert("お名前は全角15文字以内で入力してください",HNDL_NAME);
    				return false;
    		}
        }
		if (fncTrim(ANSWER.value) == "") {
			fncAlert("回答を入力してください",ANSWER);
			return false;
		}
		
		if(fncGetLength(ANSWER.value) > 4000){
				fncAlert("回答は全角2000文字以内で入力してください",ANSWER);
				return false;
		}	



		if(!fncEditConfirm()){
			return false;
		}					
	}		
}

	
function fncChkDateTime(hiduke) {

	str= ""+ hiduke;

	if (str=="") {
		return false;
	} else {
		start = str.indexOf('/');
		if (start == -1)
			return false;
		TYEAR = str.substring(0, start);
		
		end = str.indexOf('/', start + 1);
		if (end == -1)
			return false;
		TMNT = str.substring(start + 1, end);
		if (end + 1 >= str.length)
			return false;
		TDAY = str.substring(end + 1);

		if (isNaN(TYEAR)  || isNaN(TMNT)  || isNaN(TDAY) )
		{
			return false;
		}
			
		var monthDays = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
		year = Number(TYEAR);
		mnt = Number(TMNT) -1;

		//閏年対応
		if (mnt==1) {
			if(((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) {
				monthDays[1] = 29
			}
		}

		if ((0>=TDAY) || (TDAY>monthDays[mnt]) || (0>=TMNT) || (TMNT>12)) {
			return false;
		} else return true;
	}
}