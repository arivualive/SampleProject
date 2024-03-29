// 入力チェック 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(age_lower.value) != "") {
			if(!fncJudgeNumber(age_lower.value)){
				fncAlert("年齢範囲は半角数字で入力してください",age_lower);
				return false;
			}
		}
		if(fncGetLength(attribute_name.value) > 200){
				fncAlert("属性名は全角100文字以内で入力してください",attribute_name);
				return false;
		}
		if (fncTrim(age_upper.value) != "") {
			if(!fncJudgeNumber(age_upper.value)){
				fncAlert("年齢範囲は半角数字で入力してください",age_upper);
				return false;
			}
		}
		
		if (Number(fncTrim(age_lower.value)) > Number(fncTrim(age_upper.value))) {
			fncAlert("年齢範囲の設定が誤っています",age_lower);
			return false;
		}
		
		if (fncTrim(last_purchase_start_days.value) != "") {
			if(!fncJudgeNumber(last_purchase_start_days.value)){
				fncAlert("最終購入経過日は半角数字で入力してください",last_purchase_start_days);
				return false;
			}
		}
		
		if (fncTrim(last_purchase_end_days.value) != "") {
			if(!fncJudgeNumber(last_purchase_end_days.value)){
				fncAlert("最終購入経過日は半角数字で入力してください",last_purchase_end_days);
				return false;
			}
		}
		
		if (Number(fncTrim(last_purchase_start_days.value)) > Number(fncTrim(last_purchase_end_days.value))) {
			fncAlert("最終購入経過日の設定が誤っています",last_purchase_start_days);
			return false;
		}
		
		if (fncTrim(first_purchase_start_days.value) != "") {
			if(!fncJudgeNumber(first_purchase_start_days.value)){
				fncAlert("初回購入経過日は半角数字で入力してください",first_purchase_start_days);
				return false;
			}
		}
		
		if (fncTrim(first_purchase_end_days.value) != "") {
			if(!fncJudgeNumber(first_purchase_end_days.value)){
				fncAlert("初回購入経過日は半角数字で入力してください",first_purchase_end_days);
				return false;
			}
		}
		
		if (Number(fncTrim(first_purchase_start_days.value)) > Number(fncTrim(first_purchase_end_days.value)) ) {
			fncAlert("初回購入経過日の設定が誤っています",first_purchase_start_days);
			return false;

		}
		
		if (fncTrim(cosmetics_purchase_cnt_lower.value) != "") {
			if(!fncJudgeNumber(cosmetics_purchase_cnt_lower.value)){
				fncAlert("化粧品購入回数は半角数字で入力してください",cosmetics_purchase_cnt_lower);
				return false;
			}
		}
		if (fncTrim(cosmetics_purchase_cnt_upper.value) != "") {
			if(!fncJudgeNumber(cosmetics_purchase_cnt_upper.value)){
				fncAlert("化粧品購入回数は半角数字で入力してください",cosmetics_purchase_cnt_upper);
				return false;
			}
		}
		if (Number(fncTrim(cosmetics_purchase_cnt_lower.value)) > Number(fncTrim(cosmetics_purchase_cnt_upper.value)) ) {
			fncAlert("化粧品購入回数の設定が誤っています",cosmetics_purchase_cnt_lower);
			return false;

		}
		if (fncTrim(cosmetics_amount_lower.value) != "") {
			if(!fncJudgeNumber(cosmetics_amount_lower.value)){
				fncAlert("化粧品購入金額は半角数字で入力してください",cosmetics_amount_lower);
				return false;
			}
		}
		
		if (fncTrim(cosmetics_amount_upper.value) != "") {
			if(!fncJudgeNumber(cosmetics_amount_upper.value)){
				fncAlert("化粧品購入金額は半角数字で入力してください",cosmetics_amount_upper);
				return false;
			}
		}
		if (Number(fncTrim(cosmetics_amount_lower.value)) > Number(fncTrim(cosmetics_amount_upper.value))) {
			fncAlert("化粧品購入金額の設定が誤っています",cosmetics_amount_lower);
			return false;
		}
		
		
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("請求日（ＦＲＯＭ）は正しく入力してください",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("請求日（ＴＯ）は正しく入力してください",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("請求日（ＦＲＯＭ）≦請求日（ＴＯ）で入力してください",s_yy);
                     return false;
                 }
             }
         }
		
		
		if( (!fncJudgeHankaku(general_flg.value))  && (fncTrim(general_flg.value) != "") ){
			fncAlert("会員属性フラグは半角英数字で入力してください",general_flg);
			return false;
		}	
		
		if(fncGetLength(general_flg.value) > 5){
				fncAlert("会員属性フラグは半角5文字以内で入力してください",general_flg);
				return false;
		}		
		
		
		
		
		if (fncTrim(priority.value) == "") {
			fncAlert("優先度を入力してください",priority);
			return false;
		}
		if (fncTrim(priority.value) != "") {
			if(!fncJudgeNumber(priority.value)){
				fncAlert("半角数字で入力してください",priority);
				return false;
			}
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}