// �L�����y�[���p���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
	
		if (fncTrim(title.value) != "") {
			if(fncGetLength(title.value) > 100){
				fncAlert("�^�C�g���͑S�p50�����ȓ��œ��͂��Ă�������",title);
				return false;
			}
		}
		if(fncGetLength(campaign_message.value) > 1000){
				fncAlert("�L�����y�[���T�v�͑S�p500�����œ��͂��Ă�������",campaign_message);
				return false;
		}

		var start_date = s_year.value + ("00" + s_month.value ).slice(-2) + ("00" + s_day.value ).slice(-2) + ("00" + s_hour.value ).slice(-2) + ("00" + s_min.value ).slice(-2);
		var start_yymmdd = s_year.value + ("00" + s_month.value ).slice(-2) + ("00" + s_day.value ).slice(-2);
		var start_hhmi = ("00" + s_hour.value ).slice(-2) + ("00" + s_min.value ).slice(-2);
		
		if (fncTrim(start_date) == "") {
			fncAlert("�J�n���t����͂��Ă�������",s_year);
			return false;
		}
		if (fncTrim(start_date) != "") {
			if(!fncJudgeNumber(fncTrim(start_date))){
				fncAlert("���p�����œ��͂��Ă�������",s_year);
				return false;
			}
			
		}
		if (fncChkDate(start_yymmdd) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_year);
			return false;
		}
		if (fncChkTime(start_hhmi) == "") {
			fncAlert("�J�n���t�𐳂������͂��Ă�������",s_hour);
			return false;
		}
		
		
		var end_date = e_year.value + ("00" + e_month.value ).slice(-2) + ("00" + e_day.value ).slice(-2) + ("00" + e_hour.value ).slice(-2) + ("00" + e_min.value ).slice(-2);
		var end_yymmdd = e_year.value + ("00" + e_month.value ).slice(-2) + ("00" + e_day.value ).slice(-2);
		var end_hhmi = ("00" + e_hour.value ).slice(-2) + ("00" + e_min.value ).slice(-2);
		
		if (fncTrim(end_date) == "") {
			fncAlert("�I�����t����͂��Ă�������",e_year);
			return false;
		}
		if (fncTrim(end_date) != "") {
			if(!fncJudgeNumber(fncTrim(end_date))){
				fncAlert("���p�����œ��͂��Ă�������",e_year);
				return false;
			}
			
		}
		if (fncChkDate(end_yymmdd) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",e_year);
			return false;
		}
		if (fncChkTime(end_hhmi) == "") {
			fncAlert("�I�����t�𐳂������͂��Ă�������",e_hour);
			return false;
		}
		if (fncTrim(start_date) > fncTrim(end_date)) {
			fncAlert("���t�𐳂������͂��Ă�������",s_year);
			return false;
		}
		if(campaign_shohin_cd1.selectedIndex != ""){
			
			if(campaign_shohin_cd1.selectedIndex == campaign_shohin_cd2.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd1);
					return false
			}
			if(campaign_shohin_cd1.selectedIndex == campaign_shohin_cd3.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd1);
					return false
			}
			if(campaign_shohin_cd1.selectedIndex == campaign_shohin_cd4.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd1);
					return false
			}
			if(campaign_shohin_cd1.selectedIndex == campaign_shohin_cd5.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd1);
					return false
			}
			if(campaign_shohin_cd1.selectedIndex == campaign_shohin_cd6.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd1);
					return false
			}
			if(campaign_shohin_cd1.selectedIndex == campaign_shohin_cd7.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd1);
					return false
			}
		}
		if(campaign_shohin_cd2.selectedIndex != ""){
			if(campaign_shohin_cd2.selectedIndex == campaign_shohin_cd3.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd2);
					return false
			}
			if(campaign_shohin_cd2.selectedIndex == campaign_shohin_cd4.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd2);
					return false
			}
			if(campaign_shohin_cd2.selectedIndex == campaign_shohin_cd5.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd2);
					return false
			}
			if(campaign_shohin_cd2.selectedIndex == campaign_shohin_cd6.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd2);
					return false
			}
			if(campaign_shohin_cd2.selectedIndex == campaign_shohin_cd7.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd2);
					return false
			}
		}
		if(campaign_shohin_cd3.selectedIndex != ""){
			if(campaign_shohin_cd3.selectedIndex == campaign_shohin_cd4.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd3);
					return false
			}
			if(campaign_shohin_cd3.selectedIndex == campaign_shohin_cd5.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd3);
					return false
			}
			if(campaign_shohin_cd3.selectedIndex == campaign_shohin_cd6.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd3);
					return false
			}
			if(campaign_shohin_cd3.selectedIndex == campaign_shohin_cd7.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd3);
					return false
			}
		}
		if(campaign_shohin_cd4.selectedIndex != ""){
			if(campaign_shohin_cd4.selectedIndex == campaign_shohin_cd5.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd4);
					return false
			}
			if(campaign_shohin_cd4.selectedIndex == campaign_shohin_cd6.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd4);
					return false
			}
			if(campaign_shohin_cd4.selectedIndex == campaign_shohin_cd7.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd4);
					return false
			}
		}
		if(campaign_shohin_cd5.selectedIndex != ""){
			if(campaign_shohin_cd5.selectedIndex == campaign_shohin_cd6.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd5);
					return false
			}
			if(campaign_shohin_cd5.selectedIndex == campaign_shohin_cd7.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd5);
					return false
			}
		}
		if(campaign_shohin_cd6.selectedIndex != ""){
			if(campaign_shohin_cd6.selectedIndex == campaign_shohin_cd7.selectedIndex){
					fncAlert("�I�����i���d�����Ă��܂�",campaign_shohin_cd6);
					return false
			}
		}

		var img_path = thumbnail_file.value;
		if(img_path != ""){
			if(!img_path.match(/\.(jpg|jpeg)$/i)){
				fncAlert('�摜��jpg/jpeg�ɂ̂ݑΉ����Ă��܂�',thumbnail_file);
				return false;
			}
		}
		
		var alt = img_alt_text.value;
		data = alt.match("\<[a-zA-Z]+\>");
		if (data) {
			fncAlert('�摜ALT�e�L�X�g�ɂ�HTML�^�O�͎g�p�ł��܂���',img_alt_text);
			return false;
		}

		if( 0 > fncTrim(img_size.value) || fncTrim(img_size.value) > 100){
			fncAlert("�摜�̕���1�`100�̊ԂŐݒ肵�Ă�������",img_size);
			return false;
		}
		if(fncGetLength(upper_body.value) > 2000){
				fncAlert("�e�L�X�g(��ʏ㕔)�͑S�p1000�����ȓ��œ��͂��Ă�������",lower_body);
				return false;
		}
		if(fncGetLength(lower_body.value) > 2000){
				fncAlert("�e�L�X�g(��ʉ���)�͑S�p1000�����ȓ��œ��͂��Ă�������",lower_body);
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

function CampDelConfirm() {
	if(!fncDelConfirm()){
		return false;
	}
	if(!confirm('�L�����y�[���ɕt������v���[���g���폜����܂����A�X�����ł����H')){
		return false;
	}

}
