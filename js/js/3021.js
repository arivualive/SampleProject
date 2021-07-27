// “ü—Íƒ`ƒFƒbƒN 
function InputChk() {
	with (document.form_inp){
		if (fncTrim(age_lower.value) != "") {
			if(!fncJudgeNumber(age_lower.value)){
				fncAlert("”N—î”ÍˆÍ‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",age_lower);
				return false;
			}
		}
		if(fncGetLength(attribute_name.value) > 200){
				fncAlert("‘®«–¼‚Í‘SŠp100•¶šˆÈ“à‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",attribute_name);
				return false;
		}
		if (fncTrim(age_upper.value) != "") {
			if(!fncJudgeNumber(age_upper.value)){
				fncAlert("”N—î”ÍˆÍ‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",age_upper);
				return false;
			}
		}
		
		if (Number(fncTrim(age_lower.value)) > Number(fncTrim(age_upper.value))) {
			fncAlert("”N—î”ÍˆÍ‚Ìİ’è‚ªŒë‚Á‚Ä‚¢‚Ü‚·",age_lower);
			return false;
		}
		
		if (fncTrim(last_purchase_start_days.value) != "") {
			if(!fncJudgeNumber(last_purchase_start_days.value)){
				fncAlert("ÅIw“üŒo‰ß“ú‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",last_purchase_start_days);
				return false;
			}
		}
		
		if (fncTrim(last_purchase_end_days.value) != "") {
			if(!fncJudgeNumber(last_purchase_end_days.value)){
				fncAlert("ÅIw“üŒo‰ß“ú‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",last_purchase_end_days);
				return false;
			}
		}
		
		if (Number(fncTrim(last_purchase_start_days.value)) > Number(fncTrim(last_purchase_end_days.value))) {
			fncAlert("ÅIw“üŒo‰ß“ú‚Ìİ’è‚ªŒë‚Á‚Ä‚¢‚Ü‚·",last_purchase_start_days);
			return false;
		}
		
		if (fncTrim(first_purchase_start_days.value) != "") {
			if(!fncJudgeNumber(first_purchase_start_days.value)){
				fncAlert("‰‰ñw“üŒo‰ß“ú‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",first_purchase_start_days);
				return false;
			}
		}
		
		if (fncTrim(first_purchase_end_days.value) != "") {
			if(!fncJudgeNumber(first_purchase_end_days.value)){
				fncAlert("‰‰ñw“üŒo‰ß“ú‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",first_purchase_end_days);
				return false;
			}
		}
		
		if (Number(fncTrim(first_purchase_start_days.value)) > Number(fncTrim(first_purchase_end_days.value)) ) {
			fncAlert("‰‰ñw“üŒo‰ß“ú‚Ìİ’è‚ªŒë‚Á‚Ä‚¢‚Ü‚·",first_purchase_start_days);
			return false;

		}
		
		if (fncTrim(cosmetics_purchase_cnt_lower.value) != "") {
			if(!fncJudgeNumber(cosmetics_purchase_cnt_lower.value)){
				fncAlert("‰»Ï•iw“ü‰ñ”‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",cosmetics_purchase_cnt_lower);
				return false;
			}
		}
		if (fncTrim(cosmetics_purchase_cnt_upper.value) != "") {
			if(!fncJudgeNumber(cosmetics_purchase_cnt_upper.value)){
				fncAlert("‰»Ï•iw“ü‰ñ”‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",cosmetics_purchase_cnt_upper);
				return false;
			}
		}
		if (Number(fncTrim(cosmetics_purchase_cnt_lower.value)) > Number(fncTrim(cosmetics_purchase_cnt_upper.value)) ) {
			fncAlert("‰»Ï•iw“ü‰ñ”‚Ìİ’è‚ªŒë‚Á‚Ä‚¢‚Ü‚·",cosmetics_purchase_cnt_lower);
			return false;

		}
		if (fncTrim(cosmetics_amount_lower.value) != "") {
			if(!fncJudgeNumber(cosmetics_amount_lower.value)){
				fncAlert("‰»Ï•iw“ü‹àŠz‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",cosmetics_amount_lower);
				return false;
			}
		}
		
		if (fncTrim(cosmetics_amount_upper.value) != "") {
			if(!fncJudgeNumber(cosmetics_amount_upper.value)){
				fncAlert("‰»Ï•iw“ü‹àŠz‚Í”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",cosmetics_amount_upper);
				return false;
			}
		}
		if (Number(fncTrim(cosmetics_amount_lower.value)) > Number(fncTrim(cosmetics_amount_upper.value))) {
			fncAlert("‰»Ï•iw“ü‹àŠz‚Ìİ’è‚ªŒë‚Á‚Ä‚¢‚Ü‚·",cosmetics_amount_lower);
			return false;
		}
		
		
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("¿‹“úi‚e‚q‚n‚lj‚Í³‚µ‚­“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
         if (e_yy.value + e_mm.value + e_dd.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("¿‹“úi‚s‚nj‚Í³‚µ‚­“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",e_yy);
                 return false;
             }
             if (s_yy.value + s_mm.value + s_dd.value != "") {
                 if (start > end) {
                     fncAlert("¿‹“úi‚e‚q‚n‚lj…¿‹“úi‚s‚nj‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",s_yy);
                     return false;
                 }
             }
         }
		
		
		if( (!fncJudgeHankaku(general_flg.value))  && (fncTrim(general_flg.value) != "") ){
			fncAlert("‰ïˆõ‘®«ƒtƒ‰ƒO‚Í”¼Šp‰p”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",general_flg);
			return false;
		}	
		
		if(fncGetLength(general_flg.value) > 5){
				fncAlert("‰ïˆõ‘®«ƒtƒ‰ƒO‚Í”¼Šp5•¶šˆÈ“à‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",general_flg);
				return false;
		}		
		
		
		
		
		if (fncTrim(priority.value) == "") {
			fncAlert("—Dæ“x‚ğ“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",priority);
			return false;
		}
		if (fncTrim(priority.value) != "") {
			if(!fncJudgeNumber(priority.value)){
				fncAlert("”¼Šp”š‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",priority);
				return false;
			}
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}