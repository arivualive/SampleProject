// フォームの2重サブミット防止フラグ
var g_submitFlag = false;
/**
 * フォームのサブミット処理を行う。サブミット済みなら何もしない。
 *@param form form object
 */
function oneSubmit(form){
	var f = form;
	if( g_submitFlag ){
		//送信済み
		f.onsubmit = function(){return false;}
		return false;
	}
	g_submitFlag = true;
	form.submit();
	return false;
}
