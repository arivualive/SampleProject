/*--------------------------------------------------------
 * fncQkbnChange
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I�������l�������đJ��
 * ���@���F
 * �߂�l�F
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



// ���̓`�F�b�N 
function InputChk() {
	with (document.answer_serch){

/*
		if(fncGetLength(kainno.value) > 8){
				fncAlert("���q�l�ԍ��͔��p8�����ȓ��œ��͂��Ă�������",kainno);
				return false;
		}

		
		if( (!fncJudgeHankaku(kainno.value))  && (fncTrim(kainno.value) != "") ){
			fncAlert("���q�l�ԍ��͔��p�p�����œ��͂��Ă�������",kainno);
			return false;
		}	
		


		if(fncGetLength(kain_nm.value) > 18){
				fncAlert("�����O�͑S�p9�����ȓ��œ��͂��Ă�������",kain_nm);
				return false;
		}

		if(fncGetLength(hndl_nm.value) > 15){
				fncAlert("�n���h���l�[���͑S�p15�����ȓ��œ��͂��Ă�������",hndl_nm);
				return false;
		}


		
		if ( (fncChkDateTime(toko_from.value) == false) && (fncTrim(toko_from.value) != "") ) {
			fncAlert("���e��(FROM)�𐳂������͂��Ă�������",toko_from);
			return false;
		}
		
		if ((fncChkDateTime(toko_to.value) == false) && (fncTrim(toko_to.value) != "") ) {
			fncAlert("���e��(TO)�𐳂������͂��Ă�������",toko_to);
			return false;
		}
*/
	}


  document.answer_serch.mode.value  = "find";
  document.answer_serch.submit();
}

//�X�V���̓��̓`�F�b�N
function UpdateInputChk() {
	with (document.form_inp){



		if (fncTrim(HNDL_NAME.value) == "") {
			fncAlert("�����O����͂��Ă�������",HNDL_NAME);
			return false;
		}else{
    		if(fncGetLength(HNDL_NAME.value) > 30){
    				fncAlert("�����O�͑S�p15�����ȓ��œ��͂��Ă�������",HNDL_NAME);
    				return false;
    		}
        }
		if (fncTrim(ANSWER.value) == "") {
			fncAlert("�񓚂���͂��Ă�������",ANSWER);
			return false;
		}
		
		if(fncGetLength(ANSWER.value) > 4000){
				fncAlert("�񓚂͑S�p2000�����ȓ��œ��͂��Ă�������",ANSWER);
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

		//�[�N�Ή�
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