// �����点�p���̓`�F�b�N 

function InputChk() {
	with (document.form_inp){

		if (fncTrim(title.value) != "") {
			if(fncGetLength(title.value) > 500){
				fncAlert("�^�C�g���͑S�p250�����ȓ��œ��͂��Ă�������",title);
				return false;
			}
		}
		lflg = login_flg.selectedIndex;
		aid = attribute_id.selectedIndex;
		if (lflg != 0 && aid  != 0) {
			fncAlert("���O�C���ς݂�I�������ꍇ�̂݁A���[�U�[����������ݒ�ł��܂��B",attribute_id);
			return false;
		}
		var start_date = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2) + ("00" + s_hh.value ).slice(-2) + ("00" + s_mi.value ).slice(-2);
		var start_yymmdd = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
		var start_hhmi = ("00" + s_hh.value ).slice(-2) + ("00" + s_mi.value ).slice(-2);
		

		if (fncTrim(start_date) == "") {
			fncAlert("�J�n���t����͂��Ă�������",s_yy);
			return false;
		}
		if (fncTrim(start_date) != "") {
			if(!fncJudgeNumber(fncTrim(start_date))){
				fncAlert("���p�����œ��͂��Ă�������",s_yy);
				return false;
			}

		}
		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_yy);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_hh);
			return false;
		}
		
		
		var end_date = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2) + ("00" + e_hh.value ).slice(-2) + ("00" + e_mi.value ).slice(-2);
		var end_yymmdd = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
		var end_hhmi = ("00" + e_hh.value ).slice(-2) + ("00" + e_mi.value ).slice(-2);
		
		if (fncTrim(end_date) == "") {
			fncAlert("�I�����t����͂��Ă�������",e_yy);
			return false;
		}
		if (fncTrim(end_date) != "") {
			if(!fncJudgeNumber(fncTrim(end_date))){
				fncAlert("���p�����œ��͂��Ă�������",e_yy);
				return false;
			}
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",s_yy);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",s_hh);
			return false;
		}
		if (fncTrim(start_date) > fncTrim(end_date)) {
			fncAlert("���t�𐳂������͂��Ă�������",s_yy);
			return false;
		}

//		var img_path = thumbnail_file.value;
//		if(img_path != ""){
//			if(!img_path.match(/\.(jpg|jpeg)$/i)){
//				fncAlert('�摜��jpg/jpeg�ɂ̂ݑΉ����Ă��܂�',thumbnail_file);
//				return false;
//			}
//		}
//		var alt = img_alt_text.value;
//		data = alt.match("\<[a-zA-Z]+\>");
//		if (data) {
//			fncAlert('�摜ALT�e�L�X�g�ɂ�HTML�^�O�͎g�p�ł��܂���',img_alt_text);
//			return false;
//		}

//		if( 0 > fncTrim(img_size.value) || fncTrim(img_size.value) > 100){
//			fncAlert("�摜�̕���0�`100�̊ԂŐݒ肵�Ă�������",img_size);
//			return false;
//		}

		if( (fncGetLength(upper_body.value)+fncGetLength(lower_body.value)) > 8000){
				fncAlert("�e�L�X�g(�摜�㕔)�ƃe�L�X�g(�摜����)���킹�đS�p4000�����ȓ��œ��͂��Ă�������",upper_body);
				return false;

		}

		if(!fncEditConfirm()){
			return false;
		}
	}
}
function OutputImageThumbnail(str)
{
	
	if(str == ""){
		document.all("thumbnail_image").src = "/img/one_dot.gif";
		document.form_inp.img_del_flg.value=1;
	}else{
		document.all("thumbnail_image").src = str;
		document.form_inp.img_del_flg.value=0;
	}
}
function imgClear()
{
	document.all("thumbnail_image").src = "/img/one_dot.gif";
	document.form_inp.img_del_flg.value=1;
}
function bgColorCh() {
	var index = document.form_inp.bg_color.selectedIndex;
	var bg = document.form_inp.bg_color.options[index].value;
	document.getElementById("divtext").style.background = bg;
	document.getElementById("divlink").style.background = bg;
	document.getElementById("divtarget").style.background = bg;
	document.getElementById("divlinked").style.background = bg;
}
function textColorCh() {
	var index = document.form_inp.color_text.selectedIndex;
	var fc = document.form_inp.color_text.options[index].value;
	document.getElementById("divtext").style.color = fc;
}
function linkColorCh() {
	var index = document.form_inp.color_link.selectedIndex;
	var fc = document.form_inp.color_link.options[index].value;
	document.getElementById("divlink").style.color = fc;
}
function targetColorCh() {
	var index = document.form_inp.color_alink.selectedIndex;
	var fc = document.form_inp.color_alink.options[index].value;
	document.getElementById("divtarget").style.color = fc;
}
function linkedColorCh() {
	var index = document.form_inp.color_vlink.selectedIndex;
	var fc = document.form_inp.color_vlink.options[index].value;
	document.getElementById("divlinked").style.color = fc;
}
