
/*--------------------------------------------------------
 * fncDownloadChatbotCsvFile
 * �T�@�v�FCSV�ꊇ�_�E�����[�h
--------------------------------------------------------*/
function fncDownloadChatBotCsvFile()
{
	with (document.downloadCsvChatbot){
 		var start = s_yy.value + ("00" + s_mm.value ).slice(-2) + ("00" + s_dd.value ).slice(-2);
         if (s_yy.value + s_mm.value + s_dd.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("�񓚓����i�e�q�n�l�j�͐��������͂��Ă�������",s_yy);
                 return false;
             }
         }
 		var end = e_yy.value + ("00" + e_mm.value ).slice(-2) + ("00" + e_dd.value ).slice(-2);
        if (e_yy.value + e_mm.value + e_dd.value != "") {

            if (fncChkDate(end) == "") {
                fncAlert("�񓚓����i�s�n�j�͐��������͂��Ă�������",e_yy);
                return false;
            }
            if (s_yy.value + s_mm.value + s_dd.value != "") {
                if (start > end) {
                    fncAlert("�񓚓����i�e�q�n�l�j���񓚓����i�s�n�j�œ��͂��Ă�������",s_yy);
                    return false;
                }
            }
        }
	}
    return true;
}