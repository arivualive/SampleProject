<?php
	require_once $ROOT_PATH.'/js/mail_common.js';
?>

function HiddenValAdd(pmode,mailtraceid,printstatekbn){
    with (document.list){
        if (typeof pmode === "undefined") {
            pMode.value ="";
        }else{
            pMode.value =pmode;
        }
        if (mailtraceid) {
            var wk_kainno = "Kainno"+ mailtraceid;
            var wk_ruteKbn = "RuteKbn"+ mailtraceid;
            var wk_contactkbn = "ContactKbn"+ mailtraceid;
            var wk_communicatormemo = "CommunicatorMemo"+mailtraceid;
            var wk_actionstatus = "ActionStatus"+mailtraceid;
            var wk_email = "Email"+mailtraceid;
            var wk_filterno = "FilterNo"+mailtraceid;
			// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/22 TienPV
			var wk_communicator = 'Communicator' + mailtraceid;
			// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/22 TienPV

            MailTraceId.value =mailtraceid;
            PrintStateKbn.value = printstatekbn;
            Kainno.value = document.getElementsByName(wk_kainno)[0].value;
            RuteKbn.value =document.getElementsByName(wk_ruteKbn)[0].value;
            ContactKbn.value =document.getElementsByName(wk_contactkbn)[0].value;
            CommunicatorMemo.value =document.getElementsByName(wk_communicatormemo)[0].value;
            ActionStatus.value =document.getElementsByName(wk_actionstatus)[0].value;
            Email.value =document.getElementsByName(wk_email)[0].value;
            FilterNo.value =document.getElementsByName(wk_filterno)[0].value;
			// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/22 TienPV
			Communicator.value = document.getElementsByName(wk_communicator)[0].value;
			// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/22 TienPV
        }
    }
}

var status_val;
var new_val;
var communicator;
function chkInputDate(mode,mailtraceid,printstatekbn) {
   var return_flg = true;
   var p_mode;
   switch(mode){
        case 'search':
            if (chkDate(document.list.SearchFrom.value,document.list.SearchTo.value) == false){
                return_flg = false;
            }
            var searchKainno = document.list.SearchKainno.value;
            if (chkKainno(searchKainno) === false && searchKainno != ''){
                return_flg = false;
            }
            p_mode = "search";
            break;
        case 'update':
            var wk_kainno = "Kainno"+ mailtraceid;
            var wk_ruteKbn = "RuteKbn"+ mailtraceid;
            var wk_contactkbn = "ContactKbn"+ mailtraceid;
            var wk_communicatormemo = "CommunicatorMemo"+mailtraceid;

            if (chkKainno(document.getElementsByName(wk_kainno)[0].value) === false){
                return_flg = false;
                break;
            }
            if (chkRuteKbn(document.getElementsByName(wk_ruteKbn)[0].value) === false){
                return_flg = false;
                break;
            }
            if (chkContactKbn(document.getElementsByName(wk_contactkbn)[0].value) === false){
                return_flg = false;
                break;
            }
            if (chkCommunicatorMemo(document.getElementsByName(wk_communicatormemo)[0].value) === false){
                return_flg = false;
                break;
            }
			// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/30 HanhTV
			var user_id_login = document.getElementsByName("UserIDLogin")[0].value;
			var user_login_name = document.getElementsByName("UserNameLogin")[0].value;

			// ���݂̑I��l��2:[�m�F�ς�]�ŁA�V�����I��l��0:[������]�ŁA�S���҂����݂��邩�m�F����B
			if (status_val == 2 && new_val == 0 && communicator != 'null') {
				// �Ή���Ԃ�[�m�F�ς�]����[������]�ɕύX���������Ɋm�F���b�Z�[�W��\������B
				if (!confirm(user_login_name + "����A�Ή���Ԃ�ύX���܂����A��낵���ł����H")) {
					document.getElementsByName("StatusKey"+mailtraceid)[0].value = status_val;
					document.getElementsByName("ActionStatus"+mailtraceid)[0].value = status_val;
					return_flg = false;
				} else {
					return_flg = true;
				}
			}
			// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/30 HanhTV
            p_mode = "updTraceData";
    }
    if (return_flg === true) {
        HiddenValAdd(p_mode,mailtraceid,printstatekbn);
    }
    return return_flg;
}

