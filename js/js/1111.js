<?php
	//��R-#14022_�@��ˑ������̃��[�����������Ή� 2014/04/16 uls-soga
	require_once $ROOT_PATH.'/js/mail_common.js';
	//��R-#14022_�@��ˑ������̃��[�����������Ή� 2014/04/16 uls-soga
?>

function submitForm() {
    document.form_inp.button.disabled=true;
    document.form_inp.submit();
    return false;
}

function setMailAddress(value, flg, mail){
	if(value == 1){
		type = "�iPC�j";
	}else if(value == 2){
		type = "�i�g�сj";
	}
	if(flg == 0){
		mail = "���[���s��"+type+"�̂��q�l�ł�";
	}
	document.mail.mlTo.value = 	mail;
}
function MailConfirmActionForMobile() {
    with (document.mail) {
        if (fncTrim(KAINNO.value) == '') {
            fncAlert('����ԍ�����͂��Ă�������', KAINNO);
            return false;
        }
        if (fncGetLength(KAINNO.value) > 8) {
            fncAlert('����ԍ���8�o�C�g�ȓ��œ��͂��Ă�������', KAINNO);
            return false;
        }
        if (fncJudgeNumber(KAINNO.value) == false) {
            fncAlert('����ԍ��͐����œ��͂��Ă�������', KAINNO);
            return false;
        }
        if (fncTrim(mlTo.value) == '') {
            fncAlert('���[���A�h���X����͂��Ă�������', mlTo);
            return false;
        }
        if (fncGetLength(mlTo.value) > 100) {
            fncAlert('���[���A�h���X��100�o�C�g�ȓ��œ��͂��Ă�������', mlTo);
            return false;
        }
        if (emailCheck(mlTo.value) == false) {
            fncAlert('���[���A�h���X�𐳂������͂��Ă�������', mlTo);
            return false;
        }
        if (fncTrim(mlSubject.value) == '') {
            fncAlert('�薼����͂��Ă�������', mlSubject);
            return false;
        }
        if (myCheckHankakuKana(mlSubject, '�薼') == false)
            return false;
        if (fncGetLength(mlSubject.value) > 30) {
            fncAlert('�薼�͑S�p15�����ȓ��œ��͂��Ă�������', mlSubject);
            return false;
        }
        if (fncTrim(mlBody.value) == '') {
            fncAlert('�{������͂��Ă�������', mlBody);
            return false;
        }
        if (myCheckHankakuKana(mlBody, '�{��') == false)
            return false;
        if (myCheckHankakuKana(mlSignature, '�V�O�l�`��') == false)
            return false;
        if (site_kbn[1].checked) {
            if (fncGetLength(mlBody.value + mlSignature.value) > 3000) {
                fncAlert('�{���͑S�p1500�����ȓ��œ��͂��Ă�������', mlBody);
                return false;
            }
        }


        if( typeof(TEIKEIFLG)=='object' ){
            if(TEIKEIFLG.length){
                var i;
                var teikeiflg_cnt;
                teikeiflg_cnt=0;
                for(i=0; i<TEIKEIFLG.length;i++){
                    if(TEIKEIFLG[i].checked){
                        teikeiflg_cnt++;
                    }
                }
                if(teikeiflg_cnt==0){
                    alert('�Ή��t���O��I�����Ă�������');
                    return false;
                }
            }
        }


        if( typeof(OSUSUME_1)=='object' ){
            disp_err_msg = "�{���Ɂu�����ߏ��v����͂��Ă��������B\n";
            set3_flg=0;
            set4_flg=0;
            err_msg="";
            err_msg3="";
            err_msg4="";

            if(OSUSUME_1.checked && OSUSUME_2.checked && OSUSUME_3.checked){
                set3_flg=1;
            }
            if(OSUSUME_4.checked && OSUSUME_5.checked && OSUSUME_6.checked && OSUSUME_7.checked){
                set4_flg=1;
            }

            ret_set3=true;
            ret_set4=true;
            ret1=true;
            ret2=true;
            ret3=true;
            ret4=true;
            ret5=true;
            ret6=true;
            ret7=true;

			/* �� 2011-04-04 EC-One Soga ����3�_�E��{4�_�̃`�F�b�N�d�l�̎d�l�ԈႢ�Ή� */
            //if(set3_flg==1){
            //��2011/09/05 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yamashita�j
//            ret_set3 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_1,3);
            //��2011/09/05 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yamashita�j
            //}
            //if(set4_flg==1){
            ret_set4 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_4,4);
            //}
			/* �� 2011-04-04 EC-One Soga ����3�_�E��{4�_�̃`�F�b�N�d�l�̎d�l�ԈႢ�Ή� */
            if(OSUSUME_1.checked){
                ret1 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_1);
            }
            if(OSUSUME_2.checked){
                ret2 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_2);
            }
            if(OSUSUME_3.checked){
                ret3 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_3);
            }
            if(OSUSUME_4.checked){
                ret4 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_4);
            }
            if(OSUSUME_5.checked){
                ret5 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_5);
            }
            if(OSUSUME_6.checked){
                ret6 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_6);
            }
            if(OSUSUME_7.checked){
                ret7 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_7);
            }

			/* �� 2011-04-04 EC-One Soga ����3�_�E��{4�_�̃`�F�b�N�d�l�̎d�l�ԈႢ�Ή� */
			/*
            if(set3_flg==1){
                if(ret_set3==false && (ret1==false || ret2==false || ret3==false) ){
                    err_msg3 += "\n�E" + OSUSUME_SET3_KEYWORD[0];
                    if(ret1==false){
                        err_msg3 += "\n�E" + OSUSUME_1_KEYWORD[0];
                    }
                    if(ret2==false){
                        err_msg3 += "\n�E" + OSUSUME_2_KEYWORD[0];
                    }
                    if(ret3==false){
                        err_msg3 += "\n�E" + OSUSUME_3_KEYWORD[0];
                    }
                }
            }else{
            */
            //��2011/09/05 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yamashita�j
