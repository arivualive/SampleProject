//▼R-#43170_【R02-0028-136】不具合対応（事象解消）_【4点RN】個別メール作成時、お勧め情報で「DCJ」を選択するとエラーになる 2020/11/26 saisys-hasegawa
var OSUSUME_1_KEYWORD = Array("化粧落としジェル","化粧落としｼﾞｪﾙ");
//▲R-#43170_【R02-0028-136】不具合対応（事象解消）_【4点RN】個別メール作成時、お勧め情報で「DCJ」を選択するとエラーになる 2020/11/26 saisys-hasegawa
var OSUSUME_2_KEYWORD = Array("洗顔石鹸");
//▼2011/09/05 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yamashita）
var OSUSUME_3_KEYWORD = Array("泡の集中パック","泡の集中ﾊﾟｯｸ");
//▲2011/09/05 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yamashita）
var OSUSUME_4_KEYWORD = Array("保湿液");
var OSUSUME_5_KEYWORD = Array("美活肌エキス","美活肌ｴｷｽ");
var OSUSUME_6_KEYWORD = Array("クリーム２０","クリーム20","ｸﾘｰﾑ２０","ｸﾘｰﾑ20");
var OSUSUME_7_KEYWORD = Array("保護乳液");
var OSUSUME_8_KEYWORD = Array("素肌ドレスクリーム","素肌ﾄﾞﾚｽｸﾘｰﾑ");
var OSUSUME_SET3_KEYWORD = Array("準備３点","準備3点");
var OSUSUME_SET4_KEYWORD = Array("基本４点","基本4点");
var OSUSUME_9_KEYWORD = Array("飲むドモホルンリンクル","飲むﾄﾞﾓﾎﾙﾝﾘﾝｸﾙ");
// ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
var OSUSUME_10_KEYWORD = Array("めぐりの結晶");
// ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi


var mail_size=0;

function myCheckHankakuKana(obj, name) {
    for (i = 0; i < obj.value.length; i++){
        c = obj.value.charAt(i);
        if (isHankaku(c)) {
            fncAlert(name + 'に半角カナ文字が入っています', obj);
            return false;
        }
    }
    return true;
}
function changeMlBodyStr() {
    setStrCount("mlBodyMsg", document.mail.mlBody.value);
}
function changeMlSignatureStr() {
    setStrCount("mlSignatureMsg", document.mail.mlSignature.value);
}
//R-#14022
function checkNgWord(arrObj){
    var errObj = document.getElementById('errorPos');
    var errorStr = '';
    var alertMsg = '';
    errObj.innerHTML = '';
    var errHtml = '';

    for(var name in arrObj){
        if(document.getElementById(name) != undefined && document.getElementById(name).value.length > 0){
            errorStr = isNgWord(document.getElementById(name).value);
            if(errorStr){
                var commonMsg = arrObj[name] + 'に使用できない文字（'+errorStr+'）が含まれています。';
                var addMsg ='別の文字に置き換えてください。';
                alertMsg += commonMsg + addMsg + "\n";
                errHtml += '<tr><td>' + commonMsg + addMsg + '</td></tr>';
            }
        }
    }
    if(alertMsg && errHtml){
        errObj.innerHTML = '<table style="color:#ffffff;">' + errHtml + '</table>';
        errObj.style.display = 'block';
        alert(alertMsg);
        location.hash = '#errorPos';
        return false;
    }
    return true;
}

// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
function getByteCount(str)
{
    if (str.indexOf("\r\n") == -1) {
        if (str.indexOf("\n") != -1) {
            // windows firefox?
            str = str.replace(/\n/g, "12");
        } else if (str.indexOf("\r") != -1) {
            // ?
            str = str.replace(/\r/g, "12");
        }
    }
    return fncGetLength(str);
}
// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka

//R-#14022

function setStrCount(objId, str) {
    if (str.indexOf("\r\n") == -1) {
        if (str.indexOf("\n") != -1) {
            // windows firefox?
            str = str.replace(/\n/g, "12");
        } else if (str.indexOf("\r") != -1) {
            // ?
            str = str.replace(/\r/g, "12");
        }
    }
    var text = str.length + "文字(" + fncGetLength(str) + "バイト)";

    var obj = document.getElementById(objId);
    obj.replaceChild(document.createTextNode(text), obj.childNodes[0]);
}

// ▼Add for mobile
function changeMlBodyStr2(maxchar, changeBg) {
    setStrCount2("mlBodyMsg", document.mail.mlBody.value, maxchar, changeBg);
}
function setStrCount2(objId, str, maxchar, changeBg, extraChar) {
    if (str.indexOf("\r\n") == -1) {
        if (str.indexOf("\n") != -1) {
            // windows firefox?
            str = str.replace(/\n/g, "12");
        } else if (str.indexOf("\r") != -1) {
            // ?
            str = str.replace(/\r/g, "12");
        }
    }

    var extra = '';
    if (extraChar != undefined) {
            extra = extraChar;
    }

    var chars = fncGetLength(str);
    var text  = extra + str.length + "文字(" + chars + "バイト)";

    var obj = document.getElementById(objId);
    obj.replaceChild(document.createTextNode(text), obj.childNodes[0]);
    if (chars > maxchar) {

        var errorObj = document.getElementById('errorMessage');
        errorObj.style.color = 'red';
        errorObj.style.fontWeight = 'bold';
        errorObj.innerText = '全角' + maxchar / 2 + '文字を超えています。';

        if (changeBg === true) {
            document.getElementById('errorBg').style.background = "#9BCFE8";
        }
    } else {
        var errorObj = document.getElementById('errorMessage');
        errorObj.innerText = '';

         if (changeBg === true) {
            document.getElementById('errorBg').style.background = "#FFFFFF";
        }
    }
    
}
// ▲Add for mobile

function MailFindAction() {
	document.mail.submit();
}

function createSiteKbnArrayInListAddr() {
    result = "";
    for (i = 0; i < document.mail.realOutputIdx.value; i++) {
        var rad = document.getElementById('site_kbn' + i);
        if (rad.checked)
            result += "," + i + "_1";
        else
            result += "," + i + "_2";
    }
    document.mail.site_kbn_array.value = result;
}