function chkDateFormat(datestr,dateflg) {
    with (document.list){
        var err_flg = false;
        var arydate;
        var aryYmdDate;
        var convstr;
        var ymdstr;
        var ymdhmstr;

        //������̒��Ɂu0�`9�v�A�u �v�A�u/�v�A�u:�v�ȊO�������Ă���ꍇ�̓G���[
        if (datestr.match(/[^\d /:]/)) {
            err_flg = true;
        }
        //���̓f�[�^��N�����Ǝ����Ŕz��ɕ���
        arydate = datestr.split(' ');

        if(!err_flg && !arydate[0].match(/^\d{4}\/\d{2}\/\d{2}/)){
            if (datestr.indexOf('/') == -1) {
                err_flg = true;
            }else{
                //���̓f�[�^��N�A���A���Ŕz��ɕ���
                aryYmdDate = arydate[0].split('/');

                //�l�̑��݃`�F�b�N
                if (typeof aryYmdDate[0] ==="undefined" || typeof aryYmdDate[1] ==="undefined" || typeof aryYmdDate[2] ==="undefined") {
                    err_flg = true;

                //�N�����̌����`�F�b�N
                }else if  (aryYmdDate[0].length > 4 || aryYmdDate[1].length > 2 || aryYmdDate[2].length > 2) {
                    err_flg = true;
                //�N��4���Ŗ����ꍇ�̓G���[
                }else if (aryYmdDate[0].length < 4) {
                    err_flg = true;
                }
                if (!err_flg && !isNaN(parseInt(aryYmdDate[0]))
                   && !isNaN(parseInt(aryYmdDate[1]))
                   && !isNaN(parseInt(aryYmdDate[2]))) {
                   //������0�p�f�B���O���A�N�����𐬌`
                   ymdstr = aryYmdDate[0] + "/" + ('00' + aryYmdDate[1]).slice(-2) + "/" + ('00' + aryYmdDate[2]).slice(-2);
                   if (typeof arydate[1] !== "undefined") {
                       ymdhmstr = ymdstr + " " + arydate[1];
                       datestr = ymdhmstr;
                       if (dateflg=='from') {
                           SearchFrom.value = datestr;
                       }else if (dateflg=='to'){
                           SearchTo.value = datestr;
                       }
                   }else{
                       datestr = ymdstr;
                   }
                }else{
                    err_flg = true;
                }
            }
        }
        //���̓f�[�^�̃t�H�[�}�b�g�`�F�b�N
        if(!err_flg && typeof arydate[1] !== "undefined" && !arydate[1].match(/^\d{2}\:\d{2}$/)){
            //�����̓��͒l���`�F�b�N(���͒l�Ɍ�肪�L��ꍇ�̓G���[���b�Z�[�W�\��)
            convstr = convTime(arydate[1]);
            if (convstr === false) {
                err_flg = true;
            }else{
                if (dateflg=='from') {
                    SearchFrom.value = datestr.substr(0,10) + " " + convstr;
                }else if (dateflg=='to') {
                    SearchTo.value = datestr.substr(0,10)  + " " + convstr;
                }
            }
        //���������������͂���Ă���ꍇ�A�܂��͎��������͂���Ă��Ȃ��ꍇ
        }else{
            //���͂��N�����̂ݓ��͂���Ă���ꍇ�͎����������ŕt����ifrom:00:00 to:23:59�j
            if (typeof arydate[1] === "undefined") {
                if (dateflg=='from') {
                    SearchFrom.value = datestr.substr(0,10)  + ' 00:00';
                }else if (dateflg=='to') {
                    SearchTo.value = datestr.substr(0,10)  + ' 23:59';
                }
            }
        }
        return err_flg;
    }
}

function convTime(str) {

    //�l�̃`�F�b�N
    if (typeof str === "undefined") {
        return false;
    }
    //str�̌`���́u���F���v
    //�`���ȊO�̏ꍇ�̓G���[
    if (str.indexOf(':') == -1) {
        return false;
    }else{
        //������z��ɕ���
        var aryHourMin = str.split(':');

        //�����`�F�b�N
        if (aryHourMin[0].length > 2 || aryHourMin[1].length > 2) {
            return false;
        }
        //������ѕ������l���m�F���A���l��1���̏ꍇ��0���߂���
        if (!isNaN(parseInt(aryHourMin[0]))
            && !isNaN(parseInt(aryHourMin[1]))) {
            return ('00' + aryHourMin[0]).slice(-2) + ":" + ('00' + aryHourMin[1]).slice(-2);
        }else{
            return false;
        }
    }
}

