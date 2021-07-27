function myCheckLength(obj, num, name, arg) {
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "は全角" + num + "文字以内で入力してください" , obj);
            return false;
        } else {
            return true;
        }
    }else if (arg == "kainno" && obj.value.length > 0) {
        if (!/^[0-9０-９]+$/.test(obj.value)) { 
            fncAlert(name + "は半角数字で入力してください" , obj);
    		return false;
    	} else {
            return true;
        }
    }else if (arg == "tel") {
        str = obj.value.replace(/-/g,"");
        if(str.length != 0 && str.length < num){
            fncAlert(name + "は半角数字" + num + "文字以上(ハイフンは含まない)で入力してください" , obj);
            return false;
        } else {
            return true;
        }
    }else if(fncGetLength(obj.value) > num){
        fncAlert(name + "は半角" + num + "文字以内で入力してください" , obj);
        return false;
    } else {
        return true;
    }
}

function myCheckLengthEq(obj, num, name) {
    if(fncGetLength(obj.value) == num){
        fncAlert(name + "は全角" + num + "文字以内で入力してください" , obj);
        return false;
    } else {
        return true;
    }
}
// 入力チェック 
function ListChk() {
	with (document.list){
        if (! myCheckLength(kainno, 8, "会員番号", "kainno") ||
            ! myCheckLength(kain_name, 15, "お名前", "zen") ||
            ! myCheckLength(tel_no, 10, "電話番号", "tel") ||
            ! myCheckLength(netmember_id, 12, "ネット会員ID") ||
            ! myCheckLength(email, 100, "アドレス（ＰＣ）") ||
            ! myCheckLength(m_email, 100, "アドレス（携帯）"))
            return false;
	}
    return true;
}

// クリア
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}





function myCheckEmail_space(obj1,obj2, isFlg) {
	<? if ($mode == 'add') { ?>
		if(isFlg){
			if (fncTrim(obj1.value) == "" && fncTrim(obj2.value) == "" ) {
				fncAlert("ＰＣ用メールアドレス　または　携帯用メールアドレス　を入力してください",obj1);
				return false;
			}
		}
	<? } ?>
	return true;
}

function myCheckEmail(obj, isPc) {
    var name = isPc ? "（ＰＣ）" : "（携帯）";
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
        fncAlert("メールアドレス" + name + "は100文字以内で入力してください",obj);
        return false;
    }
    if (myMailFormatCheck(obj.value) == false) {
        fncAlert("メールアドレス" + name + "を正しく入力して下さい",obj);
        return false;
    }
    if (isPc == false && myIsMobileDomain(obj.value) == false) {
        fncAlert("メールアドレス" + name + "は携帯のメールアドレスを入力して下さい",obj);
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
        addr.indexOf("@softbank.ne.jp") != -1 || // ASPには無かったので追加
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
// 入力チェック 
function InputChk() {
	with (document.form_inp){

		if( myCheckEmail_space(email,m_email,true) == false ){
			return false;
		}

		<? if ($mode == 'edit') { ?>
			if ((fncTrim(r_email.value) != '' && fncTrim(email.value) == '') || (fncTrim(r_m_email.value) && fncTrim(m_email.value) == '')) {
				alert("メールアドレスの削除はできません。\n削除する場合は、お客様画面からおこなってください。");
				return false;
			}
		<? } ?>

        if (myCheckEmail(email, true) == false ||
            myCheckEmail(m_email, false) == false)
            return false;

        <? if ($mode == 'add') { ?>
            if ( email != '' && myIsMobileDomain(email.value) == true ) {
                if(!confirm("新規登録時、PC用に携帯用メールアドレスを入力した場合、メール形式が強制的に【TEXT】になりますがよろしいですか？\nこのまま更新する場合は「OK」を選択してください。")){
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
// 削除
function DeleteAction(sample_member_flg) {
    if (sample_member_flg == '0') {
        if (confirm("ネット会員登録を抹消します。よろしいですか？")) {
            document.form_inp.mode.value = "delete_net";
            document.form_inp.submit();
        }
    } else {
        if (confirm("サンプル請求者登録を抹消します。よろしいですか？")) {
            document.form_inp.mode.value = "delete_sample";
            document.form_inp.submit();
        }
    }
}

function jsUnlock(kainno){
	if(!kainno){
		alert('会員番号が指定されていません。');
		return false;
	}
	if(!/^[0-9]+$/.test(kainno) || fncGetLength(kainno) != 8){
		alert('会員番号が正しくありません。');
		return false;
	}
	document.list2.kainno.value = kainno;
	document.list2.mode.value = "unlock_confirm";
	document.list2.submit();
}
function jsUnlockComplete(){
	var kainno = document.unlock_confirm.kainno.value;
	if(!kainno){
		alert('会員番号が指定されていません。');
		return false;
	}
	if(!/^[0-9]+$/.test(kainno) || fncGetLength(kainno) != 8){
		alert('会員番号が正しくありません。');
		return false;
	}
	document.unlock_confirm.submit();
}