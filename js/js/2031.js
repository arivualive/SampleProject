// 
function myCheckLength(obj, num, name) {
    if(fncGetLength(obj.value) > num){
        fncAlert(name + "��" + num + "�����ȓ��œ��͂��Ă�������" , obj);
        return false;
    } else {
        return true;
    }
}

// ���̓`�F�b�N 
function ListChk() {
    document.list.mode.value = "find";
	
	with (document.list){
        
 		var start = send_date_from_y.value + ("00" + send_date_from_m.value ).slice(-2) + ("00" + send_date_from_d.value ).slice(-2);
         if (send_date_from_y.value + send_date_from_m.value + send_date_from_d.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("���M���i�e�q�n�l�j�͐��������͂��Ă�������",send_date_from_y);
                 return false;
             }
         }
 		var end = send_date_to_y.value + ("00" + send_date_to_m.value ).slice(-2) + ("00" + send_date_to_d.value ).slice(-2);
         if (send_date_to_y.value + send_date_to_m.value + send_date_to_d.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("���M���i�s�n�j�͐��������͂��Ă�������",send_date_to_y);
                 return false;
             }
             if (send_date_from_y.value + send_date_from_m.value + send_date_from_d.value != "") {
                 if (start > end) {
                     fncAlert("���M���i�e�q�n�l�j�����M���i�s�n�j�œ��͂��Ă�������",send_date_from_y);
                     return false;
                 }
             }
         }		
		
		
        if (! myCheckLength(mail_cd, 4, "���[���R�[�h") ||
            ! myCheckLength(email, 100, "���[���A�h���X") ||
            ! myCheckLength(cd, 8, "����ԍ�") ||
			! myCheckLength(tanto_cd, 10, "�S���R�[�h"))
            return false;
	}
    document.list.page_num.value = "0";
    return true;
}

// �N���A
function ClearAction() {
    document.list.mode.value = "clear";
    document.list.submit();
}


function JsOpenWin( JsUrl , JSWidth , JSHeight ){
	var JsObjWin;
	var JsProperty = "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=yes,resizable=yes,width=" + JSWidth + ",height=" + JSHeight;
	JsObjWin = window.open( JsUrl, "_", JsProperty );
	JsObjWin.focus();
}

function mail_body_disp(argidx) {
	/*��2014/08/23 R-#14770_WEB�Ǘ��c�[���̃v�`���C sai_yamaguchi*/
    newWin = window.open("","newWin","width=600,height=650");
    newWin.document.open();
	
		if (document.list.mail_body[1])
		{
			/*��2014/08/23 R-#14770_WEB�Ǘ��c�[���̃v�`���C sai_yamaguchi*/
			newWin.document.write("<pre style='white-space:pre-wrap;word-break: keep-all;word-wrap: break-word;'>");
			newWin.document.writeln('<textarea id="abc" style="width:100%;height:580px;">&nbsp;</textarea>');
		    newWin.document.write("<center>");
		    newWin.document.write("<br><input type='button' value='close' onClick='window.close()'>");
		    newWin.document.write("</center>");
			var obj = newWin.document.getElementById("abc");
			obj.replaceChild(newWin.document.createTextNode(document.list.mail_body[argidx].value), obj.childNodes[0]);
			newWin.document.write("</pre>");

		    newWin.document.close();
			newWin.focus();
		}else{
			/*��2014/08/23 R-#14770_WEB�Ǘ��c�[���̃v�`���C sai_yamaguchi*/
			newWin.document.write("<pre style='white-space:pre-wrap;word-break: keep-all;word-wrap: break-word;'>");
			newWin.document.writeln('<textarea id="abc" style="width:100%;height:580px;">&nbsp;</textarea>');
		    newWin.document.write("<center>");
		    newWin.document.write("<br><input type='button' value='close' onClick='window.close()'>");
		    newWin.document.write("</center>");
			var obj = newWin.document.getElementById("abc");
			obj.replaceChild(newWin.document.createTextNode(document.list.mail_body.value), obj.childNodes[0]);
			newWin.document.write("</pre>");
			
		    newWin.document.close();
			newWin.focus();		
		}	
		
	}