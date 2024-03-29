/*
 * 問い合わせIDの効果測定Request送信処理
 * 
 * @param faq_class_id    分類ID
 * @param faq_id          問い合わせID
 * @param faq_type        区分
 * @param faq_effect_type 効果測定区分
 *
 */

function faqClick( faq_class_id, faq_id, faq_type, faq_effect_type ){
    var url           = '';

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

    url = '/effect.html?time='+ time + '&faq_class_id='+ faq_class_id + '&faq_id=' + faq_id + '&faq_type=' + faq_type + '&faq_effect_type=' + faq_effect_type;
	sendRequest( url, '', 'GET' );
}

function sendRequest( url, callback, method ){

		var req = createXMLHTTP();

		if( !req ){
			return;
		}
		req.onreadystatechange = function(){
			getResponse( req, callback );
		}
		req.open( 'GET', url, false );
		req.send( null );
}

function createXMLHTTP(){
	if( window.XMLHttpRequest ){ 
		return new XMLHttpRequest();
	}else if( window.ActiveXObject ){ 
		try {
			return new ActiveXObject("MSXML2.XMLHTTP");
		}catch (e) {
			try {
				return new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e2) {
				return null;
			}
		}
	}
	return null;
}

function getResponse( req, callback ){
	if( req.readyState == 4 ){
	}
}


