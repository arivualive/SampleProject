
function jsEveDel(event_id,event_name) {
    if(window.confirm(event_name + 'を削除してもよろしいですか？')){
        document.form_del.event_id.value = event_id;
        document.form_del.mode.value = 'delete';
	    document.form_del.submit();
    }

}


function jsEveDel2(event_id,event_name) {
    if(window.confirm(event_name + 'を削除します。\nイベントの期間中ですが、本当に削除してもよろしいですか？')){
        document.form_del.event_id.value = event_id;
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
		if (fncTrim(event_name.value) == "") {
			fncAlert("チャレンジイベント名を入力してください。",event_name);
			return false;
		}
		if(event_name.value.length > 20){
			fncAlert("チャレンジイベント名は20文字以内で入力してください。",event_name);
			return false;
		}
        if(event_name.value.match(/\n/)){
			fncAlert("チャレンジイベント名に改行は入力しないでください。",event_name);
			return false;
		}
        
        
        if (fncTrim(event_ex.value) == "") {
			fncAlert("説明文を入力してください。",event_ex);
			return false;
		}
		if(event_ex.value.length > 1000){
			fncAlert("説明文は1000文字以内で入力してください。",event_ex);
			return false;
		}
        if(event_ex.value.match(/\n/)){
			fncAlert("説明文に改行は入力しないでください。",event_ex);
			return false;
		}
        
        
        if (fncTrim(event_achieve.value) == "") {
			fncAlert("必須期間日数を入力してください。",event_achieve);
			return false;
		}
		if(event_achieve.value.length > 3){
			fncAlert("必須期間日数は3文字以内で入力してください。",event_achieve);
			return false;
		}
        if(event_achieve.value.match(/\n/)){
			fncAlert("必須期間日数に改行は入力しないでください。",event_achieve);
			return false;
		}
        
        
        if (event_achieve.value.length > 0) {
            if (!/^[0-9]+$/.test(event_achieve.value)) { 
                fncAlert("必須期間日数には1～999までの値を入力してください。" , event_achieve);
    		    return false;
    	    }
        
        }
        
        if (event_achieve.value < 1) {
        
             fncAlert("必須期間日数には1～999までの値を入力してください。" , event_achieve);
    		 return false;
        }
        
       
        if (fncTrim(img_list_bnr.value) == "") {
			fncAlert("バナー画像IDを選択してください。",img_list_bnr);
			return false;
		}
        
        if (fncTrim(img_list_hd.value) == "") {
			fncAlert("ヘッダー画像IDを選択してください。",img_list_hd);
			return false;
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
        if (disp_turn.value < 1) {
        
             fncAlert("表示順位には1～999までの値を入力してください。" , event_achieve);
    		 return false;
        }
        
        
        if (fncTrim(event_date_from_y.value) == "" || fncTrim(event_date_from_m.value) == "" || fncTrim(event_date_from_d.value) == "") {
			fncAlert("イベント開始日時を入力してください。",event_date_from_y);
			return false;
		}
        
        if (fncTrim(event_date_to_y.value) == "" || fncTrim(event_date_to_m.value) == "" || fncTrim(event_date_to_d.value) == "") {
			fncAlert("イベント終了日時を入力してください。",event_date_to_y);
			return false;
		}
        
        
        
        if (fncTrim(disp_date_from_y.value) == "" || fncTrim(disp_date_from_m.value) == "" || fncTrim(disp_date_from_d.value) == "") {
			fncAlert("バナー表示開始日時を入力してください。",disp_date_from_y);
			return false;
		}
        
        if (fncTrim(disp_date_to_y.value) == "" || fncTrim(disp_date_to_m.value) == "" || fncTrim(disp_date_to_d.value) == "") {
			fncAlert("バナー表示終了日時を入力してください。",disp_date_to_y);
			return false;
		}
        
        
        
        
        
        
        
        var start = event_date_from_y.value + ("00" + event_date_from_m.value ).slice(-2) + ("00" + event_date_from_d.value ).slice(-2);
         if (event_date_from_y.value + event_date_from_m.value + event_date_from_d.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("イベント開始日時を正しく入力してください。",event_date_from_y);
                 return false;
             }
         }
         
 		var end = event_date_to_y.value + ("00" + event_date_to_m.value ).slice(-2) + ("00" + event_date_to_d.value ).slice(-2);
         if (event_date_to_y.value + event_date_to_m.value + event_date_to_d.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("イベント終了日時を正しく入力してください。",event_date_to_y);
                 return false;
             }
             if (event_date_from_y.value + event_date_from_m.value + event_date_from_d.value != "") {
                 if (start > end) {
                     fncAlert("イベント開始日時（ＦＲＯＭ）≦イベント終了日時（ＴＯ）で入力してください。",event_date_from_y);
                     return false;
                 }
             }
         }
         
         
         
         var start = disp_date_from_y.value + ("00" + disp_date_from_m.value ).slice(-2) + ("00" + disp_date_from_d.value ).slice(-2);
         if (disp_date_from_y.value + disp_date_from_m.value + disp_date_from_d.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("バナー表示開始日時を正しく入力してください。",disp_date_from_y);
                 return false;
             }
         }
         
 		var end = disp_date_to_y.value + ("00" + disp_date_to_m.value ).slice(-2) + ("00" + disp_date_to_d.value ).slice(-2);
         if (disp_date_to_y.value + disp_date_to_m.value + disp_date_to_d.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("バナー表示終了日時を正しく入力してください。",disp_date_to_y);
                 return false;
             }
             if (disp_date_from_y.value + disp_date_from_m.value + disp_date_from_d.value != "") {
                 if (start > end) {
                     fncAlert("バナー表示開始日時（ＦＲＯＭ）≦バナー表示終了日時（ＴＯ）で入力してください。",disp_date_from_y);
                     return false;
                 }
             }
         }		
         
        
        
        /*
        var dt1 = new Date(event_date_to_y.value, event_date_to_m.value - 1, event_date_to_d.value); 
        var dt2 = new Date(event_date_from_y.value, event_date_from_m.value - 1, event_date_from_d.value);
        var diff = dt1 - dt2;
        var diffDay = diff / 86400000;
        

        
        if(diffDay + 2 < event_achieve.value){
            fncAlert("イベント終了日時からイベント開始日時を差し引いた日数以内の期間を必須期間日数に設定してください。", event_achieve);
            return false;
        }
        */


        var dt1 = new Date(disp_date_from_y.value, disp_date_from_m.value - 1, disp_date_from_d.value);
        var dt2 = new Date(event_date_from_y.value, event_date_from_m.value - 1, event_date_from_d.value);
        if(dt1.getTime() < dt2.getTime()) {
        
            fncAlert("バナーの表示期間はイベントの期間内に設定してください。", disp_date_from_y);
            return false;
            
        } 
        
        
        
        var dt1 = new Date(disp_date_to_y.value, disp_date_to_m.value - 1, disp_date_to_d.value);
        var dt2 = new Date(event_date_to_y.value, event_date_to_m.value - 1, event_date_to_d.value);
        if(dt1.getTime() > dt2.getTime()) {
        
            fncAlert("バナーの表示期間はイベントの期間内に設定してください。", disp_date_from_y);
            return false;
            
        }
        
        
        
        
        var dt1 = new Date(event_date_to_y.value, event_date_to_m.value - 1, event_date_to_d.value); 
        var dt2 = new Date(disp_date_to_y.value, disp_date_to_m.value - 1, disp_date_to_d.value);
        var diff = dt1 - dt2;
        var diffDay = diff / 86400000;
        
        
        if(diffDay + 1 < event_achieve.value){
            fncAlert("イベント終了日時からバナー表示終了日時を差し引いた日数以内の期間を必須期間日数に設定してください。", event_achieve);
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



function BnrSelect(){

    
    var img_id_ary = '<?php echo $img_id_ary; ?>';
    var img_id = img_id_ary.split(',');
    
    var img_path_ary = '<?php echo $img_path_ary; ?>';
    var img_path = img_path_ary.split(',');
    
    
    for (var i = 0; i < img_id.length; i++) {
        if(document.form_inp.img_list_bnr.value == img_id[i]){
       
        document.form_inp.bnr_img.src = img_path[i];
        }
        
        if(document.form_inp.img_list_bnr.value == ""){
        
         document.form_inp.bnr_img.src = "dummy.png";
        }
    }
    
    
    
}


function HdSelect(){

    
    var img_id_ary = '<?php echo $img_id_ary; ?>';
    var img_id = img_id_ary.split(',');
    
    var img_path_ary = '<?php echo $img_path_ary; ?>';
    var img_path = img_path_ary.split(',');
    
    
    for (var i = 0; i < img_id.length; i++) {
        if(document.form_inp.img_list_hd.value == img_id[i]){
        
        document.form_inp.hd_img.src = img_path[i];
        }
        
        if(document.form_inp.img_list_hd.value == ""){
        
         document.form_inp.hd_img.src = "dummy.png";
        }
    }
    
    
    
}