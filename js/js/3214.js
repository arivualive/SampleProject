
function jsEveDel(howto_id,howto_name) {
    if(window.confirm(howto_name + 'を削除してもよろしいですか？')){
        document.form_del.howto_id.value = howto_id;
        document.form_del.mode.value = 'delete';
	    document.form_del.submit();
    }

}


function InputChk(mode_select) {

    if(mode_select == "ADD"){
		document.form_inp.mode.value = "add";
	}
    
    if(mode_select == "EDIT"){
		document.form_inp.mode.value = "edit";
	}
    
    
    with (document.form_inp){
		if (fncTrim(howto_name.value) == "") {
			fncAlert("使い方タイトルを入力してください。",howto_name);
			return false;
		}
		if(howto_name.value.length > 20){
			fncAlert("使い方タイトルは20文字以内で入力してください。",howto_name);
			return false;
		}
        if(howto_name.value.match(/\n/)){
			fncAlert("使い方タイトルに改行は入力しないでください。",howto_name);
			return false;
		}
        
        
        
        if (fncTrim(howto_ex.value) == "") {
			fncAlert("使い方説明文を入力してください。",howto_ex);
			return false;
		}
        
        
        if(howto_ex.value.length > 0){
            var r = 0; 
            for (var i = 0; i < howto_ex.value.length; i++) { 
                var c = howto_ex.value.charCodeAt(i); 
        

                if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) {
                    r += 1;
                } else {
                    r += 2;
                }
                
        
        } 
        
            if(r > 4000){
        
                fncAlert("使い方説明文は4kバイト未満で入力してください。",howto_ex);
			    return false;
        
            }
        }
        
        
        
        if (fncTrim(disp_turn.value) == "") {
			fncAlert("表示順位を入力してください。",disp_turn);
			return false;
		}
		if(disp_turn.value.length > 3){
			fncAlert("表示順位は3文字以内で入力してください。",disp_turn);
			return false;
		}
        if(disp_turn.value.match(/\n/)){
			fncAlert("表示順位に改行は入力しないでください。",disp_turn);
			return false;
		}
        if (disp_turn.value.length > 0) {
        if (!/^[0-9]+$/.test(disp_turn.value)) { 
            fncAlert("表示順位には1～999までの値を入力してください。" , disp_turn);
    		return false;
    	}
        }
        if(disp_turn.value < 1){
			fncAlert("表示順位には1～999までの値を入力してください。",disp_turn);
			return false;
		}
        
        
        
        if (fncTrim(date_from_y.value) == "" || fncTrim(date_from_m.value) == "" || fncTrim(date_from_d.value) == "" || fncTrim(date_from_h.value) == "" || fncTrim(date_from_i.value) == "" || fncTrim(date_from_s.value) == "") {
			fncAlert("表示開始日時を入力してください。",date_from_y);
			return false;
		}
        
        if (fncTrim(date_to_y.value) == "" || fncTrim(date_to_m.value) == "" || fncTrim(date_to_d.value) == "" || fncTrim(date_to_h.value) == "" || fncTrim(date_to_i.value) == "" || fncTrim(date_to_s.value) == "") {
			fncAlert("表示終了日時を入力してください。",date_to_y);
			return false;
		}
        
        
        
        var start = date_from_y.value + ("00" + date_from_m.value ).slice(-2) + ("00" + date_from_d.value ).slice(-2);
         if (date_from_y.value + date_from_m.value + date_from_d.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("表示開始日時を正しく入力してください。",date_from_y);
                 return false;
             }
         }
         
 		var end = date_to_y.value + ("00" + date_to_m.value ).slice(-2) + ("00" + date_to_d.value ).slice(-2);
         if (date_to_y.value + date_to_m.value + date_to_d.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("表示終了日時を正しく入力してください。",date_to_y);
                 return false;
             }
         }
         
            startDate = date_from_y.value + '/' + date_from_m.value + '/' + date_from_d.value + ' ' + date_from_h.value + ':' + date_from_i.value + ':' + date_from_s.value;
			endDate = date_to_y.value + '/' + date_to_m.value + '/' + date_to_d.value + ' ' + date_to_h.value + ':' + date_to_i.value + ':' + date_to_s.value;

        if (new Date(startDate).getTime() > new Date(endDate).getTime()) {
		    fncAlert("表示開始日時（ＦＲＯＭ）≦表示終了日時（ＴＯ）で入力してください。",date_from_y);
            return false;
        }	
			
         		
    
    }
  
  
    if(mode_select == "ADD"){
	ret = confirm("登録します。よろしいですか？");
	}
    
    if(mode_select == "EDIT"){
	ret = confirm("更新します。よろしいですか？");
	}

  
  if (ret == true){
    document.form_inp.submit();
    return true;
  }else{
  
      return false;
  }
    
    

}



function Cancel(){
  ret = confirm("入力内容を破棄しますか？");
  if (ret == true){
    return true;
  }else{
  
      return false;
  }
}