function chkDateValidity(Year,Month,Day,Hours,Minutes){
    if(Month >= 0 && Month <= 11 && Day >= 1 && Day <= 31 && Hours >=0 && Hours <=23 && Minutes >= 0 && Minutes <= 59){
        var vDt = new Date(Year, Month, Day,Hours,Minutes);
        var err_flg = false;
        if(isNaN(vDt)){
            err_flg = true;
        }else if(vDt.getFullYear() == Year
                 && vDt.getMonth() ==Month
                 && vDt.getDate() == Day
                 && vDt.getHours() ==Hours
                 && vDt.getMinutes() == Minutes ){
            err_flg = false;
        }
    }else{
        err_flg = true;
    }
    return err_flg;
}

function chkDate(fromdate,todate) {

    //���͒l���g���~���O
    fromdate = fromdate.replace(/^[\s�@]+|[\s�@]+$/g, "");
    todate   = todate.replace(/^[\s�@]+|[\s�@]+$/g, "");

    //�N�����Ǝ����̊Ԃɕ����󔒂����͂��ꂽ�ꍇ�A1�����󔒂ɒu��
    fromdate = fromdate.replace(/(\s)\1+/,' ');
    todate = todate.replace(/(\s)\1+/,' ');


    document.list.SearchFrom.value = fromdate;
    document.list.SearchTo.value = todate;

    // ���t�̑Ó����`�F�b�N�y�я����`�F�b�N�J�n
    if (fromdate !="" &&chkDateFormat(fromdate,'from') == true){
        alert("���������́u��M�����i�e�q�n�l�j�v�𐳂������͂��Ă��������B");
        return false;
    }
    if (todate != "" && chkDateFormat(todate,'to')== true){
        alert("���������́u��M�����i�s�n�j�v�𐳂������͂��Ă��������B");
        return false;
    }

    var chkfromdate = document.list.SearchFrom.value;
    var chktodate = document.list.SearchTo.value;

    var fYear = chkfromdate.substr(0, 4);
    var fMonth = chkfromdate.substr(5, 2) - 1; // Javascript�́A0-11�ŕ\��
    var fDay = chkfromdate.substr(8, 2);
    var fHours = chkfromdate.substr(11, 2);
    var fMinutes = chkfromdate.substr(14, 2);

    var tYear = chktodate.substr(0, 4);
    var tMonth = chktodate.substr(5, 2) - 1; // Javascript�́A0-11�ŕ\��
    var tDay = chktodate.substr(8, 2);
    var tHours = chktodate.substr(11, 2);
    var tMinutes = chktodate.substr(14, 2);

    // ���t�̒l�`�F�b�N
    if ((chkfromdate !="" && fncChkDate(chkfromdate.substr(0, 4) + chkfromdate.substr(5, 2) + chkfromdate.substr(8, 2)) === false)
        || (chkfromdate !="" && chkDateValidity(fYear,fMonth,fDay,fHours,fMinutes))) {
        alert("���������́u��M�����i�e�q�n�l�j�v�𐳂������͂��Ă��������B");
        return false;
    }

    if ((chktodate !="" && fncChkDate(chktodate.substr(0, 4)  + chktodate.substr(5, 2) + chktodate.substr(8, 2)) === false)
        || (chktodate != "" && chkDateValidity(tYear,tMonth,tDay,tHours,tMinutes))) {
        alert("���������́u��M�����i�s�n�j�v�𐳂������͂��Ă��������B");
        return false;
    }

    // from to �̐������`�F�b�N�J�n
    if (chkfromdate !="" && chktodate != "") {
        var start = fYear.toString() + ("00" + (parseInt(fMonth) + 1).toString()).slice(-2) + ("00" + fDay.toString()).slice(-2) + ("00" + fHours.toString()).slice(-2) + ("00" + fMinutes.toString()).slice(-2);
        var end = tYear.toString() + ("00" + (parseInt(tMonth) + 1).toString()).slice(-2) + ("00" + tDay.toString()).slice(-2) + ("00" + tHours.toString()).slice(-2) + ("00" + tMinutes.toString()).slice(-2);

        if (parseInt(start) == parseInt(end)) {
            alert("���������́u��M�����i�e�q�n�l�j�v�Ɓu��M�����i�s�n�j�v�ɓ��������͓��͂ł��܂���B1���ȏ�̊Ԃ������ē��͂��Ă��������B");
            return false;
        }

        if (parseInt(start) > parseInt(end)) {
            alert("���������́u��M�����i�e�q�n�l�j�v���u��M�����i�s�n�j�v�œ��͂��Ă��������B");
            return false;
        }
    }
    // from to �̐������`�F�b�N�I��

}

