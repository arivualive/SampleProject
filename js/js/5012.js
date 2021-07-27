// ��Add for mobile
function changeMlBodyStrPc(maxchar, changeBg) {
    setStrCount2("mlBodyMsgPc", document.form_inp.mail_body1.value, maxchar, changeBg);
}
function changeMlBodyStrMb(maxchar, changeBg) {
    setStrCount2("mlBodyMsgMb", document.form_inp.mail_body2.value, maxchar, changeBg);
}

function setStrCount2(objId, str, maxchar, changeBg) {
    if (str.indexOf("\r\n") == -1) {
        if (str.indexOf("\n") != -1) {
            // windows firefox?
            str = str.replace(/\n/g, "12");
        } else if (str.indexOf("\r") != -1) {
            // ?
            str = str.replace(/\r/g, "12");
        }
    }

    var chars = fncGetLength(str);
    var text  = str.length + "�����i" + chars + "�o�C�g�j";

    var obj = document.getElementById(objId);
    obj.replaceChild(document.createTextNode(text), obj.childNodes[0]);
    
    var obj2 = document.getElementById(objId + "2");
    obj2.replaceChild(document.createTextNode(text), obj2.childNodes[0]);
    document.getElementById('mail_body1').style.background = "#FFFFFF";
    if (chars > maxchar) {
        if (objId === 'mlBodyMsgMb') {
            var errorObj = document.getElementById('errorMessage');
            errorObj.style.color = 'red';
            errorObj.style.fontWeight = 'bold';
            errorObj.innerText = '�S�p' + maxchar / 2 + '�����𒴂��Ă��܂��B';
            if (changeBg === true) {
                document.getElementById('mail_body2').style.background = "#9BCFE8";
            }
            
        }
    } else {
        if (objId === 'mlBodyMsgMb') {
            var errorObj = document.getElementById('errorMessage');
            errorObj.innerText = '';
            if (changeBg === true) {
                document.getElementById('mail_body2').style.background = "#FFFFFF";
            }
        }
    }
}
// ��Add for mobile




// 
function myCheck(obj, num, name, arg) {
    if (fncTrim(obj.value) == "") {
        fncAlert(name + "����͂��Ă�������" , obj);
        return false;
    }
    if (arg == "zen") {
        if(obj.value.length > num){
            fncAlert(name + "�͑S�p" + num + "�����ȓ��œ��͂��Ă�������" , obj);
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

function myCheck2(obj, num, name, arg, warning) {
    var message;
    if (warning == undefined) {
        message = '';
    }

    if (fncTrim(obj.value) == "") {
        fncAlert(name + "����͂��Ă�������" , obj);
        return false;
    }
    if (arg == "zen") {
        if(obj.value.length > num){
            if (warning == undefined) {
                message = name + '�͑S�p' + num + "�����ȓ��œ��͂��Ă�������";
                fncAlert(message, obj);
                return false;
            } else {
                message = name + '�͑S�p' + num + "�����𒴂��Ă��܂�";
                if (window.confirm(message) === false) {
                    obj.focus();
                    return false;
                } else {
                    return true;
                }
            }
            
            return true;
        } else {
            return true;
        }
    }else if(fncGetLength(obj.value) > num){
        if (warning == undefined) {
            message = name + '�͑S�p' + num / 2 + "�����ȓ��œ��͂��Ă�������";
            fncAlert(message, obj);
            return false;
        } else {
            message = name + '�͔��p' + num + "�o�C�g�𒴂��Ă��܂�";
            if (window.confirm(message) === false) {
                obj.focus();
                return false;
            } else {
                return true;
            }
        }
    } else {
        return true;
    }
}

function InputChk() {
    with (document.form_inp){
        if(myCheck2(mail_name, 200, "���[����", "han") == false ||
           myCheck2(mail_exp, 3000, "���[������", "han") == false ||
           myCheck2(mail_subject1, 256, "�薼�i�o�b�j", "han") == false ||
           myCheck2(mail_subject2, 30, "�薼�i�g�сj", "han") == false ||
           myCheck2(mail_body1, 4000, "���[�����e�i�o�b�j", "han") == false ||
           myCheck2(mail_body2, 3000, "���[�����e�i�g�сj", "han") == false ||
           myCheck2(mail_from1, 256, "���[����From�i�o�b�j", "han") == false ||
           myCheck2(mail_from2, 256, "���[����From�i�g�сj", "han") == false ||
           myCheck(sort_no, 3, "�\�����i�Ǘ��p�j") == false)
            return false;
        if(fncJudgeNumber(sort_no.value) == false ||
                sort_no.value <= 0){
            fncAlert("�\�����i�Ǘ��p�j��1�ȏ�̐����œ��͂��Ă�������",sort_no);
            return false;
        }
        if(!fncEditConfirm()){
            return false;
        }
    }
}
