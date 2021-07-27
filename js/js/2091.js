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




// ���̓`�F�b�N 
function ListChk() {
	with (document.list){
        if (! myCheckLength(s_kainno, 8, "����ԍ�", "kainno") ||
            ! myCheckLength(s_kain_name, 15, "�����O", "zen") ||
            ! myCheckLength(netmember_id, 12, "�l�b�g���ID"))
            return false;
	}
    return true;
}

// �N���A
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}


function DetailOpen(kainno) {
	document.list.kainno.value = kainno;
	document.list.action = 'detail.php';
	document.list.submit();
}




function jsWindowClose(kainno){
	if(!window.opener || window.opener.closed){
		//�e�E�B���h�E�����݂��Ȃ�
		window.self.close();
	} else {
        
        //fncAlert(typeof(kainno));
        //fncAlert(kainno);
        parent.window.opener.document.form_detail.kainno.value = kainno;
        //parent.window.opener.document.form_detail.page.value = "";
		parent.window.opener.document.form_detail.submit();
		window.self.close();
	}
}


function InputChk(inMode, id) {


	if(inMode == "FINISH"){
		document.form_inp.submit();
		return true;
	}
    
	with (document.form_inp){
		if (fncTrim(message.value) == "") {
			fncAlert("���b�Z�[�W����͂��Ă�������",message);
			return false;
		}
		if(fncGetLength(message.value) > 800){
			fncAlert("���b�Z�[�W��400�����ȓ��œ��͂��Ă�������",message);
			return false;
		}
        if(message.value.match(/\n/)){
			fncAlert("���s�͓��͂��Ȃ��ł�������",message);
			return false;
		}

		document.form_inp.mode_ctl.value = inMode;
		document.form_inp.submit();
		return true;
	}
}


function jsRegistCancel() {

	document.form_inp.mode_prm.value = 'input';
	document.form_inp.mode_ctl.value = '';
	document.form_inp.action = "input.php";
	document.form_inp.submit();
	
    
   
}

function jsFollowInsUpd() {
	//var fstatus = document.getElementById('fstatus');
	document.frm_fw.mode.value = 'ins_upd_fw';
	document.frm_fw.f_memo.value = document.getElementById('fmemo').value;
	document.frm_fw.submit();
}

function jsMsgDel(dtl_no) {
    if(window.confirm('���b�Z�[�W���폜���܂��B��낵���ł����H')){
        document.form_del.dtl_no.value = dtl_no;
        document.form_del.mode.value = 'delete';
	    document.form_del.submit();
    }

}


function chkLength(obj) {
	var objname = document.getElementById('textCountDown');
	var now_length = 400 - obj.value.length;
	objname.innerHTML = now_length;
	if (now_length < 0) { 
		objname.style.color = "#ff0000";
	}else{
		objname.style.color = "#000000";
	}
}

window.onload = function() {
	if (document.getElementById("message")) {
		var mode = document.form_inp.mode_prm.value;
		if (mode == 'input') {
			return chkLength(document.getElementById("message"));
            
		}
	}
}

function ListBack() {
	document.form_back.submit();
}


function jsInputClose(kainno,page){
	if(!window.opener || window.opener.closed){
		//�e�E�B���h�E�����݂��Ȃ�
		window.self.close();
	} else {
        
        //fncAlert(typeof(kainno));
        //fncAlert(kainno);
        parent.window.opener.document.form_detail.kainno.value = kainno;
        parent.window.opener.document.form_detail.page.value = page;
		parent.window.opener.document.form_detail.submit();
		window.self.close();
	}
}