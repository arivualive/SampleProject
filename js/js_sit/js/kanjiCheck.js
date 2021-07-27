
	document.write('<script type="text/javascript" src="/js/notInputCharacter.js"></script>');

		function SJisKanjiRegCheck(inDat){
				var CharacterKanji = notInputCharacter();
				if(CharacterKanji.indexOf(inDat)>=0){
					return true;
				}else{
					return false;
				}
		}

		function SJisKanjiCheck(chkStr){
				var i = 0;
				var x = 0;
				var flg = 0;
				var errMsg = "[ �����O ]\n�o�^�ł��Ȃ��������܂܂�Ă��܂��B\n��ϐ\���󂲂����܂��񂪁A�ʂ̕����ł����͂��������B\n[";
				for (i = 0; i < chkStr.length; i ++) {
						var c = chkStr.charAt(i);
						if(SJisKanjiRegCheck(c) == true){
								flg = 1;
								errMsg += " " + c;
						}
						var gaijiTei = chkStr.charCodeAt(i)
						if(gaijiTei == 39606 ){
								flg = 1;
								errMsg += " " + c;
						}
				}
				if(flg==1){
						window.alert(errMsg + " ]");
						return false;
				}
				return true;
		}

	function SJisKanjiCheckAll(chkStr, flgNo){

		var i = 0;
		var x = 0;
		var flg = 0;


        var wkErrMsg = "\n\n�o�^�ł��Ȃ��������܂܂�Ă��܂��B\n��ϐ\���󂲂����܂��񂪁A�ʂ̕����ł����͂��������B\n\n[";

		switch(flgNo){
			case '1':
				errMsg = "[�s�撬���ȍ~�̂��Z��]" + wkErrMsg;
				break;

			case '2':
				errMsg = "[���̂��������@�������Ă�������]" + wkErrMsg;
				break;

			case '3':
				errMsg = "[�����͕q���Ȃق��ł���]" + wkErrMsg;
				break;

			case '4':
				errMsg = "[���̑����s���ȓ_]" + wkErrMsg;
				break;


			case '5':
				errMsg = "[���̑��̗��R�ɂ���]" + wkErrMsg;
				break;
			case '6':
				errMsg = "[�����̏�Ԃɂ���]" + wkErrMsg;
				break;



			case '12':
				errMsg = "���݂́u�ɂ݂ɂ��āv" + wkErrMsg;
				break;

			case '11':
				errMsg = "���݂̒ɂ݂́u��̖��́E�L���v" + wkErrMsg;
				break;

			case '10':
				errMsg = "�ɂ݈ȊO�́u��̖��́E�L���v" + wkErrMsg;
				break;


			case '13':
				errMsg = "�ɂ݈ȊO�́u�f�f���E�Ǐ�v" + wkErrMsg;
				break;

			case '14':
				errMsg = "�A�����M�[�̂���u��̖��́E�L���v" + wkErrMsg;
				break;


			case '20':
				errMsg = "[���x������z���ɂ��Ă̂��v�]]" + wkErrMsg;
				break;

			// ���b�Z�[�W�J�[�h�i�����j
			case '30':
				errMsg = item_name['msg_address_name'] + wkErrMsg;
				break;

			// ���b�Z�[�W�J�[�h�i�{���j
			case '31':
				errMsg = item_name['msg_text'] + wkErrMsg;
				break;

			// ���b�Z�[�W�J�[�h�i���o�l�j
			case '32':
				errMsg = item_name['msg_sender_name'] + wkErrMsg;
				break;

			// �����l��
			case '33':
				errMsg = item_name['namekanji_sei'] + wkErrMsg;
				break;

			// �����l��
			case '34':
				errMsg = item_name['namekanji_mei'] + wkErrMsg;
				break;

			// �����l���i�t���K�i�j
			case '35':
				errMsg = item_name['namekana_sei'] + wkErrMsg;
				break;

			// �����l���i�t���K�i�j
			case '36':
				errMsg = item_name['namekana_mei'] + wkErrMsg;
				break;

			// ����喼�̐�
			case '37':
				errMsg = item_name['gift_sender_name_sei'] + wkErrMsg;
				break;

			// ����喼�̖�
			case '38':
				errMsg = item_name['gift_sender_name_mei'] + wkErrMsg;
				break;

			// ���蕨�ɂ��Ă̂��v�]
			case '39':
				errMsg = item_name['regist_agreement'] + wkErrMsg;
				break;

			// ��L�ȍ~�̏Z��
			case '40':
				errMsg = item_name['adrs_2'] + wkErrMsg;
				break;

			// ��L�ȍ~�̏Z���i�ӂ肪�ȁj
			case '41':
				errMsg = item_name['adrs_2_kana'] + wkErrMsg;
				break;

			//�琬�R�����g
			case '42':
				errMsg = "[������]" + wkErrMsg;
				break;


			default:
				break;
		}

		for (i = 0; i < chkStr.length; i ++) {

			var c = chkStr.charAt(i);
			if(SJisKanjiRegCheck(c) == true){
				flg = 1;
				errMsg += " " + c;

			}
			var gaijiTei = chkStr.charCodeAt(i)
			if(gaijiTei == 39606 ){
				flg = 1;
				errMsg += " " + c;
			}


		}

		if(flg==1){
			window.alert(errMsg + " ]");
			return false;
		}
		return true;
	}

	function spSjisKanjiCheckAll(chkStr, flgNo){

		var i = 0;
		var x = 0;
		var flg = 0;


		var wkErrMsg = "�o�^�ł��Ȃ��������܂܂�Ă��܂��B<br />��ϐ\���󂲂����܂��񂪁A�ʂ̕����ł����͂��������B<br />[";

		switch(flgNo){
			case '1':
				errMsg = "[�s�撬���ȍ~�̂��Z��]" + wkErrMsg;
				break;

			case '2':
				errMsg = "[���̂��������@�������Ă�������]" + wkErrMsg;
				break;

			case '3':
				errMsg = "[�����͕q���Ȃق��ł���]" + wkErrMsg;
				break;

			case '4':
				errMsg = "[���̑����s���ȓ_]" + wkErrMsg;
				break;


			case '5':
				errMsg = "[���̑��̗��R�ɂ���]" + wkErrMsg;
				break;
			case '6':
				errMsg = "[�����̏�Ԃɂ���]" + wkErrMsg;
				break;



			case '12':
				errMsg = "���݂́u�ɂ݂ɂ��āv" + wkErrMsg;
				break;

			case '11':
				errMsg = "���݂̒ɂ݂́u��̖��́E�L���v" + wkErrMsg;
				break;

			case '10':
				errMsg = "�ɂ݈ȊO�́u��̖��́E�L���v" + wkErrMsg;
				break;


			case '13':
				errMsg = "�ɂ݈ȊO�́u�f�f���E�Ǐ�v" + wkErrMsg;
				break;

			case '14':
				errMsg = "�A�����M�[�̂���u��̖��́E�L���v" + wkErrMsg;
				break;


			case '20':
				errMsg = "[���x������z���ɂ��Ă̂��v�]]" + wkErrMsg;
				break;

			// ���b�Z�[�W�J�[�h�i�����j
			case '30':
				errMsg = item_name['msg_address_name'] + wkErrMsg;
				break;

			// ���b�Z�[�W�J�[�h�i�{���j
			case '31':
				errMsg = item_name['msg_text'] + wkErrMsg;
				break;

			// ���b�Z�[�W�J�[�h�i���o�l�j
			case '32':
				errMsg = item_name['msg_sender_name'] + wkErrMsg;
				break;

			// �����l��
			case '33':
				errMsg = item_name['namekanji_sei'] + wkErrMsg;
				break;

			// �����l��
			case '34':
				errMsg = item_name['namekanji_mei'] + wkErrMsg;
				break;

			// �����l���i�t���K�i�j
			case '35':
				errMsg = item_name['namekana_sei'] + wkErrMsg;
				break;

			// �����l���i�t���K�i�j
			case '36':
				errMsg = item_name['namekana_mei'] + wkErrMsg;
				break;

			// ����喼�̐�
			case '37':
				errMsg = item_name['gift_sender_name_sei'] + wkErrMsg;
				break;

			// ����喼�̖�
			case '38':
				errMsg = item_name['gift_sender_name_mei'] + wkErrMsg;
				break;

			// ���蕨�ɂ��Ă̂��v�]
			case '39':
				errMsg = item_name['regist_agreement'] + wkErrMsg;
				break;

			// ��L�ȍ~�̏Z��
			case '40':
				errMsg = item_name['adrs_2'] + wkErrMsg;
				break;

			// ��L�ȍ~�̏Z���i�ӂ肪�ȁj
			case '41':
				errMsg = item_name['adrs_2_kana'] + wkErrMsg;
				break;

			//�琬�R�����g
			case '42':
				errMsg = "[������]" + wkErrMsg;
				break;


			default:
				break;
		}

		for (i = 0; i < chkStr.length; i ++) {

			var c = chkStr.charAt(i);
			if(SJisKanjiRegCheck(c) == true){
				flg = 1;
				errMsg += " " + c;

			}
			var gaijiTei = chkStr.charCodeAt(i)
			if(gaijiTei == 39606 ){
				flg = 1;
				errMsg += " " + c;
			}


		}

		if(flg==1){
			e = errMsg + " ]";
			$("#err"+a.attr("name")).html(e).show();
			return false;
		}
		return true;
	}

