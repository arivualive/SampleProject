function myCheckLength(obj, num, name, arg) {
	if (arg == "kainno" && obj.value.length > 0) {
		if (!/^[0-9�O-�X]+$/.test(obj.value)) { 
			fncAlert(name + "�͔��p�����œ��͂��Ă�������" , obj);
			return false;
		}else if(fncGetLength(obj.value) > num){
			fncAlert(name + "�͔��p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
			return false;
		} else {
			return true;
		}
	}else if (arg == "tel") {
		str = obj.value.replace(/-/g,"");
		if(str.length != 0 && str.length < num){
			fncAlert(name + "�͔��p����" + num + "�����ȏ�(�n�C�t���͊܂܂Ȃ�)�œ��͂��Ă�������" , obj);
			return false;
		} else if (str.length != 0 && !/^[0-9]+$/.test(str)) { 
			fncAlert(name + "�͔��p�����œ��͂��Ă�������" , obj);
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

function myCheckLengthEq(obj, num, name) {
	if(fncGetLength(obj.value) == num){
		fncAlert(name + "�͑S�p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
		return false;
	} else {
		return true;
	}
}
// ���̓`�F�b�N 
function ListChk() {
	with (document.list){
		if (! myCheckLength(kainno, 8, "����ԍ�", "kainno")){
			return false;
		}
		if(kainno.value.length == 0){
			fncAlert("����ԍ�����͂��Č������Ă�������",kainno);
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

function jsUnlock(kainno){
	if(!kainno){
		alert('����ԍ����w�肳��Ă��܂���B');
		return false;
	}
	if(!/^[0-9]+$/.test(kainno) || fncGetLength(kainno) != 8){
		alert('����ԍ�������������܂���B');
		return false;
	}
	document.list2.kainno.value = kainno;
	document.list2.mode.value = "unlock_confirm";
	document.list2.submit();
}
function jsUnlockComplete(){
	var kainno = document.unlock_confirm.kainno.value;
	if(!kainno){
		alert('����ԍ����w�肳��Ă��܂���B');
		return false;
	}
	if(!/^[0-9]+$/.test(kainno) || fncGetLength(kainno) != 8){
		alert('����ԍ�������������܂���B');
		return false;
	}
	document.unlock_confirm.submit();
}