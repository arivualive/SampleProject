// 商品管理用入力チェック 
function InputChk() {
	with (document.form_inp){
		// ▼モバイル対応　2009/03/12
		// サイト表示用商品名称がPC、携帯共に未入力の場合はエラーとする
		if (fncTrim(shohin_name.value) == "") {
			fncAlert("サイト表示用商品名称(PC)を入力してください",shohin_name);
			return false;
		}
		if (fncTrim(m_shohin_name.value) == "") {
			fncAlert("サイト表示用商品名称(携帯)を入力してください",shohin_name);
			return false;
		}
		// ▲モバイル対応　2009/03/12
		if (fncTrim(shohin_name.value) != "") {
			if(fncGetLength(shohin_name.value) > 60) {
				fncAlert("サイト表示用商品名称(PC)は全角30文字以内で入力してください",shohin_name);
				return false;
			}
		}
		// ▼モバイル対応　2009/03/12
		if (fncTrim(m_shohin_name.value) != "") {
			if(fncGetLength(m_shohin_name.value) > 60) {
				fncAlert("サイト表示用商品名称(携帯)は全角30文字以内で入力してください",m_shohin_name);
				return false;
			}
		}
		// ▲モバイル対応　2009/03/12
		if (fncGetLength(shohin_comment1.value) > 100) {
			fncAlert("コメント1(PC)は全角50文字以内で入力してください",shohin_comment1);
			return false;
		}
		// ▼モバイル対応　2009/03/12
		if (fncGetLength(m_shohin_comment1.value) > 100) {
			fncAlert("コメント1(携帯)は全角50文字以内で入力してください",m_shohin_comment1);
			return false;
		}
		// ▲モバイル対応　2009/03/12
		if (fncGetLength(shohin_comment2.value) > 60){
			fncAlert("コメント2(PC)は全角30文字以内で入力してください",shohin_comment2);
			return false;
		}
		// ▼モバイル対応　2009/03/12
		if (fncGetLength(m_shohin_comment2.value) > 60) {
			fncAlert("コメント2(携帯)は全角30文字以内で入力してください",m_shohin_comment2);
			return false;
		}
		// ▲モバイル対応　2009/03/12
		//▼2011/12/06 R-#2255_【PC】【保守運営】管理画面商品マスター登録方法の統一_inori（フェーズ2）(ul yamashita)
		if (fncGetLength(explanation1.value) > 4000) {
			fncAlert("説明TOP(PC)は全角2000文字以内で入力してください",explanation1);
			return false;
		}
		// ▼モバイル対応　2009/03/12
		if (fncGetLength(m_explanation1.value) > 4000) {
			fncAlert("説明TOP(携帯)は全角2000文字以内で入力してください",m_explanation1);
			return false;
		}
		// ▲モバイル対応　2009/03/12
		if (fncGetLength(explanation2.value) > 4000) {
			fncAlert("主な配合成分(PC)は全角2000文字以内で入力してください",explanation2);
			return false;
		}
		// ▼モバイル対応　2009/03/12
		if (fncGetLength(m_explanation2.value) > 4000) {
			fncAlert("主な配合成分(携帯)は全角2000文字以内で入力してください",m_explanation2);
			return false;
		}
		// ▲モバイル対応　2009/03/12
		if (fncGetLength(explanation3.value) > 4000) {
			fncAlert("効能・効果(PC)は全角2000文字以内で入力してください",explanation3);
			return false;
		}
		// ▼モバイル対応　2009/03/12
		if (fncGetLength(m_explanation3.value) > 4000) {
			fncAlert("効能・効果(携帯)は全角2000文字以内で入力してください",m_explanation3);
			return false;
		}
		// ▲モバイル対応　2009/03/12
		if (fncGetLength(explanation4.value) > 4000) {
			fncAlert("こだわり(PC)は全角2000文字以内で入力してください",explanation4);
			return false;
		}
		// ▼モバイル対応　2009/03/12
		if (fncGetLength(m_explanation4.value) > 4000) {
			fncAlert("こだわり(携帯)は全角2000文字以内で入力してください",m_explanation4);
			return false;
		}
		// ▲モバイル対応　2009/03/12
		if (fncGetLength(explanation5.value) > 4000) {
			fncAlert("使い方(PC)は全角2000文字以内で入力してください",explanation5);
			return false;
		}
		// ▼モバイル対応　2009/03/12
		if (fncGetLength(m_explanation5.value) > 4000) {
			fncAlert("使い方(携帯)は全角2000文字以内で入力してください",m_explanation5);
			return false;
		}
		// ▲モバイル対応　2009/03/12


		//▼2009/04/27 #xxx モバイル対応項目追加(kdl yoshii)
		if (fncGetLength(explanation6.value) > 4000) {
			fncAlert("このような方におすすめ(PC)は全角2000文字以内で入力してください",explanation6);
			return false;
		}
		if (fncGetLength(m_explanation6.value) > 4000) {
			fncAlert("このような方におすすめ(携帯)は全角2000文字以内で入力してください",m_explanation6);
			return false;
		}
		//▲2009/04/27 #xxx モバイル対応項目追加(kdl yoshii)

		if (fncTrim(priority.value) == "") {
			fncAlert("優先順位を入力してください",priority);
			return false;
		} else {
		//▲2011/12/06 R-#2255_【PC】【保守運営】管理画面商品マスター登録方法の統一_inori（フェーズ2）(ul yamashita)
			if (!fncJudgeNumber(fncTrim(priority.value))) {
				fncAlert("優先順位は半角数字で入力してください",priority);
				return false;
			}
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}
/*--------------------------------------------------------
 * fncShohinKbnChange
 * 概　要：セレクトボックス選択時選択した値を持って遷移
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function fncShohinKbnChange(){
	var url   = document.list.action;
	var param = document.list.shohin_kbn.selectedIndex;
	if(param != ""){
		url = url + '?shohin_kbn=' + param;
	}
	document.list.action= url;
	document.list.submit();
}