function Action1013Find() {
    createSiteKbnArrayInListAddr();
    with (document.mail) {
        if (fncTrim(cd.value) == '') {
            fncAlert('会員番号を入力してください', cd);
            return false;
		}
        if (fncGetLength(cd.value) > 8) {
            fncAlert('会員番号は8バイト以内で入力してください', cd);
            return false;
		}
        if (fncJudgeNumber(cd.value) == false) {
            fncAlert('会員番号は数字で入力してください', cd);
            return false;
		}
    }
    return true;
}
function Action1013Delete(idx) {
    createSiteKbnArrayInListAddr();
    document.mail.delkey.value = idx;
	document.mail.submit();
}
function Action1013Input() {
    createSiteKbnArrayInListAddr();
    if (document.mail.elements['KaiinCD[]'][1]) {
        // 配列
        var isAllEmpty = true;
        for (cnt = 0; cnt < document.mail.elements['KaiinCD[]'].length; cnt++) {
            if (fncTrim(document.mail.elements['KaiinCD[]'][cnt].value) != '' ||
                fncTrim(document.mail.elements['mlTo[]'][cnt].value) != '' ||
                fncTrim(document.mail.elements['mmlTo[]'][cnt].value) != '') {
                isAllEmpty = false;
            }
        }
        for (cnt = 0; cnt < document.mail.elements['KaiinCD[]'].length; cnt++) {
            if (isAllEmpty == false &&
                fncTrim(document.mail.elements['KaiinCD[]'][cnt].value) == '' &&
                fncTrim(document.mail.elements['mlTo[]'][cnt].value) == '' &&
                fncTrim(document.mail.elements['mmlTo[]'][cnt].value) == '') {
                // 空の行は無視する。但し、全行が空の場合を除く。
                continue;
            }
            if (fncTrim(document.mail.elements['KaiinCD[]'][cnt].value) == '') {
                fncAlert('会員番号を入力してください', document.mail.elements['KaiinCD[]'][cnt]);
                return false;
            }
            if (fncGetLength(document.mail.elements['KaiinCD[]'][cnt].value) > 8) {
                fncAlert('会員番号は8バイト以内で入力してください', document.mail.elements['KaiinCD[]'][cnt]);
                return false;
            }
            if (fncJudgeNumber(document.mail.elements['KaiinCD[]'][cnt].value) == false) {
                fncAlert('会員番号は数字で入力してください', document.mail.elements['KaiinCD[]'][cnt]);
                return false;
            }
            var rad = document.getElementById('site_kbn' + cnt);
            if (rad.checked) { // PC
                if (fncTrim(document.mail.elements['mlTo[]'][cnt].value) == '') {
                    fncAlert('宛先（ＰＣ）を入力してください', document.mail.elements['mlTo[]'][cnt]);
                    return false;
                }
                if (fncGetLength(document.mail.elements['mlTo[]'][cnt].value) > 100) {
                    fncAlert('宛先（ＰＣ）は100バイト以内で入力してください', document.mail.elements['mlTo[]'][cnt]);
                    return false;
                }
                if (emailCheck(document.mail.elements['mlTo[]'][cnt].value) == false) {
                    fncAlert('宛先（ＰＣ）を正しく入力してください', document.mail.elements['mlTo[]'][cnt]);
                    return false;
                }
            } else {
                if (fncTrim(document.mail.elements['mmlTo[]'][cnt].value) == '') {
                    fncAlert('宛先（携帯）を入力してください', document.mail.elements['mmlTo[]'][cnt]);
                    return false;
                }
                if (fncGetLength(document.mail.elements['mmlTo[]'][cnt].value) > 100) {
                    fncAlert('宛先（携帯）は100バイト以内で入力してください', document.mail.elements['mmlTo[]'][cnt]);
                    return false;
                }
                if (emailCheck(document.mail.elements['mmlTo[]'][cnt].value) == false) {
                    fncAlert('宛先（携帯）を正しく入力してください', document.mail.elements['mmlTo[]'][cnt]);
                    return false;
                }
            }
        }
    } else {
            if (fncTrim(document.mail.elements['KaiinCD[]'].value) == '') {
                fncAlert('会員番号を入力してください', document.mail.elements['KaiinCD[]']);
                return false;
            }
            if (fncGetLength(document.mail.elements['KaiinCD[]'].value) > 8) {
                fncAlert('会員番号は8バイト以内で入力してください', document.mail.elements['KaiinCD[]']);
                return false;
            }
            if (fncJudgeNumber(document.mail.elements['KaiinCD[]'].value) == false) {
                fncAlert('会員番号は数字で入力してください', document.mail.elements['KaiinCD[]']);
                return false;
            }
            var rad = document.getElementById('site_kbn' + 0);
            if (rad.checked) { // PC
                if (fncTrim(document.mail.elements['mlTo[]'].value) == '') {
                    fncAlert('宛先（ＰＣ）を入力してください', document.mail.elements['mlTo[]']);
                    return false;
                }
                if (fncGetLength(document.mail.elements['mlTo[]'].value) > 100) {
                    fncAlert('宛先（ＰＣ）は100バイト以内で入力してください', document.mail.elements['mlTo[]']);
                    return false;
                }
                if (emailCheck(document.mail.elements['mlTo[]'].value) == false) {
                    fncAlert('宛先（ＰＣ）を正しく入力してください', document.mail.elements['mlTo[]']);
                    return false;
                }
            } else {
                if (fncTrim(document.mail.elements['mmlTo[]'].value) == '') {
                    fncAlert('宛先（携帯）を入力してください', document.mail.elements['mmlTo[]']);
                    return false;
                }
                if (fncGetLength(document.mail.elements['mmlTo[]'].value) > 100) {
                    fncAlert('宛先（携帯）は100バイト以内で入力してください', document.mail.elements['mmlTo[]']);
                    return false;
                }
                if (emailCheck(document.mail.elements['mmlTo[]'].value) == false) {
                    fncAlert('宛先（携帯）を正しく入力してください', document.mail.elements['mmlTo[]']);
                    return false;
                }
            }
    }
    document.mail.action = 'input.php';
    document.mail.submit();
}

function MailConfirmAction() {
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
        if (mlFrom.length) {
            flg = false;
            var i;
            for(i = 0; i < mlFrom.length; i ++){
                if(mlFrom[i].checked){
                    flg = true; break;
                }
            }
            if(flg == false){
                alert('差出人を選択してください');
                return false;
            }
		}
        if (fncTrim(mlSubject.value) == '') {
            fncAlert('題名を入力してください', mlSubject);
            return false;
		}
        if (myCheckHankakuKana(mlSubject, '題名') == false)
            return false;
        if (fncGetLength(mlSubject.value) > 255) {
            fncAlert('題名は255バイト以内で入力してください', mlSubject);
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
        if (site_kbn[1].checked &&
            fncGetLength(mlBody.value + mlSignature.value) > 4000) {
            fncAlert('本文とシグネチャは合わせて4000バイト以内で入力してください', mlBody);
            return false;
		}

		// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka
        if (getByteCount(mlSignature.value) > 2000) {
		    fncAlert('シグネチャは2000バイト以内で入力してください', mlSignature);
            return false;
		}
		// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2016/07/31 sai_matsuoka

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
                //if(ret_set3==false && (ret1==false || ret2==false || ret3==false) ){
                  if(ret_set3==true  || (ret1==true  && ret2==true  && ret3==true) ){
                }else{
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
                if(ret1==false){
                    err_msg3 += "\n・" + OSUSUME_1_KEYWORD[0];
                }
                if(ret2==false){
                    err_msg3 += "\n・" + OSUSUME_2_KEYWORD[0];
                }
                if(ret3==false){
                    err_msg3 += "\n・" + OSUSUME_3_KEYWORD[0];
                }
            //▲2011/09/05 A-05825 【進DW】9月22日開始商品リニューアル対応（ec-one yamashita）
			
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
		// ▼R-#31392 2018/04/24
		// denbunFormatでは改行を文字として処理できない
        if (denbunFormat(Memo.value, 400, 6) == false || getByteCount(Memo.value) > 400) {
            if (confirm('対応歴メモの入力内容が長すぎます\n以下の部分だけ送信しますが、よろしいですか\n\n' + denbunFormat(Memo.value, 400, 0)) == false) {
                Memo.focus();
                return false;
			}
			
			// 改行を取り、詰める
            Memo.value = denbunFormat(Memo.value, 400, 0);
		}
		// ▲R-#31392 2018/04/24
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

        // ▼R-#14727_WEB管理ツールの誤操作防止 2014/06/02 uls-motoi
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
        // ▲R-#14727_WEB管理ツールの誤操作防止 2014/06/02 uls-motoi

    }
	document.mail.action='confirm.php';
	document.mail.submit();
}


function MailDraftSaveAction(){


    with (document.mail) {

    if (fncTrim(KAINNO.value) != '') {
        if (fncGetLength(KAINNO.value) > 8) {
            fncAlert('会員番号は8バイト以内で入力してください', KAINNO);
            return false;
		}
        if (fncJudgeNumber(KAINNO.value) == false) {
            fncAlert('会員番号は数字で入力してください', KAINNO);
            return false;
		}
	}

    if (fncTrim(mlTo.value) != '') {
        if (fncGetLength(mlTo.value) > 100) {
            fncAlert('メールアドレスは100バイト以内で入力してください', mlTo);
            return false;
		}
        if (emailCheck(mlTo.value) == false) {
            fncAlert('メールアドレスを正しく入力してください', mlTo);
            return false;
		}
	}

        
    if (fncTrim(mlSubject.value) != '') {
        if (myCheckHankakuKana(mlSubject, '題名') == false)
            return false;
        if (fncGetLength(mlSubject.value) > 255) {
            fncAlert('題名は255バイト以内で入力してください', mlSubject);
            return false;
		}
	}

        
    if (fncTrim(mlBody.value) != '') {
        if (myCheckHankakuKana(mlBody, '本文') == false)
            return false;
	}


        if (myCheckHankakuKana(mlSignature, 'シグネチャ') == false)
            return false;
        if (site_kbn[1].checked &&
            fncGetLength(mlBody.value + mlSignature.value) > 4000) {
            fncAlert('本文とシグネチャは合わせて4000バイト以内で入力してください', mlBody);
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
                    alert('対応フラグを選択してください');
                    return false;
                }
            }
        }

		// ▼【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2017/07/31 sai_matsuoka
        if (getByteCount(mlSignature.value) > 2000) {
            fncAlert('シグネチャは2000バイト以内で入力してください', mlSignature);
            return false;
		}
		// ▲【H29-00035-04】【不具合対応】　WEB管理ツール画面（(PC)個別メール送信）のデータ保存不可対応 --2017/07/31 sai_matsuoka

    if (fncTrim(Memo.value) != '') {
        if (typ.value != 'orei' && KAINNO.value != '00000000' && fncTrim(Memo.value) == '') {
            fncAlert('対応歴メモを入力してください', Memo);
            return false;
		}

        if (myCheckHankakuKana(Memo, '対応歴メモ') == false)
            return false;
        if (denbunFormat(Memo.value, 400, 6) == false) {
            if (confirm('対応歴メモの入力内容が長すぎます\n以下の部分だけ送信しますが、よろしいですか\n\n' + denbunFormat(Memo.value, 400, 0)) == false) {
                Memo.focus();
                return false;
			}
            Memo.value = denbunFormat(Memo.value, 400, 0);
		}
    }
        /*if (myCheckHankakuKana(Memo2, '対応歴メモ2') == false)
            return false;
        if (denbunFormat(Memo2.value, 56, 6) == false) {
            if (confirm('対応歴メモ2の入力内容が長すぎます\n以下の部分だけ送信しますが、よろしいですか\n\n' + denbunFormat(Memo2.value, 56, 0)) == false) {
                Memo2.focus();
                return false;
			}
            Memo2.value = denbunFormat(Memo2.value, 56, 0);
		}*/
    }
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

    document.mail.MD_MODE.value = "SAVE";
    document.mail.submit();
    return true;
}


