
/*--------------------------------------------------------
 * fncDownloadChatbotCsvFile
 * ŠT@—vFCSVˆêŠ‡ƒ_ƒEƒ“ƒ[ƒh
--------------------------------------------------------*/
function fncDownloadChatBotCsvFile()
{
	with (document.downloadCsvChatbot){
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("‰ñ“š“úi‚e‚q‚n‚lj‚Í³‚µ‚­“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
        if (e_yy.value + e_mm.value + e_dd.value != "") {

            if (fncChkDate(end) == "") {
                fncAlert("‰ñ“š“úi‚s‚nj‚Í³‚µ‚­“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",e_yy);
                return false;
            }
            if (s_yy.value + s_mm.value + s_dd.value != "") {
                if (start > end) {
                    fncAlert("‰ñ“š“úi‚e‚q‚n‚lj…‰ñ“š“úi‚s‚nj‚Å“ü—Í‚µ‚Ä‚­‚¾‚³‚¢",s_yy);
                    return false;
                }
            }
        }
	}
    return true;
}