function PrintJob(mail_trace_id,kainno_get_kbn,mail_body_contact_kbn,mail_body_id,print_state_kbn) {

    var wk_ruteKbn = "RuteKbn"+ mail_trace_id;
    var wk_contactkbn = "ContactKbn"+ mail_trace_id;

    var uke_kbn = document.getElementsByName(wk_ruteKbn)[0].value;
    var contact_kbn = document.getElementsByName(wk_contactkbn)[0].value;

    var popup_print_flg = false;
    if (uke_kbn == 4) {
        popup_print_flg = true;
    } else if (contact_kbn == 91 || contact_kbn == 92 || contact_kbn == 93 || contact_kbn == 94 || contact_kbn == 99){
        popup_print_flg = true;
    } else if (kainno_get_kbn == 2) {
        popup_print_flg = true;
    }

    if (popup_print_flg === true) {
       if ((mail_body_contact_kbn == "1031" || mail_body_contact_kbn == "1050") && mail_body_id) {
           window.open('/2019/'+mail_body_contact_kbn+'.php?mail_trace_id='+mail_trace_id+'&print_state_kbn=2&mail_body_id='+mail_body_id+'','printtool','width=800, height=600, menubar=no, toolbar=no, scrollbars=yes');
       }else{
           window.open('/2019/preview.php?mail_trace_id='+mail_trace_id+'&print_state_kbn=2','printjob','width=800, height=600, menubar=no, toolbar=no, scrollbars=yes');
       }
    }else{
        if (print_state_kbn == 2) {
            print_ret = true;
        } else {
            print_ret = confirm("WAO�ɃR���^�N�g�ƃX�L���i�[�C���[�W���쐬���܂��B��낵���ł����H");
        }
        if (print_ret == true) {
            HiddenValAdd('updPrintStat',mail_trace_id,1);
            document.list.submit();
        }
    }
}

function CompiledPrint(){
	// �uOK�v���̏����J�n �{ �m�F�_�C�A���O�̕\��
	if(window.confirm('WAO�ɃR���^�N�g�ƃX�L���i�[�C���[�W���ꊇ�쐬���܂��B\n��낵���ł����H')){
		HiddenValAdd('updPrintStatMulti',"","");
		document.list.submit();
	}
}

function CompiledConfirm(){
	// �uOK�v���̏����J�n �{ �m�F�_�C�A���O�̕\��
	if(window.confirm('�`�F�b�N�������Ă��郁�[�������ׂ�"�m�F�ς�"�ɂ��܂��B\n��낵���ł����H')){
		HiddenValAdd('updConfirmStatMulti',"","");
		document.list.submit();
	}
}
function PrintActiveChange(mail_trace_id) {
    document.getElementsByName("PrintButton"+mail_trace_id)[0].disabled = true;

    // �ꊇ������ł��Ȃ��悤�ɂ���
    document.getElementById("compiledPrint").disabled = true;
    document.getElementById("compiledConfirm").disabled = true;

	// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� HanhTV 22/05/2018
	status_val = document.getElementsByName("StatusKey"+mail_trace_id)[0].value;
	new_val = document.getElementsByName("ActionStatus"+mail_trace_id)[0].value;
	communicator = document.getElementsByName("Communicator"+mail_trace_id)[0].value;
	// �B���t�H�[���ɐV�����l��ݒ肷��
	document.getElementsByName("StatusKey"+ mail_trace_id)[0].value = new_val; 
	// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� HanhTV 22/05/2018
}

function chkKainno(str){
	if(str.match(/[\D]/)){
		alert("�u����ԍ��v�͔��p�����œ��͂��Ă��������B");
		return false;
	}
	return true;
}

function chkRuteKbn(str){
    if (str == "" || str === "0") {
        alert("�u���v��I�����Ă��������B");
        return false;
    }
    return true;
}

function chkCommunicatorMemo(str){
    var cnt = 0;
    for (i=0; i<str.length; i++) {
        cnt = cnt + 1;
    }
    if (cnt > 200) {
        alert("�u�X�s���U�[�����v��200�����ȓ��œ��͂��Ă��������B");
        return false;
    }
    return true;
}

function chkContactKbn(str){
    if (str == "" || str === "0") {
        alert("�u�R���^�N�g���e�v��I�����Ă��������B");
        return false;
    }
    return true;
}

