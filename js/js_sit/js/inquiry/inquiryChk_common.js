//***************************************************
//�T�v�F���₢���킹�̓��̓`�F�b�N���s��
//2007/11/1 ver2.00 
//�S���⍇���t�H�[�����ʉ�
//*************************************************

//==================================================
//�ړI	�F���͍��ڃ`�F�b�N
//����	�FObjFrm		:���⍇�����̓t�H�[���I�u�W�F�N�g
//����	�FcheckArray	:�e���ڃ`�F�b�N�����̘A�z�z��
//                       1->�`�F�b�N�s�v
//                       2->�K�{�`�F�b�N����
//                       3->�K�{�`�F�b�N�Ȃ�
//�ߒl	�FerrMsg		:�G���[���b�Z�[�W
//==================================================
function fieldCheck(ObjFrm, checkArray) {
	// �`�F�b�N���K�v���ǂ����̍��ڕʃt���O
	var checkFlg = checkArray ;
	// �G���[�t���O
	var isErr    = false;
	// �\������G���[���b�Z�[�W
	var errMsg   = '';

	var tmp = '';
	
	//��Ж��`�F�b�N
	if( checkFlg['company_nm'] == "2" ){
		if (ObjFrm.company_nm.value == "" || !checkBlank(ObjFrm.company_nm.value)){
			errMsg += "�E��Ж�����͂��Ă��������B\n";
			isErr = true;			
		}else if (bLength(ObjFrm.company_nm.value) > 100){
				errMsg += "�E�������܂����A��Ж��͑S�p�T�O�����ȓ��œ��͂��Ă��������B\n";
				isErr = true;			
		}else if( zenhanCount(ObjFrm.company_nm.value) != 1 ){
			errMsg += "�E��Ж���S�p�̕����œ��͂��Ă��������B\n";
			isErr = true;
		}
	}

	//��Ж��`�F�b�N
	if( checkFlg['company_nm'] == "3" ){
		if (bLength(ObjFrm.company_nm.value) > 100){
			errMsg += "�E�������܂����A��Ж��͑S�p�T�O�����ȓ��œ��͂��Ă��������B\n";
			isErr = true;			
		}else if( ObjFrm.company_nm.value != "" && zenhanCount(ObjFrm.company_nm.value) != 1 ){
			errMsg += "�E��Ж���S�p�̕����œ��͂��Ă��������B\n";
			isErr = true;
		}
	}

	//��E�`�F�b�N
	if( checkFlg['post'] == "2" ){
		if (ObjFrm.post.value == "" || !checkBlank(ObjFrm.post.value)){
			errMsg += "�E��E����͂��Ă��������B\n";
			isErr = true;			
		}else{
			if (bLength(ObjFrm.name_kanji.value) > 100){
				errMsg += "�E�������܂����A��E�͑S�p�T�O�����ȓ��œ��͂��Ă��������B\n";
				isErr = true;			
			}else if(ObjFrm.post.value != "" &&  zenhanCount(ObjFrm.post.value) != 1 ){
				errMsg += "�E��E��S�p�̕����œ��͂��Ă��������B\n";
				isErr = true;
			}

		}
	}

	//��E�`�F�b�N
	if( checkFlg['post'] == "3" ){
		if (bLength(ObjFrm.post.value) > 100){
			errMsg += "�E�������܂����A��E�͑S�p�T�O�����ȓ��œ��͂��Ă��������B\n";
			isErr = true;			
		}else if(ObjFrm.post.value != "" &&  zenhanCount(ObjFrm.post.value) != 1 ){
			errMsg += "�E��E��S�p�̕����œ��͂��Ă��������B\n";
			isErr = true;
		}
	}

	//���₢���킹�̎�ރ`�F�b�N
	if( checkFlg['inquiry_type'] == "2" ){
		if ((ObjFrm.inquiry_type.value == "100") ||
		    (ObjFrm.inquiry_type.value == "200") ||
		    (ObjFrm.inquiry_type.value == "300")){
			errMsg += "�E���₢���킹�̎�ނ�I�����Ă��������B\n";
			isErr = true;
		}
		else if (ObjFrm.inquiry_type.value == ""){
			errMsg += "�E���₢���킹�̎�ނ𐳂����I�����Ă��������B\n";
			isErr = true;
		}
	}

	//���ӌ��E���₢���킹�`�F�b�N
	if( checkFlg['voice'] == "2" ){
		if (!checkBlank(ObjFrm.voice.value)) {
			errMsg += "�E���₢���킹�̓��e����͂��Ă��������B\n";
			isErr = true;
		}
		else if (bLength(ObjFrm.voice.value) > 3800){
			errMsg += "�E���₢���킹�̓��e�͑S�p�P�X�O�O�����ȓ��œ��͂��Ă��������B\n";
			isErr = true;
		}
	}

	//���ӌ��E���₢���킹�`�F�b�N
	if( checkFlg['voice'] == "3" ){
		if (bLength(ObjFrm.voice.value) > 3800){
			errMsg += "�E���₢���킹�͑S�p�P�X�O�O�����ȓ��œ��͂��Ă��������B\n";
			isErr = true;
		}
	}

	//���O�`�F�b�N
	if( checkFlg['name_kanji'] == "2" ){
		if (ObjFrm.name_kanji.value.replace('�@', '').length == 0 || ObjFrm.name_kanji.value.replace(' ', '').length == 0 ||
			!checkBlank(ObjFrm.name_kanji.value)) {
			errMsg += "�E�����O����͂��Ă��������B\n";
			isErr = true;			
		}else if( zenhanCount(ObjFrm.name_kanji.value) != 1 ){
			errMsg += "�E�����O��S�p�̕����œ��͂��Ă��������B\n";
			isErr = true;
		}else{
		  	if (bLength(ObjFrm.name_kanji.value) > 30){
				errMsg += "�E�������܂����A�����O�͑S�p�P�T�����ȓ��œ��͂��Ă��������B\n";
				isErr = true;			
			}
		}
	}

	//���O�`�F�b�N
	if( checkFlg['name_kanji'] == "3" ){
		  	if (bLength(ObjFrm.name_kanji.value) > 30){
				errMsg += "�E�������܂����A�����O�͑S�p�P�T�����ȓ��œ��͂��Ă��������B\n";
			isErr = true;
		}else if( zenhanCount(ObjFrm.name_kanji.value) != 1 ){
			errMsg += "�E�����O��S�p�̕����œ��͂��Ă��������B\n";
			isErr = true;
		}
	}


	//�ӂ肪�ȃ`�F�b�N
	if( checkFlg['name_kana'] == "2" ){
		if (ObjFrm.name_kana.value.replace('�@', '').length == 0 || ObjFrm.name_kana.value.replace(' ', '').length == 0 ||
			!checkBlank(ObjFrm.name_kana.value)) {
			errMsg += "�E�ӂ肪�Ȃ���͂��Ă��������B\n";
			isErr = true;
	  	}else if(bLength(ObjFrm.name_kana.value) > 60){
				errMsg += "�E�������܂����A�ӂ肪�Ȃ͑S�p�R�O�����ȓ��œ��͂��Ă��������B\n";
				isErr = true;
		}else{
			if( ObjFrm.name_kana.value.match( /[^��-��[�@]+/ ) ) {
				errMsg += "�E�ӂ肪�Ȃ͑S�p���Ȃœ��͂��Ă��������B\n";
				isErr = true;
			}
		}
	}

	//�ӂ肪�ȃ`�F�b�N
	if( checkFlg['name_kana'] == "3" ){
	  if (bLength(ObjFrm.name_kana.value) > 60){
			errMsg += "�E�������܂����A�ӂ肪�Ȃ͑S�p�R�O�����ȓ��œ��͂��Ă��������B\n";
			isErr = true;			
		}else{
			if( ObjFrm.name_kana.value.match( /[^��-��[�@]+/ ) ) {
				errMsg += "�E�ӂ肪�Ȃ͑S�p���Ȃœ��͂��Ă�������\n";
				isErr = true;
			}
		}
	}

	//�d�b�ԍ��`�F�b�N
	if( checkFlg['tel_no'] == "2" ){
		if( typeof(ObjFrm.tel_no) == 'undefined' ){
			var TLPNNO_1 = ObjFrm.tel_no1.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_2 = ObjFrm.tel_no2.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_3 = ObjFrm.tel_no3.value.replace(/^\s+|\s+$/g, "");
			TellNumber = (TLPNNO_1 + TLPNNO_2 + TLPNNO_3);

			if (TLPNNO_1 =="" || TLPNNO_2 =="" || TLPNNO_3 =="" || 
				!checkBlank(TLPNNO_1) || !checkBlank(TLPNNO_2) || !checkBlank(TLPNNO_3) ) {
				errMsg += '�E�d�b�ԍ�����͂��Ă��������B\n';
				isErr = true;
			}else{
				if(zenhanCount(TLPNNO_1) != 5 || zenhanCount(TLPNNO_2) != 5 || zenhanCount(TLPNNO_3) != 5){
					errMsg += '�E�d�b�ԍ��𐳂��������œ��͂��Ă��������B\n';
					isErr = true;
				}
				else if(TLPNNO_1.length<2){
					errMsg += '�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n';
					isErr = true;
				}
				else if(TLPNNO_1.substring(0,1)!="0"){
					errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_1.substring(1,2)=="0"){
					errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_1=="0120" || TLPNNO_1=="0800" || TLPNNO_1=="0990" || TLPNNO_1=="0180" || TLPNNO_1=="0570" || TLPNNO_1=="0170"){
					errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_3.length!=4){
					errMsg += "�E�d�b�ԍ��𐳂��������œ��͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_1.length==2 && TLPNNO_2.length!=4){
					errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_1.length==3){
					if(TLPNNO_1=="010" || TLPNNO_1=="020" || TLPNNO_1=="030" || TLPNNO_1=="040"){
						errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
						isErr = true;
					}
					else if(TLPNNO_1=="050" || TLPNNO_1=="060" || TLPNNO_1=="070" || TLPNNO_1=="080" || TLPNNO_1=="090"){
						if(TLPNNO_2.length!=4){
							errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
							isErr = true;
						}
					else if(TLPNNO_3.length!=4){
							errMsg += "�E�d�b�ԍ��𐳂������͂��Ă��������B\n";
							isErr = true;
						}
					}
					else if(TLPNNO_2.length!=3){
						errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
						isErr = true;
					}
				}
				else if(TLPNNO_1.length==4){
					if(TLPNNO_2.length!=2){
						errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
						isErr = true;
					}
				}
				else if(TLPNNO_1.length==5 && TLPNNO_2.length!=1){
					errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_2.length==0){
					errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_1.length==6 && TLPNNO_2.length!=0){
					errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
					isErr = true;
				}
				else if(TellNumber.length>11){
					errMsg += "�E�s�O�ǔ�-�s���ǔ�-�d�b�ԍ����������܂��B���������͂��Ă��������B\n";
					isErr = true;
				}
			}
		}else{
			var TellNumber = ObjFrm.tel_no.value.replace(/^\s+|\s+$/g, "");
			if(TellNumber.length>13){
				errMsg += "�E�d�b�ԍ����������܂��B���������͂��Ă��������B\n";
				isErr = true;
			}
		}
	}

	//�d�b�ԍ��`�F�b�N
	if( checkFlg['tel_no'] == "3" ){
		if( typeof(ObjFrm.tel_no) == 'undefined' ){
			var TLPNNO_1 = ObjFrm.tel_no1.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_2 = ObjFrm.tel_no2.value.replace(/^\s+|\s+$/g, "");
			var TLPNNO_3 = ObjFrm.tel_no3.value.replace(/^\s+|\s+$/g, "");
			TellNumber = (TLPNNO_1 + TLPNNO_2 + TLPNNO_3);
		
			if(zenhanCount(TLPNNO_1) != 5 || zenhanCount(TLPNNO_2) != 5 || zenhanCount(TLPNNO_3) != 5){
				errMsg += '�E�d�b�ԍ��𐳂��������œ��͂��Ă��������B\n';
				isErr = true;
			}
			if(TLPNNO_1.length<2){
				errMsg += '�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n';
				isErr = true;
			}
			else if(TLPNNO_1.substring(0,1)!="0"){
				errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
				isErr = true;
			}
			else if(TLPNNO_1.substring(1,2)=="0"){
				errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
				isErr = true;
			}
			else if(TLPNNO_1=="0120" || TLPNNO_1=="0800" || TLPNNO_1=="0990" || TLPNNO_1=="0180" || TLPNNO_1=="0570" || TLPNNO_1=="0170"){
				errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
				isErr = true;
			}
			if(TLPNNO_3.length!=4){
				errMsg += "�E�d�b�ԍ��𐳂��������œ��͂��Ă��������B\n";
				isErr = true;
			}
			if(TLPNNO_1.length==2 && TLPNNO_2.length!=4){
				errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
				isErr = true;
			}
			if(TLPNNO_1.length==3){
				if(TLPNNO_1=="010" || TLPNNO_1=="020" || TLPNNO_1=="030" || TLPNNO_1=="040"){
					errMsg += "�E�s�O�ǔԂ𐳂��������œ��͂��Ă��������B\n";
					isErr = true;
				}
				else if(TLPNNO_1=="050" || TLPNNO_1=="060" || TLPNNO_1=="070" || TLPNNO_1=="080" || TLPNNO_1=="090"){
					if(TLPNNO_2.length!=4){
						errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
						isErr = true;
					}
				else if(TLPNNO_3.length!=4){
						errMsg += "�E�d�b�ԍ��𐳂������͂��Ă��������B\n";
						isErr = true;
					}
				}
				else if(TLPNNO_2.length!=3){
					errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
					isErr = true;
				}
			}
			else if(TLPNNO_1.length==4){
				if(TLPNNO_2.length!=2){
					errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
					isErr = true;
				}
			}
			else if(TLPNNO_1.length==5 && TLPNNO_2.length!=1){
				errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
				isErr = true;
			}
			else if(TLPNNO_2.length==0){
				errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
				isErr = true;
			}
			else if(TLPNNO_1.length==6 && TLPNNO_2.length!=0){
				errMsg += "�E�s�O�ǔԁA�s���ǔԂ𐳂������͂��Ă��������B\n";
				isErr = true;
			}
			else if(TellNumber.length>11){
				errMsg += "�E�s�O�ǔ�-�s���ǔ�-�d�b�ԍ����������܂��B���������͂��Ă��������B\n";
				isErr = true;
			}
		}else{
			var TellNumber = ObjFrm.tel_no.value.replace(/^\s+|\s+$/g, "");
			if(TellNumber.length>13){
				errMsg += "�E�d�b�ԍ����������܂��B���������͂��Ă��������B\n";
				isErr = true;
			}
		}
	}

	//���[���A�h���X�`�F�b�N
	if( checkFlg['email'] == "2" ){
		if (ObjFrm.email.value == '' || !checkBlank(ObjFrm.email.value)) {
			errMsg += "�E���[���A�h���X����͂��Ă��������B\n";
			isErr = true;
		}else if(ObjFrm.email.value.length < 6 || ObjFrm.email.value.length > 100 || emailCheck(ObjFrm.email.value) == false) {
				errMsg += "�E���[���A�h���X�𐳂������͂��Ă�������\n";
				isErr = true;
		}
	}

	//���[���A�h���X�`�F�b�N
	if( checkFlg['email'] == "3" ){
		if(ObjFrm.email.value.length < 6 || ObjFrm.email.value.length > 100 || emailCheck(ObjFrm.email.value) == false) {
				errMsg += "�E���[���A�h���X�𐳂������͂��Ă�������\n";
				isErr = true;
		}
	}

	//���[���A�h���X�`�F�b�N
	if( typeof(ObjFrm.email2) != 'undefined'){
		if(ObjFrm.email.value != ObjFrm.email2.value){
			errMsg += "�E���[���A�h���X�Ɗm�F�p���[���A�h���X���قȂ�܂��B\n";
			isErr = true;
		}
	}

	//�Z���`�F�b�N
	if( checkFlg['address'] == "2" ){
		if (bLength(ObjFrm.address.value)== 0 || !checkBlank(ObjFrm.address.value)){
			errMsg += "�E�Z������͂��Ă��������B\n";
			isErr = true;
		}else{
			if (bLength(ObjFrm.address.value) > 256){
				errMsg += "�E�������܂����A�Z���͑S�p�P�Q�W�����ȓ��œ��͂��Ă��������B\n";
				isErr = true;
			}
		}
	}

	//�Z���`�F�b�N
	if( checkFlg['address'] == "3" ){
		if (bLength(ObjFrm.address.value) > 256){
			errMsg += "�E�������܂����A�Z���͑S�p�P�Q�W�����ȓ��œ��͂��Ă��������B\n";
			isErr = true;
		}
	}

	//�ԐM��]�`�F�b�N
	if (checkFlg['answer_flg'] == "2") {
		if ((ObjFrm.answer_flg[0].checked == false) && (ObjFrm.answer_flg[1].checked == false)) {
			errMsg += "�E�ԐM��]�̗L�������I�����������B\n";
			isErr = true;
		}else{
			if ( (ObjFrm.answer_flg[0].value != "0") && (ObjFrm.answer_flg[0].value != "1") &&
				 (ObjFrm.answer_flg[1].value != "0") && (ObjFrm.answer_flg[1].value != "1") ) {
				errMsg += "�E�ԐM��]�̗L���𐳂������I�����������B\n";
				isErr = true;
			}
		}
	}

	// �ԐM��]�`�F�b�N
	if (checkFlg['answer_flg'] == "3") {
		if ( (ObjFrm.answer_flg[0].value != "0") && (ObjFrm.answer_flg[0].value != "1") &&
			 (ObjFrm.answer_flg[1].value != "0") && (ObjFrm.answer_flg[1].value != "1") ) {
			errMsg += "�E�ԐM��]�̗L���𐳂������I�����������B\n";
			isErr = true;
		}
	}

	if(isErr){
		return errMsg;
	}else{
		if( checkFlg['email'] != "1" ){

			if(ObjFrm.email.value.match(/\.exe/)){
				errMsg += "����L����L�����A�����镶����i���[���A�h���X�j�ł͂��\�����݂��������܂���B\n";
				errMsg += "�������܂����A���̕��������͂����������t���[�_�C�����������̓t�@�N�X�ɂĂ��\�����݂��������܂��悤���肢�������܂��B\n\n";
				errMsg += "(���͂ł��Ȃ�������)\n�@�@�E�@%    (�p�[�Z���g)\n�@�@�E�@,     (�J���})\n�@�@�E�@.exe(�h�b�g�G�O�[)\n\n";
				errMsg += "�t���[�_�C�����@0120-444-444�@(8:00�`22:00�@�N�����x)\n";
				errMsg += "�t�@�N�X�@�@�@�@�@0120-444-104�@(24����)\n";
				return errMsg;
			}
		}
		return '';
	}
}


/**
* �o�C�g�����`�F�b�N���܂��B
* 
* @param �`�F�b�N����l
* @return �o�C�g��
*/
function bLength(strLine) {

    var ix_str,strcnt=0;
    for(ix_str=0;ix_str<strLine.length;ix_str++){
        if(escape(strLine.charAt(ix_str)).length >= 4 ){
        	strcnt+=2;
        }else{
        	strcnt++;
        }
    }
    return strcnt;

} 

//==================================================
//�ړI	�F�S�p/���p�`�F�b�N
//����	�FchkStr	:�`�F�b�N���镶����
//�ߒl	�F0:���p�̂� 1:�S�p�̂� 3:�S������ 4:�R���g���[���R�[�h���� 5:�����̂� 6:�A���t�@�x�b�g�̂� 7:���p�p���̂� 8:���p�J�i����
//==================================================
function zenhanCount(chkStr) {

	// ������J�E���^
	var numCnt;
	var alpCnt;
	var hanCnt;
	var kanaCnt;
	var zenCnt;
	var ctlCnt;
	var tmpStr;

	numCnt = 0;
	alpCnt = 0;
	hanCnt = 0;
	kanaCnt = 0;
	zenCnt = 0;
	ctlCnt = 0;
	tmpStr = '';

	if (escape('��').charAt(1) == 'u') {
		for (i = 0; i < chkStr.length; i ++) {
			tmpStr = escape(chkStr.charAt(i))
			if (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'u') {
				if (chkStr.charAt(i) >= '�' && chkStr.charAt(i) <= '�') { kanaCnt ++ }
				else { zenCnt ++ }
				}
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
			else { ctlCnt ++ }
			}
		}
	else {
		for (i = 0; i < chkStr.length; i ++) {
			tmpStr = escape(chkStr.charAt(i))
			if ((tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '8') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == '9') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'E') || (tmpStr.charAt(0) == '%' && tmpStr.charAt(1) == 'F')) {
				zenCnt ++
				}
			else if (chkStr.charAt(i) >= '�' && chkStr.charAt(i) <= '�') { kanaCnt ++ }
			else if (chkStr.charAt(i) >= ' ' && chkStr.charAt(i) <= '/') { hanCnt ++ }
			else if (chkStr.charAt(i) >= '0' && chkStr.charAt(i) <= '9') { numCnt ++ }
			else if (chkStr.charAt(i) >= ':' && chkStr.charAt(i) <= '@') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'A' && chkStr.charAt(i) <= 'Z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '[' && chkStr.charAt(i) <= '`') { hanCnt ++ }
			else if (chkStr.charAt(i) >= 'a' && chkStr.charAt(i) <= 'z') { alpCnt ++ }
			else if (chkStr.charAt(i) >= '{' && chkStr.charAt(i) <= '~') { hanCnt ++ }
			else { ctlCnt ++ }
			}
		}

	// 0:���p�̂� 1:�S�p�̂� 3:�S������ 4:�R���g���[���R�[�h���� 5:�����̂� 6:�A���t�@�x�b�g�̂� 7:���p�p���̂� 8:���p�J�i����
	hanCnt = hanCnt + numCnt + alpCnt;
	if (kanaCnt > 0) { return 8 }
	else if (ctlCnt > 0) { return 4 }
	else if (hanCnt == 0 && zenCnt > 0) { return 1 }
	else if (hanCnt > 0 && zenCnt > 0) { return 3 }
	else if (numCnt > 0 && hanCnt == numCnt) { return 5 }
	else if (alpCnt > 0 && hanCnt == alpCnt) { return 6 }
	else if ((alpCnt > 0 && numCnt >0) && alpCnt + numCnt == hanCnt) { return 7 }
	else if (hanCnt > 0) { return 0 }
}

//==================================================
//�ړI	�F���[���A�h���X�`�F�b�N
//����	�FchkStr	:�`�F�b�N���镶����
//�ߒl	�FemailCheck True=OK	False=NG
//==================================================
function emailCheck(chkStr) {

	if (chkStr.charAt(0) == '@') { return false; }

	// ��R-#3742
	// mail address �̃`�F�b�N
	var emailfilter=/^[\.\w-]+[\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,3}|\d+)$/i

	var returnval=emailfilter.test(chkStr);

	if(returnval==false){

		if(chkStr.length>1){
			if(chkStr.charAt(chkStr.length-1)=="."){
				var returnval=emailfilter.test(chkStr.substring(0,chkStr.length-1));
			}
		}
	}
	return returnval;
}

//==================================================
//�ړI	�F�󔒕����������ǂ������`�F�b�N����
//����	�FchkStr	:�`�F�b�N���镶����
//�ߒl	�F�󔒈ȊO�������Ă�:true �󔒕��������Ȃ�:false
//==================================================
function checkBlank(chkStr) {

	var str = "";
	str = chkStr.replace(/^[\s�@]+|[\s�@]+$/g, "");
	if(str.length<1){
		return false;
	}
	return true;
}
