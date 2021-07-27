///////////////////////////////////////////////
// 入力チェック
///////////////////////////////////////////////
function InputChk(mode,dispQuestionNo){
 	var errorMsg = ""; // エラーメッセージ格納用
	var confMsg = "";  // 確認メッセージ格納用

	switch(mode){
		case "add":
			// 新規追加ボタン押下時
			if (fncTrim(document.form_inp.question_cont.value) == "") {
				// 質問文が空白の場合
				errorMsg += "質問文を入力してください。\n";
			}
			
			if (document.form_inp.question_cont.value.match(/\n/)) {
				// 質問文に改行が含まれている場合
				errorMsg += "改行は入力しないでください。\n";
			}
			
			if (errorMsg == "") {
				// エラーがない場合
				confMsg = "質問を追加しますか？\n";
			}
            
            
            if (errorMsg == "") {
		    // エラーがない場合
		    if (confirm(confMsg)) {
			// 確認メッセージを表示し、OKが押下された場合
            
            document.form_inp.submit();
            
			return true;
		    } else {
			// 確認メッセージを表示し、キャンセルが押下された場合
			return false;
		    }
            } else {
		    // エラーがある場合
	        alert(errorMsg);
		    return false;
            } 
            
            
            
			break;
			
		case "edit":
			// 表示する質問を変更ボタン押下時
            

            var cnt = 0;
            
            for (var i = 1; i < 8; i++){
                
                var aa = eval("document.form_inp.que_list" + i);
                var bb = eval("document.form_up.que_update" + i);
                var cc = eval("document.form_up.que_select" + i);
                var a = document.getElementById ('question_cur' + i);
                
                
                for(var j = i + 1; j < 7; j++){
                
                var dd = eval("document.form_inp.que_list" + j);
                
                if(aa.value == dd.value ){
                
                alert("重複するIDは登録できません。");
                return false;
                }
                
                
                
                }
                
                
                if(a.innerHTML != aa.value){
                bb.value = "1";
                cc.value = aa.value;
                cnt++;
                }    
            
            
            
            }
            
            if(cnt == 0){
            
            alert("変更前と変更後の質問IDが同じです。\n変更がなければキャンセルで画面を閉じてください。");
            return false;
            }
            
            
            
            if (confirm("質問を変更します。\nよろしいですか？")) {
		    // 確認メッセージを表示し、OKが押下された場合
		    document.form_up.submit();
            return true;
	        } else {
		    // 確認メッセージを表示し、キャンセルが押下された場合
		    return false;
	}
            
            
            
            
            
			break;
			
		default:
			// 上記以外の場合
			return false;
	}
	
    
}


///////////////////////////////////////////////
// キャンセルチェック
///////////////////////////////////////////////
function IsCancel(){
	if (confirm("入力内容を破棄しますか？")) {
		// 確認メッセージを表示し、OKが押下された場合
		window.close();
	} else {
		// 確認メッセージを表示し、キャンセルが押下された場合
		return false;
	}
}