function Action1013Confirm(isNextInput) {
    with (document.mail) {
        if (fncTrim(mlSubject.value) == '') {
            fncAlert('題名を入力してください', mlSubject);
            return false;
		}
        if (myCheckHankakuKana(mlSubject, '題名') == false)
            return false;
        if (fncGetLength(mlSubject.value) > 255) {
            fncAlert('題名は255バイト以内で入力してください', mlSubject);
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
        if (site_kbn[1].checked &&
            fncGetLength(mlBody.value + mlSignature.value) > 4000) {
            fncAlert('本文とシグネチャは合わせて4000バイト以内で入力してください', mlBody);
            return false;
		}


//         if (fncTrim(Memo.value) == '') {
//             fncAlert('対応歴メモを入力してください', Memo);
//             return false;
// 		}
        if (myCheckHankakuKana(Memo, '対応歴メモ') == false)
            return false;
        if (denbunFormat(Memo.value, 400, 6) == false) {
            if (confirm('対応歴メモの入力内容が長すぎます\n以下の部分だけ送信しますが、よろしいですか\n\n' + denbunFormat(Memo.value, 400, 0)) == false) {
                Memo.focus();
                return false;
			}
            Memo.value = denbunFormat(Memo.value, 400, 0);
		}
        /*if (myCheckHankakuKana(Memo2, '対応歴メモ2') == false)
            return false;
        if (denbunFormat(Memo2.value, 56, 6) == false) {
            if (confirm('対応歴メモ2の入力内容が長すぎます\n以下の部分だけ送信しますが、よろしいですか\n\n' + denbunFormat(Memo2.value, 56, 0)) == false) {
                Memo2.focus();
                return false;
			}
            Memo2.value = denbunFormat(Memo2.value, 56, 0);
		}*/

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
    }
    if (isNextInput)
        document.mail.action='input.php';
    else
        document.mail.action='confirmAddr.php';

	document.mail.submit();
}

function mailset(argcnt) {
    if (fncTrim(document.mail.mlBody.value) != '' ||
        fncTrim(document.mail.mlSubject.value) != '' ||
        fncTrim(document.mail.mlSignature.value) != '' ||
        fncTrim(document.mail.Memo.value) != '' ) {

	     if( fncGetLength(document.mail.mlBody.value) !=  mail_size ){

	        if (confirm("題名・本文・シグネチャ・対応歴のいずれかが入力されていますが、\r\n雛形を上書きしてよろしいですか") == false)
	            return false;
	     }
    }

    if (document.mail.mlBody.value=document.mail.mail_body[1]) {
        // 配列の場合
        if (document.mail.site_kbn[0].checked) {
            document.mail.mlBody.value=document.mail.mail_body[argcnt].value;
            document.mail.mlSubject.value=document.mail.mail_subject[argcnt].value;
            document.mail.mlSignature.value=document.mail.mail_signature2[argcnt].value;
        } else {
            document.mail.mlBody.value=document.mail.m_mail_body[argcnt].value;
            document.mail.mlSubject.value=document.mail.m_mail_subject[argcnt].value;
            document.mail.mlSignature.value=document.mail.m_mail_signature2[argcnt].value;
        }
        document.mail.code.value=document.mail.mail_code[argcnt].value;
        document.mail.Memo.value=document.mail.mail_memo[argcnt].value += document.mail.mail_memo2[argcnt].value;
    } else {
        // 配列でない場合
        if (document.mail.site_kbn[0].checked) {
            document.mail.mlBody.value=document.mail.mail_body.value;
            document.mail.mlSubject.value=document.mail.mail_subject.value;
            document.mail.mlSignature.value=document.mail.mail_signature2.value;
        } else {
            document.mail.mlBody.value=document.mail.m_mail_body.value;
            document.mail.mlSubject.value=document.mail.m_mail_subject.value;
            document.mail.mlSignature.value=document.mail.m_mail_signature2.value;
        }
        document.mail.code.value=document.mail.mail_code.value;
        document.mail.Memo.value=document.mail.mail_memo.value += document.mail.mail_memo2.value;
    }

    mail_size = fncGetLength(document.mail.mlBody.value);

    changeMlBodyStr();
    changeMlSignatureStr();
}

function signatureset(argcnt) {
    if (document.mail.mail_signature[1]) {
        // 配列の場合
        if (document.mail.site_kbn[0].checked) {
            document.mail.mlSignature.value=document.mail.mail_signature[argcnt].value;
        } else {
            document.mail.mlSignature.value=document.mail.m_mail_signature[argcnt].value;
        }
    } else {
        // 配列でない場合
        if (document.mail.site_kbn[0].checked) {
            document.mail.mlSignature.value=document.mail.mail_signature.value;
        } else {
            document.mail.mlSignature.value=document.mail.m_mail_signature.value;
        }
    }

  changeMlSignatureStr();
}




////////////////////////////////////////////////////////////////////////////////
// from ASP mm_menu.js
////////////////////////////////////////////////////////////////////////////////
/**
 * mm_menu 20MAR2002 Version 6.0
 * Andy Finnell, March 2002
 * Copyright (c) 2000-2002 Macromedia, Inc.
 *
 * based on menu.js
 * by gary smith, July 1997
 * Copyright (c) 1997-1999 Netscape Communications Corp.
 *
 * Netscape grants you a royalty free license to use or modify this
 * software provided that this copyright notice appears on all copies.
 * This software is provided "AS IS," without a warranty of any kind.
 */
function Menu(label, mw, mh, fnt, fs, fclr, fhclr, bg, bgh, halgn, valgn, pad, space, to, sx, sy, srel, opq, vert, idt, aw, ah) 
{
	this.version = "020320 [Menu; mm_menu.js]";
	this.type = "Menu";
	this.menuWidth = mw;
	this.menuItemHeight = mh;
	this.fontSize = fs;
	this.fontWeight = "plain";
	this.fontFamily = fnt;
	this.fontColor = fclr;
	this.fontColorHilite = fhclr;
	this.bgColor = "#555555";
	this.menuBorder = 1;
	this.menuBgOpaque=opq;
	this.menuItemBorder = 1;
	this.menuItemIndent = idt;
	this.menuItemBgColor = bg;
	this.menuItemVAlign = valgn;
	this.menuItemHAlign = halgn;
	this.menuItemPadding = pad;
	this.menuItemSpacing = space;
	this.menuLiteBgColor = "#ffffff";
	this.menuBorderBgColor = "#777777";
	this.menuHiliteBgColor = bgh;
	this.menuContainerBgColor = "#cccccc";
	this.childMenuIcon = "arrows.gif";
	this.submenuXOffset = sx;
	this.submenuYOffset = sy;
	this.submenuRelativeToItem = srel;
	this.vertical = vert;
	this.items = new Array();
	this.actions = new Array();
	this.childMenus = new Array();
	this.hideOnMouseOut = true;
	this.hideTimeout = to;
	this.addMenuItem = addMenuItem;
	this.writeMenus = writeMenus;
	this.MM_showMenu = MM_showMenu;
	this.onMenuItemOver = onMenuItemOver;
	this.onMenuItemAction = onMenuItemAction;
	this.hideMenu = hideMenu;
	this.hideChildMenu = hideChildMenu;
	if (!window.menus) window.menus = new Array();
	this.label = " " + label;
	window.menus[this.label] = this;
	window.menus[window.menus.length] = this;
	if (!window.activeMenus) window.activeMenus = new Array();
}

function addMenuItem(label, action) {
	this.items[this.items.length] = label;
	this.actions[this.actions.length] = action;
}

function FIND(item) {
	if( window.mmIsOpera ) return(document.getElementById(item));
	if (document.all) return(document.all[item]);
	if (document.getElementById) return(document.getElementById(item));
	return(false);
}

function writeMenus(container) {
	if (window.triedToWriteMenus) return;
	var agt = navigator.userAgent.toLowerCase();
	window.mmIsOpera = agt.indexOf("opera") != -1;
	if (!container && document.layers) {
		window.delayWriteMenus = this.writeMenus;
		var timer = setTimeout('delayWriteMenus()', 500);
		container = new Layer(100);
		clearTimeout(timer);
	} else if (document.all || document.hasChildNodes || window.mmIsOpera) {
		document.writeln('<span id="menuContainer"></span>');
		container = FIND("menuContainer");
	}

	window.mmHideMenuTimer = null;
	if (!container) return;	
	window.triedToWriteMenus = true; 
	container.isContainer = true;
	container.menus = new Array();
	for (var i=0; i<window.menus.length; i++) 
		container.menus[i] = window.menus[i];
	window.menus.length = 0;
	var countMenus = 0;
	var countItems = 0;
	var top = 0;
	var content = '';
	var lrs = false;
	var theStat = "";
	var tsc = 0;
	if (document.layers) lrs = true;
	for (var i=0; i<container.menus.length; i++, countMenus++) {
		var menu = container.menus[i];
		if (menu.bgImageUp || !menu.menuBgOpaque) {
			menu.menuBorder = 0;
			menu.menuItemBorder = 0;
		}
		if (lrs) {
			var menuLayer = new Layer(100, container);
			var lite = new Layer(100, menuLayer);
			lite.top = menu.menuBorder;
			lite.left = menu.menuBorder;
			var body = new Layer(100, lite);
			body.top = menu.menuBorder;
			body.left = menu.menuBorder;
		} else {
			content += ''+
			'<div id="menuLayer'+ countMenus +'" style="position:absolute;z-index:1;left:10px;top:'+ (i * 100) +'px;visibility:hidden;color:' +  menu.menuBorderBgColor + ';">\n'+
			'  <div id="menuLite'+ countMenus +'" style="position:absolute;z-index:1;left:'+ menu.menuBorder +'px;top:'+ menu.menuBorder +'px;visibility:hide;" onmouseout="mouseoutMenu();">\n'+
			'	 <div id="menuFg'+ countMenus +'" style="position:absolute;left:'+ menu.menuBorder +'px;top:'+ menu.menuBorder +'px;visibility:hide;">\n'+
			'';
		}
		var x=i;
		for (var i=0; i<menu.items.length; i++) {
			var item = menu.items[i];
			var childMenu = false;
			var defaultHeight = menu.fontSize+2*menu.menuItemPadding;
			if (item.label) {
				item = item.label;
				childMenu = true;
			}
			menu.menuItemHeight = menu.menuItemHeight || defaultHeight;
			var itemProps = '';
			if( menu.fontFamily != '' ) itemProps += 'font-family:' + menu.fontFamily +';';
			//itemProps += 'font-weight:' + menu.fontWeight + ';font-size:' + menu.fontSize + 'px;';
			if (menu.fontStyle) itemProps += 'font-style:' + menu.fontStyle + ';';
			if (document.all || window.mmIsOpera) 
				itemProps += 'font-size:' + menu.fontSize + 'px;" onmouseover="onMenuItemOver(null,this);" onclick="onMenuItemAction(null,this);';
			else if (!document.layers) {
				itemProps += 'font-size:' + menu.fontSize + 'px;';
			}
			var l;
			if (lrs) {
				var lw = menu.menuWidth;
				if( menu.menuItemHAlign == 'right' ) lw -= menu.menuItemPadding;
				l = new Layer(lw,body);
			}
			var itemLeft = 0;
			var itemTop = i*menu.menuItemHeight;
			if( !menu.vertical ) {
				itemLeft = i*menu.menuWidth;
				itemTop = 0;
			}
			var dTag = '<div id="menuItem'+ countItems +'" style="position:absolute;left:' + itemLeft + 'px;top:'+ itemTop +'px;'+ itemProps +'">';
			var dClose = '</div>'
			if (menu.bgImageUp) dTag = '<div id="menuItem'+ countItems +'" style="background:url('+menu.bgImageUp+');position:absolute;left:' + itemLeft + 'px;top:'+ itemTop +'px;'+ itemProps +'">';

			var left = 0, top = 0, right = 0, bottom = 0;
			left = 1 + menu.menuItemPadding + menu.menuItemIndent;
			right = left + menu.menuWidth - 2*menu.menuItemPadding - menu.menuItemIndent;
			if( menu.menuItemVAlign == 'top' ) top = menu.menuItemPadding;
			if( menu.menuItemVAlign == 'bottom' ) top = menu.menuItemHeight-menu.fontSize-1-menu.menuItemPadding;
			if( menu.menuItemVAlign == 'middle' ) top = ((menu.menuItemHeight/2)-(menu.fontSize/2)-1);
			bottom = menu.menuItemHeight - 2*menu.menuItemPadding;
			var textProps = 'position:absolute;left:' + left + 'px;top:' + top + 'px;';
			if (lrs) {
				textProps +=itemProps + 'right:' + right + ';bottom:' + bottom + ';';
				dTag = "";
				dClose = "";
			}
			
			if(document.all && !window.mmIsOpera) {
				item = '<div align="' + menu.menuItemHAlign + '">' + item + '</div>';
			} else if (lrs) {
				item = '<div style="text-align:' + menu.menuItemHAlign + ';">' + item + '</div>';
			} else {
				var hitem = null;
				if( menu.menuItemHAlign != 'left' ) {
					if(window.mmIsOpera) {
						var operaWidth = menu.menuItemHAlign == 'center' ? -(menu.menuWidth-2*menu.menuItemPadding) : (menu.menuWidth-6*menu.menuItemPadding);
						hitem = '<div id="menuItemHilite' + countItems + 'Shim" style="position:absolute;top:1px;left:' + menu.menuItemPadding + 'px;width:' + operaWidth + 'px;text-align:' 
							+ menu.menuItemHAlign + ';visibility:visible;">' + item + '</div>';
						item = '<div id="menuItemText' + countItems + 'Shim" style="position:absolute;top:1px;left:' + menu.menuItemPadding + 'px;width:' + operaWidth + 'px;text-align:' 
							+ menu.menuItemHAlign + ';visibility:visible;">' + item + '</div>';
					} else {
						hitem = '<div id="menuItemHilite' + countItems + 'Shim" style="position:absolute;top:1px;left:1px;right:-' + (left+menu.menuWidth-3*menu.menuItemPadding) + 'px;text-align:' 
							+ menu.menuItemHAlign + ';visibility:visible;">' + item + '</div>';
						item = '<div id="menuItemText' + countItems + 'Shim" style="position:absolute;top:1px;left:1px;right:-' + (left+menu.menuWidth-3*menu.menuItemPadding) + 'px;text-align:' 
							+ menu.menuItemHAlign + ';visibility:visible;">' + item + '</div>';
					}
				} else hitem = null;
			}
			if(document.all && !window.mmIsOpera) item = '<div id="menuItemShim' + countItems + '" style="position:absolute;left:0px;top:0px;">' + item + '</div>';
			var dText	= '<div id="menuItemText'+ countItems +'" style="' + textProps + 'color:'+ menu.fontColor +';">'+ item +'&nbsp</div>\n'
						+ '<div id="menuItemHilite'+ countItems +'" style="' + textProps + 'color:'+ menu.fontColorHilite +';visibility:hidden;">' 
						+ (hitem||item) +'&nbsp</div>';
			if (childMenu) content += ( dTag + dText + '<div id="childMenu'+ countItems +'" style="position:absolute;left:0px;top:3px;"><img src="'+ menu.childMenuIcon +'"></div>\n' + dClose);
			else content += ( dTag + dText + dClose);
			if (lrs) {
				l.document.open("text/html");
				l.document.writeln(content);
				l.document.close();	
				content = '';
				theStat += "-";
				tsc++;
				if (tsc > 50) {
					tsc = 0;
					theStat = "";
				}
				status = theStat;
			}
			countItems++;  
		}
		if (lrs) {
			var focusItem = new Layer(100, body);
			focusItem.visiblity="hidden";
			focusItem.document.open("text/html");
			focusItem.document.writeln("&nbsp;");
			focusItem.document.close();	
		} else {
		  content += '	  <div id="focusItem'+ countMenus +'" style="position:absolute;left:0px;top:0px;visibility:hide;" onclick="onMenuItemAction(null,this);">&nbsp;</div>\n';
		  content += '   </div>\n  </div>\n</div>\n';
		}
		i=x;
	}
	if (document.layers) {		
		container.clip.width = window.innerWidth;
		container.clip.height = window.innerHeight;
		container.onmouseout = mouseoutMenu;
		container.menuContainerBgColor = this.menuContainerBgColor;
		for (var i=0; i<container.document.layers.length; i++) {
			proto = container.menus[i];
			var menu = container.document.layers[i];
			container.menus[i].menuLayer = menu;
			container.menus[i].menuLayer.Menu = container.menus[i];
			container.menus[i].menuLayer.Menu.container = container;
			var body = menu.document.layers[0].document.layers[0];
			body.clip.width = proto.menuWidth || body.clip.width;
			body.clip.height = proto.menuHeight || body.clip.height;
			for (var n=0; n<body.document.layers.length-1; n++) {
				var l = body.document.layers[n];
				l.Menu = container.menus[i];
				l.menuHiliteBgColor = proto.menuHiliteBgColor;
				l.document.bgColor = proto.menuItemBgColor;
				l.saveColor = proto.menuItemBgColor;
				l.onmouseover = proto.onMenuItemOver;
				l.onclick = proto.onMenuItemAction;
				l.mmaction = container.menus[i].actions[n];
				l.focusItem = body.document.layers[body.document.layers.length-1];
				l.clip.width = proto.menuWidth || body.clip.width;
				l.clip.height = proto.menuItemHeight || l.clip.height;
				if (n>0) {
					if( l.Menu.vertical ) l.top = body.document.layers[n-1].top + body.document.layers[n-1].clip.height + proto.menuItemBorder + proto.menuItemSpacing;
					else l.left = body.document.layers[n-1].left + body.document.layers[n-1].clip.width + proto.menuItemBorder + proto.menuItemSpacing;
				}
				l.hilite = l.document.layers[1];
				if (proto.bgImageUp) l.background.src = proto.bgImageUp;
				l.document.layers[1].isHilite = true;
				if (l.document.layers.length > 2) {
					l.childMenu = container.menus[i].items[n].menuLayer;
					l.document.layers[2].left = l.clip.width -13;
					l.document.layers[2].top = (l.clip.height / 2) -4;
					l.document.layers[2].clip.left += 3;
					l.Menu.childMenus[l.Menu.childMenus.length] = l.childMenu;
				}
			}
			if( proto.menuBgOpaque ) body.document.bgColor = proto.bgColor;
			if( proto.vertical ) {
				body.clip.width  = l.clip.width +proto.menuBorder;
				body.clip.height = l.top + l.clip.height +proto.menuBorder;
			} else {
				body.clip.height  = l.clip.height +proto.menuBorder;
				body.clip.width = l.left + l.clip.width  +proto.menuBorder;
				if( body.clip.width > window.innerWidth ) body.clip.width = window.innerWidth;
			}
			var focusItem = body.document.layers[n];
			focusItem.clip.width = body.clip.width;
			focusItem.Menu = l.Menu;
			focusItem.top = -30;
            focusItem.captureEvents(Event.MOUSEDOWN);
            focusItem.onmousedown = onMenuItemDown;
			if( proto.menuBgOpaque ) menu.document.bgColor = proto.menuBorderBgColor;
			var lite = menu.document.layers[0];
			if( proto.menuBgOpaque ) lite.document.bgColor = proto.menuLiteBgColor;
			lite.clip.width = body.clip.width +1;
			lite.clip.height = body.clip.height +1;
			menu.clip.width = body.clip.width + (proto.menuBorder * 3) ;
			menu.clip.height = body.clip.height + (proto.menuBorder * 3);
		}
	} else {
		if ((!document.all) && (container.hasChildNodes) && !window.mmIsOpera) {
			container.innerHTML=content;
		} else {
			container.document.open("text/html");
			container.document.writeln(content);
			container.document.close();	
		}
		if (!FIND("menuLayer0")) return;
		var menuCount = 0;
		for (var x=0; x<container.menus.length; x++) {
			var menuLayer = FIND("menuLayer" + x);
			container.menus[x].menuLayer = "menuLayer" + x;
			menuLayer.Menu = container.menus[x];
			menuLayer.Menu.container = "menuLayer" + x;
			menuLayer.style.zindex = 1;
		    var s = menuLayer.style;
			s.pixeltop = -300;
			s.pixelleft = -300;
			s.top = '-300px';
			s.left = '-300px';

			var menu = container.menus[x];
			menu.menuItemWidth = menu.menuWidth || menu.menuIEWidth || 140;
			if( menu.menuBgOpaque ) menuLayer.style.backgroundColor = menu.menuBorderBgColor;
			var top = 0;
			var left = 0;
			menu.menuItemLayers = new Array();
			for (var i=0; i<container.menus[x].items.length; i++) {
				var l = FIND("menuItem" + menuCount);
				l.Menu = container.menus[x];
				l.Menu.menuItemLayers[l.Menu.menuItemLayers.length] = l;
				if (l.addEventListener || window.mmIsOpera) {
					l.style.width = menu.menuItemWidth + 'px';
					l.style.height = menu.menuItemHeight + 'px';
					l.style.pixelWidth = menu.menuItemWidth;
					l.style.pixelHeight = menu.menuItemHeight;
					l.style.top = top + 'px';
					l.style.left = left + 'px';
					if(l.addEventListener) {
						l.addEventListener("mouseover", onMenuItemOver, false);
						l.addEventListener("click", onMenuItemAction, false);
						l.addEventListener("mouseout", mouseoutMenu, false);
					}
					if( menu.menuItemHAlign != 'left' ) {
						l.hiliteShim = FIND("menuItemHilite" + menuCount + "Shim");
						l.hiliteShim.style.visibility = "inherit";
						l.textShim = FIND("menuItemText" + menuCount + "Shim");
						l.hiliteShim.style.pixelWidth = menu.menuItemWidth - 2*menu.menuItemPadding - menu.menuItemIndent;
						l.hiliteShim.style.width = l.hiliteShim.style.pixelWidth;
						l.textShim.style.pixelWidth = menu.menuItemWidth - 2*menu.menuItemPadding - menu.menuItemIndent;
						l.textShim.style.width = l.textShim.style.pixelWidth;	
					}
				} else {
					l.style.pixelWidth = menu.menuItemWidth;
					l.style.pixelHeight = menu.menuItemHeight;
					l.style.pixelTop = top;
					l.style.pixelLeft = left;
					if( menu.menuItemHAlign != 'left' ) {
						var shim = FIND("menuItemShim" + menuCount);
						shim[0].style.pixelWidth = menu.menuItemWidth - 2*menu.menuItemPadding - menu.menuItemIndent;
						shim[1].style.pixelWidth = menu.menuItemWidth - 2*menu.menuItemPadding - menu.menuItemIndent;
						shim[0].style.width = shim[0].style.pixelWidth + 'px';
						shim[1].style.width = shim[1].style.pixelWidth + 'px';
					}
				}
				if( menu.vertical ) top = top + menu.menuItemHeight+menu.menuItemBorder+menu.menuItemSpacing;
				else left = left + menu.menuItemWidth+menu.menuItemBorder+menu.menuItemSpacing;
				l.style.fontSize = menu.fontSize + 'px';
				l.style.backgroundColor = menu.menuItemBgColor;
				l.style.visibility = "inherit";
				l.saveColor = menu.menuItemBgColor;
				l.menuHiliteBgColor = menu.menuHiliteBgColor;
				l.mmaction = container.menus[x].actions[i];
				l.hilite = FIND("menuItemHilite" + menuCount);
				l.focusItem = FIND("focusItem" + x);
				l.focusItem.style.pixelTop = -30;
				l.focusItem.style.top = '-30px';
				var childItem = FIND("childMenu" + menuCount);
				if (childItem) {
					l.childMenu = container.menus[x].items[i].menuLayer;
					childItem.style.pixelLeft = menu.menuItemWidth -11;
					childItem.style.left = childItem.style.pixelLeft + 'px';
					childItem.style.pixelTop = (menu.menuItemHeight /2) -4;
					childItem.style.top = childItem.style.pixelTop + 'px';
					l.Menu.childMenus[l.Menu.childMenus.length] = l.childMenu;
				}
				//l.style.cursor = "hand";
				menuCount++;
			}
			if( menu.vertical ) {
				menu.menuHeight = top-1-menu.menuItemSpacing;
				menu.menuWidth = menu.menuItemWidth;
			} else {
				menu.menuHeight = menu.menuItemHeight;
				menu.menuWidth = left-1-menu.menuItemSpacing;
			}

			var lite = FIND("menuLite" + x);
			var s = lite.style;
			s.pixelHeight = menu.menuHeight +(menu.menuBorder * 2);
			s.height = s.pixelHeight + 'px';
			s.pixelWidth = menu.menuWidth + (menu.menuBorder * 2);
			s.width = s.pixelWidth + 'px';
			if( menu.menuBgOpaque ) s.backgroundColor = menu.menuLiteBgColor;

			var body = FIND("menuFg" + x);
			s = body.style;
			s.pixelHeight = menu.menuHeight + menu.menuBorder;
			s.height = s.pixelHeight + 'px';
			s.pixelWidth = menu.menuWidth + menu.menuBorder;
			s.width = s.pixelWidth + 'px';
			if( menu.menuBgOpaque ) s.backgroundColor = menu.bgColor;

			s = menuLayer.style;
			s.pixelWidth  = menu.menuWidth + (menu.menuBorder * 4);
			s.width = s.pixelWidth + 'px';
			s.pixelHeight  = menu.menuHeight+(menu.menuBorder*4);
			s.height = s.pixelHeight + 'px';
		}
	}
	if (document.captureEvents) document.captureEvents(Event.MOUSEUP);
	if (document.addEventListener) document.addEventListener("mouseup", onMenuItemOver, false);
	if (document.layers && window.innerWidth) {
		window.onresize = NS4resize;
		window.NS4sIW = window.innerWidth;
		window.NS4sIH = window.innerHeight;
		setTimeout("NS4resize()",500);
	}
	document.onmouseup = mouseupMenu;
	window.mmWroteMenu = true;
	status = "";
}

function NS4resize() {
	if (NS4sIW != window.innerWidth || NS4sIH != window.innerHeight) window.location.reload();
}

function onMenuItemOver(e, l) {
	MM_clearTimeout();
	l = l || this;
	a = window.ActiveMenuItem;
	if (document.layers) {
		if (a) {
			a.document.bgColor = a.saveColor;
			if (a.hilite) a.hilite.visibility = "hidden";
			if (a.Menu.bgImageOver) a.background.src = a.Menu.bgImageUp;
			a.focusItem.top = -100;
			a.clicked = false;
		}
		if (l.hilite) {
			l.document.bgColor = l.menuHiliteBgColor;
			l.zIndex = 1;
			l.hilite.visibility = "inherit";
			l.hilite.zIndex = 2;
			l.document.layers[1].zIndex = 1;
			l.focusItem.zIndex = this.zIndex +2;
		}
		if (l.Menu.bgImageOver) l.background.src = l.Menu.bgImageOver;
		l.focusItem.top = this.top;
		l.focusItem.left = this.left;
		l.focusItem.clip.width = l.clip.width;
		l.focusItem.clip.height = l.clip.height;
		l.Menu.hideChildMenu(l);
	} else if (l.style && l.Menu) {
		if (a) {
			a.style.backgroundColor = a.saveColor;
			if (a.hilite) a.hilite.style.visibility = "hidden";
			if (a.hiliteShim) a.hiliteShim.style.visibility = "inherit";
			if (a.Menu.bgImageUp) a.style.background = "url(" + a.Menu.bgImageUp +")";;
		} 
		l.style.backgroundColor = l.menuHiliteBgColor;
		l.zIndex = 1;
		if (l.Menu.bgImageOver) l.style.background = "url(" + l.Menu.bgImageOver +")";
		if (l.hilite) {
			l.hilite.style.visibility = "inherit";
			if( l.hiliteShim ) l.hiliteShim.style.visibility = "visible";
		}
		l.focusItem.style.pixelTop = l.style.pixelTop;
		l.focusItem.style.top = l.focusItem.style.pixelTop + 'px';
		l.focusItem.style.pixelLeft = l.style.pixelLeft;
		l.focusItem.style.left = l.focusItem.style.pixelLeft + 'px';
		l.focusItem.style.zIndex = l.zIndex +1;
		l.Menu.hideChildMenu(l);
	} else return;
	window.ActiveMenuItem = l;
}

function onMenuItemAction(e, l) {
	l = window.ActiveMenuItem;
	if (!l) return;
	hideActiveMenus();
	if (l.mmaction) eval("" + l.mmaction);
	window.ActiveMenuItem = 0;
}

function MM_clearTimeout() {
	if (mmHideMenuTimer) clearTimeout(mmHideMenuTimer);
	mmHideMenuTimer = null;
	mmDHFlag = false;
}

function MM_startTimeout() {
	if( window.ActiveMenu ) {
		mmStart = new Date();
		mmDHFlag = true;
		mmHideMenuTimer = setTimeout("mmDoHide()", window.ActiveMenu.Menu.hideTimeout);
	}
}

function mmDoHide() {
	if (!mmDHFlag || !window.ActiveMenu) return;
	var elapsed = new Date() - mmStart;
	var timeout = window.ActiveMenu.Menu.hideTimeout;
	if (elapsed < timeout) {
		mmHideMenuTimer = setTimeout("mmDoHide()", timeout+100-elapsed);
		return;
	}
	mmDHFlag = false;
	hideActiveMenus();
	window.ActiveMenuItem = 0;
}

function MM_showMenu(menu, x, y, child, imgname) {
	if (!window.mmWroteMenu) return;
	MM_clearTimeout();
	x = document.getElementById('mlbody').offsetLeft + document.getElementById('mltable').offsetLeft ;
	if (menu) {
		var obj = FIND(imgname) || document.images[imgname] || document.links[imgname] || document.anchors[imgname];
		x = moveXbySlicePos (x, obj);
		y = moveYbySlicePos (y, obj);
	}
	if (document.layers) {
		if (menu) {
			var l = menu.menuLayer || menu;
			l.top = l.left = 1;
			hideActiveMenus();
			if (this.visibility) l = this;
			window.ActiveMenu = l;
		} else {
			var l = child;
		}
		if (!l) return;
		for (var i=0; i<l.layers.length; i++) { 			   
			if (!l.layers[i].isHilite) l.layers[i].visibility = "inherit";
			if (l.layers[i].document.layers.length > 0) MM_showMenu(null, "relative", "relative", l.layers[i]);
		}
		if (l.parentLayer) {
			if (x != "relative") l.parentLayer.left = x || window.pageX || 0;
			if (l.parentLayer.left + l.clip.width > window.innerWidth) l.parentLayer.left -= (l.parentLayer.left + l.clip.width - window.innerWidth);
			if (y != "relative") l.parentLayer.top = y || window.pageY || 0;
			if (l.parentLayer.isContainer) {
				l.Menu.xOffset = window.pageXOffset;
				l.Menu.yOffset = window.pageYOffset;
				l.parentLayer.clip.width = window.ActiveMenu.clip.width +2;
				l.parentLayer.clip.height = window.ActiveMenu.clip.height +2;
				if (l.parentLayer.menuContainerBgColor && l.Menu.menuBgOpaque ) l.parentLayer.document.bgColor = l.parentLayer.menuContainerBgColor;
			}
		}
		l.visibility = "inherit";
		if (l.Menu) l.Menu.container.visibility = "inherit";
	} else if (FIND("menuItem0")) {
		var l = menu.menuLayer || menu;	
		hideActiveMenus();
		if (typeof(l) == "string") l = FIND(l);
		window.ActiveMenu = l;
		var s = l.style;
		s.visibility = "inherit";
		if (x != "relative") {
			s.pixelLeft = x || (window.pageX + document.body.scrollLeft) || 0;
			s.left = s.pixelLeft + 'px';
		}
		if (y != "relative") {
			s.pixelTop = y || (window.pageY + document.body.scrollTop) || 0;
			s.top = s.pixelTop + 'px';
		}
		l.Menu.xOffset = document.body.scrollLeft;
		l.Menu.yOffset = document.body.scrollTop;
	}
	if (menu) window.activeMenus[window.activeMenus.length] = l;
	MM_clearTimeout();
}

function onMenuItemDown(e, l) {
	var a = window.ActiveMenuItem;
	if (document.layers && a) {
		a.eX = e.pageX;
		a.eY = e.pageY;
		a.clicked = true;
    }
}

function mouseupMenu(e) {
	hideMenu(true, e);
	hideActiveMenus();
	return true;
}

function getExplorerVersion() {
	var ieVers = parseFloat(navigator.appVersion);
	if( navigator.appName != 'Microsoft Internet Explorer' ) return ieVers;
	var tempVers = navigator.appVersion;
	var i = tempVers.indexOf( 'MSIE ' );
	if( i >= 0 ) {
		tempVers = tempVers.substring( i+5 );
		ieVers = parseFloat( tempVers ); 
	}
	return ieVers;
}

function mouseoutMenu() {
	if ((navigator.appName == "Microsoft Internet Explorer") && (getExplorerVersion() < 4.5))
		return true;
	hideMenu(false, false);
	return true;
}

function hideMenu(mouseup, e) {
	var a = window.ActiveMenuItem;
	if (a && document.layers) {
		a.document.bgColor = a.saveColor;
		a.focusItem.top = -30;
		if (a.hilite) a.hilite.visibility = "hidden";
		if (mouseup && a.mmaction && a.clicked && window.ActiveMenu) {
 			if (a.eX <= e.pageX+15 && a.eX >= e.pageX-15 && a.eY <= e.pageY+10 && a.eY >= e.pageY-10) {
				setTimeout('window.ActiveMenu.Menu.onMenuItemAction();', 500);
			}
		}
		a.clicked = false;
		if (a.Menu.bgImageOver) a.background.src = a.Menu.bgImageUp;
	} else if (window.ActiveMenu && FIND("menuItem0")) {
		if (a) {
			a.style.backgroundColor = a.saveColor;
			if (a.hilite) a.hilite.style.visibility = "hidden";
			if (a.hiliteShim) a.hiliteShim.style.visibility = "inherit";
			if (a.Menu.bgImageUp) a.style.background = "url(" + a.Menu.bgImageUp +")";
		}
	}
	if (!mouseup && window.ActiveMenu) {
		if (window.ActiveMenu.Menu) {
			if (window.ActiveMenu.Menu.hideOnMouseOut) MM_startTimeout();
			return(true);
		}
	}
	return(true);
}

function hideChildMenu(hcmLayer) {
	MM_clearTimeout();
	var l = hcmLayer;
	for (var i=0; i < l.Menu.childMenus.length; i++) {
		var theLayer = l.Menu.childMenus[i];
		if (document.layers) theLayer.visibility = "hidden";
		else {
			theLayer = FIND(theLayer);
			theLayer.style.visibility = "hidden";
			if( theLayer.Menu.menuItemHAlign != 'left' ) {
				for(var j = 0; j < theLayer.Menu.menuItemLayers.length; j++) {
					var itemLayer = theLayer.Menu.menuItemLayers[j];
					if(itemLayer.textShim) itemLayer.textShim.style.visibility = "inherit";
				}
			}
		}
		theLayer.Menu.hideChildMenu(theLayer);
	}
	if (l.childMenu) {
		var childMenu = l.childMenu;
		if (document.layers) {
			l.Menu.MM_showMenu(null,null,null,childMenu.layers[0]);
			childMenu.zIndex = l.parentLayer.zIndex +1;
			childMenu.top = l.Menu.menuLayer.top + l.Menu.submenuYOffset;
			if( l.Menu.vertical ) {
				if( l.Menu.submenuRelativeToItem ) childMenu.top += l.top + l.parentLayer.top;
				childMenu.left = l.parentLayer.left + l.parentLayer.clip.width - (2*l.Menu.menuBorder) + l.Menu.menuLayer.left + l.Menu.submenuXOffset;
			} else {
				childMenu.top += l.top + l.parentLayer.top;	
				if( l.Menu.submenuRelativeToItem ) childMenu.left = l.Menu.menuLayer.left + l.left + l.clip.width + (2*l.Menu.menuBorder) + l.Menu.submenuXOffset;
				else childMenu.left = l.parentLayer.left + l.parentLayer.clip.width - (2*l.Menu.menuBorder) + l.Menu.menuLayer.left + l.Menu.submenuXOffset;
			}
			if( childMenu.left < l.Menu.container.clip.left ) l.Menu.container.clip.left = childMenu.left;
			var w = childMenu.clip.width+childMenu.left-l.Menu.container.clip.left;
			if (w > l.Menu.container.clip.width)  l.Menu.container.clip.width = w;
			var h = childMenu.clip.height+childMenu.top-l.Menu.container.clip.top;
			if (h > l.Menu.container.clip.height) l.Menu.container.clip.height = h;
			l.document.layers[1].zIndex = 0;
			childMenu.visibility = "inherit";
		} else if (FIND("menuItem0")) {
			childMenu = FIND(l.childMenu);
			var menuLayer = FIND(l.Menu.menuLayer);
			var s = childMenu.style;
			s.zIndex = menuLayer.style.zIndex+1;
			if (document.all || window.mmIsOpera) {
				s.pixelTop = menuLayer.style.pixelTop + l.Menu.submenuYOffset;
				if( l.Menu.vertical ) {
					if( l.Menu.submenuRelativeToItem ) s.pixelTop += l.style.pixelTop;
					s.pixelLeft = l.style.pixelWidth + menuLayer.style.pixelLeft + l.Menu.submenuXOffset;
					s.left = s.pixelLeft + 'px';
				} else {
					s.pixelTop += l.style.pixelTop;
					if( l.Menu.submenuRelativeToItem ) s.pixelLeft = menuLayer.style.pixelLeft + l.style.pixelLeft + l.style.pixelWidth + (2*l.Menu.menuBorder) + l.Menu.submenuXOffset;
					else s.pixelLeft = (menuLayer.style.pixelWidth-4*l.Menu.menuBorder) + menuLayer.style.pixelLeft + l.Menu.submenuXOffset;
					s.left = s.pixelLeft + 'px';
				}
			} else {
				var top = parseInt(menuLayer.style.top) + l.Menu.submenuYOffset;
				var left = 0;
				if( l.Menu.vertical ) {
					if( l.Menu.submenuRelativeToItem ) top += parseInt(l.style.top);
					left = (parseInt(menuLayer.style.width)-4*l.Menu.menuBorder) + parseInt(menuLayer.style.left) + l.Menu.submenuXOffset;
				} else {
					top += parseInt(l.style.top);
					if( l.Menu.submenuRelativeToItem ) left = parseInt(menuLayer.style.left) + parseInt(l.style.left) + parseInt(l.style.width) + (2*l.Menu.menuBorder) + l.Menu.submenuXOffset;
					else left = (parseInt(menuLayer.style.width)-4*l.Menu.menuBorder) + parseInt(menuLayer.style.left) + l.Menu.submenuXOffset;
				}
				s.top = top + 'px';
				s.left = left + 'px';
			}
			childMenu.style.visibility = "inherit";
		} else return;
		window.activeMenus[window.activeMenus.length] = childMenu;
	}
}

function hideActiveMenus() {
	if (!window.activeMenus) return;
	for (var i=0; i < window.activeMenus.length; i++) {
		if (!activeMenus[i]) continue;
		if (activeMenus[i].visibility && activeMenus[i].Menu && !window.mmIsOpera) {
			activeMenus[i].visibility = "hidden";
			activeMenus[i].Menu.container.visibility = "hidden";
			activeMenus[i].Menu.container.clip.left = 0;
		} else if (activeMenus[i].style) {
			var s = activeMenus[i].style;
			s.visibility = "hidden";
			s.left = '-200px';
			s.top = '-200px';
		}
	}
	if (window.ActiveMenuItem) hideMenu(false, false);
	window.activeMenus.length = 0;
}

function moveXbySlicePos (x, img) { 
	if (!document.layers) {
		var onWindows = navigator.platform ? navigator.platform == "Win32" : false;
		var macIE45 = document.all && !onWindows && getExplorerVersion() == 4.5;
		var par = img;
		var lastOffset = 0;
		while(par){
			if( par.leftMargin && ! onWindows ) x += parseInt(par.leftMargin);
			if( (par.offsetLeft != lastOffset) && par.offsetLeft ) x += parseInt(par.offsetLeft);
			if( par.offsetLeft != 0 ) lastOffset = par.offsetLeft;
			par = macIE45 ? par.parentElement : par.offsetParent;
		}
	} else if (img.x) x += img.x;
	return x;
}

function moveYbySlicePos (y, img) {
	if(!document.layers) {
		var onWindows = navigator.platform ? navigator.platform == "Win32" : false;
		var macIE45 = document.all && !onWindows && getExplorerVersion() == 4.5;
		var par = img;
		var lastOffset = 0;
		while(par){
			if( par.topMargin && !onWindows ) y += parseInt(par.topMargin);
			if( (par.offsetTop != lastOffset) && par.offsetTop ) y += parseInt(par.offsetTop);
			if( par.offsetTop != 0 ) lastOffset = par.offsetTop;
			par = macIE45 ? par.parentElement : par.offsetParent;
		}		
	} else if (img.y >= 0) y += img.y;
	return y;
}


////////////////////////////////////////////////////////////////////////////////
// from ASP js/emailcheck.js
////////////////////////////////////////////////////////////////////////////////
function emailCheck(chkStr) {
	// mail address のチェック
	var mailStr ='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~-._?/+';
	var chkFlg = 0;

// 	if (zenhanCount(chkStr) != 0) { return false }
	if (chkStr.charAt(0) == '@') { return false; }
	for (i = 0; i < chkStr.length; i ++) {
		if (mailStr.indexOf(chkStr.charAt(i)) == -1) {
			if (chkStr.charAt(i) != '@') { return false; }
			chkFlg = chkFlg + 10000;
        } else {
			if (chkStr.charAt(i) == '.') { chkFlg = chkFlg + 100; }
			else { chkFlg++; }
        }
    }
	if (chkFlg <= 10103 || chkFlg >= 20000) { return false; }
	if (chkFlg - (Math.floor(chkFlg / 100) * 100) <= 3) { return false; }
	return true;
}


////////////////////////////////////////////////////////////////////////////////
// from ASP js/denbunformat.js
////////////////////////////////////////////////////////////////////////////////
function denbunFormat(denbunStr, denbunLen, denbunType) {

// NXCOM用電文フォーマット　0:文字列 1:数値 5:半角カナ（全角カナで受け入れ） 6:文字列の場合のみ桁数オーバーのアラート表示

	var zenFlg = 0;
	var strCnt = 0;
	var strLen = 0;
	var formatedStr = '';
	var tmpStr = '';
	var tmpChr = '';
	var errorFlg = true;
	var zenkaku = 'ーあいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよらりるれろわゐゑをんぁぃぅぇぉゃゅょっ　';
	var zentoku = 'がぎぐげござじずぜぞだぢづでどばびぶべぼぱぴぷぺぽ';
	var hankaku = '-ｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜ  ｦﾝｱｲｳｴｵﾔﾕﾖﾂ ';
	var hantoku = 'ｶﾞｷﾞｸﾞｹﾞｺﾞｻﾞｼﾞｽﾞｾﾞｿﾞﾀﾞﾁﾞﾂﾞﾃﾞﾄﾞﾊﾞﾋﾞﾌﾞﾍﾞﾎﾞﾊﾟﾋﾟﾌﾟﾍﾟﾎﾟ';
	var delimit = String.fromCharCode(0x00);

	if (denbunType == 0 && escape('あ').charAt(1) == 'u') {
		for (i = 0; i < denbunLen; i ++) {
			tmpChr = escape(denbunStr.charAt(i))
			if (denbunStr.charAt(i) >= '｡' && denbunStr.charAt(i) <= 'ﾟ') {}
			else if (tmpChr.charAt(1) == 'u') {
				if (zenFlg == 0) {
					if (denbunLen - strCnt > 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 3;
						zenFlg ++;
						}
					else if (denbunLen - strCnt == 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 4;
						break
						}
					else {
						break
						}
					}
				else {
					if (denbunLen - strCnt > 3) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						}
					else if (denbunLen - strCnt == 3) {
						formatedStr = formatedStr + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 3;
						zenFlg = 0;
						break
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1
						zenFlg = 0;
						break
						}
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					if (denbunLen - strCnt > 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						}
					else if (denbunLen - strCnt == 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						break
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1;
						zenFlg = 0;
						break
						}
					}
				else {
					if (denbunLen - strCnt == 1) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 1
						break
						}
					formatedStr = formatedStr + denbunStr.charAt(i);
					strCnt = strCnt + 1
					}
				}
			}
		if (zenFlg > 0) {
			formatedStr = formatedStr + delimit;
			strCnt = strCnt + 1
			}
		if (denbunLen > strCnt) {
			for (i = 0; i < denbunLen - strCnt; i ++) {
				formatedStr = formatedStr + ' ';
				}
			}
		for (i = 0; i < formatedStr.length; i ++) {
			if (formatedStr.charAt(i) != delimit) {
				tmpStr = tmpStr + formatedStr.charAt(i);
				}
			}
		return tmpStr
		}

	if (denbunType == 0 && escape('あ').charAt(1) == '8') {
		for (i = 0; i < denbunLen; i ++) {
			tmpChr = escape(denbunStr.charAt(i))
			if (denbunStr.charAt(i) >= '｡' && denbunStr.charAt(i) <= 'ﾟ') {}
			else if ((tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '8') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '9') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'E') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'F')) {
				if (zenFlg == 0) {
					if (denbunLen - strCnt > 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 3;
						zenFlg ++;
						}
					else if (denbunLen - strCnt == 4) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 4;
						break
						}
					else {
						break
						}
					}
				else {
					if (denbunLen - strCnt > 3) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						}
					else if (denbunLen - strCnt == 3) {
						formatedStr = formatedStr + denbunStr.charAt(i) + delimit;
						strCnt = strCnt + 3;
						zenFlg = 0;
						break
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1
						zenFlg = 0;
						break
						}
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					if (denbunLen - strCnt > 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						}
					else if (denbunLen - strCnt == 2) {
						formatedStr = formatedStr + delimit + denbunStr.charAt(i);
						strCnt = strCnt + 2;
						zenFlg = 0;
						break
						}
					else {
						formatedStr = formatedStr + delimit;
						strCnt = strCnt + 1;
						zenFlg = 0;
						break
						}
					}
				else {
					if (denbunLen - strCnt == 1) {
						formatedStr = formatedStr + denbunStr.charAt(i);
						strCnt = strCnt + 1
						break
						}
					formatedStr = formatedStr + denbunStr.charAt(i);
					strCnt = strCnt + 1
					}
				}
			}
		if (zenFlg > 0) {
			formatedStr = formatedStr + delimit;
			strCnt = strCnt + 1
			}
		if (denbunLen > strCnt) {
			for (i = 0; i < denbunLen - strCnt; i ++) {
				formatedStr = formatedStr + ' ';
				}
			}
		for (i = 0; i < formatedStr.length; i ++) {
			if (formatedStr.charAt(i) != delimit) {
				tmpStr = tmpStr + formatedStr.charAt(i);
				}
			}
		return tmpStr
		}

	if (denbunType == 6 && escape('あ').charAt(1) == 'u') {
		for (i = 0; i < denbunStr.length; i ++) {
			tmpChr = escape(denbunStr.charAt(i))
			if (denbunStr.charAt(i) >= '｡' && denbunStr.charAt(i) <= 'ﾟ') {}
			else if (tmpChr.charAt(1) == 'u') {
				if (zenFlg == 0) {
					formatedStr = formatedStr + '<##';
					zenFlg ++;
					}
				else {
					formatedStr = formatedStr + '##';
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					formatedStr = formatedStr + '>@';
					zenFlg = 0;
					}
				else {
					formatedStr = formatedStr + '@';
					}
				}
			}
		if (zenFlg > 0) { formatedStr = formatedStr + '>' }
		if (denbunLen < formatedStr.length) {
			return false
			}
		else { return true }
		}

	if (denbunType == 6 && escape('あ').charAt(1) == '8') {
		for (i = 0; i < denbunStr.length; i ++) {
			tmpChr = escape(denbunStr.charAt(i))
			if (denbunStr.charAt(i) >= '｡' && denbunStr.charAt(i) <= 'ﾟ') {}
			else if ((tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '8') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == '9') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'E') || (tmpChr.charAt(0) == '%' && tmpChr.charAt(1) == 'F')) {
				if (zenFlg == 0) {
					formatedStr = formatedStr + '<##';
					zenFlg ++;
					}
				else {
					formatedStr = formatedStr + '##';
					}
				}
			else if (denbunStr.charAt(i) >= ' ' && denbunStr.charAt(i) <= '~') {
				if (zenFlg > 0) {
					formatedStr = formatedStr + '>@';
					zenFlg = 0;
					}
				else {
					formatedStr = formatedStr + '@';
					}
				}
			}
		if (zenFlg > 0) { formatedStr = formatedStr + '>' }
		if (denbunLen < formatedStr.length) {
			return false
			}
		else { return true }
		}

	if (denbunType == 1) {
		denbunStr = String(denbunStr);
		if (denbunLen < denbunStr.length) {
			formatedStr = denbunStr.substring(0,denbunLen)
			}
		else if (denbunLen == denbunStr.length) {
			formatedStr = denbunStr
			}
		else {
			formatedStr = denbunStr;
			for (i = 0; i < denbunLen - denbunStr.length; i ++) {
				formatedStr = '0' + formatedStr
				}
			}
		return formatedStr
		}

	if (denbunType == 5) {
		for (i = 0; i < denbunStr.length; i ++) {
			tmpStr = zenkaku.indexOf(denbunStr.charAt(i));
			if (tmpStr >= 0) { formatedStr = formatedStr + hankaku.charAt(tmpStr) }
			else {
				tmpStr = zentoku.indexOf(denbunStr.charAt(i));
				if (tmpStr >= 0) { formatedStr = formatedStr + hantoku.charAt(tmpStr * 2) + hantoku.charAt(tmpStr * 2 + 1) }
				else { formatedStr = formatedStr + ' ' }
				}
			}
		if (denbunLen < formatedStr.length) {
			formatedStr = formatedStr.substring(0,denbunLen)
			}
		else if (denbunLen > formatedStr.length) {
			cnt = denbunLen - formatedStr.length;
			for (i = 0; i < cnt; i ++) {
				formatedStr = formatedStr + ' '
				}
			}
		return formatedStr
		}
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

        // ▼R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
        if(objFld.value=="0260"){
            var objArr = OSUSUME_10_KEYWORD;
        }
        // ▲R-#16279_【新商品対応】めぐりの結晶 2014/12/15 nul-motoi
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
        if(document.mail.OSUSUME_4.checked==true){
            $wkCheck = false;
        }else{
            $wkCheck = true;
        }

        document.mail.OSUSUME_4.checked = $wkCheck;
        document.mail.OSUSUME_5.checked = $wkCheck;
        document.mail.OSUSUME_6.checked = $wkCheck;
        document.mail.OSUSUME_7.checked = $wkCheck;
    }

    if(setNo==3){
        if(document.mail.OSUSUME_1.checked==true){
            $wkCheck = false;
        }else{
            $wkCheck = true;
        }

        document.mail.OSUSUME_1.checked = $wkCheck;
        document.mail.OSUSUME_2.checked = $wkCheck;
        document.mail.OSUSUME_3.checked = $wkCheck;
    }

}

