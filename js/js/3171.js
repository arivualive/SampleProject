// �e���̓`�F�b�N���[��
function myCheckLength(obj, num, name, arg) {
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "�͑S�p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
            return false;
        } else {
            return true;
        }
    }else if (arg == "kainno" && obj.value.length > 0) {
        if (!/^[0-9]+$/.test(obj.value)) {
            fncAlert(name + "�͔��p�����œ��͂��Ă�������" , obj);
            return false;
        } else {
            return true;
        }
    }else if(fncGetLength(obj.value) > num){
        fncAlert(name + "�͔��p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
        return false;
    }else {
        return true;
    }
}

// ���������̓��̓`�F�b�N
function ListChk() {
    with (document.list){
        // ���e���`�F�b�N
         var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("���e���iFROM�j�͐��������͂��Ă�������",s_yy);
                 return false;
             }
         }
         var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("���e���iTO�j�͐��������͂��Ă�������",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("���e���iFROM�j�� ���e���iTO�j�œ��͂��Ă�������",s_yy);
                     return false;
                 }
             }
         }

       /* if (! myCheckLength(kainno, 8, "����ԍ�", "kainno") ||
            ! myCheckLength(netmember_id, 12, "�l�b�g���ID")
           )
            return false;*/

        if ( poster_name.value.length > 20 ){
            fncAlert("���e�Җ���20�o�C�g�ȓ��œ��͂��Ă�������",poster_name);
            return false;
        }
    }
    return true;

}

// �N���A
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}

// �폜
function DeleteChk(){
    return fncDelConfirm();
}

// �X�V
function InputChk(isconfirm){
	var errormsg = "";
    with (document.input){
		if (fncTrim(content_cd.value) == "") {
			errormsg += "�E�R���e���c�R�[�h��I�����Ă�������\n";
		}

		if ((!isconfirm && admin_kbn.checked != true) || (isconfirm && admin_kbn.value != "1")) {

		if (fncTrim(kainno.value) == "") {
			errormsg += "�E����ԍ�����͂��Ă�������\n";
		} else if (fncTrim(kainno.value).length != 8 || !/^[0-9]+$/.test(fncTrim(kainno.value))) {
			errormsg += "�E����ԍ���8�������œ��͂��Ă�������\n";
		}

		}

		if (fncTrim(poster_name.value) == "") {
			errormsg += "�E���e�Җ�����͂��Ă�������\n";
		}

		if (fncTrim(letter_comment.value) == "") {
			errormsg += "�E�R�����g����͂��Ă�������\n";
		}
		if(fncGetLength(letter_comment.value) > 4000){
			errormsg += "�E�R�����g�͑S�p2000�����ȓ��œ��͂��Ă�������\n";
		}
    }
    if (errormsg == "") {
    	return true;
    } else {
	    alert(errormsg);
		return false;
    }
}

// �L�����Z��
function CancelChk() {

    document.input.mode_prm.value = "cancel";
    document.input.action = "input.php";
    document.input.submit();
    return true;
}

// �폜
function DeleteChk(id){
    if (window.confirm('�{���ɍ폜���܂����H')) {
    	self.location.href='regist.php?del_flg=ok&contentletterzine_id=' + id;
    } else {
    	alert("�폜���L�����Z������܂���");
    }
}


function dissableKain() {

	if (admin_kbn.checked == true) {
		kainno.dissabled = true;
		poster_name.dissabled = true;
	} else {
		kainno.dissabled = false;
		poster_name.dissabled = false;
	}

}
