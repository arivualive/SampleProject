<?php
	//��R-#14022_�@��ˑ������̃��[�����������Ή� 2014/04/16 uls-soga
	require_once $ROOT_PATH.'/js/mail_common.js';
	//��R-#14022_�@��ˑ������̃��[�����������Ή� 2014/04/16 uls-soga
?>

var OSUSUME_1_KEYWORD = Array("���ϗ����W�F��","���ϗ����ު�");
var OSUSUME_2_KEYWORD = Array("���Ό�");
//��2011/09/05 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yamashita�j
var OSUSUME_3_KEYWORD = Array("�A�̏W���p�b�N","�A�̏W���߯�");
//��2011/09/05 A-05825 �y�iDW�z9��22���J�n���i���j���[�A���Ή��iec-one yamashita�j
var OSUSUME_4_KEYWORD = Array("�ێ��t");
var OSUSUME_5_KEYWORD = Array("�������G�L�X","���������");
var OSUSUME_6_KEYWORD = Array("�N���[���Q�O","�N���[��20","�ذтQ�O","�ذ�20");
var OSUSUME_7_KEYWORD = Array("�ی���t");
var OSUSUME_8_KEYWORD = Array("�f���h���X�N���[��","�f����ڽ�ذ�");
var OSUSUME_SET3_KEYWORD = Array("�����R�_","����3�_");
var OSUSUME_SET4_KEYWORD = Array("��{�S�_","��{4�_");
var OSUSUME_9_KEYWORD = Array("���ރh���z���������N��","�����������ݸ�");
// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
var OSUSUME_10_KEYWORD = Array("�߂���̌���");
// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi


