<?php
	//▼R-#14022_機種依存文字のメール文字化け対応 2014/04/16 uls-soga
	require_once $ROOT_PATH.'/js/mail_common.js';
	//▲R-#14022_機種依存文字のメール文字化け対応 2014/04/16 uls-soga
?>

function submitForm() {
    document.form_inp.button.disabled=true;
    document.form_inp.submit();
    return false;
}

function setMailAddress(value, flg, mail){
	if(value == 1){
		type = "（PC）";
	}else if(value == 2){
		type = "（携帯）";
	}
	if(flg == 0){
		mail = "メール不可"+type+"のお客様です";
	}
	document.mail.mlTo.value = 	mail;
}
function MailConfirmActionForMobile() {
    with (document.mail) {
        if (fncTrim(KAINNO.value) == '') {
            fncAlert('会員番号を入力してください', KAINNO);
            return false;
        }
        if (fncGetLength(KAINNO.value) > 8) {
            fncAlert('会員番号は8バイト以内で入力してください', KAINNO);
            return false;
        }
        if (fncJudgeNumber(KAINNO.value) == false) {
            fncAlert('会員番号は数字で入力してください', KAINNO);
            return false;
        }
        if (fncTrim(mlTo.value) == '') {
            fncAlert('メールアドレスを入力してください', mlTo);
            return false;
        }
        if (fncGetLength(mlTo.value) > 100) {
            fncAlert('メールアドレスは100バイト以内で入力してください', mlTo);
            return false;
        }
        if (emailCheck(mlTo.value) == false) {
            fncAlert('メールアドレスを正しく入力してください', mlTo);
            return false;
        }
        if (fncTrim(mlSubject.value) == '') {
            fncAlert('題名を入力してください', mlSubject);
            return false;
        }
        if (myCheckHankakuKana(mlSubject, '題名') == false)
            return false;
        if (fncGetLength(mlSubject.value) > 30) {
            fncAlert('題名は全角15文字以内で入力してください', mlSubject);
            return false;
        }
        if (fncTrim(mlBody.value) == '') {
            fncAlert('本文を入力してください', mlBody);
            return false;
        }
        if (myCheckHankakuKana(mlBody, '本文') == false)
            return false;
        if (myCheckHankakuKana(mlSignature, 'シグネチャ') == false)
            return false;
        if (site_kbn[1].checked) {
            if (fncGetLength(mlBody.value + mlSignature.value) > 3000) {
                fncAlert('本文は全角1500文字以内で入力してください', mlBody);
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
                    alert('対応フラグを選択してください');
                    return false;
                }
            }
        }


        if( typeof(OSUSUME_1)=='object' ){
            disp_err_msg = "本文に「お勧め情報」を入力してください。\n";
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

			/* ▼ 2011-04-04 EC-One Soga 準備3点・基本4点のチェック仕様の仕様間違い対応 */
            //if(set3_flg==1){
            //▼2011/09/05 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yamashita）
//            ret_set3 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_1,3);
            //▲2011/09/05 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yamashita）
            //}
            //if(set4_flg==1){
            ret_set4 = chkRECOMMEND_KEYWORD(mlBody,OSUSUME_4,4);
            //}
			/* ▲ 2011-04-04 EC-One Soga 準備3点・基本4点のチェック仕様の仕様間違い対応 */
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

			/* ▼ 2011-04-04 EC-One Soga 準備3点・基本4点のチェック仕様の仕様間違い対応 */
			/*
            if(set3_flg==1){
                if(ret_set3==false && (ret1==false || ret2==false || ret3==false) ){
                    err_msg3 += "\n・" + OSUSUME_SET3_KEYWORD[0];
                    if(ret1==false){
                        err_msg3 += "\n・" + OSUSUME_1_KEYWORD[0];
                    }
                    if(ret2==false){
                        err_msg3 += "\n・" + OSUSUME_2_KEYWORD[0];
                    }
                    if(ret3==false){
                        err_msg3 += "\n・" + OSUSUME_3_KEYWORD[0];
                    }
                }
            }else{
            */
            //▼2011/09/05 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yamashita）
//            if((ret_set3 == true && (OSUSUME_1.checked || OSUSUME_2.checked || OSUSUME_3.checked)) || 
//            	(ret1 == true && ret2 == true && ret3 == true)) {
//            } else {
//            	err_msg3 += "\n・" + OSUSUME_SET3_KEYWORD[0];
                if(ret1==false){
                    err_msg3 += "\n・" + OSUSUME_1_KEYWORD[0];
                }
                if(ret2==false){
                    err_msg3 += "\n・" + OSUSUME_2_KEYWORD[0];
                }
                if(ret3==false){
                    err_msg3 += "\n・" + OSUSUME_3_KEYWORD[0];
                }
//            }
            //▲2011/09/05 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yamashita）

			/*
            if(set4_flg==1){
                if(ret_set4==false && (ret4==false || ret5==false || ret6==false) ){
                    err_msg4 += "\n・" + OSUSUME_SET4_KEYWORD[0];
                    if(ret4==false){
                        err_msg4 += "\n・" + OSUSUME_4_KEYWORD[0];
                    }
                    if(ret5==false){
                        err_msg4 += "\n・" + OSUSUME_5_KEYWORD[0];
                    }
                    if(ret6==false){
                        err_msg4 += "\n・" + OSUSUME_6_KEYWORD[0];
                    }
                    if(ret7==false){
                        err_msg4 += "\n・" + OSUSUME_7_KEYWORD[0];
                    }
                }
            }else{
            */
            if(ret_set4 == true && (OSUSUME_4.checked || OSUSUME_5.checked || OSUSUME_6.checked || OSUSUME_7.checked) || 
            	(ret4 == true && ret5 == true && ret6 == true && ret7 == true)) {
            } else {
            	err_msg4 += "\n・" + OSUSUME_SET4_KEYWORD[0];
                if(ret4==false){
                    err_msg4 += "\n・" + OSUSUME_4_KEYWORD[0];
                }
                if(ret5==false){
                    err_msg4 += "\n・" + OSUSUME_5_KEYWORD[0];
                }
                if(ret6==false){
                    err_msg4 += "\n・" + OSUSUME_6_KEYWORD[0];
                }
                if(ret7==false){
                    err_msg4 += "\n・" + OSUSUME_7_KEYWORD[0];
                }
            }
			/* ▲ 2011-04-04 EC-One Soga 準備3点・基本4点のチェック仕様の仕様間違い対応 */

            if(OSUSUME_8.checked){
                if(chkRECOMMEND_KEYWORD(mlBody,OSUSUME_8)==false){
                    err_msg += "\n・" + OSUSUME_8_KEYWORD[0];
                }
            }

            if(OSUSUME_9.checked){
                if(chkRECOMMEND_KEYWORD(mlBody,OSUSUME_9)==false){
                    err_msg += "\n・" + OSUSUME_9_KEYWORD[0];
                }
            }

            // ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
            if(OSUSUME_10.checked){
                if(chkRECOMMEND_KEYWORD(mlBody,OSUSUME_10)==false){
                    err_msg += "\n・" + OSUSUME_10_KEYWORD[0];
                }
            }
            // ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi

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
            fncAlert('対応歴メモを入力してください', Memo);
            return false;
        }
        if (myCheckHankakuKana(Memo, '対応歴メモ') == false)
            return false;
		//▼2011/11/9 R-#2134 (携帯)個別メール送信 で対応歴の文字数チェックが56バイトになっている (ul kawanishi)
        if (denbunFormat(Memo.value, 400, 6) == false) {
            if (confirm('対応歴メモの入力内容が長すぎます\n以下の部分だけ送信しますが、よろしいですか\n\n' + denbunFormat(Memo.value, 400, 0)) == false) {
                Memo.focus();
                return false;
            }
            Memo.value = denbunFormat(Memo.value, 400, 0);
        }
		//▲2011/11/9 R-#2134 (携帯)個別メール送信 で対応歴の文字数チェックが56バイトになっている (ul kawanishi)
        /*
        if (myCheckHankakuKana(Memo2, '対応歴メモ2') == false)
            return false;
        if (denbunFormat(Memo2.value, 56, 6) == false) {
            if (confirm('対応歴メモ2の入力内容が長すぎます\n以下の部分だけ送信しますが、よろしいですか\n\n' + denbunFormat(Memo2.value, 56, 0)) == false) {
                Memo2.focus();
                return false;
            }
            Memo2.value = denbunFormat(Memo2.value, 56, 0);
        }
        */
        //R-#14022
		var arrObj = new Object();
		arrObj['textMlName'] = '宛先（お名前）';
		arrObj['textMlSubject'] = '題名';
		arrObj['textMlBody'] = '本文';
		arrObj['textMlSignature'] = 'シグネチャ';
		arrObj['Memo'] = '対応歴メモ';
		if(checkNgWord(arrObj) == false){
			return false;
		}
		//R-#14022

        // ▼R-#14727_WEB管理ツールの誤操作防止 2014/10/07 uls-motoi
        err_msg_mail = '';
        if (fncTrim(mlTo.value) != fncTrim(mailDiff.value) && fncTrim(mailDiff.value) != '') {
            err_msg_mail += '・登録のメールアドレスと入力メールアドレスに違いあり\n';
        }
        if (err_msg_mail != '') {
            if (confirm('【確認】\n' + err_msg_mail + '\nのお客様です。\nこのままメール送信しますか？\n\n') == false) {
                Memo.focus();
                return false;
            }
        }
        // ▲R-#14727_WEB管理ツールの誤操作防止 2014/10/07 uls-motoi

    }
    document.mail.mode.value='';
    document.mail.action='confirm.php';
    document.mail.submit();
}

