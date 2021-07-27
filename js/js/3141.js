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

        if (! myCheckLength(kainno, 8, "����ԍ�", "kainno") ||
            ! myCheckLength(netmember_id, 12, "�l�b�g���ID")
           )
            return false;

        if ( reviewer_name.value.length > 20 ){
            fncAlert("���e�Җ���20�o�C�g�ȓ��œ��͂��Ă�������",reviewer_name);
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

//�폜
function DeleteChk(){
    return fncDelConfirm();
}

//�X�V
function InputChk(){
    with (document.input){
    var rc_str = fncTrim(review_comment.value);
        if ( rc_str == "" ){
            fncAlert("�R�����g����͂��Ă�������",review_comment);
            return false;
        }

        if ( rc_str.length > 400 ){
            fncAlert( "�R�����g��400�����ȓ��œ��͂��Ă�������",review_comment);
            return false;
        }

        if(!fncEditConfirm()){
            return false;
        }
    }
}
