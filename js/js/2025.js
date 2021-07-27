// 
function myCheckLength(obj, num, name, arg) {
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "�͑S�p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
            return false;
        } else {
            return true;
        }
    }else if (arg == "tel") {
        str = obj.value.replace(/-/g,"");
        if(str.length != 0 && str.length < num){
            fncAlert(name + "�͔��p����" + num + "�����ȏ�(�n�C�t���͊܂܂Ȃ�)�œ��͂��Ă�������" , obj);
            return false;
        } else {
            return true;
        }
    }else if(fncGetLength(obj.value) > num){
        fncAlert(name + "�͔��p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
        return false;
    } else {
        return true;
    }
}

// ���̓`�F�b�N 
function ListChk() {
    document.list.mode.value = "find";
	
	with (document.list){
       
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("�������i�e�q�n�l�j�͐��������͂��Ă�������",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("�������i�s�n�j�͐��������͂��Ă�������",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("�������i�e�q�n�l�j���������i�s�n�j�œ��͂��Ă�������",s_yy);
                     return false;
                 }
             }
         }

        if (! myCheckLength(name_kanji, 15, "�����O", "zen") ||
            ! myCheckLength(tel_no, 10, "�d�b�ԍ�", "tel") ||
            ! myCheckLength(email, 100, "�d���[��"))
            return false;
	}
    return true;
}

// �N���A
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}

// ���̓`�F�b�N 
function DeleteChk(no, name) {
    return confirm("�yVIP��p�T���v�������zNo" + no + "�F" + name + "�l���폜���܂��B��낵���ł����H");
}

// ���̓`�F�b�N 
function NullChk(no, name) {
    return confirm("�yVIP��p�T���v�������zNo" + no + "�F" + name + "�l�𖳌������܂��B��낵���ł����H");
}

function fncCSV() {
    document.list.mode.value = "csv";
}