function PrintPage(mailtraceid,printstatekbn){

    opener.HiddenValAdd('updPrintStat',mailtraceid,printstatekbn);
    opener.document.list.submit();
    if(document.getElementById || document.layers){
        //����E�B���h�E��\��
        window.print();
    }
}

// �I���������ɂ��A�I���ł���R���^�N�g���e�𐧌�
function makeContactKbn(mail_trace_id, contact_kbn){

    var contact_kbn_list = new Array();

    // ���FPC
    contact_kbn_list[1] = new Array();
    contact_kbn_list[1][1]  = '��т̐�';
    contact_kbn_list[1][2]  = 'Net����֘A';
    contact_kbn_list[1][3]  = 'TELDM�֘A';
    contact_kbn_list[1][4]  = '�����֘A';
    contact_kbn_list[1][5]  = '�N���[���E�v�]';
    contact_kbn_list[1][90] = '���̑��⍇��';
    // ��R-#16070_�Ǘ���ʂ̃��j���[���̂̏C�� 2014/11/12 nul-motoi
    contact_kbn_list[1][20] = '�����ăv���[�U�[';
    contact_kbn_list[1][30] = 'WEB�J���o�^';
    contact_kbn_list[1][31] = 'WEB�J���A���P�[�g';
    contact_kbn_list[1][42] = '�p�E�`�E�^�I�����p';
    contact_kbn_list[1][43] = '�p�E�`�E�^�I�����p�폜';
    contact_kbn_list[1][50] = '�N�`�R�~���e';
    contact_kbn_list[1][60] = '�Љ�';
    contact_kbn_list[1][70] = '�o�^���ύX';
    // ��2015/05/18 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)
    contact_kbn_list[1][80] = '����\����';
    // ��2015/05/18 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)
    // ��2017/04/17 R-#29678_�yH28-00565-01�z�����`�F�b�N�V�[�g nul-nagata
    contact_kbn_list[1][100] = '�S����';
    contact_kbn_list[1][110] = '�f�����f�f';
    // ��2017/04/17 R-#29678_�yH28-00565-01�z�����`�F�b�N�V�[�g nul-nagata
    // ��R-#31704_�yH29-00247-01�z����Ł@�f�����f�f_Web 2017/10/26 nul-sato
    contact_kbn_list[1][120] = '�f���J���e';
    // ��R-#31704_�yH29-00247-01�z����Ł@�f�����f�f_Web 2017/10/26 nul-sato
    // ��R-#31706_�yH29-00248-01�z�������Z�b�g�g�p��̂��q�l��Ԃ̌����鉻_Web 2017/10/26 nul-sato
    contact_kbn_list[1][130] = '�T���v���g�p��A���P�[�g';
    // ��R-#31706_�yH29-00248-01�z�������Z�b�g�g�p��̂��q�l��Ԃ̌����鉻_Web 2017/10/26 nul-sato


    // ���FMB
    contact_kbn_list[2] = new Array();
    contact_kbn_list[2][1]  = '��т̐�';
    contact_kbn_list[2][2]  = 'Net����֘A';
    contact_kbn_list[2][3]  = 'TELDM�֘A';
    contact_kbn_list[2][4]  = '�����֘A';
    contact_kbn_list[2][5]  = '�N���[���E�v�]';
    contact_kbn_list[2][90] = '���̑��⍇��';
    // ��R-#16070_�Ǘ���ʂ̃��j���[���̂̏C�� 2014/11/12 nul-motoi
    contact_kbn_list[2][20] = '�����ăv���[�U�[';
    contact_kbn_list[2][30] = 'WEB�J���o�^';
    contact_kbn_list[2][31] = 'WEB�J���A���P�[�g';
    contact_kbn_list[2][42] = '�p�E�`�E�^�I�����p';
    contact_kbn_list[2][43] = '�p�E�`�E�^�I�����p�폜';
    contact_kbn_list[2][50] = '�N�`�R�~���e';
    contact_kbn_list[2][60] = '�Љ�';
    contact_kbn_list[2][70] = '�o�^���ύX';
    // ��2015/05/18 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)
    contact_kbn_list[2][80] = '����\����';
    // ��2015/05/18 R-#17712_�߂���̌����̒���w���Ή�(nul hatano)

    // ���F���[����M
    contact_kbn_list[3] = new Array();
    contact_kbn_list[3][1]  = '��т̐�';
    contact_kbn_list[3][2]  = 'Net����֘A';
    contact_kbn_list[3][3]  = 'TELDM�֘A';
    contact_kbn_list[3][4]  = '�����֘A';
    contact_kbn_list[3][5]  = '�N���[���E�v�]';
    contact_kbn_list[3][90] = '���̑��⍇��';

    // ���F���̑����[��
    contact_kbn_list[4] = new Array();
    contact_kbn_list[4][91] = '�����G���[';
    contact_kbn_list[4][92] = '�T���v���G���[';
    contact_kbn_list[4][93] = '���f���[��';
    contact_kbn_list[4][94] = '��Ж⍇��';
    contact_kbn_list[4][99] = '���̑�';

    var wk_ruteKbn = "RuteKbn"+ mail_trace_id;
    var uke_kbn = document.getElementsByName(wk_ruteKbn)[0].value;
    var wk_contactkbn = "ContactKbn"+ mail_trace_id;

    var select = document.getElementById(wk_contactkbn);

    // option�v�f���폜�i���@�͂��낢�날��܂����j
    while (0 < select.childNodes.length) {
        select.removeChild(select.childNodes[0]);
    }

    var itemLen = contact_kbn_list[uke_kbn].length;
    for(j=1; j<itemLen; j++){
        if (contact_kbn_list[uke_kbn][j] != undefined) {
            // option�v�f�𐶐�
            var option = document.createElement('option');
            var text = document.createTextNode(contact_kbn_list[uke_kbn][j]);
            option.appendChild(text);
            option.setAttribute('value', j);
            // �o�^�ς݃R���^�N�g�敪�ƈ�v����ꍇ�͑I���ς݂Ƃ���
            if (j == contact_kbn ) {
                option.selected = true;
            }
            // option�v�f��ǉ�
            select.appendChild(option);
        }
    }
}
// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/22 TienPV
function btnReplyMail(mail_trace_id) {
	// ���O�C�����Ă��郆�[�UID���擾����
	var user_login_id = document.getElementsByName('UserIDLogin')[0].value;
	// ���O�C�����Ă��郆�[�U�����擾����
	var user_login_name = document.getElementsByName('UserNameLogin')[0].value;
	// �S���҃R�[�h���擾����
	wk_communicator = 'Communicator' + mail_trace_id;
	wk_communicator_name = 'CommunicatorName' + mail_trace_id;
	var communicator = document.getElementsByName(wk_communicator)[0].value;
	var communicator_name = document.getElementsByName(wk_communicator_name)[0].value;
	wk_actionstatus = "ActionStatus" + mail_trace_id;
	// ��M���[���A�h���X���擾����
	receive_mail = document.getElementsByName("ReceiveEmail" + mail_trace_id)[0].value;
	kaiin_no = document.getElementsByName("Kainno" + mail_trace_id)[0].value;
	if (!kaiin_no) {
		window.alert('�y����ԍ��z����͂��Ă��������B');
		return;
	}
	if (communicator != "" && communicator != "null") {
		if (communicator == user_login_id) {
			// �Ή���Ԃ�[�m�F�ς�]�ɐݒ肷��
			document.getElementsByName(wk_actionstatus)[0].value = "2";
		} else {
			if (window.confirm(communicator_name + "���񂪑Ή����ł��B���[�����M�������Ȃ��܂����H\n���[�����M���s����" + communicator_name + "����̏����͑��s�ł��Ȃ��Ȃ�܂��B")){
				// �S���҂����O�C�����Ă��郆�[�UID�Ɛݒ肷��B
				document.getElementsByName(wk_communicator)[0].value = user_login_id;
				// �Ή���Ԃ�[�m�F�ς�]�ɐݒ肷��
				document.getElementsByName(wk_actionstatus)[0].value = "2";
			} else {
				return;
			}
		}
	} else {
		// �S���҂����O�C�����Ă��郆�[�UID�Ɛݒ肷��B
		document.getElementsByName(wk_communicator)[0].value = user_login_id;
		// �Ή���Ԃ�[�m�F�ς�]�ɐݒ肷��
		document.getElementsByName(wk_actionstatus)[0].value = "2";
	}
	HiddenValAdd('updStatComtor',mail_trace_id,1);
	document.getElementById("mail" +mail_trace_id).href= "../1011/input.php?typ=mailtrace&MGMKBN=29&mail=" + receive_mail + "&mailTraceId=" + mail_trace_id + "&cd=" + kaiin_no;
	document.list.submit();
}
// ���yH30-00097-01�z���q�l�Ή����[���Ǘ�(WEB�Ǘ��c�[����)�d�l���� 2018/05/22 TienPV