//            if((ret_set3 == true && (OSUSUME_1.checked || OSUSUME_2.checked || OSUSUME_3.checked)) || 
//            	(ret1 == true && ret2 == true && ret3 == true)) {
//            } else {
//            	err_msg3 += "\n�E" + OSUSUME_SET3_KEYWORD[0];
                if(ret1==false){
                    err_msg3 += "\n�E" + OSUSUME_1_KEYWORD[0];
                }
                if(ret2==false){
                    err_msg3 += "\n�E" + OSUSUME_2_KEYWORD[0];
                }
                if(ret3==false){
                    err_msg3 += "\n�E" + OSUSUME_3_KEYWORD[0];
                }
//            }
            //��2011/09/05 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yamashita�j

			/*
            if(set4_flg==1){
                if(ret_set4==false && (ret4==false || ret5==false || ret6==false) ){
                    err_msg4 += "\n�E" + OSUSUME_SET4_KEYWORD[0];
                    if(ret4==false){
                        err_msg4 += "\n�E" + OSUSUME_4_KEYWORD[0];
                    }
                    if(ret5==false){
                        err_msg4 += "\n�E" + OSUSUME_5_KEYWORD[0];
                    }
                    if(ret6==false){
                        err_msg4 += "\n�E" + OSUSUME_6_KEYWORD[0];
                    }
                    if(ret7==false){
                        err_msg4 += "\n�E" + OSUSUME_7_KEYWORD[0];
                    }
                }
            }else{
            */
            if(ret_set4 == true && (OSUSUME_4.checked || OSUSUME_5.checked || OSUSUME_6.checked || OSUSUME_7.checked) || 
            	(ret4 == true && ret5 == true && ret6 == true && ret7 == true)) {
            } else {
            	err_msg4 += "\n�E" + OSUSUME_SET4_KEYWORD[0];
                if(ret4==false){
                    err_msg4 += "\n�E" + OSUSUME_4_KEYWORD[0];
                }
                if(ret5==false){
                    err_msg4 += "\n�E" + OSUSUME_5_KEYWORD[0];
                }
                if(ret6==false){
                    err_msg4 += "\n�E" + OSUSUME_6_KEYWORD[0];
                }
                if(ret7==false){
                    err_msg4 += "\n�E" + OSUSUME_7_KEYWORD[0];
                }
            }
			/* �� 2011-04-04 EC-One Soga ����3�_�E��{4�_�̃`�F�b�N�d�l�̎d�l�ԈႢ�Ή� */

            if(OSUSUME_8.checked){
                if(chkRECOMMEND_KEYWORD(mlBody,OSUSUME_8)==false){
                    err_msg += "\n�E" + OSUSUME_8_KEYWORD[0];
                }
            }

            if(OSUSUME_9.checked){
                if(chkRECOMMEND_KEYWORD(mlBody,OSUSUME_9)==false){
                    err_msg += "\n�E" + OSUSUME_9_KEYWORD[0];
                }
            }

            // ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
            if(OSUSUME_10.checked){
                if(chkRECOMMEND_KEYWORD(mlBody,OSUSUME_10)==false){
                    err_msg += "\n�E" + OSUSUME_10_KEYWORD[0];
                }
            }
            // ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi

            if(err_msg3==""){
            }else{
                disp_err_msg += err_msg3;
            }

            if(err_msg4==""){
            }else{
                disp_err_msg += err_msg4;
            }

            if(err_msg==""){
            }else{
                disp_err_msg += err_msg;
            }

            if( err_msg3 || err_msg4 || err_msg ){
                alert(disp_err_msg);
                return false;
            }

        }


        
        if (typ.value != 'orei' && KAINNO.value != '00000000' && fncTrim(Memo.value) == '') {
            fncAlert('�Ή�����������͂��Ă�������', Memo);
            return false;
        }
        if (myCheckHankakuKana(Memo, '�Ή�������') == false)
            return false;
		//��2011/11/9 R-#2134 (�g��)�ʃ��[�����M �őΉ����̕������`�F�b�N��56�o�C�g�ɂȂ��Ă��� (ul kawanishi)
        if (denbunFormat(Memo.value, 400, 6) == false) {
            if (confirm('�Ή��������̓��͓��e���������܂�\n�ȉ��̕����������M���܂����A��낵���ł���\n\n' + denbunFormat(Memo.value, 400, 0)) == false) {
                Memo.focus();
                return false;
            }
            Memo.value = denbunFormat(Memo.value, 400, 0);
        }
		//��2011/11/9 R-#2134 (�g��)�ʃ��[�����M �őΉ����̕������`�F�b�N��56�o�C�g�ɂȂ��Ă��� (ul kawanishi)
        /*
        if (myCheckHankakuKana(Memo2, '�Ή�������2') == false)
            return false;
        if (denbunFormat(Memo2.value, 56, 6) == false) {
            if (confirm('�Ή�������2�̓��͓��e���������܂�\n�ȉ��̕����������M���܂����A��낵���ł���\n\n' + denbunFormat(Memo2.value, 56, 0)) == false) {
                Memo2.focus();
                return false;
            }
            Memo2.value = denbunFormat(Memo2.value, 56, 0);
        }
        */
        //R-#14022
		var arrObj = new Object();
		arrObj['textMlName'] = '����i�����O�j';
		arrObj['textMlSubject'] = '�薼';
		arrObj['textMlBody'] = '�{��';
		arrObj['textMlSignature'] = '�V�O�l�`��';
		arrObj['Memo'] = '�Ή�������';
		if(checkNgWord(arrObj) == false){
			return false;
		}
		//R-#14022

        // ��R-#14727_WEB�Ǘ��c�[���̌둀��h�~ 2014/10/07 uls-motoi
        err_msg_mail = '';
        if (fncTrim(mlTo.value) != fncTrim(mailDiff.value) && fncTrim(mailDiff.value) != '') {
            err_msg_mail += '�E�o�^�̃��[���A�h���X�Ɠ��̓��[���A�h���X�ɈႢ����\n';
        }
        if (err_msg_mail != '') {
            if (confirm('�y�m�F�z\n' + err_msg_mail + '\n�̂��q�l�ł��B\n���̂܂܃��[�����M���܂����H\n\n') == false) {
                Memo.focus();
                return false;
            }
        }
        // ��R-#14727_WEB�Ǘ��c�[���̌둀��h�~ 2014/10/07 uls-motoi

    }
    document.mail.mode.value='';
    document.mail.action='confirm.php';
    document.mail.submit();
}

