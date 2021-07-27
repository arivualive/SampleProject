/*--------------------------------------------------------
 * fncTypeChange
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I�������l�������đJ��
 * ���@���F
 * �߂�l�F
--------------------------------------------------------*/
function fncTypeChange(){
	var url   = document.faq_type_form.action;
	var faq_type = document.faq_type_form.faq_type.selectedIndex;
	var faq_view = document.faq_type_form.faq_view.selectedIndex;

	url = url + '?faq_type=' + faq_type + '&faq_view=' + faq_view;

	document.faq_type_form.action= url;
	document.faq_type_form.submit();
}


/*--------------------------------------------------------
 * setCalName
 * �T�@�v�F�J�����_�[�\���̈�div�����Ahidden�̒l�ɃZ�b�g����
 * ���@���Fsend_cate�F���╪�ށ@send_y�F�I��N
 * �߂�l�F�Ȃ�
--------------------------------------------------------*/
function setCalName(send_cate, send_y){
    document.for_js.div_name.value = "calendar_"+send_cate+"_"+send_y;
}


/*--------------------------------------------------------
 * getCalName
 * �T�@�v�F�J�����_�[�\���̈�div����Ԃ�
 * ���@���F�Ȃ�
 * �߂�l�Fstring �J�����_�[�\���̈於
--------------------------------------------------------*/
function getCalName(){
    return document.for_js.div_name.value;
}



/*--------------------------------------------------------
 * chgCalendar
 * �T�@�v�F�I�����ꂽ���̃f�[�^��񓯊��ʐM�Ŏ擾���A
 * �@�@�@�@�J�����_�[��\������B
 * ���@���Ffaq_type�F����敪�@send_cate�F���╪�ށ@send_m�F�I��N�@send_y�F�I����
 * �߂�l�F
--------------------------------------------------------*/
var xmlHttp;

function chgCalendar(faq_type, faq_view, send_cate, send_y, send_m){
    // ���ԃp�����[�^�����邱�ƂŁAPHP�̃L���b�V���ɂ���ă��N�G�X�g�����M����Ȃ����ۂ�h��
    var time  = '';
    var now   = new Date();
    var year  = now.getYear();
    var month = now.getMonth() + 1;
    var day   = now.getDate();
    var hour  = now.getHours();
    var min   = now.getMinutes();
    var sec   = now.getSeconds();
    var msec  = now.getMilliseconds();
    time      = String(year) + String(month) + String(day) + String(hour) + String(min) + String(sec) + String(msec);
	
	// �J�����_�[�G���A�^�C�g�������u���v��������
	calTitleArea      = document.getElementById('calendarm_'+send_cate+'_'+send_y);
    calTitleArea.innerHTML = send_m;
	
	// ���X�|���X�\���̈於�擾
	setCalName(send_cate, send_y);
	
    if (window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        if (window.ActiveXObject){
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }else{
            xmlHttp = null;
        }
    }
    xmlHttp.onreadystatechange = checkStatus;
    xmlHttp.open("GET", "chg_calendar.php?time="+time+"&faq_type="+faq_type+"&faq_view="+faq_view+"&send_cate="+send_cate+"&send_y="+send_y+"&send_m="+send_m, true);

    xmlHttp.send(null);
}


/*--------------------------------------------------------
 * checkStatus
 * �T�@�v�F�񓯊��ʐM���AHTTP�X�e�[�^�X���Ď�
 * ���@���F
 * �߂�l�F
--------------------------------------------------------*/
function checkStatus(){
    var div_name = getCalName() ;
    
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
        var node = document.getElementById(div_name);
        node.innerHTML = xmlHttp.responseText;
    }
}
