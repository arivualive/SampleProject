// ���̓`�F�b�N
function InputChk() {
	with (document.form_inp){

		if(regist_btn.value == "�V�K�o�^"){
				if (fncTrim(baitai_cd.value) == "") {
					fncAlert("�}�̃R�[�h����͂��Ă�������",baitai_cd);
					return false;
				}
				if(fncGetLength(baitai_cd.value) > 8){
					fncAlert("�}�̃R�[�h�͔��p8�����ȓ��œ��͂��Ă�������",baitai_cd);
					return false;
				}

				if(baitai_cd.value.match(/\W/)){
					fncAlert("�}�̃R�[�h�͔��p�p�����œ��͂��Ă�������",baitai_cd);
					return false;
				}
		}


        if(site_kbn.value!='1' && site_kbn.value!='2'){
            fncAlert("�T�C�g�敪����͂��Ă��������B�i1:�o�b�^2:�g�сj",site_kbn);
            return false;
        }

        if(sample_flg.value!='1' && sample_flg.value!='2'){
            fncAlert("�敪��I�����Ă��������B�i1:���ϕi�^2:�����j",sample_flg);
            return false;
        }



		if (fncTrim(promotion_id.value) == "") {
			fncAlert("�}��ID����͂��Ă�������",promotion_id);
			return false;
		}
		if(fncGetLength(promotion_id.value) > 5){
			fncAlert("�}��ID�͔��p5�����ȓ��œ��͂��Ă�������",promotion_id);
			return false;
		}
		if(!fncJudgeHankaku(promotion_id.value)){
			fncAlert("�}��ID�͔��p�p�����œ��͂��Ă�������",promotion_id);
			return false;
		}
		if (fncTrim(promotion_nm.value) == "") {
			fncAlert("�}�̖�����͂��Ă�������",promotion_nm);
			return false;
		}
		if(fncGetLength(promotion_nm.value) > 256){
			fncAlert("�}�̖��͑S�p120�����ȓ��œ��͂��Ă�������",promotion_nm);
			return false;
		}

		var promo_term = promo_term_year.value + ("00" + promo_term_month.value ).slice(-2) + ("00" + promo_term_day.value ).slice(-2) + ("00" + promo_term_hour.value ).slice(-2);
		var promo_term_yymmdd = promo_term_year.value + ("00" + promo_term_month.value ).slice(-2) + ("00" + promo_term_day.value ).slice(-2);
		var promo_term_hh = ("00" + promo_term_hour.value ).slice(-2);

		var promo_term_flg = true;
		if (fncTrim(promo_term_year.value) == "" ) {
			promo_term_flg = false;
		}
		else if (fncTrim(promo_term_month.value) == "" ) {
			promo_term_flg = false;
		}
		else if (fncTrim(promo_term_day.value) == "" ) {
			promo_term_flg = false;
		}
		else if (fncTrim(promo_term_hour.value) == "" ) {
			promo_term_flg = false;
		}

		if (promo_term_flg == false) {
			fncAlert("�}�̗L����������͂��Ă�������",promo_term_year);
			return false;
		}else if(promo_term_flg == true)
		{
			if(fncGetLength(promo_term) != 10){
				fncAlert("�}�̗L�������𐳂������͂��Ă�������",promo_term_year);
				return false;
			}
			if (fncChkDate(promo_term_yymmdd) == false ) {
				fncAlert("�}�̗L�������𐳂������͂��Ă�������",promo_term_year);
				return false;
			}
			if (fncChkHour(promo_term_hh) == false ) {
				fncAlert("�}�̗L�������𐳂������͂��Ă�������",promo_term_hour);
				return false;
			}

			if (promo_term_year.value <  1990 ) {
				fncAlert("1990�N�ȍ~�̓��t����͂��Ă�������",promo_term_year);
				return false;
			}
		}

		if(fncGetLength(link.value) > 256){
			fncAlert("�����N���URL�͔��p256�����ȓ��œ��͂��Ă�������",link);
			return false;
		}

		if ((cookies_flg[0].checked == true) && (promo_term_flg == false)){

			fncAlert("�}�̗L�����������͂���Ă��Ȃ����A���͓��e�Ɍ�肪����܂�",cookies_flg[0]);
			return false;
		}

		if ((cookies_flg[0].checked == false) && (cookies_flg[1].checked == false)){
			fncAlert("�N�b�L�[�t���O��I�����Ă�������",cookies_flg[0]);
			return false;
		}

		if (cookies_flg[1].checked == true) {
			if (cookies_term.value == "" && cookies_term.value == "0"){
				fncAlert("�N�b�L�[�t���O���u���킹�Ȃ��v�ɐݒ肳��Ă���ꍇ�́A�N�b�L�[�L�������̐��l��1�ȏ�œ��͂��Ă��������B", cookies_term);
				return false;
			}
			if (fncChkCookies(cookies_term.value) == false) {
				fncAlert("�N�b�L�[�L�������𐳂������͂��Ă�������", cookies_term);
				return false;
			}
		}else if ((cookies_flg[0].checked == true) && (cookies_term.value.length > 0 && cookies_term.value != "0")){
			//fncAlert("�N�b�L�[�t���O��}�̗L�������ɂ��킹��ꍇ�A�N�b�L�[�L�����Ԃ͎w��ł��܂���",cookies_term);
			fncAlert("�N�b�L�[�t���O��}�̗L�������Ɂu���킹��v��ݒ肳��Ă���ꍇ�́A�N�b�L�[�L�����Ԃ��w�肷�邱�Ƃ͂ł��܂���B",cookies_term);
			return false;
		}

		if ((ssl_flg[0].checked == false) && (ssl_flg[1].checked == false) && (ssl_flg[2].checked == false)){
			fncAlert("�����N���I�����Ă�������",ssl_flg);
			return false;
		}

		/*if ((return_type[0].checked == false) && (return_type[1].checked == false) && (return_type[2].checked == false)){
			fncAlert("�܂�Ԃ����@��I�����Ă�������",return_type);
			return false;
		}*/

		if ((keyword_code_send_flg[0].checked == false) && (keyword_code_send_flg[1].checked == false)){
			fncAlert("�L�[���[�h�R�[�h�d�����M�t���O��I�����Ă�������",keyword_code_send_flg);
			return false;
		}

		if (funChkPro_id() == true){
			fncAlert("���ɓo�^����Ă���}��ID�ł��B",promotion_id);
			return false;
		}

		if (funChkKubun() == true){
			fncAlert("�w�肳�ꂽ�u�T�C�g�敪�v�Ɓu�u�敪�v�̑g�ݍ��킹�͊��ɓo�^����Ă��܂��B ",site_kbn);
			return false;
		}

        if(regist_btn.value == "����T�C�g��ǉ�"){
            if(!fncAddCopyConfirm()){
                return false;
            }
        }else{
            if(!fncEditConfirm()){
                return false;
            }
        }

	}
}

