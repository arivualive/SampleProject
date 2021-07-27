/*--------------------------------------------------------
 * fncTypeChange
 * 概　要：セレクトボックス選択時選択した値を持って遷移
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function fncTypeChange(){
	var url   = document.faq_type_form.action;
	var faq_type = document.faq_type_form.faq_type.selectedIndex;
	var faq_view = document.faq_type_form.faq_view.selectedIndex;

	url = url + '?faq_type=' + faq_type + '&faq_view=' + faq_view;

	document.faq_type_form.action= url;
	document.faq_type_form.submit();
}


/*--------------------------------------------------------
 * setCalName
 * 概　要：カレンダー表示領域div名を、hiddenの値にセットする
 * 引　数：send_cate：質問分類　send_y：選択年
 * 戻り値：なし
--------------------------------------------------------*/
function setCalName(send_cate, send_y){
    document.for_js.div_name.value = "calendar_"+send_cate+"_"+send_y;
}


/*--------------------------------------------------------
 * getCalName
 * 概　要：カレンダー表示領域div名を返す
 * 引　数：なし
 * 戻り値：string カレンダー表示領域名
--------------------------------------------------------*/
function getCalName(){
    return document.for_js.div_name.value;
}



/*--------------------------------------------------------
 * chgCalendar
 * 概　要：選択された月のデータを非同期通信で取得し、
 * 　　　　カレンダーを表示する。
 * 引　数：faq_type：質問区分　send_cate：質問分類　send_m：選択年　send_y：選択月
 * 戻り値：
--------------------------------------------------------*/
var xmlHttp;

function chgCalendar(faq_type, faq_view, send_cate, send_y, send_m){
    // 時間パラメータをつけることで、PHPのキャッシュによってリクエストが送信されない現象を防ぐ
    var time  = '';
    var now   = new Date();
    var year  = now.getYear();
    var month = now.getMonth() + 1;
    var day   = now.getDate();
    var hour  = now.getHours();
    var min   = now.getMinutes();
    var sec   = now.getSeconds();
    var msec  = now.getMilliseconds();
    time      = String(year) + String(month) + String(day) + String(hour) + String(min) + String(sec) + String(msec);
	
	// カレンダーエリアタイトル部分「月」書き換え
	calTitleArea      = document.getElementById('calendarm_'+send_cate+'_'+send_y);
    calTitleArea.innerHTML = send_m;
	
	// レスポンス表示領域名取得
	setCalName(send_cate, send_y);
	
    if (window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        if (window.ActiveXObject){
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }else{
            xmlHttp = null;
        }
    }
    xmlHttp.onreadystatechange = checkStatus;
    xmlHttp.open("GET", "chg_calendar.php?time="+time+"&faq_type="+faq_type+"&faq_view="+faq_view+"&send_cate="+send_cate+"&send_y="+send_y+"&send_m="+send_m, true);

    xmlHttp.send(null);
}


/*--------------------------------------------------------
 * checkStatus
 * 概　要：非同期通信時、HTTPステータスを監視
 * 引　数：
 * 戻り値：
--------------------------------------------------------*/
function checkStatus(){
    var div_name = getCalName() ;
    
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
        var node = document.getElementById(div_name);
        node.innerHTML = xmlHttp.responseText;
    }
}