///////////////////////////////////////////////
// 質問ID表示
///////////////////////////////////////////////
function setNo(strQuestionNoSelect,strQuestionNoFree,strQuestionContSelect,strQuestionContFree,dispQuestionNo){
	var select1 = document.forms.form_inp.changeQuestion; // 変更する質問番号のセレクトボックスを設定
	var select2 = document.forms.form_inp.dispQuestionId; // 表示する質問IDのセレクトボックスを設定
	var dispQNo = dispQuestionNo.split(",");              // すでに設定されている、表示する質問IDの一覧
	
	select2.options.length = 0; // 選択肢の数がそれぞれに異なる場合にあわせ、オプションの数を0にする
	
	if(select1.options[select1.selectedIndex].value == "---"){
		// 変更する質問番号のセレクトボックスが初期値の場合
		// 表示する質問IDのセレクトボックス、表示する質問文、回答方法に初期値を設定
		select2.options[0] = new Option("---"); 
		document.forms.form_inp.edit_question_cont.value = "";
		document.forms.form_inp.question_kbn.value = "";
	}else if (select1.options[select1.selectedIndex].value == "7"){
		// 変更する質問番号のセレクトボックスが質問7を選択している場合
		var arrayQuestionNoFree = strQuestionNoFree.split(",");     // 回答方法が自由回答の質問IDを設定
		var arrayQuestionContFree = strQuestionContFree.split(","); // 回答方法が自由回答の質問文を設定
		for(var i=0; i < arrayQuestionNoFree.length ; i++){
			// 表示する質問IDをオプションに設定
			select2.options[i] = new Option(arrayQuestionNoFree[i],arrayQuestionContFree[i]);
			if (dispQNo[parseInt(select1.options[select1.selectedIndex].value)-1] == arrayQuestionNoFree[i]) {
				// 変更する質問番号に設定されている質問IDを選択する
				select2.options[i].selected = true;
			}
		}
		// 質問文と回答方法を設定
		document.forms.form_inp.edit_question_cont.value = select2.options[select2.selectedIndex].value;
		document.forms.form_inp.question_kbn.value = "フリースペース";
	}else{
		// 変更する質問番号のセレクトボックスが質問7以外を選択している場合
		var arrayQuestionNoSelect = strQuestionNoSelect.split(",");     // 回答方法が選択回答の質問IDを設定
		var arrayQuestionContSelect = strQuestionContSelect.split(","); // 回答方法が選択回答の質問文を設定
		for(var i=0; i < arrayQuestionNoSelect.length ; i++){
			// 表示する質問IDをオプションに設定
			select2.options[i] = new Option(arrayQuestionNoSelect[i],arrayQuestionContSelect[i]);
			if (dispQNo[parseInt(select1.options[select1.selectedIndex].value)-1] == arrayQuestionNoSelect[i]) {
				// 変更する質問番号に設定されている質問IDを選択する
				select2.options[i].selected = true;
			}
		}
		// 質問文と回答方法を設定
		document.forms.form_inp.edit_question_cont.value = select2.options[select2.selectedIndex].value;
		document.forms.form_inp.question_kbn.value = "選択方式";
	}
}


///////////////////////////////////////////////
// 質問文表示
///////////////////////////////////////////////
function setCont(){
	// 表示する質問IDのセレクトボックスを設定
	var selectOption = document.forms.form_inp.dispQuestionId;
	
	// 質問文を設定
	document.forms.form_inp.edit_question_cont.value = selectOption.options[selectOption.selectedIndex].value
}








function SelectSelect(quenum){

    
    var select_no_ary = '<?php echo $select_no_ary; ?>';
    var select_no = select_no_ary.split(',');
    
    var select_cont_ary = '<?php echo $select_cont_ary; ?>';
    var select_cont = select_cont_ary.split('|~');
    
    
    
    
    
    
    for(var j=1; j<7; j++){
    
    if(quenum == j){
    
    

    
    for (var i = 0; i < select_no.length; i++) {
    
        var aaa = eval("document.form_inp.que_list" + j);
    
        if(aaa.value == select_no[i]){
        
        
      
            
            
            
            var a = document.getElementById ('question_cur' + j);
            
            var b = document.getElementById ('question_td' + j);
            b.innerHTML = select_cont[i];

            
            if(a.innerHTML !=  aaa.value){
  
            b.style.backgroundColor = 'yellow';
            
              
            }
            
            if(a.innerHTML == aaa.value){
            
     
            b.style.backgroundColor = 'white';
            
      
            }
          

            
        }
        
     }
    }
    
    }
    
    
    
    
    
    
    
    

}


function FreeSelect(){

    
    var free_no_ary = '<?php echo $free_no_ary; ?>';
    var free_no = free_no_ary.split(',');
    
    var free_cont_ary = '<?php echo $free_cont_ary; ?>';
    var free_cont = free_cont_ary.split('|~');
    
    
  

    
    for (var i = 0; i < free_no.length; i++) {
        if(document.form_inp.que_list7.value == free_no[i]){
        
        

            
            
            
            var a = document.getElementById ('question_cur7');
            var b = document.getElementById ('question_td7');
            b.innerHTML = free_cont[i];

            
            if(a.innerHTML != document.form_inp.que_list7.value){
            

            b.style.backgroundColor = 'yellow';
      
            }
            
            if(a.innerHTML == document.form_inp.que_list7.value){
   
            b.style.backgroundColor = 'white';
      
            }
          

            
        }
        
     }
    

}