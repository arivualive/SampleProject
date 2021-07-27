// 入力チェック
function InputChk() {
	with (document.form_inp){

		if(regist_btn.value == "新規登録"){
				if (fncTrim(baitai_cd.value) == "") {
					fncAlert("媒体コードを入力してください",baitai_cd);
					return false;
				}
				if(fncGetLength(baitai_cd.value) > 8){
					fncAlert("媒体コードは半角8文字以内で入力してください",baitai_cd);
					return false;
				}

				if(baitai_cd.value.match(/\W/)){
					fncAlert("媒体コードは半角英数字で入力してください",baitai_cd);
					return false;
				}
		}


        if(site_kbn.value!='1' && site_kbn.value!='2'){
            fncAlert("サイト区分を入力してください。（1:ＰＣ／2:携帯）",site_kbn);
            return false;
        }

        if(sample_flg.value!='1' && sample_flg.value!='2'){
            fncAlert("区分を選択してください。（1:化粧品／2:漢方）",sample_flg);
            return false;
        }



		if (fncTrim(promotion_id.value) == "") {
			fncAlert("媒体IDを入力してください",promotion_id);
			return false;
		}
		if(fncGetLength(promotion_id.value) > 5){
			fncAlert("媒体IDは半角5文字以内で入力してください",promotion_id);
			return false;
		}
		if(!fncJudgeHankaku(promotion_id.value)){
			fncAlert("媒体IDは半角英数字で入力してください",promotion_id);
			return false;
		}
		if (fncTrim(promotion_nm.value) == "") {
			fncAlert("媒体名を入力してください",promotion_nm);
			return false;
		}
		if(fncGetLength(promotion_nm.value) > 256){
			fncAlert("媒体名は全角120文字以内で入力してください",promotion_nm);
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
			fncAlert("媒体有効期限を入力してください",promo_term_year);
			return false;
		}else if(promo_term_flg == true)
		{
			if(fncGetLength(promo_term) != 10){
				fncAlert("媒体有効期限を正しく入力してください",promo_term_year);
				return false;
			}
			if (fncChkDate(promo_term_yymmdd) == false ) {
				fncAlert("媒体有効期限を正しく入力してください",promo_term_year);
				return false;
			}
			if (fncChkHour(promo_term_hh) == false ) {
				fncAlert("媒体有効期限を正しく入力してください",promo_term_hour);
				return false;
			}

			if (promo_term_year.value <  1990 ) {
				fncAlert("1990年以降の日付を入力してください",promo_term_year);
				return false;
			}
		}

		if(fncGetLength(link.value) > 256){
			fncAlert("リンク先のURLは半角256文字以内で入力してください",link);
			return false;
		}

		if ((cookies_flg[0].checked == true) && (promo_term_flg == false)){

			fncAlert("媒体有効期限が入力されていないか、入力内容に誤りがあります",cookies_flg[0]);
			return false;
		}

		if ((cookies_flg[0].checked == false) && (cookies_flg[1].checked == false)){
			fncAlert("クッキーフラグを選択してください",cookies_flg[0]);
			return false;
		}

		if (cookies_flg[1].checked == true) {
			if (cookies_term.value == "" && cookies_term.value == "0"){
				fncAlert("クッキーフラグが「あわせない」に設定されている場合は、クッキー有効期限の数値を1以上で入力してください。", cookies_term);
				return false;
			}
			if (fncChkCookies(cookies_term.value) == false) {
				fncAlert("クッキー有効期限を正しく入力してください", cookies_term);
				return false;
			}
		}else if ((cookies_flg[0].checked == true) && (cookies_term.value.length > 0 && cookies_term.value != "0")){
			//fncAlert("クッキーフラグを媒体有効期限にあわせる場合、クッキー有効期間は指定できません",cookies_term);
			fncAlert("クッキーフラグを媒体有効期限に「あわせる」を設定されている場合は、クッキー有効期間を指定することはできません。",cookies_term);
			return false;
		}

		if ((ssl_flg[0].checked == false) && (ssl_flg[1].checked == false) && (ssl_flg[2].checked == false)){
			fncAlert("リンク先を選択してください",ssl_flg);
			return false;
		}

		/*if ((return_type[0].checked == false) && (return_type[1].checked == false) && (return_type[2].checked == false)){
			fncAlert("折り返し方法を選択してください",return_type);
			return false;
		}*/

		if ((keyword_code_send_flg[0].checked == false) && (keyword_code_send_flg[1].checked == false)){
			fncAlert("キーワードコード電文送信フラグを選択してください",keyword_code_send_flg);
			return false;
		}

		if (funChkPro_id() == true){
			fncAlert("既に登録されている媒体IDです。",promotion_id);
			return false;
		}

		if (funChkKubun() == true){
			fncAlert("指定された「サイト区分」と「「区分」の組み合わせは既に登録されています。 ",site_kbn);
			return false;
		}

        if(regist_btn.value == "部門サイトを追加"){
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

	if(confirm('部門サイトを追加します。よろしいですか？')){
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
			fncAlert("キーワードコードを入力してください",keyword_cd);
			return false;
		}

		if (fncGetLength(keyword_cd.value) > 4 ){
			fncAlert("キーワードコードは半角4文字以内で入力してください",keyword_cd);
			return false;
		}

		if(fncChkZenkaku(keyword_cd.value)){
			fncAlert("キーワードコードは半角英数字で入力してください",keyword_cd);
			return false;
		}

		if (funChkKeyword() == true){
			fncAlert("入力されたキーワードコードは既に登録されています。 ",keyword_cd);
			return false;
		}

		if (fncTrim(link.value) == "") {
			fncAlert("リンクを入力してください",link);
			return false;
		}

		if(fncGetLength(link.value) > 256){
			fncAlert("リンク先のURLは半角256文字で入力してください",link);
			return false;
		}

		if(fncChkZenkaku(link.value)){
			fncAlert("リンク先は半角英数字で入力してください",link);
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

