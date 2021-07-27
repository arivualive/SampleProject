<?php
    require_once $ROOT_PATH.'/js/mail_common.js';
?>

window.onload = function() {
    if (document.getElementById("userComment")) {
        var mode = document.form_inp.mode_prm.value;
        if (mode == 'input') {
            return chkLength(document.getElementById("userComment"));
        }
    }
}

function allCheckOnOff() {
    var checked = document.getElementById("all_check").checked;
    var max = document.frm.elements.length;

    for (var ii = 0; ii < max; ii++) {
        if (document.frm.elements[ii].name != "select[]") continue;
        if (document.frm.elements[ii].type != "checkbox") continue;
            document.frm.elements[ii].checked = checked;
    }
}

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

function FindCheck2101() {
    with (document.frm){
        if (! myCheckLength(skainno, 8, "���q�l�ԍ�", "kainno") ||
            ! myCheckLength(snickname, 15, "�j�b�N�l�[��", "zen"))
            return false;
        //�j�b�N�l�[�����p�������̓`�F�b�N
        if ( snickname.value.match(/^[\x20-\x7e]+/) || snickname.value.match(/^[�-�]+/)) { 
            fncAlert("�j�b�N�l�[���́A�S�p�œ��͂��Ă��������B" , snickname);
            return false;
        }
        //���t�`�F�b�N
        if(sstartdate.value != "" ){
            //�J�n���`�F�b�N
            //�t�H�[�}�b�g�`�F�b�N
            var matches = /^(\d+)\/(\d+)\/(\d+)$/.exec(sstartdate.value);
            if(!matches) {
                fncAlert("���͊��Ԃ́u�J�n���v�𐳂������͂��Ă��������B" , sstartdate);
                return false;
            }
            var y = parseInt(matches[1]);
            var m = parseInt(matches[2]);
            var d = parseInt(matches[3]);

            var start = y + ("00" + m ).slice(-2) + ("00" + d ).slice(-2);

            //�Ó��`�F�b�N
            if (fncChkDate(start) == "") {
                fncAlert("���͊��Ԃ́u�J�n���v�𐳂������͂��Ă��������B" , sstartdate);
                return false;
            }
        }

        if(senddate.value != "" ){
            //�I�����`�F�b�N
            //�t�H�[�}�b�g�`�F�b�N
            var matches = /^(\d+)\/(\d+)\/(\d+)$/.exec(senddate.value);
            if(!matches) {
                fncAlert("���͊��Ԃ́u�I�����v�𐳂������͂��Ă��������B" , senddate);
                return false;
            }
            var y = parseInt(matches[1]);
            var m = parseInt(matches[2]);
            var d = parseInt(matches[3]);

            var end = y + ("00" + m ).slice(-2) + ("00" + d ).slice(-2);

            //�Ó��`�F�b�N
            if (fncChkDate(end) == "") {
                fncAlert("���͊��Ԃ́u�I�����v�𐳂������͂��Ă��������B" , senddate);
                return false;
            }
        }

        if(start != "" && end != "" ){
            //�͈͎w��Ó��`�F�b�N
            if(start > end){
                fncAlert("���͊��Ԃ́u�J�n���v���u�I�����v�œ��͂��Ă��������B" , sstartdate);
                return false;
            }
        }
    }

    return true;
}

function chkUpd() {
    var bHit = false;
    var max = document.frm.elements.length;
    for (var ii = 0; ii < max; ii++) {
        var obj = document.frm.elements[ii];

        // �`�F�b�N�{�b�N�X�Ŗ����ꍇ
        if (obj.type != "checkbox") continue;
        // id���uselect**�v�Ŗ����ꍇ
        var id = document.frm.elements[ii].id;
        if (!id.match(/^select[0-9]+$/)) continue;

        // �`�F�b�N�{�b�N�X��ON
        if (document.frm.elements[ii].checked) {
            bHit = true;
            break;
        }
    }

    // 1���`�F�b�N�������ĂȂ��ꍇ
    if (!bHit) {
        alert("�R�����g��I�����Ă��������B");
        return false;
    }

    return true;
}

function jsChkUpd() {
    var max = document.frm.elements.length;
    var list = new Array();
    var rowcnt = -1;

    for (var ii = 0; ii < max; ii++) {
        var obj = document.frm.elements[ii];

        if (obj.type == "checkbox") {
            if (obj.checked) {
                list[rowcnt] = obj.value;
            }
            rowcnt++;
        }
    }

    document.frm.mode.value='upd';
    document.frm.updlist.value = list;
    document.frm.submit();
}

