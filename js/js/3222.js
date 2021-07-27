
/*--------------------------------------------------------
 * fncDownloadChatbotCsvFile
 * 概　要：CSV一括ダウンロード
--------------------------------------------------------*/
function fncDownloadChatBotCsvFile()
{
	with (document.downloadCsvChatbot){
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("回答日時（ＦＲＯＭ）は正しく入力してください",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
        if (e_yy.value + e_mm.value + e_dd.value != "") {

            if (fncChkDate(end) == "") {
                fncAlert("回答日時（ＴＯ）は正しく入力してください",e_yy);
                return false;
            }
            if (s_yy.value + s_mm.value + s_dd.value != "") {
                if (start > end) {
                    fncAlert("回答日時（ＦＲＯＭ）≦回答日時（ＴＯ）で入力してください",s_yy);
                    return false;
                }
            }
        }
	}
    return true;
}