// ���̓`�F�b�N 
function InputChk(inMode) {

    if(inMode == "FINISH"){
        document.form_inp.submit();
        return true;
    }


    if(inMode == "DELETE"){
        document.form_inp.mode_ctl.value = inMode;
        document.form_inp.submit();
        return true;
    }


    if(inMode == "CANCEL"){
        document.form_inp.mode_ctl.value = inMode;
        document.form_inp.action = "input.php";
        document.form_inp.submit();
        return true;
    }


    if(inMode == "SAVE"){

        with (document.form_inp){
            if(fncGetLength(staffname.value) > 50){
                fncAlert("���e�҂͑S�p25�����ȓ��œ��͂��Ă�������",staffname);
                return false;
            }
            if(fncGetLength(msgtitle.value) > 255){
                fncAlert("�薼�͑S�p120�����ȓ��œ��͂��Ă�������",msgtitle);
                return false;
            }
            if(fncGetLength(msg.value) > 4000){
                fncAlert("�{���͑S�p2000�����ȓ��œ��͂��Ă�������",msg);
                return false;
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
            //R-#14022
            var arrObj = new Object();
            arrObj['textStaffName'] = '���e��';
            arrObj['textMsgTitle'] = '�薼';
            arrObj['textMsg'] = '�{��';
            if(checkNgWord(arrObj) == false){
                return false;
            }
            //R-#14022
        }


        document.form_inp.MD_MODE.value = "SAVE";
        document.form_inp.mode_ctl.value = inMode;
        document.form_inp.submit();
        return true;
    }



	with (document.form_inp){

		if (fncTrim(staffname.value) == "") {
			fncAlert("���e�҂���͂��Ă�������",staffname);
			return false;
		}
		if(fncGetLength(staffname.value) > 50){
				fncAlert("���e�҂͑S�p25�����ȓ��œ��͂��Ă�������",staffname);
				return false;
		}
		if (fncTrim(msgtitle.value) == "") {
			fncAlert("�薼����͂��Ă�������",msgtitle);
			return false;
		}
		if(fncGetLength(msgtitle.value) > 255){
				fncAlert("�薼�͑S�p120�����ȓ��œ��͂��Ă�������",msgtitle);
				return false;
		}
		if (fncTrim(msg.value) == "") {
			fncAlert("�{������͂��Ă�������",msg);
			return false;
		}
		if(fncGetLength(msg.value) > 4000){
				fncAlert("�{���͑S�p2000�����ȓ��œ��͂��Ă�������",msg);
				return false;
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
            disp_err_msg="�{���Ɂu�����ߏ��v����͂��Ă��������B\n";
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
            ret_set4 = chkRECOMMEND_KEYWORD(msg,OSUSUME_4,4);
            //}
			/* �� 2011-04-04 EC-One Soga ����3�_�E��{4�_�̃`�F�b�N�d�l�̎d�l�ԈႢ�Ή� */
            if(OSUSUME_1.checked){
                ret1 = chkRECOMMEND_KEYWORD(msg,OSUSUME_1);
            }
            if(OSUSUME_2.checked){
                ret2 = chkRECOMMEND_KEYWORD(msg,OSUSUME_2);
            }
            if(OSUSUME_3.checked){
                ret3 = chkRECOMMEND_KEYWORD(msg,OSUSUME_3);
            }
            if(OSUSUME_4.checked){
                ret4 = chkRECOMMEND_KEYWORD(msg,OSUSUME_4);
            }
            if(OSUSUME_5.checked){
                ret5 = chkRECOMMEND_KEYWORD(msg,OSUSUME_5);
            }
            if(OSUSUME_6.checked){
                ret6 = chkRECOMMEND_KEYWORD(msg,OSUSUME_6);
            }
            if(OSUSUME_7.checked){
                ret7 = chkRECOMMEND_KEYWORD(msg,OSUSUME_7);
            }

			/* �� 2011-04-04 EC-One Soga ����3�_�E��{4�_�̃`�F�b�N�d�l�̎d�l�ԈႢ�Ή� */
			/*
            if(set3_flg==1){
                //if(ret_set3==false && (ret1==false || ret2==false || ret3==false) ){
                  if(ret_set3==true  || (ret1==true  && ret2==true  && ret3==true ) ){
                }else{
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
                //if(ret_set4==false && (ret4==false || ret5==false || ret6==false) ){
                  if(ret_set4==true  || (ret4==true  && ret5==true  && ret6==true && ret7==true) ){
                }else{
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
                if(chkRECOMMEND_KEYWORD(msg,OSUSUME_8,0)==false){
                    err_msg += "\n�E" + OSUSUME_8_KEYWORD[0];
                }
            }

            if(OSUSUME_9.checked){
                if(chkRECOMMEND_KEYWORD(msg,OSUSUME_9,0)==false){
                    err_msg += "\n�E" + OSUSUME_9_KEYWORD[0];
                }
            }

            // ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
            if(OSUSUME_10.checked){
                if(chkRECOMMEND_KEYWORD(msg,OSUSUME_10,0)==false){
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
        //R-#14022
        var arrObj = new Object();
        arrObj['textStaffName'] = '���e��';
        arrObj['textMsgTitle'] = '�薼';
        arrObj['textMsg'] = '�{��';
        if(checkNgWord(arrObj) == false){
            return false;
        }
        //R-#14022

	}


    document.form_inp.mode_ctl.value = inMode;
    document.form_inp.submit();
    return true;
}


function chkRECOMMEND_KEYWORD(objBody,objFld,setType){

    if(setType==3){
        var objArr = OSUSUME_SET3_KEYWORD;

    }else if(setType==4){
        var objArr = OSUSUME_SET4_KEYWORD;

    }else{
        if(objFld.value=="0166"){
            var objArr = OSUSUME_1_KEYWORD;
        }

        if(objFld.value=="0167"){
            var objArr = OSUSUME_2_KEYWORD;
        }

        if(objFld.value=="0173"){
            var objArr = OSUSUME_3_KEYWORD;
        }

        if(objFld.value=="0113"){
            var objArr = OSUSUME_4_KEYWORD;
        }

        if(objFld.value=="0115"){
            var objArr = OSUSUME_5_KEYWORD;
        }

        if(objFld.value=="0112"){
            var objArr = OSUSUME_6_KEYWORD;
        }

        if(objFld.value=="0114"){
            var objArr = OSUSUME_7_KEYWORD;
        }

        if(objFld.value=="0210"){
            var objArr = OSUSUME_8_KEYWORD;
        }

        if(objFld.value=="0250"){
            var objArr = OSUSUME_9_KEYWORD;
        }

        // ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
        if(objFld.value=="0260"){
            var objArr = OSUSUME_10_KEYWORD;
        }
        // ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
    }

    for (var i = 0; i < objArr.length; i ++) {
        var RegularExp = new RegExp( objArr[i], "g");
        var res = objBody.value.match( RegularExp );
        if(res){
            return true;
        }
    }

    return false;
}


function shohinChoice(setNo){

    if(setNo==4){
        if(document.form_inp.OSUSUME_4.checked==true){
            $wkCheck = false;
        }else{
            $wkCheck = true;
        }

        document.form_inp.OSUSUME_4.checked = $wkCheck;
        document.form_inp.OSUSUME_5.checked = $wkCheck;
        document.form_inp.OSUSUME_6.checked = $wkCheck;
        document.form_inp.OSUSUME_7.checked = $wkCheck;
    }

    if(setNo==3){
        if(document.form_inp.OSUSUME_1.checked==true){
            $wkCheck = false;
        }else{
            $wkCheck = true;
        }

        document.form_inp.OSUSUME_1.checked = $wkCheck;
        document.form_inp.OSUSUME_2.checked = $wkCheck;
        document.form_inp.OSUSUME_3.checked = $wkCheck;
    }

}