function jsRegist(dtlno, kainno) {
    window.open('../2089/input.php?mode=add&mode_prm=input&dtlno='+dtlno+'&kainno='+kainno,'','width=700,height=725,scrollbars=yes');
}

function jsEdit(newsId, memoDt, newsKind, commentId, userType) {
    window.open('./input.php?mode=edit&mode_prm=input&newsId='+newsId+'&memoDt='+memoDt+'&newsKind='+newsKind+'&commentId='+commentId+'&userType='+userType,'','width=650,height=725,scrollbars=yes');
}

function InputChk(inMode, id) {

    if(inMode == "FINISH"){
        document.form_inp.submit();
        return true;
    }

    if(inMode == "DELETE"){
        document.form_inp.mode_ctl.value = inMode;
        document.form_inp.submit();
        return true;
    }

    if(inMode == "CANCEL" || inMode == 'BACK'){
        document.form_inp.mode_ctl.value = inMode;
        if(id != ''){
            document.form_inp.action = "detail.php?id=" + id;
        } else {
            document.form_inp.action = "list.php";
        }
        document.form_inp.submit();
        return true;
    }

    with (document.form_inp){
        if (fncTrim(userComment.value) == "") {
            fncAlert("�R�����g����͂��Ă�������" , userComment);
            return false;
        }
        if(fncGetLength(userComment.value) > 800){
            fncAlert("�R�����g��400�����ȓ��œ��͂��Ă�������" , userComment);
            return false;
        }
        if(userComment.value.match(/\n/)){
            fncAlert("���s�͓��͂��Ȃ��ł�������" , message);
            return false;
        }

        document.form_inp.mode_ctl.value = inMode;
        document.form_inp.submit();
        return true;
    }
}

function DetailOpen(kainno, action_url) {
    document.frm.kainno.value = kainno;
    document.frm.action = 'detail.php';
    document.frm.back_action.value = action_url;
    document.frm.submit();
}

function jsCalendarClose(){
    if(!window.opener || window.opener.closed){
        //�e�E�B���h�E�����݂��Ȃ�
        window.self.close();
    } else {
        parent.window.opener.document.frm.mode.value='upd';
        parent.window.opener.document.frm.submit();
        window.self.close();
    }
}

function jsCalendarCancel(mode) {
    document.form_inp.mode.value = mode;
    document.form_inp.mode_prm.value = 'input';
    document.form_inp.mode_ctl.value = '';
    document.form_inp.action = "input.php";
    document.form_inp.submit();
}

function chkLength(obj) {
    var objname = document.getElementById('textCountDown');
    var now_length = 200 - obj.value.length;
    objname.innerHTML = now_length;
    if (now_length < 0) { 
        objname.style.color = "#ff0000";
    }else{
        objname.style.color = "#000000";
    }
}

function jsFollowInsUpd() {
    var fstatus = document.getElementById('fstatus');
    document.frm_fw.mode.value = 'ins_upd_fw';
    document.frm_fw.f_memo.value = document.getElementById('fmemo').value;
    document.frm_fw.submit();
}

function jsMsgDel(dtl_no) {

        document.form_del.dtl_no.value = dtl_no;
        document.form_del.mode.value = 'delete';
        document.form_del.submit();

}

function SelectFirst(){

        document.frm.sevent.disabled = true;
        document.frm.sevent.checked = false;
        document.frm.schallenge.disabled = true;
        document.frm.schallenge.checked = false;
        document.frm.sstatuscomp.disabled = false;
        document.frm.sstatusover.disabled = false;
}

function SelectMember(){

        document.frm.sevent.disabled = false;
        document.frm.schallenge.disabled = false;
        document.frm.sstatuscomp.disabled = true;
        document.frm.sstatuscomp.checked = false;
        document.frm.sstatusover.disabled = true;
        document.frm.sstatusover.checked = false;

}

function jsChallengeOpen(chal_id,data_kind){
        document.form_chal.challenge_id.value = chal_id;
        document.form_chal.data_kind.value = data_kind;
        document.form_chal.action = "challengedetail.php";
        document.form_chal.submit();

}