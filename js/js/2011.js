function myCheckLength(obj, num, name, arg) {
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "�͑S�p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
            return false;
        } else {
            return true;
        }
    }else if (arg == "kainno" && obj.value.length > 0) {
        if (!/^[0-9�O-�X]+$/.test(obj.value)) { 
            fncAlert(name + "�͔��p�����œ��͂��Ă�������" , obj);
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
        if (! myCheckLength(kainno, 8, "����ԍ�", "kainno") ||
            ! myCheckLength(kain_name, 15, "�����O", "zen") ||
            ! myCheckLength(tel_no, 10, "�d�b�ԍ�", "tel") ||
            ! myCheckLength(netmember_id, 12, "�l�b�g���ID") ||
            ! myCheckLength(email, 100, "�A�h���X�i�o�b�j") ||
            ! myCheckLength(m_email, 100, "�A�h���X�i�g�сj"))
            return false;
	}
    return true;
}

// �N���A
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}





function myCheckEmail_space(obj1,obj2, isFlg) {
	<? if ($mode == 'add') { ?>
		if(isFlg){
			if (fncTrim(obj1.value) == "" && fncTrim(obj2.value) == "" ) {
				fncAlert("�o�b�p���[���A�h���X�@�܂��́@�g�їp���[���A�h���X�@����͂��Ă�������",obj1);
				return false;
			}
		}
	<? } ?>
	return true;
}

function myCheckEmail(obj, isPc) {
    var name = isPc ? "�i�o�b�j" : "�i�g�сj";
<? if ($mode == 'add') { ?>
 if(isPc){
    if (fncTrim(obj.value) == "") {
        return true;
    }
 }else{
    if (obj.value == "") {
        return true;
    }
 }
<? } else { ?>
    if (obj.value == "") {
        return true;
    }
<? } ?>
    if(fncGetLength(obj.value) > 100) {
        fncAlert("���[���A�h���X" + name + "��100�����ȓ��œ��͂��Ă�������",obj);
        return false;
    }
    if (myMailFormatCheck(obj.value) == false) {
        fncAlert("���[���A�h���X" + name + "�𐳂������͂��ĉ�����",obj);
        return false;
    }
    if (isPc == false && myIsMobileDomain(obj.value) == false) {
        fncAlert("���[���A�h���X" + name + "�͌g�т̃��[���A�h���X����͂��ĉ�����",obj);
        return false;
    }

    return true;
}
// from whois_chg.asp
function myMailFormatCheck(strMAIL) {

    var filter = /^[\.\w+-]+[\.\w+-]*@([\w_\-]+)\.([\w_\.\-]*)[a-z][a-z\.]$/i;

    returnval = filter.test(strMAIL);
    return returnval;
}
// from inc/common.inc(asp)
function myIsMobileDomain(addr) {
    if (addr.indexOf("@jp-t.ne.jp") != -1 ||
        addr.indexOf("@jp-d.ne.jp") != -1 ||
        addr.indexOf("@jp-h.ne.jp") != -1 ||
        addr.indexOf("@jp-r.ne.jp") != -1 ||
        addr.indexOf("@jp-n.ne.jp") != -1 ||
        addr.indexOf("@jp-s.ne.jp") != -1 ||
        addr.indexOf("@jp-q.ne.jp") != -1 ||
        addr.indexOf("@jp-c.ne.jp") != -1 ||
        addr.indexOf("@jp-k.ne.jp") != -1 ||
        addr.indexOf("@d.vodafone.ne.jp") != -1 ||
        addr.indexOf("@h.vodafone.ne.jp") != -1 ||
        addr.indexOf("@t.vodafone.ne.jp") != -1 ||
        addr.indexOf("@c.vodafone.ne.jp") != -1 ||
        addr.indexOf("@k.vodafone.ne.jp") != -1 ||
        addr.indexOf("@r.vodafone.ne.jp") != -1 ||
        addr.indexOf("@n.vodafone.ne.jp") != -1 ||
        addr.indexOf("@s.vodafone.ne.jp") != -1 ||
        addr.indexOf("@q.vodafone.ne.jp") != -1 ||
        addr.indexOf("@softbank.ne.jp") != -1 || // ASP�ɂ͖��������̂Œǉ�
        addr.indexOf("@ezweb.ne.jp") != -1 ||
        addr.indexOf("@kddi.biz.ezweb.ne.jp") != -1 ||
        addr.indexOf("@ido.ne.jp") != -1 ||
        addr.indexOf("@sky.tkk.ne.jp") != -1 ||
        addr.indexOf("@sky.tu-ka.ne.jp") != -1 ||
        addr.indexOf("@sky.tck.ne.jp") != -1 ||
        addr.indexOf("@docomo.ne.jp") != -1 ||
        addr.indexOf("@em.nttpnet.ne.jp") != -1 ||
        addr.indexOf("@phone.ne.jp") != -1 ||
        addr.indexOf("@mozio.ne.jp") != -1 ||
        addr.indexOf("@pdx.ne.jp") != -1 ||
        addr.indexOf("@pipopa.ne.jp") != -1 ||
        addr.indexOf("@mopera.net") != -1 ||
        addr.indexOf("@disney.ne.jp") != -1)
        return true;
    else
        return false;
}
// ���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){

		if( myCheckEmail_space(email,m_email,true) == false ){
			return false;
		}

		<? if ($mode == 'edit') { ?>
			if ((fncTrim(r_email.value) != '' && fncTrim(email.value) == '') || (fncTrim(r_m_email.value) && fncTrim(m_email.value) == '')) {
				alert("���[���A�h���X�̍폜�͂ł��܂���B\n�폜����ꍇ�́A���q�l��ʂ��炨���Ȃ��Ă��������B");
				return false;
			}
		<? } ?>

        if (myCheckEmail(email, true) == false ||
            myCheckEmail(m_email, false) == false)
            return false;

        <? if ($mode == 'add') { ?>
            if ( email != '' && myIsMobileDomain(email.value) == true ) {
                if(!confirm("�V�K�o�^���APC�p�Ɍg�їp���[���A�h���X����͂����ꍇ�A���[���`���������I�ɁyTEXT�z�ɂȂ�܂�����낵���ł����H\n���̂܂܍X�V����ꍇ�́uOK�v��I�����Ă��������B")){
                    return false;
                }
            }else if(!fncEditConfirm()){
                return false;
            }
        <? } else { ?>
            if(!fncEditConfirm()){
                return false;
            }
        <? } ?>

        return true;
	}
}
// �폜
function DeleteAction(sample_member_flg) {
    if (sample_member_flg == '0') {
        if (confirm("�l�b�g����o�^�𖕏����܂��B��낵���ł����H")) {
            document.form_inp.mode.value = "delete_net";
            document.form_inp.submit();
        }
    } else {
        if (confirm("�T���v�������ғo�^�𖕏����܂��B��낵���ł����H")) {
            document.form_inp.mode.value = "delete_sample";
            document.form_inp.submit();
        }
    }
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