function funChkPro_id(){

	var pro_id = document.form_inp.promotion_id.value;
	var use_pro_id = document.form_inp.use_promotion_id.value;
	var arr_pro_id = new  Array();
	var i;
	arr_pro_id = use_pro_id.split(",");

	for (i=0;i<arr_pro_id.length ; i++){
		if (arr_pro_id[i] == pro_id) {
			return true;
		}
	}
	return false;
}

function funChkKubun(){

	var use_kubun = document.form_inp.use_kubun.value;
	var kubun = document.form_inp.site_kbn.value  + "," + document.form_inp.sample_flg.value;
	var arr_kubun = new Array();
	var i;

	arr_kubun = use_kubun.split("|");

	for (i=0; i<arr_kubun.length; i++){
		if (arr_kubun[i] == kubun){
			return true;
		}
	}
	return false;
}

function fncAddCopyConfirm(){

	if(confirm('����T�C�g��ǉ����܂��B��낵���ł����H')){
		return true;
	}else{
		return false;
	}

}

function fncChkHour(st_time) {
	str= ""+ st_time;
	blnFlag=isNaN(str);

	if (((str=="") || (blnFlag==true)) || (str.length != 2)) {
		return false;
	} else {
		if (str > 23) {
			return false;
		}
		return true;
	}
}

function fncChkCookies(cookies) {
	int = ""+ cookies;

	if ( isNaN(int) || (int < 0) || (int/1 < 1) ) {
		return false;
	} else {
		return true;
	}
}

function keyInputChk() {
	with (document.form_inp){

		if (fncTrim(keyword_cd.value) == "") {
			fncAlert("�L�[���[�h�R�[�h����͂��Ă�������",keyword_cd);
			return false;
		}

		if (fncGetLength(keyword_cd.value) > 4 ){
			fncAlert("�L�[���[�h�R�[�h�͔��p4�����ȓ��œ��͂��Ă�������",keyword_cd);
			return false;
		}

		if(fncChkZenkaku(keyword_cd.value)){
			fncAlert("�L�[���[�h�R�[�h�͔��p�p�����œ��͂��Ă�������",keyword_cd);
			return false;
		}

		if (funChkKeyword() == true){
			fncAlert("���͂��ꂽ�L�[���[�h�R�[�h�͊��ɓo�^����Ă��܂��B ",keyword_cd);
			return false;
		}

		if (fncTrim(link.value) == "") {
			fncAlert("�����N����͂��Ă�������",link);
			return false;
		}

		if(fncGetLength(link.value) > 256){
			fncAlert("�����N���URL�͔��p256�����œ��͂��Ă�������",link);
			return false;
		}

		if(fncChkZenkaku(link.value)){
			fncAlert("�����N��͔��p�p�����œ��͂��Ă�������",link);
			return false;
		}

		if(!fncEditConfirm()){
			return false;
		}

	}
}

function funChkKeyword(){

	var keyword_cd_list = document.form_inp.keyword_cd_list.value;
	var keyword_cd = document.form_inp.keyword_cd.value;
	var arr_keyword = new Array();
	var i;

	arr_keyword = keyword_cd_list.split(",");

	for (i=0; i<arr_keyword.length; i++){
		if (arr_keyword[i] == keyword_cd){
			return true;
		}
	}
	return false;
}

