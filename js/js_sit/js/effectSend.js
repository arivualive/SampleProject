/*
 * –â‚¢‡‚í‚¹ID‚ÌŒø‰Ê‘ª’èRequest‘—Mˆ—
 * 
 * @param faq_class_id    •ª—ŞID
 * @param faq_id          –â‚¢‡‚í‚¹ID
 * @param faq_type        ‹æ•ª
 * @param faq_effect_type Œø‰Ê‘ª’è‹æ•ª
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


